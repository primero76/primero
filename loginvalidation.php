<?php
    session_start();

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'flight_booking');
    
    $emailAdd = $_POST['emailinp'];
    $password = $_POST['passwordinp'];

    $s  = "select * from signup where EMAIL =  '$emailAdd' && PASSWORD = '$password' ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);

    if ($num==1){
        header('location:homepage.php');
        $_SESSION['mail'] = $emailAdd;             
    }
    else{
        header('location:login.php');
        alert("Invalid email or Password");  
    }
?>  