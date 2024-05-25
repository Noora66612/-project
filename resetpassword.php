<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $gmail = $conn->real_escape_string($_POST['gmail']);
    $new_password = $_POST['password'];

    require_once "create_db.php";

    if(strlen($new_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $new_password)){
        echo "<script>showModal('密碼重設失敗', false);</script>";
    } else {
        $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE member SET hashed_password = ? WHERE gmail = ?");
        $stmt->bind_param("ss", $hashedPassword, $gmail);

        if($stmt->execute() === TRUE){
            echo "<script>showModal('密碼重設成功。', true);</script>";
        } else {
            echo "<script>showModal('密碼重設失敗： " . $conn->error . "', false);</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
