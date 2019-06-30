<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../class/class.php';

	// $Admin = new Admin();
?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Danh sách học sinh</h4>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-lg-12">
	

	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr align="center">
				<th>ID</th>
				<th>Họ và Tên</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Mail</th>
				<th>Facebook</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody id="showlist">
			
			
		</tbody>
	</table>
	<!-- Start Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN HỌC SINH</h4>
				</div>
				<div class="modal-body">
					<div id="noidungsua"></div>
				</div>
				<div class="modal-footer" style="text-align: center;">
					<div id="thongbaothem"></div>
					<button type="button" id="update_stu" class="btn btn-primary">CẬP NHẬT</button>
				</div><br>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
<script>
	$(document).ready(function(){

		$('#showlist').load('teacher/ql_cn/dataStu.php');
	});
</script>