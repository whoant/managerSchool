<?php
/*
## Class:    Curl (Curl Library)
## Author:   Nguyễn Trung Hậu
## Facebook: FB.COM/HEXAN.OFFICIAL
*/

class Curl{
	private $url = NULL,
			$timeoutconnect = NULL,
			$timeoutcurl = NULL,
			$post = NULL,
			$cookie = NULL,
			$useragent = NULL,
			$transfer = true,
			$user = NULL,
			$pass = NULL,
			$path_cookie = NULL,
			$return_header = false,
			$header = NULL,
			$data = NULL,
			$code = NULL;
	public function _setURL($url = NULL) // Set Url Curl
	{
		$this->url = $url;
	}
	public function _setTimeOutConnect($time = 60) // Set Time Out Curl
	{
		$this->timeoutconnect = $time;
	}
	public function _setTimeOutCurl($time = 300) // Set Time Out Curl
	{
		$this->timeoutcurl = $time;
	}
	public function _setPostData($data = NULL) // Set Post Data
	{
		if(NULL !== $data){
			$this->post = $data;
		}
	}
	public function _setUserAgent($useragent = NULL) // Set User Agent
	{
		$this->useragent = $useragent;
	}
	public function _setTransfer($transfer = true) // Set Return Transfer
	{
		$this->transfer = $transfer;
	}
	public function _setCook($cookie = NULL) // Set Cookie
	{
		$this->cookie = $cookie;
	}
	public function _setAuth($user = NULL, $pass = NULL) // Set Auth
	{
		if(NULL !== $user AND NULL !== $pass){
			$this->user = $user;
			$this->pass = $pass;
		}
	}
	public function _pathCook($path = NULL) // Set Path Save And Load Cookie
	{
		$this->path_cookie = $path;
	}
	public function _setHeader($header = NULL) // Set Header
	{
		if(NULL !== $header AND is_array($header) == true){
			$this->header = $header;
		}
	}
	public function _setReturnHeader($return = false) // Set Return Header
	{
		$this->return_header  = $return;
	}
	public function _getData() // Get Data
	{
		return @$this->data;
	}
	public function _getCode() // Get Code
	{
		return @$this->code;
	}
	public function _clear() // Clear Data
	{
		$this->url = NULL;
		$this->timeoutconnect = NULL;
		$this->timeoutcurl = NULL;
		$this->post = NULL;
		$this->cookie = NULL;
		$this->useragent = NULL;
		$this->transfer = true;
		$this->user = NULL;
		$this->pass = NULL;
		$this->path_cookie = NULL;
		$this->return_header = false;
		$this->header = NULL;
	}
	public function _run() // Run Curl
	{
		try{
			if(NULL == $this->url){
				throw new \Exceptions('không có thông tin URL!');
			}
		}
		catch( \Exceptions $e){
			die($e->eMessageCurl());
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		@curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		if(NULL !== $this->timeoutconnect){
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->timeoutconnect); // Thời Gian Kết Nối
		}
		if(NULL !== $this->timeoutcurl){
			curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeoutcurl); // Thời Gian Lấy Dữ Liệu
		}
		if(NULL !== $this->post){
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->post);
		}
		$this->useragent = (NULL !== $this->useragent) ? $this->useragent : 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36';
		curl_setopt($curl, CURLOPT_USERAGENT, $this->useragent);
		$array_true_false = array(TRUE, FALSE);
		$this->transfer = (in_array($this->transfer, $array_true_false) == false) ? TRUE : $this->transfer;
		$this->return_header =  (in_array($this->return_header, $array_true_false) == false) ? FALSE : $this->return_header;
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, $this->transfer);
		$array_header = array();
		if(NULL !== $this->header AND is_array($this->header) == true){
			$array_header = $this->header;
		}
		if(NULL !== $this->cookie){
			$this->header = array();
			$this->header[] = 'Connection: keep-alive';
			$this->header[] = 'Keep-Alive: 300';
			$this->header[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
			$this->header[] = 'Accept-Language: en-us,en;q=0.5';
			$this->header[] = 'Expect:';
			$this->header = array_merge($array_header, $this->header);
			curl_setopt($curl, CURLOPT_COOKIE, $this->cookie);
		}
		if(NULL !== $this->user AND NULL !== $this->pass){
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST|CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, $this->user.':'.$this->pass);
		}
		if(NULL !== $this->path_cookie){
			curl_setopt($curl, CURLOPT_COOKIEFILE, $this->path_cookie);
			curl_setopt($curl, CURLOPT_COOKIEJAR, $this->path_cookie);
		}
		if($this->return_header == true){
			curl_setopt($curl, CURLOPT_HEADER, true);
		}
		if($this->header){
			curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
		}
		ob_start();
		$this->data = curl_exec($curl);
		$this->code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		ob_end_clean();
		unset($curl);
		$this->_clear();
	}
}