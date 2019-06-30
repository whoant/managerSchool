// Ajax về phần đăng k

$(document).ready(function(){

	$("button#btn_login").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();

		if (username != '' && password != '') {
			$.ajax({
				url: 'checklogin.php',
				type: 'POST',
				data: {
					username: username,
					password: password,
					check: '1'
				},
				success: function(resuft){
					if (resuft == 'Success') {
						window.location.href = 'index.php';
					}else{
						swal('Thông báo', 'Đăng nhập thất bại', 'error');
					}
				}
			});
		}
	});



	$("button#btn_reg").click(function(){

		if ($('#birthday').val() != ''){
			$.ajax({
				url: 'checkreg.php',
				type: 'POST',
				data: {
					username: $('#username').val(),
					password: $('#password').val(),
					fullname: $('#fullname').val(),
					sex: $('#sex').val(),
					emailaddress: $('#emailaddress').val(),
					phone: $('#phone').val(),
					address: $('#address').val(),
					class: $('#class').val(),
					birthday: $('#birthday').val()
				},
				success: function(resuft){

					if (resuft == 'Success') {
						// alert('Tạo tài khoản thành công');

						swal('Tạo tài khoản thành công', 'Tạo tài khoản thành công', 'success');

					}else{
						// alert('Tạo tài khoản thất bại');
						swal('Tài khoản không thành công', 'Tạo tài khoản không thành công', 'error');
					}
				}
			});
		}else{
			// alert('Vui lòng nhập ngày thánh năm sinh');
			swal('Lỗi', 'Vui lòng nhập ngày thánh năm sinh', 'error');
		}

	});
});


function getListStudent_CN(){
	$.ajax({
		url : 'teacher/getListStudent_CN.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}


function getListMark(){
	$.ajax({
		url : 'teacher/getListMark.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}


function getListMark_Cn(){
	$.ajax({
		url : 'teacher/getListMark_Cn.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}

function getListNotice(){
	$.ajax({
		url : 'teacher/getListNotice.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}


function getListMark_Stu(){
	$.ajax({
		url : 'student/getListMark.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}

function Setting(){
	$.ajax({
		url : 'teacher/setting.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft){
			$('#change').html(resuft);
		}
	});
}

function Upload(){

	var file_data = $('#file').prop('files')[0];
	//lấy ra kiểu file
	var type = file_data.type;
	//Xét kiểu file được upload
	var match = ["image/gif", "image/png", "image/jpg",];
	//kiểm tra kiểu file
	if (type == match[0] || type == match[1] || type == match[2]) {
		//khởi tạo đối tượng form data
		var form_data = new FormData();
		//thêm files vào trong form data
		form_data.append('file', file_data);
		//sử dụng ajax post
		$.ajax({
			url: 'upload.php', // gửi đến file upload.php
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function (res) {
				$('.status').text(res);
				$('#file').val('');
			}
		});
	} else {
		$('.status').text('Chỉ được upload file ảnh');
		$('#file').val('');
	}
	return false;
}
