<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}
if (isset($_POST['login_submit'])) {
    login();
} 

function login(){
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    require("user_database.php");
    $sql_login = "SELECT * FROM member WHERE gmail = '$gmail'";
    $result = mysqli_query($conn, $sql_login) or die("查詢失敗，請洽詢相關人員");
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($user) {
        if (!password_verify($password, $user["passwordHash"])) {
            session_start();
            $_SESSION["user"] = "yes";
            echo "<script>alert('登入成功'); window.location.href = 'home.php';</script>";
        } else {
            echo "<script>alert('密碼錯誤！'); window.location.href = 'user.php';</script>";
        }
    } else {
        echo "<script>alert('帳號不存在！'); window.location.href = 'user.php';</script>";
    }
    mysqli_close($conn);
}
?>
