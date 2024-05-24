<?php
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
    $raw_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $email_parts = explode('@', $gmail);
    $account = $conn->real_escape_string($email_parts[0]);

    $error_message = "";

    // 驗證電子郵件地址
    if(!filter_var($gmail, FILTER_VALIDATE_EMAIL)){
        $errror_message = "請輸入有效的郵件地址。<br>";
    }

    // 驗證密碼
    if(strlen($raw_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $raw_password)){
        $error_message .= "密碼必須包含至少一個英文字母和一個數字，長度超過5。<br>";
    }

    // 確認密碼匹配
    if($raw_password !== $confirm_password){
        $error_message .= "確認密碼與密碼不一致。<br>";
    }

    // 檢查帳號是否已存在
    $stmt = $conn->prepare("SELECT * FROM member WHERE account = ? LIMIT 1");
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $error_message .= "帳號已存在，請選擇另一個帳號。<br>";
    }

    if(!empty($error_message)){
        echo "<script>showModal('$error_message', false);</script>";
    }else{
        $hashedPassword = password_hash($raw_password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO member (gmail, account, hashed_password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $gmail, $account, $hashedPassword);

        if($stmt->execute() === TRUE){
            echo "<script>showModal('註冊成功，您的帳號為 $account', true);</script>";
        } else {
            echo "<script>showModal('註冊失敗： " . $conn->error . "', false);</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>


