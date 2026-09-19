<?php
session_start();
include("db.php");

$sql = "
SELECT
orders.id,
orders.order_date,
orders.status,
users.fullname
FROM orders
JOIN users
ON orders.customer_id = users.id
";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Customer Orders</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="inner-page">
<?php include("navbar.php"); ?>

<div class="dashboard-container">

<h1 class="page-title">Customer Orders</h1>

<table class="order-table">

<tr>
    <th>Order ID</th>
    <th>Customer</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
    <td>
        <span class="status <?php echo strtolower($row['status']); ?>">
            <?php echo $row['status']; ?>
        </span>
    </td>

    <td>

        <a href="approve_order.php?id=<?php echo $row['id']; ?>">
            <button class="approve-btn">Approve</button>
        </a>

        <a href="reject_order.php?id=<?php echo $row['id']; ?>">
            <button class="reject-btn">Reject</button>
        </a>

    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>