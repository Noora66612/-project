<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: home.php");
 } 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    require_once "user_database.php";

    $sql = "SELECT * FROM member WHERE gmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user["hashed_password"])) {
        $_SESSION['user'] = "yes";         
        header("Locatioin: home.php");
        exit();
    }else{
        echo "<script>showModal('帳號或密碼錯誤，請重新嘗試。',false);<script>";
    }

    $stmt->close();
    $conn->close();
}

?>
