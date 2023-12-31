<?php
 session_start();
 if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'veterinarian') {
  header("Location: ../logout.php"); // Veteriner değilse başka bir sayfaya yönlendir
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawpath</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">

        <!--Header-->
        <div class="col-head col-head-vet">
            <div class="col-logo"><img src="../../img/logo-vet.png"></div>
            <div class="col-menu col-menu-vet">
                <ul>
                    <li><a href="vet-index.php">Anasayfa</a></li>
                    <li><a href="vet-pet-info.php">Hasta Bilgi</a></li>
                    <li><a href="vet-blog.php">Blog</a></li>
                    <li><a href="vet-hakkimizda.php">Hakkımızda</a></li>
                </ul>
            </div>
            <div class="col-user-act col-user-act-vet">
            <?php
    

                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];

                    echo "<ul>";
                    echo "<li><a href='vet-profile.php'>Profilim ($username)</a></li>";
                    echo "<li><a href='../logout.php'>Çıkış Yap</a></li>";
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
        <!--İlk Tanıtım-->
        <div class="columns col-intro col-intro-bg col-intro-bg-vet">
            <div class="col col-intro-1"><img src="../../img/tanıtımimg.png"></div>
            <div class="col col-intro-2 col-intro-2-vet">
                <h2>Evcil Dostlarınızın İyi Bakımı:</h2>
                <h1>Onların <span class="accent-color-vet">Sağlığı, Mutluluğu</span> ve <span class="accent-color-vet">Sizin İçin</span> En İyi Kaynak!</h1>
                <p>Siz de evcil dostlarınızın sağlığını ve mutluluğunu önemsiyorsanız, doğru adrestesiniz! Aşı takip, günlük bakım, eğitim, sağlık önerileri ve daha fazlasını keşfedin. Evcil hayvanlarınızın hayat kalitesini artırmak ve sağlıklarını korumak için bizimle adım atın!</p>
                <a href="vet-hakkimizda.php" class="button btn-mid-vet">Detaylar</a>
            </div>
        </div>

        <!--Hakkımızda-->
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
                <img src="../../img/hakkımızda-first.png">
            </div>

        </div>

        <!--Footer-->
        <div class="col-footer col-footer-bg">
            <div class="col-footer1">
                <div class="col-left">
                    <img src="../../img/logo.png"><br>
                    <p>Siz de evcil dostlarınızın sağlığını ve mutluluğunu önemsiyorsanız, doğru adrestesiniz! Evcil hayvanlarınızın hayat kalitesini artırmak ve sağlıklarını korumak için bizimle adım atın!</p>
                </div>
                <div class="col-center">
                    <h2>Servislerimiz</h2>
                    <ul>
                        <li><a href="vet-index.php">Anasayfa</a></li>
                        <li><a href="vet-pet-info.php">Hasta Bilgi</a></li>
                        <li><a href="vet-blog.php">Blog</a></li>
                        <li><a href="vet-hakkimizda.php">Hakkımızda</a></li>
                    </ul>
                </div>
                <div class="col-right">
                    <h6>Geri Dönüşleriniz Bizim İçin Önemli!</h6>
                    <form>
                        <textarea type="text" id="footertext" placeholder="Mesajınızı Buraya Bırakabilirsiniz"></textarea>
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
</body>
</html>