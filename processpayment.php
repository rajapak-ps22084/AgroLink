<?php
session_start();
include("db.php");

$customer_id = $_SESSION['user_id'];

$order_id = $_POST['order_id'];

$method = $_POST['payment_method'];

$order = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM orders
WHERE id='$order_id'"
)
);

$amount = $order['total_amount'];

mysqli_query(
$conn,
"INSERT INTO payments
(order_id,customer_id,amount,payment_method,payment_status)
VALUES
('$order_id','$customer_id','$amount','$method','Paid')"
);

header("Location: myorders.php");
?>