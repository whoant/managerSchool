<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';

$sData = $Admin->GetListSubject();
$i = 1;

foreach ($sData as $value) {
	?>
	<tr id="<?php echo $value['id_sub'];?>">
		<td><?php echo $i; ?></td>
		<th><?php echo $value['name']; ?></th>
		
		<td><?php echo $value['subject']; ?></td>
		

		<td align="center">
			<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_class="<?php echo $value['id_sub'];?>" id="btn_change" title="Sửa"> <i class="fa fa-wrench"></i> 
			</button>
			<button type="button" class="btn btn-icon waves-effect waves-light btn-danger" id_class="<?php echo $value['id_sub'];?>" id="btn_del" title="Xoá"> <i class="fa fa-trash-o"></i> 
			</button>
		</td>


		<?php
		$i++;
	}

	?>
	

	<script>
		$(document).ready(function() {

			$('button#btn_change').click(function() {
				var id_class = $(this).attr('id_class');

				$('#ModalEdit').modal();
				$('#myModalLabel').text('SỬA THÔNG TIN MÔN');
				$('button#update_subject').text('CẬP NHẬP');
				$('#myModalLabel').attr('up_add', 'up');
				$.ajax({
					url: 'xuly/subject/changeSub.php',
					type:'POST',
					dataType: 'html',
					data:{
						type: 'update',
						id_sub: id_class
					},

					success: function(data){
						$('#noidungsua').html(data);
					}
				});
			});

			$('button#btn_del').click(function(event) {
				var id_class = $(this).attr('id_class');
				swal({
					title: 'Bạn có muốn xoá môn này hay không ?',
					text: 'Bạn có muốn xoá không?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#4fa7f3',
					cancelButtonColor: '#d57171',
					confirmButtonText: 'Đồng ý',
					cancelButtonText: 'Huỷ'
				}).then(function () {
					$.ajax({
						url: 'xuly/subject/optSub.php',
						type: 'POST',
						data: {
							id_sub: id_class,
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