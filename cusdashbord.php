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

<body>

<div class="dashboard">

    <h1>
        Welcome,
        <?php echo $_SESSION['fullname']; ?>!
    </h1>

    <div class="card-container">

        <div class="card">
            <a href="products.php">Browse Products</a>
        </div>

        <div class="card">
            <a href="cart.php">My Cart</a>
        </div>

        <div class="card">
            <a href="orders.php">My Orders</a>
        </div>

        <div class="card">
            <a href="trackorders.php">Track Orders</a>
        </div>

    </div>

    <br>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

</body>
</html>