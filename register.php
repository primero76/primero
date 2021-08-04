<?php
    session_start();
    

    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'flight_booking');
    
    $num = rand(100000000000000,999999999999999);
    $inpFrom = $_POST['inpFrom'];
    $inpTo = $_POST['inpTo'];
    $departureDateInp = $_POST['departureDateInp'];
    $classInp = $_POST['classInp'];
    $adultInp = $_POST['adultInp'];
    $childInp = $_POST['childInp'];
    $passengers = $childInp + $adultInp;
    $trackingId = $num;
    
    $insquery2 = "INSERT INTO flightdata(TRACKING_ID,FLY_FROM, FLY_TO, FLY_ON,FLY_CLASS, NUM_OF_PASSENGERS) VALUES ('$trackingId','$inpFrom','$inpTo','$departureDateInp','$classInp','$passengers')";
    mysqli_query($conn,$insquery2); 

    $_SESSION['from'] = $inpFrom;
    $_SESSION['to'] = $inpTo;
    $_SESSION['date']= $departureDateInp;
    $_SESSION['seatClass']= $classInp;
    $_SESSION['passengerCount'] = $passengers;
    $_SESSION['track'] = $trackingId;

    header("location:searchFlights.php");
    
?>

