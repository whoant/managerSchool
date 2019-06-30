<?php 
session_start();
if ($_SESSION['check'] != 'admin' || !is_numeric($_POST['id_sub'])){
	exit();
}

include '../../../class/config.php';

$id = $_POST['id_sub'];
$type = False;
if($_POST['type'] == 'update'){
	$type = True;
	
}

$query = mysqli_query($Admin->Connect, "SELECT * FROM `subject` WHERE id_sub = '$id'");

$row = mysqli_fetch_assoc($query);
?>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		Mã Môn:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="id" type="text" placeholder="Mã Môn..." value="<?php if($type){ echo $row["id_sub"];}?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Tên Môn:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" id="name" type="text" placeholder="Tên môn..." value="<?php if($type){echo $row["name"];}?>" autofocus="autofocus" >
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Tên ghi tắt:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" id="subject" type="text" placeholder="Không nên để có dấu" value="<?php if($type){echo $row['subject']. '" style="color:#000" disabled ';}else{ echo '"'; }?> >
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#update_subject").click(function(){
			if ($('#myModalLabel').attr('up_add') == 'up') {
				swal({
					title: 'Bạn có muốn thay đổi ?',
					text: "Bạn có muốn thay đổi thông tin môn "+ $('#name').val() +" ?",
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
						url : 'xuly/subject/optSub.php',
						data: {
							opt: 'update',
							id_sub: $('#id').val(),
							name: $('#name').val(),
							subject: $('#subject').val(),
						

						},
						success: function(data){
							if (data == 'Success'){

								$('#showlist').load('xuly/subject/dataSub.php');
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
					title: 'Bạn có muốn thêm môn ?',
					text: "Bạn có muốn thêm môn "+ $('#name').val() +" ?",
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
						url : 'xuly/subject/optSub.php',
						data: {
							opt: 'add',
							id_sub: 1,
							name: $('#name').val(),
							subject: $('#subject').val(),

						},
						success: function(data){
							$('#showlist').load('xuly/subject/dataSub.php');
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