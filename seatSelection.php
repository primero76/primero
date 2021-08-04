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

    $ran = rand(0,10);
    $firstName = $_SESSION['NAME'];
    $ID = $_SESSION['track'];
    $seatName = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $seatName = $_POST["seat"];
        foreach ($seatName as $sn => $value)
        {
            $insquery = "insert into seats(ID,SEAT_NO) values ('$ID','$value')";
            mysqli_query($conn,$insquery);        
        }
        header("location:credit.php");
    }
    $classOfSeat = $_SESSION['seatClass'];
     
    $numofpassengers = $_SESSION['passengerCount'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK</title>
    <link rel="stylesheet" href="masterbooking.css">
    <link rel="stylesheet" href="seatSelection.css">
    <link rel="stylesheet" href="masterkey.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
<body>
<header class="main">
        <div class="row">           
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a onclick="alert('First Complete This Process');"> About Us</a></li>
                    <li><i class="fa fa-newspaper-o"></i><a onclick="alert('First Complete This Process');"> Book </a></li>
                    <li><i class="fa fa-tasks"></i><a onclick="alert('First Complete This Process');"> Manage </a></li>
                    <li><i class="fa fa-address-book"></i><a onclick="alert('First Complete This Process');"> Contact Us</a></li>
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
        
    <div class="flightForm">        
        <div class="btn-box">
            <button id="btn1" onclick="openBook()"><i class="fa fa-plane"></i> Seats Selection </button>
            <button id="btn2" onclick="openFlightDetails()"><i class="fa fa-address-book-o"></i> Flight Status</button>
            <button style="background-color: lightseagreen;"> </button>
            <button style="background-color: lightseagreen;"> </button>
            <button style="background-color: lightseagreen;"> </button>
            
        </div>
        <div id="cont1" class="content">
            <div class="seatdiv">
                <div class="upper"></div>
    	        <div class="leftwing"></div>
                <div class="rightwing"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                    
                <div class="middle">
                    <div class="business">                                
                            <div class="left" >
                                <input id="seat-1" type="checkbox" value="seat-1" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-1"> B01 </label>
                                <input id="seat-2" type="checkbox" value="seat-2" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-2" > B02</label>
                                <input id="seat-3" type="checkbox" value="seat-3" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-3" >B03</label>

                                <input id="seat-7" type="checkbox" value="seat-7" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-7" >B07</label>
                                <input id="seat-8" type="checkbox" value="seat-8" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-8" >B08</label>
                                <input id="seat-9" type="checkbox" value="seat-9" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-9" >B09</label>

                                <input id="seat-13" type="checkbox" value="seat-13" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-13" >B13</label>
                                <input id="seat-14" type="checkbox" value="seat-14" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-14" >B14</label>
                                <input id="seat-15" type="checkbox" value="seat-15" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-15" >B15</label>

                                <input id="seat-19" type="checkbox" value="seat-19" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-19" >B19</label>
                                <input id="seat-20" type="checkbox" value="seat-20" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-20" >B20</label>
                                <input id="seat-21" type="checkbox" value="seat-21" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-21" >B21</label>

                                <input id="seat-25" type="checkbox" value="seat-25" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-25" >B25</label>
                                <input id="seat-26" type="checkbox" value="seat-26" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-26" >B26</label>
                                <input id="seat-27" type="checkbox" value="seat-27" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-27" >B27</label>

                                <input id="seat-31" type="checkbox" value="seat-31" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-31" >B31</label>
                                <input id="seat-32" type="checkbox" value="seat-32" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-32" >B32</label>
                                <input id="seat-33" type="checkbox" value="seat-33" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-33" >B33</label>
                                
                            </div>

                            <div class="right">
                                <input id="seat-4" type="checkbox" value="seat-4" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-4" >B04</label>
                                <input id="seat-5" type="checkbox" value="seat-5" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-5" >B05</label>
                                <input id="seat-6" type="checkbox" value="seat-6" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-6" >B06</label>

                                <input id="seat-10" type="checkbox" value="seat-10" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-10" >B10</label>
                                <input id="seat-11" type="checkbox" value="seat-11" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-11" >B11</label>
                                <input id="seat-12" type="checkbox" value="seat-12" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-12" >B12</label>

                                <input id="seat-16" type="checkbox" value="seat-16" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-16" >B16</label>
                                <input id="seat-17" type="checkbox" value="seat-17" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-17" >B17</label>
                                <input id="seat-18" type="checkbox" value="seat-18" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-18" >B18</label>

                                <input id="seat-22" type="checkbox" value="seat-22" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-22" >B22</label>
                                <input id="seat-23" type="checkbox" value="seat-23" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-23" >B23</label>
                                <input id="seat-24" type="checkbox" value="seat-24" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-24" >B24</label>

                                <input id="seat-28" type="checkbox" value="seat-28" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-28" >B28</label>
                                <input id="seat-29" type="checkbox" value="seat-29" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-29" >B29</label>
                                <input id="seat-30" type="checkbox" value="seat-30" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-30" >B30</label>

                                <input id="seat-34" type="checkbox" value="seat-34" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-34" >B34</label>
                                <input id="seat-35" type="checkbox" value="seat-35" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-35" >B35</label>
                                <input id="seat-36" type="checkbox" value="seat-36" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-36" >B36</label>
                            </div>
                    </div>

                    <div class="economy">
                            <div class="left">
                                <input id="seat-37" type="checkbox" value="seat-37" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-37" >E01</label>
                                <input id="seat-38" type="checkbox" value="seat-38" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-38" >E02</label>
                                <input id="seat-39" type="checkbox" value="seat-39" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-39" >E03</label>

                                <input id="seat-43" type="checkbox" value="seat-43" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-43" >E07</label>
                                <input id="seat-44" type="checkbox" value="seat-44" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-44" >E08</label>
                                <input id="seat-45" type="checkbox" value="seat-45" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-45" >E09</label>

                                <input id="seat-49" type="checkbox" value="seat-49" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-49" >E13</label>
                                <input id="seat-50" type="checkbox" value="seat-50" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-50" >E14</label>
                                <input id="seat-51" type="checkbox" value="seat-51" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-51" >E15</label>

                                <input id="seat-55" type="checkbox" value="seat-55" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-55" >E19</label>
                                <input id="seat-56" type="checkbox" value="seat-56" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-56" >E20</label>
                                <input id="seat-57" type="checkbox" value="seat-57" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-57" >E21</label>

                                <input id="seat-61" type="checkbox" value="seat-61" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-61" >E25</label>
                                <input id="seat-62" type="checkbox" value="seat-62" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-62" >E26</label>
                                <input id="seat-63" type="checkbox" value="seat-63" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-63" >E27</label>

                                <input id="seat-67" type="checkbox" value="seat-67" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-67" >E31</label>
                                <input id="seat-68" type="checkbox" value="seat-68" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-68" >E32</label>
                                <input id="seat-69" type="checkbox" value="seat-69" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-69" >E33</label>

                                <input id="seat-73" type="checkbox" value="seat-73" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-73" >E37</label>
                                <input id="seat-74" type="checkbox" value="seat-74" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-74" >E38</label>
                                <input id="seat-75" type="checkbox" value="seat-75" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-75" >E39</label>
                                
                            </div>

                            <div class="right">
                                <input id="seat-40" type="checkbox" value="seat-40" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-40" >E04</label>
                                <input id="seat-41" type="checkbox" value="seat-41" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-41" >E05</label>
                                <input id="seat-42" type="checkbox" value="seat-42" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-42" >E06</label>

                                <input id="seat-46" type="checkbox" value="seat-43" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-46" >E10</label>
                                <input id="seat-47" type="checkbox" value="seat-44" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-47" >E11</label>
                                <input id="seat-48" type="checkbox" value="seat-45" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-48" >E12</label>

                                <input id="seat-52" type="checkbox" value="seat-52" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-52" >E16</label>
                                <input id="seat-53" type="checkbox" value="seat-53" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-53" >E17</label>
                                <input id="seat-54" type="checkbox" value="seat-54" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-54" >E18</label>

                                <input id="seat-58" type="checkbox" value="seat-58" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-58" >E22</label>
                                <input id="seat-59" type="checkbox" value="seat-59" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-59" >E23</label>
                                <input id="seat-60" type="checkbox" value="seat-60" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-60" >E24</label>

                                <input id="seat-64" type="checkbox" value="seat-64" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-64" >E28</label>
                                <input id="seat-65" type="checkbox" value="seat-65" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-65" >E29</label>
                                <input id="seat-66" type="checkbox" value="seat-66" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-66" >E30</label>

                                <input id="seat-70" type="checkbox" value="seat-70" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-70" >E34</label>
                                <input id="seat-71" type="checkbox" value="seat-71" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-71" >E35</label>
                                <input id="seat-72" type="checkbox" value="seat-72" name="seat[]" onclick="limit_checkbox('seat[]',this,<?php echo $numofpassengers?>)" />
                                <label for="seat-72" >E36</label>
                            </div>                        
                    </div>
                    
                </div>
                <div class="box" >
            <button style="background-color: lightseagreen;" id="subbtn" type="submit"> Submit </button>
            </div>
            </form>

            </div>
        </div>
        </form>
        <!--Here comes the div of SEAT SELECTION-->

        
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
<footer>
    <div>
        <label> </label>
    </div>
    
</footer>
    <script>
    <?php
        $sql  = "select * from seats where ID = $ID";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res))
    {
        $rs = $row["SEAT_NO"];
    ?>
    document.getElementById("<?php echo $rs?>").disabled = true;
    <?php
    }
    ?>
    <?php
    if ($classOfSeat == 'Business')
    {
    ?>   
        for (let i = 37; i < 76; i++) 
        {
            document.getElementById("seat-"+[i]).disabled = true;
        }
    <?php
    }
    else
    {
    ?>
        for (let i = 1; i < 37; i++)
        {
            document.getElementById("seat-"+[i]).disabled = true;
        }
    <?php
    }
    ?>
    
    
    </script>
<script src="seatSelection.js"></script>
</body>
</html>
