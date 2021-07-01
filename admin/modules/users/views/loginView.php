<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php load('import', 'import_link_global') ?>
    <title>Login</title>

</head>

<body class="bg-dark">
    <div id="wapper">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-4"></div>
                <div class="col-md-5 p-5">
                    <h1 class="text-center text-info mb-5"> Đăng Nhập Admin</h1>
                    <form action="" class="bg-secondary rounded p-5" method="post">
                        <h4 class="text-warning pb-4 text-center"><?php global $error; if(isset($error['login'])&& !empty($error['login'])){
                            echo $error['login'];
                        } ?></h4>
                        <div class="input-group mb-2">
                            <span class="input-group-text fw-bold " id="input1">Tài Khoản</span>
                            <input type="text" class="form-control fw-bold" name="username" placeholder="Username" aria-label="Username" aria-describedby="input1" />
                            
                        </div>
                        <span class="text-warning fw-bold"><?php global $error; if(isset($error['username'])&& !empty($error['username'])){
                            echo $error['username'];
                        } ?></span>
                        <div class="input-group mt-5">
                            <span class="input-group-text fw-bold " id="input1">Mật Khẩu</span>
                            <input type="password" class="form-control fw-bold" name="password" placeholder="Password" aria-label="password" aria-describedby="input1" /><br>
                            
                        </div>
                        <span class="text-warning fw-bold"><?php global $error; if(isset($error['password'])&& !empty($error['password'])){
                            echo $error['password'];
                        } ?></span>
                        <div class="input-group mt-5">
                         <div class="btn_log text-center w-100">
                         <input type="submit" name="btn-login" class="btn btn-success fs-4" value="Đăng Nhập">
                         </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>