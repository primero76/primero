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
    

    $emailAdd = $_POST['emailinp'];
    $password = $_POST['passwordinp'];

    $s  = "select * from admin where ADMIN_EMAIL =  '$emailAdd' && ADMIN_PASSWORD = '$password' ";
    $result = mysqli_query($conn,$s);
    $num = mysqli_num_rows($result);

    if ($num==1){
        header('location:adminPage.php');
        $_SESSION['adminMail'] = $emailAdd;             
    }
    else{
        header('location:login.php');
        alert("Invalid email or Password");  
    }
?>  
