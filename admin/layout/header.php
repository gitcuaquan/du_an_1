<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php load('import', 'import_link_global') ?>
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/js/sidebar.js">
    <title>Admin</title>
</head>

<body>
    <div id="header" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="logo_admin ">
                        <a href="#" class="d-block">
                            <img src="public/img/logoquan.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-4 d-flex ">
                    <h5 class=" text-center text-light mt-4 ">Xin Chào <strong class="text-warning"><?php if (isset($_SESSION['fullname'])) {
                                                                                                        echo $_SESSION['fullname'];
                                                                                                    }  ?></strong> </h5>
                    <h3 id="logout" class=" mt-3 ms-5"><i class="fas  text-danger fa-power-off"></i> <span class="position-fixed  logout ms-2  bg-dark"><a class="text-danger text-decoration-none" href="?mod=users&action=logout">ĐĂNG XUẤT</a></span> </h3>
                    <h3 title="Thông Tin Cá Nhân" id="info" class=" mt-3 ms-3">
                        <i class="fas text-info fs-3 ms-3 fa-user-circle"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div id="wp-info" class="position-fixed   w-100 h-100">
        <div id="info" class=" d-flex justify-content-center align-middle mt-5 pt-5">
            <div class="border rounded bg-light float-end  me-5" style="width:1000px; height:420px;">
            <?php $user= db_fetch_row("SELECT * FROM `tbl_manager` WHERE `fullname` = '{$_SESSION['fullname']}'"); ?>
                <h1 class="text-center"> Thẻ Quản Lý</h1>
                <div class="row">
                    <div class="col-3">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=username=<?php echo $user['user_name'] ?>" id="qr" alt="mã QR">
                    </div>
                    <div class="col-8 ms-3 mt-4">
                        <div class="row">
                            <div class=" mt-3 col-8">
                                <h4>Họ và Tên : <strong class="input10"><?php echo $user['fullname'] ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Giới Tính: <strong class="gender"><?php if($user['gender']=="male"){ echo"Nam";}else{
                                    echo "Nữ";
                                } ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-8">
                                <h4>Số Điện Thoại: <strong class="input5"><?php echo "0".$user['phone'] ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Chức Vụ: <strong>Quản Lý</strong> </h4>
                            </div>
                            <div class=" mt-3 col-7">
                                <h4>Tài Khoản: <strong class="input1""><?php echo $user['user_name'] ?></strong> </h4>
                            </div>

                            <div class=" mt-3 col-12">
                                        <h4>Địa Chỉ : <strong class="input3"><?php echo $user['address'] ?></strong></h4>
                            </div>

                            <div class=" mt-3 col-10">
                                <h4>Email Liên Hệ: <strong class="input4"><?php echo $user['email'] ?></strong></h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-4">
            <div class="col-5"></div>
            <div class="col-2 p-4 d-flex justify-content-center" id="action" ><button  class="btn btn-warning"><a class="text-decoration-none text-dark fw-bold" href="?mod=users&action=update_manager&id=<?php echo $user['manager_id'] ?>">Sửa Thông Tin</a></button></div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#logout").hover(function() {
                $(".logout").stop().slideToggle(200);
            }, function() {
                $(".logout").stop().slideToggle(200);
            });
            $("#info").click(function() {
                $("#wp-info").fadeToggle();

            });
            $("#wp-info").click(function() {
                $("#wp-info").fadeToggle();

            });
        });
    </script>