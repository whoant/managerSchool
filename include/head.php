<?php 
// $GLOBALS['server'] = 'http://localhost/tracnghiem/';
// var_dump(dirname(__FILE__));
// echo __FILE__;
include '/class/config_sv.php';
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

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">

                <a href="index.php" class="logo">
                    <i>
                        <img src="<?php echo $GLOBALS['server']; ?>assets/images/icon.png" alt="" height="28">
                    </i>

                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo $GLOBALS['server']; ?>images/avt/<?php echo $avt; ?>.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo $_SESSION['fullname']; ?> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h6 class="text-overflow m-0">Xin chào !</h6>
                        </div>
                        <?php 
                        if ($_SESSION['check'] == 'teacher') {
                            ?>
                            <a href="javascript: Setting()" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>Cài đặt tài khoản</span>
                            </a>
                            <?php
                        }

                        ?>
                        
                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fi-power"></i> <span>Đăng xuất</span>
                        </a>

                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>

            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Quản lý</li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-home"></i><span> Trang Chủ </span>
                        </a>
                    </li>