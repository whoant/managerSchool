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

// $Admin = new Admin();
$query = mysqli_query($Admin->Connect, "SELECT * FROM `class` WHERE id = '$id'");

$row = mysqli_fetch_assoc($query);
?>


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

		Mã Lớp:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="id" type="text" placeholder="Mã lớp..." value="<?php if($type){ echo $row["id"];}?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Lớp:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="class_name" type="text" placeholder="Lớp ..." value="<?php if($type){ echo $row["class"]. '" style="color:#000" disabled';}else{ echo '"';}?>>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
		Tên giáo viên chủ nhiệm:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-large"></span>
				</div>
				<select id="gv_cn" class="form-control select2">
					<?php 
					if ($type) {
						$Info_Teacher = $Admin->Get_Class_CN_From_ID($row['id']);
						echo '<option value="'.$Info_Teacher['id'].'">'.$Info_Teacher['fullname'].'</option>';
						
					}else{
						echo '<option>Chọn giáo viên chủ nhiệm</option>';
					}
					


					$data_sub = $Admin->GetListSubject();
					// lấy dánh sách môn học
					foreach ($data_sub as $key => $val_sub) {
						echo '<optgroup label="'.$val_sub['name'].'">';
						$data = $Admin->Get_Teacher_Subj($val_sub['subject']);
						foreach ($data as $key => $val_list_teacher_sub) {
							$echo_class_name = $Admin->Get_ClassGV_Fr_Class($val_list_teacher_sub['t_class'])['class'];
							if ($echo_class_name == 0){
								$echo_class_name = 'Chưa có';
							}


							echo '<option value="'.$val_list_teacher_sub['id'].'">'.$val_list_teacher_sub['fullname'].' ('.$echo_class_name.')</option>';
						}
						echo '</optgroup>';
					}	                   
					?>
				</select>
			</div>
		</div>
	</div>
	
</div>

<script>
	$(document).ready(function(){
		$("#update_class").click(function(){
			if ($('#myModalLabel').attr('up_add') == 'up') {
				swal({
					title: 'Bạn có muốn thay đổi ?',
					text: "Bạn có muốn thay đổi thông tin lớp "+ $('#class_name').val() +" ?",
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
						url : 'xuly/class/optClass.php',
						data: {
							opt: 'update',
							id: $('#id').val(),
							class: $('#class_name').val(),
							gv_cn: $('#gv_cn').val(),
							

						},
						success: function(data){
							if (data == 'Success'){

								$('#showlist').load('xuly/class/dataClass.php');
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
			}
			else if($('#myModalLabel').attr('up_add') == 'add') {
				swal({
					title: 'Bạn có muốn thêm lớp ?',
					text: "Bạn có muốn thêm lớp "+ $('#class_name').val() +" ?",
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
						url : 'xuly/class/optClass.php',
						data: {
							opt: 'add',
							id: 1,
							class: $('#class_name').val(),
							gv_cn: $('#gv_cn').val(),
							

						},
						success: function(data){
							$('#showlist').load('xuly/class/dataClass.php');
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