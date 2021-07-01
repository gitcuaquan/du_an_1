<?php

function check_user($username,$password){
    $result= db_fetch_row("SELECT * FROM `tbl_manager`where `user_name`='{$username}'and `password`='{$password}'");
    if($result >0)
        return true;
}
function get_user_by_username($username){
   return $result= db_fetch_row("SELECT * FROM `tbl_user`where `username`='{$username}'");
    
}
function get_all_manager(){
    return $result= db_fetch_array("SELECT * FROM `tbl_manager`");
}
function get_manager_by_id($id){
    return $result= db_fetch_row("SELECT * FROM `tbl_manager` WHERE `manager_id` = $id");
     
 }
 function check_isset_user($username,$email){
    $result = db_fetch_row("SELECT * FROM `tbl_manager` WHERE `user_name` = '{$username}' or `email`='{$email}'");
    if($result > 0){
        return true;
    }
        return false;
 }
function p($string)
{
   return $_POST[$string];
}
function get_all_user(){
    return $result= db_fetch_array("SELECT * FROM `tbl_user`");
}
