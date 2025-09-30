<!DOCTYPE html>
<html>
    <?php 
    include ('header.php'); ?>
  <head>
    <title>Order History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.
        1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27N
        XFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/
        font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleforprojecg.css" type="text/css">
  </head>
  <body>
    <h1 style="margin-top:.5em; margin-bottom:1.5em; "><center> Past Purchases </center></h1>
    <table border="1" style="width:100%; text-align:center; border:none;">
        <thead>
        <tr>
            <th colspan="2"><h4>Product</h4></th>
            <th><h4>Price</h4></th>
            <th><h4>Quantity</h4></th>
            <th><h4>Total</h4></th> 
        </tr>
        </thead>
        <tbody>
    <?php
    $i=0;
    for ($i=0;$i<count($_COOKIE);$i++) {
        if (isset($_COOKIE[$i])) {
            $cookie_data = stripslashes($_COOKIE[$i]);
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values) { ?>
            <tr>
            <td style="text-align:center;"><img src="<?php echo $values["item_img"];?>" style="width:5em; height:8em;" alt="<?php echo $values["item_name"]; ?>"></td>
            <td  style="text-align:left;"><p><?php echo $values["item_name"]; ?></p></td>
            <td><p><?php echo $values["item_price"]; ?> SR</p></td>
            <td><p><?php echo $values["item_quantity"]; ?></p></td>
            
            <td><p><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> SR</p></td>
           </tr>
          <?php  } }
          else {
            continue;
          }
    } ?>
        </tbody>
    </table>
  </body>
</html>