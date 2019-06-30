<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	
	exit();
}
include '../class/config.php';

echo $User->Edit_Info($_POST, $_SESSION['id']);

?>