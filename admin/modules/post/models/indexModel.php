<?php
function convert_time()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = time();
    return date('d/m/Y g:ia', $time);
}

function get_all_post(){
    return  db_fetch_array("SELECT * FROM `tbl_post`");
}
function get_post_by_id($id){
    return  db_fetch_row("SELECT * FROM `tbl_post`where `post_id` = {$id}");
}