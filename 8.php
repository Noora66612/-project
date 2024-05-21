
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

// 隨機挑選8筆資料
$sql = "SELECT * FROM 名單 WHERE 地區='後門' ORDER BY RAND() LIMIT 8";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 輸出資料
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row">';
        echo '    <div class="row-img">';
        echo '        <img src="img/' . $row["餐廳名"] . '.jpg" alt="' . $row["餐廳名"] . '">';
        echo '    </div>';
        echo '    <div class="row-content">';
        echo '        <a href="#">' . $row["餐廳名"] . '</a>';
        echo '        <div class="opening-hour">';
        echo '            <i class="ri-time-line"></i>';
        echo '            營業時間：' . $row["營業時間"];
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
        echo '            <Button onclick="Toggle(this)" class="btn1"><i class="ri-heart-fill"></i></Button>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "沒有餐廳數據";
}

// 關閉連接
mysqli_close($conn);
?>