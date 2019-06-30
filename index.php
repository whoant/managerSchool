	<?php 
	session_start();
	include 'class/config.php';
	if (isset($_SESSION['user']) && isset($_SESSION['fullname'])){
		if ($_SESSION['sex'] == 1) {
			$sex = 'Nam';
		}else{
			$sex = 'Nữ';
		}
		if (file_exists('images/avt/'. $_SESSION['user']. '.jpg')) {
			$avt = 	$_SESSION['user'];
		}else{
			$avt = 'noavt';
		}
		include 'include/head.php';
		if ($_SESSION['check'] == 'student') {
			include 'include/main_student.php';
			
		}else if ($_SESSION['check'] == 'teacher') 
		{
			include 'include/main_teacher.php';
			$User->_Is_GVCN($_SESSION['t_class']);
		
		}else if ($_SESSION['check'] == 'admin')  {
			echo "<script>window.location='admin/index.php';</script>";
		}

		// echo date_format($SESSION['birthday'], "d/m/Y");
	}else{
		// header("Location: login.php");
		echo "<script>window.location='login.php';</script>";
	}


	
	
	?>



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
							<h4 class="page-title float-left">Hồ sơ cá nhân</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">

						<!-- Simple card -->
						<div class="card m-b-30">
							<img class="card-img-top img-fluid" src="images/avt/<?php echo $avt ?>.jpg" alt=<?php echo $_SESSION['user']; ?>>
							<div class="card-body">
								<a href="javascript:Upload()" class="btn btn-primary">Cập nhập ảnh đại diện</a>
							</div>
						</div>
					</div><!-- end col -->
					<div class="col-md-8 col-lg-9">

						<!-- Simple card -->
						<div class="card m-b-30">
							<div class="card-body">
								<h3 class="card-title">Tên : <?php echo $_SESSION['fullname']; ?></h3>
							</div>
							<div class="card-body">
								<h4 class="card-title">Giới tính : <?php echo $sex; ?></h4>
							</div>
							<div class="card-body">

								
								<?php 
								if ($_SESSION['check'] == 'student') {
									echo '<h4 class="card-title">Lớp : '. $_SESSION['class'].'</h4>';
								}elseif ($_SESSION['check'] == 'teacher'){
									
									echo '<h4 class="card-title">Chủ nhiệm lớp : '. $User->GVCN['class'] .'</h4>';
								}
								?>
							</div>
							<div class="card-body">
								<h4 class="card-title">Địa chỉ : <?php echo $_SESSION['address']; ?></h4>
							</div>

							<div class="card-body">
								<h4 class="card-title">Ngày sinh : <?php echo date('d/m/Y',strtotime($_SESSION['birthday'])) ?></h4>
							</div>
							<div class="card-body">
								<h4 class="card-title">Số điện thoại : <?php echo $_SESSION['phone']; ?></h4>
							</div>
							<div class="card-body">
								<h4 class="card-title">Mail : <?php echo $_SESSION['mail']; ?></h4>
							</div>
						</div>
					</div><!-- end col -->

				</div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>

	<?php 
	include 'include/foot.php';
	?>