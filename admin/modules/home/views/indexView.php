<?php get_header();
?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0">
            <div id="" class="col-md-3 bg-info bg-gradient rounded m-4  cuso  ">
                <h4 class="fw-bold fs-2">Tổng Đơn Trong Tháng</h4>
                <p class="fs-4 text-dark fw-bold">20 đơn</p>
                <p class="fs-4"><i class="fas fa-hand-point-right me-3"></i>Chi tiết</p>
            </div>
            <div id="" class="col-md-3 bg-warning bg-gradient rounded m-4 cuso ">
                <h4 class="fw-bold fs-2">Tổng Doanh Thu Tháng</h4>
                <p class="fs-4 text-dark fw-bold">20.000.000 VND</p>
                <p class="fs-4"><i class="fas fa-hand-point-right me-3"></i>Chi tiết</p>
            </div>
            <div id="" class="col-md-3 bg-primary bg-gradient rounded m-4 cuso ">
                <h4 class="fw-bold fs-2">Đơn Hàng Chờ Xử Lý</h4>
                <p class="fs-4 text-dark fw-bold">20 đơn</p>
                <p class="fs-4"><i class="fas fa-hand-point-right me-3"></i>Chi tiết</p>
            </div>
        </div>
        <div id="chart">
            <div id="chart_div" style="width: 1500px; height: 600px;"></div>
        </div>
    </div>
</div>


</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php get_footer(); ?>