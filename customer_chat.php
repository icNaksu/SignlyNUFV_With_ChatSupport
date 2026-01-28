<?php
require_once 'includes/auth.php';
requireCustomerLogin();

$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - <?php echo htmlspecialchars($customer_name); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chat.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat Support</h2>
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($customer_name); ?></span>
                <a href="logout.php" class="btn btn-secondary btn-sm">Logout</a>
            </div>
        </div>
        
        <div class="chat-messages" id="chatMessages">
            <!-- Messages will be loaded here via JavaScript -->
        </div>
        
        <div class="chat-input-container">
            <form id="messageForm" class="chat-form">
                <input type="text" id="messageInput" placeholder="Type your message..." required>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    
    <script src="js/chat.js"></script>
</body>
</html>
