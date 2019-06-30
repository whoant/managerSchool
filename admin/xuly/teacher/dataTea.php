<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';

$sData = $Admin->Get_Teacher_Subj(addslashes($_POST['subject']));
$i = 1;
foreach ($sData as $value) {
	?>
	<tr id="<?php echo $value['id'];?>">
		<td><?php echo $i; ?></td>
		<th><?php echo $value['fullname']; ?></th>
		<td><?php echo $id; ?></td>
		<td><?php echo date('d/m/Y',strtotime($value['birthday'])); ?></td>
		<td><?php echo $value['address']; ?></td>
		<td><?php echo $value['phone']; ?></td>
		<td><?php echo $value['mail']; ?></td>
		<td><?php
			if ($value['t_class'] == 0) {
				echo '<font color="red"><span>Không chủ nhiệm</span></font>';
			}else{
				$query = mysqli_query($Admin->Connect, "SELECT `class` FROM `class` WHERE `id` = '".$value['t_class']."'");
				// var_dump(mysqli_fetch_assoc($query));
				
				echo '<font color="blue"><span>'.mysqli_fetch_assoc($query)['class'].'</span></font>';
			}	

			?>
		</td>
		<td>
			<?php 
			$s_teacher = json_decode($value['s_teacher'], true);
			$resuft = '';
			foreach ($s_teacher as $data) {
				$resuft .=  $Admin->Get_ClassGV_Fr_Class($data)['class']. ' ';
			}
						echo '<font color="green"><span>'.$resuft.'</span></font>'
			?>
		</td>

	<td align="center">
		<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_gv="<?php echo $value['id'];?>" id="btn_change" title="Sửa"> <i class="fa fa-wrench"></i> 
		</button>
		<button type="button" class="btn btn-icon waves-effect waves-light btn-danger"id_gv="<?php echo $value['id'];?>" id="btn_del" title="Xoá"> <i class="fa fa-remove"></i> 
		</button>
	</td>


	<?php
	$i++;
}

?>
<script>
	$(document).ready(function() {

		$('button#btn_change').click(function(event) {
			var giaovien = $(this).attr('id_gv');
			$('#ModalEdit').modal();
			$('#myModalLabel').text('SỬA THÔNG TIN GIÁO VIÊN');
			$('button#update_stu').text('CẬP NHẬP');
			$('#myModalLabel').attr('up_add', 'up');
			$.ajax({
				url: 'xuly/teacher/changeTea.php',
				type:'POST',
				dataType: 'html',
				data:{
					id: giaovien,
					type: 'update'

				},

				success: function(data){
					$('#noidungsua').html(data);
				}
			});
		});

		$('button#btn_del').click(function(event) {
			var giaovien = $(this).attr('id_gv');
			swal({
				title: 'Bạn có muốn xoá giáo viên này không?',
				text: 'Bạn có muốn xoá không?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#4fa7f3',
				cancelButtonColor: '#d57171',
				confirmButtonText: 'Đồng ý',
				cancelButtonText: 'Huỷ'
			}).then(function () {
				$.ajax({
					url: 'xuly/teacher/optTea.php',
					type: 'POST',
					data: {
						id: giaovien,
						opt: 'delete'
					},
					success: function(data){
						if (data == 'Success'){
							swal({
								title: 'Thành Công!',
								text: 'Xoá thành công!',
								type: 'success',
								confirmButtonColor: '#4fa7f3'
							});
							$("tr#"+giaovien).remove();
						}
						
					}
				});

			});
		});
	});
</script>	