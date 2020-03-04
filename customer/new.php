<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/PHPMailer/src/Exception.php';
require './vendor/PHPMailer/src/PHPMailer.php';
require './vendor/PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Jakarta');
$date=date("Y/m/d H:i:sa");

// SMTPProvider Engine installation settings
$mail->Host = "smtp.gmail.com"; // Connect to this SMTPProvider server
$mail->SMTPAuth = true; // enables SMTP authentication. 
$mail->Port = 587; // SMTP submission port to inject mail into. Usually port 587 
$mail->Username = "admin@binahusada.com"; // SMTP username
$mail->Password = "admhusada"; // SMTP password
//$mail->SMTPDebug = 2; // uncomment to print debugging info

// Timezone
date_default_timezone_set('Asia/Jakarta');

// Campaign Settings
$mail_class = "transactional"; // Mail Class to use
$from_address = "admin@binahusada.com";
$from_name = "Newsletter";
$subject = "SimpleMH PHPMailer Example";
$html_body = "HTML body goes here.";
$text_body = "Text body goes here.";

// List of recipients
$recipients = array(
  "address1@example.net" => "Name 1",
  "address2@example.net" => "Name 2",
);

// Create the SMTP session
$mail = new PHPMailer();
$mail->IsSMTP(); // Use SMTP
$mail->SMTPKeepAlive = true; // prevent the SMTP session from being closed after each message
$mail->SmtpConnect();

// Set headers that are constant for every message outside of the foreach loop
$mail->SetFrom($from_address, $from_name);
$mail->Subject = $subject;
$mail->addCustomHeader("X-SMTPProvider-MailClass: $mail_class");

// Send a message to each recipient.
// Headers that are unique for each message should be set within the foreach loop
foreach ($recipients as $email => $name) {

  // Generate headers that are unique for each message
 $mail->ClearAllRecipients();
  $mail->AddAddress($email, $name);

  // Generate the message
 $mail->MsgHTML($html_body);
  $mail->AltBody = $text_body;

  // Send the message 
 if($mail->Send()) {
    echo "Message sent!\n";
  } else {
    echo "Mailer Error: " . $mail->ErrorInfo . "\n";
  }

}

// Close the SMTP session
$mail->SmtpClose();