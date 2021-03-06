<?php
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
    
    $inpFrom = $_POST['inpFrom'];
    $inpTo = $_POST['inpTo'];
    $departureDateInp = $_POST['departureDateInp'];
    $classInp = $_POST['classInp'];
    $adultInp = $_POST['adultInp'];
    $childInp = $_POST['childInp'];
    $passengers = $childInp + $adultInp;
    $trackID = rand(100000000000000,999999999999999);


    $_SESSION['from'] = $inpFrom;
    $_SESSION['to'] = $inpTo;
    $_SESSION['date']= $departureDateInp;
    $_SESSION['seatClass']= $classInp;
    $_SESSION['passengerCount'] = $passengers;
    $_SESSION['tracking'] = $trackID;
    header("location:searchFlights.php");
    
?>

