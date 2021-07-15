<?php get_header();
if (isset($_SESSION['cart']['buy'])) {
    $cart_buy = $_SESSION['cart']['buy'];
} ?>
<div class="container">
    <div id="info_customer">
        <div id="wapper">
            <h1 class="text-center text-info py-3 bg-gradient bg-secondary"> Thông Tin Khách Hàng</h1>
            <form action="" method="post">
                <div class="row px-5">
                    <div class="col-md-6">
                        <div class="input-group  mt-3">
                            <span class="input-group-text" data-index="name-c" id="input1">Tên Khách Hàng</span>
                            <input type="text" name="fullname"  data-index="name-c" class="form-control ip-c" placeholder="Full name" aria-label="Username" aria-describedby="input1" />
                        </div>

                        <div class="input-group  mt-3">
                            <span class="input-group-text" id="input2">Email Của Bạn</span>
                            <input type="email" name="email" data-index="email-c" class="form-control ip-c" placeholder="Email" aria-label="Username" aria-describedby="input2" />
                        </div>

                        <div class="input-group  mt-3">
                            <span class="input-group-text" id="input3">Số Điện Thoại</span>
                            <input type="number" name="phone"  data-index="phone-c" class="form-control ip-c" placeholder="phone number" aria-label="Username" aria-describedby="input3" />
                        </div>

                        <div class="input-group  mt-3">
                            <span class="input-group-text" id="input3">Địa Chỉ Nhận</span>
                            <input type="text" name="address" class="form-control ip-c" data-index="address-c" placeholder="address" aria-label="Username" aria-describedby="input3" />
                        </div>
                        <div id="action " class="mt-5 text-center d-flex justify-content-around">
                            <span class="btn px-5 py-3 pay-cancel btn-warning">
                                Hủy Đơn
                            </span>
                            <button name="btn-pay" class="btn px-5 pay-success py-3 btn-success">Xác Nhận</button>
                        </div>
                    </div>
                    <div class="col-md-6 border border-secondary">
                        <h4 class="text-center py-4"> Thông Tin Hóa Đơn</h4>
                        <hr>
                        <Strong class="d-block"> Mã Hóa Đơn : <?php echo $_SESSION['cart']['bill-id']; ?> </Strong>
                        <Strong class="d-block"> Tổng Số Lượng Hàng : <?php echo  $_SESSION['cart']['info']['num_oder']; ?> </Strong>
                        <Strong class="d-block"> Tổng Giá Trị : <?php echo  $_SESSION['cart']['info']['total']; ?> </Strong>
                        <hr>
                        <Strong class="d-block"> Chuyển Đến : <span id="address-c"></span> </Strong>
                        <Strong class="d-block"> Người Nhận : <span id="name-c"></span> </Strong>
                        <Strong class="d-block"> Số Điện Thoại : <span id="phone-c"></span> </Strong>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <h1 class="text-center bg-secondary p-2 mt-4 rounded">Giỏ Hàng Của Bạn</h1>
    <div class="row">
        <div class="col-md-9 <?php if (empty($cart_buy)) {
                                    echo "w-100";
                                } ?>">
            <?php if (!empty($cart_buy)) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Sản Phẩm </th>
                            <th scope="col">Mã Sản Phẩm</th>
                            <th scope="col"> Đơn Giá</th>
                            <th scope="col"> Số Lượng</th>
                            <th scope="col"> Chọn Size</th>
                            <th scope="col" class="width-c"> Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $t = 1;
                        foreach ($cart_buy as $cart_item) { ?>
                            <tr class="<?php echo "r" . $cart_item['product_id']; ?>">
                                <th scope="row"><?php echo $t++; ?></th>
                                <td><a class="text-decoration-none" href="?mod=detail&action=index&id=<?php echo $cart_item['product_id']; ?>"><?php echo $cart_item['product_name'] ?></a> </td>
                                <td><strong><a class="text-decoration-none" href="?mod=detail&action=index&id=<?php echo $cart_item['product_id']; ?>"><?php echo $cart_item['product_code'] ?></a></strong></td>
                                <td><?php echo vnd($cart_item['product_price']); ?></td>
                                <td class=""><input class="w-75 p-1 num_oder" data-id="<?php echo $cart_item['product_id']; ?>" type="number" min="1" max="20" value="<?php echo $cart_item['product_qty']; ?>"></td>
                                <td>
                                    <select data-index="<?php echo $cart_item['product_id']; ?>" class="form-select ajax text-uppercase w-100" aria-label="Default select example">
                                        <?php foreach ($cart_item['product_size'] as $size) { ?>
                                            <option class="text-uppercase" value="<?php echo $size['size_name'] ?>"><?php echo $size['size_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td class="p-3" id="sub_total<?php echo $cart_item['product_id']; ?>"><?php echo vnd($cart_item['product_total']); ?></td>
                                <td><button title="Xóa Sản Phẩm" class="btn  btn-delete btn-danger" id="<?php echo $cart_item['product_id']; ?>"> <i class="fas fs-1 fa-trash-alt"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
        <!--===============================================bill ===================================== -->
        <div class="col-md-3 ">
            <div class="border p-2" id="bill">
                <h3 class="text-center">Hóa Đơn</h3>
                <p id="bill_id">Mã Hóa Đơn : <?php echo $_SESSION['cart']['bill-id']; ?> </p>
                <p>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Mã Giảm Giá</option>
                    </select>
                </div>
                </p>
                <hr>
                <h6 id="num"> <?php if (isset($_SESSION['cart']['info'])) {
                                    echo "Tống số Lượng : " . $_SESSION['cart']['info']['num_oder'];
                                } else {
                                    echo "Tống số Lượng : 0";
                                } ?></h6>
                <h6 id="t-total"> <?php if (isset($_SESSION['cart']['info'])) {
                                        echo "Tống Giá : " . $_SESSION['cart']['info']['total'];
                                    } else {
                                        echo " Tống Giá : 0";
                                    } ?></h6>
                <div class="mt-3">
                    <select class="form-select" aria-label="Default select example">
                        <option value="COD">Thanh Toán Khi Nhân Hàng</option>
                        <option value="babking">Thanh Toán Trực Tuyến</option>
                    </select>
                </div>
                <hr>
                <div class="text-center">
                    <button id="pay" class="btn  btn-outline-success">Thanh Toán</button>
                </div>
            </div>
        </div>
        <!-- ==========================================bill ============================================ -->
    <?php  } else {

                echo "
        <div class=\"text-center \">
         <h1 class=\"text-center text-info p-2  mt-4 rounded\">Chưa Có Sản Phẩm Nào Vui Lòng Thêm Sản Phẩm</h1>
         <img src=\"public/img/cart.png\" class=\"img-fluid mb-5\"> </div>
        ";
            } ?>
    </div>
</div>
<script src="public/js/ajax.js"></script>
<?php get_footer() ?>