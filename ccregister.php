<?php
    include('smtp/PHPMailerAutoload.php');
    session_start();    
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
    $query = "update signup set cardNumber = '$cardNumber', expiryDate = '$expiryDate', cvvNum = '$CVV' WHERE pEmail='$emailAdd'";
    mysqli_query($conn,$query);
    $sub = 'Tracking Id';
	$ID = $_SESSION['tracking'];
	$body = "
  	<h1 style='margin-left:15% ;'>
        Hello Welcome To <u> Primero Avionics </u>. 
        <br>
        Thank you for booking from Primero Avionics.For further details contact us.
        <br>
        You can easily track your flight through this tracking id
    </h1>
    <p style='border: rgb(0, 0, 0) solid 2px;margin-left:20% ;font-weight: bold;padding: 0 2%;background-color: rgb(32, 178, 170); width: 4%; font-size: 30px; color: rgb(255, 255, 255);'>
    	$ID
    </p>
    <a style='text-decoration: none;margin-left:8% ;font-weight: bold;padding: 0 2%; width: 4%; font-size: 30px; color: lightseagreen;'href='http://primero-airways.herokuapp.com/myticket.php'> Click To Generate Ticket </a>
	";
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

	smtp_mailer($_POST['emailinp'],$sub,$body);
	header('location:success.php');
?>
