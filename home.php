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
        <a href=home.php>首頁</a>
        <a href=all.php>所有餐廳</a>
        <a href=school.php>學餐</a>
        <a href=backdoor.php>後門</a>
        <a href=street.php>宵夜街</a>
        <a href="#">聯絡我們</a>
    </div>

 <!--- 每日推薦 --->
        <section class="n-restaurants">
        <div class="center-text" style="margin-top: 35px;">
        <h3><i class="ri-lightbulb-line" style="margin-right: 5px;"></i>每日推薦</h3>
        </div> 
        <div class="n-content">
            <?php
            // 連接到資料庫
            $servername = "localhost";
            $username = "root"; 
            $password = "5253"; 
            $dbname = "餐廳"; 

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // 检查连接
            if (!$conn) {
                die("连接失败: " . mysqli_connect_error());
            }
            CREATE TABLE `名單` (
                `編號` int(11) NOT NULL,
                `圖片` varchar(255) DEFAULT NULL,
                `餐廳名` varchar(20) NOT NULL,
                `地區` varchar(5) NOT NULL,
                `地址` varchar(25) NOT NULL,
                `營業時間` varchar(50) NOT NULL,
                `公休日` varchar(15) DEFAULT NULL,
                `電話` varchar(15) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
              
              --
              -- 傾印資料表的資料 `名單`
              --
              
              INSERT INTO `名單` (`編號`, `圖片`, `餐廳名`, `地區`, `地址`, `營業時間`, `公休日`, `電話`) VALUES
              (0, '0.png', '掌窩。早~蔬食早屋餐', '後門', '324桃園市平鎮區中央路187號', '星期一 ~星期五7:30-1:30  ', '六日', '無'),
              (1, '1.png', '福泉豆花', '後門', '320桃園市中壢區中央路177號', '星期一 ~星期六11:30-19:30  ', '日', '034907150'),
              (2, '2.jpg', '巧味香早餐店', '後門', '324桃園市平鎮區中央路175號', '星期一 ~星期五6:00-13:00 星期六~日6:00~10:50', NULL, '034203936'),
              (3, NULL, '健康鹹水雞', '後門', '324桃園市平鎮區中央路171號', '星期一 ~星期五15:00-23:00', '六日', '無'),
              (4, '4.png', '清新福泉', '後門', '324桃園市平鎮區中央路171號', '星期一 ~星期日9:45-21:00', NULL, '034202777'),
              (5, '5.png', '雙饗丼', '後門', '32459桃園市平鎮區中央路169號', '星期一 ~星期日 11:00-14:00,16:30-20:00', NULL, '034200955'),
              (6, '6.png', '108果汁', '後門', '324桃園市平鎮區中央路165號', '星期一 ~星期日 09:00-21:30', NULL, '034203185'),
              (7, '7.png', '大快朵頤 去骨鹹水雞', '後門', '320桃園市中壢區中央路230號', '星期一 ~星期五 17:00-22:00', '六日', '無'),
              (8, '8.jpg', '麥堡堡早餐店', '後門', '324桃園市平鎮區中央路163號', '星期一 ~星期六 06:00-14:00', '日', '0919943688'),
              (9, '9.jpg', '太極飯糰', '後門', '320桃園市中壢區中央路230號', '不定時', NULL, '無'),
              (10, NULL, '拉麵定食', '後門', '320桃園市中壢區中央路230號', '不定時', NULL, '無'),
              (11, '11.png', '自己煮', '後門', '320桃園市平鎮區中央路163號', '星期一~五11:30-14:00，17:00-20:00', '星期六日', '0979762995'),
              (12, '12.png', '米豆簡餐', '後門', '320桃園市平鎮區中央路161號', '星期一 ~星期日 11:30-20:30', NULL, '034201823'),
              (13, '13.png', '大嗑中央大學(蔬菜蛋餅專賣店)', '後門', '324桃園市平鎮區中央路159號', '星期一 ~星期日 07:00-14:30', NULL, '0961186108'),
              (14, '14.png', '食間', '後門', '320桃園市中壢區中央路236號', '星期一 ~星期五 11:00-14:00,16:30-19:30', '星期六日', '034206119'),
              (15, '15.png', '哈堡堡輕食早午餐', '後門', ' 320桃園市中壢區中央路232巷2號', '星期一 ~星期日 06:00-13:30', NULL, '034205593'),
              (16, '16.png', '滿分小舖', '後門', '324桃園市平鎮區中央路181號', '星期一 ~星期五 11:00-14:00,17:00-20:00', '星期六日', '034904148'),
              (17, '17.png', '忠貞米干米線美食館', '後門', '320桃園市中壢區中央路232巷2號', '不定時', NULL, '無'),
              (18, '18.jpg', '三杯炒滷味', '後門', '320桃園市中壢區中央路232巷2號', '不定時', NULL, '無'),
              (19, '19.png', '廚窗 Kitchen Bliss', '後門', '324桃園市平鎮區中央路157號', '星期二 ~星期日 11:30-13:30,17:00-19:30', '星期一', '0987078449'),
              (20, '20.jpg', '紅樓牛肉麵', '後門', '320桃園市中壢區中央路155號', '星期一 ~星期日 12:00-14:00', NULL, '034902187'),
              (21, '21.png', '大中央厚切牛排', '後門', '320桃園市中壢區中央路153號', '星期一 ~星期日 11:00-14:00，16:30-21:00', NULL, '034201415'),
              (22, '22.jpg', '迷路意麵屋', '後門', '320桃園市平鎮區中央路151號', '星期一 ~星期六 11:30-14:00，17:00-20:00 ', '星期日', '034202713'),
              (23, '23.jpg', '漢林大漢堡', '後門', '324桃園市平鎮區中央路145號', '不定時', NULL, '無'),
              (24, '24.png', '飽咖咖', '後門', '324桃園市平鎮區中央路147號', '星期一 ~星期日 11:30-14:00，17:00-20:00', NULL, '0979232618'),
              (25, '25.png', '花路', '後門', '324桃園市平鎮區中央路145-2號', '星期一 ~五 、日11:30-14:00，17:00-20:00', '星期六', '034906979'),
              (26, '26.png', '麥克小姐', '後門', '324桃園市平鎮區中央路145號', '星期二 ~星期日 11:00-14:30，17:00-20:30 ', '星期一', '034205038'),
              (27, '27.PNG', '新福麵館', '後門', '320桃園市平鎮區中央路145號', '不定時', NULL, '034200952'),
              (28, '28.png', '萊客堡早午餐', '後門', '320桃園市平鎮區中央路135號', '星期二 ~星期五 07:30-13:15，星期六~日07:30-13:30 ', '星期一', '無'),
              (29, '29.jpg', '白鬍子牛排', '後門', '324桃園市平鎮區中央路133號', '星期一 ~星期五 11:00-14:00，16:00-20:40星期六~日11:00-20:40', NULL, '034200937'),
              (30, '30.jpg', '田園美食屋', '後門', '320桃園市中壢區中央路131號', '星期一 ~星期五 17:00-20:00', '星期六日', '034203115'),
              (31, '31.jpeg', '南極冰窖', '後門', '324桃園市平鎮區中央路129-1號', '星期一 ~星期六 14:00-01:00', '星期日', '0972957293'),
              (32, '32.jpg', '惟客美而美', '後門', '324桃園市平鎮區中央路127號', '星期一 ~星期日05:30-14:00', NULL, '034206180'),
              (33, '33.jpg', '萊姆斯早餐', '後門', '324桃園市平鎮區中央路125號', '不定時', NULL, '034201114'),
              (34, '34.jpg', '八方雲集', '後門', '320桃園市中壢區中央路226-1號', '星期一 ~星期日11:00-20:00', NULL, '034900573'),
              (35, '35.png', 'Backdoor Café', '後門', '320桃園市中壢區中央路216巷9號', '星期二 ~星期日12:30-18:00', '星期一', '034900655'),
              (36, '36.jpeg', 'No.17 White House', '後門', '320桃園市中壢區中央路216巷21號', '星期一~星期五11:30-14:00，17:00-19:30', '星期六日', '034903099'),
              (37, '37.jpeg', '鴻樂', '後門', '320桃園市中壢區中央路216巷25號', '星期一~星期五11:00-14:00，17:00-20:00', '星期六日', '0926566126'),
              (38, '38.png', '馬爾波咖啡', '後門', '320桃園市中壢區中央路216巷68號 ', '星期一~星期日11:30-20:00', NULL, '0920859933'),
              (39, '39.png', '竹香快餐', '後門', '320桃園市中壢區中央路216巷8號', '不定時', NULL, '無'),
              (40, '40.jpg', ' 街角216', '後門', '32051桃園市中壢區中央路216巷6號', '星期一~星期五、日11:00-14:00，17:00-19:30', '星期六', '0978653123'),
              (41, '41.png', '阿米玲食堂', '後門', '320桃園市中壢區中央路212號', '星期一~星期五11:30-13:30，17:00-19:30', '星期六日', '034204995'),
              (42, '42.png', '樂活堡', '後門', '320桃園市中壢區中央路208號', '星期一~星期六07:00-14:00', '星期日', '034203356'),
              (43, '43.png', '歐姆萊思', '後門', '320桃園市中壢區中央路202號', '星期一~星期五、日11:30-14:00，17:00-20:30', '星期六', '034205705'),
              (44, '44.jpg', '美式早餐屋', '後門', '320桃園市中壢區中央路200號', '星期一~星期日06:00-13:00', NULL, '0965129574'),
              (45, '45.jpg', '珍饌炒飯', '後門', '320桃園市中壢區中央路200號', '星期一~星期五17:00-20:00', '星期六日', '無'),
              (46, '46.png', '達啵廚房', '後門', '320桃園市中壢區中央路200-2號', '星期一~星期日10:00-14:00，17:00-20:30', NULL, '0934033582'),
              (47, '47.png', '家香美食店', '後門', ' 320桃園市中壢區中央路190號', '星期一~星期五、日11:30-20:00', '星期六', '無'),
              (48, '48.png', '香米便當‧自助餐', '後門', '320桃園市中壢區中央路190號', '星期一~星期日11:00-14:00，17:00-20:00', NULL, '0937811130'),
              (49, '49.jpg', '重慶酸辣粉', '後門', '320桃園市中壢區中央路176號', '星期一~星期五、日11:30-14:00，16:30-19:30', '星期六', '034207133'),
              (50, '50.png', 'Daddy\'s美式餐廳', '後門', '320桃園市中壢區中央路170號', '星期一~星期五11:30-14:00，17:00-20:00', '星期六日', '034905052'),
              (51, '51.png', '熱浪島', '後門', '320桃園市中壢區中央路216巷86弄58-1號', '星期一~二、五~日11:00-14:00，17:00-20:00', '星期三四', '034909995'),
              (52, '52.jpg', '粥王', '宵夜街', '320桃園市中壢區五興路400號', '星期一~五11:30-20:00', '星期六日', ' 0903213305'),
              (53, '53.png', '無人拉麵店', '宵夜街', '320桃園市中壢區五興路345號', '24小時營業', NULL, '0955155814'),
              (54, '54.jpg', '滿食記 ', '宵夜街', ' 320桃園市中壢區五興路附近', '星期一~五、日12:00-14:00，17:00-20:00', '星期六', '0933853850'),
              (55, '55.jpg', '東東生鮮手工大水餃', '宵夜街', '320桃園市中壢區五興路', '星期一~日11:30-14:00，17:00-19:30', NULL, '0960772157'),
              (56, '56.png', '夏克堤', '宵夜街', '320桃園市中壢區五興路', '星期一~日12:00-23:00 ', NULL, '0912528414'),
              (57, '57.png', '立橙茶飲', '宵夜街', '320桃園市中壢區五興路345號', '星期一~日11:30-00:00', NULL, ' 0978720021'),
              (58, '58.png', '一億園 ', '宵夜街', '320桃園市中壢區五興路345號', ' 星期一~五 11:00-19:30', '星期六日', '無'),
              (59, '59.png', '香城燒臘小館', '宵夜街', '320桃園市中壢區五興路331巷6號', '星期一~五 11:00-14:30，16:30-19:30', '星期六日', '034205102'),
              (60, '60.png', '立欣影印豆花店', '宵夜街', '320桃園市中壢區五興路331巷6號', '星期一~五 12:00-01:00', '星期六日', '034902938'),
              (61, '61.png', '日船章魚小丸子', '宵夜街', '320桃園市中壢區五興路418號', '不定時', NULL, '0909643599'),
              (62, '62.jpeg', '一品鍋', '宵夜街', '320桃園市中壢區五興路416號', '星期一~日 12:00-14:00，17:00-22:00', NULL, '034204258'),
              (63, '63.png', 'Main 蛋', '宵夜街', ' 2樓, No. 416號五興路中壢區桃園市320', '星期一~五 20:00-02:00', '星期六日', '034909868'),
              (64, '64.png', '宵夜屋自助餐', '宵夜街', ' 320桃園市中壢區五興路410號', '星期一~五 11:00-19:00 ', '星期六日', '無'),
              (65, '65.png', '祐桑手工煎餃', '宵夜街', '320桃園市中壢區五興路400號', '星期一~五、日 11:30-14:00，17:00-00:00 ', '星期六', '0928628360'),
              (66, '66.png', '男子漢生鮮炸雞', '宵夜街', '320桃園市中壢區五興路400號', '星期一~五18:00-01:00 ', '星期六日', '0905107301'),
              (67, '67.png', 'Pretty Devil', '宵夜街', '320桃園市中壢區五興路396號', '星期一~六14:00-01:00 ', '星期日', '0939552396'),
              (68, '68.png', '惡魔炸蛋', '宵夜街', '320桃園市中壢區五興路398號', '星期一~六14:00-01:00 ', '星期日', '0939552396'),
              (69, '69.png', '樵夫關東煮', '宵夜街', '320桃園市中壢區五興路390號', '星期一~日11:00-13:30，17:00-23:30', NULL, '0986466663'),
              (70, '70.png', '霸王鹹酥雞', '宵夜街', '320桃園市中壢區五興路390號', '星期一~日17:00-01:30', NULL, '0931806588'),
              (71, '71.jpg', '比大爺滷味', '宵夜街', '320桃園市中壢區五興路329號', '星期一~五、日17:00-23:30 ', '星期六', '0921295342'),
              (72, '72.jpg', '雞叔叔', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (73, '73.jpg', '蜜汁燒烤', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (74, '74.jpg', '宵夜街小籠包', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (75, '75.png', '緣杏廣東粥飯麵館', '宵夜街', '320桃園市中壢區五興路331巷1號', '星期一~六10:00-14:00，16:00-21:00 日公休', NULL, '0937170121'),
              (76, '76.png', '瑞麟美而美', '宵夜街', '320桃園市中壢區五興路331巷3號', '星期一~日06:00-14:00', NULL, '034207617'),
              (77, '77.jpg', '成芳餓舖', '宵夜街', '320桃園市中壢區五興路331巷7號', '星期一~日16:30-23:30', NULL, '0955097068'),
              (78, '78.png', '喜樂廚房', '宵夜街', '320桃園市中壢區五興路331巷9號', '星期一~日06:00-14:00', NULL, '034908068'),
              (79, '79.jpg', '豪味堡', '宵夜街', '320桃園市中壢區五興路418號', '不定時', NULL, '無'),
              (80, '80.png', '夠義式義大利麵', '宵夜街', '320桃園市中壢區五興路331巷', '星期一~五11:30-13:30，16:30-19:30 ', '星期六日', '0989953289'),
              (81, '81.jpeg', '25食堂', '宵夜街', '320桃園市中壢區五興路331巷25號', '星期一~四、日16:30-00:00', '星期五六', '0958456989'),
              (82, '82.jpeg', '香煎小舖', '宵夜街', '320桃園市中壢區五興路331巷29號', '星期一~四11:30-14:00，17:00-20:30', NULL, '0935163925'),
              (83, '83.jpg', '熊讚啦啦舒肥鹹水雞', '宵夜街', '320桃園市中壢區五興路331巷28-2號', '星期一~日17:10', NULL, '無'),
              (84, '84.jpg', '來客', '宵夜街', ' 320桃園市中壢區五興路331巷28-2號', '星期一~五11:30-14:00，17:00-19:30', NULL, '034908961'),
              (85, '85.jpg', '茶繪', '宵夜街', '320桃園市中壢區五興路331巷28-2號', '星期一~日12:00~00:00', NULL, '0916550561'),
              (86, '86.jpg', '傻師傅湯包', '宵夜街', '320桃園市中壢區五興路331巷28號', '星期一~日17:00-00:00', NULL, '034906763'),
              (87, '87.jpg', '曼尼食坊', '宵夜街', '320桃園市中壢區五興路331巷32號', '星期一~日11:30-14:00，17:00-20:00', NULL, '0921873544'),
              (88, '88.png', '咖哩老師', '宵夜街', '320桃園市中壢區五興路331巷36號', '星期一~六11:30-14:00，16:30-19:30', NULL, '0916811748'),
              (89, '89.jpg', '無敵蛋餅', '宵夜街', '320桃園市中壢區五興路331巷52之1號', '星期一~五、日18:00-02:30', '星期六', '0928210319'),
              (90, '90.jpg', '楊滇風南洋料理', '宵夜街', '320桃園市中壢區五興路331巷58號', '星期一~日11:30-14:00，17:00-21:00', NULL, '034201666'),
              (91, '91.jpg', 'Sidewalk 人行道蔬食', '宵夜街', '320桃園市中壢區中央路216巷39號', '星期二~日11:30-14:30，16:30-20:00', '星期一', '034200112'),
              (92, '92.jpg', '小木屋鬆餅 ', '校內', '320桃園市中壢區中大路300號志希館', '星期一~日09:00-19:00', NULL, '034265215'),
              (93, '93.jpg', '四海遊龍', '校內', '320桃園市中壢區中大路300號1F男九舍', '星期一~五10:30-20:00', '星期六日', '034275429'),
              (94, NULL, '吃找餐', '校內', '320桃園市中壢區中大路300號', '星期一~五10:30-20:00', '星期六日', '無'),
              (95, NULL, '炸雞大師', '校內', '320桃園市中壢區中大路300號', '星期一~五11:00-19:30', '星期六日', '034275571'),
              (96, NULL, '雞霸葷', '校內', '320桃園市中壢區中大路300號', '星期一~五11:00-19:30', '星期六日', '無'),
              (97, '97.jpg', '王者香', '校內', '320桃園市中壢區中大路300號', '星期一~四11:00-19:00五~日11:00-18:00', NULL, '034908460 '),
              (98, '98(1).jpg', '全家(松苑）', '校內', '320桃園市中壢區中大路300號', '星期一~日08:00-22:00 ', NULL, '034205531 '),
              (99, '99.png', '麥味登', '宵夜街', ' 320桃園市中壢區五興路343號', '星期一~五08:00-14:00', '六日公休', '無'),
              (100, '100.jpg', 'OK超商', '宵夜街', ' 320桃園市中壢區五興路402號 ', '24小時營業', NULL, '032631597 '),
              (101, '101.png', 'LALA Kitchen', '校內', '320桃園市中壢區中央大學松苑餐廳2樓', '星期三~日11:30-21:00', '星期一二', '034207787'),
              (102, '102.jpeg', '漢堡王', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '星期一~日09:00-20:30', NULL, '034200832'),
              (103, '103.png', '路易莎', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '星期一~日08:00-17:30', NULL, '034904613'),
              (104, '104.jpeg', '鼎記食堂', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '星期一~日11:00-18:30', NULL, '0978098075'),
              (105, '105.jpg', '玖蔦家火山丼飯', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '星期一~日11:00-18:00', NULL, '0927768982'),
              (106, NULL, '韓式辣炒年糕', '後門', '320桃園市中壢區中央路190號', '不定時', NULL, '無'),
              (107, '107.jpg', '田家牛肉麵', '宵夜街', '320桃園市中壢區五興路408號', '不定時', NULL, '無'),
              (108, '108.png', '巷口咖啡', '後門', '320桃園市中壢區中央路228號之2號 ', '星期一~四、日11:30-20:00 ', NULL, '0958719480'),
              (109, '109.jpg', '711學央門市', '後門', '324桃園市平鎮區中央路187號', '24小時營業', NULL, '034205014 '),
              (110, '110.jpg', '全家中壢龍凱店 ', '後門', ' 320桃園市中壢區中央路218號 ', '24小時營業', NULL, '034207322 '),
              (111, '111.jpg', '食胖碳烤三明治', '後門', ' 320桃園市中壢區中央路208號 ', '星期一~日07:00-14:00 ', NULL, '034906628 '),
              (112, '112.jpg', ' 熟檸檬', '後門', '320桃園市中壢區中央路210號', '星期一~五11:30-13:20 17:00-19:30', '星期六日', ' 0977407896'),
              (113, '113.jpg', '七武海', '後門', '320桃園市中壢區中央路190號 ', '不定時', NULL, '無'),
              (114, '114.jpg', ' 蘿塔塔', '後門', ' 320桃園市中壢區中央路178號', '星期一~五、日11:00-14:00 17:00-22:00', '星期六', '034900856'),
              (115, '115.jpg', '川川滷味 ', '後門', ' 324桃園市平鎮區中央路145號', '不定時', NULL, '無'),
              (116, '116.jpg', '現蒸湯包', '後門', ' 324桃園市平鎮區中央路157號', '不定時', NULL, '無'),
              (117, '117.jpg', '香恬園食堂', '宵夜街', ' 320桃園市中壢區五興路412號 ', '不定時', NULL, ' 034902417'),
              (118, '118.jpg', '吉來手作', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (119, '119.jpg', '水果攤', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (120, '120.jpg', '來來熱炒便當 ', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (121, '121.jpg', '饕客', '宵夜街', '320桃園市中壢區五興路335號', '不定時', NULL, '無'),
              (122, '122.jpg', '廣東腸粉', '宵夜街', ' 320桃園市中壢區五興路390號 ', '星期一~五、日11:30-13:00', NULL, '0935097290 '),
              (123, '123.jpg', '388 烤串吧', '宵夜街', '320桃園市中壢區五興路345號', '星期一~日18:00-00:00 ', NULL, '無'),
              (124, '124.jpg', '火星旺旺雞蛋糕', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (125, '125.png', '甜香而食堂', '校內', '320桃園市中壢區中大路300號', '星期一~日11:00-18:30', NULL, '無'),
              (126, '126.png', '飽可麵飯', '校內', '320桃園市中壢區中大路300號', '星期一~日11:00-18:30', NULL, '無'),
              (127, '127.png', '緣滾滾', '校內', '320桃園市中壢區中大路300號', '星期一~日11:00-18:30', NULL, '無'),
              (128, '128.png', '香米便當(松果)', '校內', '320桃園市中壢區中大路300號(松果餐廳)', '星期一~日11:00-18:30', NULL, '無'),
              (129, '129.jpg', '嗑早餐', '校內', '320桃園市中壢區中大路300號', '星期一~日11:00-18:30', NULL, '無');
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
                    echo '            <Button onclick="Toggle(this)" class="btn1" data-id="' .$row["編號"].'" data-name="'. $row["餐廳名"] .'" data-img="img/' . $row["餐廳名"] . '.jpg" data-hours="' . $row["營業時間"].'"><i class="ri-heart-fill"></i></Button>';
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
        <h3><i class="ri-restaurant-line" style="margin-right: 10px;"></i>所有餐廳</h3>
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
                    echo '            <Button onclick="Toggle(this)" class="btn1" data-id="' .$row["編號"].'" data-name="'. $row["餐廳名"] .'" data-img="img/' . $row["餐廳名"] . '.jpg" data-hours="' . $row["營業時間"].'"><i class="ri-heart-fill"></i></Button>';
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
                    echo '            <Button onclick="Toggle(this)" class="btn1" data-id="' .$row["編號"].'" data-name="'. $row["餐廳名"] .'" data-img="img/' . $row["餐廳名"] . '.jpg" data-hours="' . $row["營業時間"].'"><i class="ri-heart-fill"></i></Button>';
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
                    echo '            <Button onclick="Toggle(this)" class="btn1" data-id="' .$row["編號"].'" data-name="'. $row["餐廳名"] .'" data-img="img/' . $row["餐廳名"] . '.jpg" data-hours="' . $row["營業時間"].'"><i class="ri-heart-fill"></i></Button>';
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
                    echo '            <Button onclick="Toggle(this)" class="btn1" data-id="' .$row["編號"].'" data-name="'. $row["餐廳名"] .'" data-img="img/' . $row["餐廳名"] . '.jpg" data-hours="' . $row["營業時間"].'"><i class="ri-heart-fill"></i></Button>';
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
    <script src="myfavfix.js"></script>
</body>
</html>
