<?php
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