$(document).ready(function() {
    $(".item-thumb").click(function() {
        var link = $(this).attr('src');
        $("#thum-product").attr('src', link);
        return false
    });
    $("ul li:first-child").addClass('active');

});