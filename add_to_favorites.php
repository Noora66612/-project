<?php
session_start(); // 启动会话，确保用户已登录

// 检查用户是否登录，如果没有登录，将用户重定向到登录页面
if (!isset($_SESSION['user_id'])) {
    // 重定向到登录页面
    header("Location: user.html");
    exit;
}

// 连接数据库
$servername = "localhost";
$username = "root"; 
$password = "nc@p12rs00a4";
$dbname = "餐廳";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 处理用户点击收藏按钮的逻辑
if (isset($_POST['restaurant_id'])) {
    $user_id = $_SESSION['user_id']; // 从会话中获取用户ID
    $restaurant_id = $_POST['restaurant_id'];

    // 将收藏项插入到数据库中
    $sql = "INSERT INTO favorites (user_id, restaurant_id) VALUES ('$user_id', '$restaurant_id')";

}

// 关闭数据库连接
$conn->close();
?>
