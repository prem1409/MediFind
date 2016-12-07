<?php



$mail->addAddress($xemail,$xfname);





$mail->Subject = "New Registration to MediFind";
$mail->Body = "Hi,<br /><br />You have successfully registered to MediFind!!<br>Your Credentials:<br>First Name: $xfname<br>Middle Name: $xmname<br>Last Name: $xlname<br>Phone No.:$xphno<br>Email ID: $xemail<br><br>From Mailing Services at MediFind.";

if(!$mail->Send())
	echo "Email was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
	echo "Email has been sent";
?>
