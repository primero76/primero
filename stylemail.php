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
  <h1 style='margin-left:15% ;'>
        Hello Welcome To <u> Primero Avionics </u>. 
        <br>
        We have Encoutered a Password reset request.
        <br>
        If it is you then enter the following code.
    </h1>
    <p style='border: rgb(0, 0, 0) solid 2px;margin-left:20% ;font-weight: bold;padding: 2%;background-color: rgb(32, 178, 170); width: 3%; font-size: 30px; color: rgb(255, 255, 255);'>
        5738
    </p>
    <a href='http://primero-airways.herokuapp.com/myticket.php'></a>
";
smtp_mailer('airways.primero@gmail.com','MY HTML',$msg);

?>
