<?php
    session_start();    
    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'flight_booking');
    
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
    $headers = "From: ashhad.k2@gmail.com";
    $to_email = $emailAdd;
    if (mail($to_email, $subject, $body, $headers)) {
    header('location:success.php');
    }
?>