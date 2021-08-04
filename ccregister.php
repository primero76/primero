<?php
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

    $subject = "Tracking Id";
    $body = "  Hi, Thank you for booking from Primero Avionics. For further details contact us.
    You can easily track your flight through this tracking id
        
    
    $ID";
    $headers = "From: airways.primero@gmail.com";
    $to_email = $emailAdd;
    if (mail($to_email, $subject, $body, $headers)) {
    header('location:success.php');
    }
header('location:success.php');
?>
