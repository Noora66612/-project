<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
 }
    
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gmail = $_POST['gmail'];
    $raw_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $error_message = "";

    if(!filter_var($gmail, FILTER_VALIDATE_EMAIL)){
        $errror_message = "請輸入有效的郵件地址。<br>";
    }

    if(strlen($raw_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $raw_password)){
        $error_message .= "密碼必須包含至少一個英文字母和一個數字，長度超過5。<br>";
    }

    if($raw_password !== $confirm_password){
        $error_message .= "確認密碼與密碼不一致。<br>";
    }

    require_once "create_db.php";
    $stmt = $conn->prepare("SELECT * FROM member WHERE gmail = ?");
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
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


