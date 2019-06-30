<?php


if (isset($_REQUEST['hub_challenge'])) {
	$c = $_REQUEST['hub_challenge'];
	$v = $_REQUEST['hub_verify_token'];
}

if ($v == '2vht') {
	echo $c;
}
include '../class/class.php';
$Send = new ChatBot();
$Connect = new Admin();
$input = json_decode(file_get_contents('php://input'), true);
// var_dump($input);
$AccessToken = $Connect->_Get_AccessToken();
$test = $Send->_Get_Message('php://input');

$UserID = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];




if (is_array($test)) {
	$Send->_Set_sData($AccessToken['access_token'], $test['userid']);


	$Data= $Connect->Check_Id($test['userid']);
	if (is_array($Data)) {
		// $Send->_Send_Text('Tài khoản bạn đã cập nhập');
		if (substr($test['message'], 0, 4) == 'diem') {
			$Send->_Send_Text('Đợi BOT 1 xíu nha');
			$Send->_Send_Action(2);
			$Arr = explode('_', $test['message']);
			$Main_Term = $Connect->Get_Main_Term();
			$query = mysqli_query($Connect->Connect, "SELECT * FROM `students` WHERE `id_facebook` = ". $test['userid']);
			$info_students = mysqli_fetch_assoc($query);
			if ($Arr[2] == 'mieng') {
				$resuft_diem = 'mieng';
				$data= 'miệng ';
				$type = 2;
			}else if($Arr[2] == '15p'){
				$resuft_diem = '15p';
				$data = '15 phút ';
				$type = 2;
			}else if($Arr[2] == '1t'){
				$resuft_diem = '1t';
				$data = '1 tiết ';
				$type = 2;
			}else if($Arr[2] == 'hk'){
				$resuft_diem = 'hk';
				$data = 'học kỳ ';
				$type = 1;
			}else {
				$resuft_diem = 'tb';
				$data = 'trung bình môn ';
				$type = 1;
			}

			$List_Mark = $Connect->Get_Mark_Subject($info_students['id'], $Main_Term['id_hk'], $Arr[1]);
			if ($type == 2){
				$resuft = '\u000A';
				for ($i = 1; $i <= 5; $i++) {
				// echo $resuft_diem . $i;
				// echo $List_Mark[$resuft_diem.$i];
					if ($List_Mark[$resuft_diem.$i] == NULL) {
						$List_Mark[$resuft_diem.$i] = 'Chưa có';
					}
					$resuft .= 'Lần '. $i. ': '. $List_Mark[$resuft_diem.$i]. '\u000A';

				}
			}
			else{
				$resuft = $List_Mark[$resuft_diem.$i];
			}

			// var_dump($resuft);
			$Send->_Send_Text('Điểm '.$data. $Connect->Get_Name_Sub($Arr[1]).' của '.$info_students['fullname'].' : '. $resuft);

		}else if (substr($test['message'], 0, 6) == 'update'){
			$Send->_Send_Text('Đợi BOT 1 xíu nha');
			$Send->_Send_Action(2);
			$Arr = explode('_', $test['message']);
			if (Check_Smas($Arr[1], $Arr[2])) {
				// $query = mysqli_query($Connect->Connect, "SELECT * FROM `students` WHERE `id_facebook` = ". $test['userid']);
				mysqli_query($Connect->Connect, "UPDATE `students` SET `smas` = '".$Arr[1].'_'.$Arr[2]."' WHERE `id_facebook` = ". $test['userid']);
				$Send->_Send_Action(2);

				$Send->_Send_Quick_Rep('Cập nhập thành công');
			}else{
				$Send->_Send_Action(2);
				$Send->_Send_Text('Tài khoản không tồn tại');
			}

		}
		else if ($test['message'] == 'Cập nhâp điểm'){

			$Send->_Send_Text('Đợi BOT 1 xíu nha');
			$Send->_Send_Action(2);
			$query = mysqli_query($Connect->Connect, "SELECT * FROM `students` WHERE `id_facebook` = ". $test['userid']);
			$info_students = mysqli_fetch_assoc($query);
			$Arr = explode('_', $info_students['smas']);
			$sData_Mark = Get_Diem($Arr[0], $Arr[1]);
			$Connect->Update_Mark_ChatBot($info_students['id'], $sData_Mark);
			$Send->_Send_Quick_Rep('Cập nhập thành công');
		}else if($test['message'] == 'Ghi tắt của kiểm tra'){
			$Send->_Send_Action(2);
			// $Send->_Send_Text();
			$Send->_Send_Quick_Rep('Danh sách loại điểm \u000A - Miệng ➡️ mieng \u000A - 15 phút ➡️ 15p \u000A - 1 tiết ➡️ 1t \u000A - Học kì ➡️ hk \u000A - Trung bình môn ➡️ tb');
		}else if($test['message'] == 'Ghi tắt của môn'){
			$Send->_Send_Action(2);
			$List_Sub = $Connect->GetListSubject();
			$resuft  = 'Danh sách các tên gì tắt của các môn học để lấy điểm \u000A';
			foreach ($List_Sub as $value) {
				$resuft .= ' - Môn '. $value['name'] . ' ➡️ ' . $value['subject'] . '\u000A';
			}
			$Send->_Send_Quick_Rep($resuft);
			// $Send->_Send_Text($resuft);

		}else if($test['message'] == 'Cú pháp để lấy điểm'){
			$Send->_Send_Quick_Rep("Soạn cú pháp : diem_<tentat>_<loaidiem> \u000AVí dụ như bạn muốn lấy điểm 15' thì soạn với cú pháp như sau : diem_toan_15p");
			// $Send->_Send_Text();
		}else{
			$Send->_Send_Quick_Rep("Danh sách loại ghi tắt");


		}

	}
	else{

		if (substr($test['message'], 0, 2) == 'dk') {
			$Arr = explode('_', $test['message']);

			$query = mysqli_query($Connect->Connect, "SELECT * FROM `students` WHERE `user` = '".$Arr[1]."' AND `pass` = '".$Arr[2]."'");
			if ($row = mysqli_fetch_assoc($query)) {
				mysqli_query($Connect->Connect, "UPDATE `students` SET `id_facebook` = '".$UserID."' WHERE `id` = ". $row['id']);
				$Send->_Send_Action(2);
				$Send->_Send_Text('Cập nhập thành công');
			}else{
				$Send->_Send_Action(2);
				$Send->_Send_Text('Cập nhập thất bại');
				$Send->_Send_Button('Nhấn vào đây để tiến hành đăng kí nếu chưa có tài khoản', 'Đăng kí', 'https://thikhkt.vovanhoangtuan.xyz');
			}
		}else{
			$Send->_Send_Action(2);
			$Send->_Send_Text('Tài khoản của bạn chưa cập nhập');
			$Send->_Send_Text('Soạn cú pháp : dk_<taikhoan>_<matkhau> để cấp nhập tài khoản \u000A Ví dụ tài khoản của bạn là vovanhoangtuan123 và mật khẩu của bạn là vovanhoangtuan456 thì cú pháp sẽ là \u000A dk_vovanhoangtuan123_vovanhoangtuan456');
			$Send->_Send_Button('Nhấn vào đây để tiến hành đăng kí nếu chưa có tài khoản', 'Đăng kí', 'https://thikhkt.vovanhoangtuan.xyz');
			// var_dump($Send);
			// $Send->_Send_Text('Bạn có muốn liên kết với tài khoản hay không ?');
		}

	}
}



function Check_Smas($user, $pwd){
	$curl = new Curl();
	$curl->_setURL('http://smsedu.smas.vn/User/Login?ReturnUrl=%2f');
	$data = [
		'UserName' => $user,
		'Password' => $pwd
	];
	$curl->_setPostData(http_build_query($data));
	$curl->_run();
	if ($curl->_getRedirect() == 'http://smsedu.smas.vn/User/Login?ReturnUrl=%2f') {
		return False;;
	}else{
		return True;
	}
}

function Get_Diem($user, $pwd){

	$curl = new Curl;
	$semester = 2;
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
