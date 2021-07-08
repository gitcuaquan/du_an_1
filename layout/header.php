<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/global.css">
  <link rel="stylesheet" href="public/owl_carosel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="public/owl_carosel/assets/owl.theme.default.min.css">
  <script src="public/js/lib/jquery-3.5.0.js"></script>
  <script src="public/owl_carosel/owl.carousel.min.js"></script>
  <script src="public/js/bootstrap/bootstrap.min.js"></script>
  <script src="public/js/header.js"></script>
  <link rel="icon" href="public/img/logoquan.png" type="image/x-icon">
  <title>Mạnh Quân Store</title>
</head>

<body>
  <div id="header" class="position-absolute w-100">
    <div id="wp-header" class="bg-dark position-fixed w-100">
      <div class="container ">
        <div class="row">
          <div class="col-md-2">
            <a href="#">
              <img src="public/img/logoquan.png" class="img-fluid" alt="">
            </a>
          </div>
          <!-- ============== logo ======================= -->
          <div class="col-md-8  mt-2">
            <div id="header-menu">
              <ul id="main-menu" class="d-flex justify-content-between align-middle">
                <li class="menu-item pt-3 list-unstyled"><a href="?mod=home&action=index" class="text-decoration-none fw-bolder text-light fs-4">Trang Chủ</a></li>
                <li id="drop-menu" class="menu-item pt-3 list-unstyled"><a href="#" class="text-decoration-none fw-bolder text-light fs-4">Thời Trang <i class="icon-1 fas fa-chevron-circle-down"></i></a>
                  <!-- ===============drop-menu======================= -->
                  <span style="display: block;width:180px;height: 20px;"></span>
                  <ul id="sub-menu" class="position-absolute px-3  pb-2 rounded">
                    <li class="sub-item py-2 px-1 list-unstyled"><a class="text-decoration-none fw-bolder fs-5" href="#">Thời Trang Nam</a></li>
                    <li class="sub-item py-2 px-1 list-unstyled"><a class="text-decoration-none fw-bolder fs-5" href="#">Thời Trang Nữ</a></li>
                    <li class="sub-item py-2 px-1 list-unstyled"><a class="text-decoration-none fw-bolder fs-5" href="#">Thời Trang Trẻ Em</a></li>
                    <li class="sub-item py-2 px-1 list-unstyled"><a class="text-decoration-none fw-bolder fs-5" href="#">Đầm Váy</a></li>
                  </ul>
                  <!--=========================== end-drop-menu===================== -->
                </li>

                <li class="menu-item pt-3 list-unstyled"><a href="#" class="text-decoration-none fw-bolder text-light fs-4">Phụ Kiện</a></li>
                <li class="menu-item pt-3 list-unstyled"><a href="#" class="text-decoration-none fw-bolder text-light fs-4">Tin Tức</a></li>
                <li class="menu-item pt-3 list-unstyled"><a href="#" class="text-decoration-none fw-bolder text-light fs-4">Chính Sách</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 d-flex">
            <h3 class="pt-3 mt-2 ms-4">
              <input id="search-ip" placeholder="Nhập Sản Phẩm Muốn Tìm" type="search" class="position-absolute">
              <i class="fas text-danger p-1 icon-2 position-absolute fs-1  fa-times"></i>
              <i id="search" class="fas fs-2  text-light fa-search"></i>
            </h3>
            <h3 class="pt-3" id="login"><a href="#" class="text-decoration-none fw-bolder text-light"><i class=" icon ms-5 mt-1 fs-1 fas fa-sign-in-alt"></i><span class=" bg-dark title-log p-1  text-info">Đăng Nhập</span></a></h3> 
            
             <h3 class="pt-3" id="cart"><a href="?mod=cart&action=index" class="text-decoration-none fw-bolder text-light"><i class="ms-5 mt-2 fs-2 fas fa-shopping-cart"></i> <span class="num-oder">0 </span></a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ================================ end Header ============================ -->
  <div id="content">