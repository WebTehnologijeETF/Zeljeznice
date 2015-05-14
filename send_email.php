<?php
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


?>