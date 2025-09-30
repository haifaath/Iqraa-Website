<?php
include('connection.php');
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    echo '<script type = "text/javascript">';
    echo 'alert ("You should Log in first!");';
    echo 'window.location.href = "login.php" ';
    echo '</script>';
    // header("Location: login.php");

    die();
}
?>