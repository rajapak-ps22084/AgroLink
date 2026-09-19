<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>AgroLink - Farmer</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">

        <div class="logo-section">

            <img src="logo.png" alt="AgroLink Logo">

            <h2>AgroLink</h2>

        </div>

        <ul class="nav-links">

            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>

        </ul>

    </nav>

    <!-- Hero Section -->

    <section class="hero">

        <div class="overlay"></div>

        <div class="hero-content">

            <h1>
                Fresh Products Directly from Local Farmers
            </h1>

            <p>
                Sell your vegetables, fruits and farm products
                directly to customers.
            </p>

            <h2>Farmer Options</h2>

            <a href="farlogin.php">
                <button class="popup-btn">
                    Login
                </button>
            </a>

            <a href="farregister.php">
                <button class="popup-btn">
                    Register
                </button>
            </a>

            <a href="index.php">
                <button class="popup-btn">
                    Back
                </button>
            </a>

        </div>

    </section>

</body>

</html>