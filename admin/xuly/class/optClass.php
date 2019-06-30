<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])){
	// $Admin = new Admin();
	
	if ($_POST['opt'] == 'update') {
	
		$Admin->Update_Class($_POST);
		echo 'Success';
	}else if($_POST['opt'] == 'delete'){
		$Admin->Del_Class($_POST['id']);
		echo 'Success';
	}else if($_POST['opt'] == 'add'){

		echo $Admin->Add_Class($_POST);
	}

}
?>