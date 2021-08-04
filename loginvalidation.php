<?php
    require_once 'connection.php';
    session_start();
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
