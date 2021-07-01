$(document).ready(function () {
    $("#drop-menu").hover(function () {
           $("#sub-menu").stop().slideToggle(); 
        }, function () {
            $("#sub-menu").stop().slideToggle(); 
        }
    );
    $("#login").hover(function () {
            $(".title-log").stop().slideToggle();
        }, function () {
            $(".title-log").stop().slideToggle();
        }
    );
    $("#search").click(function () { 
       $("#search-ip").slideToggle(200);
      $(".icon-2").slideToggle(200);
      $(".icon-2").addClass("icon-2-e");
    });
    $(".icon-2").click(function () { 
        $("#search-ip").slideToggle(500);
        $(".icon-2").slideToggle(200);
        $(".icon-2").removeClass("icon-2-e");
    });
});