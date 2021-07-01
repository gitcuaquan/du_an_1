<?php 

function get_all_post(){
   return db_fetch_array("SELECT * FROM `tbl_post`");
}