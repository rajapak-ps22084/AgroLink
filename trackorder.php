<?php
session_start();
include("db.php");

$customer_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"
SELECT id,total_amount,status,order_date
FROM orders
WHERE customer_id='$customer_id'
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Track Orders</title>

<style>
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;

    background-image:url('farm.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}
.track-container{
    width:90%;
    max-width:1000px;
    margin:40px auto;
    background:#fff;
    padding:30px;
    border-radius:15px;
}

.track-title{
    text-align:center;
    color:green;
    font-size:55px;
    margin-bottom:30px;
}

.orders-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:20px;
}

.order-card{
    background:#f8f8f9;
    padding:20px;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.order-id{
    font-size:24px;
    color:green;
    font-weight:bold;
}

.status{
    font-weight:bold;
}

.pending{
    color:orange;
}

.approved{
    color:green;
}

.rejected{
    color:red;
}

</style>
</head>

<body class="inner-page">
<?php include("navbar.php"); ?>

<div class="track-container">

<h1 class="track-title">Track Orders</h1>

<div class="orders-grid">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="order-card">

<div class="order-id">
Order #<?php echo $row['id']; ?>
</div>

<p>
<b>Date:</b>
<?php echo $row['order_date']; ?>
</p>

<p>
<b>Total:</b>
Rs. <?php echo number_format($row['total_amount'],2); ?>
</p>

<p class="status">
Status:
<span class="<?php echo strtolower($row['status']); ?>">
<?php echo $row['status']; ?>
</span>
</p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>