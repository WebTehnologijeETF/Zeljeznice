<?php

  $name = $_POST['firstname'];
  $visitor_email = $_POST['email'];
  $message = $_POST['myname'];

  require("C:\sendgrid-php/sendgrid-php.php");

  $service_plan_id = "sendgrid_e3f7b";
  $account_info = json_decode(getenv($service_plan_id), true);

  $sendgrid = new SendGrid("aadurakovic4285", "1DvaTri!");

  $email = new SendGrid\Email();

  $email->addTo("adurakovic4@etf.unsa.ba")->addCc("adna.durakovic11@gmail.com")->setFrom($visitor_email)->setSubject("Submitovana forma - Zeljeznice SoulTrain")->setText($message);

  $sendgrid->send($email);
  echo '<script>alert("Zahvaljujemo se što ste nas kontaktirali.")</script>';
  header( 'refresh: 2; index.html' );

/*
header('Content-Type: text/html; charset=utf-8');


  $name = $_POST['firstname'];
  $visitor_email = $_POST['email'];
  $message = $_POST['myname'];
  
      
  $to = "adurakovic4@etf.unsa.ba";
  $subject = "Submitovana forma, SoulTrain";
  $msg = "Haloo :)";
  $headers  = 'From: adurakovic4@etf.unsa.ba' . "\r\n" .
              'MIME-Version: 1.0' . "\r\n" .
              'Cc: ibrankovic1@etf.unsa.ba' . "\r\n" .
              'Content-type: text/html; charset=utf-8';
  
  
  // Slanje maila

if (mail($to,$subject,$msg,$headers))
{
  echo "Zahvaljujemo se što ste nas kontaktirali.";
} 
else
{
  echo "Email nije poslan.";
}
*/

?>