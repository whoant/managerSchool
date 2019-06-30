<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';
if (isset($_POST['class_name'])){
	$class_name = addslashes($_POST['class_name']);
	// $Admin = new Admin();
	$data = $Admin->GetListStudent($class_name);
	$i = 1;
	foreach ($data as $value) { ?>

		<tr id="<?php echo $value['id'];?>">
			<td><?php echo $i; ?></td>
			<th><?php echo $value['fullname']; ?></th>
			<td><?php echo $id; ?></td>
			<td><?php echo date('d/m/Y',strtotime($value['birthday'])); ?></td>
			<td><?php echo $value['address']; ?></td>
			<td><?php echo $value['phone']; ?></td>
			<td><?php echo $value['mail']; ?></td>
			<td align="center"><?php  
				if ($value['id_facebook'] == NULL){
					echo "<font color='red'><span>Chưa xác nhận</span></font>";
				}else{
					echo "<font color='green'><span>Đã xác nhận</span></font>";
				}

			?>
	
			</td>
			<td align="center">
				<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_hs="<?php echo $value['id'];?>" id="btn_change" title="Sửa"> <i class="fa fa-wrench"></i> 
				</button>
				<button type="button" class="btn btn-icon waves-effect waves-light btn-danger"id_hs="<?php echo $value['id'];?>" id="btn_del" title="Xoá"> <i class="fa fa-remove"></i> 
				</button>
			</td>
		</tr>	

		<?php
		$i++;
	}
}



?>
<script>
	$(document).ready(function() {

		$('button#btn_change').click(function(event) {
			var hocsinh = $(this).attr('id_hs');
			$('#ModalEdit').modal();
			$.ajax({
				url: 'xuly/student/changeStu.php',
				type:'POST',
				dataType: 'html',
				data:{id: hocsinh},

				success: function(data){
					$('#noidungsua').html(data);
				}
			});
		});

		$('button#btn_del').click(function(event) {
			var hocsinh = $(this).attr('id_hs');
			swal({
				title: 'Bạn có muốn xoá học sinh này không?',
				text: 'Bạn có muốn xoá không?',
				type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Huỷ'
            }).then(function () {
                $.ajax({
                	url: 'xuly/student/optStu.php',
                	type: 'POST',
                	data: {
                		id: hocsinh,
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
							$("tr#"+hocsinh).remove();
						}
						
                	}
                });
            
			});
		});
	});
</script>	