CREATE DATABASE wallet_platform;
USE wallet_platform;

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password_hash VARCHAR(255) NOT NULL,
	created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE wallets (
	id INT PRIMARY KEY AUTO_INCREMENT,
	users_id INT NOT NULL,
	budget DECIMAL(12,2) NOT NULL,
	created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (users_id) REFERENCES users(id)
);

CREATE TABLE categories (
	id INT PRIMARY KEY AUTO_INCREMENT,
	wallet_id INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	FOREIGN KEY (wallet_id) REFERENCES wallets(id)
);

CREATE TABLE expenses (
	id INT PRIMARY KEY AUTO_INCREMENT,
	wallet_id INT NOT NULL,
	category_id INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	montant DECIMAL(12,2) NOT NULL,
	FOREIGN KEY (wallet_id) REFERENCES wallets(id),
	FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE transactions (
	id INT PRIMARY KEY AUTO_INCREMENT,
	wallet_id INT NOT NULL,
	category_id INT NOT NULL,
	expense_id INT NOT NULL,
	montant DECIMAL(12,2) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (wallet_id) REFERENCES wallets(id),
	FOREIGN KEY (category_id) REFERENCES categories(id),
	FOREIGN KEY (expense_id) REFERENCES expenses(id)
);