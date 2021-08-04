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

    $trackingID = $_POST['track'];
    $sql1  = "select * from flightdata where TRACKING_ID =  '$trackingID' ";
    $res1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_assoc($res1);

    $sql2  = "select * from seats where ID = $trackingID";
    $res2 = mysqli_query($con,$sql2);
    $num1 = mysqli_num_rows($res2);
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
    <link rel="stylesheet" href="newtrack.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="main">    
        <div class="row"> 
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a href="about.html"> About Us</a></li>
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
        <button id="btn1" onclick="openBook();"><i class="fa fa-plane"></i>  Book </button>
        <button id="btn3" onclick="openFlightDetails();"><i class="fa fa-id-card"></i> Flight Status </button>
        <button id="btn2" onclick="cancelFlight();"><i class="fa fa-times"></i> Cancel Flight</button>
        <button style="background-color: lightseagreen;"> </button>
        <button style="background-color: lightseagreen;"> </button>            
    </div>    
    <div id="cont2" class="content">        
    <h1> Track Flights </h1>  
            <table>
            <tr>                        
            <th> DEPARTURE </th>
            <th> DESTINATION </th>
            <th> DATE </th>
            <th> TIME </th>
            <th> CLASS </th>
            <th> SEATS </th>
            <th> PASSENGERS </th>
            </tr>
            <?php
            if ($num1 == 0)
            {
            ?>
                <tr>
                
                </tr>
                <tr>
                <th colspan="7" class="NA"> <h2> Tracking Id Does not Exist </h2> </th>
                </tr>
            
            
            <?php
            }
            else
            {     
            ?>     
            <tr class="tabHeading">
            <th> <?php echo $row1['FLY_FROM']; ?></th>
            <th> <?php echo $row1['FLY_TO']; ?> </th>
            <th> <?php echo $row1['FLY_ON']; ?></th>
            <th> <?php echo $row1['FLY_TIME']; ?> </th>
            <th> <?php echo $row1['FLY_CLASS']; ?></th>
            <th id="scroll" onmouseover="vis()" onmouseout="unvis()"> 
            <?php
            while ($row2 = mysqli_fetch_assoc($res2)) {
            ?>
            <label><?php echo $row2['SEAT_NO']; ?> </label><br>
            <?php
            }
            ?>
            <?php
            }
            ?>
            <th> <?php echo $row1['NUM_OF_PASSENGERS']; ?> </th>
            </tr>
            </table>
            <div class="box" style="margin-top:60px">
            <button style="background-color: lightseagreen;" id="subbtn" onclick="goBack()"> Back  </button>
            </div>
    </div>
</div>

<script>
    function goBack()
    {
        window.history.back()
    }
    function vis()
    {
        document.getElementById("scroll").style.overflow = 'visible';
    }
    function unvis()
    {
        document.getElementById("scroll").style.overflow = 'hidden';
    }
</script>
</body>

</html>