-- Create database for Signly
CREATE DATABASE IF NOT EXISTS signly_db;






























































































































































































































































































































































































</html></body>    </div>        </div>            <?php endif; ?>                <div class="empty-state">Select a conversation to start chatting</div>            <?php else: ?>                </script>                    });                        }                            sendAdminMessage();                            e.preventDefault();                        if (e.key === 'Enter' && !e.shiftKey) {                    document.getElementById('admin-message').addEventListener('keypress', (e) => {                    // Send on Enter                    }                        .catch(error => console.error('Error:', error));                        })                            }                                location.reload();                                document.getElementById('admin-message').value = '';                            if (data.success) {                        .then(data => {                        .then(response => response.json())                        })                            body: formData                            method: 'POST',                        fetch('admin_chat_api.php', {                        formData.append('sender_type', 'admin');                        formData.append('message', message);                        formData.append('conversation_id', <?php echo $selectedConversationId; ?>);                        const formData = new FormData();                        if (!message) return;                        const message = document.getElementById('admin-message').value.trim();                    function sendAdminMessage() {                <script>                </div>                    <button class="send-btn" onclick="sendAdminMessage()">Send</button>                    <textarea class="chat-input" id="admin-message" placeholder="Type your response..." rows="2"></textarea>                <div class="chat-input-area">                </div>                    <?php endif; ?>                        <?php endforeach; ?>                            </div>                                </div>                                    <div class="message-time"><?php echo date('H:i', strtotime($msg['created_at'])); ?></div>                                    <div class="message-bubble"><?php echo htmlspecialchars($msg['message']); ?></div>                                <div class="message-content">                            <div class="chat-message <?php echo $msg['sender_type']; ?>">                        <?php foreach ($messages as $msg): ?>                    <?php else: ?>                        <div class="empty-state">No messages yet</div>                    <?php if (empty($messages)): ?>                <div class="chat-messages">                </div>                    ?>                        echo 'Chat with ' . $conversationName;                        }                            }                                break;                                $conversationName = htmlspecialchars($conv['name']);                            if ($conv['id'] == $selectedConversationId) {                        foreach ($conversations as $conv) {                        $conversationName = '';                    <?php                 <div class="chat-header">            <?php if ($selectedConversationId): ?>        <div class="chat-main">        <!-- Chat Area -->        </div>            <?php endforeach; ?>                </a>                    </div>                        </div>                            <?php endif; ?>                                <div class="unread-badge"><?php echo $conv['unread_count']; ?></div>                            <?php if ($conv['unread_count'] > 0): ?>                            </div>                                <div class="conversation-preview"><?php echo htmlspecialchars($conv['last_message'] ?? 'No messages'); ?></div>                                <div class="conversation-user-name"><?php echo htmlspecialchars($conv['name']); ?></div>                            <div>                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">                    <div class="conversation-item <?php echo $selectedConversationId == $conv['id'] ? 'active' : ''; ?>">                <a href="admin_chat.php?id=<?php echo $conv['id']; ?>" style="text-decoration: none; color: inherit;">            <?php foreach ($conversations as $conv): ?>            </div>                Conversations            <div style="padding: 15px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0; font-weight: 600; color: #333;">        <div class="conversations-list">        <!-- Conversations List -->    <div class="admin-chat-container">    </header>        </div>            </div>                </div>                    </a>                        </svg>                            <line x1="21" y1="12" x2="9" y2="12"></line>                            <polyline points="16 17 21 12 16 7"></polyline>                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">                    <a href="logout.php" class="logout-link" title="Logout">                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Admin'); ?></span>                <div class="profile-info">            <div class="right-controls">            </nav>                <a href="index.php">Back to Home</a>            <nav class="nav-links">            </a>                <img src="png/signly.png" alt="Signly Logo">            <a href="index.php" class="logo">        <div class="container nav">    <header class="header">    <!-- Header --><body></head>    </style>        }            }                max-width: 80%;            .message-content {            }                max-height: 200px;                width: 100%;            .conversations-list {            }                flex-direction: column;            .admin-chat-container {        @media (max-width: 768px) {        }            font-size: 18px;            color: #999;            height: 100%;            justify-content: center;            align-items: center;            display: flex;        .empty-state {        }            transform: scale(1.05);        .send-btn:hover {        }            transition: transform 0.2s;            font-weight: 600;            cursor: pointer;            border-radius: 8px;            border: none;            color: white;            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);            padding: 10px 20px;        .send-btn {        }            min-height: 40px;            resize: vertical;            font-size: 14px;            font-family: inherit;            border-radius: 8px;            border: 1px solid #e0e0e0;            padding: 10px 15px;            flex: 1;        .chat-input {        }            gap: 10px;            display: flex;            border-top: 1px solid #e0e0e0;            padding: 15px;        .chat-input-area {        }            margin-top: 4px;            color: #999;            font-size: 12px;        .message-time {        }            color: white;            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);        .chat-message.admin .message-bubble {        }            color: #333;            background: #e0e0e0;        .chat-message.user .message-bubble {        }            font-size: 14px;            word-wrap: break-word;            border-radius: 12px;            padding: 12px 16px;        .message-bubble {        }            max-width: 60%;        .message-content {        }            justify-content: flex-end;        .chat-message.admin {        }            justify-content: flex-start;        .chat-message.user {        }            margin-bottom: 8px;            gap: 8px;            display: flex;        .chat-message {        }            gap: 12px;            flex-direction: column;            display: flex;            padding: 20px;            overflow-y: auto;            flex: 1;        .chat-messages {        }            font-weight: 600;            font-size: 18px;            padding: 20px;            color: white;            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);        .chat-header {        }            box-shadow: 0 2px 10px rgba(0,0,0,0.1);            overflow: hidden;            border-radius: 12px;            background: white;            flex-direction: column;            display: flex;            flex: 1;        .chat-main {        }            margin-left: auto;            font-weight: 600;            font-size: 12px;            justify-content: center;            align-items: center;            display: flex;            height: 24px;            width: 24px;            border-radius: 50%;            color: white;            background: #ff4757;            display: inline-block;        .unread-badge {        }            text-overflow: ellipsis;            overflow: hidden;            white-space: nowrap;            color: #666;            font-size: 13px;        .conversation-preview {        }            margin-bottom: 4px;            color: #333;            font-weight: 600;        .conversation-user-name {        }            border-left: 4px solid #667eea;            background: #e8e5ff;        .conversation-item.active {        }            background: #f0f0f0;        .conversation-item.active {        .conversation-item:hover,        }            transition: background 0.2s;            cursor: pointer;            border-bottom: 1px solid #e0e0e0;            padding: 15px;        .conversation-item {        }            box-shadow: 0 2px 10px rgba(0,0,0,0.1);            overflow-y: auto;            border-radius: 12px;            background: white;            width: 300px;        .conversations-list {        }            background: #f5f5f5;            padding: 20px;            height: calc(100vh - 80px);            gap: 20px;            display: flex;        .admin-chat-container {    <style>    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">    <link rel="stylesheet" href="css/responsive.css">    <link rel="stylesheet" href="css/style.css">    <link rel="icon" href="png/signly.png" type="image/png">    <title>Admin Chat - Signly</title>    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta charset="UTF-8"><head><html lang="en"><!DOCTYPE html>?>$conn->close();}    $markStmt->execute();    $markStmt->bind_param('i', $selectedConversationId);    ");        WHERE conversation_id = ? AND sender_type = 'user' AND read_at IS NULL        SET read_at = NOW()         UPDATE messages     $markStmt = $conn->prepare("    // Mark messages as read        $messages = $messagesResult->fetch_all(MYSQLI_ASSOC);    $messagesResult = $stmt->get_result();    $stmt->execute();    $stmt->bind_param('i', $selectedConversationId);    ");        ORDER BY m.created_at ASC        WHERE m.conversation_id = ?        JOIN users u ON m.sender_id = u.id        FROM messages m        SELECT m.id, m.message, m.sender_type, u.name, m.created_at, m.read_at    $stmt = $conn->prepare("if ($selectedConversationId) {$messages = [];$selectedConversationId = $_GET['id'] ?? null;$conversations = $result->fetch_all(MYSQLI_ASSOC);$result = $conn->query($query);";    ORDER BY c.updated_at DESC    JOIN users u ON c.user_id = u.id    FROM conversations c           (SELECT COUNT(*) FROM messages WHERE conversation_id = c.id AND read_at IS NULL AND sender_type = 'user') as unread_count           (SELECT message FROM messages WHERE conversation_id = c.id ORDER BY created_at DESC LIMIT 1) as last_message,    SELECT c.id, c.user_id, c.status, u.name, u.email, c.created_at,$query = "// Get all conversations$currentUserEmail = $_SESSION['user_email'] ?? '';$currentUserId = $_SESSION['user_id'];// You may want to add an 'is_admin' field to the users table// For now, we'll consider users with specific emails or roles as admins// Check if user is admin (you can modify this logic based on your requirements)}    die('Database connection failed: ' . $conn->connect_error);if ($conn->connect_error) {$conn = new mysqli('localhost', 'root', '', 'signly_db');}    exit();    header('Location: login.php');if (!isset($_SESSION['user_id'])) {USE signly_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_email (email)
);

-- Create conversations table for chat
CREATE TABLE IF NOT EXISTS conversations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  admin_id INT,
  status ENUM('open', 'closed') DEFAULT 'open',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (admin_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_user_id (user_id),
  INDEX idx_status (status),
  INDEX idx_created_at (created_at)
);

-- Create messages table for chat
CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT NOT NULL,
  sender_id INT NOT NULL,
  sender_type ENUM('user', 'admin') NOT NULL,
  message LONGTEXT NOT NULL,
  read_at TIMESTAMP NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE,
  FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
  INDEX idx_conversation_id (conversation_id),
  INDEX idx_sender_id (sender_id),
  INDEX idx_created_at (created_at),
  INDEX idx_unread (conversation_id, read_at)
);

