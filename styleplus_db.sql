CREATE DATABASE styleplus_db;
USE styleplus_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100),
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  phone VARCHAR(20),
  role ENUM('user', 'admin') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  price DECIMAL(10,2),
  image VARCHAR(255)
);

INSERT INTO products (name, description, price, image) VALUES
('T-Shirt Classic', 'Simple cotton T-shirt in black.', 19.99, 'assets/uploads/tshirt_black.jpg'),
('Denim Jacket', 'Blue denim jacket with modern cut.', 59.99, 'assets/uploads/denim_jacket.jpg'),
('Hoodie Grey', 'Comfortable grey hoodie for casual wear.', 39.99, 'assets/uploads/hoodie_grey.jpg'),
('White Cotton Shirt', 'Classic white cotton shirt with tailored fit.', 29.99, 'assets/uploads/white_shirt.jpg'),
('Slim Fit Chinos', 'Beige slim fit chinos perfect for everyday wear.', 49.99, 'assets/uploads/slim_chinos.jpg'),
('Black Leather Jacket', 'Premium faux leather biker jacket.', 89.99, 'assets/uploads/leather_jacket.jpg'),
('Oversized Hoodie', 'Casual oversized hoodie in pastel colors.', 39.99, 'assets/uploads/oversized_hoodie.jpg'),
('Denim Shorts', 'High-waist denim shorts with raw hem.', 34.99, 'assets/uploads/denim_shorts.jpg'),
('Linen Summer Dress', 'Lightweight linen dress for summer breeze.', 59.99, 'assets/uploads/linen_dress.jpg'),
('Knitted Cardigan', 'Soft knitted cardigan for layering in chilly weather.', 64.99, 'assets/uploads/knitted_cardigan.jpg');