# Chat Feature Testing Guide

## Prerequisites
- XAMPP running with MySQL started
- Signly application accessible at http://localhost/WebPorg_Signly/
- Database updated with new chat tables (database.sql imported)
- Test user account created (or use default test account)

## Test User Credentials
```
Email: test@example.com
Password: Test123!
```

Or create your own account through the register.php page.

## Test Scenario 1: User Sends First Message

### Steps
1. Open http://localhost/WebPorg_Signly/login.php
2. Login with credentials
3. You should be redirected to index.php
4. Look for **purple chat button** in bottom-right corner
5. Click the button to open chat widget
6. Type "Hello, I need help" in the message input
7. Press Enter or click Send button
8. Message should appear with gradient background on right side

### Expected Results
✓ Chat button visible and clickable
✓ Chat widget opens with "Start a conversation..." message
✓ Message appears in widget with user styling (gradient)
✓ Message timestamp displays
✓ Input field clears after sending
✓ No errors in browser console (F12)

### Troubleshooting
- **Button not visible?** Clear cache (Ctrl+Shift+Del)
- **Widget doesn't open?** Check browser console for errors
- **Message doesn't send?** Verify user is logged in, check console

---

## Test Scenario 2: Admin Views Conversation

### Steps
1. In same or different browser tab/window:
2. Open http://localhost/WebPorg_Signly/admin_chat.php
3. You should see the conversation list on the left
4. Look for "Test User" with "Hello, I need help" preview
5. Click on the conversation
6. Full message thread displays on right

### Expected Results
✓ Admin page loads without errors
✓ Conversation appears in list
✓ Message preview shows correctly
✓ Unread badge shows count (1)
✓ Message thread displays with timestamps
✓ User message shows with gray background
✓ No errors in console

### Troubleshooting
- **Conversation not showing?** Wait 2-3 seconds, refresh page
- **Page fails to load?** Check MySQL connection
- **Messages not appearing?** Verify database import

---

## Test Scenario 3: Admin Sends Response

### Steps
1. Stay on admin_chat.php with conversation selected
2. In the message input area at bottom, type "Hi! How can I assist you?"
3. Press Enter or click Send button
4. Page refreshes/reloads
5. New admin message appears in the thread with purple gradient
6. Admin message shows on the left side of conversation

### Expected Results
✓ Message input accepts text
✓ Send button works
✓ Page updates with new message
✓ Admin message styling is different from user (left side)
✓ Timestamp displays correctly
✓ No database errors
✓ Message persists on page reload

### Troubleshooting
- **Message doesn't send?** Check PHP errors in console
- **Page doesn't reload?** Manual refresh should show message
- **Styling incorrect?** Clear CSS cache

---

## Test Scenario 4: User Receives Admin Response

### Steps
1. Go back to first browser tab with user's chat widget open
2. Wait 2-3 seconds for auto-refresh
3. New admin message should appear in chat widget
4. Admin response shows with gray background on left

### Expected Results
✓ Message auto-refreshes after 2 seconds
✓ Admin message displays with correct styling
✓ Conversation continues naturally
✓ Both messages visible in order
✓ Timestamps match database
✓ No lag or errors

### Troubleshooting
- **Message not appearing?** Click close and reopen widget
- **Slow refresh?** This is normal, refresh is every 2 seconds
- **Old messages missing?** Full history should be there

---

## Test Scenario 5: Mobile Responsiveness

### Steps
1. Open Developer Tools (F12)
2. Click "Toggle device toolbar" (Ctrl+Shift+M)
3. Select iPhone 12 or similar mobile size
4. Refresh page (F5)
5. Open chat widget
6. Send a test message

### Expected Results
✓ Chat widget takes full screen on mobile
✓ Text is readable (no zoom needed)
✓ Send button easily clickable
✓ Keyboard pops up on input focus
✓ Messages display correctly
✓ No horizontal scrolling
✓ Layout adapts to landscape mode

### Device Sizes to Test
- iPhone 12 (390x844)
- iPhone SE (375x667)
- iPad (768x1024)
- Galaxy S21 (360x800)
- Desktop (1920x1080)

---

## Test Scenario 6: Message Persistence

### Steps
1. Send 5 messages in sequence
2. Close the chat widget
3. Reopen the chat widget
4. All 5 messages should still be there
5. Refresh the page (F5)
6. Messages still there
7. Check in admin panel
8. Messages also visible in admin interface

### Expected Results
✓ Messages saved in database
✓ Messages load on widget reopen
✓ Messages persist across page reloads
✓ Admin sees same messages
✓ Order is chronological
✓ Timestamps are accurate

---

## Test Scenario 7: Keyboard Shortcuts

### Steps
1. Open chat widget
2. In message input, press Shift+Enter
3. New line should be added (not send)
4. Press just Enter (no Shift)
5. Message should send
6. Test again with different messages

### Expected Results
✓ Enter sends message
✓ Shift+Enter creates new line
✓ Textarea auto-expands for long messages
✓ Up to 3-4 lines visible, scrollable after

---

## Test Scenario 8: Multiple Conversations

### Steps
1. Create second test user account
2. Login as second user
3. Send message from second user
4. Go to admin panel
5. Should see 2 conversations in list
6. Each conversation shows correct user and messages
7. Switch between them

### Expected Results
✓ Each user gets own conversation
✓ Conversations are separate
✓ Messages don't mix between conversations
✓ Admin can switch between easily
✓ Each shows correct content

---

## Test Scenario 9: Session/Security

### Steps
1. Open chat widget, send message
2. Logout (click logout icon)
3. Try accessing admin_chat.php directly
4. Should redirect to login.php
5. Logout then try accessing chat_api.php directly
6. Should get JSON error: "Unauthorized"

### Expected Results
✓ Logout clears session
✓ Protected pages redirect correctly
✓ API requires authentication
✓ No private data exposed
✓ Messages can't be accessed without login

---

## Test Scenario 10: Error Handling

### Steps
1. Disable JavaScript in browser (Dev Tools → Settings → Disable JS)
2. Try to send message
3. Should fail gracefully (no chat functionality)
4. Re-enable JavaScript
5. Try sending message with very long text (1000+ characters)
6. Message should send and display
7. Test with special characters: @#$%^&*()

### Expected Results
✓ No JavaScript errors on page
✓ Long messages handled correctly
✓ Special characters don't break display
✓ Messages scroll properly
✓ UI remains usable

---

## Browser Compatibility Testing

Test in following browsers:
- ✓ Chrome/Chromium (Latest)
- ✓ Firefox (Latest)
- ✓ Safari (Latest)
- ✓ Edge (Latest)
- ✓ Mobile Safari (iOS)
- ✓ Chrome Mobile (Android)

### Expected Results in All Browsers
✓ Chat button visible
✓ Widget opens and closes
✓ Messages send and receive
✓ Styling looks correct
✓ No console errors
✓ Responsive works properly

---

## Performance Testing

### Message Load Time
- Sending message: < 1 second
- Receiving message: < 2.5 seconds (refresh interval)

### Database Query Performance
- Get conversations: < 100ms
- Get messages: < 200ms
- Send message: < 150ms

### Chat Widget Performance
- Open/close animation: Smooth
- Message display: Instant
- Scroll: No lag
- Input: Responsive

---

## Admin Panel Specific Tests

### Test Admin Conversation List
1. Send messages from multiple users
2. Admin dashboard should show all conversations
3. Each shows last message preview
4. Unread count updates correctly

### Test Admin Message Thread
1. Select conversation
2. Full message history displays
3. Messages in correct order
4. Sender type distinguishable
5. Timestamps accurate

### Test Admin Filtering
1. Conversations sort by most recent
2. Open/closed status filters work (if implemented)
3. Search functionality works (if implemented)

---

## Data Validation Tests

### Empty Message Test
- Send empty message
- Should not be saved
- Error message shown to user

### Very Long Message Test
- Send 5000+ character message
- Should send and display
- Textarea wraps correctly

### SQL Injection Test
- Send message with SQL: "'; DROP TABLE messages; --"
- Should be stored as text, not executed
- Display safely

### XSS Test
- Send message with HTML: "<script>alert('xss')</script>"
- Should not execute
- Should display as text

---

## Checklist for Go-Live

Before deploying to production:

- [ ] Database tables created successfully
- [ ] All files in correct locations
- [ ] Chat widget appears on index.php
- [ ] User can send messages
- [ ] Admin can receive and respond
- [ ] Messages persist in database
- [ ] Mobile responsive works
- [ ] All browsers compatible
- [ ] No console errors
- [ ] Security tests pass
- [ ] Performance acceptable
- [ ] Documentation complete

---

## Common Issues and Solutions

### Issue: Chat widget not appearing
**Solution:** Clear browser cache, refresh page, check if chat.css is loading

### Issue: Messages not sending
**Solution:** Check MySQL is running, verify database tables exist, check user is logged in

### Issue: Admin not seeing conversations
**Solution:** Verify chat_api.php is callable, check database has messages, refresh admin page

### Issue: Slow message refresh
**Solution:** Normal - refresh is every 2 seconds. Check server performance.

### Issue: Old messages missing
**Solution:** Full message history should load. Check database for message records.

### Issue: Messages mix between conversations
**Solution:** Should not happen. Report if observed with full details.

---

## Test Report Template

```
Date: ____________
Tester: __________
Browser: _________
OS: ______________
Screen Size: _____

Test Case: ________________
Expected Result: __________
Actual Result: ____________
Status: ☐ PASS ☐ FAIL

Notes:
_________________________
_________________________

Screenshots:
[Attach screenshots if failed]
```

---

**Happy Testing! 🧪**

If you encounter any issues not listed here, please document:
1. What you did
2. What you expected
3. What actually happened
4. Browser and OS used
5. Error messages (if any)
