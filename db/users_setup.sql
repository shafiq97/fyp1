-- Add users table to the existing database
USE fyp_malware_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create an index for email lookups
CREATE INDEX idx_email ON users(email);

-- Insert sample user (optional)
-- Password is 'password123' hashed
INSERT INTO users (username, email, password) VALUES 
('Demo User', 'demo@example.com', '$2y$10$8nFE2/0gXoAk5Jb4sK0Zj.LQq0zk7YXuCk5wPUFI0ZugSAx7pQohW');
