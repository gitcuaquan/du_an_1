$(document).ready(function () {
    $(".ip-c").keyup(function (e) {
        const id = $(this).attr('data-index');
        let val = $(this).val();
        $("#"+id).text(val);

    });
    $("#pay").click(function (e) { 
        $("#info_customer").slideDown(500);
    });
    $(".pay-cancel").click(function (e) { 
        $("#info_customer").slideUp(500);
        
    });
    // ============ajaxdelete==================================
    $(".btn-delete").click(function () {
        var id = $(this).attr('id');
        var data = { id: id };
        $.ajax({
            type: "GET",
            url: "?mod=cart&action=delete",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.alert == "success") {
                    $(".r" + id).remove();
                    $("#show_num_oder").text(data.qty);
                }
            }
        });

    });
    // ============================= end ajax==========================

    $(".btn-buy").click(function () {
        var id = $(this).attr('id');
        var data = { id: id };
        $.ajax({
            type: "GET",
            url: "?mod=cart&action=add",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.alert == "success") {
                    $("#show_num_oder").text(data.qty);
                    $("#alert").show(500);
                    $("#alert").html("<p class=\"alert-item\">Thêm Sản Phẩm Thành Công <i class=\"fas px-3 text-success fs-3 fa-check\"></i></p>");
                }
            }
        });
    });

    // ================================================================



    $(".btn-add").click(function () {
        var id = $(this).attr('id');
        var data = { id: id };
        $.ajax({
            type: "GET",
            url: "?mod=cart&action=add",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.alert == "success") {
                    $("#show_num_oder").text(data.qty);
                    $("#alert").show(500);
                    $("#alert").html("<p class=\"alert-item\">Thêm Sản Phẩm Thành Công <i class=\"fas px-3 text-success fs-3 fa-check\"></i></p>");
                }
            }
        });
    });
    function hideAlert() {
        $("#alert").hide(500);
    }
    setInterval(hideAlert, 3000)
});



// =============================== nun oder===========================================
$(".num_oder").change(function () {
    const val = $(this).val();
    const id = $(this).attr("data-id");
    var data = { val: val, id: id };
    $.ajax({
        type: "GET",
        url: "?mod=cart&action=update_num",
        data: data,
        dataType: "json",
        success: function (data) {
            if (data.alert == "success") {
                
                $("#show_num_oder").text(data.qty);
                $("#num").text("Tống số Lượng : " + data.qty);
                $("#t-total").text("Tống Giá : " + data.total);
                const sub_total = data.sub_total;
                $("#sub_total" + id).text(sub_total);
            } else { 
                console.log("error") 
            }
        }
    });
    $(".ajax").change(function(){
        const id = $(this).attr("data-index");
        const size = $(this).val();
        let data = {id:id,size:size}
        $.ajax({
            type: "GET",
            url: "?mod=cart&action=update_size",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.alert == "success") {
                   console.log("ok")
                } else { 
                    console.log("error") 
                }
            }
        });
    });
    

});
// ==================================== size =================================


