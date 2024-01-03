<?php
 session_start();
 if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'veterinarian') {
  header("Location: ../logout.php"); // Veteriner değilse başka bir sayfaya yönlendir
  exit();
 }
 $conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");

function findUserByUsername($username) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getPetsByUserId($userId) {
    global $conn;

    $sql = "SELECT * FROM pets WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $pets = array();
    while ($row = $result->fetch_assoc()) {
        $pets[] = $row;
    }

    return $pets;
}

$searchUsername = "";
$userPets = array();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchUser'])) {
    $searchUsername = $_POST['searchUsername'];

    // Kullanıcıyı bul
    $foundUser = findUserByUsername($searchUsername);

    if ($foundUser) {
        $userId = $foundUser['id'];

        // Kullanıcının evcil hayvanlarını getir
        $userPets = getPetsByUserId($userId);
    } else {
        // Kullanıcı bulunamazsa hata mesajı
        $error = "Kullanıcı bulunamadı.";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addInfo'])) {
    $petId = $_POST['petId'];
    $infoType = $_POST['infoType'];
    $infoName = $_POST['infoName'];
    $infoDate = $_POST['infoDate'];

    addPetInfo($petId, $infoType, $infoName, $infoDate);
}
function addPetInfo($petId, $infoType, $infoName, $infoDate) {
    global $conn;

    // Aşı, alerji ya da hastalık bilgisi eklemek için SQL sorgusu
    $sql = "INSERT INTO pet_info (pet_id, info_type, info_name, info_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $petId, $infoType, $infoName, $infoDate);
    
    // SQL sorgusunu çalıştır
    if ($stmt->execute()) {
        echo "Bilgi başarıyla eklendi.";
    } else {
        echo "Bilgi eklenirken bir hata oluştu.";
    }

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
       <!-- container -->

       <section>
    <div class="columns col-search-user">
        <div>
            <h1>Kullanıcı Ara</h1>
        </div>
        <form method="POST" action="">
            <input type="text" name="searchUsername" placeholder="Kullanıcı Adı" value="<?php echo $searchUsername; ?>">
            <button type="submit" name="searchUser">Ara</button>
        </form>
        <?php if (isset($error)) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (isset($foundUser)) : ?>
        <h2><?php echo $foundUser['username']; ?> Kullanıcısının Evcil Hayvanları</h2>
        <table border="1">
            <tr>
                <th>Ad</th>
                <th>Tür</th>
                <th>Cins</th>
                <th>Cinsiyet</th>
                <th>Yaş</th>
                <th>İşlemler</th>
            </tr>

            <?php foreach ($userPets as $pet): ?>
                <tr>
                    <td><?php echo $pet['pet_name']; ?></td>
                    <td><?php echo $pet['pet_type']; ?></td>
                    <td><?php echo $pet['pet_breed']; ?></td>
                    <td><?php echo $pet['pet_gender']; ?></td>
                    <td><?php echo $pet['pet_age']; ?></td>
                    <td>
                        <form method="POST" action="">
                        <input type="hidden" name="petId" value="<?php echo $pet['pet_id']; ?>">

                            <!-- Bilgi türü seçimi -->
                            <label for="infoType">Bilgi Türü:</label>
                            <select name="infoType" required>
                                <option value="vaccine">Aşı</option>
                                <option value="allergy">Alerji</option>
                                <option value="disease">Hastalık</option>
                            </select>

                            <label for="infoName">Bilgi Adı:</label>
                            <input type="text" name="infoName" required>
                            <label for="infoDate">Bilgi Tarihi:</label>
                            <input type="date" name="infoDate" required>
                            <button type="submit" name="addInfo">Bilgi Ekle</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
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
</body>
</html>