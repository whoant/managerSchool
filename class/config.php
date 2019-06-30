<?php
session_start(); 
include 'class.php';
if ($_SESSION['check'] == 'admin') {
	 $Admin = new Admin();
}else if($_SESSION['check'] == 'teacher'){
	 $User = new Teachers();
}else if($_SESSION['check'] == 'student'){
	 $User = new Students();
}

?>