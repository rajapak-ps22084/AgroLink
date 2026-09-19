<?php

session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}
include("db.php");

$customer_id=$_SESSION['user_id'];

$sql="SELECT cart.cart_id,
products.product_name,
products.price,
cart.quantity

FROM cart

JOIN products
ON cart.product_id=products.product_id

WHERE cart.customer_id='$customer_id'";

$result=mysqli_query($conn,$sql);

$total=0;
?>
<div class="cart-page">
<h1>My Cart</h1>
<link rel="stylesheet" href="style.css">
<?php include("navbar.php"); ?>
<table border="1">

<tr>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Subtotal</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
$subtotal=
$row['price']*$row['quantity'];

$total+=$subtotal;
?>

<tr>

<td><?php echo $row['product_name']; ?></td>

<td>Rs.<?php echo $row['price']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>Rs.<?php echo $subtotal; ?></td>
<td>
<a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>"
onclick="return confirm('Remove this item from cart?')">
<button class="cart-remove-btn">
Remove
</button>
</a>
</td>
</tr>

<?php } ?>
<tr>

<td colspan="4">
<b>Total Amount</b>
</td>

<td colspan="2">
<b>Rs. <?php echo number_format($total,2); ?></b>
</td>

</tr>


</table>

</div>
<br>

<div class="checkout-area">

<a href="checkout.php">
<button class="cart-checkout-btn">
Proceed To Checkout
</button>
</a>

</div>
<br><br>
<a href="checkout.php">
    <button>
        Place Order
    </button>


</a>