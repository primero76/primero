<?php
include('smtp/PHPMailerAutoload.php');
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "airways.primero@gmail.com";
	$mail->Password = "primero12345";
	$mail->SetFrom("airways.primero@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
$msg = "
  <p style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #BBBBBB;background-color: #20b2aa'> Here are the birthdays upcoming in August!</p>
  <br>
  <h1>Here are the birthdays upcoming in August!</h1>
";
smtp_mailer('airways.primero@gmail.com','MY HTML',$msg);

?>
