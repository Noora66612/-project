<?php
session_start();
$_SESSION['gmail'] = '0';
$_SESSION['password'] = '0';
$_SESSION['confirm_password'] = '0';
if(isset($_POST['signup_submit'])){
    insert();
}

function insert(){
    $gmail = $_POST['gmail'];
    $raw_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (strlen($raw_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $raw_password)) {
        echo "<script>alert('密碼必須包含至少一個英文字母和一個數字，長度超過 6。'); window.location.href = 'user.php';</script>";
    }

    if ($raw_password !== $confirm_password) {
        echo "<script>alert('確認密碼與密碼不一致'); window.location.href = 'user.php';</script>";
        return;
    }

    require("user_database.php");
    
    $passwordHash = password_hash($raw_password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM member WHERE gmail = '$gmail'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        echo "<script>alert('帳號已存在。'); window.location.href = 'user.php';</script>";
    }else{
        $sql = "INSERT INTO member (gmail, passwordHash) VALUES ('$gmail', '$passwordHash')";
        $result = mysqli_query($conn, $sql) or die("新增資料失敗，請洽詢相關人員" . mysqli_error($conn));
    
        if ($result) {
        echo "<script>alert('註冊成功，請重新登入，正在回到首頁'); window.location.href = 'user.php';</script>";
        }
    }

    mysqli_close($conn);
}
?>