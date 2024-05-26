<?php
$servername = "localhost";
$username = "root"; 
$password = "nc@p12rs00a4"; 
$dbname = "餐廳"; 

$conn1 = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn1) {
    die("连接失败: " . mysqli_connect_error());
}

$dbname2 = "user";

$conn2 = new mysqli($servername, $username, $password, $dbname2);
if (!$conn2) {
    die("连接失败: " . mysqli_connect_error());
}
$dbname3 = "favorite_restaurants";

$conn3 = mysqli_connect($servername, $username, $password, $dbname3);
if (!$conn3) {
    die("连接失败: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $account = $_POST['account']; // 使用者帳號

    // 根據使用者帳號從 'user' 資料庫的 'member' 表中獲取對應的用戶 ID
    $stmt = $conn2->prepare("SELECT id FROM user.member WHERE account = ?");
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    $restaurant_id = $_POST['restaurant_id'];

    // Get restaurant details from '名單' table
    $stmt = $conn1->prepare("SELECT 餐廳名 FROM 名單 WHERE 編號 = ?");
    $stmt->bind_param("i", $restaurant_id);
    $stmt->execute();
    $stmt->bind_result($restaurant_name);
    $stmt->fetch();
    $stmt->close();

    if ($action === 'add') {
        $stmt = $conn3->prepare("INSERT INTO favorites (user_id, restaurant_id, restaurant_name) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_id, $restaurant_id, $restaurant_name);
        $stmt->execute();
        $stmt->close();
    } elseif ($action === 'remove') {
        $stmt = $conn3->prepare("DELETE FROM favorites WHERE user_id = ? AND restaurant_id = ?");
        $stmt->bind_param("ii", $user_id, $restaurant_id);
        $stmt->execute();
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $account = $_GET['account']; // 使用者帳號

    // 根據使用者帳號從 'user' 資料庫的 'member' 表中獲取對應的用戶 ID
    $stmt = $conn2->prepare("SELECT id FROM user.member WHERE account = ?");
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn3->prepare("SELECT * FROM favorites WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $favorites = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    echo json_encode($favorites);
}

$conn->close();
?>