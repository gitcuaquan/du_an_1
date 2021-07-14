<?php get_header();
if (isset($_SESSION['cart']['buy'])) {
    $cart_buy = $_SESSION['cart']['buy'];
} ?>
<div class="container">
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
                            <th scope="col"> Thành Tiền</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $t = 1;
                        foreach ($cart_buy as $cart_item) { ?>
                            <tr class="<?php echo "r" . $cart_item['product_id']; ?>">
                                <th scope="row"><?php echo $t++; ?></th>
                                <td><?php echo $cart_item['product_name'] ?> </td>
                                <td><strong><?php echo $cart_item['product_code'] ?></strong></td>
                                <td><?php echo vnd($cart_item['product_price']); ?></td>
                                <td class=""><input class="w-75 p-1 num_oder" data-id="<?php echo $cart_item['product_id']; ?>" type="number" min="1" max="20" value="<?php echo $cart_item['product_qty']; ?>"></td>
                                <td>
                                    <select class="form-select text-uppercase w-100" aria-label="Default select example">
                                        <?php foreach ($cart_item['product_size'] as $size) { ?>
                                            <option class="text-uppercase" value="<?php echo $size['size_name'] ?>"><?php echo $size['size_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td  id="sub_total<?php echo $cart_item['product_id']; ?>"><?php echo vnd($cart_item['product_total']); ?></td>
                                <td><button class="btn  btn-delete btn-danger" id="<?php echo $cart_item['product_id']; ?>"> Xóa Sản Phẩm</button></td>
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
                <p><div class="mb-3">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Mã Giảm Giá</option>
                  </select>
                </div></p>
                <hr>
                <h6 id="num"> <?php if(isset($_SESSION['cart']['info'])){echo "Tống số Lượng : ". $_SESSION['cart']['info']['num_oder']; }else{echo "Tống số Lượng : 0";} ?></h6>
                <h6 id="t-total"> <?php if(isset($_SESSION['cart']['info'])){echo "Tống Giá : ". $_SESSION['cart']['info']['total']; }else{echo " Tống Giá : 0";} ?></h6>
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