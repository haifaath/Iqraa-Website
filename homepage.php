<!doctype html>
<html lang="en">
<?php 
include('header.php');
include('connection.php');
$sql = "SELECT * from product;";
if (!$result=mysqli_query($link, $sql)) {
    die("Could not execute query!");
   } 
   ?>
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.
        1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27N
        XFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/
        font/bootstrap-icons.css">
        <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
        <link href="shadows.css" rel="stylesheet" type="text/css">
    <title> Home </title>
    <style>
        .past {
            margin-top:.5em;
            margin-bottom:0.5em; 
            color:gray;
}
    </style>
</head>
    <body>
        <div style="width:95%; height:15em; overflow-x:hidden; overflow-y:auto; margin:1.5em; border:#514543; border-width:2px; background-color:white;" class="shadow-dreamy">
        <h3 class="past"><center>Your Past Purchases</center></h3>
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
            <td style="text-align:left;"><img src="<?php echo $values["item_img"];?>" style="width:5em; height:8em;" alt="<?php echo $values["item_name"]; ?>"></td>
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
        </div>
        <h1 style="margin-top:.5em; margin-bottom:0.5em;"><center>Browse All Books</center></h1>
                <div class="row row-cols-1 row-cols-md-3 g-3 col-md-10 m-auto">
                    <?php while ($row=mysqli_fetch_assoc($result)) { 
                    $id= $row['prodid']; ?>
                    <div class="card" style="margin:0.5em;">
                        <a href="product details.php?prodid=<?php echo $id; ?>"><img src="<?php echo $row['img1'] ?>" class="card-img-top" alt="<?php echo $row['Pname']?>" height="350" style="margin-top:0.4em"></a>
                        <div class="card-body">
                            <h5 class="card-title bkname"><a href="product details.php?prodid=<?php echo $id; ?>" style="text-decoration:none; color: #514543;"><?php echo $row['Pname']?></a></h5>
                            <p class="card-text"><?php echo $row['author']?><span style="float:right;"><?php echo $row['price']?> SR</span></p>
                            <a href="product details.php?prodid=<?php echo $id; ?>" class="btn btn-info bkname" 
                            data-bs-toggle="tooltip" data-bs-placement="left" 
                            title="Book Details" style="position:relative; left:22%;"
                            >View Book</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php mysqli_close($link); ?>
    </body>
</html>