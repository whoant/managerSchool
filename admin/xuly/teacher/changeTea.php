<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}

include '../../../class/config.php';

$id = $_POST['id'];
$type = False;
if($_POST['type'] == 'update'){
	$type = True;
	
}
$query = mysqli_query($Admin->Connect, "SELECT * FROM `teachers` WHERE id = '$id'");

$row = mysqli_fetch_assoc($query);
?>


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<input type="text" id="id" value="<?php echo $id?>" style="display: none">
		Mã Giáo Viên:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="id" type="text" placeholder="Mã giáo viên..." value="<?php if($type){ echo $row["id"];}?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Họ Tên Giáo Viên:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="fullname" type="text" placeholder="Họ tên giáo viên..." value="<?php if($type){echo $row["fullname"];}?>" autofocus="autofocus" >
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
				<input class="form-control" id="user" type="text" placeholder="Tên tài khoản..." value="<?php if($type){ echo $row["user"];}?>">
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
				<input class="form-control" id="pass" type="text" placeholder="Mật khẩu tài khoản..." value="<?php if($type){  echo $row["pass"];}?>" autofocus="autofocus" >
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
				<input class="form-control" id="birthday" type="date" placeholder="dd/mm/yyyy" value="<?php if($type){  echo $row["birthday"];}?>">
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
					if ($type) {
						if($row['sex'] == 1){
							echo '<option value="1">Nam</option>
							<option value="0">Nữ</option>';	
						}else{
							echo '<option value="0">Nữ</option>
							<option value="1">Nam</option>';	
						}
					}else{
						echo '<option value="1">Nam</option>
						<option value="0">Nữ</option>';
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
				<input class="form-control" id="phone" type="number" placeholder="Số điện thoại..." value="<?php if($type){ echo $row["phone"];}?>">
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
				<input class="form-control" id="address" type="text" placeholder="Địa chỉ..." value="<?php if($type){ echo $row["address"];}?>">
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
				<input class="form-control" id="mail" type="text" placeholder="Email..." value="<?php if($type){ echo $row["mail"];}?>">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Dạy môn :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</div>
				<select id="id_sub" class="form-control">
					<?php 
					$subject_hientai = '';
					if (isset($row['id_sub'])) {
						// $query = mysqli_query($Admin->Connect, "SELECT * FROM `subject` WHERE `id_sub` = ". $row['id_sub']);
						$query = $Admin->Get_Name_Subject($row['id_sub']);
						$subject_hientai = $query['name'];
						echo '<option value="'.$row['id_sub'].'">'.$subject_hientai.'</option>';	
					}else{
						echo '<option value="">Chọn Môn</option>';
					}
					?>

					<?php
					$list_class = $Admin->GetListSubject();

					foreach ($list_class as $key => $list) {
						if ($list['name'] == $subject_hientai){
							continue;
						}


						?>

						<option value="<?php echo $list["id_sub"];?>">
							<?php echo $list["name"]; ?>
						</option>

					<?php } ?>
				</select>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Chủ nhiệm :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</div>
				<select id="t_class" class="form-control">
					<?php 
					if ($row['t_class'] != 0) {

						$resuft = $Admin->Get_ClassGV_Fr_Class($row['t_class']);
						echo '<option value="'.$resuft['id'].'">'.$resuft['class'].'</option>';	
					}else{
						echo '<option value="">Chọn Lớp</option>';
					}
					?>

					<?php
					$list_t_class = $Admin->getListClass();
					foreach ($list_t_class as $key => $list) {
						if ($list['class'] == $resuft['class']) {
							continue;
						}
						?>

						<option value="<?php echo $list["id"];?>">
							<?php echo $list["class"]; ?>
						</option>

					<?php } 
					echo '<option value="0">Không chủ nhiệm</option>';
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Giảng dạy lớp:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-comment"></span>
				</div>
				<input class="form-control" id="s_teacher" type="text" placeholder="Dạy bộ môn lớp..." value="<?php
				if ($type) {
					$s_teacher = json_decode($row['s_teacher'], true);
					$resuft = '';
					foreach ($s_teacher as $data) {
						$resuft .=  $Admin->Get_ClassGV_Fr_Class($data)['class']. ' ';
					}
					echo $resuft;
				}
				?>">
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#update_stu").click(function(){

			if ($('#myModalLabel').attr('up_add') == 'up') {

				swal({
					title: 'Bạn có muốn thay đổi ?',
					text: "Bạn có muốn thay đổi thông tin giáo viên?",
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
						url : 'xuly/teacher/optTea.php',
						data: {
							opt: 'update',
							id: $('#id').val(),
							user: $('#user').val(),
							pass: $('#pass').val(),
							fullname: $('#fullname').val(),
							birthday: $('#birthday').val(),
							address: $('#address').val(),
							sex: $('#sex').val(),
							t_class: $('#t_class').val(),
							s_teacher: $('#s_teacher').val(),
							id_sub: $('#id_sub').val(),
							phone: $('#phone').val(),			
							mail: $('#mail').val(),	
						},
						success: function(data){
							if (data == 'Success'){

								$.ajax({
									url: 'xuly/teacher/dataTea.php',
									type: 'POST',
									dataType: 'html',
									data: {
										subject : $("#dulieumon").val()
									},
									success: function(resuft){
										$('#showlist').html(resuft);
									}
								});

								console.log($("#dulieumon").val());

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
				);
			} else if ($('#myModalLabel').attr('up_add') == 'add') {
				swal({
					title: 'Bạn có muốn thêm giáo viên ?',
					text: "Bạn có muốn thêm giáo viên "+ $('#fullname').val() +" ?",
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
						url : 'xuly/teacher/optTea.php',
						data: {
							opt: 'add',
							id: 1,
							user: $('#user').val(),
							pass: $('#pass').val(),
							fullname: $('#fullname').val(),
							birthday: $('#birthday').val(),
							address: $('#address').val(),
							sex: $('#sex').val(),
							t_class: $('#t_class').val(),
							s_teacher: $('#s_teacher').val(),
							id_sub: $('#id_sub').val(),
							phone: $('#phone').val(),			
							mail: $('#mail').val(),	

						},
						success: function(data){
							$('#showlist').load('xuly/teacher/optTea.php');
							if (data == 'Success'){
								swal({
									title: 'Thành Công!',
									text: 'Thêm thành công!',
									type: 'success',
									confirmButtonColor: '#4fa7f3'
								});
							}else{
								swal({
									title: 'Lỗi!',
									text: 'Không thêm thành công!',
									type: 'error',
									confirmButtonColor: '#4fa7f3'
								});
							}
						}
					});
				}, 
				);
			}


		});
	});

</script>