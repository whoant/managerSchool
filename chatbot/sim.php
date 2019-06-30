<?php 

include 'Curl.php';
$Bot = new Curl();
$text = 'Bạn tên gì thế?';
$Bot->_setURL('http://sim.s2vn.top/post_sim.php');
$postdata = [
	'hoi' => $text,
	'lang' => 'vn',
];
$Bot->_setPostData($postdata);
$Bot->_run();
$rep = $Bot->_getData();
preg_match('#style="clear:both">(.+?)</span>#is',$rep, $data);
echo $data[1];
 ?>