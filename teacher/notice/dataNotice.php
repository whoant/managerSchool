<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../../class/config.php';

$data = $User->Get_List_Notice($_SESSION['id']);

$i = 1;
foreach ($data as $value) { ?>

	<tr id="<?php echo $value['stt'];?>" class="<?php if ($value['loai'] == 1){ echo 'bg-success text-white'; }else{ echo 'bg-info text-white'; } ?>">
		<th class="text-center"><?php echo $i; ?></th>
		<th class="text-center"><?php echo $value['tieude']; ?></th>
		<th class="text-center"><?php echo $User->Get_ClassGV_Fr_Class($value['den_ai'])['class']; ?></th>
		<th class="text-center"><?php echo date('d/m/Y',strtotime($value['ngay_bd'])); ?></th>
		<th class="text-center"><?php echo date('d/m/Y',strtotime($value['ngay_kt'])); ?></th>
		<th class="text-center"><?php echo $value['thoigian']; ?></th>
		<th class="text-center">
			<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_notice="<?php echo $value['stt'];?>" id="btn_view" title="Chỉnh sửa"> <i class="fa fa-list"></i> 
			</button>
			<button type="button" class="btn btn-icon waves-effect waves-light btn-danger" id_notice="<?php echo $value['stt'];?>" id="btn_del" title="Xoá"> <i class="fa fa-trash-o"></i> 
			</button>
			<button type="button" class="btn btn-dark waves-light waves-effect w-md" id_notice="<?php echo $value['stt']; ?>" id="btn_send" title="Gửi"> <i class="fa fa-send"></i> 
			</button>

		</th>
	</tr>	

	<?php
	$i++;
}
?>
<script>
	$(document).ready(function() {

		$('button#btn_view').click(function() {
			var id_notice = $(this).attr('id_notice');

			$('#ModalEdit').modal();
			$('#myModalLabel').text('SỬA THÔNG BÁO');
			$('button#update_notice').text('CẬP NHẬP');
			$('#myModalLabel').attr('type_button', 'update');
			$.ajax({
				url: 'teacher/notice/changeNotice.php',
				type:'POST',
				dataType: 'html',
				data:{
					type: 'update',
					id_notice: id_notice
				},
				success: function(data){
					$('#noidungsua').html(data);
				}
			});
		});

		$('button#btn_del').click(function(event) {
			var id_notice = $(this).attr('id_notice');
			swal({
				title: 'Bạn có muốn xoá thông báo này hay không ?',
				text: 'Bạn có muốn xoá không?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#4fa7f3',
				cancelButtonColor: '#d57171',
				confirmButtonText: 'Đồng ý',
				cancelButtonText: 'Huỷ'
			}).then(function () {
				$.ajax({
					url: 'teacher/notice/optNotice.php',
					type: 'POST',
					data: {
						id_notice: id_notice,
						type: 'delete'
					},
					success: function(data){
						if (data == 'Success'){
							swal({
								title: 'Thành Công!',
								text: 'Xoá thành công!',
								type: 'success',
								confirmButtonColor: '#4fa7f3'
							});
							$('#showlist').load('teacher/notice/dataNotice.php');
						}

					}
				});

			});
		});

		$('button#btn_send').click(function(){
			var id_notice = $(this).attr('id_notice');
			$.ajax({
				url: 'teacher/notice/optNotice.php',
				type: 'POST',
				data: {
					id_notice: id_notice,
					type: 'send_mes'
				},

				success: function(data){
					if (data == 'Success'){
						swal({
							title: 'Thành Công!',
							text: 'Gửi thành công thành công!',
							type: 'success',
							confirmButtonColor: '#4fa7f3'
						});

					}

				}

			});
			swal({
				title: 'Đang chạy!',
				text: 'Đang gửi thông báo!',
				type: 'question',
				confirmButtonColor: '#4fa7f3'
			});
		});

		
		
	});
</script>	