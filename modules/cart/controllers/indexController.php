<?php
function construct()
{
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
   $qty = 1;
   if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
      (int)$qty = $_SESSION['cart']['buy'][$id]['product_qty'] + 1;
      $_SESSION['cart']['buy'][$id]['product_qty'] = $qty;
      $_SESSION['cart']['buy'][$id]['product_total'] = (int)$qty * (int) $_SESSION['cart']['buy'][$id]['product_price'];
      $result['alert'] = "success";
   } else {
      $_SESSION['cart']['buy'][$id] = array(
         'product_id' => $product['product_id'],
         'product_code' => $product['product_code'],
         'product_name' => $product['product_name'],
         'product_price' => (int) $product['product_price'],
         'product_size' => $size,
         'product_qty' => (int)$qty,
         'product_total' => (int)$qty * (int)$product['product_price'],
      );
      $result['alert'] = "success";
   }
   echo json_encode($result);
}

function deleteAction()
{
   $id = $_GET['id'];
   $result = array();
   if (empty($id)) {
      unset($_SESSION['cart']['buy']);
      $result['alert'] = "success";
   } else {
      unset($_SESSION['cart']['buy'][$id]);
      $result['alert'] = "success";
   }
   echo json_encode($result);
}

function update_numAction(){
   load_model('index');
   $id = $_GET['id'];  
   $val = $_GET['val'];
   if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
      $_SESSION['cart']['buy'][$id]['product_qty'] = $val;
      $_SESSION['cart']['buy'][$id]['product_total'] = (int)$val * (int) $_SESSION['cart']['buy'][$id]['product_price'];
      $result['alert'] = "success";
      $result['sub_total'] = vnd($_SESSION['cart']['buy'][$id]['product_total']);
   } 
   echo json_encode($result);
   
    
}