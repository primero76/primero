<?php
    include('smtp/PHPMailerAutoload.php');
    session_start();    
    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    
    $cardNumber = $_POST['cardinp'];
    $expiryDate = $_POST['expDateinp'];
    $CVV = $_POST['cvvinp'];

    $emailAdd = $_SESSION['mail'];
    $ID = $_SESSION['track'];

    $query = "update set CARD_NUMBER = '$cardNumber', EXPIRY_DATE = '$expiryDate', CVV = '$CVV' WHERE EMAIL='$emailAdd'";
    mysqli_query($conn,$query);

    $subj = "Tracking Id";
    $body = "  Hi, Thank you for booking from Primero Avionics. For further details contact us.
    You can easily track your flight through this tracking id
        
    
    $ID";
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
smtp_mailer($_SESSION['mail'],$subj,$body);
header('location:success.php');
?>
