$(document).ready(function () {
    $("ul.side-menu li").not(":first-child").click(function () { 
       if(!$(this).hasClass("active")){
           $("ul.side-menu li.active").removeClass("active");
           $(this).addClass("active");
           $("ul.side-menu li .sub-menu").slideUp(300)
           $(this).children('.sub-menu').stop().slideToggle(300);
       }else{
           $(this).removeClass("active");
           $("ul.side-menu li .sub-menu").slideUp(300);
          
       }  
    });
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
      // Some raw data (not necessarily accurate)
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Thời Trang Nam', 'Thời Trang Nữ', 'Thời Trang Trẻ Em', 'Đầm Váy', 'Phụ Kiện', 'Doanh Thu'],
        ['2004/05',  165,      938,         522,             998,           450,      614.6],
        ['2005/06',  135,      1120,        599,             1268,          288,      682],
        ['2006/07',  157,      1167,        587,             807,           397,      623],
        ['2007/08',  139,      1110,        615,             968,           215,      609.4],
        ['2008/09',  136,      691,        890,             1026,          366,      569.6]
      ]);

      var options = {
        title : 'Tổng Quan Sản Phẩm và Giá Trị',
        vAxis: {title: 'SỐ lƯỢNG '},
        hAxis: {title: 'Tháng'},
        seriesType: 'bars',
        series: {5: {type: 'line'}}
      };

      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
 });