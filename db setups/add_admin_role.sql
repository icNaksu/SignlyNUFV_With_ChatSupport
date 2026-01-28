-- Add is_admin field to users table if it doesn't exist
ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT 0;

-- Create an admin user (modify these credentials as needed)
-- Email: admin@signly.com
-- Password: Admin123
INSERT INTO users (name, email, password, is_admin) VALUES 
('Administrator', 'admin@signly.com', '$2y$10$0p/7BbM3/NG.l5SN/4I1mO.vEXP3Xt3rGNhUV7C6MX.7hxG0u7xI6', 1)
ON DUPLICATE KEY UPDATE is_admin = 1;

-- Add another admin user
-- Replace 'Another Admin', 'admin2@example.com', and 'YOUR_PASSWORD' with your values
-- To hash password, use: password_hash('YourPassword', PASSWORD_DEFAULT) in PHP
-- Or visit: https://www.tools.geekboots.com/bcrypt-hash
INSERT INTO users (name, email, password, is_admin) VALUES 
('Another Admin', 'admin2@example.com', 'PASTE_YOUR_PASSWORD_HASH_HERE', 1)
ON DUPLICATE KEY UPDATE is_admin = 1;
