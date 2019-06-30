<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	exit();
}
include '../../../class/config.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])){
	// $Admin = new Admin();
	

	if ($_POST['opt'] == 'update') {
		$var = explode(' ', $_POST['s_teacher']);
		foreach ($var as $key => $value) {
			if ($value == '') {
				unset($var[$key]);
			}else{
				$var[$key] = $Admin->Get_ID_Class_Fr_Name($value)['id'];
			}
		}

		$_POST['s_teacher'] = json_encode($var);
		$Admin->UpdateTeacher($_POST);
		echo 'Success';
	}else if($_POST['opt'] == 'delete'){
		$Admin->DeleteTeacher($_POST['id']);
		echo 'Success';
	}else if($_POST['opt'] == 'add'){
		$var = explode(' ', $_POST['s_teacher']);
		foreach ($var as $key => $value) {
			if ($value == '') {
				unset($var[$key]);
			}else{
				$var[$key] = $Admin->Get_ID_Class_Fr_Name($value)['id'];
			}
		}

		$_POST['s_teacher'] = json_encode($var);
		$Admin->Add_Teacher($_POST);
		echo 'Success';
	}

}
?>