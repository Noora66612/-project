<?php
session_start();
header('Content-Type: application/json');

// 檢查用戶是否已經登入
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// 連接到資料庫
$servername = "localhost";
$username = "root";  
$password = "nc@p12rs00a4";      
$dbname = "user";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 從 session 中獲取用戶 ID
$user_id = $_SESSION['user_id'];

// 查詢用戶帳號
$sql = "SELECT account FROM member WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($account);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($account) {
    echo json_encode(['account' => $account]);
} else {
    echo json_encode(['error' => 'Account not found']);
}
?>