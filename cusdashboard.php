<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="inner-page">

<div class="dashboard">

    <h1>
        Welcome,
        <?php echo $_SESSION['fullname']; ?>!
    </h1>

    <div class="card-container">


 <a href="products.php">
        <div class="card">Browse Products</div></a>

<a href="mycart.php">
        <div class="card">My Cart</div></a>
<a href="myorders.php">
        <div class="card">My Orders</div></a>
<a href="trackorder.php">
        <div class="card">Track Orders</div></a>
   <a href="addreview.php">
    <div class="card">
        Give Review
    </div>
</a>
<a href="myorders.php">
    <div class="card">
        Payments
    </div>
</a>

    </div>

    <br>

   <a href="logout.php"
onclick="return confirm('Are you sure you want to logout?')"><button>

Logout</button>

</a>
</div>

</body>
</html>