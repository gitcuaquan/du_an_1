
$(function () {
    var inputFile = $('#file');
    $('#upload_single_bt').click(function (event) {
        var URI_single = $('#form-upload-single #file').attr('data-uri');
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append('file', fileToUpload);
        $.ajax({
            url: "?mod=product&action=upload_img",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                if (data.status == 'ok') {
                    $("#img_old").remove();
                    $('#thumbnail_url').val('')
                    showThumbUpload(data);
                    $('#thumbnail_url').val(data.file_path);
                }
                if (data.status == "error") {
                    console.log(data.error);
                    $("#error-show").html(data.error);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });

    function showThumbUpload(data) {
        var items;
        items = '<img style ="width: 285px;padding:0;margin-left:100px;height: 350px;" src="' + data.file_path + '"/>';
        $('#show_list_file').html(items);
    }

});

// ==================================upload nhiều ảnh =============================
$("#bt_upload").click(function () {
    // var data = new FormData(this);
    var inputFile = $('#files');
    var fileToUpload = inputFile[0].files;
    if (fileToUpload.length > 0) {
        // alert(fileToUpload.length);
        var formData = new FormData();
        for (var i = 0; i < fileToUpload.length; i++) {
            var file = fileToUpload[i];
            formData.append('file[]', file, file.name);
        }
        $.ajax({
            url: '?mod=product&action=upload_multi_img',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'text',
            success: function (data) {
                $(".multi_old").remove();
                $(".img_old").remove();
                $("#result").html(data);
                // console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
    //alert('ok');
    return false;
});


$(document).ready(function () {
    $("#btn-next").click(function () {
        $("#nav-home").toggleClass('active')
        $("#nav-home").toggleClass("show");
        $("#nav-profile").toggleClass('active');
        $("#nav-profile").toggleClass('show');
        $("#nav-home-tab").toggleClass('active');
        $("#nav-profile-tab").toggleClass('active');
    });
    $("#btn-prev").click(function () {
        $("#nav-home").toggleClass('active')
        $("#nav-home").toggleClass("show");
        $("#nav-profile").toggleClass('active');
        $("#nav-profile").toggleClass('show');
        $("#nav-home-tab").toggleClass('active');
        $("#nav-profile-tab").toggleClass('active');
    });
    $('#select_all').change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $("input[name='select_all").change(function () {
        if (this.checked) {
            $("input[type='number'].size-number").removeAttr('disabled');
        } else {
            $("input[type='number'].size-number").attr('disabled', 'disabled');
            $("input[type='number'].size-number").val('');
        }
    });

    $("input[name='check[]']").change(function () {
        idx = $(this).attr('idx');
        if (this.checked) {
            $("input[type='number'].size-number").eq(idx - 1).removeAttr('disabled');
        } else {
            $("input[type='number'].size-number").eq(idx - 1).attr('disabled', 'disabled');
            $("input[type='number'].size-number").eq(idx - 1).val('');
        }
    });


});