<?php
session_start();
include("db.php");

$customer_id = $_SESSION['user_id'];

/* Calculate cart total */

$cart_sql = "
SELECT products.price, cart.quantity
FROM cart
JOIN products
ON cart.product_id = products.product_id
WHERE cart.customer_id = '$customer_id'
";

$cart_result = mysqli_query($conn, $cart_sql);

$total = 0;

while($row = mysqli_fetch_assoc($cart_result))
{
    $total += ($row['price'] * $row['quantity']);
}

/* Create order */

$order_sql = "
INSERT INTO orders
(customer_id,total_amount,status)
VALUES
('$customer_id','$total','Pending')
";

mysqli_query($conn,$order_sql);

$order_id = mysqli_insert_id($conn);

/* Save order items */

$items_sql = "
SELECT *
FROM cart
WHERE customer_id='$customer_id'
";

$items_result = mysqli_query($conn,$items_sql);

while($item = mysqli_fetch_assoc($items_result))
{
    mysqli_query($conn,"
    INSERT INTO order_items
    (order_id,product_id,quantity)
    VALUES
    (
        '$order_id',
        '{$item['product_id']}',
        '{$item['quantity']}'
    )
    ");
}

/* Clear cart */

mysqli_query($conn,"
DELETE FROM cart
WHERE customer_id='$customer_id'
");

/* Redirect */

header("Location: myorders.php");
exit();
?>