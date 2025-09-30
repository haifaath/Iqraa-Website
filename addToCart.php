<!DOCTYPE html>
<html>
<?php
session_start();
include('connection.php');
if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
    {
        $productID = intval($_POST['product_id']);
        $quantityOrdered = intval($_POST['product_qty']);
        
        $query = "SELECT * from product where prodID =$productID";
        if (!$result=mysqli_query($link, $query)) {
            die("Could not execute query!");
           } 
           $row=mysqli_fetch_assoc($result);
        $totalCost = number_format($quantityOrdered * $row['price']);
        if (!isset($_SESSION['total_cost'])) {
            $_SESSION['total_cost']=$totalCost;
        }
        else {
            $_SESSION['total_cost']+=$totalCost;
        }
        $cartArray = [
            'product_id'=> $productID,
            'qty' => $quantityOrdered,
            'Pname' => $row['Pname'],
            'price' => $row['price'],
            'total_price' => $totalCost,
            'product_img' => $row['img1']
        ];
        
        if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
        {
            $productIDs = [];
            foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $productIDs[] = $cartItem['product_id'];
                if($cartItem['product_id'] == $productID)
                {
                    $_SESSION['cart_items'][$cartKey]['qty'] += $quantityOrdered;
                    $_SESSION['cart_items'][$cartKey]['total_price'] += $calculateTotalPrice;
                    break;
                }
            }

            if(!in_array($productID,$productIDs))
            {
                $_SESSION['cart_items'][]= $cartArray;
            }
            
        }
        else
        {
            $_SESSION['cart_items'][]= $cartArray;
        } 
        header("location: product details.php?prodid=$productID");
    }
    else if (isset($_POST['checkout']) && $_POST['checkout'] == 'checkout') {
        $productID = intval($_POST['product_id']);
        $quantityOrdered = intval($_POST['product_qty']);
        
        $query = "SELECT * from product where prodID =$productID";
        if (!$result=mysqli_query($link, $query)) {
            die("Could not execute query!");
           } 
           $row=mysqli_fetch_assoc($result);
        $totalCost = number_format($quantityOrdered * $row['price']);
        if (!isset($_SESSION['total_cost'])) {
            $_SESSION['total_cost']=$totalCost;
        }
        else {
            $_SESSION['total_cost']+=$totalCost;
        }
        
        $cartArray = [
            'product_id'=> $productID,
            'qty' => $quantityOrdered,
            'Pname' => $row['Pname'],
            'price' => $row['price'],
            'total_price' => $totalCost,
            'product_img' => $row['img1']
        ];
        
        if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
        {
            $productIDs = [];
            foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $productIDs[] = $cartItem['product_id'];
                if($cartItem['product_id'] == $productID)
                {
                    $_SESSION['cart_items'][$cartKey]['qty'] = $quantityOrdered;
                    $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                    break;
                }
            }

            if(!in_array($productID,$productIDs))
            {
                $_SESSION['cart_items'][]= $cartArray;
            }
            
        }
        else
        {
            $_SESSION['cart_items'][]= $cartArray;
        }
        header("location: cart.php");
    }
    ?>
</html>
