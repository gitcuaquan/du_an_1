<?php

use function GuzzleHttp\json_decode;

function construct()
{
   
}

function indexAction(){
   load_view('index');
}
function showAction(){
   load_model('index');
   
   $list_bill = get_bill();
   
   
   $data =array('list_bill'=> $list_bill);
   load_view('show',$data);
}
function detailAction(){
   $bill_code = $_GET['bill'];
   load_model('index');
   $result = get_product_by_bill_code($bill_code);
   $list_bill = get_bill();
   $info_bill = get_info_bill($bill_code);

    $product = \json_decode($result['product'],true);
   
   $data = array('bill_code'=>$bill_code,'product'=> $product ,'list_bill'=>$list_bill,'info_bill'=>$info_bill);
   load_view('detail',$data);
}