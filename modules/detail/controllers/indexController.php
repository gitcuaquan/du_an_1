<?php
function construct()
{
}
function indexAction()
{
   load_model('index');
   $id = $_GET['id'];
   $product = get_info_product($id);
   $list_img = get_all_img($id);
   $amount = get_amount_size($id);
   $list_product = get_list_product_not_id($id);
   $data = array('product' => $product,'list_img'=>  $list_img,'amount'=> $amount,'list_product'=>$list_product,'id'=>$id);
   load_view('index',$data);
}
