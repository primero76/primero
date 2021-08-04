<?php 
    session_start();
    $a = $_SESSION['seatname']+1;
    echo $a;
?>