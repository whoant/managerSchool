<?php 
require 'Curl.php';

$cookie = $_GET['cookie'];
preg_match('/c_user=(.*?);/', $cookie, $ID);

$User_ID = $ID[1];
$curl = new Curl;
$curl->_setURL('https://www.facebook.com/me');
$curl->_setCook($cookie);
$curl->_run();
$sData = $curl->_getData();

preg_match('#name="fb_dtsg" value="(.+?)"#is',$sData, $result);

$fb_dtsg = $result[1];

$sAccessToken = getToken($fb_dtsg, $cookie);

echo $User_ID . '|'.$fb_dtsg .'|'.$sAccessToken[1];


function getToken($fb_dtsg, $cookie){

	$array = array(
		'fb_dtsg' => $fb_dtsg,
		'app_id'=> '165907476854626',
		'redirect_uri'=> 'fbconnect://success',
		'display'=> 'popup',
		'access_token'=> '',
		'sdk'=> '',
		'from_post'=> '1',
		'private'=> '',
		'tos'=> '',
		'login'=> '',
		'read'=> '',
		'write'=> '',
		'extended'=> '',
		'social_confirm'=> '',
		'confirm'=> '',
		'seen_scopes'=> '',
		'auth_type'=> '',
		'auth_token'=> '',
		'default_audience'=> '',
		'ref'=> 'Default',
		'return_format'=> 'access_token',
		'domain'=> '',
		'sso_device'=> 'ios',
		'CONFIRM'=> '1'
	);
	$curl = new Curl;
	$curl->_setURL('https://www.facebook.com/v1.0/dialog/oauth/confirm');
	$curl->_setPostData($array);
	$curl->_setCook($cookie);
	$curl->_run();
	$sData = $curl->_getData();
	
	preg_match('#access_token=(.+?)&expires#is',$sData, $result);
	return $result;
}

?>