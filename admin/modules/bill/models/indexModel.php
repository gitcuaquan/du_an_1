<?php

function get_bill(){
   return db_fetch_array("SELECT * FROM `tbl_bill` ");
}
function get_product_by_bill_code($bill_code){
    return db_fetch_row("SELECT `product` FROM `tbl_bill` where `bill_code`='{$bill_code}' ");
}
function get_info_bill($bill_code){
    return db_fetch_row("SELECT * FROM `tbl_bill` where `bill_code`='{$bill_code}' ");
}
function get_product_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_product` where `product_id`=$id ");
}
function get_img_by_id($id){
    $product = db_fetch_row("SELECT * FROM `tbl_product` where `product_id`=$id ");
   return  $img =  db_fetch_row("SELECT `img_url` FROM `tbl_img` where `img_id`={$product['img_id']}");
}