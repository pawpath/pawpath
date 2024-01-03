<?php
 session_start();
 if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../php/logout.php"); // Admin değilse başka bir sayfaya yönlendir
  exit();
}
$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawpath</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/tasima.css">
    <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <!--Header-->
        <div class="col-head">
            <div class="col-logo"><img src="../../img/logo.png"></div>
            <div class="col-menu">
                <ul>
                    <li><a href="adduser.php">Üye işlemleri</a></li>
                    <li><a href="addblog.php">Blog işlemleri</a></li>
                    <li><a href="messages.php">Mesajlar</a></li>
                </ul>
            </div>
            <div class="col-user-act">
                <ul>
                    <li><a href="../../php/logout.php">Çıkış Yap</a></li>
                </ul>

                <input type="checkbox" id="check">
                <label for="check">
                    <i class="fas fa-bars" id="btn"></i>
                    <i class="fas fa-times" id="cancel"></i>
                </label>

                <div class="sidebar">
                    <header>PawPath</header>
                    
                        <li><a href="index.php">Anasayfa</a></li>
                        <li><a href="adduser.php">Üye işlemleri</a></li>
                        <li><a href="addblog.php">Blog İşlemleri</a></li>
                        <li><a href="messages.php">Mesajlar</a></li>
                    
                </div>
            </div>
        </div>
        <div class="columns col-users">
            <div class="col-userhead">
        <h2>Mesajlar</h2>
       
</div>
        <div class="col-user-table">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>Mail</th>
                <th>Mesajı</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM messages ");
    
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['user_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['surname']}</td>";
                echo "<td>{$row['mail']}</td>";
                echo "<td>{$row['message']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div></div>
        <div class="col-footer col-footer-bg">
            <div class="col-footer1">
                <div class="col-left">
                    <img src="../../img/logo.png"><br>
                    <p>Siz de evcil dostlarınızın sağlığını ve mutluluğunu önemsiyorsanız, doğru adrestesiniz! Evcil hayvanlarınızın hayat kalitesini artırmak ve sağlıklarını korumak için bizimle adım atın!</p>
                </div>
                <div class="col-center">
                    <h2>Servislerimiz</h2>
                    <ul>
                        <li><a href="index.php">Anasayfa</a></li>
                        <li><a href="#">Üye İşlemleri</a></li>
                        <li><a href="#">Blog İşlemleri</a></li>
                        <li><a href="#">Mesajlar</a></li>
                    </ul>
                </div>
                <div class="col-right">
                    <h6>Geri Dönüşleriniz Bizim İçin Önemli!</h6>
                    <form>
                        <input type="text" id="footertext" placeholder="Mesajınızı Buraya Bırakabilirsiniz" />
                        <button type="submit" id="footerbtn">Gönder</button>
                    </form>
                </div>
            </div>
            <div class="col-footer-hr"><hr></div>
            <div class="col-footer2">
                <div class="col-copy">
                    <h4>Gizlilik Politikası</h4>
                    <h4>Hizmet Şartları</h4>
                    <h4>Tasarım ve Altyapı BGY</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>