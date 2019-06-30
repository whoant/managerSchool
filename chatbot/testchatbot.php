<?php 

include '../class/class.php';
$Send = new ChatBot();
$Connect = new Admin();

$id = '1407641966004623';

$query = mysqli_query($Connect->Connect, "SELECT * FROM `students` WHERE `id_facebook` = ". $id);
$info_students = mysqli_fetch_assoc($query);

$Arr = explode('_', $info_students['smas']);
$sData_Mark = Get_Diem($Arr[0], $Arr[1]);


$Connect->Update_Mark_ChatBot($info_students['id'], $sData_Mark);


function Get_Diem($user, $pwd){

	$curl = new Curl;
	$semester = 1;
	$curl->_setURL('http://smsedu.smas.vn/User/Login?ReturnUrl=%2f');
	$data = [
		'UserName' => $user,
		'Password' => $pwd
	];
	$curl->_setPostData(http_build_query($data));
	$curl->_run();
	if ($curl->_getRedirect() == 'http://smsedu.smas.vn/User/Login?ReturnUrl=%2f') {
		echo 'Error';
	}else{
		$Data = split('Dashboard?', $curl->_getRedirect());
		$curl->_setURL('http://smsedu.smas.vn/SParentAPI/api/learnProcess/getLearnProcessOfPupil?'.$Data[1].'&semester='. $semester);
		$curl->_setPostData($Data[1].'&semester='. $semester);

		$curl->_run();

		$List_Subject = [
			'Toán'=>'toan', 
			'Vật lí'=>'ly',
			'Hóa học'=>'hoa', 
			'Sinh học'=>'sinh',
			'Tin học'=>'tin', 
			'Ngữ Văn'=>'van',
			'Lịch sử'=>'su', 
			'Địa lí'=>'dia',
			'Tiếng Anh'=>'anh', 
			'GDCD'=>'congdan',
			'Công Nghệ'=>'congnghe', 
			'GDQP AN'=>'qp'
		];
		$Arr_Mark = [];

		$sData = json_decode($curl->_getData());
		$Arr_List_Json_Mark = ['listMarkM', 'listMarkP', 'listMarkV'];
		foreach ($sData->subjectMark as $value_sub) {
			if ($value_sub->subjectName != 'Thể dục') {
				$Arr_Mark[$List_Subject[$value_sub->subjectName]] = [];
				for ($i = 0; $i < count($Arr_List_Json_Mark); $i++) {
					foreach ($value_sub->$Arr_List_Json_Mark[$i] as $value) {
						$Arr_Mark[$List_Subject[$value_sub->subjectName]][] = $value->mark;
					}
				}
				$Arr_Mark[$List_Subject[$value_sub->subjectName]][] = $value_sub->semesterEndPoint;
			}
		}
		return $Arr_Mark;
	}

}

?>