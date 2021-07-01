<?php get_header();
$id  = $product_id;
$list_img = get_multi_img($id);
// show_array($list_img);

foreach($list_img as $key=>$img){
  if($key!=0){
    $img_url[$key]=$img['img_url'];
  }
}

$url = get_thumb_by_id($img_id);
// show_array($img_url);
$check_type = array(
    "Thời Trang Nam" => 'QANA',
    "Thời Trang Nữ" => 'QANU',
    'Thời Trang Trẻ Em' => 'QATE',
    'Đầm Váy' => 'DV',
    'Phụ Kiện' => 'PK'
);
if (array_key_exists($product_category, $check_type)) {
    $product_type = $check_type[$product_category];
}


?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <h1 class="text-center mt-3"> Sửa Thông Tin Sản Phẩm </h1>
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
                                <input type="text" class="form-control fw-bold text-primary" name="product-name" value="<?php echo $product_name; ?>" placeholder="Product name" aria-describedby="input1" />
                            </div>
                        </div>
                        <div class="col-md-3">
                        <span class="text-danger"><?php echo form_error("product-type") ?></span>
                            <div class="input-group mb-3">
                                <div class="mb-3 d-flex">
                                    <span class="input-group-text" id="input1">Loại Sản Phẩm</span>
                                    <select class="form-select" name="product-type" aria-label="Default select example">
                                        <option selected value="">Chọn Loại Quần Áo</option>
                                        <option <?php if ($product_type == 'QANA') echo "selected" ?> value="QANA">Thời Trang Nam</option>
                                        <option <?php if ($product_type == 'QANU') echo "selected" ?> value="QANU">Thời Trang Nữ</option>
                                        <option <?php if ($product_type == 'DV') echo "selected" ?> value="DV">Đầm Váy</option>
                                        <option <?php if ($product_type == 'QATE') echo "selected" ?> value="QATE">Thời Trang Trẻ Em</option>
                                        <option <?php if ($product_type == 'PK') echo "selected" ?> value="PK">Phụ Kiện </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <span class="text-danger"><?php echo form_error("price") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Giá Bán Sản Phẩm</span>
                                <input type="text" class="form-control fw-bold text-primary" value="<?php echo $product_price; ?>" name="price" placeholder="price" />
                            </div>
                        </div>
                        <div class="col-md-3">
                        <span class="text-danger"><?php echo form_error("cost") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Giá Nhập Sản Phẩm</span>
                                <input type="text" class="form-control fw-bold text-primary" value="<?php echo $product_cost; ?>" name="cost" placeholder="cost" />
                            </div>
                        </div>
                        <div class="col-md-12">
                        <span class="text-danger"><?php echo form_error("describe-short") ?></span>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="input2">Mô Tả Ngắn</span>
                                <input type="text" class="form-control fw-bold text-primary" value="<?php echo $product_desc_short; ?>" placeholder="Product Description" name="describe-short" />
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
                                <textarea name="describe" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php echo $product_des; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 ms-3 pb-3 border">
                            <h3 class="border-bottom text-center"> Ảnh Đại Diện Sản Phẩm</h3>
                            <div class="alert_error text-center">
                                <strong><span class="text-danger text-center w-25 fs-5" id="error-show"></span></strong>
                            </div>
                            <div id="upload_img" class="d-flex">
                                <div id="link_upload" class="d-flex">
                                    <input type="file" name="file" id="file" class='btn ' data-uri="upload_single.php"><br /><br />
                                    <input id="thumbnail_url" type="hidden" name="thumbnail_url" value="<?php echo $url['img_url'];  ?>" />
                                    <input type="submit" class='btn btn-success' name="Upload" value="Upload" id="upload_single_bt">
                                </div>
                                <div id="show_list_file" style="margin-top: 60px ;" class="w-50">
                                    <strong> <span class="text-danger position-absolute text-center w-50 fs-5" id="error-show"></span></strong>
                                    <?php 
                            echo "<img id='img_old' name=\"\" style =\"width: 285px;paddin:0;margin:0;height: 350px;\" src=\"{$url['img_url']}\"/>" ?>
                                </div>
                            </div>

                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 d-flex">
                                <input type="submit" value="Xoá Sản Phẩm" name ="btn_del" class="btn me-2 btn-danger">
                                <input type="submit" value="Sửa Thông Tin" name ="btn_edit" class="btn btn-warning">
                          <a href="?mod=product&action=show" class=" btn btn-info ms-3 text-decoration-none text-dark"> Huỷ </a> 
                            </div>
                            <div class="col-md-7"></div>
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
                           <strong> <p class="text-canter text-warning"> vui lòng click <strong class="text-danger">2 lần</strong> các size muồn sửa</p></strong>
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
                                        <td><input type="checkbox" idx=1 <?php  echo isset_size("s",$id); ?> name="check[]" value="s" id="ip_1"></td>
                                        <td><label for="ip_1">S</label></td>
                                        <td><input  type="number" <?php if(!isset_size_check('s',$id)){echo "disabled='disabled'";} ?> min="0" class="size-number" value="<?php  echo amount('s',$id); ?>" name="product_amount[]" id=""></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"  <?php  echo isset_size("m",$id); ?>  idx=2 name="check[]" value="m" id="ip_2"></td>
                                        <td><label for="ip_2">M</label></td>
                                        <td><input type="number"<?php if(!isset_size_check('m',$id)){echo "disabled='disabled'";} ?> min="0" class="size-number" value="<?php  echo amount('m',$id); ?>" name="product_amount[]" id=""></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"   <?php  echo isset_size("l",$id); ?>  idx=3 name="check[]" value="l" id="ip_3"></td>
                                        <td><label for="ip_3">L</label></td>
                                        <td><input type="number"<?php if(!isset_size_check('l',$id)){echo "disabled='disabled'";} ?> min="0" class="size-number" value="<?php  echo amount('l',$id); ?>" name="product_amount[]" id=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"   <?php  echo isset_size("xl",$id); ?>  idx=4 name="check[]" value="xl" id="ip_4"></td>
                                        <td><label for="ip_4">XL</label></td>
                                        <td><input type="number"<?php if(!isset_size_check('xl',$id)){echo "disabled='disabled'";} ?> min="0" class="size-number" value="<?php  echo amount('xl',$id); ?>" name="product_amount[]" id=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"  <?php  echo isset_size("xxl",$id); ?>   idx=5 name="check[]" value="xxl" id="ip_5"></td>
                                        <td><label for="ip_5">XXL</label></td>
                                        <td><input type="number" <?php if(!isset_size_check('xxl',$id)){echo "disabled='disabled'";} ?> min="0" class="size-number" value="<?php  echo amount('xxl',$id); ?>" name="product_amount[]" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7 border mt-4 ms-4">
                            <h3 class="text-center">Hình Ảnh Bổ Xung</h3>
                            <div class="alert_error text-center">

                            </div>
                            <input type="file" name="images[]" id="files" multiple="">
                            <button type="submit" id="bt_upload" name="bt_upload">Tải lên</button>
                            <div id="result">
                            <?php foreach($img_url as $item){
                               ?><input type="hidden" class="multi_old" name="multi_old[]" value="<?php echo $item; ?> ">
                                <img  src="<?php if(!($item==$url))echo $item; ?> " style="width:130px; height:200px;margin:5px" alt="" class="img_old">
                           <?php  } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2 d-flex">
                            <input type="submit" value="Xoá Sản Phẩm" name = "btn_del" class="btn me-2 btn-danger">
                            <a href="?mod=product&action=show" class=" btn btn-info ms-3 text-decoration-none text-dark">Huỷ </a> 
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3 d-flex"><span id="btn-prev" class="btn mx-3 d-block btn-warning float-end "> Quay Lại</span>
                            <input type="submit" name="btn_edit" class=" btn btn-success text-center float-end" value="Hoàn Thành">
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