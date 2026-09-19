<?php
include("db.php");

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE orders
SET status='Approved'
WHERE id='$id'"
);

header("Location:vieworders.php");
?>