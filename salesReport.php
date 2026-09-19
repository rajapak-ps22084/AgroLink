<?php
session_start();
include("db.php");

$result = mysqli_query(
$conn,
"SELECT
id,
customer_id,
total_amount,
status,
order_date
FROM orders
ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="inner-page">
<?php include("navbar.php"); ?>

<div class="dashboard-container">

<h1 class="page-title">Sales Report</h1>

<table class="order-table">

<tr>
    <th>Order ID</th>
    <th>Customer ID</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Date</th>
</tr>

<?php
$totalSales = 0;
$totalOrders = 0;

while($row=mysqli_fetch_assoc($result))
{
    $totalSales += $row['total_amount'];
    $totalOrders++;
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer_id']; ?></td>
    <td>Rs. <?php echo number_format($row['total_amount'],2); ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
</tr>

<?php } ?>

<tr style="background:#e8f5e9;font-weight:bold;">
    <td colspan="2">TOTAL</td>
    <td>Rs. <?php echo number_format($totalSales,2); ?></td>
    <td colspan="2">Orders: <?php echo $totalOrders; ?></td>
</tr>

</table>

</div>

</body>
</html>