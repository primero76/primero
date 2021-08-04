<?php
    session_start();
    
    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'flight_booking');

    $timing = $_GET['depTime'];
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $insquery2 = "UPDATE flightdata SET FLY_TIME='$timing' WHERE FLY_FROM = '$from' and FLY_TO = '$to' and FLY_ON = '$date'";
    
    mysqli_query($conn,$insquery2);

    $_SESSION['timing'] = $timing;
    header("location:seatSelection.php");
?>