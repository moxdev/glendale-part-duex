<?php

if(!$_POST) {
	echo 'This page cannot be accessed directly.';
	exit();
}

// HIDDEN HONEYPOT
$spa = $_POST["spam"];

if (!empty($spa) && !($spa == "7" || $spa == "seven")) {
	echo "We're sorry, but you appear to be a spambot.";
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$recipients = $_POST["recipients"];
	$to = str_replace("_AT_","@",$recipients);
	//$to='chris@mm4solutions.com';

	$name = strip_tags($_POST["first-name"]);
	$email = strip_tags($_POST["email-address"]);
	$primary_phone = $_POST["primary-phone"];
	$comments = strip_tags($_POST["comments"]);
	$sbjct = strip_tags($_POST["subject"]);

	$from = "do-not-reply@glendale.com";
	$subject = $sbjct;
	$message = "Name: " . $name . "<br>" . "Email: " . $email . "<br>" . "Primary Phone: " . $primary_phone . "<br>" . "Message: " . $comments;
	$header='From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charser=iso-8859-1'."\r\n".'X-Mailer: PHP/'.phpversion();

	@mail($to,$subject,$message,$header);
}
?>