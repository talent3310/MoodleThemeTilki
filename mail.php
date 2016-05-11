<?php
require_once('../../config.php');
GLOBAL $CFG;

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'])) {
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

	$to = get_config('theme_shiksha', 'emailcontact');
	$subject = get_config('theme_shiksha', 'emailsubject');
	$message = $_POST['msg'];
	
	mail($to,$subject,$message,$headers);
}