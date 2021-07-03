<?php
function construct()
{
   load('lib', 'validation');
}

function loginAction()
{
   global $error;

   if (isset($_POST['btn-login'])) {
      if (empty($_POST['username'])) {
         $error['username'] = " Tài Khoản Còn Trống";
      } else {
         if (is_username($_POST['username'])) {
            $username = $_POST['username'];
         } else {
            $error['username'] = "Tài Khoản Không Đúng Định Dạng";
         }
      }
      /**
       * --------------------------------------------------
       *  XỬ LÝ USERNAME
       * --------------------------------------------------------
       */
      if (empty($_POST['password'])) {
         $error['password'] = " Mật Khẩu Còn Trống";
      } else {
         if (is_password($_POST['password'])) {
            $password = md5($_POST['password']);
         } else {
            $error['password'] = "Mật Khẩu Không Đúng Định Dạng";
         }
      }
      /**
       * ------------------------------------------------------------
       * XỬ LÝ PASSWORD
       * ----------------------------------------------------------------
       */
      if (empty($error)) {
         load_model('index');
         if (check_user($username, $password)) {
            $info = get_user_by_username($username);
            $_SESSION['is_login'] = true;
            $_SESSION['fullname'] = $info['fullname'];
            redirect('?mod=home&controller=index&action=index');
         } else {
            $error['login'] = "đăng nhập thất bại";
         }
      }
   }
   load_view('login');
}

function show_userAction()
{
   load_model('index');
   $list_user = get_all_user();
   $data = array('list_user' => $list_user);
   load_view('show_user',$data);
}
function show_managerAction()
{
   load_model('index');
   $list_manager = get_all_manager();
   $data = array('list_manager' => $list_manager);

   load_view('show_manager', $data);
}
function p($string)
{
   return $_POST[$string];
}
function addAction()
{
   global $error;
   if (isset($_POST['btn_reg'])) {
   

      if (empty(p('fullname'))) {
         $error['fullname'] = "Chưa Nhập Họ và Tên";
      } else {
         $fullname = p('fullname');
      }
      //  ===================== full name ========================================
      if (empty(p('username'))) {
         $error['username'] = "chưa nhập tên đăng nhập";
      } else {
         if (!is_username(p('username'))) {
            $error['username'] = "Tài Khoản Chưa Đúng Định Dạng Yêu Cầu";
         } else {
            $username = p('username');
         }
      }
      // ======================================= username ==================================
      if (empty(p('password'))) {
         $error['password'] = "chưa nhập tên Mật Khẩu";
      } else {
         if (!is_password(p('password'))) {
            $error['password'] = "Mật Khẩu Chưa Đúng Định Dạng Yêu Cầu";
         } else {
            $password = md5(p('password'));
         }
      }
      // =================================== password =============================================
      if (empty(p('email'))) {
         $error['email'] = "chưa nhập email";
      } else {
         if (!is_email(p('email'))) {
            $error['email'] = "Email Chưa Đúng Định Dạng Yêu Cầu";
         } else {
            $email = p('email');
         }
      }
      // =================================email=============================
      if (empty(p('address'))) {
         $error['address'] = "Chưa nhập Địa Chỉ";
      } else {
         $address = p('address');
      }
      // =========================== address =====================================
      if (empty(p('phone'))) {
         $error['phone'] = "Chưa Nhập Số Điện Thoại";
      } else {
         if (is_phone(p('phone'))) {
            $phone = p('phone');
         } else {
            $error['phone'] = "Chưa Đúng Định Dạng Số Điện Thoại";
         }
      }
      // ================================== phone ===========================
      if (!isset($_POST['gender'])) {
         $error['gender'] = "Chưa Chọn Giới Tính";
      } else {
         $gender = p('gender');
      }

      if (empty($error)) {
         load_model('index');
         if (!check_isset_user($username, $email)) {
            $data = array(
               'user_name' => $username,
               'password' => $password,
               'fullname' => $fullname,
               'email' => $email,
               'address' => $address,
               'phone' => $phone,
               'gender' => $gender
            );
            db_insert("tbl_manager", $data);
            $error['add'] = "thêm Quản Lý Hoàn Tất";
         } else {
            $error['add'] = "thêm thất bại ! Tài Khoản Hoạc Email Đã Được Đăng ký";
         }
      } else {
         $error['add'] = "thêm thất bại";
      }




      //=================================== end validate ==========================================
   }
   $data = array('error' => $error);
   load_view('add', $data);
}
function update_managerAction()
{
   load_model('index');
   $id = $_GET['id'];
   $manager = get_manager_by_id($id);
   $data = array('manager' => $manager);

   if (isset($_POST['btn_cancel'])) {
      redirect('?mod=users&action=show_manager');
   }
   if (isset($_POST['btn_update'])) {
      global $error;

      if (empty(p('fullname'))) {
         $error['fullname'] = "Chưa Nhập Họ và Tên";
      } else {
         $fullname = p('fullname');
      }
      //  ===================== full name ========================================

      if (empty(p('email'))) {
         $error['email'] = "chưa nhập email";
      } else {
         if (!is_email(p('email'))) {
            $error['email'] = "Email Chưa Đúng Định Dạng Yêu Cầu";
         } else {
            $email = p('email');
         }
      }
      // =================================email=============================
      if (empty(p('address'))) {
         $error['address'] = "Chưa nhập Địa Chỉ";
      } else {
         $address = p('address');
      }
      // =========================== address =====================================
      if (empty(p('phone'))) {
         $error['phone'] = "Chưa Nhập Số Điện Thoại";
      } else {
         if (is_phone(p('phone'))) {
            $phone = p('phone');
         } else {
            $error['phone'] = "Chưa Đúng Định Dạng Số Điện Thoại";
         }
      }
      // ================================== phone ===========================
      if (!isset($_POST['gender'])) {
         $error['gender'] = "Chưa Chọn Giới Tính";
      } else {
         $gender = p('gender');
      }

      if (empty($error)) {
       
         $data_update = array(
            'fullname' => $fullname,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'gender' => $gender
         );
        db_update("tbl_manager",$data_update,"`manager_id`= {$id} ");
         // db_insert("tbl_manager",$data);
         $error['update'] = "Sửa Thông Tin Quản Lý Hoàn Tất";
      } else {
         $error['update'] = "Sửa Thông Tin Thất Bại! Có Vị Trí Còn Trống";
      }
   }
   load_view('update', $data);
}
function delAction()
{
   $id =$_GET['id'];
   db_delete("tbl_manager","`manager_id`=$id");
   redirect("?mod=users&action=show_manager");

}
function logoutAction(){
   unset($_SESSION['is_login']);
   redirect("?mod=users&action=login");
}
function info_meAction(){
 
}