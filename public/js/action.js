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
    $(".owl-item.active:first img").addClass("show");
    var link = $(".show").attr("src");
    $("#img_show-url").attr("src", link);
    $(".owl-item").click(function () {
        var a = $(this).children().children();
        $(".owl-item .item img.show").removeClass('show')
        $(a).addClass("show");
        var link = $(".show").attr("src");
        $("#img_show-url").attr("src", link);
    });
});