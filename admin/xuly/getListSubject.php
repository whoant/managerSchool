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
		<h4 class="page-title float-left">Danh sách môn học</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	

	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr align="center">
				<th>ID</th>
				<th>Môn</th>
				<th>Tên ghi tắt</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody id="showlist">
			
			
		</tbody>
	</table>
	<br />
	<center>
		<button type="button" class="btn btn-outline-dark waves-light waves-effect w-md" id="btn_add" title="Thêm Môn Mới"> <i class="fa fa-edit"></i> 
		</button>
	</center>
	<!-- Start Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel" up_add="up">SỬA THÔNG TIN MÔN HỌC</h4>
				</div>
				<div class="modal-body">
					<div id="noidungsua"></div>
				</div>
				<div class="modal-footer" style="text-align: center;">
					<div id="thongbaothem"></div>
					<button type="button" id="update_subject" class="btn btn-primary">CẬP NHẬT</button>
				</div><br>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
<script>
	$(document).ready(function(){
		$('#showlist').load('xuly/subject/dataSub.php');
		$('button#btn_add').click(function(event) {
				$('#ModalEdit').modal();
				$('#myModalLabel').text('THÊM MÔN MỚI');
				$('button#update_subject').text('THÊM MÔN');
				$('#myModalLabel').attr('up_add', 'add');
				$.ajax({
					url: 'xuly/subject/changeSub.php',
					type:'POST',
					dataType: 'html',
					data:{
						type: 'add',
						id_sub : 1
						
					},

					success: function(data){
						$('#noidungsua').html(data);
					}
				});
			});

	});
</script>