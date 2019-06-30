<?php 
session_start();

include 'config.php'

function Login_Student



class Students extends Connect_Database{
	public function Login($username, $password){
		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `students` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if ($row = mysqli_fetch_assoc($query)) {
			$_SESSION = $row;
			$_SESSION['check'] = 'student';
			echo "<script>window.location='index.php';</script>";
		}else{
			echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
		}

	}
	
}




class Teachers extends Connect_Database{
	public function Login($username, $password){
		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `teachers` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if ($row = mysqli_fetch_assoc($query)) {
			$_SESSION = $row;
			$_SESSION['check'] = 'teacher';
			echo "<script>window.location='index.php';</script>";
		}else{
			echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
		}

	}

}



class Admin extends Connect_Database{
	public function Login($username, $password){

		$username = addslashes($username);
		$password = addslashes($password);
		$sql = "SELECT * FROM `admin` WHERE `user` = '".$username."' AND `pass` = '".$password."'";
		$query = mysqli_query($this->Connect, $sql);
		if ($row = mysqli_fetch_assoc($query)) {
			$_SESSION = $row;
			$_SESSION['check'] = 'admin';
			echo "<script>window.location='index.php';</script>";
		}else{
			echo "<script>swal('Đăng nhập thất bại', 'Sai tài khoản hoặc mật khẩu', 'error');</script>";
		}

	}

}



class Connect_Database{
	public $Connect;
	public function Connect(){
		if (!$this->Connect){
			$this->Connect = mysqli_connect('localhost', 'root', 'mysql', 'tracnghiem') or die('ERROR');
			mysqli_set_charset($this->Connect, 'utf8');
		}
	}

	// public function __construct(){
	// 	if (!$this->Connect){
	// 		$this->Connect = mysqli_connect('localhost', 'root', 'mysql', 'tracnghiem') or die('ERROR');
	// 		mysqli_set_charset($this->Connect, 'utf8');
	// 	}
	// }

	// public function __destruct(){
	// 	if ($this->Connect){
	// 		mysqli_close($this->Connect);
	// 	}
	// }
}

?>