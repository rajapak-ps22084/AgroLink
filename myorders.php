<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}
include("db.php");



$customer_id = $_SESSION['user_id'];

$result = mysqli_query(
$conn,
"SELECT * FROM orders
WHERE customer_id='$customer_id'"
);
?>

<h1>My Orders</h1>
<link rel="stylesheet" href="style.css">
<?php include("navbar.php"); ?>
<table border="1">

<tr>
<th>Order ID</th>
<th>Date</th>
<th>Total</th>
<th>Status</th>
<th>Payment</th>
</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $row['total_amount']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="payment.php?order_id=<?php echo $row['id']; ?>">
<button>Pay Now</button>
</a>
</td>
</tr>

<?php } ?>

</table>

