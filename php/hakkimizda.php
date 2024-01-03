<?php 
    session_start();
    $conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gonder'])) {
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['email'];
    $message = $_POST['message'];

     $stmt = $conn->prepare("INSERT INTO `messages`(`user_id`, `name`, `surname`, `mail`, `message`) VALUES (?, ?, ?, ?, ?)");
     $stmt->bind_param('issss',$user_id,$name,$surname,$mail,$message);
     $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fotgonder'])) {
    $message = $_POST['message'];

     $stmt = $conn->prepare("INSERT INTO `messages`(`message`) VALUES (?)");
     $stmt->bind_param('s',$message);
     $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pawpath</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <!--Header-->
            <div class="col-head">
                <div class="col-logo"><img src="../img/logo.png"></div>
                <div class="col-menu open-menu">
                <ul>
                    <li><a href="../php/index.php">Anasayfa</a></li>
                    <li><a href="../php/user-pets.php">Evcil Hayvanlarım</a></li>
                    <li><a href="../php/blog.php">Blog</a></li>
                    <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                </ul>
            </div>
                <div class="col-user-act">
                <?php
 

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        echo "<ul>";
        echo "<li><a href='user-profile.php'>Profilim ($username)</a></li>";
        echo "<li><a href='../php/logout.php'>Çıkış Yap</a></li>";
        echo "</ul>";
    } else {
        echo "<ul>";
        echo "<li><a href='../php/login.php'>Giriş Yap</a></li>";
        echo "<li><a href='../php/register.php'>Kayıt Ol</a></li>";
        echo "</ul>";
    }
    ?>

                    <input type="checkbox" id="check">
                    <label for="check">
                        <i class="fas fa-bars" id="btn"></i>
                        <i class="fas fa-times" id="cancel"></i>
                    </label>

                    <div class="sidebar">
                        <header>PawPath</header>
                        <li><a href="../php/index.php">Anasayfa</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                        <li><a href="../php/blog.php">Blog</a></li>
                        <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>                  
                    </div>
                </div>
            </div>

            <!--Hakkımızda-->
            <div class="col-aboutus-top">
                <img src="../img/hakkımızdaimg.png">
            </div>
            <div class="columns col-abus">
                <div class="col-abus1">
                    <h3>PawPath’e hoş geldiniz!</h3>
                    <span>Evcil Dostlarınız İçin Bilgiye ve Bakıma Adanmış Eşsiz Bir Kaynak!</span>
                    <nav>
                        <label for="touch"><p>Sitemizin Ana Odak Noktası Nedir?</p></label>               
                        <input type="checkbox" id="touch"> 
                        <ul class="slide">
                            <li> Sitemizin ana odak noktası, evcil hayvan sahiplerine evcil dostlarının sağlığını, bakımını ve mutluluğunu en iyi şekilde sağlamaları için rehberlik etmektir.</li> 
                        </ul>
                    </nav>

                    <nav>
                        <label for="touch1"><p>Sitemizde hangi tür evcil hayvanlar için bilgiler bulunmaktadır?</p></label>               
                        <input type="checkbox" id="touch1"> 
                        <ul class="slide">
                            <li> Sitemizde köpeklerden kedilere, kuşlardan hamsterlere kadar birçok farklı evcil hayvan türü için bakım rehberleri, sağlık önerileri ve aşı takibi araçları bulunmaktadır.</li> 
                        </ul>
                    </nav>
                    <nav>
                        <label for="touch2"><p>Aşı takibi özelliği nasıl işler?</p></label>               
                        <input type="checkbox" id="touch2"> 
                        <ul class="slide">
                            <li> Aşı takibi özelliği, evcil hayvanınızın aşı takvimini ve güncel aşı gereksinimlerini kaydetmenize ve takip etmenize olanak tanır, böylece evcil dostlarınızın sağlıklarını kolayca koruyabilirsiniz.</li> 
                        </ul>
                    </nav>
                </div>
      
                <div class="col-abus2">
                    <img src="../img/hakkımızda-first.png">
                </div>
            </div>
        
            <div class="columns col-abus-contact">
                <h1 id="ilk">Bize Ulaşın</h1>
                <h3 id="iki">Sorularınız mı var ? Bizimle İletişime Geçin!</h3>
                <table border="0">
                    <form action="" method="POST">
                        <tr>
                            <td><input type="text" name="name" placeholder="Adınız"></td>
                            <td><input type="text" name="surname" placeholder="Soyadınız"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="email" placeholder="E-mail adresiniz"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="message" id="msg"placeholder="Mesajınızı buraya bırakın!"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="gonder" value="Gönder"></td>
                        </tr>
                    </form>
                </table>
            </div>

            <!--Footer-->
            <div class="col-footer col-footer-bg">
                <div class="col-footer1">
                    <div class="col-left">
                        <img src="../img/logo.png"><br>
                        <p>Siz de evcil dostlarınızın sağlığını ve mutluluğunu önemsiyorsanız, doğru adrestesiniz! Evcil hayvanlarınızın hayat kalitesini artırmak ve sağlıklarını korumak için bizimle adım atın!</p>
                    </div>

                    <div class="col-center">
                        <h2>Servislerimiz</h2>
                        <ul>
                            <li><a href="../php/index.php">Anasayfa</a></li>
                            <li><a href="#">Hizmetlerimiz</a></li>
                            <li><a href="../php/blog.php">Blog</a></li>
                            <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                        </ul>
                    </div>
                    <div class="col-right">
                        <h6>Geri Dönüşleriniz Bizim İçin Önemli!</h6>
                            <form action="" method="POST">
                                <textarea type="text" id="footertext" name="messagefot" placeholder="Mesajınızı Buraya Bırakabilirsiniz"></textarea>
                                <button type="submit" id="footerbtn" name="fotgonder">Gönder</button>
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