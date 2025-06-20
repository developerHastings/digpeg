CREATE DATABASE crosschain_bridge;
USE crosschain_bridge;

CREATE TABLE project_parameters (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  value VARCHAR(255) NOT NULL
);

CREATE TABLE competitors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  users INT NOT NULL,
  transactions INT NOT NULL,
  volume INT NOT NULL
);
