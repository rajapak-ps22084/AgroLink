<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}

if(isset($_GET['id']))
{
    $cart_id = $_GET['id'];

    mysqli_query(
        $conn,
        "DELETE FROM cart WHERE cart_id='$cart_id'"
    );
}

header("Location: mycart.php");
exit();
?>