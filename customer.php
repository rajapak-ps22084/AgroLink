<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>AgroLink - Customer</title>

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
                Buy fresh vegetables and fruits directly
                from trusted farmers.
            </p>

            <h2>Customer Options</h2>

            <a href="cuslogin.php">

                <button class="popup-btn">

                    Login

                </button>

            </a>

            <a href="cusregister.php">

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