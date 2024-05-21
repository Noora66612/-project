<?php
header("Content-Type: application/json; charset=UTF-8");

// 連接到資料庫
$servername = "localhost";
$username = "root"; // 更改為您的數據庫用戶名
$password = "5253"; // 更改為您的數據庫密碼
$dbname = "餐廳"; // 資料庫名稱

$conn = mysqli_connect($servername, $username, $password, $dbname);

// 檢查連接
if (!$conn) {
    die(json_encode(array("error" => "連接失敗: " . mysqli_connect_error())));
}

// 從資料庫中獲取數據
$sql = "SELECT * FROM 名單";
$result = mysqli_query($conn, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

mysqli_close($conn);
echo json_encode($data);
?>
