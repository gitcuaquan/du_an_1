<?php get_header() ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0">
            <h1 class="text-center">Danh Sách Khách Hàng</h1>
            <div class="row">
                <div class="col-10">
                    <table class="table">
                        <?php if (!empty($list_user)) { ?>
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và Tên</th>
                                    <th scope="col">Tài Khoản</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Giới Tính</th>
                                    <th scope="col">Số Điện Thoại</th>
                                    <th scope="col">Trạng Thài Kích Hoạt</th>
                                    <th scope="col">Cấp Độ Thân Thiết</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $t = 1; foreach ($list_user as $user) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $t++; ?></th>
                                        <td><?php echo $user['fullname']; ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['address']; ?></td>
                                        <td><?php echo $user['gender']; ?></td>
                                        <td><?php echo"0". $user['phone']; ?></td>
                                        <td><?php if($user['is_active']==1){echo "<strong class='text-success'>Đã Kích Hoạt</strong>";}else{ echo "<strong class='text-danger'>Chưa Kích Hoạt</strong>";} ?></td>
                                        <td><?php $level = $user['level'];$level_check = array('0'=>"Thường Dân",'1'=>"Địa Chủ",'2'=>'Quan Lớn','3'=>"<strong class='text-warning'>Đế Vương</strong>"); if(array_key_exists($level,$level_check)){
                                            echo $level_check[$level];
                                        } ?></td>
                                    </tr>

                            <?php }
                            } ?>




                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>