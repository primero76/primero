<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forget Password </title>
    <link rel="icon" href="AIRLINE-LOGO2.png" type="image/gif">
    <link rel="stylesheet" href="forget.css">
    <link rel="stylesheet" href="masterkey.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="main">
        <div class="row">           
            <nav>
                <ul>
                    <li><i class="fa fa-home"></i><a href="about.html"> About Us </a></li>
                    <li><i class="fa fa-newspaper-o"></i><a onclick="alert('Please login first');"> Book </a></li>
                    <li><i class="fa fa-tasks"></i><a href="#"> Manage</a></li>
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
            <button id="btn1" onclick="openBook()"><i class="fa fa-user"></i> Forget Password </button>
            <button style="background-color: lightseagreen;"> </button>        
        </div> 
        <form id="form" class="form" method="POST" action="pwReset.php">
                <div class="form-ctrl" onclick="openDivpassword()">
                    <label  id="passwordlbl"> New Password </label> <br>
                    <input id="passwordinp" name="passwordinp" type="password" required >
                </div>
                <div class="form-ctrl"  onclick="openDivpassword2()">
                    <label  id="passwordlbl2"> Password Check </label> <br>
                    <input id="passwordinp2" type="password" required >
                    <i class="fa fa-check-circle"></i>
                    <i class="fa fa-exclamation-circle"></i>
                    <small> Passwords do not match </small>
                </div>                      
            <div class="btn-login">      
                <button type="submit" onclick="show()"> Confirm </button>
            </div>   
        </form>
    </div>

<script src="codeConfirm.js"></script>
</body>        

</html>