<?php
function construct()
{
}
function addAction()
{
    load('lib', 'validation');

    if (isset($_POST['btn_add'])) {
        global $error;
        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Chưa Nhập Tiêu Đề Bài Viết";
        } else {
            $post_title = $_POST['post_title'];
        }
        // ================================= Tiêu Đề Bài Viết ==================================
        if (empty($_POST['post_content'])) {
            $error['post_content'] = "Chưa Nhập Nội Dung Bài Viết";
        } else {
            $post_content = $_POST['post_content'];
        }
        // ================================= Nội Dung Bài Viết ==================================
        if (empty($_POST['thumbnail_url'])) {
            $error['thumbnail_url'] = "Chưa Thêm Ảnh Đại Diện Cho Bài Viết";
        } else {
            $thumbnail_url = $_POST['thumbnail_url'];
        }

        if (empty($error)) {
            load_model('index');
            $time  = convert_time();
            $data = array(
                'post_title' => $post_title,
                'post_content' => $post_content,
                'thumb_url' => $thumbnail_url,
                'fullname' => $_SESSION['fullname'],
                'create_time' => $time
            );
            db_insert("tbl_post", $data);
            $error['add'] = "Thêm Bài Viết Thành Công";
        }
    }
    load_view('add');
}
function showAction()
{
    load_model('index');
    $result = get_all_post();
    $data  = array('result' => $result);
    load_view('show', $data);
}

function delAction()
{
}
function updateAction()
{
    load('lib', 'validation');
    load_model('index');
    $id = $_GET['id'];
    $post = get_post_by_id($id);
    $data = array('post' => $post);
    if (isset($_POST['btn_cancel'])){
        redirect("?mod=post&action=show");
    }
    if (isset($_POST['btn_update'])) {
        global $error;
        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Chưa Nhập Tiêu Đề Bài Viết";
        } else {
            $post_title = $_POST['post_title'];
        }
        // ================================= Tiêu Đề Bài Viết ==================================
        if (empty($_POST['post_content'])) {
            $error['post_content'] = "Chưa Nhập Nội Dung Bài Viết";
        } else {
            $post_content = $_POST['post_content'];
        }
        // ================================= Nội Dung Bài Viết ==================================
        if (empty($_POST['thumbnail_url'])) {
            $error['thumbnail_url'] = "Chưa Thêm Ảnh Đại Diện Cho Bài Viết";
        } else {
            $thumbnail_url = $_POST['thumbnail_url'];
        }

        if (empty($error)) {
            $time  = convert_time();
            $thub_old =$post['thumb_url'];
            unlink($thub_old);
            $data = array(
                'post_title' => $post_title,
                'post_content' => $post_content,
                'thumb_url' => $thumbnail_url,
                'fullname' => $_SESSION['fullname'],
                'update_time' => $time
            );
            db_update("tbl_post", $data,"`post_id`={$id}");
           redirect("?mod=post&action=show");
        }else{
            $error['update'] = "Sửa không Bài Viết Thành Công";
     
        }
    }

    load_view('update', $data);
}
