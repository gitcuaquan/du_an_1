<?php get_header();
// get_sidebar();
// show_array($amount);

?>


<div class="container">
    <div class="row mt-5">
        
        <div class="col-md-4">
            <div id="img-main">
                <span class='zoom' id='img_show'>
                    <img src=''  class="img-fluid" id="img_show-url"  style="width:415px;height:550px"   />
                </span>
            </div>
            <div id="carousel">
                <div class="owl-carousel owl-theme">
                    <?php for ($i = 1; $i < count($list_img); $i++) { ?>
                        <div class="item">
                            <img src=" <?php echo "admin/" . $list_img[$i]['img_url']; ?>" class="img-fluid img_show" alt="">
                        </div>
                    <?php } ?>



                </div>
            </div>
        </div>
        <div class="col-md-1"> </div>
        <div class="col-md-5">
            <h4><?php echo $product[0]['product_name']?></h4>
            <h5> Mã Sản Phẩm: <strong class="text-info"> <?php echo $product[0]['product_code']?></strong>  </h5>
            <hr>
            <?php foreach ($amount as  $item) { ?>
              <div id="size" class =" w-25 d-flex justify-content-between ">
               
              <h4 class = "size text-uppercase d-block"> <?php echo $item['size_name'] ?></h4>
               <h4 class = "border  d-block">  <?php echo $item['amount'] ?></h4>
              </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="public/js/action.js"></script>
<?php get_footer() ?>