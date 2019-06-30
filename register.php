<?php 
session_start();
include 'class/class.php';
$Connect = new Connect_Database();
if ($_SESSION['check'] == 'student' || $_SESSION['check'] == 'teacher') {
	echo "<script>window.location='index.php';</script>";
}elseif ($_SESSION['check'] == 'admin') {
	echo "<script>window.location='admin/index.php';</script>"; 
};
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
	<link href="plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" type="text/css" />
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
									<h2 class="text-uppercase text-center">
										<a href="index.php" class="text-success">
											<span><img src="assets/images/logo_dark.png" alt="" height="18"></span>
										</a>
									</h2>
									<h6 class="text-uppercase text-center font-bold mt-4">Đăng kí</h6>
								</div>
								<div class="account-content">
									<form class="form-horizontal" method="POST">
										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="username">Tài khoản</label>
												<input class="form-control" type="text" id="username" name="username" required="" placeholder="Điền tài khoản của bạn vào" value="">
											</div>
										</div>


										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="password">Mật khẩu</label>
												<input class="form-control" type="password" required="" id="password" name="password" placeholder="Điền mật khẩu của bạn vào" value="">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="fullname">Họ và tên</label>
												<input class="form-control" type="text" id="fullname" name="fullname" required="" placeholder="Điền họ tên của bạn vào" value="">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="class">Học lớp</label>
												<select class="form-control" name="class" id="class">
													<?php 
													$sql = "SELECT `class` FROM `class`";
													$query = mysqli_query($Connect->Connect, $sql);
													while ($resuft = mysqli_fetch_array($query) ){
														echo '<option value="'.$resuft[0].'">'.$resuft[0].'</option>';
													}
													
													?>
												</select>
											</div>
										</div>


										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="sex">Giới tính</label>
												<select class="form-control" name="sex" id="sex">
													<option value="1">Nam</option>
													<option value="0">Nữ</option>
												</select>
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="emailaddress">Địa chỉ email</label>
												<input class="form-control" type="email" id="emailaddress" 
												name="emailaddress" required="" placeholder="Điền địa chỉ email vào" value="">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="phone">Số điện thoại</label>
												<input class="form-control" type="number" id="phone" 
												name="phone" required="" placeholder="Điền số điện thoại vào đây" value="">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="address">Địa chỉ nhà ở</label>
												<input class="form-control" type="text" id="address" name="address" required="" placeholder="Điền địa chỉ của bạn vào" value="">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="birthday">Ngày tháng năm sinh</label>
												<input class="form-control" type="date" id="birthday" name="birthday">
											</div>
										</div>


										<div class="form-group row text-center m-t-10">
											<div class="col-12">

												<button class="btn btn-block btn-gradient waves-effect waves-light" type="button" id="btn_reg">Đăng Kí</button>
											</div>
										</div>
									</form>

									<div class="row m-t-50">
										<div class="col-sm-12 text-center">
											<p class="text-muted">Bạn đã có tài khoản?  <a href="login.php" class="text-dark m-l-5"><b>Đăng nhập</b></a></p>
										</div>
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
	<?php 
	include 'include/foot.php';
	?>