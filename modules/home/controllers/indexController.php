<?php
function construct()
{
}
function indexAction()
{
    load_model('index');
    $list_post = get_all_post();
    $list_product_new = get_product_new();
    $list_product_hot = get_product_hot();




    $data = array('list_post' => $list_post,
     'list_product_new' => $list_product_new,
    'list_product_hot' => $list_product_hot);
    load_view('index', $data);
}
