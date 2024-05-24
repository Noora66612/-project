<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gmail = $_POST['gmail'];
    $raw_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $error = array();

    if (empty($gmail) || empty($raw_password) || empty($confirm_password)){
        array_push($errors,"請輸入所有欄位。");
    }

    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "請輸入有效的郵件地址。");
    }

    if (strlen($raw_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $raw_password)) {
        array_push($errors, "密碼必須包含至少一個英文字母和一個數字，長度超過5。");
    }

    if ($raw_password !== $confirm_password) {
        array_push($errors, "確認密碼與密碼不一致。");
    }

    require_once "user_database.php";
    $sql = "SELECT * FROM member WHERE gmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;

    if ($rowCount > 0) {
        array_push($errors, "帳號已存在，請選擇另一個帳號。");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $salt = bin2hex(random_bytes(16));
        $hashed_password = password_hash($raw_password . $salt, PASSWORD_BCRYPT);

        $sql = "INSERT INTO member (gmail, hashed_password, salt) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $gmail, $hashed_password, $salt);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>註冊成功!</div>";
        } else {
            die("發生錯誤，請稍後再試。");
        }
    }

    $stmt->close();
    $conn->close();
}
?>