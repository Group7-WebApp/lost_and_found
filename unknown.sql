CREATE DATABASE IF NOT EXISTS lost_and_found;
USE lost_and_found;

/*Drop old tables if they exist*/
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS users;

/* Create users table*/
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

/*Create items table*/
CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    status ENUM('lost', 'found') DEFAULT 'lost',
    image_path VARCHAR(255),
    claimed BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

/*Insert a test user*/
INSERT INTO users (id, name, email) VALUES (1, 'Test User', 'test@example.com');

