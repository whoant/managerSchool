<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../../class/config.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])){
	// $Admin = new Admin();
	

	if ($_POST['opt'] == 'update') {
		$User->UpdateStudent($_POST);
		echo 'Success';
	}else if($_POST['opt'] == 'delete'){
		$User->DeleteStudent($_POST['id']);
		echo 'Success';
	}

}
?>