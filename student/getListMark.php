<?php 
session_start();
if ($_SESSION['check'] != 'student'){
	die();
}
include '../class/config.php';

?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Điểm của <?php echo $_SESSION['fullname']; ?></h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	<table class="table table-bordered table-hover" id="mainTable_Mark">
		<thead class="thead-dark">
			<tr align="center">
				
				<th>Môn</th>
				<th class="bg-success">M 1</th>
				<th class="bg-success">M 2</th>
				<th class="bg-success">M 3</th>
				<th class="bg-success">M 4</th>
				<th class="bg-success">M 5</th>
				<th class="bg-warning">15' 1</th>
				<th class="bg-warning">15' 2</th>
				<th class="bg-warning">15' 3</th>
				<th class="bg-warning">15' 4</th>
				<th class="bg-warning">15' 5</th>
				<th class="bg-info">1t 1</th>
				<th class="bg-info">1t 2</th>
				<th class="bg-info">1t 3</th>
				<th class="bg-info">1t 4</th>
				<th class="bg-info">1t 5</th>
				<th >HK</th>
				<th class="bg-danger">TBM</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$List_Subject = $User->GetListSubject();
			foreach ($List_Subject as $value) {
				if (is_array($value)) {
					$sMark = $User->Get_Mark_Subject($_SESSION['id'], $value['subject']);
					echo '<tr>';
					echo '<td class="text-center">'.$value['name'].'</td>';
					foreach ($sMark as $value) {
						echo '<td class="text-center">'.$value.'</td>';
					}
					echo '</tr>';
				}
				
			}



			?>

			<tr >
				<td colspan="18" class="bg-primary text-center"><font color="black" size="5">ĐIỂM TRUNG BÌNH LÀ : <?php echo $User->Get_Mark_TB($_SESSION['id']); ?></font></td>
			</tr>
			
		</tbody>

	</table>
	
</div>
