<?php 
session_start();
if ($_SESSION['check'] != 'teacher') {
	die();
}
include '../../class/config.php';

$User->_Is_GVCN($_SESSION['t_class']);
$sList_Class = $User->Get_List_Student($User->GVCN['class']);

$i = 1;
foreach ($sList_Class as $key => $sData) {
	?>
	<tr id="<?php echo $sData['id'];?>">
			<td><?php echo $i; ?></td>
			<th><?php echo $sData['fullname']; ?></th>
			<td align="center"><?php if ($sData['sex'] == 0) {
				echo '<i class="fa fa-female"></i>';
			}else{
				echo '<i class="fa fa-male"></i>';
			} ?></td>
			<td><?php echo date('d/m/Y',strtotime($sData['birthday'])); ?></td>
			<td><?php echo $sData['address']; ?></td>
			<td><?php echo $sData['phone']; ?></td>
			<td><?php echo $sData['mail']; ?></td>
			<td align="center"><?php  
				if ($sData['id_facebook'] == NULL){
					echo "<font color='red'><span>Chưa xác nhận</span></font>";
				}else{
					echo "<font color='green'><span>Đã xác nhận</span></font>";
				}

			?>
	
			</td>
			<td align="center">
				<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_hs="<?php echo $sData['id'];?>" id="btn_change" title="Sửa"> <i class="fa fa-wrench"></i> 
				</button>
				<button type="button" class="btn btn-icon waves-effect waves-light btn-danger"id_hs="<?php echo $sData['id'];?>" id="btn_del" title="Xoá"> <i class="fa fa-remove"></i> 
				</button>
			</td>
		</tr>	
<?php
$i++;
}





 ?>


<script>
	$(document).ready(function() {

		$('button#btn_change').click(function(event) {
			var hocsinh = $(this).attr('id_hs');
			$('#ModalEdit').modal();
			$.ajax({
				url: 'teacher/ql_cn/changeStu.php',
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
                	url: 'teacher/ql_cn/optStu.php',
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