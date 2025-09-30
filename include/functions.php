<?php 
$userid = session_id(); //browser session id for cart

$carthome_query = mysqli_query($database,"SELECT * FROM cart WHERE userid='$userid' ORDER BY cartid DESC" );
$cart_quantity = mysqli_num_rows($carthome_query);


            $cart_sub_total = 0;
			$cart_tax =0;
			$cart_shipping=0;
			$cart_home_total=0;
		   $cart_query_home = mysqli_query($database,"SELECT * FROM cart WHERE userid='$userid' ORDER BY cartid DESC" );
		 	while($cart_result_home =  mysqli_fetch_array($cart_query_home)){ 
			$product_query_home = mysqli_query($database,"SELECT * FROM products WHERE id='$cart_result_home[productid]'" );
	
		$product_home =  mysqli_fetch_array($product_query_home);
		
		$single_cart = $product_home['product_price']*$cart_result_home['quantity'];
			 @$cart_sub_total+=$single_cart;
			 $cart_tax = $cart_sub_total/100*15;
				$cart_shipping =  3.60;
			}
			$cart_home_total = $cart_sub_total+$cart_tax+$cart_shipping;



function redirect_url($url){
	echo '<script language="javascript">window.location="'.$url.'";</script>';
	exit;	
}
?>