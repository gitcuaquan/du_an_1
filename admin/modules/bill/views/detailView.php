<?php get_header();
?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0 p-5">
            <h1 class="text-center text-success">Chi Tiết Đơn Hàng <?php echo $bill_code ?></h1><hr>
            <div class="col-md-6">
                <h6>Người Nhận : <?php echo $info_bill['name'] ?></h6>
                <h6>Email: <?php echo $info_bill['email'] ?> </h6>
                <h6>Địa Chỉ : <?php echo $info_bill['address'] ?> </h6>
                <h6>Điện Thoại: <?php echo $info_bill['phone'] ?> </h6>
            </div>
            <div class="col-md-6">
                <h6>Tổng Sản Phẩm  :  <?php echo $product['info']['num_oder'] ?> </h6>
                <h6>Tổng Tiền :  <?php echo $product['info']['total'] ?> </h6>
            </div>
            <hr>

            <?php

            foreach ($product['buy'] as $item) {
                $id =  $item['product_id'];
                $img = get_img_by_id($id);
            ?>
                <div class="card mx-2" style="width: 13rem;">
                    <img src="<?php echo $img['img_url'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['product_name'] ?></h5>
                        <p class="card-text m-0">Số lượng : <?php echo $item['product_qty'] ?> </p>
                        <p class="card-text">Tổng Giá: <?php echo $item['product_price'] ?> </p>
                        <a href="?mod=product&action=edit&cat_id=<?php echo $id ?>" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


</div>

<?php get_footer(); ?>