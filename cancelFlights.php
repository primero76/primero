<?php
    session_start();

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'flight_booking');

    $emailAdd = $_SESSION['mail'];
    $sql  = "select * from signup where EMAIL =  '$emailAdd' ";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);

    $fullName = $row["F_NAME"]." ".$row["M_NAME"]." ".$row["L_NAME"];
    $firstName = strtoupper(" ".$row["F_NAME"]);
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
    <link rel="stylesheet" href="tracking.css">
    <link rel="stylesheet" href="masterkey.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="main">    
        <div class="row"> 
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a href="index.php"> About Us</a></li>
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
        <button id="btn1" onclick="openBook();"><i class="fa fa-plane"></i> <a href="booking.php"> Book </a> </button>
        <button id="btn3" onclick="openFlightDetails();"><i class="fa fa-id-card"></i> Flight Status </button>
        <button id="btn2" onclick="cancelFlight();"><i class="fa fa-times"></i> <a href="cancelFlights.php"> Cancel Flight </a></button>
        <button style="background-color: lightseagreen;"> </button>
        <button style="background-color: lightseagreen;"> </button>            
    </div>    
    <div id="cont3" class="content">
    <form action="trackValid.php" method="post">
            <h1 > Track Flights </h1>
            <table>
            <tr class="col1">                        
                    <td class="tablecol1" >
                        <label> ENTER TRACKING ID </label> <br>
                    </td>
                    <td class="tablecol2" >
                        <input type="text" name="track">
                    </td>
            </tr>
            </table>
            <div class="box" >
                <button style="background-color: lightseagreen;" id="subbtn" type="submit"> Find </button>
            </div>
    </div>
</div>
</form>
</body>

</html>
