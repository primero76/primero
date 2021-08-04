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
    $mobNum = $_POST['mobNuminp'];
    $f_name = $_POST['f_nameinp'];
    $m_name = $_POST['m_nameinp'];
    $l_name = $_POST['l_nameinp'];
    $dateOfBirth = $_POST['dobinp'];
    $city= $_POST['cityinp'];
    $gender = $_POST['genderinp'];
    $num = rand(0,100);
    $username = strtolower($f_name.$l_name."$num");
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');


    $insquery = "insert into signup (F_NAME,M_NAME,L_NAME,USERNAME,PASSWORD,EMAIL,MOBILENUM,CITY,GENDER,DOB,AGE) values ('$f_name','$m_name','$l_name','$username','$password','$emailAdd','$mobNum','$city','$gender','$dateOfBirth','$age')";
    mysqli_query($conn,$insquery);
    header('location:login.php');
    
?>

