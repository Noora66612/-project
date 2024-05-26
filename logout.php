<?php
session_start();
if(empty($_SESSION["user"])){
    header('Location: user.php');
}
require("user_database.php");
session_destroy();
echo "<script>alert(' 登出成功。'); window.location.href = 'user.php';</script>";
exit();

?>