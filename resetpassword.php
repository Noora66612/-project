<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit();
}
if (isset($_POST['reset_submit'])) {
    reset();
 } 

 function reset(){
    $gmail = $_POST['gmail'];
    $new_password = $_POST['password'];

    require ("user_database.php");
    if (!$conn) {
        die("數據庫連接失敗: " . mysqli_connect_error());
    }
    $sql_reset = "SELECT * FROM member WHERE gmail = '$gmail'";
    $result = mysqli_query($conn, $sql_reset) or die("查詢失敗，請洽詢問人員");
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        if(strlen($new_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $new_password)){
            echo "<script>alert('密碼必須包含至少一個英文字母和一個數字，長度超過5。'); window.location.href = 'user.php';</script>";
            exit();
        } else {
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $sql_update = "UPDATE member SET passwordHash = '$hashedPassword' WHERE gmail = '$gmail'";
            $update_result = mysqli_query($conn, $sql_update) or die("重設密碼失敗，請洽詢相關人員" . mysqli_error($conn));
            if($update_result){
                echo "<script>alert('密碼重設成功。'); window.location.href = 'user.php';</script>";
            }else {
                echo "<script>alert('密碼重設失敗，請重試。'); window.location.href = 'user.php';</script>";
            }
        }
    } else {
        echo "<script>alert('帳號不存在！'); window.location.href = 'user.php';</script>";
    }

    mysqli_close($conn);
}
?>