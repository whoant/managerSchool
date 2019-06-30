<?php 
session_start();
if ($_SESSION['check'] != 'admin' || !is_numeric($_POST['id'])){
	exit();
}

include '../../../class/config.php';

$id = $_POST['id'];
// $Admin = new Admin();
$query = mysqli_query($Admin->Connect, "SELECT * FROM `students` WHERE id = '$id'");

$row = mysqli_fetch_assoc($query);
$list_class = $Admin->GetListSubject();
$list_year = $Admin->getListYear();


?>


<div class="row">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<input type="text" id="id" value="<?php echo $id?>" style="display: none">
		Tên Học Sinh:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="name" type="text" placeholder="Mã học sinh..." value="<?php echo $row["fullname"]?>" style="color:#000" disabled>
			</div>
		</div>
	</div>


	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"> 
		Môn :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</div>
				<select id="subject" class="form-control">
					<option value="">Chọn Môn</option>
					<?php 
					foreach ($list_class as $key => $value) {
						echo '<option value="'.$value['subject'].'">'.$value['name'].'</option>';	
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"> 
		Năm Học :
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</div>
				<select id="year" class="form-control">
					<?php 
					$Term = $Admin->Get_Main_Term();
					$resuft = ($Term['type'] == 1) ? 'HK 1' : 'HK 2';
					echo '<option value="'.$Term['id_hk'].'">'.$resuft. '  '.$Term['year'].'</option>';	
					foreach ($list_year as $key => $value) {
						if ($value['id_hk'] ==  $Term['id_hk']) {
							continue;
						}
						if ($value['type'] == 1){
							$resuft = 'HK 1';
						}else{
							$resuft = 'HK 2';
						}
						echo '<option value="'.$value['id_hk'].'">'.$resuft . '  '.$value['year'].'</option>';	
					}


					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</div>
				<table class="table table-dark table-hover table-bordered">
					<thead class="thead-dark">
						<tr align="center">
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
							<th>TBM	</th>
						</tr>

					</thead>
					<tbody id="showlist_mark">
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function(){
		$('#subject').change(function(){
			var subject = $(this).val();
			if (subject != '') {
				$.ajax({
					url: 'xuly/mark/getMark.php',
					type: 'POST',
					dataType: 'html',
					data: {
						id: $('#id').val(),
						year: $('#year').val(),
						subject: subject,
					},
					success: function(data){
						$('#showlist_mark').html(data);
					}
				});
			}
			


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