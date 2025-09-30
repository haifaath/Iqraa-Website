<!DOCTYPE html>
<html lang="en">
    <?php include ('header.php');
    include('connection.php');
    if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'remove')
    {
        unset($_SESSION['cart_items'][$_GET['item']]);
        $_SESSION['total_cost']=$_SESSION['total_cost']-$_GET['price'];
        if ($_SESSION['total_cost']<=0) {
            unset($_SESSION['total_cost']);
        }
        header('location:cart.php');
        exit();
    }

    //pre($_SESSION);
    
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
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
  <div class="row">
    <div class="col-md-12">
        <!-- empty cart -->
        <?php if(empty($_SESSION['cart_items'])){?>
        <table class="table">
            <tr>
                <td>
                    <h1>Your cart is empty!</h1>
                </td>
            </tr>
        </table>
        <?php }?>
        <!-- not empty cart -->
        <?php if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0){?>
            <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
              <tbody>
                <?php
               $totalCounter = 0;
                $itemCounter = 0;
                foreach($_SESSION['cart_items'] as $key => $item){
                    $imgUrl = $item['product_img'];   
                    $total = $item['price'] * $item['qty'];
                    $totalCounter+= $total;
                    $itemCounter+=$item['qty'];
 
                ?>
                <tr>
                        <td>
                            <img src="<?php echo $imgUrl; ?>" class="rounded img-thumbnail mr-2" style="width:60px;"><?php echo $item['Pname'];?>
                            
                            <a href="cart.php?action=remove&item=<?php echo $key?>&price=<?php echo $total?>" class="text-danger">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                        </td>
                        <td class="itemprice">
                            <?php echo $item['price'];?> SR
                        </td>
                        <td>
                        <form method="POST" action="checkout.php" id="checkingout" onsubmit="updateQty()">
                            <input type="number" class="itemquantity cart-qty-single" onchange="subtotal();" id="<?php echo $item['product_id'];?>" name="quant<?php echo $item['product_id'];?>" data-item-id="<?php echo $key?>" value="<?php echo $item['qty'];?>" min="1" max="1000">
                        </td>
                        <td class='itemtotal'>
                            <?php echo $total;?>
                        </td>
                </tr>
             <?php }?>
             <tr class="border-top border-bottom">
                    <td><button type="submit" value="empty cart" class="btn btn-danger btn-sm btn-info" id="emptyCart" name="emptyCart">Clear Cart</button></td>
                    <td></td>
                    <td>
                        <strong>
                            <?php 
                                echo ($itemCounter==1)?$itemCounter.' item':$itemCounter.' items'; ?>
                        </strong>
                    </td>
                    <td><strong><h5 id="gtotal"><?php echo $totalCounter?> SR</h5></strong></td>
                </tr> 
                </tr>
            </tbody> 
              </tbody> 
            </table>
            <!--checkout link -->
            <div class="row">
            <div class="col-md-11">
					<button type="submit" id="checkout" name="checkout" value="check out" class="btn float-right" >Buy</button>
            </div>
            </div>
                </form>

       <?php }?>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
<script src="assets/js/cart.js"></script>
<script type="text/javascript">
        var gt;
        var iprice=document.getElementsByClassName('itemprice');
        var iquantity=document.getElementsByClassName('itemquantity');
        var itotal=document.getElementsByClassName('itemtotal');
        var gtotal=document.getElementById('gtotal');
        var spanTotal=document.getElementById('orderTotal');
        function subtotal () {
            gt=0;
            for (var i=0;i<iprice.length;i++) {
                var strObj = iquantity[i].value;
                var quant=strObj.innerHTML;
                var price=parseInt(iprice[i].innerHTML);
                console.log(strObj*price);
                itotal[i].innerHTML=strObj*price;
                gt+=strObj*price;
            }
            gtotal.innerHTML=gt+" SR";
            $totalCounter=gt;
            spanTotal.innerHTML="("+gt+" SR)";
        }
        </script>
        <script>
        function updateQty()
                {
                    <?php if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
                    foreach($_SESSION['cart_items'] as $key => $item) { 
                        $dbQuantity=$item['qty'];
                        $prodID=$item['product_id'];
                        $sql = "SELECT quantity from product WHERE prodID= $prodID;";
                        if (!$result=mysqli_query($link, $sql)) {
                            die("Could not execute query!");
                           } 
                           $row=mysqli_fetch_row($result);?>
                    var newQuantity=document.getElementById("<?php echo $item['product_id']?>").value;
                    if (<?php echo $row[0] ?> < newQuantity) {
                        alert("The amount ordered of <?php echo $item['Pname']?> is more than the available quantity, which is <?php echo $row[0] ?>");
                        event.preventDefault();
                        return false;
                    }
                    else {
                        return true;
                    }
                    
                     <?php } 
                    }?>
                }
</script>
</body>
</html>