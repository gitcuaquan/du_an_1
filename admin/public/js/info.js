$(document).ready(function() {
    var linkQr = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=0";
    $("#qr").attr("src", linkQr);
    $(".form-control").keyup(function(e) {
        let id = $(this).attr("id");
        let val = $("#" + id).val();
        $("." + id).text(val);
      if( id == "input1"){
        var linkQr = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=username="+val;
        $("#qr").attr("src", linkQr);
      }
       
    });
   $("input:radio").click(function () { 
   var check= $(this).val();
       if(check == 'female'){
           var gender = "Nữ"
       }else{
        var gender = "Nam"
       }
       $(".gender" ).text(gender);
   });



});