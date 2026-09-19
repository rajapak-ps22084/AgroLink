<?php
session_start();
include("db.php");

$result = mysqli_query(
    $conn,
    "SELECT * FROM products"
);
?>
<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">

<header>
        <nav class="navbar">

            <!-- Logo -->
            <div class="logo-section">
                <img src="logo.png" alt="AgroLink Logo">
                <h2>AgroLink</h2>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>

            

        </nav>
<script src="script.js"></script>
    </header>

<h1 align="center">Available Products</h1>
<div style="text-align:center; margin-bottom:20px;">

    <input type="text"
           id="searchInput"
           placeholder="🔍 Search Products..."
           onkeyup="searchProducts()"
           style="
           width:300px;
           padding:10px;
           border-radius:8px;
           border:1px solid #ccc;">

</div>
<div class="product-grid">


<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="product-card">

<?php if(!empty($row['image'])){ ?>
        <img src="uploads/<?php echo $row['image']; ?>"
             alt="<?php echo $row['product_name']; ?>"
             class="product-image">
    <?php } ?>


<h3><?php echo $row['product_name']; ?></h3>

<p>Category: <?php echo $row['category']; ?></p>

<p>Price: Rs. <?php echo $row['price']; ?></p>

<p>Stock: <?php echo $row['quantity']; ?></p>

<?php if(isset($_SESSION['user_id'])){ ?>

<form action="addtocart.php" method="POST">

<input type="hidden"
name="product_id"
value="<?php echo $row['product_id']; ?>">

<input type="number"
name="quantity"
value="1"
min="1"
onchange="validateQuantity(this)">

<br><br>

<button type="submit" name="add_cart">
Add To Cart
</button>

</form>

<?php } else { ?>

<a href="cuslogin.php">
<button type="button">
Login To Buy
</button>
</a>

<?php } ?>

</div>

<?php } ?>
</body>
</html>