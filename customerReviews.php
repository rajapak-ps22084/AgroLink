<?php
include("db.php");

$result = mysqli_query($conn,
"SELECT * FROM reviews
ORDER BY review_date DESC");
?>

<h1>Customer Reviews</h1>
<link rel="stylesheet" href="style.css">
<?php include("navbar.php"); ?>
<table border="1" cellpadding="10">

<tr>
<th>Rating</th>
<th>Review</th>
<th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['rating']; ?>/5</td>
<td><?php echo $row['review_text']; ?></td>
<td><?php echo $row['review_date']; ?></td>
</tr>

<?php } ?>

</table>