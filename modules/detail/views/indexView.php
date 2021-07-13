<?php get_header();
// get_sidebar();
for ($i = 0; $i < 3; $i++) {
}

?>


<div class="container">
    <div class="row mt-5 mb-5">

        <div class="col-md-4">
            <div id="img-main">
                <span class='zoom' id='img_show'>
                    <img src='' class="img-fluid" id="img_show-url" style="width:415px;height:550px" />
                </span>
            </div>
            <div id="carousel">
                <div id="show-img-owl" class="owl-carousel owl-theme">
                    <?php for ($i = 1; $i < count($list_img); $i++) { ?>
                        <div class="item">
                            <img src=" <?php echo " admin/" . $list_img[$i]['img_url']; ?>" class="img-fluid img_show" alt="">
                        </div>
                    <?php } ?>



                </div>
            </div>
        </div>

        <div class="col-md-1 "> </div>
        <div class="col-md-5">
            <h4>
                <?php echo $product[0]['product_name'] ?>
            </h4>
            <h5> Mã Sản Phẩm: <strong class="text-info">
                    <?php echo $product[0]['product_code'] ?>
                </strong> </h5>
            <hr>
            <h4>Số Lượng Sản Phẩm</h4>
            <?php foreach ($amount as  $item) { ?>
                <div id="size" class=" w-50 d-flex justify-content-between ">
                    <h4 class="size py-2 text-uppercase d-block">
                        <?php echo "Size :" . $item['size_name'] ?>
                    </h4>
                    <h4 class="border p-2 bg-secondary text-info  d-block">
                        <?php echo $item['amount'] ?>
                    </h4>
                </div>
            <?php } ?>
            <hr>
            <h6><strong class="fs-5">Tổng Quan Sản Phẩm :</strong>
                <?php echo $product[0]['product_desc_short'] ?>
            </h6>
            <hr>
            <h6> <strong class="fs-5">Chi Tết Sản Phẩm :</strong>
                <?php echo $product[0]['product_des'] ?>
            </h6>
            <h3><strong class="text-info">Giá Sản Phẩm : </strong>
                <?php echo vnd($product[0]['product_price']) ?>
            </h3>
            <button class="btn btn-primary"><a href="?mod=cart&action=add&id=<?php echo $id; ?>" class="text-decoration-none text-light fw-bold">Thêm Vào Giỏ
                    Hàng</a></button>
            <button class="btn btn-success"><a href="?mod=cart&action=buy_now" class="text-decoration-none text-light fw-bold">Mua
                    Ngay</a></button>
        </div>
    </div>
    <!-- ===================== end show info ========================================= -->

</div>
<script src="public/js/action.js"></script>
<?php get_footer() ?>