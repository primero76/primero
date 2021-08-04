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

    $timing = $_GET['depTime'];
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $insquery2 = "UPDATE flightdata SET FLY_TIME='$timing' WHERE FLY_FROM = '$from' and FLY_TO = '$to' and FLY_ON = '$date'";
    
    mysqli_query($conn,$insquery2);

    $_SESSION['timing'] = $timing;
    header("location:seatSelection.php");
?>
