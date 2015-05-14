<?php
require("C:\PHPMailer_5.2.0\class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "adna.durakovic11@gmail.com";  // SMTP username
$mail->Password = "fakatmiseneda9111993"; // SMTP password

$mail->From = "adna.durakovic11@gmail.com";
$mail->FromName = "Adna";
//$mail->AddAddress("josh@example.net", "Josh Adams");
$mail->AddAddress("adurakovic4@etf.unsa.ba");                  // name is optional
//$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";


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
  echo "Zahvaljujemo se što ste nas kontaktirali.";
} 
else
{
  echo "Email nije poslan.";
}
*/

?>