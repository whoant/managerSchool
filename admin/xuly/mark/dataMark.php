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
			<th><?php echo $value['class'] ?></th>
			
			<td align="center">
				<button type="button" class="btn btn-icon waves-effect waves-light btn-warning" id_hs="<?php echo $value['id'];?>" id="btn_view" title="Xem điểm"> <i class="fa fa-list"></i> 
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

		$('button#btn_view').click(function(event) {
			var hocsinh = $(this).attr('id_hs');
			$('#ModalEdit').modal();
			$.ajax({
				url: 'xuly/mark/viewMark.php',
				type:'POST',
				dataType: 'html',
				data:{id: hocsinh},

				success: function(data){
					$('#noidungsua').html(data);
				}
			});
		});

	});
</script>	