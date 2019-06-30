<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';

$sData = $Admin->getListYear();
$i = 1;

foreach ($sData as $value) {
	?>
	<tr id="<?php echo $value['id_hk'];?>" <?php if ($value['main'] == 1) { echo 'class="bg-success text-white"'; }?>>
		<td><?php echo $i; ?></td>
		<th><?php echo $value['year']; ?></th>
		<th><?php 
		if ($value['type'] == 1) {
			echo 'Học Kỳ 1';
		} else {
			echo 'Học Kỳ 2';
		}
		 ?></th>
	
		<td align="center">
			<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_class="<?php echo $value['id_hk'];?>" id="btn_change" title="Sửa" name_year="<?php echo $value['year'] ?>" type_year="<?php echo $value['type'] ?>"> <i class="fa fa-wrench"></i> 
			</button>
			<button type="button" class="btn btn-icon waves-effect waves-light btn-danger" id_class="<?php echo $value['id_hk'];?>" id="btn_del" title="Xoá" name_year="<?php echo $value['year'] ?>" type_year="<?php echo $value['type'] ?>"> <i class="fa fa-trash-o"></i> 
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
				$('#myModalLabel').text('SỬA HỌC KÌ');
				$('button#update_class').text('CẬP NHẬP');
				$('#myModalLabel').attr('up_add', 'up');
				$.ajax({
					url: 'xuly/year/changeYear.php',
					type:'POST',
					dataType: 'html',
					data:{
						type: 'update',
						id_hk: id_class
					},

					success: function(data){
						$('#noidungsua').html(data);
					}
				});
			});

			$('button#btn_del').click(function(event) {
				var id_class = $(this).attr('id_class');
				var name_year = $(this).attr('name_year');
				var type_year = $(this).attr('type_year');
				if (type_year == 1) {
					type_year = 'Học Kì 1';
				} else {
					type_year = 'Học Kì 2';
				}
				

				swal({
					title: 'Bạn có muốn xoá "'+type_year+'" của năm "'+name_year+'" hay không ?',
					text: 'Bạn có muốn xoá không?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#4fa7f3',
					cancelButtonColor: '#d57171',
					confirmButtonText: 'Đồng ý',
					cancelButtonText: 'Huỷ'
				}).then(function () {
					$.ajax({
						url: 'xuly/year/optYear.php',
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