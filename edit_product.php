<?php
session_start();
include("db.php");

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM products
WHERE product_id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_product']))
{
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    mysqli_query(
    $conn,
    "UPDATE products SET
    product_name='$product_name',
    category='$category',
    price='$price',
    quantity='$quantity'
    WHERE product_id='$id'"
    );

    header("Location: manage_products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">

<div class="form-container">
<div class="form-box">

<h1>Edit Product</h1>

<form method="POST">

<input type="text"
name="product_name"
value="<?php echo $row['product_name']; ?>"
required>

<input type="text"
name="category"
value="<?php echo $row['category']; ?>"
required>

<input type="number"
step="0.01"
name="price"
value="<?php echo $row['price']; ?>"
required>

<input type="number"
name="quantity"
value="<?php echo $row['quantity']; ?>"
required>

<button type="submit"
name="update_product">
Update Product
</button>

</form>

</div>
</div>

</body>
</html>