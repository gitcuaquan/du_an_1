<?php get_header();  ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2  ">
    <h1 class=" text-center"><?php echo form_error("add"); ?></h1>
        <form action="" class="" method="post">
            <div class="ps-2 float-start w-25 mt-3 border ms-2 m-0">
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input1" class=" p-1 rounded bg-info form-label">Tên Đăng Nhập</label>
                        <label class="text-danger" for=""><?php echo form_error('username') ?></label>
                        <input type="text"  name="username" class="form-control" id="input1">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11">
                    <div class="mb-3">
                        <label for="input2" class=" p-1 rounded bg-info form-label">Mật Khẩu</label>
                        <label class="text-danger" for=""><?php echo form_error('password') ?></label>
                        <input type="text" name="password" class="form-control" id="input2">
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="mb-3">
                        <label for="input10" class=" p-1 rounded bg-info form-label">Họ và Tên</label>
                        <label class="text-danger" for=""><?php echo form_error('fullname') ?></label>
                        <input type="text" name="fullname" class="form-control" id="input10">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input3" class=" p-1 rounded bg-info form-label">Địa Chỉ</label>
                        <label class="text-danger" for=""><?php echo form_error('address') ?></label>
                        <input type="text" name="address" class="form-control" id="input3" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input4" class=" p-1 rounded bg-info form-label">Email</label>
                        <label class="text-danger" for=""><?php echo form_error('email') ?></label>
                        <input type="email" name="email" class="form-control" id="input4" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input5" class=" p-1 rounded bg-info form-label">Số Điện Thoại</label>
                        <label class="text-danger" for=""><?php echo form_error('phone') ?></label>
                        <input type="number" name="phone" class="form-control" id="input5" aria-describedby="emailHelp">
                    </div>
                </div>
                <!-- ====================================================================================== -->
                <div class="col-md-11 ">
                    <div class="mb-3">
                        <label for="input6" class=" p-1 rounded bg-info form-label">Giới Tính</label>
                        <label class="text-danger" for=""><?php echo form_error('gender') ?></label>
                        <div class="mb-3">
                            <input type="radio" name="gender" id="male" class="me-2" value="male"><label class="me-4" for="male">Nam</label>
                            <input type="radio" name="gender" id="female" class="me-2" value="female"><label class="me-4" for="female">Nữ</label>
                        </div>

                    </div>
                </div>
               
                <div class="col-md-11 ">
                    <div class="mb-3 text-center">
                        <input type="submit" name="btn_reg" class="btn btn-success" value="Đăng Ký">
                    </div>
                </div>
                <!-- ====================================================================================== -->

            </div>
            <!-- ============= show info ================================ -->
            <div class="border float-end mt-3 me-5" style="width:1000px; height:420px;">
                <h1 class="text-center"> Thẻ Quản Lý</h1>
                <div class="row">
                    <div class="col-3">
                        <img src="" id="qr"  alt="mã QR">
                    </div>
                    <div class="col-8 ms-3 mt-4">
                        <div class="row">
                            <div class=" mt-3 col-8">
                                <h4>Họ và Tên : <strong class="input10"></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Giới Tính: <strong class="gender"></strong> </h4>
                            </div>
                            <div class=" mt-3 col-8">
                                <h4>Số Điện Thoại: <strong class="input5"></strong> </h4>
                            </div>
                            <div class=" mt-3 col-4">
                                <h4>Chức Vụ: <strong>Quản Lý</strong> </h4>
                            </div>
                            <div class=" mt-3 col-7">
                                <h4>Tài Khoản: <strong class="input1""></strong> </h4>
                            </div>

                            <div class=" mt-3 col-12">
                                 <h4>Địa Chỉ : <strong class="input3"></strong> </h4>
                            </div>

                            <div class=" mt-3 col-10">
                                <h4>Email Liên Hệ: <strong class="input4"></strong></h4>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>
<script src="public/js/upload.js"></script>
<script src="public/js/info.js"></script>

<?php get_footer() ?>