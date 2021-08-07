<?php
session_start();
if ($_SESSION['mail'])
{
   if ((time() - $_SESSION['last_activity']) > 180) // 30* 60 = 1800
   {  
      header("location:logout.php");  
   } 
   else 
   {  
      $_SESSION['last_activity'] = time();
   }
}
?>
