<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';

$sData = $Admin->getListClass();
$i = 1;

foreach ($sData as $value) {
	?>
	<tr id="<?php echo $value['id'];?>">
		<td><?php echo $i; ?></td>
		<th><?php echo $value['class']; ?></th>
		<td align="center" >
			<?php 
			
			$name =  $Admin->Get_Class_CN_From_ID($value['id']);
			echo "<font color='blue'>".$name['fullname']."</font>";
			?>

		</td>
		
		<td align="center">
			<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_class="<?php echo $value['id'];?>" class_name="<?php echo $value['class']?>" id="btn_change" title="Sửa"> <i class="fa fa-wrench"></i> 
			</button>
			<button type="button" class="btn btn-icon waves-effect waves-light btn-danger" id_class="<?php echo $value['id'];?>" class_name="<?php echo $value['class']?>" id="btn_del" title="Xoá"> <i class="fa fa-trash-o"></i> 
			</button>
		</td>


		<?php
		$i++;
	}

	?>
	

	<script>
		$(document).ready(function() {

			$('button#btn_change').click(function(event) {
				var id_class = $(this).attr('id_class');

				$('#ModalEdit').modal();
				$('#myModalLabel').text('SỬA THÔNG TIN LỚP');
				$('button#update_class').text('CẬP NHẬP');
				$('#myModalLabel').attr('up_add', 'up');
				$.ajax({
					url: 'xuly/class/changeClass.php',
					type:'POST',
					dataType: 'html',
					data:{
						type: 'update',
						id: id_class
					},

					success: function(data){
						$('#noidungsua').html(data);
					}
				});
			});

			$('button#btn_del').click(function(event) {
				var id_class = $(this).attr('id_class');
				var class_name = $(this).attr('class_name');
				
				swal({
					title: 'Bạn có muốn xoá lớp '+ class_name + ' hay không ?',
					text: 'Bạn có muốn xoá không?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#4fa7f3',
					cancelButtonColor: '#d57171',
					confirmButtonText: 'Đồng ý',
					cancelButtonText: 'Huỷ'
				}).then(function () {
					$.ajax({
						url: 'xuly/class/optClass.php',
						type: 'POST',
						data: {
							id: id_class,
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
								$("tr#"+id_class).remove();
							}

						}
					});

				});
			});
		});
	</script>	