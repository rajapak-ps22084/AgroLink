<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: cuslogin.php");
    exit();
}

$customer_id = $_SESSION['user_id'];

if(!isset($_GET['order_id']))
{
    die("Order ID Missing");
}

$order_id = $_GET['order_id'];

/* Get Order Details */
$order_query = mysqli_query($conn,
"SELECT * FROM orders WHERE id='$order_id'");

$order = mysqli_fetch_assoc($order_query);

if(!$order)
{
    die("Order Not Found");
}

$amount = $order['total_amount'];

$message = "";

/* Process Payment */
if(isset($_POST['pay']))
{
    $payment_method = $_POST['payment_method'];

    mysqli_query($conn,"
    INSERT INTO payments
    (
        order_id,
        customer_id,
        amount,
        payment_method,
        payment_status
    )
    VALUES
    (
        '$order_id',
        '$customer_id',
        '$amount',
        '$payment_method',
        'Paid'
    )
    ");

    mysqli_query($conn,"
    UPDATE orders
    SET status='Pending'
    WHERE id='$order_id'
    ");

    $message = "Payment Successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:url('bg.jpg') no-repeat center center fixed;
    background-size:cover;
}

.payment-container{
    width:500px;
    margin:50px auto;
    background:rgba(255,255,255,0.95);
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,0.3);
}

h1{
    text-align:center;
    color:green;
    font-size:55px;
}

.summary{
    background:#f5f5f5;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.summary h3{
    color:green;
    margin-top:0;
}

label{
    display:block;
    margin-top:15px;
    font-weight:bold;
}

select,
input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    margin-top:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    background:green;
    color:white;
    border:none;
    padding:15px;
    margin-top:25px;
    border-radius:10px;
    font-size:20px;
    cursor:pointer;
}

button:hover{
    background:#006400;
}

.success{
    background:#d4edda;
    color:#155724;
    padding:15px;
    border-radius:10px;
    text-align:center;
    margin-bottom:20px;
    font-weight:bold;
}
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;

    background-image:url('farm.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}
</style>
</head>
<body>
<?php include("navbar.php"); ?>
<div class="payment-container">

<h1>Payment</h1>

<?php if($message!=""){ ?>
<div class="success">
<?php echo $message; ?>
</div>
<?php } ?>

<div class="summary">

<h3>Order Summary</h3>

<p>
<b>Order ID:</b>
#<?php echo $order['id']; ?>
</p>

<p>
<b>Order Date:</b>
<?php echo $order['order_date']; ?>
</p>

<p>
<b>Total Amount:</b>
Rs. <?php echo number_format($amount,2); ?>
</p>

<p>
<b>Status:</b>
<?php echo $order['status']; ?>
</p>

</div>

<form method="POST">

<label>Payment Method</label>

<select name="payment_method" required>
    <option value="Card">Card</option>
    <option value="Cash On Delivery">Cash On Delivery</option>
</select>

<button type="submit"
onclick="return confirm('Confirm Payment?')">
Confirm Payment
</button>

</form>

</div>

</body>
</html>