<?php
session_start();

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR mail = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Kullanıcı banlı mı kontrolü
        if ($user['banned'] == 1) {
            $logmessage = "Bu hesap banlı. Giriş yapılamaz.";
        } else {
            // Şifre kontrolü
            if (password_verify($password, $user['password'])) {
                if ($user['role'] === 'veterinarian') {
                    // Veteriner ise onay durumunu kontrol et
                    if ($user['approved'] == 1) {
                        // Onay durumu 1 ise giriş yap
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['role'] = $user['role'];
                        header("Location: ../php/vet/vet-index.php");
                    } else {
                        // Onay durumu 0 ise hata mesajı
                        $logmessage = "Veteriner hesabınız henüz onaylanmamış.";
                    }
                } else {
                    // Diğer kullanıcılar için onay kontrolü yapma
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['id'] = $user['id'];
                    if ($user['role'] === 'admin') {
                        header("Location: ../php/admin/index.php");
                        exit();
                    }else{
                        header("Location: ../php/index.php");
                        exit();
                    }
                }
            } else {
                $logmessage = "Kullanıcı adı, e-posta veya şifre hatalı!";
            }
        }
    } else {
        $logmessage = "Kullanıcı adı, e-posta veya şifre hatalı!";
    }

    $stmt->close();
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawpath</title>
    <link rel="stylesheet" href="../css/style.css">
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
                    
                        <li><a href="../php/login.php">Anasayfa</a></li>
                        <li><a href="../php/user-pets.php">Evcil Hayvanlarım</a></li>
                        <li><a href="../php/blog.php">Blog</a></li>
                        <li><a href="../php/hakkimizda.php">Hakkımızda</a></li>
                    
                </div>
            </div>
        </div>
        <div class="columns col-register">
            <div class="col-reg-bg">
                <h1>Giriş Yap</h1>
                <?php if (isset($logmessage)): ?>
                         <p><?php echo $logmessage; ?></p>
                    <?php endif; ?>
                <table border="0" align="center">
                <form action="../php/login.php" method="POST">
                        <tr>
                            <td colspan="2"><input type="text" name="identifier"  placeholder="Kullanıcı Adı veya Mail"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="password" name="password" placeholder="Şifre"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="login" value="Giriş Yap" ></td>
                        </tr>
                </form>
            </table>
            <h6>Kayıtlı hesabınız yok mu ?</h6>
            <h6><a href="../php/register.php">Kayıt Ol</a></h6>
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