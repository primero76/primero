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
    $sql  = "select * from seats";
    $res = mysqli_query($conn,$sql);

    $sql2  = "select passenger from details";
    $res2 = mysqli_query($conn,$sql2);

    $seatName = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $seatName = $_POST["seat"];
        foreach ($seatName as $sn => $value)
        {
            $insquery = "insert into seats(SEAT_NO) values ('$value')";
            mysqli_query($conn,$insquery);
        }
        header('location:success.php');   
    }
?>
