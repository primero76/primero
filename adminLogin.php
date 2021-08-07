<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> LOGIN </title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="masterkey.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="main">
        <div class="row">           
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a href="#"> Create Flights </a></li>
                    <li><i class="fa fa-newspaper-o"></i><a onclick="#"> Delete Flights </a></li>
                    <li><i class="fa fa-tasks"></i><a onclick="#"> Manage Flights </a></li>
                    <li><i class="fa fa-address-book"></i><a onclick="#"> Add FAQs </a></li>
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
        <div class="btn-box">
            <button id="btn1" onclick="openBook()"><i class="fa fa-user"></i> Admin Login </button>
            <button style="background-color: lightseagreen;"> </button>
            <button style="background-color: lightseagreen;"> </button>        
        </div> 
        <form id="form" class="form" method="POST" action="adminLoginVal.php">
            <div class="form-ctrl" onclick="openDivemail()">
                <label id="emaillbl"> Email Address </label>
                <input type="text" id="emailinp" name="emailinp" required>
            </div>
            <div class="form-ctrl" onclick="openDivpassword()">
                <label  id="passwordlbl"> Password </label> <br>
                <input id="passwordinp" name="passwordinp" type="password" required >
            </div>
        
            <div class="btn-login">      
                <button type="submit" onclick="show()"> Login </button>
            </div>
    </div>


<script src="signup.js"></script>
</body>        

</html>
