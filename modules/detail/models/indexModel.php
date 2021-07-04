<?php 
function get_info_product($id){
     return db_fetch_array( "SELECT * FROM `tbl_product` WHERE `product_id`=$id");
}
function get_all_img($id){
    return db_fetch_array( "SELECT `img_url` FROM `tbl_img` WHERE `product_id`=$id");
}