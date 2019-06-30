<?php 
session_start();
include 'class/class.php';
$Connect = new Connect_Database();
if ($_SESSION['check'] == 'student' || $_SESSION['check'] == 'teacher') {
	echo "<script>window.location='index.php';</script>";
}elseif ($_SESSION['check'] == 'admin') {
	echo "<script>window.location='admin/index.php';</script>"; 
};
$Arr = array();


$Arr['username'] = addslashes($_POST['username']);
$Arr['password'] = addslashes($_POST['password']);
$Arr['fullname'] = addslashes($_POST['fullname']);
$Arr['sex'] = ($_POST['sex'] == '1') ? 1 : 0;
$Arr['emailaddress'] = addslashes($_POST['emailaddress']);
$Arr['phone'] = addslashes($_POST['phone']);
$Arr['address'] = addslashes($_POST['address']);
$Arr['class'] = addslashes($_POST['class']);
$Arr['birthday'] = addslashes($_POST['birthday']);

foreach ($Arr as $value) {
	if ($value == '') {
		echo "Error";
		die();
	}
}


$sql = "SELECT `user`, `mail` FROM `students` WHERE `user`='".$Arr['username']."'";
$query = mysqli_query($Connect->Connect, $sql);

if (mysqli_num_rows($query) > 0 ){
	echo "Error";

}else{

	$sql = "INSERT INTO `students` (
	`id`, `user`, `pass`, `fullname`, `address`, `sex`, `birthday`, `class`, `id_facebook`, `phone`, `mail`) 
	VALUES (
	NULL, 
	'".$Arr['username']."', 
	'".$Arr['password']."', 
	'".$Arr['fullname']."',  
	'".$Arr['address']."', 
	'".$Arr['sex']."', 
	'".$Arr['birthday']."', 
	'".$Arr['class']."', 
	NULL, 
	'".$Arr['phone']."', 
	'".$Arr['emailaddress']."'
);";

$query = mysqli_query($Connect->Connect, $sql);
echo "Success";
}



?>