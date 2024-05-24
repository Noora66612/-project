<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
    $username = "jennifer";
    $password = "jennifer0216";
    $dbname = "user";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("連接資料庫失敗： ". $conn->connect_error);
    }

    $gmail = $conn->real_escape_string($_POST['gmail']);
    $new_password = $_POST['password'];

    if(strlen($new_password) <= 5 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)/", $new_password)){
        echo "<script>showModal('密碼重設失敗', false);</script>";
    } else {
        $stmt = $conn->prepare("UPDATE member SET hashed_password = ? WHERE gmail = ?");
        $stmt->bind_param("ss", $hashedPassword, $gmail);

        $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

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
