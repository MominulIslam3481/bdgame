CREATE DATABASE IF NOT EXISTS color_game;
USE color_game;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance INT DEFAULT 0,
    referral_code VARCHAR(10),
    referred_by VARCHAR(10)
);