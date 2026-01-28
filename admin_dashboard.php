<?php
require_once 'includes/auth.php';
requireAdminLogin();

$admin_id = $_SESSION['admin_id'];
$admin_username = $_SESSION['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo htmlspecialchars($admin_username); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Admin Dashboard</h2>
            <div class="admin-info">
                <span>Logged in as: <?php echo htmlspecialchars($admin_username); ?></span>
                <a href="logout.php" class="btn btn-secondary btn-sm">Logout</a>
            </div>
        </div>
        
        <div class="admin-content">
            <div class="customers-list" id="customersList">
                <h3>Customers</h3>
                <div id="customersContainer">
                    <!-- Customers will be loaded here -->
                </div>
            </div>
            
            <div class="admin-chat-area">
                <div class="selected-customer-info" id="selectedCustomerInfo">
                    <p>Select a customer to start chatting</p>
                </div>
                
                <div class="admin-chat-messages" id="adminChatMessages">
                    <!-- Messages will be loaded here -->
                </div>
                
                <div class="admin-chat-input-container">
                    <form id="adminMessageForm" class="chat-form">
                        <input type="hidden" id="selectedCustomerId" value="">
                        <input type="text" id="adminMessageInput" placeholder="Type your reply..." required disabled>
                        <button type="submit" class="btn btn-primary" disabled>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/admin.js"></script>
</body>
</html>
