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
function get_list_product_not_id($id){
    return db_fetch_array("SELECT * FROM `tbl_product`WHERE `product_id` != $id");
}
function get_product_new($id){
    $result =  db_fetch_array("SELECT * FROM `tbl_product` where `product_id`!= $id ");
    $count = count($result);
    $data = array();
    $t = 0;
   if($count>12){
    for($i=$count-1;$i>=($count-12);$i--){
       $n = $t++;
       $data[$n]=$result[$i];
       $data[$n]['thumb_url']=get_img_by_img_id($result[$i]['img_id']);
    }
   }else{
    for($i=$count-1;$i>=0;$i--){
       $n = $t++;
       $data[$n]=$result[$i];
       $data[$n]['thumb_url']=get_img_by_img_id($result[$i]['img_id']);
    }
   }
   return $data;
 }
 function get_img_by_img_id($id){
    return db_fetch_row("SELECT `img_url` FROM `tbl_img` WHERE `img_id`=$id;"); ;
 }