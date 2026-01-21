CREATE DATABASE luxe;
USE luxe;

CREATE TABLE products (
  id INT PRIMARY KEY,
  name VARCHAR(255),
  price DECIMAL(10,2),
  stock INT
);

INSERT INTO products VALUES
(1,'Leather Messenger Bag',995,10),
(2,'Aviator Sunglasses',220,20);

CREATE TABLE coupons (
  code VARCHAR(50) PRIMARY KEY,
  discount_type ENUM('percent','fixed'),
  discount_value DECIMAL(10,2),
  active BOOLEAN DEFAULT 1
);

INSERT INTO coupons VALUES
('LUXE10','percent',10,1),
('WELCOME50','fixed',50,1);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  stripe_session_id VARCHAR(255),
  email VARCHAR(255),
  total DECIMAL(10,2),
  status VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
