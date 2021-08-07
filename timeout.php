<?php
if ((time() - $_SESSION['last_activity']) > 180) // 30* 60 = 1800
{  
   header("Location: logout.php");  
    } else {
   $_SESSION['last_activity'] = time();
    }
?>
