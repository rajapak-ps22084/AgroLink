<?php
session_start();
include("db.php");
if(!isset($_SESSION['user_id']))
{
    header("Location: farlogin.php");
    exit();
}


$farmer_id = $_SESSION['user_id'];

$result = mysqli_query(
$conn,
"SELECT * FROM products WHERE farmer_id='$farmer_id'"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Products</title>
<link rel="stylesheet" href="style.css">
</head>

<body class="inner-page">
<?php include("navbar.php"); ?>

<div class="dashboard">

<h1>Manage Products</h1>

<table class="table">

<tr>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Actions</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>


<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['category']; ?></td>

<td>Rs. <?php echo $row['price']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>

<a href="edit_product.php?id=<?php echo $row['product_id']; ?>">
<button>Edit</button>
</a>

<a href="delete_product.php?id=<?php echo $row['product_id']; ?>"
onclick="return confirm('Delete Product?')">
<button>Delete</button>
</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="addproduct.php">
<button>Add New Product</button>
</a>

</div>

</body>
</html>