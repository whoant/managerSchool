    <?php 
    session_start();
    // $GLOBALS['server'] = 'http://localhost/tracnghiem/';
    include '../class/config_sv.php';
    if ($_SESSION['check'] == 'admin') {
     echo "<script>window.location='index.php';</script>";
 }elseif ($_SESSION['check'] == 'student' || $_SESSION['check'] == 'teacher') {
    echo "<script>window.location='../index.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>2VHT StuDy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $GLOBALS['server']; ?>assets/images/favicon.ico">
    <!-- Sweet Alert css -->
    <link href="<?php echo $GLOBALS['server']; ?>plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo $GLOBALS['server']; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $GLOBALS['server']; ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $GLOBALS['server']; ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $GLOBALS['server']; ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo $GLOBALS['server']; ?>assets/js/modernizr.min.js"></script>

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
                                    
                                    <h6 class="text-uppercase text-center font-bold mt-4">Đăng nhập Quản Trị Viên</h6>
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

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <!-- <input type="button" name="" id="submit"> -->
                                                <button class="btn btn-block btn-gradient waves-effect waves-light" type="submit">Đăng nhập</button>
                                            </div>
                                        </div>

                                    </form>



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
</div>
<!-- jQuery  -->
<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/popper.min.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/waves.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/javascript.js"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo $GLOBALS['server']; ?>plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/pages/jquery.sweet-alert.init.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/pages/jquery.toastr.js" type="text/javascript"></script>

<!-- App js -->
<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.core.js"></script>
<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.app.js"></script>

</body>
</html>
<?php 

        // include 'config/config.php';



if (isset($_POST['username']) && isset($_POST['password'])) {
       // include '../class/config.php';
 include '../class/class.php';
 $Admin = new Admin();
 $Admin->Login($_POST['username'], $_POST['password']);
}
?>
