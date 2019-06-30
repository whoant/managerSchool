<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../../class/config.php';

if (isset($_POST['data'])) {
	$sName_Sub = $User->Get_Name_Subject($_SESSION['id_sub']);
	if ($_POST['opt'] == 'add') {

		$json = json_decode($_POST['data'], true);
		foreach ($json as $value_json) {
			$sBoolean = True;
			foreach ($value_json as $value_data) {
				if (!is_numeric($value_data)) {
					if ($value_data != '') {
						$sBoolean = False;
					}
				}
			}
			if ($sBoolean) {
				$User->Update_Mark($value_json, $sName_Sub['subject']);
				
			}

			
		}
		// var_dump($json);

	}
}




?>