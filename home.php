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
            <form class="d-flex align-items-center search-form" style="margin-right: 15px;">
                <form class="d-flex align-items-center search-form" style="margin-right: 15px;">
                    <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search">
                    <button class="search-btn" type="button">
                        <i class="ri-search-line"></i>
                    </button>
                </form> 
            </form>            
            <a href="myfavfix.html"><i class="ri-heart-line"></i></a>
            <a href="user.html"><i class="ri-user-line"></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>  
    </header>

    <!--- sidebar --->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" id="close-btn">&times;</a>
        <a href="home.php">首頁</a>
        <a href=all.php>所有餐廳</a>
        <a href=school.php>學餐</a>
        <a href="backdoor.php">後門</a>
        <a href="street.php">宵夜街</a>
        <a href="#">聯絡我們</a>
    </div>

 <!--- 每日推薦 --->
        <section class="n-restaurants">
        <div class="center-text" style="margin-top: 35px;">
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

            // 从数据库中選8個餐廳在每日推薦中呈現
            $sql = "SELECT * FROM 名單 ORDER BY RAND() LIMIT 8";
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
                echo "沒有餐廳數據";
            }

            mysqli_close($conn);
            ?>
        </div>
    </section>

      <!--- 所有餐廳 --->
      <section class="n-restaurants">
        <div class="center-text">
            <h3>所有餐廳</h3>
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

            // 从数据库中選8個餐廳在所有餐廳中呈現
            $sql = "SELECT * FROM 名單 ORDER BY RAND() LIMIT 8";
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
            <h3>後門餐廳</h3>
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

            // 从数据库中選8個餐廳且地區=後門的資料在後門餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='後門' ORDER BY RAND() LIMIT 8";
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
            <h3>宵夜街餐廳</h3>
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

            // 从数据库中選8個餐廳且地區=宵夜街的資料在宵夜街餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='後門' ORDER BY RAND() LIMIT 8";
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
            <h3>學餐餐廳</h3>
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

            // 从数据库中選8個餐廳且地區=校內的資料在學餐餐廳中呈現
            $sql = "SELECT * FROM 名單 WHERE 地區='校內' ORDER BY RAND() LIMIT 8";
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
                echo "沒有餐廳數據";
            }

            mysqli_close($conn);
            ?>
        </div>
    </section>
    <div class="n-btn">
        <a href=school.php class="btn">查看所有</a>
    </div>
    <!--- custom js link --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
    <script src="home.js"></script>

</body>
</html>
