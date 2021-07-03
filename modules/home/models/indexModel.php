<?php 

function get_all_post(){
   return db_fetch_array("SELECT * FROM `tbl_post`");
}
function get_img_by_img_id($id){
   return db_fetch_row("SELECT `img_url` FROM `tbl_img` WHERE `img_id`=$id;"); ;
}
function get_product_new(){
   $result =  db_fetch_array("SELECT * FROM `tbl_product`");
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
   for($i=$count;$i>=0;$i--){
      $n = $t++;
      $data[$n]=$result[$i];
      $data[$n]['thumb_url']=get_img_by_img_id($result[$i]['img_id']);
   }
  }
  return $data;
}
function get_product_hot(){
   $result =  db_fetch_array("SELECT * FROM `tbl_product`");
   $data = array();
  if(count($result)>=12){
   for($i=0;$i<12;$i++){
      $data[$i]=$result[$i];
      $data[$i]['thumb_url'] = get_img_by_img_id($result[$i]['img_id']);
   }
  }else{
   for($i=0;$i<count($result);$i++){
      $data[$i]=$result[$i];
      $data[$i]['thumb_url'] = get_img_by_img_id($result[$i]['img_id']);
   }
  }
  return $data;
}