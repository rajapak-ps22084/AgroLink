<?php

session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}

if(isset($_POST['add_cart']))
{
    $customer_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    mysqli_query(
        $conn,
        "INSERT INTO cart(customer_id,product_id,quantity)
         VALUES('$customer_id','$product_id','$quantity')"
    );

    header("Location: mycart.php");
}
?>