<?php
session_start();
if ($_SESSION['check'] != 'admin'){

	exit();
}
include '../../class/config.php';

$row = $Admin->GetListSubject();

?>

<div class="col-12">
	<div class="page-title-box">
		<h4 class="page-title float-left">Danh sách giáo viên</h4>
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
					<select class="form-control input" id="dulieumon">
						<option value="">Chọn Môn</option>

						<?php foreach ($row as $value)
						{ ?>
							<option value="<?php echo $value["subject"]; ?>">
								<?php echo $value["name"];?>
							</option>
						<?php } ?>
						<option value="all">Tất cả giáo viên</option>
					</select>
				</th>
				<th>Ngày sinh</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<th>Chủ nhiệm</th>
				<th>Giảng dạy lớp</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody id="showlist">


		</tbody>
	</table>
	<center>
		<button type="button" class="btn btn-outline-dark waves-light waves-effect w-md" id="btn_add" title="Thêm Mới Giáo Viên"> <i class="fa fa-edit"></i>
		</button>
	</center>
	<!-- Start Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel" up_add="up">SỬA THÔNG TIN GIÁO VIÊN</h4>
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
		$('#dulieumon').change(function(){
			var mon = $(this).val();
			if (mon != '') {
				$.ajax({
					url: 'xuly/teacher/dataTea.php',
					type: 'POST',
					data: {
						subject: mon
					},
					dataType: 'html',
					success: function(data){
						$('#showlist').html(data);
					}
				});
			}

		});

		$('button#btn_add').click(function(event) {
			$('#ModalEdit').modal();
			$('#myModalLabel').text('THÊM GIÁO VIÊN MỚI');
			$('button#update_stu').text('THÊM GIÁO VIÊN');
			$('#myModalLabel').attr('up_add', 'add');
			$.ajax({
				url: 'xuly/teacher/changeTea.php',
				type:'POST',
				dataType: 'html',
				data:{
					type: 'add'
				},
				success: function(data){
					$('#noidungsua').html(data);
				}
			});
		});
	});
</script>
