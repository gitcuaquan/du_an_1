<?php get_header();
// get_sidebar();
// show_array($list_img);
?>


<div class="container">
    <div class="row mt-5">
        <div class="col-md-1"> </div>
        <div class="col-md-4">
            <div id="img-main">
                <img style="width:415px;height:550px" src="<?php echo "admin/".$list_img[0]['img_url'] ?>" class="img-fluid" id="img_show" alt="">
            </div>
            <div id="carousel">
                <div class="owl-carousel owl-theme">
                <?php foreach($list_img as $item){ ?>
                    <div class="item">
                        <img src=" <?php echo"admin/". $item['img_url']; ?>" class="img-fluid" alt="">
                    </div>
               <?php  } ?>
                  
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
    $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
    $(".owl-next").html('<i class="fa fa-chevron-right"></i>');

    $(document).ready(function () {
    //    $(".owl-item.active .item img").click(function () { 
    //    var img = $(this).attr('src')
    //   $("#img_show").attr('src', img);
    //    });
    $(".active").addClass("active_img");
    });
</script>
<?php get_footer() ?>