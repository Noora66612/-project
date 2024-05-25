<?php

session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
 } 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    require_once "create_db.php";

    $sql = $conn->prepare("SELECT * FROM member WHERE gmail = ?");
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();

        if (password_verify($password . $row['salt'], $row['hashed_password'])) {
            $_SESSION['user_id'] = $row['id'];
            echo "<script>showModal('登入成功，歡迎回來 " . $row['account'] . "', true);</script>";
            header("Locatioin: home.php");
            exit();
        }else{
            echo "<script>showModal('密碼錯誤，請重新嘗試。',false);<script>";
        }
    }else{
        echo "<script>showModal('帳號不存在，請註冊帳號。',false;</script>";
    }

    $stmt->close();
    $conn->close();
}

?>
