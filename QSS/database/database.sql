create database transport;

use transport;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) DEFAULT NULL,
    last_name VARCHAR(100) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    mobile VARCHAR(15) DEFAULT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user'
);

CREATE TABLE route (
    route_id INT AUTO_INCREMENT PRIMARY KEY,
    route_name VARCHAR(100) NOT NULL UNIQUE,
    source_point VARCHAR(100) NOT NULL,
    destination_point VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE schedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    route_id INT NOT NULL,
    stop_name VARCHAR(100) NOT NULL,
    first_bus TIME NOT NULL,
    second_bus TIME NOT NULL,
    third_bus TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_schedule_route
        FOREIGN KEY (route_id)
        REFERENCES route(route_id)
        ON DELETE CASCADE
);

CREATE TABLE vehicle (
    vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_reg_no VARCHAR(20) NOT NULL UNIQUE,
    driver_name VARCHAR(100) NOT NULL,
    joining_date DATE NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    age INT NOT NULL,
    license_no VARCHAR(30) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    book_date DATE NOT NULL,
    pickup_point VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    status TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

