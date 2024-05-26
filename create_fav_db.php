<?php
$servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname2 = "favorites"; 
            
            $conn = new mysqli($servername, $username, $password);

            $sql ="CREATE DATABASE IF NOT EXISTS $dbname2";
            $conn->query($sql);  
            
            $conn->select_db($dbname2);
           $sql = "CREATE TABLE favorites (
                id INT AUTO_INCREMENT PRIMARY KEY,
                account VARCHAR(255) NOT NULL,
                restaurant_id INT NOT NULL,
                name VARCHAR(255) NOT NULL,
                img VARCHAR(255) NOT NULL,
                hours VARCHAR(255) NOT NULL,
                timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $conn->query($sql);  
