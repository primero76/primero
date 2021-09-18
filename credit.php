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

    if ($_SESSION['mail'])
    {
    $emailAdd = $_SESSION['mail'];
    $sql  = "select * from signup where pEmail =  '$emailAdd' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    $firstName = strtoupper(" ".$row["fName"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payment </title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="masterkey.css">
    <link rel="stylesheet" href="signup.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
<header class="main">
        <div class="row">           
            <nav>
            <input type="checkbox" id="threebar">
                <label for="threebar" class="checklabel">
                <small> <i class="fa fa-user-circle-o"></i> <?php echo $firstName ?></small>
                    <i id="bars" class="fa fa-bars"></i>
                    <i id="cross" class="fa fa-times"></i>
                </label>
                <ul>
                    <li><i class="fa fa-home"></i><a href="index.php"> About Us</a></li>
                    <li><i class="fa fa-newspaper-o"></i><a href="book.html"> Book</a></li>
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
            <h1 class="name"> Primero </h1>
            <br><br>
            <h1 class="name2"> Avionics </h1>
        </div>
    </div>
    <div class="container">
        <div class="credit-box">
            <button id="btn1"><i class="fa fa-credit-card"></i> Credit Card Details </button>
            <button id="btn2"> </button>                  
        </div> 
    
        <form id="form" class="form" method="POST" action="ccregister.php"><h3> Enter Your Credit Card Details</h3>
    <div class="one">
        <div class="two">
            <div class="three" onclick="openDivCard()">
                <label id="cardlbl"> Card Number </label>
                <input type="text" id="cardinp" name="cardinp" required>
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small> * </small>
            </div>
        </div>
        <div class="two">
            <div class="four" onclick="openDivexpDate()">
                <label  id="expDatelbl">  Expiry Date </label> <br>
                <input id="expDateinp" name="expDateinp" type="date" required >
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small> * </small>
            </div>
            <div class="four" onclick="openDivCVV()">
                <label  id="cvvlbl"> CVV </label> <br>
                <input id="cvvinp" name="cvvinp" type="number" required >
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small> * </small>
            </div>
        </div>
    </div>        
    <div class="one">
        <div class="btn-submit" id="submit">
            <small class="check"> </small><br>
            <button type="submit" id= "crtAcc" onclick="show()"> Submit </button>
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
     <a href="booking.php">Book Flights</a>&emsp14; | &emsp14;
     <a href="faq.html">FAQs</a>&emsp14; | &emsp14;
     <a href="contact.php">Contact Us</a>
 </div>
 <br>
 <br>
 <div class="icons-footer"><a href="#"><i class="fa fa-facebook"></i></a>&emsp14;<a href="#"><i class="fa fa-twitter"></i></a>&emsp14;<a href="#"><i class="fa fa-snapchat"></i></a>&emsp14;<a href="#"><i class="fa fa-instagram"></i></a></div>
 <br>
 <br>    
 <p class="copyright"> Primero Avionics © 2018</p>
</div>
</footer>




<script src="credit.js"></script>

</body>
</html>
<?php
    }
    else
    {
        header('location:login.php');
    }
?>