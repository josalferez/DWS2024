CREATE DATABASE IF NOT EXISTS reservas;
USE reservas;

-- Tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    realname VARCHAR(100) NOT NULL,
    type TINYINT(1) NOT NULL DEFAULT 1 CHECK (type IN (0,1)) -- 0 = admin, 1 = user
);

-- Tabla de recursos
CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(100) NOT NULL,
    image VARCHAR(255)
);

-- Tabla de tramos horarios
CREATE TABLE time_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);

-- Tabla de reservas
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_resource INT NOT NULL,
    id_user INT NOT NULL,
    id_time_slot INT NOT NULL,
    date DATE NOT NULL,
    remarks TEXT,
    FOREIGN KEY (id_resource) REFERENCES resources(id) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_time_slot) REFERENCES time_slots(id) ON DELETE CASCADE,
    UNIQUE (id_resource, id_time_slot, date) -- Evita reservas duplicadas para el mismo recurso, tramo y fecha
);
