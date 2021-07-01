<?php get_header() ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <h1 class="text-center mt-3"> Thêm Sản Phẩm </h1>
        <h3 class="text-center text-danger"><?php echo form_error("add"); ?></h3>
        <h3 class="text-center text-success"><?php echo form_error("success"); ?></h3>
        <form action="" class=" p-3" method="post">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link  active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Thông Tin Chung</button>
                    <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Thông Tin Bổ Xung</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- ====================================thông tin chung===================================== -->
                <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row pt-5 ms-2">
                        <div class="col-md-3">
                            <span class="text-danger"><?php echo form_error("product-name") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input1">Tên Sản Phẩm</span>
                                <input type="text" class="form-control" name="product-name" placeholder="Product name" aria-describedby="input1" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-danger"><?php echo form_error("product-type") ?></span>
                            <div class="input-group mb-3">
                                <div class="mb-3 d-flex">
                                    <span class="input-group-text" id="input1">Loại Sản Phẩm</span>
                                    <select class="form-select" name="product-type" aria-label="Default select example">
                                        <option selected value="">Chọn Loại Quần Áo</option>
                                        <option value="QANA">Thời Trang Nam</option>
                                        <option value="QANU">Thời Trang Nữ</option>
                                        <option value="DV">Đầm Váy</option>
                                        <option value="QATE">Thời Trang Trẻ Em</option>
                                        <option value="PK">Phụ Kiện </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-danger"><?php echo form_error("price") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Giá Bán Sản Phẩm</span>
                                <input type="text" class="form-control" name="price" placeholder="price" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-danger"><?php echo form_error("cost") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Giá Nhập Sản Phẩm</span>
                                <input type="text" class="form-control" name="cost" placeholder="cost" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?php echo form_error("describe-short") ?></span>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Mô Tả Ngắn</span>
                                <input type="text" class="form-control" placeholder="Product Description" name="describe-short" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 pb-3 border">


                            <h3 class="border-bottom text-center">Mô Tả Sản Phẩm</h3>
                            <div class="alert_error text-center">
                                <span class="text-danger "><?php echo form_error("describe") ?></span>
                            </div>
                            <div id="editor">
                                <textarea name="describe" class="ckeditor" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <!-- ======================================================= -->




                        <div class="col-md-4 ms-3 pb-3 border">
                            <h3 class="border-bottom text-center"> Ảnh Đại Diện Sản Phẩm</h3>
                            <div class="alert_error text-center">
                                <span class="text-danger "><?php echo form_error("thumbnail_url") ?></span>
                            </div>
                            <div id="upload_img" class="d-flex">
                                <div id="link_upload" class="d-flex">
                                    <input type="file" name="file" id="file" class='btn ' data-uri="upload_single.php"><br /><br />
                                    <input id="thumbnail_url" type="hidden" name="thumbnail_url" value="" />
                                    <input type="submit" class='btn btn-success' name="Upload" value="Upload" id="upload_single_bt">
                                </div>
                                <div id="show_list_file" style="margin-top: 60px; margin-left: 0px;" class="w-50">
                                    <strong> <span class="text-danger position-absolute text-center w-50 fs-5" id="error-show"></span></strong>
                                </div>
                            </div>
                        </div>




                        <!-- ================================================================================= -->
                        <div class="row mt-3">
                            <div class="col-md-10"></div>
                            <div class="col-md-1">
                                <span id="btn-next" class="btn btn-success"> Tiếp Theo</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- =================================== thông tin bổ sung==================================== -->
                <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="row">
                        <div class="col-md-4 border mt-4">
                            <h3 class="text-center">Số lượng Từng size</h3>
                            <div class="alert_error text-center">
                                <span class="text-danger "><?php echo form_error("product_amount") ?></span>
                            </div>
                            <table class="table  table-secondary table-striped">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="select_all" id="select_all"></td>
                                        <th scope="col">Kích Cỡ</th>
                                        <th scope="col" style="width:200px;">Số Lượng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" idx=1 name="check[]" value="s" id=""></td>
                                        <td>S</td>
                                        <td><input type="number" disabled="disable" min="0" class="size-number" name="product_amount[]" id=""></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" idx=2 name="check[]" value="m" id=""></td>
                                        <td>M</td>
                                        <td><input type="number" disabled="disable" min="0" class="size-number" name="product_amount[]" id=""></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" idx=3 name="check[]" value="l" id=""></td>
                                        <td>L</td>
                                        <td><input type="number" disabled="disable" min="0" class="size-number" name="product_amount[]" id=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" idx=4 name="check[]" value="xl" id=""></td>
                                        <td>XL</td>
                                        <td><input type="number" disabled="disable" min="0" class="size-number" name="product_amount[]" id=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" idx=5 name="check[]" value="xxl" id=""></td>
                                        <td>XXL</td>
                                        <td><input type="number" disabled="disable" min="0" class="size-number" name="product_amount[]" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7 border mt-4 ms-4">
                            <h3 class="text-center">Hình Ảnh Bổ Xung</h3>
                            <div class="alert_error text-center">
                                <span class="text-danger "><?php echo form_error("upload_multi") ?></span>
                            </div>
                            <input type="file" name="images[]" id="files" multiple="">
                            <button type="submit" id="bt_upload" name="bt_upload">Tải lên</button>
                            <div id="result">
                                <img src="public/images/basic-product-thumb.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8"></div>
                        <div class="col-md-3 d-flex"><span id="btn-prev" class="btn mx-3 d-block btn-warning float-end "> Quay Lại</span>
                            <input type="submit" name="btn-add" class=" btn btn-success text-center float-end" value="Hoàn Thành">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="ckeditor/ckeditor/ckeditor.js"></script>
<script src="public/js/upload.js"></script>

<?php get_footer() ?>