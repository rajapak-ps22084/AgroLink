<?php
include("db.php");

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE orders
SET status='Delivered'
WHERE id='$id'"
);

header("Location: trackDelivery.php");
exit();
?>