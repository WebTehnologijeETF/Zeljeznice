<?php
	header('Content-Type: text/html; charset=utf-8');

  	$name = $_POST['firstname'];
  	$visitor_email = $_POST['email'];
  	$message = $_POST['myname'];

  	require("sendgrid-php/sendgrid-php.php");

  	$service_plan_id = "sendgrid_e3f7b";
  	$account_info = json_decode(getenv($service_plan_id), true);

  	$sendgrid = new SendGrid("aadurakovic4285", "1DvaTri!");

  	$email = new SendGrid\Email();

  	$email->addTo("adurakovic4@etf.unsa.ba")->addCc("irfanpra@gmail.com")->setFrom($visitor_email)->setSubject("Submitovana forma - Zeljeznice SoulTrain")->setText($message);

  	$sendgrid->send($email);
  	echo '<script>alert("Zahvaljujemo se što ste nas kontaktirali.")</script>';
  	header( 'refresh: 0; index.php' );

?>