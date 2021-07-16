<?php
function construct()
{
   
}

function indexAction(){
   load_view('index');
}
function showAction(){
   load_model('index');
   load_view('show');
}