<?php 
session_start(); 
if ($_SESSION['check'] == 'student' || $_SESSION['check'] == 'teacher') {
	echo "<script>window.location='index.php';</script>";
}elseif ($_SESSION['check'] == 'admin') {
	echo "<script>window.location='admin/index.php';</script>"; 
};

if (isset($_POST['username']) && isset($_POST['password']) && is_numeric($_POST['check'])) {
	include 'class/class.php';
	if ($_POST['check'] == 1) {
		$User = new Students();
	}else if($_POST['check'] == 2){
		 $User = new Teachers();
	}
	
	$User->Login($_POST['username'], $_POST['password']);
}

?>