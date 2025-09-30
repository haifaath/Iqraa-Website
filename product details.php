<!DOCTYPE html>
<html>
<?php 
include('header.php');
include ('connection.php');
$prod_id = $_GET['prodid'];
$sql = "SELECT * from product WHERE prodID= $prod_id;";
if (!$result=mysqli_query($link, $sql)) {
    die("Could not execute query!");
   } 
   $row=mysqli_fetch_assoc($result);
   ?>
    <head>
        <style>
                  .button {
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-color: #efe4de;
        color: #514543;
        border:4px double #cccccc ;
        width: 70px;
        height: 30px;
        border-radius: 10px;
        margin-left:1.7em;
        margin-top:1em;

      }   
            </style>
    <meta charset="utf-8">
	<title><?php echo $row['Pname'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.
        1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27N
        XFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/
        font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleforprojecg.css" type="text/css">
    <link rel="stylesheet" href="shadows.css" type="text/css">
</head>
<body>
    <div class ="bkinfoleft shadow-shorter">
    <img src="<?php echo $row['img1'] ?>" 
    style="width:5em; height: 90%; width:30%; float:left; 
    position: relative; top: 50%; transform:translateY(-50%); 
    margin-left:1em; margin-right:1em;"> 

    <h1 style="margin-top:1em;"> <?php echo $row['Pname'] ?> </h1>
    <h4> <?php echo $row['author'] ?> </h4>
    <p style="margin-right:1em; text-align: justify; text-justify: inter-word;"> 
    <?php echo $row['description']; ?> </p>
    <p style="color: #514543;">Genre: <?php echo $row['genre'] ?> | Number of pages: <?php echo 
    $row['noOfPages']?> </p>
    </div>
    <div class="bkinforight shadow-shorter">
    <h3 style="margin-top:2em; margin-left:1em;"> <?php echo $row['price'] ?> SR </h3>
    <?php 
    if ($row['quantity']> 0) {
        $avail= "images/available.svg";
        $availtext="Item is available";
    }
    else {
        $avail= "images/unavailable.svg";
        $availtext="Item is not available";
    } ?>
    <p><img src=<?php echo $avail ?> style="margin-left: 1.5em; width:1.5em; 
    height:1.5em;"> 
    <?php echo $availtext ?> </p>
   <form method="POST" action="addToCart.php" onsubmit="validateMyForm();">
                        <p style="position:relative; left:22%;">Quantity: <input type="number" name="product_qty" 
                        id="productQty" id="quant" class="form-control" placeholder="Quantity" 
                        min="1" max="1000" value="1" style="width:5em;"></p>
                        <input type="hidden" name="product_id" value="<?php echo 
                        $row['prodid']?>">
                        <button type="submit" class="btn btn-info" name="add_to_cart"
                         id="add_to_cart" value="add to cart" style="position:relative; left:22%; 
                         margin-top:1em;">Add to Cart</button>
                        <button type="submit" class="btn btn-info" name="checkout" 
                        id="checkout" value="checkout" style="position:relative; left:22%; 
                        margin-top:1em;">Check Out</button>
                </form>
    </div>
    <input class="button" type="button" value="Help" onclick="openWindow()" />
    <script>
                    var avail=<?php echo $row['quantity'] ?>;
                    if (avail > 0) {
                        document.getElementById("add_to_cart").disabled = false;
                        document.getElementById("checkout").disabled = false;
                        document.getElementById("quant").disabled = false;
                    }
                    else {
                        document.getElementById("add_to_cart").disabled = true;
                        document.getElementById("checkout").disabled = true;
                        document.getElementById("quant").disabled = true;
                    }
                    function validateMyForm()
                {
                    var x = document.getElementById("productQty").value;
                    if(x > <?php echo $row['quantity'] ?>)
                    { 
                        alert("This quantity is more the available quantity, which is: <?php echo $row['quantity'] ?>");
                        event.preventDefault();
                        returnToPreviousPage();
                        return false;
                    }
                     return true;
                     }
        //open contact page as a pop up window 
        function openWindow() {
            myWindow = window.open('help.php', 'window', 'width=400,height=300');
        }
    </script>
                    </script>
                    <?php mysqli_close($link); ?>
</body>
</html>
