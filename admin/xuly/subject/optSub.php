<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';
if (isset($_POST['id_sub']) && is_numeric($_POST['id_sub'])){
	// $Admin = new Admin();
	
	if ($_POST['opt'] == 'update') {
		
		$Admin->Update_Subject($_POST);
		echo 'Success';
	}else if($_POST['opt'] == 'delete'){
		$Admin->Del_Subject($_POST['id_sub']);
	
	}else if($_POST['opt'] == 'add'){

		echo $Admin->Add_Subject($_POST);
	}

}
?>