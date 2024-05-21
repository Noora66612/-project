<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>央央熊食在</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>

<header>
    <a href="home.html" class="logo">央央熊食在</a>
    <ul class="navlist">
        <li class="nav-item">
            <a href=home.html class="nav-link">首頁</a>
        </li>
        <li class="nav-item">
            <a href=all.html class="nav-link">所有餐廳</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              用餐地點
            </a>
            <ul class="dropdown-menu">
              <li><a href=school.html class="dropdown-item">學餐</a></li>
              <li><a href=backdoor.html class="dropdown-item">後門</a></li>
              <li><a href=street.html class="dropdown-item">宵夜街</a></li>
            </ul>
        </li>
    </ul> 

    <div class="nav-right d-flex align-items-center">
        <form class="d-flex align-items-center search-form" style="margin-right: 15px;">
            <form class="d-flex align-items-center search-form" style="margin-right: 15px;">
                <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="button">
                    <i class="ri-search-line"></i>
                </button>
            </form> 
        </form>            
        <a href="#"><i class="ri-heart-line"></i></a>
        <a href="#"><i class="ri-user-line"></i></a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>  
</header>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="close-btn" id="close-btn">&times;</a>
    <a href="home.html">首頁</a>
    <a href=all.html>所有餐廳</a>
    <a href=school.html>學餐</a>
    <a href="backdoor.html">後門</a>
    <a href="street.html">宵夜街</a>
    <a href="#">聯絡我們</a>
</div>

<section class="n-restaurants">
    <div class="center-text">
        <h3>宵夜街餐廳</h3>
    </div> 

    <div class="n-content">
        <?php
            // 連接資料庫
            $servername = "localhost";
            $username = "root";
            $password = "5253";
            $dbname = "餐廳";

            // 建立連線
            $conn = new mysqli($servername, $username, $password, $dbname);

            // 檢查連線是否成功
            if ($conn->connect_error) {
                die("連線失敗: " . $conn->connect_error);
            }

            // 選擇地區為宵夜街的所有餐廳資料
            $sql = "SELECT 編號, 餐廳名, 地址, 營業時間, 電話 FROM 名單 WHERE 地區 = '宵夜街'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <img src="img/' . $row["餐廳名"] . '.jpg" alt="' . $row["餐廳名"] . '">';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="#">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：' . $row["營業時間"];
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="row-in">';
                    echo '        <div class="row-left">';
                    echo '            <div class="phonenum">';
                    echo '                <i class="ri-phone-line"></i>';
                    echo '                電話：' . $row["電話"];
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <div class="row-right">';
                    echo '            <Button onclick="Toggle(this)" class="btn1"><i class="ri-heart-fill"></i></Button>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "0 結果";
            }
            $conn->close();
        ?>
         </div>
    </section>
    <div class="n-btn">
        <a href="#" class="btn">查看所有</a>
    </div>
    <!--- custom js link --->
    <script src="home.js"></script>
</body>
</html>
    