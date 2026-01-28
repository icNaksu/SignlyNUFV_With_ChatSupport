-- Create database
CREATE DATABASE IF NOT EXISTS chat_app;
USE chat_app;

-- Create customers table
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    last_active TIMESTAMP NULL DEFAULT NULL
);

-- Insert three admin accounts
-- Passwords: admin1pass, admin2pass, admin3pass (will be hashed in PHP)
INSERT INTO admins (username, password) VALUES
('admin1', 'admin1pass'), -- admin1pass
('admin2', 'admin2pass'), -- admin2pass
('admin3', 'admin3pass'); -- admin3pass

-- Create messages table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    admin_id INT NULL,
    message TEXT NOT NULL,
    sender_type ENUM('customer', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);

-- Create index for faster queries
CREATE INDEX idx_customer_id ON messages(customer_id);
CREATE INDEX idx_admin_id ON messages(admin_id);
CREATE INDEX idx_created_at ON messages(created_at);
