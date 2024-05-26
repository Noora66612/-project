<?php
session_start();
if (isset($_POST['login_submit'])) {
    login();
 } 

function login(){
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    require("user_database.php");
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql_login = "SELECT * FROM member WHERE gmail = '$gmail' AND passwordHash = '$password_hash'";
    $result = mysqli_query($conn, $sql_login) or die("查詢失敗，請洽詢相關人員");
    
    if($result){
        $_SESSION['user_id']=$sql_login['id'];
        echo "<script>alert('登入成功'); window.location.href = 'home.html';</script>";
    } else {
        echo "<script>alert('密碼錯誤！'); window.location.href = 'user.html';</script>";
    }
    
    mysqli_close($conn);

}
?>