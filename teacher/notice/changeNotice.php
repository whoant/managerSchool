<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}

include '../../class/config.php';

$type = False;
if($_POST['type'] == 'update'){
	$type = True;
	$row = $User->Get_Notice_Fr_ID($_POST['id_notice'], $_SESSION['id']);	
	
}
$sList_Class = $User->Get_List_Class_Subject($_SESSION['s_teacher']);// $Admin = new Admin();

?>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		Tiêu đề :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" id="tieude" id_notice="<?php echo $_POST['id_notice']; ?>" type="text" placeholder="Tiêu đề..." value="<?php if($type){echo $row["tieude"];}?>" autofocus="autofocus" >
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		Nội dung :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<textarea class="form-control" id="noidung" rows="5" style="margin-top: 0px; margin-bottom: 0px; height: 108px;" placeholder="Nôi dung của thông báo" ><?php if($type){echo $row["noidung"];}?></textarea>
				
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Lớp :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<select class="form-control" id="den_ai">
					<?php 
					foreach ($sList_Class as $key => $value) {
						echo '<option value="'.$value['id'].'">'.$value['class'].'</option>';
					}
					?>
				</select>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="thoi_gian">
		Gửi vào lúc :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<select class="form-control" id="thoigian">

					<?php 
					if ($type) {
						echo '<option value="'.$row['thoigian'].'">'.$row['thoigian'].'</option>';
					}
					for ($i = 1; $i< 24; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_ngbd">
		Ngày bắt đầu :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" type="date" id="ngay_bd" min="<?php echo date('Y-m-d'); ?>" value="<?php if ($type){ echo $row['ngay_bd']; }else{ echo date('Y-m-d'); } ?>">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_ngkt">
		Ngày kết thúc :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
				<input class="form-control" type="date" id="ngay_kt" min="<?php echo date('Y-m-d'); ?>" value="<?php if ($type){ echo $row['ngay_kt']; }else{ echo date('Y-m-d'); } ?>">
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

		$("button#update_notice").click(function(){
			var tieude = $('#tieude').val();
			var id_notice = $('#tieude').attr('id_notice');
			var noidung = $('#noidung').val();
			var den_ai = $('#den_ai').val();
			var ngay_bd = $('#ngay_bd').val();
			var ngay_kt = $('#ngay_kt').val();
			var thoigian = $('#thoigian').val();
			var type_btn = $('#myModalLabel').attr('type_button');
			
			if (type_btn == 'update') {
				// console.log('update');
				$.ajax({
					url: 'teacher/notice/optNotice.php',
					type:'POST',
					dataType: 'html',
					data:{
						type: 'update',
						id_notice: id_notice,
						tieude: tieude,
						noidung: noidung,
						den_ai: den_ai,
						ngay_bd: ngay_bd,
						ngay_kt: ngay_kt,
						thoigian: thoigian,
					},

					success: function(data){
						if (data == 'Success') {

							swal({
								title: 'Thành Công!',
								text: 'Cập nhập thành công!',
								type: 'success',
								confirmButtonColor: '#4fa7f3'
							});
							$('#showlist').load('teacher/notice/dataNotice.php');
						}
						
					}
				});
			}else if(type_btn == 'add'){
				if (tieude != '' && noidung != '' && den_ai != '' && ngay_bd != '' && ngay_kt != '' && thoigian != '') {
					$.ajax({
						url: 'teacher/notice/optNotice.php',
						type:'POST',
						dataType: 'html',
						data:{
							type: 'add',
							tieude: tieude,
							noidung: noidung,		
							den_ai: den_ai,
							ngay_bd: ngay_bd,
							ngay_kt: ngay_kt,
							thoigian: thoigian,
						},
						success: function(data){
							if (data == 'Success') {
								$('#showlist').load('teacher/notice/dataNotice.php');
							}
						}
					});
				} else {
					swal({
						title: 'Lỗi!',
						text: 'Không thêm thành công!',
						type: 'error',
						confirmButtonColor: '#4fa7f3'
					});
				}
			}

		});
	});
</script>