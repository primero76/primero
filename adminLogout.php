<?php
    session_start();  
    unset($_SESSION['adminMail']);
    session_destroy;
    header("location:homepage.html");
?> 