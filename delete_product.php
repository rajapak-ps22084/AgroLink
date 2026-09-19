<?php
include("db.php");

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM products
WHERE product_id='$id'"
);

header("Location: manage_products.php");
?>