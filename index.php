<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroLink</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigation Bar -->
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
    </header>

    <!-- Hero Section -->
    <section class="hero">

        <div class="overlay"></div>

        <div class="hero-content">

            <h1>Fresh Products Directly from Local Farmers</h1>

            <p>
                Buy healthy vegetables, fruits, and organic products
                directly from trusted farmers.
            </p>

            <!-- Customer and Farmer Buttons -->
            <div class="main-buttons">

                <a href="customer.php">
                    <button class="customer-btn">
                        Customer
                    </button>
                </a>

                <a href="farmer.php">
                    <button class="farmer-btn">
                        Farmer
                    </button>
                </a>

            </div>

        </div>

    </section>
<footer class="footer">

    <div class="footer-container">

        <div class="footer-section">
            <h3>AgroLink</h3>

            <p>
                AgroLink is a trusted platform that connects
                farmers directly with customers.
            </p>
        </div>

        <div class="footer-section">
            <h3>Contact Information</h3>

            <p>📍 Colombo, Sri Lanka</p>
            <p>📞 +94 71 234 5678</p>
            <p>✉ support@agrolink.com</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2026 AgroLink. All Rights Reserved.</p>
    </div>

</footer><script src="script.js"></script>

</body>
</html>
    