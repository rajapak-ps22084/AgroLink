# 🌾 AgroLink — Farmer-to-Customer E-Commerce Platform (Group project)

A full-stack web application connecting farmers directly with customers — farmers list produce, customers browse, add to cart, checkout, and pay, while farmers manage orders and deliveries. Built with PHP, MySQL, HTML/CSS, and JavaScript.

## 🚀 Setup Instructions (XAMPP)

1. **Install [XAMPP](https://www.apachefriends.org/)** if not already installed, and start **Apache** and **MySQL** from the XAMPP Control Panel.

2. **Copy the project folder** — place the `AgroLink` folder inside your XAMPP `htdocs` directory:
   - Windows: `C:\xampp\htdocs\AgroLink`

3. **Create the database:**
   - Open `http://localhost/phpmyadmin` in your browser
   - Click **New** → name it `agrolink` → Create
   - Select the `agrolink` database → go to the **Import** tab → choose `agrolink_schema.sql` → click **Go**
   - This creates all required tables (`users`, `products`, `cart`, `orders`, `order_items`, `payments`, `reviews`) plus 2 sample test accounts

4. **Check `db.php`** — this project connects to MySQL on **port 3307**:
   ```php
   $conn = mysqli_connect("127.0.0.1", "root", "", "agrolink", 3307);
   ```
   If your local MySQL runs on a different port (XAMPP's default is usually 3306), update the port number here, or configure your MySQL to run on 3307.

5. **Run the site** — open your browser and go to:
   ```
   http://localhost/AgroLink/index.php
   ```

## 🔑 Test Accounts

| Role | Email | Password |
|---|---|---|
| Farmer | farmer@test.com | password123 |
| Customer | customer@test.com | password123 |

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL

## 📦 Core Features

- Separate registration/login flows for **Farmers** and **Customers**
- Farmers: add/edit/delete products, view & approve/reject/deliver orders, sales report
- Customers: browse products, cart, checkout, payment, order tracking, leave reviews
- Session-based authentication with hashed passwords (bcrypt via `password_hash`)

## 📁 Project Structure

```
AgroLink/
├── db.php                 # Database connection (fixed for this machine)
├── index.php               # Landing page
├── cuslogin.php / cusregister.php     # Customer auth
├── farlogin.php / farregister.php     # Farmer auth
├── products.php / addproduct.php / edit_product.php / manage_products.php
├── addtocart.php / mycart.php / checkout.php
├── payment.php / processpayment.php
├── myorders.php / trackorder.php / vieworders.php / trackDelivery.php
├── approve_order.php / deliver_order.php / reject_order.php
├── addreview.php / customerReviews.php
├── salesReport.php
├── navbar.php / style.css / script.js
└── uploads/                # Product images
```

## 👤 About

A group project (5 members) built to demonstrate a complete full-stack CRUD application with role-based access, session handling, and a real-world e-commerce order/payment/delivery workflow.
