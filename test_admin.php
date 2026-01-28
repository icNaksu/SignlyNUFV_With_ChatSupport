<?php
// Test script to check admin login issues
session_start();
require_once 'config/database.php';

echo "<h2>Admin Login Debug</h2>";

// Test database connection
try {
    $conn = getDBConnection();
    echo "✓ Database connection successful<br>";
    
    // Check if admins table exists
    $result = $conn->query("SHOW TABLES LIKE 'admins'");
    if ($result->num_rows > 0) {
        echo "✓ Admins table exists<br>";
        
        // Show table structure
        echo "<br><strong>Current table structure:</strong><br>";
        $columns = $conn->query("DESCRIBE admins");
        while ($col = $columns->fetch_assoc()) {
            echo "- {$col['Field']} ({$col['Type']})<br>";
        }
        
        // Check if any admin users exist
        $result = $conn->query("SELECT id, username FROM admins");
        echo "<br><strong>Admin users in database:</strong><br>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "- ID: {$row['id']}, Username: {$row['username']}<br>";
            }
        } else {
            echo "<span style='color: red;'>✗ No admin users found!</span><br>";
            echo "<br><strong>Creating default admin...</strong><br>";
            
            // Create a default admin user
            $username = 'admin';
            $password = 'admin123'; // Change this!
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                echo "✓ Default admin created successfully!<br>";
                echo "Username: <strong>admin</strong><br>";
                echo "Password: <strong>admin123</strong><br>";
                echo "<span style='color: orange;'>⚠ Please change this password after logging in!</span><br>";
            } else {
                echo "<span style='color: red;'>✗ Failed to create admin: " . $stmt->error . "</span><br>";
            }
            $stmt->close();
        }
        
        // Test password verification
        echo "<br><strong>Testing password verification:</strong><br>";
        $test_password = 'admin123';
        $test_hash = password_hash($test_password, PASSWORD_DEFAULT);
        if (password_verify($test_password, $test_hash)) {
            echo "✓ Password hashing/verification working correctly<br>";
        } else {
            echo "<span style='color: red;'>✗ Password verification failed!</span><br>";
        }
        
    } else {
        echo "<span style='color: red;'>✗ Admins table does not exist!</span><br>";
        echo "<br><strong>Creating admins table...</strong><br>";
        
        $sql = "CREATE TABLE admins (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            last_active TIMESTAMP NULL
        )";
        
        if ($conn->query($sql)) {
            echo "✓ Admins table created successfully<br>";
            
            // Create default admin
            $username = 'admin';
            $password = 'admin123';
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                echo "✓ Default admin created<br>";
                echo "Username: <strong>admin</strong><br>";
                echo "Password: <strong>admin123</strong><br>";
            }
            $stmt->close();
        } else {
            echo "<span style='color: red;'>✗ Failed to create table: " . $conn->error . "</span><br>";
        }
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo "<span style='color: red;'>✗ Database error: " . $e->getMessage() . "</span><br>";
}

echo "<br><br><a href='admin_login.php'>Go to Admin Login</a>";
?>
