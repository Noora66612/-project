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
    <link rel="stylesheet" type="text/css" href="introduction.css">

    <!-- box-icon link -->
    <link rel="stylesheet" 
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- remix-icons link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    

</head>
<body>
 
        <!--- header --->
        <header>
            <a href=home.php class="logo">央央熊食在</a>
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
                    <form class="d-flex align-items-center search-form" style="margin-right: 15px;" action="search.php" method="get">
                        <input class="form-control me-2 search-input" type="search" name="query" placeholder="搜尋" aria-label="Search">
                            <button class="search-btn" type="button">
                                <i class="ri-search-line"></i>
                            </button>
        <!-- 新增一個隱藏的提交按鈕 -->
                            <button type="submit" style="display: none;" aria-hidden="true"></button>
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
            <a href=home.php>首頁</a>
            <a href=all.php>所有餐廳</a>
            <a href=school.php>學餐</a>
            <a href=backdoor.php>後門</a>
            <a href=street.php>宵夜街</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal">聯絡我們</a>   
        </div>
</head>
<body>
    <?php
    // 连接到数据库
    $servername = "localhost";
    $username = "root"; 
    $password = "nc@p12rs00a4"; 
    $dbname = "餐廳"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // 检查连接
    if (!$conn) {
        die("连接失败: " . mysqli_connect_error());
    }

    // 获取餐厅ID
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // 从数据库中获取特定餐厅数据
    $sql = "SELECT 圖片, 餐廳名, 地址, 營業時間, 公休日, 電話 FROM 名單 WHERE 編號 = $id";
    $result = mysqli_query($conn, $sql);

    // 检查查询结果
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
    <!--- 店家介紹 --->
    <div class="container">
        <div class="store-photo">
            <img src="img/<?php echo $row['圖片']; ?>" alt="<?php echo $row['餐廳名']; ?>">
        </div>
        <div class="store-details">
            <h2><?php echo $row['餐廳名']; ?></h2>
            <a href="#" class="detail-item">
                <i class="ri-time-fill"></i>
                營業時間：<?php echo $row['營業時間']; ?>
            </a>
            <a href="#" class="detail-item">
                <i class="ri-calendar-close-fill"></i>
                公休日：<?php echo $row['公休日']; ?>
            </a>
            <a href="#" class="detail-item">
                <i class="ri-map-pin-fill"></i>
                地址：<?php echo $row['地址']; ?>
            </a>
            <a href="#" class="detail-item">
                <i class="ri-phone-fill"></i>
                電話：<?php echo $row['電話']; ?>
            </a>
            <div class="heart">
                <Button onclick="Toggle()" id="btn1" class="right-bottom-button"><i class="ri-heart-fill"></i></Button>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php
    } else {
        echo "沒有找到相關餐廳資料";
    }
    $sql = "SELECT 評論內容, 評論時間 FROM 評論 WHERE 餐廳編號 = $id ORDER BY 評論時間 DESC";
    $result = mysqli_query($conn, $sql);

    ?>
    <div class="comment-box"></div>
    <div class="review-container">
        <div class="review-wrapper">
            <textarea id="review" rows="1" placeholder="留下我的評論..." oninput="adjustHeight()"></textarea>
        </div>
        <div class="buttons">
            <button class="button" id="cancel">取消</button>
            <button class="button" id="submit">送出</button>
        </div>
    </div>
    <div class="comments-container" id="comments-container">
        <div class="comments-header">
            <span class="title">所有評論</span>
            <span class="title">評論時間</span>
        </div>
        <!-- 動態生成評論 -->
        <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='comment-item'>";
            echo "<div class='comment-content'>" . $row['評論內容'] . "</div>";
            echo "<div class='comment-time'>" . date("Y 年 m 月", strtotime($row['評論時間'])) . "</div>";
            echo "</div>";
        }
    } else {
        echo "目前還沒有評論";
    }
    mysqli_close($conn);
    ?>
    </div>
     <script>
        function Toggle() {
            var element = document.getElementById("btn1");
            element.classList.toggle("active");
        }
    </script>
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
    <script src="introduction.js"></script>
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
    <script>
    $(document).ready(function() {
        $('#commentForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize() + '&餐廳編號=<?php echo $id; ?>';

            $.ajax({
                type: 'POST',
                url: 'add_comment.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var commentItem = `
                            <div class='comment-item'>
                                <div class='comment-content'>${response.評論內容}</div>
                                <div class='comment-time'>${response.評論時間}</div>
                            </div>
                        `;
                        $('#comments-container').prepend(commentItem);
                        $('#review').val('');
                    } else {
                        alert(response.message);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });

    function adjustHeight() {
        var textarea = $('#review');
        textarea.css('height', 'auto');
        textarea.css('height', textarea[0].scrollHeight + 'px');
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
</body>
</html>
