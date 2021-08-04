<?php
    session_start();

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    $firstName = $_SESSION['NAME'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK</title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="masterbooking.css">
    <link rel="stylesheet" href="masterkey.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="main">    
        <div class="row"> 
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a href="homepage.php"> About Us</a></li>
                    <li><i class="fa fa-newspaper-o"></i><a onclick="alert('Already on booking page')"> Book </a></li>
                    <li><i class="fa fa-tasks"></i><a href="#"> Manage</a></li>
                    <li><i class="fa fa-address-book"></i><a href="contact.html"> Contact Us</a></li>
                    <li><i class="fa fa-user-circle-o"></i><?php echo $firstName ?> | <a href="logout.php"> LOGOUT </a> </li>
                </ul>
            </nav>
        </div>
</header>

    <div class="heading">
        <div class="namelogo">
            <img class="logo" src="AIRLINE-LOGO2.png">
            <p class="name"> Primero </p>
            <br><br>
            <p class="name2"> Avionics </p>
        </div>
    </div>

<div class="flightForm"> 
    <div class="btn-box">
        <button class="sucssbtn"><i class="fa fa-plane"></i> Book </button>
        <button class="sucssbtn"><i class="fa fa-id-card"></i> <a href="tracking.php"> Flight Status </a></button>
        <button > </button>
        <button > </button>
        <button > </button>            
    </div>    
    <div id="cont1" class="content">
    <h1> Flight has been booked successfully </h1>
    <br>
    <h3> Your tracking id is sent to your email address</h3>        
    <div class="generatebox" >
            <button style="background-color: lightseagreen;" id="subbtn"> <a href="myticket.php"> Generate Ticket </a></button>
    </div>
    </div>
</div>
</form>

<script src="booking.js"></script>
</body>

</html>
