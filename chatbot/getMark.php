<?php
// set_time_limit(0);
include 'Curl.php';

$curl = new Curl;

$semester = 2;
$curl->_setURL('http://smsedu.smas.vn/User/Login?ReturnUrl=%2f');
$data = [
	'UserName' => '0898506398',
	'Password' => '330527Y%'
];
// $data = [
// 	'UserName' => '0905755687',
// 	'Password' => '7tl2as17'
// ];
$curl->_setPostData(http_build_query($data));
$curl->_run();
if ($curl->_getRedirect() == 'http://smsedu.smas.vn/User/Login?ReturnUrl=%2f') {
	echo 'Error';
}else{
	$Data = split('Dashboard?', $curl->_getRedirect());
	// var_dump($Data);
	$pupilID = '10414526';
	// $Data[1] = '?schoolID=98829&academicYearID=170998&classID=1340157&pupilID=10388500&schoolID=98829&academicYearID=170998&classID=1340157&pupilID=10388500';
	$Data[1] = '?schoolID=98829&academicYearID=170998&classID=1340157&pupilID='.$pupilID.'&schoolID=98829&academicYearID=170998&classID=1340157&pupilID='. $pupilID;
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
	// var_dump($Arr_Mark);
	echo json_encode($Arr_Mark);
}


?>
