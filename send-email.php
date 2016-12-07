<?php
require 'PHPMailer-master/class.phpmailer.php';
require 'PHPMailer-master/class.smtp.php';
//include 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
//$mail->Port = 465;
//$mail->SMTPSecure = 'ssl';
//echo !extension_loaded('openssl')?"Not Available":"Available";
// or try these settings (worked on XAMPP and WAMP):
 $mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPDebug=3;
$mail->SMTPAuth=true;
$mail->Username = "raulakshay6666@gmail.com";
$mail->Password = "KNOWledge@second";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "raulakshay6666@gmail.com";
$mail->FromName = "Akshay";

$mail->addAddress("raulakshay@gmail.com","Akshay");





$mail->Subject = "New Registration to MediFind";
$mail->Body = "Hi,<br /><br />There is a new Registration to MediFind!!<br>First Name: $xfname<br>Middle Name: $xmname<br>Last Name: $xlname<br>Phone No.:$xphno<br>Email ID: $xemail<br><br>Tesing Mail Services at MediFind WP Project!!";

if(!$mail->Send())
	echo "Email was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
	echo "Email has been sent";
?>
