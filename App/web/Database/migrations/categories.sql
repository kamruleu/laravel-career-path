DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
INSERT INTO `categories` (`id`, `name`) VALUES (NULL, 'Deposit money'), (NULL, 'Withdraw money'), (NULL, 'Transfer money'), (NULL, 'Receive money');