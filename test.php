<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>央央熊食在</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" 
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <a href="#" class="logo">央央熊食在</a>
        <ul class="navlist">
            <li class="nav-item"><a href="#" class="nav-link">首頁</a></li>
            <li class="nav-item"><a href="#" class="nav-link">所有餐廳</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">用餐地點</a>
                <ul class="dropdown-menu">
                  <li><a href="#" class="dropdown-item">學餐</a></li>
                  <li><a href="#" class="dropdown-item">後門</a></li>
                  <li><a href="#" class="dropdown-item">宵夜街</a></li>
                </ul>
            </li>
        </ul> 
        <div class="nav-right">
            <a href="#"><i class="ri-search-line"></i></a>
            <a href="#"><i class="ri-heart-line"></i></a>
            <a href="user.html"><i class="ri-user-line"></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>  
    </header>
    
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" id="close-btn">&times;</a>
        <a href="#">首頁</a>
        <a href="#">所有餐廳</a>
        <a href="#">學餐</a>
        <a href="#">後門</a>
        <a href="#">宵夜街</a>
        <a href="#">聯絡我們</a>
    </div>

    <!-- 每日推薦 -->
    <section class="recs">
        <div class="center-text">
            <h3>每日推薦</h3>
        </div> 
        <div class="n-content">
            <?php
            // 连接到数据库
            $servername = "localhost";
            $username = "root"; 
            $password = "5253"; 
            $dbname = "餐廳"; 

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // 检查连接
            if (!$conn) {
                die("连接失败: " . mysqli_connect_error());
            }

            // 从数据库中获取每日推荐的餐厅数据
            $sql = "SELECT 餐廳名, 地址, 營業時間 FROM 名單 WHERE 營業時間 LIKE '%推薦%'"; // 假设有个字段标记推荐
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <img src="img/' . $row["餐廳名"] . '.jpg" alt="' . $row["餐廳名"] . '">';
                    echo '    </div>';
                    echo '    <a href="#">' . $row["餐廳名"] . '</a>';
                    echo '    <div class="opening-hour">';
                    echo '        <i class="ri-time-line"></i>';
                    echo '        營業時間：' . $row["營業時間"];
                    echo '    </div>';
                    echo '    <div class="row-in">';
                    echo '        <div class="row-left">';
                    echo '            <div class="類型">';
                    echo '                <i class="ri-restaurant-2-line"></i>';
                    echo '                鹹食、甜點';
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <div class="row-right">';
                    echo '            <Button onclick="Toggle()" id="btnn1" class="btn1"><i class="ri-heart-fill"></i></Button>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "沒有每日推薦的餐廳";
            }

            mysqli_close($conn);
            ?>
        </div>
    </section>

    <!-- 所有餐廳 -->
    <section class="n-restaurants">
        <div class="center-text">
            <h3>所有餐廳</h3>
        </div> 
        <div class="n-content">
            <?php
            // 重新连接到数据库以获取所有餐厅数据
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // 检查连接
            if (!$conn) {
                die("连接失败: " . mysqli_connect_error());
            }

            // 从数据库中获取所有餐厅数据
            $sql = "SELECT 餐廳名, 地址, 營業時間 FROM 名單";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <img src="img/' . $row["餐廳名"] . '.jpg" alt="' . $row["餐廳名"] . '">';
                    echo '    </div>';
                    echo '    <a href="#">' . $row["餐廳名"] . '</a>';
                    echo '    <div class="opening-hour">';
                    echo '        <i class="ri-time-line"></i>';
                    echo '        營業時間：' . $row["營業時間"];
                    echo '    </div>';
                    echo '    <div class="row-in">';
                    echo '        <div class="row-left">';
                    echo '            <div class="類型">';
                    echo '                <i class="ri-restaurant-2-line"></i>';
                    echo '                鹹食、甜點';
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <div class="row-right">';
                    echo '            <Button onclick="Toggle()" id="btnn1" class="btn1"><i class="ri-heart-fill"></i></Button>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "沒有餐廳數據";
            }

            mysqli_close($conn);
            ?>
        </div>
    </section>

    <!-- Custom JS -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>
