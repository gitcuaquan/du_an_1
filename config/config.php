<?php
ob_start();
session_start();

/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */

$config['base_url'] = "http://localhost/manhquanstore.com/";
$config['main_url'] = "http://localhost/manhquanstore.com/admin/";

$config['default_module'] = 'home';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';












