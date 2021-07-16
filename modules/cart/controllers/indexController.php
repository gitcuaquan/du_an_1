<?php
function construct()
{
   if(empty($_SESSION['cart']['buy'])){
      unset($_SESSION['cart']['bill-id']);
   }
}
function indexAction()
{
   load('lib',"validation");
  global $error;
   if(isset($_POST['btn-pay'])){
      if(empty($_POST['fullname'])){
         $error['fullname'] = "chưa có tên khách hàng";
      }else{
         $name = $_POST['fullname'];
      }
      if(empty($_POST['phone'])){
         $error['phone'] = "chưa có số điện thoại khách hàng";
      }else{
         if(is_phone($_POST['phone'])){
            $phone = $_POST['phone'];
         }else{
            $error['phone'] = "chưa đúng định dạng";
         }
      }
      if(empty($_POST['email'])){
         $error['email'] = "chưa có email khách hàng";
      }else{
         if(is_email($_POST['email'])){
            $email = $_POST['email'];
         }else{
            $error['email'] = "email  không đúng định dạnh";
         }
      }
      if(empty($_POST['address'])){
         $error['address'] = "chưa có địa chỉ khách hàng";
      }else{
         $address = $_POST['address'];
      }
      if(empty($error)){
         load_model('index');
         $data = array(
            'name'=> $name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'bill_code'=>$_SESSION['cart']['bill-id'], 
            'product'=> json_encode($_SESSION['cart'])
         );
         db_insert("tbl_bill",$data);
         $error['bill']= "Đặt hàng Thành Công ! Vui lòng chờ nhân viên gọi điện xác nhận ! ";
         unset($_SESSION['cart']['bill-id']);
         $_SESSION['cart']['bill-id'] = createBillId();
        
      }else{
         $error['bill']= "Đặt không hàng Thành Công ! Vui lòng kiểm tra lại ! ";
      }
      
      
   }
   load_view('index');
}
function addAction()
{
   load_model('index');
   $id = $_GET['id'];
   $result = array();
   $product = get_product_by_id($id);
   $size = get_size_by_id($id);
   if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
      if (!isset($_SESSION['cart']['bill-id'])) {
         $_SESSION['cart']['bill-id'] = createBillId();
      }
      $_SESSION['cart']['buy'][$id]['product_total'] = (int)$_SESSION['cart']['buy'][$id]['product_qty'] * (int) $_SESSION['cart']['buy'][$id]['product_price'];
      update_info_cart();
      $result['alert'] = "success";
   } else {
      $_SESSION['cart']['buy'][$id] = array(
         'product_id' => $product['product_id'],
         'product_code' => $product['product_code'],
         'product_name' => $product['product_name'],
         'product_price' => (int) $product['product_price'],
         'product_size' => $size,
         'product_qty' => 1,
         'product_total' =>  (int)$product['product_price'],
      );
      if (!isset($_SESSION['cart']['bill-id'])) {
         $_SESSION['cart']['bill-id'] = createBillId();
      }
      update_info_cart();
      $result['alert'] = "success";
      $result['total'] = $_SESSION['cart']['info']['total'];
      $result['qty'] = $_SESSION['cart']['info']['num_oder'];
   }
   echo json_encode($result);
}

function deleteAction()
{
   $id = $_GET['id'];
   $result = array();
   if (empty($id)) {
      unset($_SESSION['cart']);
      unset($_SESSION['cart']['info']);
      unset($_SESSION['cart']['bill-id']);
      $result['qty'] = "0";
      $result['alert'] = "success";
   } else {
      unset($_SESSION['cart']['buy'][$id]);
      $num_oder = 0;
      $total = 0;
      foreach ($_SESSION['cart']['buy'] as $item) {
         (int) $num_oder +=  (int) $item['product_qty'];
         (int) $total +=  (int) $item['product_total'];
      }
      $_SESSION['cart']['info'] = array(
         'num_oder' => $num_oder,
         'total' => vnd($total)
      );
      $result['info'] =  array(
         'num_oder' => $num_oder,
         'total' => vnd($total)
      );;
      $result['total'] = $_SESSION['cart']['info']['total'];
      $result['qty'] = $_SESSION['cart']['info']['num_oder'];
      $result['alert'] = "success";
   }
   echo json_encode($result);
}

function update_numAction()
{
   load_model('index');
   $id = $_GET['id'];
   $val = $_GET['val'];

   if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
      
      $_SESSION['cart']['buy'][$id]['product_qty'] = $val;
   
      $_SESSION['cart']['buy'][$id]['product_total'] = (int)$val * (int) $_SESSION['cart']['buy'][$id]['product_price'];
      
      
      $result['alert'] = "success";
      $result['sub_total'] = vnd($_SESSION['cart']['buy'][$id]['product_total']);
      update_info_cart();
      $result['total'] = $_SESSION['cart']['info']['total'];
      $result['qty'] = $_SESSION['cart']['info']['num_oder'];
   }
   echo json_encode($result);
}


function update_sizeAction()
{
   load_model('index');
   $id = $_GET['id'];
   $size = $_GET['size'];

   if (isset($_SESSION['cart']['bill']) && array_key_exists($id, $_SESSION['cart']['bill'])) {
      $_SESSION['cart']['bill'][$id]['size'] = $size."-SPID". $_SESSION['cart']['bill'][$id]['product_id'];
      $result['alert'] = "success";
   }else{
      $_SESSION['cart']['bill'][$id]['size'] = $size;
      $result['alert'] = "success";
   }
   echo json_encode($result);
}

function billAction(){
  
   
}