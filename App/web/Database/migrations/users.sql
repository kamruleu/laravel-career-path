DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, 'Kamrul Islam', 'kamrul@gmail.com', '123456');