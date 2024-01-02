<?php
 session_start();
// Admin kontrolü
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../html/index.html");
    exit();
}

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
$messageuser ="";
// Veteriner onaylama
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if(isset($_POST['case'])){
        $userId = $_POST['userId'];
        $caseType = $_POST['case'];
        if($caseType === "Onayla"){
            $newcase  =  1;
            $stmt = $conn->prepare("UPDATE users SET approved = ? WHERE id = ?");
            $stmt->bind_param("ii", $newcase, $userId);
            if ($stmt->execute()) {
                $messageuser = "Veteriner $caseType işlemi başarıyla gerçekleştirildi!";
            } else {
                $messageuser = "Onaylama sırasında bir hata oluştu: " . $conn->error;
            }

            $stmt->close();
        } elseif ($caseType === "Gerial"){
            $newcase =   0;
            $stmt = $conn->prepare("UPDATE users SET approved = ? WHERE id = ?");
            $stmt->bind_param("ii", $newcase, $userId);
            if ($stmt->execute()) {
                $messageuser = "Veteriner $caseType işlemi başarıyla gerçekleştirildi!";
            } else {
                $messageuser = "Onaylama sırasında bir hata oluştu: " . $conn->error;
            }
        }elseif ($caseType === "Sil"){
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $messageuser = "Kullanıcı başarıyla silindi.";
        }elseif ($caseType ==="Yasakla"){
            $newcase = 1;
            $stmt = $conn->prepare("UPDATE users SET banned = ? WHERE id = ?");
            $stmt->bind_param("ii", $newcase, $userId);
            if ($stmt->execute()) {
                $messageuser = "Kullanıcı Banlandı!";
            } else {
                $messageuser = "Banlama sırasında bir hata oluştu: " . $conn->error;
            }
        }elseif($caseType ==="Yasaklama"){           
            $newcase =0;
            $stmt = $conn->prepare("UPDATE users SET banned = ? WHERE id = ?");
            $stmt->bind_param("ii", $newcase, $userId);
            if ($stmt->execute()) {
                $messageuser = "Kullanıcının Banı Kaldırılmıştır";
            } else {
                $messageuser = "Ban Kaldırma sırasında bir hata oluştu: " . $conn->error;
            }
        }
    }

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
</head>
<body>
    <div class="container">

        <!--Header-->
        <div class="col-head">
            <div class="col-logo"><img src="../../img/logo.png"></div>
            <div class="col-menu">
                <ul>
                    <li><a href="index.php">Anasayfa</a></li>
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
        <h2>Üye İşlemleri</h2>
       
</div>
<div class="col-user-table">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kullanıcı Adı</th>
            <th>Mail</th>
            <th>Onay Durumu</th>
            <th>Role</th>
            <th>Banned</th>
            <th>Onayla</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM users ");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['mail']}</td>";
            echo "<td>{$row['approved']}</td>";
            echo "<td>{$row['role']}</td>";
            echo "<td>{$row['banned']}</td>";
            echo "<td>
                    <form action=\"\" method=\"POST\">
                        <input type=\"hidden\" name=\"userId\" value=\"{$row['id']}\">
                        <input type=\"submit\" name=\"case\" value=\"Onayla\">
                        <input type=\"submit\" name=\"case\" value=\"Gerial\">
                        <input type=\"submit\" name=\"case\" value=\"Sil\">
                        <input type=\"submit\" name=\"case\" value=\"Yasakla\">
                        <input type=\"submit\" name=\"case\" value=\"Yasaklama\">
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php echo "$messageuser"; ?>
    </div>
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