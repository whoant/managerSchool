<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../class/config.php';

	// $Admin = new Admin();
$sList_Subject = $User->GetListSubject();
?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Điểm của học sinh lớp chủ nhiệm</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	<div class="col-lg-12">
		<select class="form-control input" id="dulieumon">
			<option value="">Chọn Môn</option>
			<?php 
			foreach ($sList_Subject as $key => $value) {
				echo '<option value="'.$value['subject'].'">'.$value['name'].'</option>';
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
	
</div>
<script>
	$(document).ready(function(){
		$('#dulieumon').change(function(){
			var mon = $('#dulieumon').val();
			if (mon != '') {
				$.ajax({
					url: 'teacher/mark/getMark_Cn.php',
					type: 'POST',
					dataType: 'html',
					data:{
						subject: mon,
					},
					success: function(resuft){
						$('#showlist').html(resuft);

					}
				});
			}
		});
	});

</script>