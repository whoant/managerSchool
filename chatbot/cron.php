<?php
include '../class/class.php';

$Connect = new Admin();


$resuft = $Connect->Get_List_Notice_Cron();


foreach ($resuft as $value_resuft) {
	$squery = mysqli_query($Connect->Connect, "SELECT * FROM `teachers` WHERE `id` = ". $value_resuft['id']);
	$sInfo = mysqli_fetch_assoc($squery);
	$sClass_name = $Connect->Get_Class_Fr_ID($value_resuft['den_ai']);
	$sSend_Mes = new ChatBot();
	$AccessToken = $Connect->_Get_AccessToken();
	$sList_Student = $Connect->GetListStudent($sClass_name['class']);
			// var_dump($sList_Student);
	foreach ($sList_Student as $value) {
		if ($value['id_facebook'] != NULL) {
			$sSend_Mes->_Set_sData($AccessToken['access_token'], $value['id_facebook']);
			$sSend_Mes->_Send_Text('⚠️ Giáo viên '.$sInfo['fullname'].' : '.str_replace("\n",'\u000A',$value_resuft['noidung']));

		}
	}
}

echo 'Success';
?>