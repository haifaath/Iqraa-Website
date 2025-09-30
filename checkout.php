<!DOCTYPE html>
<html>
<?php 
session_start();
?>
<script>
    <?php
include('connection.php');
if(isset($_POST['emptyCart']) && $_POST['emptyCart'] == 'empty cart') {
    unset($_SESSION['cart_items']);
    unset($_SESSION['total_cost']);
    header('location: cart.php');             } 
else if (isset($_POST['checkout']) && $_POST['checkout'] == 'check out') {
        if (isset($_SESSION['cart_items'])) {
            if (count($_SESSION["cart_items"]) > 0) {
                if (isset($_SESSION['order_id'])) {
                    $_SESSION['order_id']++;
                }
                else {
                    $_SESSION['order_id']=0;
                }
                foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $id= $cartItem['product_id'];
                $cartItem['qty']=$_POST['quant'.$id];            ?>
                //console.log(<?php echo $cartItem['Pname']?>+"'s quantity is: "+"<?php echo $cartItem['qty']?>");
                <?php
                $sql = "UPDATE product p set p.quantity=p.quantity-".$cartItem['qty']." where p.prodID=".$id;
                if (!$result=mysqli_query($link, $sql)) {
                    die("Could not execute query!");
                   }
                   $item_array = array(
                    'item_id'   => $cartItem['product_id'],
                    'item_name'   => $cartItem['Pname'],
                    'item_price'  => $cartItem['qty']*$cartItem['price'],
                    'item_quantity'  => $cartItem['qty'],
                    'item_img' => $cartItem['product_img']
                   );
                   header('location: homepage.php');   
                   $cart_data[] = $item_array;
                   $item_data = json_encode($cart_data);
                   $cookies_arr = array ();
                   setcookie($_SESSION['order_id'], $item_data, time() + (60*60));
                   unset($_SESSION['cart_items']);
                   unset($_SESSION['total_cost']);
                  // $_SESSION['order_id']++;
                  // unset cookies
//if (isset($_SERVER['HTTP_COOKIE'])) {
  //  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    //foreach($cookies as $cookie) {
      //  $parts = explode('=', $cookie);
        //$name = trim($parts[0]);
        //setcookie($name, '', time()-1000);
        //setcookie($name, '', time()-1000, '/');
    //}
//}
                    ?>
                //   console.log("<?php echo $item_data?>");
                   <?php
            }   
        }
    }
}
    ?>
    </script>

</html>