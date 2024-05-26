<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $gmail = $_POST['gmail'];
    $new_password = $_POST['password'];

    require ("user_database.php");

    $sql = "SELECT * FROM member WHERE gmail = '$gmail'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        if(strlen($new_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $new_password)){
            echo "<script>alert('密碼必須包含至少一個英文字母和一個數字，長度超過5。'); </script>";
            exit();
        }else{
            $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
            $sql_reset = "UPDATE member SET passwordHash = $hashedPassword WHERE gmail = '$gmail'";
            mysqli_query($conn, $sql);
            echo "<script>alert('密碼重設成功。'); window.location.href = 'user.html';</script>";
        }
    } else {
        echo "<script>alert('密碼重設失敗。'); window.location.href = 'user.html';</script>";
    }

    $conn->close();
}
?>