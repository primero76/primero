<?php
    session_start();
    
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'flight_booking');

    $code = $_POST['codeinp'];
    if ($_SESSION['code'] == $code)
    {
        header("location:passwordconfirm.php"); 
    }
?>
