<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="header">
        <a href="#default" class="logo">
            <img src="image/logo2.png" alt="logo of market" width="80px" />
        </a>
   
        <div class="header-right">
        
            <input type="text" placeholder="Search..">
            <a class="active" href="index.php">Home</a>
            
            
                <?php $cat_query = mysqli_query($database,"SELECT * FROM categories order by category_name ASC" ); 
							while($row_cat = mysqli_fetch_array($cat_query)){
					?>
                <a href="category.php?cat_id=<?=$row_cat['id']?>"><?=$row_cat['category_name']?></a>

    <?php } ?>
   
            <a href="contact.php">Contact</a>
            <?php if(isset($_SESSION['userid']) || isset($_SESSION['adminid'])) {
				
			if(isset($_SESSION['userid'])){ 		 ?>
            <a href="orders.php">Orders</a>
					<?php }elseif(isset($_SESSION['adminid'])){ ?>
                    
					  <a href="allproductAdmin.php">Admin</a>
					<?php } ?>
             <a href="logout.php">Logout</a>
            <?php  } else {?>
            <a href="login.php">Login</a>
            <?php  } ?>
            <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="total-count"> (<?php echo $cart_quantity?>)</span>
            </a>
            <a aria-disabled=""><i class="fa fa-money" aria-hidden="true"></i><span class="total-count"> : <?=$cart_home_total?> $</span></a>

        </div>
    </div>