<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
    die();
}

?>


<div class="col-12">
    <div class="page-title-box">
        <h4 class="page-title float-left">Danh sách thông báo</h4>
        <div class="clearfix"></div>
    </div>
</div>
<div class="col-lg-12">
  

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr align="center">
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Lớp</th>
                <th>Ngày bắt đầu gửi</th>
                <th>Ngày kết thúc gửi</th>
                <th>Gửi vào lúc</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody id="showlist">
            
            
        </tbody>
    </table>
    <br />
    <center>
        <button type="button" class="btn btn-outline-dark waves-light waves-effect w-md" id="btn_add" title="Thêm thông báo"> <i class="fa fa-edit"></i> 
            </button>
    </center>
    <!-- Start Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel" type_button="add">THÊM THÔNG BÁO</h4>
                </div>
                <div class="modal-body">
                    <div id="noidungsua"></div>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <div id="thongbaothem"></div>
                    <button type="button" id="update_notice" class="btn btn-primary">THÊM</button>
                </div><br>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>

<script>
    $(document).ready(function(){
        $('#showlist').load('teacher/notice/dataNotice.php');

        $('button#btn_add').click(function(event) {
                $('#ModalEdit').modal();
                $('#myModalLabel').text('THÊM THÔNG BÁO');
                $('button#update_notice').text('THÊM');
                $('#myModalLabel').attr('type_button', 'add');
                $.ajax({
                    url: 'teacher/notice/changeNotice.php',
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