<?php
   if (time() > $_SESSION['expire'])
   {  
      header("location:logout.php");
   } 
?>
