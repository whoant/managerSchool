<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	header('location: ../index.php');
	exit();
}
include '../../class/config.php';
// $data = $Admin->getListClass();
	// $Admin = new Admin();
?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Cài đặt tài khoản</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-12">
	<div class="card-box">
		<div class="row">
			<div class="col-12">
				<div class="p-20">
					<form class="form-horizontal" role="form">
						<div class="form-group row">
							<label class="col-2 col-form-label">Tài khoản</label>
							<div class="col-10">
								<input type="text" class="form-control" value="<?php echo $_SESSION['user']; ?>" id="username">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-2 col-form-label">Mật khẩu</label>
							<div class="col-10">
								<input type="text" class="form-control" value="<?php echo $_SESSION['pass']; ?>" id="password">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label" for="example-email">Email</label>
							<div class="col-10">
								<input type="email" id="email" name="example-email" class="form-control" value="<?php echo $_SESSION['mail']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Số điện thoại</label>
							<div class="col-10">
								<input type="number" class="form-control" value="<?php echo $_SESSION['phone']; ?>" id="phone">
							</div>
						</div>
						



					</form>
					
					<center><button type="submit" class="btn btn-primary" id="btn_update">Cập nhập</button></center>
					
				</div>
			</div>

		</div>
		<!-- end row -->

	</div> <!-- end card-box -->
</div><!-- end col -->

<script>
	$(document).ready(function(){
		$('#btn_update').click(function(){
			$.ajax({
				url: 'xuly/edit.php',
				type: 'POST',
				data:{
					user : $('#username').val(),
					pass : $('#password').val(),
					mail : $('#email').val(),
					phone : $('#phone').val()

				},
				success: function(data){
					if (data == 'Success') {
						swal({
							title: 'Thành Công!',
							text: 'Cập nhập thành công!',
							type: 'success',
							confirmButtonColor: '#4fa7f3'
						});
						location.href = location.href;
						
						
					}else{
						swal({
							title: 'Thất bại!',
							text: 'Cập nhập thất bại!',
							type: 'error',
							confirmButtonColor: '#4fa7f3'
						});
					}
				}

			})
		});
	});
</script>