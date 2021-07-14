<?php
function construct()
{
   if(empty($_SESSION['cart']['buy'])){
      unset($_SESSION['cart']['bill-id']);
   }
}
function indexAction()
{
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
