-- =====================================================
-- AgroLink Database Schema
-- Reconstructed from application code for fresh setup
-- Import this file via phpMyAdmin (or `mysql -u root -p agrolink < agrolink.sql`)
-- =====================================================

CREATE DATABASE IF NOT EXISTS agrolink;
USE agrolink;

-- Users table (customers, farmers, and admin all share this table via `role`)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    role ENUM('customer','farmer','admin') NOT NULL
) ENGINE=InnoDB;

-- Products listed by farmers
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_id INT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    description TEXT,
    image VARCHAR(255),
    FOREIGN KEY (farmer_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Shopping cart per customer
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Orders placed by customers
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'Pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Line items within each order
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Payments made against orders
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    customer_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(30) NOT NULL,
    payment_status VARCHAR(30) NOT NULL DEFAULT 'Paid',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Customer product/service reviews
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    review_text TEXT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- =====================================================
-- Optional: sample test data so the site isn't empty on first run
-- Test login password for both accounts below is: password123
-- =====================================================

INSERT INTO users (fullname, email, phone, address, password, role) VALUES
('Nimal Perera', 'farmer@test.com', '0771234567', 'Kandy', '$2y$10$27Ck053jxEMOsikC981.v.BfhCDzEhVre6eoIVgZmirmFM3opuyZq', 'farmer'),
('Kamal Silva', 'customer@test.com', '0777654321', 'Colombo', '$2y$10$27Ck053jxEMOsikC981.v.BfhCDzEhVre6eoIVgZmirmFM3opuyZq', 'customer');

INSERT INTO products (farmer_id, product_name, category, price, quantity, description, image) VALUES
(1, 'Fresh Tomatoes', 'Vegetables', 250.00, 100, 'Organically grown tomatoes from Kandy hills.', 'farm.jpg'),
(1, 'Carrots', 'Vegetables', 180.00, 80, 'Fresh farm carrots.', 'farm.jpg');
