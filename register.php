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
    
    $inpFrom = $_POST['inpFrom'];
    $inpTo = $_POST['inpTo'];
    $departureDateInp = $_POST['departureDateInp'];
    $classInp = $_POST['classInp'];
    $adultInp = $_POST['adultInp'];
    $childInp = $_POST['childInp'];
    $passengers = $childInp + $adultInp;
    
    $insquery2 = "INSERT INTO flightdata(FLY_FROM, FLY_TO, FLY_ON,FLY_CLASS, NUM_OF_PASSENGERS) VALUES ('$inpFrom','$inpTo','$departureDateInp','$classInp','$passengers')";
    mysqli_query($conn,$insquery2); 

    $_SESSION['from'] = $inpFrom;
    $_SESSION['to'] = $inpTo;
    $_SESSION['date']= $departureDateInp;
    $_SESSION['seatClass']= $classInp;
    $_SESSION['passengerCount'] = $passengers;
    
    header("location:searchFlights.php");
    
?>

