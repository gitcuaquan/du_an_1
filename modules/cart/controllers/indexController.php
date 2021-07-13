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
   $product = get_product_by_id($id);
   $size = get_size_by_id($id);
   $qty = 1;
   if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
      (int)$qty = $_SESSION['cart']['buy'][$id]['product_qty'] + 1;
      $_SESSION['cart']['buy'][$id]['product_qty'] = $qty;
      $_SESSION['cart']['buy'][$id]['product_total'] = (int)$qty * (int) $_SESSION['cart']['buy'][$id]['product_price'];
      redirect("?mod=detail&action=index&id={$id}");
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
      redirect("?mod=detail&action=index&id={$id}");
   }
   // unset($_SESSION['cart']['buy']);
}
function deleteAction(){
   $id = $_GET['id'];
   if(empty($id)){
      unset($_SESSION['cart']['buy']);
   }else{
      unset($_SESSION['cart']['buy'][$id]);
   }
   
   redirect("?mod=cart&action=index");
}