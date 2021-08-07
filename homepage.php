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

if ((time() - $_SESSION['last_activity']) > 500) // 30* 60 = 1800
{  
   header("location: logout.php");  
    } else {
   $_SESSION['last_activity'] = time();

    //Get Heroku ClearDB connection information
    
    if ($_SESSION['mail'])
    {
    $emailAdd = $_SESSION['mail'];
    $sql  = "select * from signup where EMAIL =  '$emailAdd' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    $fullName = $row["F_NAME"]." ".$row["M_NAME"]." ".$row["L_NAME"];
    $firstName = strtoupper(" ".$row["F_NAME"]);
    
?> 

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Primero Avionics - Book Flights & Enjoy</title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="masterkey.css">
    <link rel="stylesheet" href="cardstyle.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main">
        <div class="row">           
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a onclick="alert('Already on booking page')"> About Us</a></li>
                    <li><i class="fa fa-newspaper-o"></i><a href="booking.php"> Book</a></li>
                    <li><i class="fa fa-tasks"></i><a href="tracking.php"> Manage</a></li>
                    <li><i class="fa fa-address-book"></i><a href="contact.php"> Contact Us</a></li>
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
    <div class="row-homepage">
        <h1 class="subheading"> Welcome to Primero Avionics </h1>
        <p class="intro">Primero Avionics is proud to be one of the youngest global airlines to serve all six continents, and thanks to our customers’ response to our offerings, we are also the world’s fastest-growing airline. We connect more than 130 destinations on the map every day, with a fleet of the latest-generation aircraft, and an unrivalled level of service from our home and hub, the Five-star airport, Hamad International Airport in Doha, the State of Qatar.
            As aviation faces its greatest challenge, we remain committed to ensuring the highest standards of safety and hygiene on board our aircraft at all times. Primero Avionics is the first global airline in the world to achieve the prestigious 5-Star COVID-19 Airline Safety Rating by international air transport rating organisation, Skytrax. This follows HIA’s success as the first airport in the Middle East and Asia to be awarded a Skytrax 5-Star COVID-19 Airport Safety Rating. These recognitions provides assurance to passengers across the world that airline health and safety standards are subject to the highest possible standards of professional, independent scrutiny and assessment.
            
            Since our launch in 1997, Primero Avionics has earned many awards and accolades, becoming one of an elite group of airlines worldwide to have earned a 5-star rating by Skytrax. Voted Airline of the Year by Skytrax in 2011, 2012, 2015, 2017 and most recently in 2019, Primero Avionics has won the confidence of the travelling public. We have accomplished these goals by focusing on the details – how we run the business, and how you experience our airline.
            
            My goal is to make Primero Avionics your airline of choice, offering the flights you want to the destinations you need. It is this which drives our collective mission to achieve ‘Excellence in everything we do’ at all levels across our Primero Avionics family of highly-skilled and committed professionals, from across the globe. 
            
            On behalf of everyone at Primero Avionics, we look forward to welcoming you on board, and let us Go Places Together.
            Thank you.
            Akbar Al Baker
            Group Chief Executive
            Primero Avionics
        </p>    
    </div>
       
    <div class="container">
        <h3>Featured Destinations For You</h3>
        <div class="row row-cols-2 row-cols-md-2 g-4">
            <div class="col">
            <div class="card">
                <img src="faisal.jpg" class="card-img-top" > 
                <div class="card-body">
                <h5 class="card-title">Islamabad</h5>
                <p class="card-text">Come visit the breathtaking natural beauty of the capital of Pakistan, with green-blanketed rolling Margalla Hills, multi colored trees, chirping birds and fragrant atmosphere in the enthralling beauties of August.</p>
                </div>
                <div class="btn-book">  
                    <p>Economy from <span>PKR 13999</span></p>
                    <button type="submit" onclick="show()"> Purchase Tickets </button>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card">
                <img src="mazar.jpg" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">Karachi</h5>
                <p class="card-text">The largest city of Pakistan is waiting for you as the iconic and beautiful tomb of Quaid-e-Azam is surely not to miss in these enthralling beauties of August.</p>
                </div>
                <div class="btn-book">  
                    <p>Economy from <span>PKR 14999</span></p>
                    <button type="submit" onclick="show()"> Purchase Tickets </button>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card">
                <img src="skardu3.jpg" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">Skardu</h5>
                <p class="card-text">Skardu: An embodiment of nature's perfection offers you a scenic valley with blue water and high mountains as a major tourism, trekking and expedition hub in Gilgit–Baltistan</p>
                </div>
                <div class="btn-book">  
                    <p>Economy from <span>PKR 17999</span></p>
                    <button type="submit" onclick="show()"> Purchase Tickets </button>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card">
                <img src="minar3.jpg" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">Lahore</h5>
                <p class="card-text">Enjoy some days in the Heart of Pakistan, Lahore, with great food, never-ending entertainment, shopping, greenery and winters.</p>
                </div>
                <div class="btn-book">  
                    <p>Economy from <span>PKR 11999</span></p>
                    <button type="submit" onclick="show()"> Purchase Tickets </button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <h3>Discover More Topics</h3>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col">
            <div class="card2">
                <img src="1.jpg" class="card-img-top-2" >
                <div class="card-body2">
                <h5 class="card-title">Travel and Corona</h5>
                <p class="card-text">All relevant information for your trip at a glance.</p>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card2">
                <img src="2.jpg" class="card-img-top-2">
                <div class="card-body2">
                <h5 class="card-title">Well prepared for</h5>
                <p class="card-text">Use our checklist and start your summer vacation relaxed.</p>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card2">
                <img src="3.jpg" class="card-img-top-2">
                <div class="card-body2">
                <h5 class="card-title">Onboard delights</h5>
                <p class="card-text">Our menu program in Economy Class on short and medium-haul flights.</p>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card2">
                <img src="4.jpg" class="card-img-top-2">
                <div class="card-body2">
                <h5 class="card-title">Fascination Malta</h5>
                <p class="card-text">Discover Malta's beauty with our offers</p>
                </div>
            </div>
            </div>
        </div>
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

<footer class="foot">
    <div>
        <br>
        <div class="footer-content">
            <a href="#">About Us</a>&emsp14; | &emsp14;
            <a href="#">Book Flights</a>&emsp14; | &emsp14;
            <a href="#">FAQs</a>&emsp14; | &emsp14;
            <a href="#">Contact Us</a>
        </div>
        <br>
        <br>
        <div class="icons-footer"><a href="#"><i class="fa fa-facebook"></i></a>&emsp14;<a href="#"><i class="fa fa-twitter"></i></a>&emsp14;<a href="#"><i class="fa fa-snapchat"></i></a>&emsp14;<a href="#"><i class="fa fa-instagram"></i></a></div>
        <br>
        <br>    
        <p class="copyright">Pheonix Airways © 2021</p>
    </div>
    
</footer>

</body>
</html>
<?php
    }
    else
    {
        header('location:homepage.html');
    }
?>
<?php
    }
?>
