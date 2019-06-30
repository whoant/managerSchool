<?php 
session_start();
if ($_SESSION['check'] != 'admin' || !is_numeric($_POST['id'])){
	exit();
}

include '../../../class/config.php';
if ($_POST['subject'] != '') {
	$resuft = $Admin->Get_Mark_Subject($_POST['id'], $_POST['year'], $_POST['subject']);
	echo '<tr class="bg-danger text-white">';

	foreach ($resuft as $key => $mark) {
		echo '<td align="center">'.$mark.'</td>';
	}

	echo '</tr>';
}

?>