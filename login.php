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
                    <li><i class="fa fa-home"></i><a href="homepage.html"> About Us </a></li>
                    <li><i class="fa fa-newspaper-o"></i><a onclick="alert('Please login first');"> Book </a></li>
                    <li><i class="fa fa-tasks"></i><a onclick="alert('Please login first');"> Manage</a></li>
                    <li><i class="fa fa-address-book"></i><a href="contact.html"> Contact Us</a></li>
                    <li><i class="fa fa-user-circle-o"></i><a class="sign" href="signup.php"> Signup </a></li>
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
            <button id="btn1" onclick="openBook()"><i class="fa fa-user"></i> Login </button>
            <button style="background-color: lightseagreen;"> </button>
            <button style="background-color: lightseagreen;"> </button>        
        </div> 
        <form id="form" class="form" method="POST" action="loginvalidation.php">
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
            </form>
            <div>
            <div class="forgetreset">
                <label class="lbls1"> <u> <a href="forgetpw.php"> Forget Password? </a></u></label>
                <label class="lbls2"> <u> <a style="cursor: pointer;" onclick="alert('This action cannot be done');" > Reset Email </a></u></label>  
            </div>
            <div class="last" style="background-color:lightseagreen">
                <h2 style=color:white> Don't Have An Account ? </h2>
                <br>
                <p style="font-size: 18px; color:white">Manage your bookings and receive our latest news and offers just for you</p>
            </div>
            <div class="btn-submit" style="text-align: center;background-color:lightseagreen">  
                
                <button> <a href="signup.php"> Create Account </a> </button>
            </div> 
            </div>
    </div>


<script src="signup.js"></script>
</body>        

</html>