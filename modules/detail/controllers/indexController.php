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

   $data = array('product' => $product,'list_img'=>  $list_img);
   load_view('index',$data);
}
