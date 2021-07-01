<?php get_header(); ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2  ">
    <h1 class=" text-center"><?php echo form_error("update"); ?></h1>
        <form action="" class="" method="post">
            <div class="ps-2 float-start w-25 mt-3 border ms-2 m-0">
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input1" class=" p-1 rounded bg-info form-label">Tên Đăng Nhập</label>
                        <input type="text" disabled="disabled" name="username" value="<?php echo $manager['user_name']; ?>" class="form-control" id="input1">

                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11">
                    <div class="mb-3">
                        <label for="input2" class=" p-1 rounded bg-info form-label">Mật Khẩu</label>
                        <input type="text" disabled="disabled" name="password" value="<?php echo $manager['password']; ?>" class="form-control" id="input2">

                    </div>
                </div>
                <!-- ======================================================================================== -->
                <div class="col-md-11">
                    <div class="mb-3">
                        <label for="input10" class=" p-1 rounded bg-info form-label">Họ và Tên</label>
                        <input type="text" name="fullname" value="<?php echo $manager['fullname']; ?>" class="form-control" id="input10">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input3" class=" p-1 rounded bg-info form-label">Địa Chỉ</label>
                        <input type="text" name="address" value="<?php echo $manager['address']; ?>" class="form-control" id="input3" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input4" class=" p-1 rounded bg-info form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $manager['email']; ?>" class="form-control" id="input4" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input5" class=" p-1 rounded bg-info form-label">Số Điện Thoại</label>
                        <input type="number" name="phone" value="<?php echo "0" . $manager['phone']; ?>" class="form-control" id="input5" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input6" class=" p-1 rounded bg-info form-label">Giới Tính</label>
                        <div class="mb-3">
                            <input type="radio" name="gender" id="male" <?php if ($manager['gender'] == 'male') {
                                                                            echo "checked='checked'";
                                                                        } ?> class="me-2" value="male"><label class="me-4" for="male">Nam</label>
                            <input type="radio" <?php if ($manager['gender'] == 'female') {
                                                    echo "checked='checked'";
                                                } ?> name="gender" id="female" class="me-2" value="female"><label class="me-4" for="female">Nữ</label>
                        </div>

                    </div>
                </div>

                <div class="col-md-11 ">
                    <div class="mb-3 text-center">
                        <input type="submit" name="btn_update" class="btn btn-warning" value="Sửa Thông Tin">
                        <input type="submit" name="btn_cancel" class="btn btn-success" value="Quay Lại">
                    </div>
                </div>
                <!-- ====================================================================================== -->

            </div>
            <!-- ============= show info ================================ -->
            <div class="border float-end mt-3 me-5" style="width:1000px; height:420px;">
                <h1 class="text-center"> Thẻ Quản Lý</h1>
                <div class="row">
                    <div class="col-3">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=username=<?php echo $manager['user_name']; ?>" id="qr" alt="mã QR">
                    </div>
                    <div class="col-8 ms-3 mt-4">
                        <div class="row">
                            <div class=" mt-3 col-8">
                                <h4>Họ và Tên : <strong class="input10"><?php echo $manager['fullname']; ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Giới Tính: <strong class="gender"><?php if ($manager['gender'] == 'female') {
                                                                            echo "Nữ";
                                                                        } else {
                                                                            echo "Nam";
                                                                        } ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-8">
                                <h4>Số Điện Thoại: <strong class="input5"><?php echo"0". $manager['phone']; ?></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Chức Vụ: <strong>Quản Lý</strong> </h4>
                            </div>
                            <div class=" mt-3 col-7">
                                <h4>Tài Khoản: <strong class="input1""><?php echo $manager['user_name']; ?></strong> </h4>
                            </div>

                            <div class=" mt-3 col-12">
                                        <h4>Địa Chỉ : <strong class="input3"><?php echo $manager['address']; ?></strong> </h4>
                            </div>

                            <div class=" mt-3 col-10">
                                <h4>Email Liên Hệ: <strong class="input4"><?php echo $manager['email']; ?></strong></h4>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>
<script src="public/js/upload.js"></script>
<!-- <script src="public/js/info.js"></script> -->

<?php get_footer() ?>