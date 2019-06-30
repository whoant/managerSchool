<?php 
session_start();
if ($_SESSION['check'] == 'student' || $_SESSION['check'] == 'teacher') {
 echo "<script>window.location='index.php';</script>";
}elseif ($_SESSION['check'] == 'admin') {
   echo "<script>window.location='admin/index.php';</script>"; 
} 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>cMark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="cMark" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Sweet Alert css -->
    <link href="plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>
<body class="bg-accpunt-pages">

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-logo-box">
                                    <!-- <h2 class="text-uppercase text-center">
                                        <a href="index.php" class="text-success">
                                            <span><img src="assets/images/icon.png" alt="" height="18"></span>
                                        </a>
                                    </h2> -->
                                    <h6 class="text-uppercase text-center font-bold mt-4">Đăng nhập</h6>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="POST">

                                        <div class="form-group m-b-20 row">
                                            <div class="col-12">
                                                <label for="username">Tài khoản</label>
                                                <input class="form-control" type="text" id="username" name="username" required="" placeholder="Điền tài khoản của bạn">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">

                                                <label for="password">Mật khẩu</label>
                                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Điền mật khẩu của bạn">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-20">
                                            <div class="col-6">
                                                <div class="checkbox checkbox-success">
                                                    <div class="radio radio-purple">
                                                        <input type="radio" name="radio" id="radio1" value="1" checked="">
                                                        <label for="radio1">
                                                            Học Sinh
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="radio radio-success">
                                                    <input type="radio" name="radio" id="radio2" value="2">
                                                    <label for="radio2">
                                                        Giáo Viên
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <!-- <input type="button" name="" id="submit"> -->
                                                <button class="btn btn-block btn-gradient waves-effect waves-light" type="button" id="btn_login">Đăng nhập</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row m-t-50">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted">Nếu bạn không có tài khoản? <a href="register.php" class="text-dark m-l-5"><b>Đăng ký</b></a></p>
                                        </div>
                                    </div>

                                        <div class="col-sm-12 text-center">
                                            <button type="button" class="btn btn-facebook waves-effect waves-light" onclick="location.href='https://m.me/1049729895180014';">
                                            <i class="fa fa-facebook m-r-5"></i> Facebook
                                        </button>
                                        </div>
                                    

                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <?php 
    include 'include/foot.php';
    // include 'config/config.php';
    ?>
