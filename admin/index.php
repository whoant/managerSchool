	<?php 
	session_start();
	include '../class/config.php';
	// $GLOBALS['server'] = 'http://localhost/tracnghiem/';
	include '../class/config_sv.php';
	if ($_SESSION['check'] == 'admin'){
		
		if (file_exists('images/avt/'. $_SESSION['user']. '.jpg')) {
			$avt = 	$_SESSION['user'];
		}else{
			$avt = 'noavt';
		}
		// $Admin= new Admin();
		
		// $Admin->Login($_SESSION['user'], $_SESSION['pass']);


		$total_stu = mysqli_query($Admin->Connect, "SELECT `user` FROM `students`");
		$total_teacher = mysqli_query($Admin->Connect, "SELECT `user` FROM `teachers`");
		$total_class = mysqli_query($Admin->Connect, "SELECT `class` FROM `class`");
		$total_subject = mysqli_query($Admin->Connect, "SELECT `subject` FROM `subject`");
	}else{
		echo "<script>window.location='login.php';</script>";
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
		<link rel="shortcut icon" href="<?php echo $GLOBALS['server']; ?>assets/images/favicon.ico">
		<!-- Sweet Alert css -->
		<link href="<?php echo $GLOBALS['server']; ?>plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
		<link href="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
		<link href="<?php echo $GLOBALS['server']; ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $GLOBALS['server']; ?>/plugins/switchery/switchery.min.css">

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
							<a href="javascript: Setting()" class="dropdown-item notify-item">
								<i class="fi-cog"></i> <span>Cài đặt tài khoản</span>
							</a>
							<!-- item-->
							<a href="../logout.php" class="dropdown-item notify-item">
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



						<li>
							<a href="javascript: void(0);"><i class="fa fa-user"></i> <span> Quản lí người dùng </span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level" aria-expanded="false">
								<li><a href="javascript:GetListTeacher()">Giáo viên</a></li>
								<li><a href="javascript:GetListStudent()">Học sinh</a></li>

							</ul>
						</li>
						<li>
							<a href="javascript: void(0);"><i class="fa fa-graduation-cap"></i> <span> Quản lí trường học </span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level" aria-expanded="false">
								<li><a href="javascript:GetListYear()">Năm học</a></li>

								<li><a href="javascript:GetListClass()">Lớp</a></li>
								<li><a href="javascript:GetListSubject()">Môn học</a></li>
							</ul>
						</li>
						<li>
							<a href="javascript: void(0);"><i class="fa fa-address-book"></i> <span> Quản lí điểm </span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level" aria-expanded="false">
								<li><a href="javascript:GetListMark()">Điểm của học sinh</a></li>
							</ul>
						</li>
						<!-- <li>
							<a href="javascript: void(0);"><i class="fa fa-bullhorn"></i> <span> Thông báo </span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level" aria-expanded="false">
								<li><a href="javascript:Notice_To_Student()">Thông báo cho học sinh</a></li>
							</ul>
						</li> -->
					</ul>

				</div>
				<!-- Sidebar -->
				<div class="clearfix"></div>

			</div>
			<!-- Sidebar -left -->

		</div>
		<!-- Left Sidebar End -->



		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row" id="change">
						<div class="col-12">
							<div class="page-title-box">
								<h4 class="page-title float-left">Bảng điều khiển</h4>
								<div class="clearfix"></div>
							</div>
						</div>

						<div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<div class="card-box tilebox-one">
								<i class="fa fa-user-o float-right"></i>
								<h6 class="text-muted text-uppercase mb-3">Tổng học sinh</h6>
								<h4 class="mb-3" data-plugin="counterup"><?php echo mysqli_num_rows($total_stu); ?></h4>

							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<div class="card-box tilebox-one">
								<i class="fa fa-user-circle-o float-right"></i>
								<h6 class="text-muted text-uppercase mb-3">Tổng giáo viên</h6>
								<h4 class="mb-3" data-plugin="counterup"><?php echo mysqli_num_rows($total_teacher); ?></h4>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<div class="card-box tilebox-one">
								<i class="fa fa-book float-right"></i>
								<h6 class="text-muted text-uppercase mb-3">Tổng môn học</h6>
								<h4 class="mb-3" data-plugin="counterup"><?php echo mysqli_num_rows($total_subject); ?></h4>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<div class="card-box tilebox-one">
								<i class="fa fa-graduation-cap float-right"></i>
								<h6 class="text-muted text-uppercase mb-3">Tổng lớp học</h6>
								<h4 class="mb-3" data-plugin="counterup"><?php echo mysqli_num_rows($total_class); ?></h4>
							</div>
						</div>



					</div>
				</div> <!-- container -->
			</div> <!-- content -->
		</div>



	</div>
	<!-- jQuery  -->
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/popper.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/metisMenu.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/waves.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>admin/js/javascript.js"></script>


	<script src="<?php echo $GLOBALS['server']; ?>plugins/switchery/switchery.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/select2/js/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
	<script src="<?php echo $GLOBALS['server']; ?>plugins/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>


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