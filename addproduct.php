<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: farlogin.php");
    exit();
}

$message = "";

if(isset($_POST['add_product']))
{
    $farmer_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

// Image Upload
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "uploads/".$image_name
    );

    $sql = "INSERT INTO products
    (farmer_id,product_name,category,price,quantity,description,image)
    VALUES
    ('$farmer_id','$product_name','$category','$price','$quantity','$description','$image_name')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Product Added Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body class="inner-page">
<?php include("navbar.php"); ?>

<div class="form-container">
<div class="form-box">

<h1>Add Product</h1>

<p><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data">
<label>Product Name</label>
<input type="text" name="product_name" placeholder="Product Name" required>
<label>Product category</label>
<input type="text" name="category" placeholder="Category" required>
<label>Product Price for 1kg</label>
<input type="number" step="0.01" name="price" placeholder="Price" required>
<label>Product Quantity</label>
<input type="number" name="quantity" placeholder="Quantity" required>

<label>Product Image</label>

<input type="file"
       name="image"
       id="image"
       onchange="previewImage(event)">

<img id="preview"
     width="200"
     style="display:none;">

<textarea name="description" placeholder="Description"></textarea>

<button type="submit" name="add_product">
Add Product
</button>

</form>

</div>
</div>

</body>
</html>