<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/PHPMailer/src/Exception.php';
require './vendor/PHPMailer/src/PHPMailer.php';
require './vendor/PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "admin@binahusada.com";
$mail->Password = "admhusada";
$mail->setFrom('admin@binahusada.com', '');
$mail->Subject = 'Perincian Piutang Asuransi & Perusahaan';


$result = mysql_query('SELECT * from customer') or die(mysql_error());
While($row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $hamsa = array($row['email']);
foreach($hamsa as $email){ 
	$attachment = ('W:/'.($row['nama']). '.xlsx');
	if (!file_exists($attachment)) {
	} else {
	$mail->ClearAllRecipients();
	$mail->clearAttachments();
	$mail->AddAddress($email, $row["nama"]);
	$mail->AddCC('yuliyanti@mitrakeluarga.com ', 'Yuliyanti');
	$mail->IsHTML(true);  
	$bb ="Kepada Yth<br>
	Provider $row[alias]<br>
	Di tempat<br>
	<br>
	Dengan hormat<br>
	Bersama ini kami kirimkan outstanding $row[alias] dari RS Bina Husada yang sudah jatuh tempo per hari ini tanggal $date , agar dilakukan pembayaran atas tagihan terlampir .<br>
	<br>
	<p>Atas nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : PT BINA HUSADA GEMILANG</p>
	<p>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MANDIRI</p>
	<p>No Rek&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 133-00-88880885</p>
	<br>
	Atas kerjasama dan perhatiannya kami ucapkan terima kasih<br>
	<br>
	<br>
	Regards<br>
	<br>
	Sri Mulyati<br>
	0857-4355-9295<br>
	Bagian Finance (A/R)<br>
	";
	$mail->Body = $bb;
	$mail->addAttachment($attachment);
	$mail->AltBody = $text_body;
	if (!$mail->send()) {
		 echo" <table>
			<tr>
				<td width='150px'>Mailer Error</td>
				<td width='100px'>" . str_replace("@", "&#64;", $row["nama"]) . "</td>
				<td width='300px'>" . str_replace("@", "&#64;", $row["email"]) . "</td>
				<td width='300px'>".$mail->ErrorInfo."</td>
				<td width='170px'> ".$date."</td>
                </tr>";   
			echo"</table> ";
		mysql_query("INSERT INTO log (status, nama, email, info, create_time) 
					VALUES ('Mailer Error','" . str_replace("@", "&#64;", $row["nama"]) . "','" . str_replace("@", "&#64;", $row["email"]) . "','$mail->ErrorInfo','$date')");
		
		break;
	} else {
		echo" <table>
			<tr>
				<td width='150px'>Message sent</td>
				<td width='100px'>" . str_replace("@", "&#64;", $row["nama"]) . "</td>
				<td width='300px'>" . str_replace("@", "&#64;", $row["email"]) . "</td>
				<td width='300px'>" . str_replace("@", "&#64;", $attachment) . "</td>
				<td width='170px'> ".$date."</td>
                </tr>";   
			echo"</table> ";
		mysql_query("INSERT INTO log (status, nama, email, info, create_time) 
					VALUES ('Message sent','" . str_replace("@", "&#64;", $row["nama"]) . "','" . str_replace("@", "&#64;", $row["email"]) . "','$attachment','$date')");
		mysql_query("UPDATE customer SET last_sent='$date' WHERE id='".$row["id"]."'");
		/*unlink($attachment);*/
	}
}
}
}
$mail->SmtpClose();
?>