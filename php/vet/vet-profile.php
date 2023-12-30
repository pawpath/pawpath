<?php
session_start();

// Veteriner oturumu kontrolü
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'veterinarian') {
    header("Location: ../logout.php"); // Veteriner değilse başka bir sayfaya yönlendir
    exit();
}

$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");

// $_SESSION['id'] tanımlı mı kontrolü
$kullanici_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($kullanici_id !== null) {
    $stmt = $conn->prepare("SELECT name , surname FROM users WHERE id = ?");
    $stmt->bind_param('i', $kullanici_id);
    $stmt->execute();
    
    // bind_result kullanarak sütunları al
    $stmt->bind_result($ad, $soyad);
    
    // fetch ile sorgudan verileri çek
    $stmt->fetch();
    
    $stmt->close();
} else {
    // $_SESSION['id'] tanımlı değilse bir hata mesajı veya başka bir işlem yapabilirsiniz.
    echo "Kullanıcı ID tanımlı değil.";
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
                    <li><a href="#">Hasta Bilgi</a></li>
                    <li><a href="../php/blog.php">Blog</a></li>
                    <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
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

        <div class="col-aboutus-top">
            <img src="../../img/vet-profile-banner.png">
        </div>

        <section>
            <div class="columns col-vet-profile">
                <div class="col-vet-profile-bg">
                    <div class="vet-profile-head">
                        <img src="../../img/vet-profile-header.jpg" alt="" />
                    </div>
                    <div class="vet-prof-info">
                        <div class="vet-prof-info-photo">
                            <img src="" alt="" />
                            <h2><?php echo $ad . ' ' . $soyad; ?></h2>
                            <button class="button btn-vet-profile" onclick="openPopup()">Profili Düzenle</button>
                        </div>
                        <!-- <div>
                             popup alanı 
                            <div>
                                <img src="" alt="" />
                                <button>Fotoğrafı Değiştir</button>
                            </div>
                            <form>
                                <div>
                                    <div>
                                        <label for="">İsim</label>
                                        <input type="text" />
                                    </div>
                                    <div>
                                        <label for="">Soyisim</label>
                                        <input type="text" />
                                    </div>
                                    <div>
                                        <label for="">E-mail</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <button>Kaydet</button>
                            </form>
                        </div>-->
                    </div>
                    <button class="button btn-vet-health">Sağlık Bilgileri Görüntüle</button>
                </div>
            </div>
        </section>

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
                        <li><a href="../php/index.php">Anasayfa</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                        <li><a href="../php/blog.php">Blog</a></li>
                        <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
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
        <div id="popup" class="popup-container">
                     <div class="close-btn" onclick="closePopup()">X</div>
                        <div class="col-popup">
                            <h2>Profili düzenle</h2>
                            <div class="col-popup-item">
                                
                            </div>
                        </div>
                    </div>
                <script src="../js/popup.js"></script>
        </div>
        <script>
    function openPopup() {
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
</body>
</html>