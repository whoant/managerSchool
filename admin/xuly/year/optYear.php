<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])){
	// $Admin = new Admin();
	
	if ($_POST['opt'] == 'update') {
		
		$Admin->Update_Year($_POST);
		echo 'Success';
	}else if($_POST['opt'] == 'delete'){
		$Admin->Del_Year($_POST['id']);
		echo 'Success';
	}else if($_POST['opt'] == 'add'){

		echo $Admin->Add_Year($_POST);
	}

}
?>