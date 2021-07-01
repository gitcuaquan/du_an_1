<?php get_header() ?>
<div id="wp-content" class="d-flex">
  <?php get_sidebar(); ?>
  <div id="content" class="m-2 ">
    <h1 class="text-center text-uppercase "> các sản phẩm đã nhập</h1>
    <div style="height: 700px;" class=" overflow-auto mt-5 row me-0 ps-3">

      <table class="table">
        <thead class="position-sticky top-0 bg-light py-2">
          <tr>
            <div class="h-table position-sticky top-0 bg-light">
              <th scope="col">STT</th>
              <th scope="col">Tên Sản Phẩm</th>
              <th scope="col">Giá Nhập</th>
              <th scope="col">Giá Bán</th>
              <th scope="col">Loại Sản Phẩm</th>
              <th>Hành Động</th>
            </div>
          </tr>

        </thead>
        <tbody class="pt-4">
          <?php $t = 1;
          foreach ($list_product as $item) { ?>
            <tr>
              <th scope="row"><?php echo $t++; ?></th>
              <td><?php echo $item['product_name']; ?></td>
              <td><?php echo $item['product_cost']; ?></td>
              <td><?php echo $item['product_price']; ?></td>
              <td><?php echo $item['product_category']; ?></td>
              <td><a href="?mod=product&action=edit&cat_id=<?php echo $item['product_id']; ?>" class="text-decoration-none btn btn-info">Sửa Thông Tin</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
<?php get_footer() ?>