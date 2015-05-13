<?php
  require("C:\sendgrid-php\sendgrid-php.php");

  // get account info from OpenShift environment variable
  $service_plan_id = "sendgrid_e3f7b"; // your OpenShift Service Plan ID
  $account_info = json_decode(getenv($service_plan_id), true);

  $sendgrid = new SendGrid($account_info['username'], $account_info['password']);
  $email    = new SendGrid\Email();

  $email->addTo("adurakovic4@etf.unsa.ba")
        ->setFrom("adna.durakovic11@gmail.com")
        ->setSubject("Sending with SendGrid is Fun")
        ->setHtml("and easy to do anywhere, even with PHP");

  echo"blaaa"; 
  $sendgrid->send($email);


/*
  $name = $_POST['firstname'];
  $visitor_email = $_POST['email'];
  $message = $_POST['myname'];
  
      
  $to = "adurakovic4@etf.unsa.ba";
  $subject = "Submitovana forma, SoulTrain";
  $headers  = 'From: adna.durakovic11@gmail.com' . "\r\n" .
              'MIME-Version: 1.0' . "\r\n" .
              'Cc: a_dna_299@hotmail.com' . "\r\n" .
              'Content-type: text/html; charset=utf-8';
  
  
  // Slanje maila

if (mail($to,$subject,$message,$headers))
{
  echo "Email sent";
} 
else
{
  echo "Email not sent.";
*/

?>