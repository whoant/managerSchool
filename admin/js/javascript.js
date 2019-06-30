function GetListStudent(){
	$.ajax({
		url: 'xuly/getListStu.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}

function GetListTeacher(){
	$.ajax({
		url: 'xuly/getListTea.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}

function GetListClass(){
	$.ajax({
		url: 'xuly/getListClass.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}
function GetListSubject(){
	$.ajax({
		url: 'xuly/getListSubject.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}
function GetListYear(){
	$.ajax({
		url: 'xuly/getListYear.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}

function GetListMark(){
	$.ajax({
		url: 'xuly/getListMark.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}

function Setting(){
	$.ajax({
		url: 'xuly/setting.php',
		type: 'GET',
		dataType: 'html',
		success: function(resuft) {
			$('#change').html(resuft);
		}
	});
}