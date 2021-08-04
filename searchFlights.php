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

    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $sclass = $_SESSION['seatClass'];
    $b_price = "PKR 18,000";
    $e_price = "PKR 12,000";
    if ($sclass == 'Business')
    {
        $price = $b_price;
    }
    else
    {
        $price = $e_price;
    }
    $_SESSION['ticketPrice'] = $price;
    $query1 = "SELECT * FROM details WHERE departureplace = '$from' and returnplace='$to' and departuredate='$date'";
    
    $res = mysqli_query($conn, $query1);
    $num = mysqli_num_rows($res);
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
    <link rel="stylesheet" href="masterkey.css">
    <link rel="stylesheet" href="searchFlights.css">
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
        <button id="btn1" onclick="openBook();"><i class="fa fa-plane"></i> Book </button>
        <button id="btn2" onclick="openFlighthetails();"><i class="fa fa-id-card"></i>  Flight Status</button>
        <button style="background-color: lightseagreen;"> </button>
        <button style="background-color: lightseagreen;"> </button>  
        <button style="background-color: lightseagreen;"> </button>            
    </div>    
    <div id="cont1" class="content">
            <?php
                if ($num != 0)
            {
            ?>
        <h1> Available Flights </h1>
        <br><br>
        <?php
            }
        ?>
        <form action="" method="post">
        <table >
            <tr class="tabHeading">
            <th> ID </th>
            <th> DEPARTURE </th>
            <th> DESTINATION </th>
            <th> DATE </th>
            <th> TIME </th>
            <th> PRICE </th>
            <th style="border:none">  </th>
            </tr >
            <?php
                if ($num == 0)
            {
            ?>
                <tr>
                
                </tr>
                <tr>
                <th colspan="6" class="NA"> <h2> No Available Flights </h2> </th>
                </tr>
            
            
            <?php
            }
            else
            {
                $j = 0;
                while($row = mysqli_fetch_assoc($res))
                {
                    $j+=1;
                ?>
                <tr>
                    <th> <?php echo $j ?> </th>
                    <th><?php echo $row["departureplace"];?></th>
                    <th><?php echo $row["returnplace"];?></th>
                    <th><?php echo $row["departuredate"];?></th>
                    <th id='time' name="time" value="$time"><?php echo $row["departuretime"];?></th>
                    <th> <?php echo $price;?> </th>
                    <th class="selectrow" style="border:none"> <button type="submit"> <a href="validation.php?depTime=<?php echo $row["departuretime"];?>"> Select </a> </button> </th>
                </tr>
                <?php
                }
            }
                
            ?>    
        </table>
        </form>
    <div id="cont2" class="content">
        <h1> Search For Flights </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae consectetur nemo ut asperiores fugit cumque modi sint fugiat tempora corporis alias odio, similique quisquam quo aliquam aperiam? Ipsa, veritatis ipsum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae consectetur nemo ut asperiores fugit cumque modi sint fugiat tempora corporis alias odio, similique quisquam quo aliquam aperiam? Ipsa, veritatis ipsum?
        </p>
        <img src="ty.jpg" style=" float: right;">
    </div>
    <div id="cont3" class="content">
        <h1> Cancel Flights </h1>
        <p>
            I agree to receiving marketing communications, offers, news and market research from time to time by electronic media and SMS from Privilege Club. Electronic media refers to email and Social Media.
        </p>
        <img src="ty.jpg" style=" float: right;">
    </div>
</div>
</form>
</div>
<div class="footer-wave" >
           
           <div class="wave-decoration">
             <div class="wave02">
                 <svg version="1.1" width="100%" height="131" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100% 131.2" style="enable-background:new 0 0 100% 131.2;" xml:space="preserve">
                      <style type="text/css">
                         .st0 {
                         opacity: 0.25;
                         enable-background: new;
                         }
                         .st1 {
                         opacity: 0.35;
                         enable-background: new;
                         }
   
                         
                      </style>
                      <path class="st0" d="M-0.5,83.4c59.6,40.5,193.3,35,316.7-12.3C525.6-9.2,756.7-9.6,979.8,12.3s445.6,57.9,669.8,54.1C1821.1,63.5,1932,56,2000,53c0,36,0,76.4,0,76.4H1L-0.5,83.4z"></path>
                      <path class="st1" d="M309.2,46.1c265.1-57.8,453.7-19.6,687.9,6.8c285.1,32.2,564.2,63,863.4,33.4c94-9.3,119.5-19.6,139.5-19c0,32.2,0,63,0,63H0v-66C0,64.3,152.7,80.2,309.2,46.1z"></path>
                      <path class="st1" d="M344.5,54.9c82.3-26.3,167.2-46,253-36.5S767,51.6,851.9,67.8c272.3,52,522.5,16.7,819.3,5c90-3.5,293.8-13.6,328.8-12.6c0,24,0,71,0,71H-1v-59C-1,72.3,198.7,101.6,344.5,54.9z"></path>
                      <path d="M1731.8,97.1c-289.3,18.5-590.4,17.2-873.9-16.8C746,66.9,641.1,42.1,528.5,39.5s-249.3,31-353.7,69.9c-57.5,21.4-164.7,2.3-175.7-4.7c0,8,0,26.5,0,26.5h2003v-58C2002,73.3,1854.2,89.2,1731.8,97.1z"></path>
                 </svg>
               </div>
           </div>
       </div>
</form>
<footer class="foot">
    <div>
        <br>
        <div class="footer-content">
            <a href="homepage.php">About Us</a>&emsp14; | &emsp14;
            <a href="faq.html">FAQs</a>&emsp14; | &emsp14;
            <a href="contact.php">Contact Us</a>
        </div>
        <br>
        <div class="icons-footer"><a href="#"><i class="fa fa-facebook"></i></a>&emsp14;<a href="#"><i class="fa fa-twitter"></i></a>&emsp14;<a href="#"><i class="fa fa-snapchat"></i></a>&emsp14;<a href="#"><i class="fa fa-instagram"></i></a></div>
        <br>
        <p class="developers">Developers: Talal Ahmed | Ashhad Zafar Khan | Moiz Masood </p>
        <br>    
        <p class="copyright">Primero Avionics © 2021</p>
    </div>
    
</footer>

<script src="booking.js"></script>
</body>

</html>
