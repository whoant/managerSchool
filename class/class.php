<?php 
session_start();
include 'Curl.php';
include 'config_sv.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');


class Students extends Connect_Database{
	public function Login($username, $password){
		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `students` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$_SESSION = $row;
			$_SESSION['check'] = 'student';
			echo 'Success';
			// echo "<script>window.location='index.php';</script>";
		}else{
			echo 'Error';
			// echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
		}
	}


	public function Get_Mark_Subject($id_hs,$subject){

		if (is_numeric($id_hs)) {
			$id_hk = $this->Get_Main_Term();
			$sql = "SELECT `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`  FROM `".addslashes($subject)."` WHERE `id_hs` = ". $id_hs ." AND `id_hk` = ".$id_hk['id_hk'];

			$resuft  =mysqli_query($this->Connect, $sql);
			if (mysqli_num_rows($resuft) == 0){
				$sql = "INSERT INTO `".$subject."` (`id_hs`, `id_hk`) VALUES ('".$id_hs."', '".$id_hk['id_hk']."');";
				mysqli_query($this->Connect, $sql);
			}
			return mysqli_fetch_assoc($resuft);
			
		}
	}
	
	
}




class Teachers extends Connect_Database{
	private $_HS_MIENG = 1,
	$_HS_15 = 1,
	$_HS_1t = 2,
	$_HS_kh = 3;

	public function Login($username, $password){
		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `teachers` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$_SESSION = $row;
			// var_dump($_SESSION);
			$_SESSION['check'] = 'teacher';
			// $this->_Is_GVCN($row['t_class']);
			// var_dump($this->GVCN);
			// $this->ID_Teacher = $row['id'];
			// echo "<script>window.location='index.php';</script>";
			echo 'Success';
		}else{
			// echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
			echo 'Error';
		}

	}

	public function Edit_Info($Arr, $id){

		if (is_array($Arr) && is_numeric($Arr['phone']) && is_numeric($id)) {
			$sql = "UPDATE `teachers` SET `user` = '".addslashes($Arr['user'])."', `pass` = '".addslashes($Arr['pass'])."', `mail` = '".addslashes($Arr['mail'])."', `phone` = '".$Arr['phone']."', `address` = '".addslashes($Arr['address'])."' WHERE `id` = ". $id;
			// echo $sql;
			mysqli_query($this->Connect, $sql);
			echo 'Success';
			session_destroy();
		}else{
			echo 'Error';
		}
	}

	// hàm kiểm tra có phải là giáo viên chủ nhiệm 1 lớp nào đó hay không
	public function _Is_GVCN($id_class){
		if ($id_class != 0) {
			$this->GVCN = $this->Get_ClassGV_Fr_Class($id_class);	
		}
	}

	// hàm lấy danh sách lớp mà giáo viên đó dạy
	public function Get_List_Class_Subject($Arr_Class){
		$json = json_decode($Arr_Class, true);
		foreach ($json as $key => $value) {
			$sData = $this->Get_ClassGV_Fr_Class($value);
			
			$resuft[$key]['class'] = $sData['class'];
			$resuft[$key]['id'] = $sData['id'];
		}
		return $resuft;
	}

	// lấy tên lớp từ id 	
	public function Get_ClassGV_Fr_Class($id_class){	
		$query = mysqli_query($this->Connect, "SELECT `id`, `class` FROM `class` WHERE `id` = ".$id_class);
		$resuft = mysqli_fetch_assoc($query);
		return $resuft;
	}

	// lấy danh sách học sinh làm lớp chủ nhiệm
	public function Get_List_Student($class_name){	
		$query= mysqli_query($this->Connect, "SELECT * FROM `students` WHERE `class` = '".addslashes($class_name)."' ORDER BY `fullname` ASC");
		$resuft = array();
		if ($query) {
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;

	}

	public function UpdateStudent($Arr)
	{	
		if ($Arr['id_facebook'] == ''){
			$Arr['id_facebook'] = 'NULL';
		}
		$sql = "UPDATE `students` SET 
		`user`='".addslashes($Arr['user'])."',
		`pass`='".addslashes($Arr['pass'])."',
		`fullname`='".addslashes($Arr['fullname'])."',
		`address`='".addslashes($Arr['address'])."',
		`sex`='".addslashes($Arr['sex'])."',
		`birthday`='".addslashes($Arr['birthday'])."',
		`id_facebook`=".addslashes($Arr['id_facebook']).",
		`phone`='".addslashes($Arr['phone'])."',
		`mail`='".addslashes($Arr['mail'])."' 
		WHERE `id` = ".addslashes($Arr['id']);
		// $sql = "UPDATE `students` SET `user`='$Arr["user"]' WHERE `id` = $Arr['id']";
		mysqli_query($this->Connect, $sql);
	}
	// xoá học sinh theo id
	public function DeleteStudent($id)
	{	
		if (is_numeric($id)) {
			mysqli_query($this->Connect, "DELETE FROM `students` WHERE `id` = ". $id);
		}
	}
	
	// láy tên môn từ id của môn
	public function Get_Name_Subject($id)
	{
		if (is_numeric($id)) {
			$query = mysqli_query($this->Connect, "SELECT * FROM `subject` WHERE `id_sub` = ". $id);
			return mysqli_fetch_assoc($query);
		}
	}

	// lấy điểm của học sinh theo môn học và lớp
	public function Get_Mark_Subject($id_hs, $id_hk,$subject){

		if (is_numeric($id_hs) && is_numeric($id_hk)) {
			$sql = "SELECT `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`  FROM `".addslashes($subject)."` WHERE `id_hs` = ". $id_hs ." AND `id_hk` = ".$id_hk;

			$resuft  =mysqli_query($this->Connect, $sql);
			if (mysqli_num_rows($resuft) == 0){
				$sql = "INSERT INTO `".$subject."` (`id_hs`, `id_hk`) VALUES ('".$id_hs."', '".$id_hk."');";
				mysqli_query($this->Connect, $sql);
			}
			return mysqli_fetch_assoc($resuft);
			
		}
	}
	public function Update_Mark($Arr, $subject){
		if (is_array($Arr)) {
			$total = 0;
			$chia = 0;
			$resuft = 0;
			foreach ($Arr as $key => $value) {
				if ($value != '') {
					// echo $key . '<br/>';
					if ($key > 0) {
						if ($key <= 10) {
							$heso = 1;
						}else if ($key  >= 11 && $key <= 15 ) {
							$heso = 2;
						}else if ($key = 16) {
							$heso = 3;
						}

					// echo '<br />'.$heso.'|'. $value;
						$total += ($value * $heso);

						$chia += $heso;
					}
					
				}else{
					$Arr[$key] = 'NULL';
				}
			}
			if ($total == 0) {
				$resuft = 'NULL';
			}else{
				$resuft = $total / $chia;
				$resuft = round($resuft, 1);

			}


			// echo round($resuft, 2) . '<br/>';
			// echo $chia. '<br/>';
			$sql = "UPDATE `".$subject."` SET `mieng1` = ".$Arr[1].", `mieng2` = ".$Arr[2].", `mieng3` = ".$Arr[3].", `mieng4` = ".$Arr[4].", `mieng5` = ".$Arr[5].", `15p1` = ".$Arr[6].", `15p2` = ".$Arr[7].", `15p3` = ".$Arr[8].", `15p4` = ".$Arr[9].", `15p5` = ".$Arr[10].", `1t1` = ".$Arr[11].", `1t2` = ".$Arr[12].", `1t3` = ".$Arr[13].", `1t4` = ".$Arr[14].", `1t5` = ".$Arr[15].", `hk` = ".$Arr[16].", `tb` = ".$resuft." WHERE `".$subject."`.`id_hs` = ".$Arr[0];
			
			mysqli_query($this->Connect, $sql);
		}
	}


	public function Get_Mark_Subject_All($id_hs, $id_hk)
	{
		if (is_numeric($id_hs) && is_numeric($id_hk)) {
			$sList_Class = $this->GetListSubject();
			$total = 0;
			$heso = 0;
			foreach ($sList_Class as $value) {
				$query = mysqli_query($this->Connect, "SELECT `tb` FROM `".$value['subject']."` WHERE `id_hs` = ". $id_hs." AND `id_hk` = ". $id_hk);
				if (mysqli_num_rows($query) != 0) {
					$resuft = mysqli_fetch_assoc($query);
					$total += $resuft['tb'];
					$heso += 1;
				}
			}
			$res = $total / $heso;
			return round($res, 2);	
		}
	}


	public function Get_List_Notice($id_teacher){
		if (is_numeric($id_teacher)) {
			$query = mysqli_query($this->Connect, "SELECT * FROM `notice` WHERE `id` = ". $id_teacher." ORDER BY `stt` DESC");
			$resuft = array();
			if($query){
				while ($row = mysqli_fetch_assoc($query)) {
					$resuft[] = $row;
				}
			}
			return $resuft;
		}
	}

	public function Add_Notice($id_teacher, $Arr)
	{
		if (is_numeric($id_teacher)) {
			$sql = "SELECT * FROM `notice` WHERE `id` = ".$id_teacher." AND `tieude` LIKE '".$Arr['tieude']."' AND `noidung` LIKE '".$Arr['noidung']."' AND `den_ai` = ". $Arr['den_ai'];
			// echo $sql;
			$query = mysqli_query($this->Connect, $sql);
			if (mysqli_num_rows($query) == 0) {
				$sql = "INSERT INTO `notice` (`id`, `tieude`, `noidung`, `den_ai`, `ngay_bd`, `ngay_kt`, `thoigian`) VALUES ('".$id_teacher."', '".$Arr['tieude']."', '".$Arr['noidung']."', '".$Arr['den_ai']."', '".$Arr['ngay_bd']."', '".$Arr['ngay_kt']."', '".$Arr['thoigian']."');";
				mysqli_query($this->Connect, $sql);
				echo 'Success';
			}else{
				echo 'Error';
			}
		}
	}
	public function Get_Notice_Fr_ID($id, $id_teacher){
		if (is_numeric($id) && is_numeric($id_teacher)){
			$query = mysqli_query($this->Connect, "SELECT * FROM `notice` WHERE `stt` = ".$id." AND `id` = ". $id_teacher);
			return mysqli_fetch_assoc($query);
		}
	}

	public function Delete_Notice($id, $id_teacher){
		if (is_numeric($id) && is_numeric($id_teacher)){
			$query = mysqli_query($this->Connect, "DELETE FROM `notice` WHERE `stt` = ".$id." AND `id` = ". $id_teacher);
			echo 'Success';
		}
	}

	public function Update_Notice($id, $id_teacher, $Arr){
		if (is_numeric($id) && is_numeric($id_teacher) && is_array($Arr) && is_numeric($Arr['den_ai']) && is_numeric($Arr['thoigian'])){
			
			$sql = "UPDATE `notice` SET `tieude` = '".addslashes($Arr['tieude'])."', `noidung` = '".addslashes($Arr['noidung'])."', `den_ai` = '".$Arr['den_ai']."', `ngay_bd` = '".$Arr['ngay_bd']."', `ngay_kt` = '".$Arr['ngay_kt']."', `thoigian` = '".$Arr['thoigian']."' WHERE `stt` = ".$id." AND `id` = ". $id_teacher;
			// echo $sql;
			$query = mysqli_query($this->Connect, $sql);
			echo 'Success';
		}
	}


	

	public function Send_Mes_Notice($id, $id_teacher){
		if (is_numeric($id) && is_numeric($id_teacher)) {
			$sNotice = $this->Get_Notice_Fr_ID($id, $id_teacher);
			$squery = mysqli_query($this->Connect, "SELECT * FROM `teachers` WHERE `id` = ". $id_teacher);
			$sInfo = mysqli_fetch_assoc($squery);
			$sClass_name = $this->Get_Class_Fr_ID($sNotice['den_ai']);
			// echo $sClass_name['class'];
			$sSend_Mes = new ChatBot();
			$AccessToken = $this->_Get_AccessToken();
			// echo $AccessToken['access_token'];

			$sList_Student = $this->Get_List_Student($sClass_name['class']);
			// var_dump($sList_Student);
			foreach ($sList_Student as $value) {
				if ($value['id_facebook'] != NULL) {
					$sSend_Mes->_Set_sData($AccessToken['access_token'], $value['id_facebook']);
					$sSend_Mes->_Send_Text('⚠️ Giáo viên '.$sInfo['fullname'].' : '.str_replace("\n",'\u000A',$sNotice['noidung']));

				}
			}
			echo 'Success';

			// $sSend_Mes->_Set_sData($AccessToken['access_token'], )

		}
	}


}



class Admin extends Connect_Database{

	public function Login($username, $password){

		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `admin` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if (mysqli_num_rows($query)>0) {
			$row = mysqli_fetch_assoc($query);
			$_SESSION = $row;
			$_SESSION['check'] = 'admin';
			echo "<script>window.location='index.php';</script>";
		}else{
			echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
		}
	}
// thay đổi thông tin quản trị viên
	public function Edit_Info($Arr){
		if (is_array($Arr) && is_numeric($Arr['phone'])) {
			$sql = "UPDATE `admin` SET `user` = '".addslashes($Arr['user'])."', `pass` = '".addslashes($Arr['pass'])."', `mail` = '".addslashes($Arr['mail'])."', `phone` = '".$Arr['phone']."' WHERE `id` = 1;";
			mysqli_query($this->Connect, $sql);
			session_destroy();
			echo 'Success';

		}else{
			echo 'Error';
		}
	}


	public function GetListTeacher(){
		$query= mysqli_query($this->Connect, "SELECT * FROM `teachers`");


	}

	public function GetListStudent($class_name){	
		$query= mysqli_query($this->Connect, "SELECT * FROM `students` WHERE `class` = '".addslashes($class_name)."' ORDER BY `fullname` ASC");
		$resuft = array();
		if ($query) {
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;

	}

	public function UpdateStudent($Arr)
	{	
		if ($Arr['id_facebook'] == ''){
			$Arr['id_facebook'] = 'NULL';
		}
		$sql = "UPDATE `students` SET 
		`user`='".addslashes($Arr['user'])."',
		`pass`='".addslashes($Arr['pass'])."',
		`fullname`='".addslashes($Arr['fullname'])."',
		`address`='".addslashes($Arr['address'])."',
		`sex`='".addslashes($Arr['sex'])."',
		`birthday`='".addslashes($Arr['birthday'])."',
		`class`='".addslashes($Arr['class'])."',
		`id_facebook`=".addslashes($Arr['id_facebook']).",
		`phone`='".addslashes($Arr['phone'])."',
		`mail`='".addslashes($Arr['mail'])."' 
		WHERE `id` = ".addslashes($Arr['id']);
		// $sql = "UPDATE `students` SET `user`='$Arr["user"]' WHERE `id` = $Arr['id']";
		mysqli_query($this->Connect, $sql);
	}

	public function DeleteStudent($id)
	{	
		if (is_numeric($id)) {
			mysqli_query($this->Connect, "DELETE FROM `students` WHERE `id` = ". $id);
		}
		
	}

	

	public function Get_Teacher_Subj($subj){
		// lấy id của môn 
		if ($subj == 'all') {
			$query = mysqli_query($this->Connect, "SELECT * FROM `teachers` ORDER BY `user` ASC");
		}else{
			$query = mysqli_query($this->Connect, "SELECT `id_sub` FROM `subject` WHERE `subject` = '".addslashes($subj)."'");
			$query = mysqli_query($this->Connect, "SELECT * FROM `teachers` WHERE `id_sub` = '".mysqli_fetch_assoc($query)['id_sub']."'");	
		}
		
		$resuft = array();
		if($query){
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;
	}

	public function DeleteTeacher($id)
	{	
		if (is_numeric($id)) {
			mysqli_query($this->Connect, "DELETE FROM `teachers` WHERE `id` = ". $id);
		}
		
	}

	public function UpdateTeacher($Arr)
	{	
		$sql = "UPDATE `teachers` SET 
		`user`='".addslashes ($Arr['user'])."',
		`pass`='".addslashes ($Arr['pass'])."',
		`fullname`='".addslashes ($Arr['fullname'])."',
		`birthday`='".addslashes ($Arr['birthday'])."',
		`address`='".addslashes ($Arr['address'])."',
		`sex`='".addslashes ($Arr['sex'])."',
		`t_class`='".addslashes ($Arr['t_class'])."',
		`s_teacher`='".addslashes ($Arr['s_teacher'])."',
		`id_sub`='".addslashes ($Arr['id_sub'])."',
		`phone`='".addslashes ($Arr['phone'])."',
		`mail`='".addslashes ($Arr['mail'])."'
		WHERE `id` = ".addslashes ($Arr['id']);
		
		mysqli_query($this->Connect, $sql);
	}

	public function Add_Teacher($Arr){
		$sql = "INSERT INTO `teachers` (
		`user`, 
		`pass`, 
		`fullname`, 
		`birthday`, 
		`address`, 
		`sex`, 
		`t_class`, 
		`s_teacher`, 
		`id_sub`, 
		`phone`, 
		`mail`) 
		VALUES ('".addslashes ($Arr['user'])."', 
		'".addslashes ($Arr['pass'])."', 
		'".addslashes ($Arr['fullname'])."', 
		'".addslashes ($Arr['birthday'])."', 
		'".addslashes ($Arr['address'])."', 
		'".addslashes ($Arr['sex'])."', 
		'".addslashes ($Arr['t_class'])."', 
		'".addslashes ($Arr['s_teacher'])."', 
		'".addslashes ($Arr['id_sub'])."', 
		'".addslashes ($Arr['phone'])."', 
		'".addslashes ($Arr['mail'])."')";
		
		mysqli_query($this->Connect, $sql);
	}

	
	public function getListClass()
	{
		$query = mysqli_query($this->Connect, "SELECT * FROM `class`");
		$resuft = array();
		if($query){
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;
	}

	public function Get_Class_CN_From_ID($id)
	{
		// lấy id của lớp rồi tìm thử nó thuộc sở hữu của ai
		if (is_numeric($id)) {
			$query = mysqli_query($this->Connect, "SELECT * FROM `teachers` WHERE `t_class` = ". $id);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function Get_ClassGV_Fr_Class($id_class){
		// lấy tên lớp từ id 
		if (is_numeric($id_class)) {
			$query = mysqli_query($this->Connect, "SELECT `id`, `class` FROM `class` WHERE `id` = ".$id_class);
			$resuft = mysqli_fetch_assoc($query);
			return $resuft;
		}
		
	}

	public function Get_ID_Class_Fr_Name($name){
		// lấy id lớp từ tên của lớp
		$query = mysqli_query($this->Connect, "SELECT `id` FROM `class` WHERE `class` = '".addslashes($name)."'");
		$resuft = mysqli_fetch_assoc($query);
		return $resuft;
	}

	public function Get_Name_Subject($id)
	{
		if (is_numeric($id)) {
			$query = mysqli_query($this->Connect, "SELECT * FROM `subject` WHERE `id_sub` = ". $id);

			return mysqli_fetch_assoc($query);
		}
	}


	public function Del_Class($id)
	{
		// xoá lớp
		if (is_numeric($id)) {
			mysqli_query($this->Connect, "DELETE FROM `class` WHERE `id` = ". $id);
		}
	}

	public function Update_Class($Arr){
		$sql = "UPDATE `class` SET 
		`class`='".addslashes ($Arr['class'])."'
		WHERE `id` = ".addslashes ($Arr['id']);
		
		mysqli_query($this->Connect, $sql);
		
		
		$sql = "UPDATE `teachers` SET 
		`t_class`='".addslashes($Arr['id'])."'
		WHERE `id` = ".addslashes($Arr['gv_cn']);
		mysqli_query($this->Connect, $sql);


	}

	public function Add_Class($Arr){
		if(is_numeric($Arr['ss'])){
			$query = mysqli_query($this->Connect, "SELECT * FROM `class` WHERE `class` = '".addslashes($Arr['class'])."'");

			if (mysqli_num_rows($query) > 0) {
				$resuft = 'Error';
			}else{
				$sql = "INSERT INTO `class` (
				`class`, `gv_cn`, `ss`) 
				VALUES (
				'".addslashes($Arr['class'])."', 
				'".addslashes($Arr['gv_cn'])."', 
				'".$Arr['ss']."'
			);";

			mysqli_query($this->Connect, $sql);
			$resuft = 'Success';
		}	
	}else{
		$resuft = 'Error';
	}
	return $resuft;
}
public function GetListSubject()
{	
	$query = mysqli_query($this->Connect, "SELECT * FROM `subject`");
	$resuft = array();
	if($query){
		while ($row = mysqli_fetch_assoc($query)) {
			$resuft[] = $row;
		}
	}
	return $resuft;
}
public function Update_Subject($Arr){
	$sql = "UPDATE `subject` SET 
	`name`='".addslashes ($Arr['name'])."',
	`subject`='".addslashes ($Arr['subject'])."'
	WHERE `id_sub` = ".addslashes ($Arr['id_sub']);
	mysqli_query($this->Connect, $sql);
}
public function Add_Subject($Arr){

	if(is_numeric($Arr['id_sub'])){
		$query = mysqli_query($this->Connect, "SELECT * FROM `subject` WHERE `name` = '".addslashes($Arr['name'])."'");
		$query_1 = mysqli_query($this->Connect, "SELECT * FROM `subject` WHERE `subject` = '".addslashes($Arr['subject'])."'");
		if (mysqli_num_rows($query) > 0 || mysqli_num_rows($query_1) > 0) {
			$resuft = 'Error';
		}else{
			$sql = "INSERT INTO `subject` (
			`name`, `subject`) 
			VALUES (
			'".addslashes($Arr['name'])."', 
			'".addslashes($Arr['subject'])."');";
			
			mysqli_query($this->Connect, $sql);
			$this->Create_Table_Mark($Arr['subject']);
			$resuft = 'Success';
		}	
	}else{
		$resuft = 'Error';
	}
	return $resuft;
}

public function Del_Subject($id)
{
	if (is_numeric($id)) {

		$subject = $this->getSubject_Fr_Id($id);
		mysqli_query($this->Connect, "DELETE FROM `subject` WHERE `id_sub` = ". $id);
		mysqli_query($this->Connect, "DROP TABLE `".$subject['subject']."`");
		echo 'Success';
	}

}

public function getListYear()
{
	$query = mysqli_query($this->Connect, "SELECT * FROM `term` ORDER BY `year`");
	$resuft = array();
	if($query){
		while ($row = mysqli_fetch_assoc($query)) {
			$resuft[] = $row;
		}
	}
	return $resuft;
}

public function Add_Year($Arr)
{
	if (is_numeric($Arr['type'])) {

		$query = mysqli_query($this->Connect, "SELECT * FROM `term` WHERE `type` = ".$Arr['type']." AND `year` = '".addslashes($Arr['year'])."'");

		if (mysqli_num_rows($query) > 0 ){
			$resuft = 'Error';
		} else {
			$sql = "INSERT INTO `term` (
			`type`, `year`) 
			VALUES (
			'".addslashes($Arr['type'])."', 
			'".addslashes($Arr['year'])."');";

			mysqli_query($this->Connect, $sql);
			$resuft = 'Success';	
		}
	} else {
		$resuft = 'Error';
		
	}
	return $resuft;
}

public function Update_Year($Arr){
	$sql = "UPDATE `term` SET 
	`type`='".addslashes ($Arr['type'])."',
	`year`='".addslashes ($Arr['year'])."'
	WHERE `id` = ".addslashes ($Arr['id']);
	mysqli_query($this->Connect, $sql);
}

public function getSubject_Fr_Id($id)
{
	if (is_numeric($id)) {
		$resuft = mysqli_query($this->Connect, "SELECT `subject` FROM `subject` WHERE `id_sub` = ". $id);
		return mysqli_fetch_assoc($resuft);
	}

}

public function Del_Year($id)
{
	if (is_numeric($id)) {
		mysqli_query($this->Connect, "DELETE FROM `term` WHERE `id_hk` = ". $id);
	}

}

protected function Create_Table_Mark($subject)
{
	$mahoa = addslashes($subject);
	$sql = "CREATE TABLE `".$mahoa."` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `id_hs` INT(11) NOT NULL , `id_hk` INT(11) NOT NULL , `mieng1` FLOAT NULL , `mieng2` FLOAT NULL , `mieng3` FLOAT NULL, `mieng4` FLOAT NULL, `mieng5` FLOAT NULL , `15p1` FLOAT NULL , `15p2` FLOAT NULL , `15p3` FLOAT NULL, `15p4` FLOAT NULL, `15p5` FLOAT NULL , `1t1` FLOAT NULL , `1t2` FLOAT NULL , `1t3` FLOAT NULL, `1t4` FLOAT NULL, `1t5` FLOAT NULL , `hk` FLOAT NULL , `tb` FLOAT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	mysqli_query($this->Connect, $sql);
	$sql = "ALTER TABLE `".$mahoa."` ADD CONSTRAINT `FK_TERM_".strtoupper($mahoa)."` FOREIGN KEY (`id_hk`) REFERENCES `term`(`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;";
	mysqli_query($this->Connect, $sql);
}
public function Get_Mark_Subject($id_hs, $id_hk,$subject){

	if (is_numeric($id_hs) && is_numeric($id_hk)) {
		$sql = "SELECT `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`  FROM `".addslashes($subject)."` WHERE `id_hs` = ". $id_hs ." AND `id_hk` = ".$id_hk;
		$resuft  =mysqli_query($this->Connect, $sql);

		return mysqli_fetch_assoc($resuft);
	}
}

}


class Connect_Database{

	public $Connect;
	public function __construct(){
		if (!$this->Connect){
			$this->Connect = mysqli_connect($GLOBALS['hostname'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']) or die('ERROR');
			mysqli_set_charset($this->Connect, 'utf8');
		}
	}

	public function __destruct(){
		if ($this->Connect){
			mysqli_close($this->Connect);
		}
	}

	public function _Get_AccessToken(){
		$query = mysqli_query($this->Connect, "SELECT * FROM `setting`");
		return mysqli_fetch_assoc($query);

	}

	public function Check_Id($id)
	{
		$query = mysqli_query($this->Connect, "SELECT * FROM `students` WHERE `id_facebook` = '$id'");
		if (mysqli_num_rows($query) > 0) {
			$sData = mysqli_fetch_assoc($query);

			return $sData;
		}else{
			return False;
		}
	}

	// lấy học kì chính
	public function Get_Main_Term(){
		
		$query = mysqli_query($this->Connect, "SELECT * FROM `term` WHERE `main` = 1");
		return mysqli_fetch_assoc($query);
		
	}
	public function Get_Mark_TB($id_hs){
		if (is_numeric($id_hs)) {
			$List_Sub = $this->GetListSubject();
			$total = 0;
			$tbc = 0;
			// var_dump($List_Sub);
			foreach ($List_Sub as $value) {
				// var_dump($value);
				$query = mysqli_query($this->Connect, "SELECT `tb` FROM `".$value['subject']."` WHERE `id_hs` = ". $id_hs);
				$resuft = mysqli_fetch_assoc($query);
				// var_dump($resuft);
				if ($resuft['tb'] != NULL || $resuft['tb' != 0]) {
					$total += $resuft['tb'];
					$tbc += 1;
				}
				

			}
			// echo round($total / $tbc, 2);
			return round($total / $tbc, 2);
		}
	}
	public function Get_Name_Sub($sub){
		$query = mysqli_query($this->Connect, "SELECT `name` FROM `subject` WHERE `subject` = '".$sub."'");
		$resuft = mysqli_fetch_assoc($query);
		return $resuft['name'];

	}

	public function GetListSubject()
	{	
		$query = mysqli_query($this->Connect, "SELECT * FROM `subject`");
		$resuft = array();
		if($query){
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;
	}

	public function Get_Class_Fr_ID($id){
		// lấy id lớp từ tên của lớp
		if (is_numeric($id)) {
			$query = mysqli_query($this->Connect, "SELECT * FROM `class` WHERE `id` = ".$id);
			$resuft = mysqli_fetch_assoc($query);
			return $resuft;

		}

	}

	public function Get_List_Notice_Cron()
	{	
		$date = date('Y-m-d');
		$hour = date('H');
		$query = mysqli_query($this->Connect, "SELECT * FROM `notice` WHERE `ngay_bd` <= '".$date."' AND `ngay_kt` >= '".$date."' AND `thoigian` = ". $hour);
		$resuft = array();
		if($query){
			while ($row = mysqli_fetch_assoc($query)) {
				$resuft[] = $row;
			}
		}
		return $resuft;
	}

	public function Update_Mark_ChatBot($id_student, $Arr_Mark){
		if (is_array($Arr_Mark)) {
			foreach ($Arr_Mark as $key_mark => $value_mark) {
				$total = 0;
				$chia = 0;
				$resuft = 0;
				$id_hk = $this->Get_Main_Term();

				$sql = "SELECT `mieng1` FROM `".$key_mark."` WHERE `id_hs` = ". $id_student ." AND `id_hk` = ".$id_hk['id_hk'];

				$resuft  =mysqli_query($this->Connect, $sql);
				if (mysqli_num_rows($resuft) == 0){
					$sql = "INSERT INTO `".$key_mark."` (`id_hs`, `id_hk`) VALUES ('".$id_student."', '".$id_hk['id_hk']."');";
					mysqli_query($this->Connect, $sql);
				}

				foreach ($value_mark as $key => $value) {
					if ($value != '') {
						
						if ($key <= 7) {
							$heso = 1;
						}else if ($key  >= 8 && $key <= 12 ) {
							$heso = 2;
						}else if ($key = 13) {
							$heso = 3;
						}

					// echo '<br />'.$heso.'|'. $value;
						$total += ($value * $heso);

						$chia += $heso;
						

					}else{
						$value_mark[$key] = 'NULL';
					}
				}
				if ($total == 0) {
					$resuft = 'NULL';
				}else{
					$resuft = $total / $chia;
					// echo $chia .'<br/>';
					$resuft = round($resuft, 1);

				}
				$sql = "UPDATE `".$key_mark."` SET `mieng1` = ".$value_mark[0].", `mieng2` = ".$value_mark[1].", `mieng3` = ".$value_mark[2].",`mieng4` = NULL, `mieng5` = NULL , `15p1` = ".$value_mark[3].", `15p2` = ".$value_mark[4].", `15p3` = ".$value_mark[5].", `15p4` = ".$value_mark[6].", `15p5` = ".$value_mark[7].", `1t1` = ".$value_mark[8].", `1t2` = ".$value_mark[9].", `1t3` = ".$value_mark[10].", `1t4` = ".$value_mark[11].", `1t5` = ".$value_mark[12].", `hk` = ".$value_mark[13].", `tb` = ".$resuft." WHERE `".$key_mark."`.`id_hs` = ".$id_student ." AND `id_hk` = ".$id_hk['id_hk'];
				// echo $sql . '<br/>';
				mysqli_query($this->Connect, $sql);
			}
			
		}
	}


}


class ChatBot{
	private $AccessToken = NULL,
	$SendRequest = NULL,
	$UserID = NULL;
	public function _Set_sData($AccessToken, $UserID)
	{
		$this->AccessToken = $AccessToken;
		$this->UserID = $UserID;
		$this->SendRequest = new Curl();
	}

	public function _Send_Text($message)
	{
		// $this->_Send_Action(2);
		$this->SendRequest->_setURL('https://graph.facebook.com/v2.6/me/messages?access_token='. $this->AccessToken);
		$sData = '
		{"recipient":{
			"id":"'.$this->UserID.'"
			},
			"message":{
				"text":"'.$message.'"
			}
		}';
		// var_dump($sData);
		$this->SendRequest->_setHeader(['Content-Type: application/json']);
		$this->SendRequest->_setPostData($sData);
		// var_dump($this->SendRequest);
		$this->SendRequest->_run();
	}
	public function _Send_Button($text, $tittle, $url){
		// $this->_Send_Action(2);
		$this->SendRequest->_setURL('https://graph.facebook.com/v2.6/me/messages?access_token='. $this->AccessToken);
		$sData = '
		{
			"recipient":{
				"id":"'.$this->UserID.'"
				},
				"message":{
					"attachment":{
						"type":"template",
						"payload":{
							"template_type":"button",
							"text":"'.$text.'",
							"buttons":[
							{
								"type":"web_url",
								"url":"'.$url.'",
								"title":"'.$tittle.'"
							}
							]
						}
					}
				}
			}';
		// var_dump($sData);
			$this->SendRequest->_setHeader(['Content-Type: application/json']);
			$this->SendRequest->_setPostData($sData);
		// var_dump($this->SendRequest);
			$this->SendRequest->_run();
		}

		public function _Send_Quick_Rep($text){
			$this->SendRequest->_setURL('https://graph.facebook.com/v2.6/me/messages?access_token='. $this->AccessToken);
			$sData = '
			{"recipient":{
				"id":"'.$this->UserID.'"
				},
				"message":{
					"text": "'.$text.'",
					"quick_replies":[
					{
						"content_type":"text",
						"title":"Cập nhâp điểm",
						"payload":"Update",
						},
						{
							"content_type":"text",
							"title":"Ghi tắt của môn",
							"payload":"Môn",
							},
							{
								"content_type":"text",
								"title":"Ghi tắt của kiểm tra",
								"payload":"Kiểm tra",
								},
								{
									"content_type":"text",
									"title":"Cú pháp để lấy điểm",
									"payload":"GetMark",
								}
								]
							}
						}';
		// var_dump($sData);
						$this->SendRequest->_setHeader(['Content-Type: application/json']);
						$this->SendRequest->_setPostData($sData);
		// var_dump($this->SendRequest);
						$this->SendRequest->_run();
					}

					public function _Send_Action($type = 1)
					{
						$Arr_type = [1=>'mark_seen', 2=>'typing_on', 3=>'typing_on'];

						$this->SendRequest->_setURL('https://graph.facebook.com/v2.6/me/messages?access_token='. $this->AccessToken);
						$sData = '
						{"recipient":{
							"id":"'.$this->UserID.'"
							},
							"sender_action":"'.$Arr_type[$type].'"
						}';
		// var_dump($sData);
						$this->SendRequest->_setHeader(['Content-Type: application/json']);
						$this->SendRequest->_setPostData($sData);
		// var_dump($this->SendRequest);
						$this->SendRequest->_run();
					}

					public function _Get_Message($value){
						$input = json_decode(file_get_contents($value), true);
						$UserID = $input['entry'][0]['messaging'][0]['sender']['id'];
						$message = $input['entry'][0]['messaging'][0]['message']['text'];
						if (!empty($input['entry'][0]['messaging'][0]['message'])) {
							$sRe_Arr = ['userid'=>$UserID, 'message'=>$message];
							return $sRe_Arr;
						}
					}
					public function _Send_SimSim($message){
						$this->SendRequest->_setURL('http://sim.s2vn.top/post_sim.php');
						$postdata = [
							'hoi' => $message,
							'lang' => 'vn',
						];
						$this->SendRequest->_setPostData($postdata);
						$this->SendRequest->_run();
						$resuft = $this->SendRequest->_getData();
						preg_match('#style="clear:both">(.+?)</span>#is',$resuft, $data);
						$this->_Send_Text(str_replace("\n",'\u000A',$data[1]));
					}
				}
				?>