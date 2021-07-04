<?php get_header();  ?>
<div class="container-fluid">
    <div class="row pb-5 ">
        <div class="col-md-12 p-0 col-12">
            <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" style="  padding: 10px; border-radius: 50%; width: 10px;" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleCaptions" style="  padding: 10px; border-radius: 50%; width: 10px;" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleCaptions" style=" padding: 10px; border-radius: 50%; width: 10px;" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="height:850px;" src="public/img/banner1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="height:850px;" src="public/img/baner2.jpg" class="d-block w-100" alt="...">

                    </div>
                    <div class="carousel-item">
                        <img style="height:850px;" src="public/img/banner3.jpg" class="d-block w-100" alt="...">

                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left fs-1 text-danger"></i>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right fs-1 text-danger"></i>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div id="policy" class="border-bottom">
        <div class="container  my-5">
            <div class="row pb-5">
                <div class="col-md-3 text-dark policy-item  fs-1 text-center">
                    <img src="public/img/tenor.gif" class="mb-2 img-fluid" alt="">
                    <h4>Vận Chuyển Siêu Tốc</h4>
                </div>
                <div class="col-md-3 policy-item text-center">
                    <img src="public/img/headphone.gif" class=" w-75 img-fluid" alt="">
                    <h4>Tư Vấn Tận Tình</h4>
                </div>
                <div class="col-md-3 policy-item text-center">
                    <img src="public/img/pay.gif" class=" w-75 img-fluid" alt="">
                    <h4>Thanh Toán Đa Dạng</h4>
                </div>
                <div class="col-md-3 policy-item text-center">
                    <img src="public/img/oder.gif" class=" w-75 img-fluid" alt="">
                    <h4>Đặt Hàng Đơn Giản</h4>
                </div>
            </div>
        </div>
        <!-- ===================end banner============================ -->
    </div>
    <div id="product-hot" class="my-5 border-bottom">
        <h1 class="text-center"><strong class="text-danger">TOP</strong> Sản Phẩm Bán Chạy</h1>
        <h4 class="text-center mb-5">Mua Ngay Để Nhận Ưu Đãi Khủng Giảm <strong class="text-danger fs-1">20%</strong> ! Mua Ngay Thôi</h4>
        <div class="container">
            <div class="col-md-12">
                <div id="product-hot_owl" class="owl-carousel py-2 owl-theme">
                    <?php foreach ($list_product_hot as $item) { ?>
                        <div class="item overflow-hidden" style="width:290px;height:500px;">
                            <div class="card card-hot" style="width:290px;height:500px;">
                                <a href="?mod=detail&action=index&id=<?php echo $item['product_id'] ?>">
                                    <img src="<?php echo "admin/" . $item['thumb_url']['img_url']; ?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title overflow-hidden" style="height: 55px;"><?php echo $item['product_name']; ?></h5>
                                    <a href="?mod=cart&action=index&id=<?php echo $item['product_id'] ?>" class="btn btn-buy btn-primary">Thêm Vào Giỏ Hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div id="product-new" class="my-5 border-bottom">
        <h1 class="text-center"> Sản Phẩm Mới </h1>
        <h4 class="text-center mb-5">Xua Tan Nóng Hè Bằng Bộ Sản Phẩm Mới ! Giảm <strong class="text-danger fs-1">15%</strong> Cho Các Sản Phẩm Mới</h4>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="product-new_owl" class="owl-carousel owl-theme">
                        <?php foreach ($list_product_new as $item) { ?>
                            <div class="item overflow-hidden" style="width:290px;height:500px;">
                                <div class="card card-hot" style="width:290px;height:500px;">
                                    <a href="?mod=detail&action=index&id=<?php echo $item['product_id'] ?>">
                                        <img src="<?php echo "admin/" . $item['thumb_url']['img_url']; ?>" class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title card-title-new"><?php echo $item['product_name']; ?></h5>
                                        <div class="btn-bg">
                                            <a href="?mod=cart&action=index&id=<?php echo $item['product_id'] ?>" class="btn btn-buy btn-primary">Thêm Vào Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="news" class="pb-5">
        <h1 class="text-center py-2 px-3  mb-5">Tin Tức Mới</h1>
        <div class="container">
            <div class="row">
                <?php foreach ($list_post as $post) { ?>
                    <div class="col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0" style="height: 270px !important; ">
                                <div class="col-md-4">
                                    <img style="height: 270px;" src="admin/<?php echo $post['thumb_url'] ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="text-decoration-none text-info"> <?php echo $post['post_title'] ?></a></h5>
                                        <div class="card-text overflow-hidden" style="height:150px;">
                                            <?php echo $post['post_content'] ?>
                                        </div>
                                        <p class="card-text m-0"><small class="text-muted"><strong>Cập Nhật:<?php echo $post['create_time'] ?> </strong></small></p>
                                        <p class="card-text"><small class="text-muted"><strong>Người Viết:<?php echo $post['fullname'] ?></strong></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-outline-info">
                <h2>Xem Thêm Tin</h2>
            </button>
        </div>
    </div>
    <script>
        var myCarousel = document.querySelector('#carouselExampleCaptions')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: true
        })
        $(document).ready(function() {
            $("#product-hot_owl").owlCarousel({
                items: 3,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
            });
            $("#product-new_owl").owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                rtl: true,
                autoplayHoverPause: true,
            });
        });
    </script>
    <?php get_footer() ?>