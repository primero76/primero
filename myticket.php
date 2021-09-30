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

    $fullName = $row["lName"]." ".$row["mName"]." ".$row["fName"];
    $firstName = strtoupper(" ".$row["fName"]);
    
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $sclass = $_SESSION['seatClass'];
    $fare = $_SESSION['ticketPrice'];
    $time = $_SESSION['depTime1'];
    $ID = $_SESSION['tracking'];
    $flightName = $_SESSION['flyName'];
    
    $sql4  = "select * from cities where CITY_NAME = '$from'";
    $res4 = mysqli_query($conn,$sql4);
    $flightfrom = mysqli_fetch_assoc($res4);

    $sql5  = "select * from cities where CITY_NAME = '$to'";
    $res5 = mysqli_query($conn,$sql5);
    $flightto = mysqli_fetch_assoc($res5);

    $sql2  = "select * from seats where trackingId = '$ID'";
    $res2 = mysqli_query($conn,$sql2);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BOOKING </title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="ticket.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class = "main">

<?php while($row2 = mysqli_fetch_assoc($res2))
{
?>
    <br><br><br>
    <div class="container">
        <div class="first">
            <div class="two">
                <div class="five">
                    <label> FLIGHT <span> <?php echo $flightName ?> </span> </label> 
                </div>
                <div class="five">
                    <label> DEPARTURE <span>  <?php echo $from ." ". $flightfrom['CITY_CODE'] ?> </span> </label> 
                </div>
                <div class="five">
                    <label> DESTINATION <span> <?php echo $to ." ". $flightto['CITY_CODE'] ?> </span> </label> 
                </div>
                <div class="five">
                    <label> FLIGHT <span> <?php echo $flightName ?> </span> </label> 
                </div>          
            </div>
        </div>  
        <div class="one">
            <div class="two">
                <div class="five">
                    <label> PASSENGER <span> <?php echo $fullName?> </span> </label> 
                </div>
                <div class="five">
                    <label>  </label> 
                </div>
                <div class="five">
                    <label>  </label> 
                </div>
                <div class="five">
                <label> PASSENGER <span> <?php echo $fullName?> </span> </label> 
                </div>          
            </div>
        </div>  
        <div class="one">
            <div class="two">
                <div class="five">
                <label> DEPARTURE <span>  <?php echo $from ." ". $flightfrom['CITY_CODE'] ?> </span> </label> 
                </div>
                <div class="five">
                    <label> DESTINATION <span> <?php echo $to ." ". $flightto['CITY_CODE'] ?> </span> </label> 
                </div>
                <div class="five">
                    <label> DATE <span> <?php echo $date?> </span> </label> 
                </div>
                <div class="five">
                    <label> TIME <span> <?php echo $time?> </span> </label> 
                </div>          
            </div>
        </div>  
        <div class="one">
            <div class="two">
                <div class="five">
                    <label> TRACKING ID <span> <?php echo $ID?> </span> </label> 
                </div>
                <div class="five">
                    <label> CLASS <span> <?php echo $sclass?> </span> </label> 
                </div>
                <div class="five">
                    <label> SEAT <span> <?php echo $row2['seatNo'];?> </span> </label> 
                </div>
                <div class="five">
                    <label> PRICE <span> <?php echo $fare?> </span> </label> 
                </div>          
            </div>
        </div>  
        <div class="last">
            <div class="two">
                <div class="five"><img src="AIRLINE-LOGO2.png"></div>
                <div class="five"></div>
                <div class="five"></div>
                <div class="five"><img src="AIRLINE-LOGO2.png"></div>       
            </div>
        </div>  
 
    </div>
    <?php
    }
    ?>
    <br>
    </div>
<script src="booking.js"></script>
</body>
</html>
<?php
    }
    else
    {
        header('location:login.php');
    }
?>
