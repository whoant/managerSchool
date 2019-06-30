<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}

include '../../class/config.php';

if (isset($_POST['class_name'])){
	$class_name = addslashes($_POST['class_name']);
	// $Admin = new Admin();
	$data = $User->Get_List_Student($class_name);
	$sName_Sub = $User->Get_Name_Subject($_SESSION['id_sub']);
	$sMain_Term = $User->Get_Main_Term();
	$i = 1;
	?>


	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</div>
					<table class="table table-dark table-hover table-bordered">
						<thead class="thead-dark">
							<tr align="center">
								<th>STT</th>
								<th>Học và tên</th>
								<th>Miệng 1</th>
								<th>Miệng 2</th>
								<th>Miệng 3</th>
								<th>15' 1</th>
								<th>15' 2</th>
								<th>15' 3</th>
								<th>1t 1</th>
								<th>1t 2</th>
								<th>1t 3</th>
								<th>Học Kỳ</th>
								<th>Trung Bình Môn</th>
							</tr>
						</thead>
						<tbody id="showlist_mark">
							<?php 

							foreach ($data as $value) { ?>
								<tr id="<?php echo $value['id'];?>">
									<td align="center"><?php echo $i; ?></td>
									<th align="center"><?php echo $value['fullname']; ?></th>
									<?php 
									$sMark = $User->Get_Mark_Subject($value['id'], $sMain_Term['id_hk'], $sName_Sub['subject']);
									if (is_array($sMark)) {
										foreach ($sMark as $sData_mark){
											if ($sData_mark < 5) {
												echo '<td align="center" ><input type="" name="223232" value="1222" size="2">'.$sData_mark.'</td>';
											}elseif ($sData_mark >= 8) {
												echo '<td align="center"><font color="blue">'.$sData_mark.'</font></td>';
											}
											else{
												echo '<td align="center"><font color="green">'.$sData_mark.'</font></td>';
											}
										}
									}
									?>
								</tr>	
								<?php
								$i++;
							}


							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	<?php 

}

?>
<script>
	$(document).ready(function(){
		$('#subject').change(function(){
			

			$.ajax({
				url: 'xuly/mark/getMark.php',
				type: 'POST',
				dataType: 'html',
				data: {
					id: $('#id').val(),
					year: $('#year').val(),
					subject: $(this).val(),
				},
				success: function(data){
					$('#showlist_mark').html(data);
				}
			});


		});
		$('#year').change(function(){
			$.ajax({
				url: 'xuly/mark/getMark.php',
				type: 'POST',
				dataType: 'html',
				data: {
					id: $('#id').val(),
					year: $(this).val(),
					subject: $('#subject').val(),
				},
				success: function(data){
					$('#showlist_mark').html(data);
				}
			});


		});
	});

</script>