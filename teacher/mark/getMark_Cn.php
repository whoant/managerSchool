<?php 
session_start();
if ($_SESSION['check'] != 'teacher'){
	die();
}
include '../../class/config.php';
if (isset($_POST['subject'])){
	$class_name = $User->Get_ClassGV_Fr_Class($_SESSION['t_class']);

	$data = $User->Get_List_Student($class_name['class']);
	$sMain_Term = $User->Get_Main_Term();

	$i = 1;
	foreach ($data as $value) { ?>
		<tr id="<?php echo $value['id'];?>">
			<td align="center"><?php echo $i; ?></td>
			<th align="center"><?php echo $value['fullname']; ?></th>
			<?php 



			$sMark = $User->Get_Mark_Subject($value['id'], $sMain_Term['id_hk'], addslashes($_POST['subject']));
			 if (is_array($sMark)) {
			 	foreach ($sMark as $sData_mark){
			 		if ($sData_mark < 5) {
			 			echo '<td align="center"><font color="red">'.$sData_mark.'</font></td>';
			 		}elseif ($sData_mark >= 8) {
			 			echo '<td align="center"><font color="blue">'.$sData_mark.'</font></td>';
			 		}
			 		else{
			 			echo '<td align="center"><font color="green">'.$sData_mark.'</font></td>';
			 		}
				}
			 }
			 ?>
		</tr>	
		<?php
		$i++;
	}
}



?>
