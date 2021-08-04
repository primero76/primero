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

    $emailAdd = $_SESSION['mail'];
    $sql  = "select * from signup where EMAIL =  '$emailAdd' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    $ID = $_SESSION['track'];
    
    $sql2  = "select * from seats where ID = $ID";
    $res2 = mysqli_query($conn,$sql2);
    

    $fullName = $row["F_NAME"]." ".$row["M_NAME"]." ".$row["L_NAME"];
    $firstName = strtoupper(" ".$row["F_NAME"]); 
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $sclass = $_SESSION['seatClass'];
    $fare = $_SESSION['ticketPrice'];
    $time = $_SESSION['timing'];
    $ID = $_SESSION['track'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="myticket.css">
</head>
<body>
<div id="pdf">
    <?php
    while($row2 = mysqli_fetch_assoc($res2))
{

?>
<div class='all'>
    
    <div class="row1" style="background-color: aliceblue;">
        <table>
            <tr>
                <td>
                    <p > FLIGHT <br> <span> MTA AIRWAYS MTA31 </span> </p>
                </td>
                <td>
                    <p > DEPARTURE <br> <span> <?php echo $from?> </span> </p>
                </td>
                <td>
                    <p > DESTINATION <br> <span> <?php echo $to?> </span> </p>
                </td>
                <td>
                    <p class = "last"> FLIGHT <br> <span> MTA AIRWAYS MTA31 </span> </p>
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
                    <p > DEPARTURE <br> <span> <?php echo $from?> </span> </p>
                </td>
                <td>
                    <p > DESTINATION <br> <span> <?php echo $to?> </span> </p>
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
                    <p > SEAT <br> <span> <?php echo $row2["SEAT_NO"];?> </span> </p>
                </td>
                <td>
                    <p class = "last"> PRICE <br> <span> <?php echo $fare?> </span> </p>
                </td>
            </tr>
            
        </table>   
    </div>
    <div class="row5">
        <img src="AIRLINE-LOGO2.PNG">
        <img src="AIRLINE-LOGO2.PNG" style="margin-left: 820px;"> 
    </div>
    </div>
    <?php
    }
    ?>
</div>
</body>

</html>
