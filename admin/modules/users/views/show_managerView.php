<?php get_header();
// show_array($list_manager);

?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <h1 class="text-center text-info mt-4"> Danh Sách Quản Lý</h1>
        <div class="row m-0">
            <div class="col-1"></div>
            <div class="col-8"><?php if (!empty($list_manager)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">STT</th>
                                <th scope="col" class="text-center">Họ Tên</th>
                                <th scope="col" class="text-center">Tài Khoản</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Địa Chỉ</th>
                                <th scope="col" class="text-center">Số Điện Thoại</th>
                                <th scope="col" class="text-center">QR Định Danh</th>
                                <th scope="col" class="text-center">Thao Tác</th>
                            </tr>
                        </thead>
                        <?php $t = 1;
                                    foreach ($list_manager as $user) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $t++ ?></th>
                                    <td ><?php echo $user['user_name'] ?></td>
                                    <td ><?php echo $user['fullname'] ?></td>
                                    <td ><?php echo $user['email'] ?></td>
                                    <td ><?php echo $user['address'] ?></td>
                                    <td ><?php echo "0".$user['phone'] ?></td>
                                    <td> <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=user=<?php echo $user['user_name'] ?>" alt=""></td>
                                    <td class="text-center ">
                                  <div class="d-flex mt-4">
                                  <a class="btn btn-warning me-3" href="?mod=users&action=update_manager&id=<?php echo $user['manager_id'] ?>">sửa</a>
                                    <a href="?mod=users&action=del&id=<?php echo $user['manager_id'] ?>" class="btn btn-danger">Xoá</a>
                                  </div>
                                    </td>
                                </tr>
                            </tbody>

                    <?php   }
                                } ?>
                    </table>
            </div>
           
        </div>
    </div>
</div>
<?php get_footer() ?>