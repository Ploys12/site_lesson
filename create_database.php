-- Создаем новую базу данных
CREATE DATABASE IF NOT EXISTS user_db;

-- Выбираем созданную базу данных
USE user_db;

-- Создаем таблицу для пользователей
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
