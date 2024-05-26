<?php
$servername = "localhost";
$username = "root"; 
$password = "nc@p12rs00a4"; 
$dbname = "餐廳"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $餐廳編號 = intval($_POST['餐廳編號']);
    $評論內容 = $_POST['評論內容'];
    $sql = "INSERT INTO 評論 (餐廳編號, 評論內容) VALUES ($餐廳編號, '$評論內容')";
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        $result = mysqli_query($conn, "SELECT 評論內容, 評論時間 FROM 評論 WHERE id = $last_id");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array(
                "status" => "success",
                "評論內容" => $row['評論內容'],
                "評論時間" => date("Y 年 m 月", strtotime($row['評論時間']))
            ));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "評論失敗: " . mysqli_error($conn)));
    }
}

mysqli_close($conn);
?>
