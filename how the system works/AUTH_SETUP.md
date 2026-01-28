# Signly Login & Registration System Setup

## Prerequisites
- XAMPP installed and running
- PHP 7.2 or higher
- MySQL/MariaDB

## Setup Instructions

### 1. Start XAMPP
- Open XAMPP Control Panel
- Start **Apache** and **MySQL**

### 2. Create Database

#### Option A: Using phpMyAdmin
1. Open your browser and go to `http://localhost/phpmyadmin`
2. Click on "SQL" tab
3. Copy and paste the contents of `database.sql`
4. Click "Go" to execute

#### Option B: Using MySQL Command Line
1. Open Command Prompt
2. Navigate to your MySQL bin folder: `cd "C:\xampp\mysql\bin"`
3. Run: `mysql -u root -p < path/to/database.sql`
4. Press Enter (no password by default)

### 3. File Structure
Your project should look like this:
```
WebPorg_Signly/
├── login.php (NEW - Landing page)
├── logout.php (NEW - Logout handler)
├── register.php (NEW - Registration handler)
├── index.html (Main page - requires session)
├── sign.php (Contact form)
├── css/
│   ├── style.css
│   ├── responsive.css
│   └── auth.css (NEW - Login/Register styling)
├── js/
│   └── script.js
├── pics/
├── png/
├── database.sql (NEW - Database schema)
└── script/
```

### 4. Database Details
- **Database Name:** `signly_db`
- **Database User:** `root`
- **Database Password:** (empty by default)
- **Table:** `users` with columns: id, name, email, password, created_at, updated_at

### 5. How It Works

#### User Registration Flow:
1. User fills form on login.php → Register tab
2. Form submits to `register.php`
3. Password is hashed using `password_hash()` (bcrypt)
4. User data saved to database
5. Session created automatically
6. Redirect to `index.html`

#### User Login Flow:
1. User enters email and password
2. System checks database for matching email
3. Password verified using `password_verify()`
4. Session created with user data
5. Redirect to `index.html`

#### Logout Flow:
1. Click logout link/button
2. Redirects to `logout.php`
3. Session destroyed
4. Redirected back to `login.php`

### 6. Session Security Features
- Passwords hashed with bcrypt
- Prepared statements prevent SQL injection
- Email validation
- Password confirmation on registration
- Minimum password length (6 characters)
- Duplicate email prevention
- Session-based authentication

### 7. Update index.html to Show User Info

Add this at the top of `index.html` after opening `<body>`:
```php
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
```

Add this in the header (in the right-controls div or create a user menu):
```html
<div class="user-menu">
    <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>
```

### 8. Environment Variables (Optional - For Production)
For production, create a `config.php`:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'signly_db');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
```

### 9. Testing the System

1. Go to `http://localhost/WebPorg_Signly/login.php`
2. Click **Register** tab
3. Fill in the registration form
4. Click **Register**
5. You should be logged in and redirected to index.html
6. To logout, click the logout button

Test login:
1. Go back to `http://localhost/WebPorg_Signly/login.php`
2. Enter your email and password
3. Click **Login**

### 10. Common Issues & Solutions

**Issue: "Database connection failed"**
- Make sure MySQL is running in XAMPP
- Check database credentials in login.php and register.php
- Verify `signly_db` database exists

**Issue: "Email already registered"**
- The email is already in the database
- Use a different email address

**Issue: "Invalid email or password"**
- Check email and password are correct
- Ensure password is at least 6 characters

**Issue: Can't login after registration**
- Check browser cookies are enabled
- Clear browser cache and try again
- Verify session directory has write permissions

### 11. Security Best Practices for Production

1. **Move database credentials to environment variables** or separate config file
2. **Add email verification** for new accounts
3. **Implement password reset** functionality
4. **Add rate limiting** for login attempts
5. **Use HTTPS** (SSL certificate)
6. **Sanitize all user inputs**
7. **Add CSRF tokens** to forms
8. **Implement account lockout** after failed attempts
9. **Add two-factor authentication** (2FA)
10. **Keep passwords in database only** (never in session without hashing)

### 12. Next Steps

- Customize the auth pages styling to match your brand
- Add remember me functionality
- Implement password reset via email
- Add user profile page
- Add social login (Google, Facebook, etc.)
- Implement email verification on registration

---

Need help? Check the PHP error logs at: `C:\xampp\apache\logs\error.log`
