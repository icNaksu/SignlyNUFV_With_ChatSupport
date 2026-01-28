# Chat Feature Implementation

## Overview
A complete real-time chat system has been added to the Signly application, allowing users to communicate with administrators through a messenger-like interface.

## Files Added/Modified

### Backend Files
1. **chat_api.php** - Main API endpoint for user chat operations
   - `get_or_create_conversation` - Creates/retrieves user's conversation
   - `get_messages` - Fetches messages for a conversation
   - `send_message` - Handles sending user messages
   - `get_conversation_list` - Lists all conversations for a user

2. **admin_chat.php** - Admin interface for managing conversations
   - Displays all user conversations in a list
   - Shows message thread for selected conversation
   - Allows admins to respond to user messages

3. **admin_chat_api.php** - API endpoint for admin message sending
   - Receives admin messages and stores in database
   - Updates conversation metadata

### Frontend Files
1. **css/chat.css** - Complete styling for chat widget
   - Chat button styles (fixed position, gradient, animations)
   - Chat widget modal (responsive for all devices)
   - Message bubbles (different styles for user vs admin)
   - Input area with auto-resizing textarea
   - Loading and empty states
   - Mobile-first responsive design

2. **js/chat.js** - JavaScript functionality for chat widget
   - ChatWidget class managing all interactions
   - Auto-refresh messages every 2 seconds
   - Message display and pagination
   - Form submission handling
   - HTML escaping for security
   - Keyboard shortcuts (Enter to send, Shift+Enter for new line)

3. **index.php** - Modified to include chat widget
   - Added chat.css link in head
   - Added chat widget HTML at bottom of body
   - Added chat.js script reference

### Database Changes
**database.sql** - Updated with two new tables:

```sql
-- Conversations table
CREATE TABLE conversations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  admin_id INT,
  status ENUM('open', 'closed'),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (admin_id) REFERENCES users(id)
);

-- Messages table
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT NOT NULL,
  sender_id INT NOT NULL,
  sender_type ENUM('user', 'admin'),
  message LONGTEXT NOT NULL,
  read_at TIMESTAMP NULL,
  created_at TIMESTAMP,
  FOREIGN KEY (conversation_id) REFERENCES conversations(id),
  FOREIGN KEY (sender_id) REFERENCES users(id)
);
```

## Setup Instructions

### 1. Database Setup
Run the updated database.sql file to create the new tables:
```bash
mysql -u root -p signly_db < database.sql
```

Or manually execute the SQL in phpMyAdmin:
- Navigate to phpMyAdmin
- Select signly_db database
- Go to Import tab
- Upload database.sql file
- Click Import

### 2. File Structure
Ensure all files are in correct locations:
```
WebPorg_Signly/
├── index.php (modified)
├── admin_chat.php (new)
├── admin_chat_api.php (new)
├── chat_api.php (new)
├── css/
│   └── chat.css (new)
├── js/
│   └── chat.js (new)
└── database.sql (modified)
```

## Features

### User Chat Interface
- **Chat Button**: Fixed position button in bottom-right (gradient purple)
- **Message Display**: 
  - User messages on right (gradient background)
  - Admin messages on left (gray background)
  - Timestamps for each message
- **Input Area**: 
  - Auto-resizing textarea
  - Send button
  - Enter to send, Shift+Enter for new line
- **Auto-Refresh**: Messages refresh every 2 seconds
- **Responsive**: 
  - Desktop: 400px wide widget
  - Tablet: 350px wide widget
  - Mobile: Full-screen chat

### Admin Interface
- **Conversation List**: 
  - Shows all user conversations
  - Displays last message preview
  - Unread message badge
  - Quick access to conversations
- **Message Thread**: 
  - Full message history
  - Sorted by timestamp
  - Different styling for user vs admin messages
- **Message Input**: 
  - Textarea for multi-line responses
  - Send button
  - Enter to send, Shift+Enter for new line
- **Auto-mark Read**: Messages auto-marked as read when conversation is viewed

## User Flow

### For Regular Users
1. User logs in to index.php
2. Chat button appears in bottom-right corner
3. Click button to open chat widget
4. Existing conversations load automatically
5. Type message and press Enter or click Send
6. Messages display in real-time
7. Admin responses appear with different styling

### For Admins
1. Admin logs in and navigates to admin_chat.php
2. All conversations listed on left sidebar
3. Click conversation to view full message thread
4. Type response in input area
5. Press Enter or click Send
6. Response appears in user's chat widget

## Technical Details

### API Endpoints
- `GET chat_api.php?action=get_or_create_conversation` - Get/create user conversation
- `GET chat_api.php?action=get_messages&conversation_id={id}` - Fetch messages
- `POST chat_api.php?action=send_message` - Send user message
- `GET chat_api.php?action=get_conversation_list` - List conversations
- `POST admin_chat_api.php` - Send admin message

### Message Refresh
- Messages auto-refresh every 2 seconds when chat is open
- Refresh pauses when chat is closed to save resources

### Security Features
- Session-based authentication required
- Foreign key constraints on database
- HTML escaping for XSS prevention
- User-conversation ownership verification

### Responsive Breakpoints
- **Mobile** (≤480px): Full-screen chat
- **Tablet** (≤768px): 350px widget
- **Desktop**: 400px widget

## Customization

### Change Chat Colors
Edit `css/chat.css`:
- Gradient: `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`
- Change hex values to desired colors

### Change Refresh Interval
Edit `js/chat.js`:
```javascript
this.messageRefreshInterval = setInterval(() => this.loadMessages(), 2000);
// Change 2000 to desired milliseconds
```

### Change Chat Widget Position
Edit `css/chat.css`:
```css
.chat-button {
    bottom: 30px;  /* Distance from bottom */
    right: 30px;   /* Distance from right */
}
```

## Troubleshooting

### Chat widget not appearing
- Clear browser cache
- Check that chat.css is linked in index.php head
- Check console for JavaScript errors

### Messages not sending
- Verify user is logged in (check $_SESSION)
- Check browser console for API errors
- Verify database tables exist
- Check database credentials in chat_api.php

### Messages not loading
- Check database connection
- Verify conversation_id is valid
- Check message timestamps in database

### Admin not seeing messages
- Verify admin is logged in
- Check conversation_id in URL
- Verify user_id relationship in database

## Future Enhancements
- WebSocket support for real-time messaging without polling
- Typing indicators
- File/image uploads
- Message reactions/emoji
- Conversation search
- Message history export
- Admin notification system
