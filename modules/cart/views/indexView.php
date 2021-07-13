<?php get_header();
$cart_buy = $_SESSION['cart']['buy']; ?>
<div class="container">
    <h1 class="text-center bg-secondary p-2 mt-4 rounded">Giỏ Hàng Của Bạn</h1>
    <div class="row">
        <div class="col-md-9">
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
                            <th scope="col"> Thành Tiền</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $t = 1;
                        foreach ($cart_buy as $cart_item) { ?>
                            <tr>
                                <th scope="row"><?php echo $t++; ?></th>
                                <td><?php echo $cart_item['product_name'] ?> </td>
                                <td><strong><?php echo $cart_item['product_code'] ?></strong></td>
                                <td><?php echo vnd($cart_item['product_price']); ?></td>
                                <td><input class="w-50" type="number" min="1" max="20" value="<?php echo $cart_item['product_qty']; ?>"></td>
                                <td>
                                    <select class="form-select w-75" aria-label="Default select example">
                                        <?php foreach ($cart_item['product_size'] as $size) { ?>
                                            <option class="text-uppercase" value="<?php echo $size['size_name'] ?>"><?php echo $size['size_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><?php echo vnd($cart_item['product_total']); ?></td>
                                <td><button class="btn btn-danger"> <a class="text-decoration-none text-light fw-bold" href="?mod=cart&action=delete&id=<?php echo $cart_item['product_id']; ?>">Xóa Sản Phẩm</a></button></td>
                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
        </div>
        <div class="col-md-3 ">
            <div class="border p-2" id="bill">
                <h3 class="text-center">Hóa Đơn</h3>
                <p id="bill_id">Mã Hóa Đơn </p>
                <strong>Danh Sách Sản Phẩm:</strong>
                <u class="">
                    <li>sản phẩm 1</li>
                    <li>sản phẩm 1</li>
                    <li>sản phẩm 1</li>
                </u>
                <hr>
                <h6>Tống số Lượng:</h6>
                <h6>Tống Giá:</h6>
                <div class="mt-3">
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">Thanh Toán Khi Nhân Hàng</option>
                        <option value="2">Thanh Toán Trực Tuyến</option>
                    </select>
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn  btn-outline-success">Thanh Toán</button>
                </div>
            </div>
        </div>
    <?php  } else {

                echo "   <h1 class=\"text-center text-info p-2  mt-4 rounded\">Chưa Có Sản Phẩm Nào Vui Lòng Thêm Sản Phẩm</h1>";
                echo " <img src=\"public/img/cart.png\" class=\"img-fluid mb-5\"> ";
            } ?>
    </div>
</div>
<?php get_footer() ?>