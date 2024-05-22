<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
    $username = "jennifer";
    $password = "jennifer0216";
    $dbname = "user";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("連接資料庫失敗： ". $conn->connect_error);
    } 
    
    $gmail = $conn->real_escape_string($_POST['gmail']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM member WHERE gmail = ?");
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();

        if (password_verify($password . $row['salt'], $row['hashed_password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_account'] = $row['account'];            
            echo "<script>showModal('登入成功，歡迎回來 " . $row['account'] . "', true);</script>";
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
