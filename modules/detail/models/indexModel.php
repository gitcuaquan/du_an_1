<?php 
function get_info_product($id){
     return db_fetch_array( "SELECT * FROM `tbl_product` WHERE `product_id`=$id");
}
function get_all_img($id){
    return db_fetch_array( "SELECT `img_url` FROM `tbl_img` WHERE `product_id`=$id");
}
function get_amount_size($id){
    return db_fetch_array( "SELECT `size_name`,`amount` FROM `tbl_amount_size` WHERE `product_id`=$id");
}