<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
 }

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $gmail = $_POST['gmail'];
    $new_password = $_POST['password'];

    require_once "user_database.php";

    if(strlen($new_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $new_password)){
        echo "<script>showModal('密碼必須包含至少一個英文字母和一個數字，長度超過5。', false);</script>";
        exit();
    } 

    $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

    $sql = "UPDATE member SET hashed_password = ? WHERE gmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $gmail);

    if ($stmt->execute()) {
        echo "<script>showModal('密碼重設成功。', true);</script>";
    } else {
        echo "<script>showModal('密碼重設失敗：" . $conn->error . "', false);</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
