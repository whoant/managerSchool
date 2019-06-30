<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	header('location: ../../index.php');
	exit();
}

include '../../../class/config.php';

$id = $_POST['id_hk'];
$type = False;
if($_POST['type'] == 'update'){
	$type = True;
	
}

// $Admin = new Admin();
$query = mysqli_query($Admin->Connect, "SELECT * FROM `term` WHERE id_hk = ".$id);

$row = mysqli_fetch_assoc($query);
?>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		Mã Học Kỳ:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="id" type="text" placeholder="Mã học kỳ..." value="<?php if($type){ echo $row["id_hk"];}?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Năm :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" id="year" type="text" placeholder="Năm..." value="<?php if($type){echo $row["year"];}?>" autofocus="autofocus" >
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Học Kỳ:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<select id="type" class="form-control select2">
					<?php if ($row['type'] == 2){
						echo '<option value="2">Học Kỳ 2</option>
					<option value="1">Học Kỳ 1</option>';
					}else {
						echo '<option value="1">Học Kỳ 1</option>
					<option value="2">Học Kỳ 2</option>';
					} ?>
					
					
				</select>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		
		$("#update_year").click(function(){
			if ($('#myModalLabel').attr('up_add') == 'up') {
				swal({
					title: 'Bạn có muốn thay đổi ?',
					text: "Bạn có muốn thay đổi thông tin năm "+ $('#year').val() +" ?",
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
						url : 'xuly/year/optYear.php',
						data: {
							opt: 'update',
							id: $('#id').val(),
							year: $('#year').val(),
							type: $('#type').val(),
						

						},
						success: function(data){
							if (data == 'Success'){

								$('#showlist').load('xuly/year/dataYear.php');
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
					title: 'Bạn có muốn thêm năm ?',
					text: "Bạn có muốn thêm năm "+ $('#year').val() +" ?",
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
						url : 'xuly/year/optYear.php',
						data: {
							opt: 'add',
							id: 1,
							year: $('#year').val(),
							type: $('#type').val(),

						},
						success: function(data){
							$('#showlist').load('xuly/year/dataYear.php');
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