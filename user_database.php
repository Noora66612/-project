<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連接失敗: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS `member` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `gmail` VARCHAR(255) NOT NULL,
    `passwordHash` VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    die("創建數據表失敗: " . $conn->error);

}
?>
