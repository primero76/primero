<?php
    session_start();
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'flight_booking');

    $email = $_SESSION['mail'];
    $pw = $_POST['passwordinp'];

    $query1 = "update signup set PASSWORD='$pw' where EMAIL ='$email' ";
    mysqli_query($con,$query1);

    header("location:login.php");
?>
