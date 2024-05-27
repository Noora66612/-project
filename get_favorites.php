<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "請先登入以查看收藏項目。";
    exit;
}

$user_id = $_SESSION['user_id'];
$sortOrder = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : 'oldesttonewest';

// 連接資料庫
$servername = "localhost";
$username = "root";
$password = "nc@p12rs00a4";
$dbname = "餐廳";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

$orderBy = $sortOrder === 'newesttooldest' ? 'DESC' : 'ASC';

$sql = "SELECT 名單.編號, 名單.圖片, 名單.餐廳名, 名單.地址, 名單.營業時間, 名單.公休日, 名單.電話 
        FROM 名單
        JOIN favorites ON 名單.編號 = favorites.restaurant_id
        WHERE favorites.user_id = ?
        ORDER BY favorites.added_time $orderBy";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="row">';
        echo '    <div class="row-img">';
        echo '       <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
        echo '    </div>';
        echo '    <div class="row-content">';
        echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
        echo '        <div class="opening-hour">';
        echo '            <i class="ri-time-line"></i>';
        echo '            營業時間：<br>' . $row["營業時間"];
        echo '        </div>';
        echo '        <div class="closeday">';
        echo '            <i class="ri-calendar-close-line"></i>';
        echo '            公休日：' . $row["公休日"];
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="row-in">';
        echo '        <div class="row-left">';
        echo '            <div class="phonenum">';
        echo '                <i class="ri-phone-line"></i>';
        echo '                電話：' . $row["電話"];
        echo '            </div>';
        echo '        </div>';
        echo '        <div class="row-right">';
        echo '            <button class="btn1"><i class="ri-heart-fill"></i></button>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "沒有收藏的餐廳";
}
$stmt->close();
$conn->close();
?>
