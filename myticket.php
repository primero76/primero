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

    $fullName = $row["fName"]." ".$row["mName"]." ".$row["lName"];
    $firstName = strtoupper(" ".$row["fName"]);
    
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $sclass = $_SESSION['seatClass'];
    $fare = $_SESSION['ticketPrice'];
    $time = $_SESSION['time'];
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
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <title>Ticket</title>
    <link rel="stylesheet" href="myticket.css">
</head>
<body>
<div id="pdf">
<?php while($row2 = mysqli_fetch_assoc($res2))
{
?>
<div class='all'>
    
    <div class="row1" style="background-color: aliceblue;">
        <table>
            <tr>
                <td>
                    <p > FLIGHT <br> <span> <?php echo $flightName ?></span> </p>
                </td>
                <td>
                    <p > DEPARTURE <br> <span> <?php echo $from ." ". $flightfrom['CITY_CODE'] ?> </span> </p>
                </td>
                <td>
                    <p > DESTINATION <br> <span>  <?php echo $to ." ". $flightto['CITY_CODE'] ?> </span> </p>
                </td>
                <td>
                    <p class = "last"> FLIGHT <br> <span><?php echo $flightName ?> </span> </p>
                </td>
            </tr>
            
        </table>   
    </div>
    <div class="row2">
        <table>
            <tr>
                <td class="bigRow">
                    <p> PASSENGER <br> <span> <?php echo $fullName?> </span> </p>
                </td>
                <td>
                    
                </td>
                <td class="smallRow"> 
                <p> PASSENGER <br> <span> <?php echo $fullName?> </span> </p>
                </td>
            </tr>
            
        </table>   
    </div>
    <div class="row3">
        <table>
            <tr>
                <td>
                    <p > DEPARTURE <br> <span> <?php echo $from ." ". $flightfrom['CITY_CODE'] ?> </span> </p>
                </td>
                <td>
                    <p > DESTINATION <br> <span>  <?php echo $to ." ". $flightto['CITY_CODE'] ?> </span> </p>
                </td>
                <td>
                    <p > DATE <br> <span> <?php echo $date?></span> </p>
                </td>
                <td  >
                    <p class = "last" > TIME <br> <span> <?php echo $time?> </span> </p>
                </td>
            </tr>
            
        </table>   
    </div>
    <div class="row2">
        <table>
            <tr>
                <td>
                    <p > TRACKING ID <br> <span> <?php echo $ID?> </span> </p>
                </td>
                <td>
                    <p > class <br> <span>  <?php echo $sclass?> </span> </p>
                </td>
                <td >
                    <p > SEAT <br> <span> <?php echo $row2['seatNo'];?> </span> </p>
                </td>
                <td>
                    <p class = "last"> PRICE <br> <span> <?php echo $fare?> </span> </p>
                </td>
            </tr>
            
        </table>   
    </div>
    <div class="row5">
        <img src="AIRLINE-LOGO2.png">
        <img src="AIRLINE-LOGO2.png" style="margin-left: 820px;"> 
    </div>
    </div>
    <?php
    }
    ?>
</div>
</body>

</html>
<?php
    }
    else
    {
        header('location:login.php');
    }
?>