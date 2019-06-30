<?php 
session_start();
if ($_SESSION['check'] != 'admin'){
	
	exit();
}
include '../../class/config.php';

$Admin->Edit_Info($_POST);
// echo 'Success';
?>