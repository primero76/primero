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

    $ID = $_GET['deptID'];
    $num = rand(100000000000000,999999999999999);
    $trackingId = $num;
    
    $query1 = "SELECT * FROM details where DETAILS_ID='$ID';"
    $result = mysqli_query($conn,$query1);
    $row = mysqli_fetch_assoc($result);
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $time = $row['departuretime'];
    $flight = $row['flightname'];

    $insquery2 = "UPDATE flightdata SET TRACKING_ID='$trackingId',FLY_TIME='$time',FLIGHT_NAME='$flight' WHERE FLY_FROM = '$from' and FLY_TO = '$to' and FLY_ON = '$date'";
    mysqli_query($conn,$insquery2);

    $_SESSION['time'] = $time;
    $_SESSION['name'] =  $flight;
    $_SESSION['track'] = $trackingId;
    header("location:seatSelection.php");
?>
