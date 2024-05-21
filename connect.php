<?php
// 資料庫連接資訊
$servername = "127.0.0.1"; // 主機名稱
$username = "root"; // 使用者名稱
$password = "5253"; // 密碼
$database = "餐廳"; // 資料庫名稱

// 建立資料庫連接
$conn = mysqli_connect($servername, $username, $password, $database);

// 檢查連接是否成功
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// 在這裡可以執行資料庫操作

// 關閉連接
mysqli_close($conn);
?>
