<?php 
   if (!$link=mysqli_connect('localhost', 'root','123qweasdzxcAS')) {
    die("Could not connect to database.");
   }
   if (!$db=mysqli_select_db($link,'iqraa')) {
    die("Could not connect to Iqraa database table.");
   }
?>
 