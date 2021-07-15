<?php
function get_product_by_id($id){
    return db_fetch_row( "SELECT * FROM `tbl_product` WHERE `product_id`=$id");
}
function get_size_by_id($id){
    return db_fetch_array( "SELECT `size_name`,`amount` FROM `tbl_amount_size` WHERE `product_id`=$id");
}
function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
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
        array(
            'num_oder' => $num_oder,
            'total' => vnd($total)
        );
    }
}
function createBillId(){
    return "BILL-".time();
}
function getVal($str){
    if(isset($_GET[$str])){
        return $_GET[$str];
    }else{
        return "";
    }
}