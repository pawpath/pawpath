<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pawpath</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/tasima.css">
        <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <!--Header-->
            <div class="col-head">
                <div class="col-logo"><img src="../img/logo.png"></div>
                <div class="col-menu">
                    <ul>
                        <li><a href="../php/index.php">Anasayfa</a></li>
                        <li><a href="../php/user-pets.php">Evcil Hayvanlarım</a></li>
                        <li><a href="../php/blog.php">Blog</a></li>
                        <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                    </ul>
                </div>

                <div class="col-user-act">
                <?php
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        echo "<ul>";
        echo "<li><a href='#'>Profilim ($username)</a></li>";
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

            <!--Maps-->
            <div class="col-aboutus-top">
                <img src="../img/haritalarimg.png">
            </div>
            <div class="columns col-maps">
                <h1>Size en yakın veteriner ve<br>petshop'ları bulun!</h1>
                <div class="columns col-maps1">
                <div class="col-vet-map">
                    <h6>Veterinerler: </h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12163.25435609144!2d27.96335410197833!3d40.34648106003898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sveteriner!5e0!3m2!1str!2str!4v1700951801294!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-pet-map">
                    <h6>Petshoplar: </h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12163.248622624464!2d27.963311182699666!3d40.34651285427878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spetshop!5e0!3m2!1str!2str!4v1700952508445!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
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
                            <li><a href="../php/user-pets.php">Evcil Hayvanlarım</a></li>
                            <li><a href="../php/blog.php">Blog</a></li>
                            <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
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