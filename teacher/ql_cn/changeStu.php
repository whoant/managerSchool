<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}

include '../../class/config.php';

$id = $_POST['id'];
// $Admin = new Admin();
$query = mysqli_query($User->Connect, "SELECT * FROM `students` WHERE id = '$id'");

$row = mysqli_fetch_assoc($query);
?>


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<input type="text" id="id" value="<?php echo $id?>" style="display: none">
		Mã Học Sinh:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="id" type="text" placeholder="Mã học sinh..." value="<?php echo $row["id"]?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Họ Tên Học Sinh:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="fullname" type="text" placeholder="Họ tên học sinh..." value="<?php echo $row["fullname"]?>" autofocus="autofocus" >
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Tên tài khoản:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-large"></span>
				</div>
				<input class="form-control" id="user" type="text" placeholder="Tên tài khoản..." value="<?php echo $row["user"]?>">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Mật khẩu:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" id="pass" type="text" placeholder="Mật khẩu tài khoản..." value="<?php echo $row["pass"]?>" autofocus="autofocus" >
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Ngày Sinh:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
				<input class="form-control" id="birthday" type="date" placeholder="dd/mm/yyyy" value="<?php echo $row["birthday"]?>">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Giới tính:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-phone"></span>
				</div>
				<select id="sex" class="form-control">
					<?php 
					if($row['sex'] == 1){
						echo '<option value="1">Nam</option>
						<option value="0">Nữ</option>';	
					}else{
						echo '<option value="0">Nữ</option>
						<option value="1">Nam</option>';	
					}

					?>
					

				</select>
			</div>
		</div>
	</div>
	
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Số Điện Thoại:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-phone"></span>
				</div>
				<input class="form-control" id="phone" type="number" placeholder="Số điện thoại..." value="<?php echo $row["phone"]?>">
			</div>
		</div>
	</div>
	
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Địa chỉ:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-comment"></span>
				</div>
				<input class="form-control" id="address" type="text" placeholder="Địa chỉ..." value="<?php echo $row["address"]?>">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Email:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-email"></span>
				</div>
				<input class="form-control" id="mail" type="text" placeholder="Email..." value="<?php echo $row["mail"]?>">
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

		ID FaceBook:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-list-alt"></span>
				</div>
				<input class="form-control" id="id_facebook" type="number" placeholder="ID của FB" value="<?php echo $row["id_facebook"]?>">
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#update_stu").click(function(){
			swal({
				title: 'Bạn có muốn thay đổi ?',
				text: "Bạn có muốn thay đổi thông tin học sinh ?",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Thay đổi',
				cancelButtonText: 'Huỷ',
				confirmButtonClass: 'btn btn-success',
				cancelButtonClass: 'btn btn-danger m-l-10',
				buttonsStyling: false
			}).then(function () {

				$.ajax({
					type: 'POST',
					url : 'teacher/ql_cn/optStu.php',
					data: {
						opt: 'update',
						id: $('#id').val(),
						fullname: $('#fullname').val(),
						user: $('#user').val(),
						pass: $('#pass').val(),
					
						phone: $('#phone').val(),
						birthday: $('#birthday').val(),
						id_facebook: $('#id_facebook').val(),
						address: $('#address').val(),
						sex: $('#sex').val(),
						mail: $('#mail').val(),
					},
					success: function(data){
						if (data == 'Success'){

							$.ajax({
								url: 'teacher/ql_cn/dataStu.php',
								type: 'POST',
								dataType: 'html',
								data: {
									class_name : $("#dulieulop").val()
								},
								success: function(resuft){
									$('#showlist').html(resuft);
								}
							});
							
							console.log($("#dulieulop").val());

							swal({
								title: 'Thành Công!',
								text: 'Cập nhập thành công!',
								type: 'success',
								confirmButtonColor: '#4fa7f3'
							});
						}
						
					}
				});
			}, 
			)
		});
	});

</script>