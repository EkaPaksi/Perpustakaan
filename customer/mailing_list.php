<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Jakarta');
$date=date("Y/m/d H:i:sa");


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "eka@binahusada.com";
$mail->Password = "husada1234";
$mail->setFrom('eka@binahusada.com', 'First Last');
//$mail->addAddress($r['email'], $r['nama']);
$mail->Subject = 'PHPMailer GMail SMTP test';
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AltBody = 'This is a plain-text message body';
//$mail->addAttachment('assets/images/user.png');

//send the message, check for errors
$edit = mysql_query("SELECT * FROM karyawan WHERE nik");
while ($row = mysql_fetch_array ($edit)) {
	$mail2 = clone $mail;
    $mail2->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    $mail2->AddAddress($row["email"], $row["name"]);
	$mail->AddCC('eka@binahusada.com', 'Yuliyanti');
	$attachment = ('assets/images/'.($row['nik']). '.png');
	$mail2->addAttachment($attachment);
    //$mail2->send();
	if (!$mail2->send()) {
		echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />'; 
		break;
	} else {
		echo "Message sent to :" . $row['name'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
    }
}
$mail->SmtpClose();
