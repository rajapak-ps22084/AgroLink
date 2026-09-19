<?php
session_start();
include("db.php");

if(isset($_POST['submit_review']))
{
    $customer_id = $_SESSION['user_id'];

    $rating = $_POST['rating'];
    $review = $_POST['review'];

    mysqli_query($conn,
    "INSERT INTO reviews
    (customer_id,review_text,rating)
    VALUES
    ('$customer_id','$review','$rating')");

    echo "<script>
    alert('Review Submitted Successfully');
    window.location='cusdashboard.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    <link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
<?php include("navbar.php"); ?>
<div class="form-container">
<div class="form-box">

<h1>Customer Review</h1>

<form method="POST">

<label>Rating (1-5)</label>

<input type="number"
name="rating"
min="1"
max="5"
required>

<textarea
name="review"
id="review"
onkeyup="countChars()"
placeholder="Write your review"
style="width:100%;height:120px;"
required></textarea>

<br><br>

<button
type="submit"
name="submit_review">
Submit Review
</button>

</form>

</div>
</div>

</body>
</html>