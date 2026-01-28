# 🔐 Admin Setup Guide

## Step 1: Update Database with Admin Role

Run this SQL query in phpMyAdmin or MySQL command line:

```sql
ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT 0;
```

This adds an `is_admin` field to the users table to designate admin users.

## Step 2: Create Admin User

You have two options:

### Option A: Create Admin User via SQL (Recommended)

Run this SQL query:

```sql
INSERT INTO users (name, email, password, is_admin) VALUES 
('Administrator', 'admin@signly.com', '$2y$10$0p/7BbM3/NG.l5SN/4I1mO.vEXP3Xt3rGNhUV7C6MX.7hxG0u7xI6', 1);
```

**Admin Login Credentials:**
- Email: `admin@signly.com`
- Password: `Admin123`

### Option B: Create Admin User in phpMyAdmin

1. Go to phpMyAdmin
2. Select database `signly_db`
3. Select table `users`
4. Click "Insert"
5. Fill in the fields:
   - name: `Administrator` (or any name)
   - email: `admin@signly.com` (or any email)
   - password: Use password_hash() or leave blank for now
   - is_admin: `1` (or check the checkbox)

Then use this PHP to generate a password hash:
```php
echo password_hash('Admin123', PASSWORD_DEFAULT);
```

## Step 3: Access Admin Panel

Once you have an admin account:

1. Go to http://localhost/WebPorg_Signly/login.php
2. Login with admin credentials:
   - Email: `admin@signly.com`
   - Password: `Admin123`
3. After login, go to http://localhost/WebPorg_Signly/admin_chat.php
4. You should see all user conversations

## Make Another User an Admin

To promote an existing user to admin, run this SQL:

```sql
UPDATE users SET is_admin = 1 WHERE email = 'user_email@example.com';
```

Or in phpMyAdmin:
1. Select the user row
2. Edit the record
3. Set `is_admin` to `1`
4. Click Save

## Remove Admin Access

To remove admin privileges:

```sql
UPDATE users SET is_admin = 0 WHERE email = 'admin@signly.com';
```

---

## Access Control

- **Regular users** can only:
  - Use the chat widget on home.php
  - Cannot access admin_chat.php

- **Admin users** can:
  - Access admin_chat.php
  - View all conversations
  - Respond to user messages
  - Still use regular features

---

## Troubleshooting

**Can't access admin_chat.php?**
- Make sure you're logged in as an admin user
- Check that `is_admin = 1` in the database for your user
- If you get redirected to home.php, you're not an admin

**Forgot admin password?**
- Go to phpMyAdmin
- Find the admin user record
- Edit and set a new password hash
- Or delete and recreate the admin user

---

## File Information

**File:** add_admin_role.sql
- Contains SQL to add is_admin field
- Contains SQL to create admin user
- Ready to import or run manually
