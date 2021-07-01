<?php
function construct(){

}
function indexAction(){
    load_model('index');
    $list_post = get_all_post();


    $data= array('list_post'=>$list_post);
    load_view('index',$data);
}