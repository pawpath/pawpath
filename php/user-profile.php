<?php
session_start();
if (!isset($_SESSION['id'])) {
   header("Location: login.php"); // Kullanıcı girişi yapılmamışsa giriş sayfasına yönlendir
   exit();
} 

$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
$user_id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gonder'])) {
    $name = $_POST['ad'];
    $surname = $_POST['soyisim'];
    $mail = $_POST['mail'];
    $stmt = $conn->prepare("UPDATE users SET name = ?,surname= ?,mail=? WHERE id = ?");
    $stmt->bind_param('sssi', $name, $surname, $mail, $user_id);
    $stmt->execute();
    $stmt->close();
}
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
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="script.js"></script>
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
            <div class="col-user-act col-user-act-vet">
            <?php
    

                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];

                    echo "<ul>";
                    echo "<li><a href='user-profile.php'>Profilim ($username)</a></li>";
                    echo "<li><a href='logout.php'>Çıkış Yap</a></li>";
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
            <img src="../img/profile_banner.png">
        </div>

        <section>
            <div class="columns col-user-profile">
                <div class="col-user-profile-bg">
                    <div class="profile-head">
                        <img src="../img/profile_header.jpg" alt="" />
                    </div>
                    <div class="prof-info">
                        <div class="prof-info-photo">
                            <img src="" alt="" />
                            <h2><?php echo $ad . ' ' . $soyad; ?></h2>
                            <button class="button btn-profile" onclick="openPopup()">Profili Düzenle</button>
                        </div>
                    </div>
                    <button class="button btn-go-pet">Evcil Hayvanları Görüntüle</button>
                </div>
            </div>
        </section>

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


        <div id="popup" class="popup-container-profile">
                     <div class="close-btn" onclick="closePopup()">X</div>
                        <div class="col-popup-profile">
                            <div class="col-popup-item-profile">
                                <form action="" method="POST">
                            <table border="0" align="center">
                                    <tr>
                                        <td>İsim</td>
                                        <td>Soyisim</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="ad" value="<?php echo $ad; ?>"></td>
                                        <td><input type="text" name="soyisim" value="<?php echo $soyad; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td><input type="text" name="mail" value="<?php echo $mail; ?>"></td>
                                    </tr>
                             </table>
                                    <input type="submit" name="gonder" value="Kaydet">
                                </form>
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

<style>
    .popup-container-profile {
  display: none;
  position: fixed;
  width: 50%;
  height: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding:2rem;
  border: 1px solid #ccc;
  border-radius: 1rem;
  background-color: #F0807F;
  z-index: 1000;
}
.col-popup-profile{
  width: 75%;
  height: 250px;
  border-radius: 1rem;
}
.col-popup-item-profile table {
    color:#AC5C5B;
    margin-right:-40px;
    
}
.col-popup-item-profile input[type='submit']
{
    cursor: pointer ;
  font-size: 1.5rem;
  background-color: #AC5C5B;
  color: white;
  font-family: "Dongle-Bold";
  border:none;
  border-radius: 5px; 
  height:2em;
  width: 25%;
  float: right;
}
.col-popup-item-profile input[type='text']
{
    height:2rem;
    background-color:#FFFFFF;
  border-radius: 10px; 
  border-color: #AC5C5B;
  border-width: 0 0 .5em 0;
  border-style: solid;
  font-family: "Coco-Sharp-Regular";
  text-indent: 2em;
}
.col-popup-item-profile input[type='submit']:hover
{
    background: #FFFFFF;
    color:Black;
  transition: 0.5s;
}
    </style>
</body>
</html>