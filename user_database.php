<?php
$servername = "localhost";
$username = "root";
$password = "nc@p12rs00a4";
$dbname1 = "user";

$conn = new mysqli($servername, $username, $password, $dbname1);

$sql ="CREATE DATABASE IF NOT EXISTS $dbname1";
$conn->query($sql);  

$conn->select_db($dbname1);

$sql = "CREATE TABLE IF NOT EXISTS member (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    gmail varchar(255) NOT NULL,
    passwordHash varchar(255) NOT NULL
  )";
$conn->query($sql);  