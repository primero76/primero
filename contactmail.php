<?php

    $F_NAME = $_POST['firstname'];
    $L_NAME = $_POST['lastname'];
    $NAME = $F_NAME." ".$L_NAME;
    $PHONE_NUM = $_POST['num'];
    $SUB =  $_POST['sub'];
    $mail =  $_POST['email'];
    $DESC =  $_POST['subject'];

    
    $to_email = "ashhad.k2@gmail.com";
    $body = "";

    $body.="From: ".$NAME. "\r\n";
    $body.="Phone Number: ".$PHONE_NUM. "\r\n";
    $body.="Email: ".$mail. "\r\n";
    $body.="Message: ".$DESC. "\r\n";
  
    if (mail($to_email,$SUB, $body)) {
        echo "email receive from $mail";
        header("location:contact.html");
    }

?>