<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: farlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Farmer Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>
<body class="inner-page">

<div class="dashboard">

    <h1>
        Welcome Farmer,
        <?php echo $_SESSION['fullname']; ?>!
    </h1>

    <div class="card-container">

        <a href="addproduct.php">
            <div class="card">
                Add Products
            </div>
        </a>

        <a href="manage_products.php">
            <div class="card">
                Manage Products
            </div>
        </a>

        <a href="vieworders.php">
            <div class="card">
                View Orders
            </div>
        </a>

        <a href="trackDelivery.php">
            <div class="card">
                Track Deliveries
            </div>
        </a>

        <a href="customerReviews.php">
            <div class="card">
                Customer Reviews
            </div>
        </a>

        <a href="salesReport.php">
            <div class="card">
                Sales Reports
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