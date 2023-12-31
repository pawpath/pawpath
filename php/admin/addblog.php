<?php
session_start();

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");

if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata: " . $conn->connect_error);
}

// Admin kontrolü
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../php/logout.php"); // Admin değilse başka bir sayfaya yönlendir
    exit();
}

// Blog yazısı eklenmesi
if (isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $target_file = $_POST['image'];


    // Veritabanına blog yazısını ekleme
    $stmt = $conn->prepare("INSERT INTO blog (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $target_file);
    $stmt->execute();
    $stmt->close();
}
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
                    <li><a href="index.php">Anasayfa</a></li>
                    <li><a href="#">Üye işlemleri</a></li>
                    <li><a href="addblog.php">Blog işlemleri</a></li>
                    <li><a href="#">Mesajlar</a></li>

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
                        <li><a href="#">Üye işlemleri</a></li>
                        <li><a href="#">Blog işlemleri</a></li>
                        <li><a href="#">Mesajlar</a></li>
                    
                </div>
            </div>
        </div>
        <div class="columns col-abus-contact col-add-blog">
                <h1 id="ilk">BLOG EKLE</h1>
                <table border="0">
                    <form action="addblog.php" method="POST">
                        <tr>
                            <td colspan="2"><input type="text" name="title" placeholder="Başlık"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="file" name="image" placeholder="Resim"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="content" id="msg"placeholder="İçerik"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit"name="add_blog" value="EKLE"></td>
                        </tr>
                    </form>
                </table>
            </div>
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
                        <li><a href="#">Üye işlemleri</a></li>
                        <li><a href="#">Blog işlemleri</a></li>
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