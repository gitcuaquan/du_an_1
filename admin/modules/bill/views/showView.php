<?php get_header();
?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0 p-5">
            <h1 class="text-center text-info">Danh Sách Đơn Hàng</h1>
            <?php if (!empty($list_bill)) { ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Mã Đơn Hàng</th>
                      <th scope="col">Tên Người Nhận</th>
                      <th scope="col">Email</th>
                      <th scope="col">Số Điện Thoại</th>
                      <th scope="col">Địa Chỉ</th>
                      <th scope="col">Trạng Thái</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($list_bill as $item){ ?>
                        <tr>
                      <th scope="row"><a href="?mod=bill&action=detail&bill=<?php echo $item['bill_code']; ?>" class="text-decoration-none"><?php echo $item['bill_code']; ?></a></th>
                      <td><?php echo $item['name']; ?></td>
                      <td><?php echo $item['email']; ?></td>
                      <td><?php echo $item['phone']; ?></td>
                      <td><?php echo $item['address']; ?></td>
                      <td><?php if($item['level']==0){echo " <p class='text-danger m-0 fw-bold'>chưa xác nhận</p>";}else{
                          echo " <p class='text-success m-0 fw-bold'>Đã xác nhận</p>";
                      } ?></td>
                    </tr> 
                     <?php  } ?>
                  </tbody>
                </table>
                
                
                <?php } ?>
        </div>
    </div>


</div>

<?php get_footer(); ?>