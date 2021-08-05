<?php
include('smtp/PHPMailerAutoload.php');
    $F_NAME = $_POST['firstname'];
    $L_NAME = $_POST['lastname'];
    $NAME = $F_NAME." ".$L_NAME;
    $PHONE_NUM = $_POST['num'];
    $SUB =  $_POST['sub'];
    $mail =  $_POST['email'];
    $DESC =  $_POST['subject'];

    
    $to_email = "airways.primero@gmail.com";
    $body = "";

    $body.="From: ".$NAME. "\r\n";
    $body.="Phone Number: ".$PHONE_NUM. "\r\n";
    $body.="Email: ".$mail. "\r\n";
    $body.="Message: ".$DESC. "\r\n"
  
echo smtp_mailer($to_email,$SUB,$body);
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

?>
