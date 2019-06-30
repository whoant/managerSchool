<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}

include '../../class/config.php';

	// $Admin = new Admin();
	



if ($_POST['type'] == 'add') {
	$User->Add_Notice($_SESSION['id'], $_POST);
	
}else if($_POST['type'] == 'delete'){
	$User->Delete_Notice($_POST['id_notice'], $_SESSION['id']);
	
}else if($_POST['type'] == 'update'){
	$User->Update_Notice($_POST['id_notice'], $_SESSION['id'], $_POST);
	
}else if($_POST['type'] == 'send_mes'){
	$User->Send_Mes_Notice($_POST['id_notice'], $_SESSION['id']);
	
}

?>