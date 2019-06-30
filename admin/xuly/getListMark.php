<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	
	exit();
}
include '../../class/config.php';

	// $Admin = new Admin();
?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Điểm của học sinh</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	

	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr align="center">
				<th>ID</th>
				<th>Tên</th>
				<th>
					<select class="form-control input" id="dulieulop">
						<option value="">Chọn Lớp</option>
						<?php $sqllop = "SELECT `class` FROM `class`";
						$qrlop = mysqli_query($Admin->Connect, $sqllop); ?>
						<?php while($rowlop = mysqli_fetch_assoc($qrlop))
						{ ?>
							<option value="<?php echo $rowlop["class"]; ?>">
								<?php echo $rowlop["class"];?>
							</option>
						<?php } ?>
					</select>
				</th>
				
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody id="showlist">
			
			
		</tbody>
	</table>
	<!-- Start Modal -->
	<div class="modal fade bs-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">XEM ĐIỂM HỌC SINH</h4>
				</div>
				<div class="modal-body">
					<div id="noidungsua"></div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
<script>
	$(document).ready(function(){
		$('#dulieulop').change(function(){
			var class_name = $(this).val();
			if (class_name != '') {
				$.ajax({
					url: 'xuly/mark/dataMark.php',
					type: 'POST',
					dataType: 'html',
					data: {
						class_name : class_name
					},
					success: function(resuft){
						$('#showlist').html(resuft);
					}
				});
			}
			
		});
	});
</script>