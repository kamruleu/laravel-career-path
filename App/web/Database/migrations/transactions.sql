DROP TABLE IF EXISTS transactions;
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_email VARCHAR(100) NOT NULL,
    category_id INT(11) NOT NULL,
    amount DOUBLE NOT NULL,
    sign INT(1) NOT NULL,
    entry_time DATETIME NOT NULL
);