
<html>
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleforprojecg.css">

</head>
<body>
    <header class="header">
    <a href="homepage.php"><img src="images/logo3.png" alt="IQRAA LOGO" width="120" height="120" class="logo" float="left"></a>
        <nav>
            <ul>
                <li style="margin-left:2em;">
                <a href="homepage.php">Home</a>
                </li>
                <li style="margin-left:3em;">
                <a href="contact.php">Contact Us</a>
                </li>
                <li style="margin-left:3em;">
                <a href="Login.php">Admin</a>
                </li>
                <li style="margin-left:3em;">
                <a href="cart.php"><img src="images/cart.svg" style="height:3em;width:3em;">&nbsp; &nbsp;<?php 
                        echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';
                    ?> <span id="orderTotal"><?php echo (isset($_SESSION['total_cost'])) ? "(".$_SESSION['total_cost']." SR)":'';?></span></a>
                </li>
        </ul>
        </nav>
</header>