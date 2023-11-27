<?php
session_start();
// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kaydet'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $role = ($_POST['select'] == 'E') ? 'user' : 'veterinarian';
    $approved = ($_POST['select'] == 'E') ? 1 : 0;
    //kontrol
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR mail = ?");
    $stmt->bind_param("ss", $username, $mail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $regmessage = "Bu kullanıcı adı veya e-posta zaten kullanılmaktadır. Lütfen farklı bir kullanıcı adı veya e-posta seçin.";
    } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Veritabanına kullanıcıyı ekleme
    $stmt = $conn->prepare("INSERT INTO users (username, mail,name,surname,password,role,approved) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $username, $mail,$name,$surname,$hashedPassword,$role,$approved);
    $stmt->execute();

    $regmessage ="Kayıt başarıyla tamamlandı!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a href="#">Hizmetlerimiz</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                </ul>
            </div>
            <div class="col-user-act">
                <ul>
                    <li><a href="../php/login.php">Giriş Yap</a></li>
                    <li><a href="../php/register.php">Kayıt Ol</a></li>
                </ul>

                <input type="checkbox" id="check">
                <label for="check">
                    <i class="fas fa-bars" id="btn"></i>
                    <i class="fas fa-times" id="cancel"></i>
                </label>

                <div class="sidebar">
                    <header>PawPath</header>
                    
                        <li><a href="../php/index.php">Anasayfa</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                    
                </div>
            </div>
        </div>
        <div class="columns col-register">
            <div class="col-reg-bg">
                <h1>Kayıt Ol</h1>
                    <?php if (isset($regmessage)): ?>
                        <p><?php echo $regmessage; ?></p>
                    <?php endif; ?>
                <table border="0" align="center">
                <form action="../php/register.php" method="POST">
                        <tr>
                            <td colspan="2"><input type="text" name="name"  placeholder="Ad"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="surname"  placeholder="Soyad"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="username" placeholder="Kullanıcı Adı"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="mail" placeholder="Mail Adresi"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="password" name="password" placeholder="Şifre"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="password" name="re-password" placeholder="Şifrenizi Doğrulayın"></td>
                        </tr>
                        <tr id="radiobg">
                            <td ><input type="radio"  name="select" value="E" >Evcil Hayvan Sahibiyim</td>         
                            <td><input type="radio"  name="select" value= "V">Veterinerim</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="kaydet" value="Kayıt Ol" ></td>
                        </tr>
                </form>
            </table>
            <h6>Zaten hesabınız var mı ?</h6>
            <h6><a href="../php/login.php">Giriş Yap</a></h6>
        </div>
        </div>
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
                        <li><a href="#">Blog</a></li>
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