<?php
$servername = "localhost";
            $username = "root"; 
            $password = "nc@p12rs00a4"; 
            $dbname = "餐廳"; 
            
            $conn = new mysqli($servername, $username, $password);

            $sql ="CREATE DATABASE IF NOT EXISTS $dbname";
            $conn->query($sql);  
            
            $conn->select_db($dbname);


            $sql = " CREATE TABLE `名單` (
                `編號` int(11) NOT NULL,
                `圖片` varchar(255) DEFAULT NULL,
                `餐廳名` varchar(20) NOT NULL,
                `地區` varchar(5) NOT NULL,
                `地址` varchar(25) NOT NULL,
                `營業時間` varchar(50) NOT NULL,
                `公休日` varchar(50) DEFAULT NULL,
                `電話` varchar(15) DEFAULT NULL
              )";
            $conn->query($sql);  

            $sql = "INSERT INTO `名單` (`編號`, `圖片`, `餐廳名`, `地區`, `地址`, `營業時間`, `公休日`, `電話`) VALUES
              (0, '0.png', '掌窩。早~蔬食早屋餐', '後門', '324桃園市平鎮區中央路187號', '一 ~ 五 7:30-1:30', '六日', '無'),
              (1, '1.png', '福泉豆花', '後門', '320桃園市中壢區中央路177號', '一 ~ 六 11:30-19:30', '日', '034907150'),
              (2, '2.jpg', '巧味香早餐店', '後門', '324桃園市平鎮區中央路175號', '一 ~ 五 6:00-13:00 六 ~ 日6:00~10:50', '無', '034203936'),
              (3, NULL, '健康鹹水雞', '後門', '324桃園市平鎮區中央路171號', '一 ~ 五 15:00-23:00', '六日', '無'),
              (4, '4.png', '清新福泉', '後門', '324桃園市平鎮區中央路171號', '一 ~ 日 9:45-21:00', '無', '034202777'),
              (5, '5.png', '雙饗丼', '後門', '32459桃園市平鎮區中央路169號', '一 ~ 日 11:00-14:00, 16:30-20:00', '無', '034200955'),
              (6, '6.png', '108果汁', '後門', '324桃園市平鎮區中央路165號', '一 ~ 日 9:00-21:30', '無', '034203185'),
              (7, '7.png', '大快朵頤 去骨鹹水雞', '後門', '320桃園市中壢區中央路230號', '一 ~ 五 17:00-22:00', '六日', '無'),
              (8, '8.jpg', '麥堡堡早餐店', '後門', '324桃園市平鎮區中央路163號', '一 ~ 六 6:00-14:00', '日', '0919943688'),
              (9, '9.jpg', '太極飯糰', '後門', '320桃園市中壢區中央路230號', '不定時', NULL, '無'),
              (10, NULL, '拉麵定食', '後門', '320桃園市中壢區中央路230號', '不定時', NULL, '無'),
              (11, '11.png', '自己煮', '後門', '320桃園市平鎮區中央路163號', '一 ~ 五 11:30-14:00, 17:00-20:00', '六日', '0979762995'),
              (12, '12.png', '米豆簡餐', '後門', '320桃園市平鎮區中央路161號', '一 ~ 日 11:30-20:30', '無', '034201823'),
              (13, '13.png', '大嗑中央大學(蔬菜蛋餅專賣店)', '後門', '324桃園市平鎮區中央路159號', '一 ~ 日 7:00-14:30', '無', '0961186108'),
              (14, '14.png', '食間', '後門', '320桃園市中壢區中央路236號', '一 ~ 五 11:00-14:00, 16:30-19:30', '六日', '034206119'),
              (15, '15.png', '哈堡堡輕食早午餐', '後門', ' 320桃園市中壢區中央路232巷2號', '一 ~ 日 6:00-13:30', '無', '034205593'),
              (16, '16.png', '滿分小舖', '後門', '324桃園市平鎮區中央路181號', '一 ~ 五 11:00-14:00, 17:00-20:00', '六日', '034904148'),
              (17, '17.png', '忠貞米干米線美食館', '後門', '320桃園市中壢區中央路232巷2號', '不定時', NULL, '無'),
              (18, '18.jpg', '三杯炒滷味', '後門', '320桃園市中壢區中央路232巷2號', '不定時', NULL, '無'),
              (19, '19.png', '廚窗 Kitchen Bliss', '後門', '324桃園市平鎮區中央路157號', '二 ~ 日 11:30-13:30, 17:00-19:30', '一', '0987078449'),
              (20, '20.jpg', '紅樓牛肉麵', '後門', '320桃園市中壢區中央路155號', '一 ~ 日 12:00-14:00', '無', '034902187'),
              (21, '21.png', '大中央厚切牛排', '後門', '320桃園市中壢區中央路153號', '一 ~ 日 11:00-14:00, 16:30-21:00', '無', '034201415'),
              (22, '22.jpg', '迷路意麵屋', '後門', '320桃園市平鎮區中央路151號', '一 ~ 六 11:30-14:00, 17:00-20:00', '日', '034202713'),
              (23, '23.jpg', '漢林大漢堡', '後門', '324桃園市平鎮區中央路145號', '不定時', NULL, '無'),
              (24, '24.png', '飽咖咖', '後門', '324桃園市平鎮區中央路147號', '一 ~ 日 11:30-14:00, 17:00-20:00', '無', '0979232618'),
              (25, '25.png', '花路', '後門', '324桃園市平鎮區中央路145-2號', '日 ~ 五 11:30-14:00, 17:00-20:00', '六', '034906979'),
              (26, '26.png', '麥克小姐', '後門', '324桃園市平鎮區中央路145號', '二 ~ 日 11:00-14:30, 17:00-20:30', '一', '034205038'),
              (27, '27.png', '新福麵館', '後門', '320桃園市平鎮區中央路145號', '不定時', NULL, '034200952'),
              (28, '28.png', '萊客堡早午餐', '後門', '320桃園市平鎮區中央路135號', '二 ~ 五 07:30-13:15, 六 ~ 日07:30-13:30', '一', '無'),
              (29, '29.jpg', '白鬍子牛排', '後門', '324桃園市平鎮區中央路133號', '一 ~ 五 11:00-14:00, 16:00-20:40六 ~ 日11:00-20:40', '無', '034200937'),
              (30, '30.jpg', '田園美食屋', '後門', '320桃園市中壢區中央路131號', '一 ~ 五 17:00-20:00', '六日', '034203115'),
              (31, '31.jpeg', '南極冰窖', '後門', '324桃園市平鎮區中央路129-1號', '一 ~ 六 14:00-01:00', '日', '0972957293'),
              (32, '32.jpg', '惟客美而美', '後門', '324桃園市平鎮區中央路127號', '一 ~ 日 5:30-14:00', '無', '034206180'),
              (33, '33.jpg', '萊姆斯早餐', '後門', '324桃園市平鎮區中央路125號', '不定時', NULL, '034201114'),
              (34, '34.jpg', '八方雲集', '後門', '320桃園市中壢區中央路226-1號', '一 ~ 日 11:00-20:00', '無', '034900573'),
              (35, '35.png', 'Backdoor Café', '後門', '320桃園市中壢區中央路216巷9號', '二 ~ 日 12:30-18:00', '一', '034900655'),
              (36, '36.jpeg', 'No.17 White House', '後門', '320桃園市中壢區中央路216巷21號', '一 ~ 五 11:30-14:00, 17:00-19:30', '六日', '034903099'),
              (37, '37.jpeg', '鴻樂', '後門', '320桃園市中壢區中央路216巷25號', '一 ~ 五 11:00-14:00, 17:00-20:00', '六日', '0926566126'),
              (38, '38.png', '馬爾波咖啡', '後門', '320桃園市中壢區中央路216巷68號 ', '一 ~ 日 11:30-20:00', '無', '0920859933'),
              (39, '39.png', '竹香快餐', '後門', '320桃園市中壢區中央路216巷8號', '不定時', NULL, '無'),
              (40, '40.jpg', ' 街角216', '後門', '32051桃園市中壢區中央路216巷6號', '日 ~ 五 11:00-14:00, 17:00-19:30', '六', '0978653123'),
              (41, '41.png', '阿米玲食堂', '後門', '320桃園市中壢區中央路212號', '一 ~ 五 11:30-13:30, 17:00-19:30', '六日', '034204995'),
              (42, '42.png', '樂活堡', '後門', '320桃園市中壢區中央路208號', '一 ~ 六 7:00-14:00', '日', '034203356'),
              (43, '43.png', '歐姆萊思', '後門', '320桃園市中壢區中央路202號', '日 ~ 五 11:30-14:00, 17:00-20:30', '六', '034205705'),
              (44, '44.jpg', '美式早餐屋', '後門', '320桃園市中壢區中央路200號', '一 ~ 日 6:00-13:00', '無', '0965129574'),
              (45, '45.jpg', '珍饌炒飯', '後門', '320桃園市中壢區中央路200號', '一 ~ 五 17:00-20:00', '六日', '無'),
              (46, '46.png', '達啵廚房', '後門', '320桃園市中壢區中央路200-2號', '一 ~ 日 10:00-14:00, 17:00-20:30', '無', '0934033582'),
              (47, '47.png', '家香美食店', '後門', ' 320桃園市中壢區中央路190號', '日 ~ 五 11:30-20:00', '六', '無'),
              (48, '48.png', '香米便當‧自助餐', '後門', '320桃園市中壢區中央路190號', '一 ~ 日 11:00-14:00, 17:00-20:00','無', '0937811130'),
              (49, '49.jpg', '重慶酸辣粉', '後門', '320桃園市中壢區中央路176號', '日 ~ 五 11:30-14:00, 16:30-19:30', '六', '034207133'),
              (50, '50.png', 'Daddy\'s美式餐廳', '後門', '320桃園市中壢區中央路170號', '一 ~ 五 11:30-14:00, 17:00-20:00', '六日', '034905052'),
              (51, '51.png', '熱浪島', '後門', '320桃園市中壢區中央路216巷86弄58-1號', '五 ~ 二 1:00-14:00, 17:00-20:00', '三四', '034909995'),
              (52, '52.jpg', '粥王', '宵夜街', '320桃園市中壢區五興路400號', '一 ~ 五 11:30-20:00', '六日', '0903213305'),
              (53, '53.png', '無人拉麵店', '宵夜街', '320桃園市中壢區五興路345號', '24小時營業', '無', '0955155814'),
              (54, '54.jpg', '滿食記 ', '宵夜街', ' 320桃園市中壢區五興路附近', '日 ~ 五 12:00-14:00, 17:00-20:00', '六', '0933853850'),
              (55, '55.jpg', '東東生鮮手工大水餃', '宵夜街', '320桃園市中壢區五興路', '一 ~ 日 11:30-14:00, 17:00-19:30', '無', '0960772157'),
              (56, '56.png', '夏克堤', '宵夜街', '320桃園市中壢區五興路', '一 ~ 日12:00-23:00', '無', '0912528414'),
              (57, '57.png', '立橙茶飲', '宵夜街', '320桃園市中壢區五興路345號', '一 ~ 日11:30-00:00', '無', ' 0978720021'),
              (58, '58.png', '一億園 ', '宵夜街', '320桃園市中壢區五興路345號', ' 一 ~ 五11:00-19:30', '六日', '無'),
              (59, '59.png', '香城燒臘小館', '宵夜街', '320桃園市中壢區五興路331巷6號', '一 ~ 五 11:00-14:30, 16:30-19:30', '六日', '034205102'),
              (60, '60.png', '立欣影印豆花店', '宵夜街', '320桃園市中壢區五興路331巷6號', '一 ~ 五 12:00-1:00', '六日', '034902938'),
              (61, '61.png', '日船章魚小丸子', '宵夜街', '320桃園市中壢區五興路418號', '不定時', NULL, '0909643599'),
              (62, '62.jpeg', '一品鍋', '宵夜街', '320桃園市中壢區五興路416號', '一 ~ 日 12:00-14:00, 17:00-22:00', '無', '034204258'),
              (63, '63.png', 'Main 蛋', '宵夜街', ' 2樓, No. 416號五興路中壢區桃園市320', '一 ~ 五 20:00-2:00', '六日', '034909868'),
              (64, '64.png', '宵夜屋自助餐', '宵夜街', ' 320桃園市中壢區五興路410號', '一 ~ 五 11:00-19:00', '六日', '無'),
              (65, '65.png', '祐桑手工煎餃', '宵夜街', '320桃園市中壢區五興路400號', '日 ~ 五 11:30-14:00, 17:00-00:00', '六', '0928628360'),
              (66, '66.png', '男子漢生鮮炸雞', '宵夜街', '320桃園市中壢區五興路400號', '一 ~ 五 18:00-1:00', '六日', '0905107301'),
              (67, '67.png', 'Pretty Devil', '宵夜街', '320桃園市中壢區五興路396號', '一 ~ 六 14:00-1:00', '日', '0939552396'),
              (68, '68.png', '惡魔炸蛋', '宵夜街', '320桃園市中壢區五興路398號', '一 ~ 六 14:00-1:00', '日', '0939552396'),
              (69, '69.png', '樵夫關東煮', '宵夜街', '320桃園市中壢區五興路390號', '一 ~ 日11:00-13:30, 17:00-23:30', '無', '0986466663'),
              (70, '70.png', '霸王鹹酥雞', '宵夜街', '320桃園市中壢區五興路390號', '一 ~ 日17:00-1:30', '無', '0931806588'),
              (71, '71.jpg', '比大爺滷味', '宵夜街', '320桃園市中壢區五興路329號', '日 ~ 五17:00-23:30', '六', '0921295342'),
              (72, '72.jpg', '雞叔叔', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (73, '73.jpg', '蜜汁燒烤', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (74, '74.jpg', '宵夜街小籠包', '宵夜街', '320桃園市中壢區五興路331巷1號', '不定時', NULL, '無'),
              (75, '75.png', '緣杏廣東粥飯麵館', '宵夜街', '320桃園市中壢區五興路331巷1號', '一 ~ 六 10:00-14:00, 16:00-21:00', '日' , '0937170121'),
              (76, '76.png', '瑞麟美而美', '宵夜街', '320桃園市中壢區五興路331巷3號', '一 ~ 日 6:00-14:00', '無', '034207617'),
              (77, '77.jpg', '成芳餓舖', '宵夜街', '320桃園市中壢區五興路331巷7號', '一 ~ 日 16:30-23:30', '無', '0955097068'),
              (78, '78.png', '喜樂廚房', '宵夜街', '320桃園市中壢區五興路331巷9號', '一 ~ 日 6:00-14:00', '無', '034908068'),
              (79, '79.jpg', '豪味堡', '宵夜街', '320桃園市中壢區五興路418號', '不定時', NULL, '無'),
              (80, '80.png', '夠義式義大利麵', '宵夜街', '320桃園市中壢區五興路331巷', '一 ~ 五11:30-13:30, 16:30-19:30 ', '六日', '0989953289'),
              (81, '81.jpeg', '25食堂', '宵夜街', '320桃園市中壢區五興路331巷25號', '日 ~ 四 16:30-00:00', '五六', '0958456989'),
              (82, '82.jpeg', '香煎小舖', '宵夜街', '320桃園市中壢區五興路331巷29號', '一 ~ 四 11:30-14:00, 17:00-20:30', '五六日', '0935163925'),
              (83, '83.jpg', '熊讚啦啦舒肥鹹水雞', '宵夜街', '320桃園市中壢區五興路331巷28-2號', '一 ~ 日 17:10', '無', '無'),
              (84, '84.jpg', '來客', '宵夜街', ' 320桃園市中壢區五興路331巷28-2號', '一 ~ 五 11:30-14:00, 17:00-19:30', '六日', '034908961'),
              (85, '85.jpg', '茶繪', '宵夜街', '320桃園市中壢區五興路331巷28-2號', '一 ~ 日 12:00~00:00', '無', '0916550561'),
              (86, '86.jpg', '傻師傅湯包', '宵夜街', '320桃園市中壢區五興路331巷28號', '一 ~ 日 17:00-00:00', '無', '034906763'),
              (87, '87.jpg', '曼尼食坊', '宵夜街', '320桃園市中壢區五興路331巷32號', '一 ~ 日 11:30-14:00, 17:00-20:00', '無', '0921873544'),
              (88, '88.png', '咖哩老師', '宵夜街', '320桃園市中壢區五興路331巷36號', '一 ~ 六 11:30-14:00, 16:30-19:30', '日', '0916811748'),
              (89, '89.jpg', '無敵蛋餅', '宵夜街', '320桃園市中壢區五興路331巷52之1號', '日 ~ 五 18:00-02:30', '六', '0928210319'),
              (90, '90.jpg', '楊滇風南洋料理', '宵夜街', '320桃園市中壢區五興路331巷58號', '一 ~ 日11:30-14:00, 17:00-21:00', '無', '034201666'),
              (91, '91.jpg', 'Sidewalk 人行道蔬食', '宵夜街', '320桃園市中壢區中央路216巷39號', '二 ~ 日11:30-14:30, 16:30-20:00', '一', '034200112'),
              (92, '92.jpg', '小木屋鬆餅 ', '校內', '320桃園市中壢區中大路300號志希館', '一 ~ 日 9:00-19:00', '無', '034265215'),
              (93, '93.jpg', '四海遊龍', '校內', '320桃園市中壢區中大路300號1F男九舍', '一 ~ 五 10:30-20:00', '六日', '034275429'),
              (94, NULL, '吃找餐', '校內', '320桃園市中壢區中大路300號', '一 ~ 五 10:30-20:00', '六日', '無'),
              (95, NULL, '炸雞大師', '校內', '320桃園市中壢區中大路300號', '一 ~ 五11:00-19:30', '六日', '034275571'),
              (96, NULL, '雞霸葷', '校內', '320桃園市中壢區中大路300號', '一 ~ 五 11:00-19:30', '六日', '無'),
              (97, '97.jpg', '王者香', '校內', '320桃園市中壢區中大路300號', '一 ~ 四 11:00-19:00, 五~日11:00-18:00', '無', '034908460'),
              (98, '98(1).jpg', '全家(松苑）', '校內', '320桃園市中壢區中大路300號', '一 ~ 日 8:00-22:00', '無', '034205531 '),
              (99, '99.png', '麥味登', '宵夜街', ' 320桃園市中壢區五興路343號', '一 ~ 五 8:00-14:00', '六日', '無'),
              (100, '100.jpg', 'OK超商', '宵夜街', ' 320桃園市中壢區五興路402號 ', '24小時營業', '無', '032631597 '),
              (101, '101.png', 'LALA Kitchen', '校內', '320桃園市中壢區中央大學松苑餐廳2樓', '三 ~ 日 11:30-21:00', '一二', '034207787'),
              (102, '102.jpeg', '漢堡王', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '一 ~ 日 9:00-20:30', '無', '034200832'),
              (103, '103.png', '路易莎', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '一 ~ 日 8:00-17:30', '無', '034904613'),
              (104, '104.jpeg', '鼎記食堂', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '一 ~ 日 11:00-18:30', '無', '0978098075'),
              (105, '105.jpg', '玖蔦家火山丼飯', '校內', '320桃園市中壢區中大路300號松苑餐廳1樓', '一 ~ 日 11:00-18:00', '無', '0927768982'),
              (106, NULL, '韓式辣炒年糕', '後門', '320桃園市中壢區中央路190號', '不定時', NULL, '無'),
              (107, '107.jpg', '田家牛肉麵', '宵夜街', '320桃園市中壢區五興路408號', '不定時', NULL, '無'),
              (108, '108.png', '巷口咖啡', '後門', '320桃園市中壢區中央路228號之2號 ', '日 ~ 四 11:30-20:00 ', '五六', '0958719480'),
              (109, '109.jpg', '711學央門市', '後門', '324桃園市平鎮區中央路187號', '24小時營業', '無', '034205014'),
              (110, '110.jpg', '全家中壢龍凱店 ', '後門', ' 320桃園市中壢區中央路218號 ', '24小時營業', '無', '034207322'),
              (111, '111.jpg', '食胖碳烤三明治', '後門', ' 320桃園市中壢區中央路208號 ', '一 ~ 日 7:00-14:00', '無', '034906628'),
              (112, '112.jpg', ' 熟檸檬', '後門', '320桃園市中壢區中央路210號', '一 ~ 五 11:30-13:20, 17:00-19:30', '六日', ' 0977407896'),
              (113, '113.jpg', '七武海', '後門', '320桃園市中壢區中央路190號 ', '不定時', NULL, '無'),
              (114, '114.jpg', ' 蘿塔塔', '後門', ' 320桃園市中壢區中央路178號', '日 ~ 五 11:00-14:00, 17:00-22:00', '六', '034900856'),
              (115, '115.jpg', '川川滷味 ', '後門', ' 324桃園市平鎮區中央路145號', '不定時', NULL, '無'),
              (116, '116.jpg', '現蒸湯包', '後門', ' 324桃園市平鎮區中央路157號', '不定時', NULL, '無'),
              (117, '117.jpg', '香恬園食堂', '宵夜街', ' 320桃園市中壢區五興路412號 ', '不定時', NULL, '034902417'),
              (118, '118.jpg', '吉來手作', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (119, '119.jpg', '水果攤', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (120, '120.jpg', '來來熱炒便當 ', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (121, '121.jpg', '饕客', '宵夜街', '320桃園市中壢區五興路335號', '不定時', NULL, '無'),
              (122, '122.jpg', '廣東腸粉', '宵夜街', ' 320桃園市中壢區五興路390號 ', '日 ~ 五 11:30-13:00', '六', '0935097290 '),
              (123, '123.jpg', '388 烤串吧', '宵夜街', '320桃園市中壢區五興路345號', '一 ~ 日 18:00-00:00 ', '無', '無'),
              (124, '124.jpg', '火星旺旺雞蛋糕', '宵夜街', '320桃園市中壢區五興路', '不定時', NULL, '無'),
              (125, '125.png', '甜香而食堂', '校內', '320桃園市中壢區中大路300號', '一 ~ 日 11:00-18:30', '無', '無'),
              (126, '126.png', '飽可麵飯', '校內', '320桃園市中壢區中大路300號', '一 ~ 日 11:00-18:30', '無', '無'),
              (127, '127.png', '緣滾滾', '校內', '320桃園市中壢區中大路300號', '一 ~ 日 11:00-18:30', '無', '無'),
              (128, '128.png', '香米便當(松果)', '校內', '320桃園市中壢區中大路300號(松果餐廳)', '一 ~ 日 11:00-18:30', '無', '無'),
              (129, '129.jpg', '嗑早餐', '校內', '320桃園市中壢區中大路300號', '一 ~ 日 11:00-18:30', '無', '無')";
            $conn->query($sql);
