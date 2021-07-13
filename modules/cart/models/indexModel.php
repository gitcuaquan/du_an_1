<?php
function get_product_by_id($id){
    return db_fetch_row( "SELECT * FROM `tbl_product` WHERE `product_id`=$id");
}
function get_size_by_id($id){
    return db_fetch_array( "SELECT `size_name`,`amount` FROM `tbl_amount_size` WHERE `product_id`=$id");
}