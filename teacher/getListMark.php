<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../class/config.php';

	// $Admin = new Admin();
$sList_Class = $User->Get_List_Class_Subject($_SESSION['s_teacher']);
?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Điểm của học sinh</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	<div>
		<select class="form-control input" id="dulieulop">
			<option value="">Chọn Lớp</option>
			<?php 
			foreach ($sList_Class as $key => $value) {
				echo '<option value="'.$value['class'].'">'.$value['class'].'</option>';
			}

			?>
		</select>
	</div>
	<br/>

	<table class="table table-bordered table-hover" id="mainTable_Mark">
		<thead class="thead-dark">
			<tr align="center">
				<th>ID</th>
				<th>Tên</th>
				<th>M 1</th>
				<th>M 2</th>
				<th>M 3</th>
				<th>M 4</th>
				<th>M 5</th>
				<th>15' 1</th>
				<th>15' 2</th>
				<th>15' 3</th>
				<th>15' 4</th>
				<th>15' 5</th>
				<th>1t 1</th>
				<th>1t 2</th>
				<th>1t 3</th>
				<th>1t 4</th>
				<th>1t 5</th>
				<th>HK</th>
				<th>TBM</th>
				
				
			</tr>
		</thead>
		<tbody id="showlist">
			
			
		</tbody>
	</table>
	<!-- Start Modal -->
	
	<!-- End Modal -->
	<center>
		<button type="button" class="btn btn-outline-dark waves-light waves-effect w-md" id="btn_update" title="Sửa điểm" type_button="update"> <i class="fa fa-edit"></i> 
		</button>
	</center>
</div>
<script>
	$(document).ready(function(){
		$('#dulieulop').change(function(){
			var class_name = $(this).val();
			$('#btn_update').attr('type_button', 'update');
			$('#btn_update').attr('title', 'Sửa điểm');
			if (class_name != '') {

				$.ajax({
					url: 'teacher/mark/dataMark.php',
					type: 'POST',
					dataType: 'html',
					data: {
						class_name : class_name,
					},
					success: function(resuft){
						$('#showlist').html(resuft);
					}
				});
			}
			
		});
		$('#btn_update').click(function(){
			var type_button = $(this).attr('type_button');
			var data_class = $('#dulieulop').val();
			if (type_button == 'update') {
				
				if (data_class != '') {
					$.ajax({
						url: 'teacher/mark/dataMark2.php',
						type:'POST',
						dataType: 'html',
						data:{class_name: data_class},
						success: function(data){
							$('#showlist').html(data);
							$('#btn_update').attr('type_button', 'add');
							$('#btn_update').attr('title', 'Cập nhập điểm');
						}
					});
				}

			} else if(type_button == 'add') {
				var resuft = [];
				var x = 0;
				$('#showlist tr').each(function(){
					// console.log(resuft.length);
					var id = this.id;
					// console.log(resuft.length);
					resuft[x] = new Array;
					resuft[x].push(id);
					var sData = $(this).children('td').children('input');
					for (var i = 0; i< sData.length; i++) {
						// console.log(sData.eq(i).val());
						resuft[x].push(sData.eq(i).val());
					}
					x++;
				});
				swal({
					title: 'Bạn có muốn cập nhập điểm ?',
					text: 'Bạn có muốn cập nhập điểm ?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#4fa7f3',
					cancelButtonColor: '#d57171',
					confirmButtonText: 'Đồng ý',
					cancelButtonText: 'Huỷ'
				}).then(function(){
					$.ajax({
						url: 'teacher/mark/optMark.php',
						type: 'POST',
						dataType: 'html',
						data: {
							opt: 'add',
							data : JSON.stringify(resuft),
						},
						success: function(resuft){
						// $('#showlist').html(resuft);
						$.ajax({
							url: 'teacher/mark/dataMark2.php',
							type:'POST',
							dataType: 'html',
							data:{class_name: data_class},
							success: function(data){
								$('#showlist').html(data);
								$('#btn_update').attr('type_button', 'add');
								$('#btn_update').attr('title', 'Cập nhập điểm');
								$.ajax({
									url: 'teacher/mark/dataMark.php',
									type: 'POST',
									dataType: 'html',
									data: {
										class_name : data_class,
									},
									success: function(resuft){
										$('#showlist').html(resuft);
									}
								});
								swal({
									title: 'Thành Công!',
									text: 'Cập nhập điểm thành công!',
									type: 'success',
									confirmButtonColor: '#4fa7f3'
								});

							}
						});
					}
				});
				});
				
			}

		});
	});

</script>