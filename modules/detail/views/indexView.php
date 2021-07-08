<?php get_header();
// get_sidebar();
// show_array($list_img);

?>


<div class="container">
    <div class="row mt-5">
        <div class="col-md-1"> </div>
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
        <div class="col-md-5">

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

    $(document).ready(function() {
        $(".owl-item.active:first img").addClass("show");
        var link = $(".show").attr("src");
        $("#img_show-url").attr("src", link);
        $(".owl-item").click(function() {
            var a = $(this).children().children();
            $(".owl-item .item img.show").removeClass('show')
            $(a).addClass("show");
            var link = $(".show").attr("src");
            $("#img_show-url").attr("src", link);
        });
    });
</script>
<?php get_footer() ?>