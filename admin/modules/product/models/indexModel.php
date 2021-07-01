<?php

function form_error($name)
{
    global $error;
    if (isset($error[$name])) {
        return $error[$name];
    }
}
function form_alert($name)
{
    global $alert;
    if (isset($alert[$name])) {
        return $alert[$name];
    }
}
function get_id_img_by_path($url)
{
    $result = db_fetch_row("SELECT* FROM `tbl_img`where `img_url`='{$url}'");
    return $result['img_id'];
}
function get_product_id_by_img_id($img_id)
{
    $result = db_fetch_row("SELECT* FROM `tbl_product`where `img_id`='{$img_id}'");
    return  $result['product_id'];
}


function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}
function get_product_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_product`where `product_id`='{$id}'");
}

function get_thumb_by_id($id)
{
    return  db_fetch_row("SELECT `img_url` FROM `tbl_img` where `img_id`='{$id}'");
}
function get_multi_img($product_id)
{
    return  db_fetch_array("SELECT * FROM `tbl_img` where `product_id` = {$product_id}");
}
function get_size_by_id($product_id)
{
    return db_fetch_array("SELECT * FROM `tbl_amount_size` where `product_id`={$product_id}");
}
function get_all_img($product_id){
    return  db_fetch_array("SELECT * FROM `tbl_img` where `product_id` = {$product_id}");
}

// =====================================hàm lỗi chưa sửa =========================
function isset_size($size, $id)
{
    $list_size = get_size_by_id($id);
    $num_img = count($list_size);
    for ($i = 0; $i < $num_img; $i++) {
        $img[$i] = $list_size[$i]['size_name'];
    };
    
    if (in_array($size, $img)) {
        return "checked='checked'";
    }

}
function isset_size_check($size, $id)
{
    $list_size = get_size_by_id($id);
    $num_img = count($list_size);
    for ($i = 0; $i < $num_img; $i++) {
        $img[$i] = $list_size[$i]['size_name'];
    };
    
    if (in_array($size, $img)) {
        return true;
    }

   
}
// ===========================================================================================
function amount($size, $id)
{
    $list_size = get_size_by_id($id);
    global $size_name;
    foreach ($list_size as $item) {
        $size_name[$item['size_name']] = $item['amount'];
    };
    if (array_key_exists($size, $size_name)) {
        return $size_name[$size];
    }
}

function get_id_img_thumb($id){
    $product = get_product_by_id($id);
    return $product['img_id'];
}
