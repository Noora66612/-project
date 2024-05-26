<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
    <title>央央熊食在</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <!-- box-icon link -->
    <link rel="stylesheet" 
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- remix-icons link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>
    
    <!-- google fonts link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
</head>
<body>
 
    <!--- header --->
    <header>
        <a href="#" class="logo">央央熊食在</a>
        <ul class="navlist">
            <li class="nav-item">
                <a href=home.php class="nav-link">首頁</a>
            </li>
            <li class="nav-item">
                <a href=all.php class="nav-link">所有餐廳</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  用餐地點
                </a>
                <ul class="dropdown-menu">
                  <li><a href=school.php class="dropdown-item">學餐</a></li>
                  <li><a href=backdoor.php class="dropdown-item">後門</a></li>
                  <li><a href=street.php class="dropdown-item">宵夜街</a></li>
                </ul>
            </li>
        </ul> 
        <div class="nav-right d-flex align-items-center">
        <form class="d-flex align-items-center search-form" style="margin-right: 15px;" action="search.php" method="get">
            <input class="form-control me-2 search-input" type="search" name="query" placeholder="搜尋" aria-label="Search">
                <button class="search-btn" type="button">
                     <i class="ri-search-line"></i>
                </button>
        <!-- 新增一個隱藏的提交按鈕 -->
                <button type="submit" style="display: none;" aria-hidden="true"></button>
                        </form>            
            <a href=myfavfix.php><i class="ri-heart-line"></i></a>
            <a href=user.html><i class="ri-user-line"></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>  
    </header>
    <!--- sidebar --->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" id="close-btn">&times;</a>
        <a href=home.php>首頁</a>
        <a href=all.php>所有餐廳</a>
        <a href=school.php>學餐</a>
        <a href="backdoor.php">後門</a>
        <a href="street.php">宵夜街</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal">聯絡我們</a>   
    </div>
    
  <!--- 每日推薦 --->
  <section class="recs">
        <div class="center-text">
            <h3><i class="ri-lightbulb-line" style="margin-right: 5px;"></i>每日推薦</h3>
        </div>  
         <div class="n-content">
             <?php
             // 连接到数据库
             $servername = "localhost";
             $username = "root"; 
             $password = "nc@p12rs00a4"; 
             $dbname = "餐廳"; 

             $conn = mysqli_connect($servername, $username, $password, $dbname);

             if (!$conn) {
                 die("连接失败: " . mysqli_connect_error());
             }

             // 从数据库中選8個餐廳在每日推薦中呈現
             $sql = "SELECT * FROM 名單 ORDER BY RAND() LIMIT 3";
             $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：<br>' . $row["營業時間"];
                    echo '        </div>';
                    echo '        <div class="closeday">';
                    echo '            <i class="ri-calendar-close-line"></i>';
                    echo '            公休日：' . $row["公休日"];
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
                    echo '            <button onclick="addToFavorites('.$row['編號'].')" class="btn1"><i class="ri-heart-fill"></i></button>';
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
        </div>
    </section>
      <!--- 所有餐廳 --->
      <section class="n-restaurants">
        <div class="center-text">
        <h3><i class="ri-restaurant-line" style="margin-right: 10px;"></i>所有餐廳</h3>
        </div> 
        <div class="n-content">
            <?php
            // 连接到数据库
            $servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname = "餐廳"; 
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // 检查连接
            if (!$conn) {
                die("连接失败1: " . mysqli_connect_error());
            }
            // 从数据库中選8個餐廳在所有餐廳中呈現
            $sql = "SELECT * FROM 名單 ORDER BY RAND() LIMIT 8";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：<br>' . $row["營業時間"];
                    echo '        </div>';
                    echo '        <div class="closeday">';
                    echo '            <i class="ri-calendar-close-line"></i>';
                    echo '            公休日：' . $row["公休日"];
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
                    echo '            <button onclick="addToFavorites('.$row['編號'].')" class="btn1"><i class="ri-heart-fill"></i></button>';
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
    <div class="n-btn">
        <a href=all.php class="btn">查看所有</a>
    </div>
    <!--- 後門餐廳 --->
    <section class="n-restaurants">
        <div class="center-text">
        <h3><i class="ri-restaurant-line" style="margin-right: 10px;"></i>後門餐廳</h3>
        </div> 
        <div class="n-content">
            <?php
            // 连接到数据库
            $servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname = "餐廳"; 
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // 检查连接
            if (!$conn) {
                die("连接失败2: " . mysqli_connect_error());
            }
            // 从数据库中選8個餐廳且地區=後門的資料在後門餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='後門' ORDER BY RAND() LIMIT 8";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '       <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：<br>' . $row["營業時間"];
                    echo '        </div>';
                    echo '        <div class="closeday">';
                    echo '            <i class="ri-calendar-close-line"></i>';
                    echo '            公休日：' . $row["公休日"];
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
                    echo '            <button onclick="addToFavorites('.$row['編號'].')" class="btn1"><i class="ri-heart-fill"></i></button>';
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
    <div class="n-btn">
        <a href=backdoor.php class="btn">查看所有</a>
    </div>
    <!--- 宵夜街餐廳 --->
    <section class="n-restaurants">
        <div class="center-text">
        <h3><i class="ri-restaurant-line" style="margin-right: 10px;"></i>宵夜街餐廳</h3>
        </div> 
        <div class="n-content">
            <?php
            // 连接到数据库
            $servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname = "餐廳"; 
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // 检查连接
            if (!$conn) {
                die("连接失败3: " . mysqli_connect_error());
            }
            // 从数据库中選8個餐廳且地區=宵夜街的資料在宵夜街餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='後門' ORDER BY RAND() LIMIT 8";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：<br>' . $row["營業時間"];
                    echo '        </div>';
                    echo '        <div class="closeday">';
                    echo '            <i class="ri-calendar-close-line"></i>';
                    echo '            公休日：' . $row["公休日"];
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
                    echo '            <button onclick="addToFavorites('.$row['編號'].')" class="btn1"><i class="ri-heart-fill"></i></button>';
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
    <div class="n-btn">
        <a href=street.php class="btn">查看所有</a>
    </div>
    <!--- 學餐餐廳 --->
    <section class="n-restaurants">
        <div class="center-text">
        <h3><i class="ri-restaurant-line" style="margin-right: 10px;"></i>學餐</h3>
        </div> 
        <div class="n-content">
            <?php
            // 连接到数据库
            $servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname = "餐廳"; 
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // 检查连接
            if (!$conn) {
                die("连接失败4: " . mysqli_connect_error());
            }
            // 从数据库中選8個餐廳且地區=校內的資料在學餐餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='校內' ORDER BY RAND() LIMIT 8";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row">';
                    echo '    <div class="row-img">';
                    echo '       <a href="introduction.php?id=' . $row["編號"] . '"><img src="img/' . $row["圖片"] .'" alt="' . $row["餐廳名"] . '"></a>';
                    echo '    </div>';
                    echo '    <div class="row-content">';
                    echo '        <a href="introduction.php?id=' . $row["編號"] . '">' . $row["餐廳名"] . '</a>';
                    echo '        <div class="opening-hour">';
                    echo '            <i class="ri-time-line"></i>';
                    echo '            營業時間：<br>' . $row["營業時間"];
                    echo '        </div>';
                    echo '        <div class="closeday">';
                    echo '            <i class="ri-calendar-close-line"></i>';
                    echo '            公休日：' . $row["公休日"];
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
                    echo '            <button onclick="addToFavorites('.$row['編號'].')" class="btn1"><i class="ri-heart-fill"></i></button>';
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
    <div class="n-btn">
        <a href=school.php class="btn">查看所有</a>
    </div>
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel"><i class="ri-mail-line" style="margin-right: 10px;"></i>聯絡我們</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>哈囉！有任何問題歡迎聯絡信箱：<a href="mailto:ncufood@gmail.com">ncufood@gmail.com</a>，我們會儘速處理唷！</p>
                </div>
            </div>
        </div>
    </div>
    <!--- custom js link --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
    <script src="home.js"></script>
    <script src="myfavfix.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const searchInput = document.querySelector('.search-input');
            const searchForm = document.querySelector('.search-form');
            const hiddenSubmitButton = searchForm.querySelector('[type="submit"]');

            searchInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // 防止表單的默認提交
                    hiddenSubmitButton.click(); // 手動觸發隱藏的提交按鈕
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
