<?php
/*
  require("C:\sendgrid-php\sendgrid-php.php");

  // get account info from OpenShift environment variable
  $service_plan_id = "sendgrid_e3f7b"; // your OpenShift Service Plan ID
  $account_info = json_decode(getenv($service_plan_id), true);

  $sendgrid = new SendGrid($account_info['username'], $account_info['password']);
  $email    = new SendGrid\Email();

  $email->addTo("adurakovic4@etf.unsa.ba")
        ->setFrom("adna.durakovic11@gmail.com")
        ->setSubject("Sending with SendGrid is Fun")
        ->setText('Hi I have sent you a mail!')
        ->setHtml('<strong>and easy to do anywhere, even with PHP</strong>');
        

  $response=$sendgrid->send($email);
  print_r($response);
*/

  ini_set("SMTP", "webmail.etf.unsa.ba");
  ini_set("smtp_port", "25");
  ini_set('sendmail_from', 'adurakovic4@etf.unsa.ba');

  $name = $_POST['firstname'];
  $visitor_email = $_POST['email'];
  $message = $_POST['myname'];
  
      
  $to = "adurakovic4@etf.unsa.ba";
  $subject = "Submitovana forma, SoulTrain";
  $headers  = 'From: adurakovic4@etf.unsa.ba' . "\r\n" .
              'MIME-Version: 1.0' . "\r\n" .
              'Cc: ibrankovic1@etf.unsa.ba' . "\r\n" .
              'Content-type: text/html; charset=utf-8';
  
  
  // Slanje maila

if (mail($to,$subject,$message,$headers))
{
  echo "Email sent";
} 
else
{
  echo "Email not sent.";
}


?>