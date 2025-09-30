<?php
session_start();
    // connect to the database
    include('connection.php');
    // LOGIN USER 
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($results);

    // CHECKING IF USERNAME AND PASS ARE CORRECT
    if (mysqli_num_rows($results) > 0)
    {
        	  header('location: Admin.php');
    $_SESSION['username'] = $row ['username'];
    $_SESSION['userLogin'] = "Loggedin";
    }else {
      echo '<script type = "text/javascript">';
      echo 'alert ("Wrong Username/Password! Try Again.");';
      echo 'window.location.href = "login.php" ';
      echo '</script>';
    }


  }
    ?>