# Web-Technology-Project-ecocharge_hub
EcoCharge Hub A web-based project designed to facilitate environmental management and supervision tasks. Built using PHP, HTML, CSS, and JavaScript, it follows the Model-View-Controller (MVC) architecture for better code organization and scalability.


USE ecocharge_hub;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique user ID
    name VARCHAR(255) NOT NULL,              -- User's full name
    email VARCHAR(255) NOT NULL UNIQUE,      -- User's email (should be unique)
    phone VARCHAR(20) NOT NULL,              -- User's phone number
    username VARCHAR(50) NOT NULL UNIQUE,    -- Username for login (should be unique)
    password VARCHAR(255) NOT NULL,          -- Hashed password
    user_type ENUM('Environmentalist', 'Supervisor') NOT NULL,  -- User role
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Record creation time
);

##login:
urmi Urmi@2025
kuratoliev

##Links:

http://127.0.0.1/Projects/Web-Technology-Project-ecocharge_hub/ecocharge_hub/
http://127.0.0.1/Projects/Web-Technology-Project-ecocharge_hub/ecocharge_hub/view/registration.php
