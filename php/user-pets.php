<?php
 session_start();
 if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Kullanıcı girişi yapılmamışsa giriş sayfasına yönlendir
    exit();
} 
$conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
$user_id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addpet'])) {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $pet_age = $_POST["pet_age"];
    $pet_breed = $_POST['pet_breed'];
    $pet_gender = $_POST['pet_gender'];

    $stmt = $conn->prepare("INSERT INTO pets (user_id, pet_name, pet_type, pet_breed, pet_age, pet_gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssss', $user_id, $pet_name, $pet_type, $pet_breed, $pet_age, $pet_gender);
    
    $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

// Kullanıcının evcil hayvan bilgilerini çek
$stmt = $conn->prepare("SELECT pet_id, pet_name, pet_type, pet_breed, pet_gender, pet_age FROM pets WHERE user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($pet_id, $pet_name, $pet_type, $pet_breed, $pet_gender, $pet_age);

$pets = [];
while ($stmt->fetch()) {
    $pets[] = [
        'id' => $pet_id,
        'name' => $pet_name,
        'type' => $pet_type,
        'breed' => $pet_breed,
        'gender' => $pet_gender,
        'age' => $pet_age
    ];
}

// Evcil hayvan bilgilerini kullanarak aşı, alerji ve hastalık bilgilerini çek
$pets_info = [];
foreach ($pets as $pet) {
    $stmt = $conn->prepare("SELECT info_type, info_name, info_date FROM pet_info WHERE pet_id = ?");
    $stmt->bind_param('i', $pet['id']);
    $stmt->execute();
    $stmt->bind_result($info_type, $info_name, $info_date);

    $pet_info = [
        'id' => $pet['id'],
        'vaccines' => [],
        'allergies' => [],
        'diseases' => []
    ];

    while ($stmt->fetch()) {
        $info = [
            'name' => $info_name,
            'date' => $info_date
        ];

        switch ($info_type) {
            case 'vaccine':
                $pet_info['vaccines'][] = $info;
                break;
            case 'allergy':
                $pet_info['allergies'][] = $info;
                break;
            case 'disease':
                $pet_info['diseases'][] = $info;
                break;
        }
    }

    $pets_info[] = $pet_info;


    $pets_and_info = [];
foreach ($pets as $pet) {
    $pet_data = [
        'id' => $pet['id'],
        'name' => $pet['name'],
        'type' => $pet['type'],
        'breed' => $pet['breed'],
        'gender' => $pet['gender'],
        'age' => $pet['age'],
        'info' => []  // Bu kısım, evcil hayvanın aşı, alerji ve hastalık bilgilerini içerecek
    ];

    foreach ($pets_info as $pet_info) {
        if ($pet_info['id'] == $pet['id']) {
            $pet_data['info'] = $pet_info;  // Evcil hayvanın aşı, alerji ve hastalık bilgilerini ekleyin
            break;
        }
    }

    $pets_and_info[] = $pet_data;
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
                    <li><a>Hizmetlerimiz</a>
                        <ul>
                            <li><a href="#">Evcil Hayvanlarım</a></li>
                            <li><a href="#">Anasayfa</a></li>
                            <li><a href="#">Soru & Cevap</a></li>
                        </ul>
                    </li>
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

                <section>
            <div class="columns col-add-pet">
                <div class="col-add-pet-bg">
                    <h1>Evcil Hayvan Ekle</h1>
                    <table border="0" align="center">
                        <form action="../php/user-pets.php" method="POST">
                            <tr>
                                <td colspan="2"><input type="text" name="pet_name"  placeholder="Evcil hayvanın adı"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select name="pet_type">
                                        <option value="">Evcil hayvanın türü</option>
                                        <option value="köpek">Köpek</option>
                                        <option value="kedi">Kedi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select name="pet_breed">
                                        <option value="">Evcil hayvanın cinsi</option>
                                        <option value="golden">golden</option>
                                        <option value="kurt">kurt</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="radiobg">
                                <td><input type="radio"  name="pet_gender" value="D">Dişi</td>         
                                <td><input type="radio"  name="pet_gender" value= "E">Erkek</td>
                            </tr>
                            <tr id="selectbg">
                                <td colspan="2"><input type="text" name="pet_age"  placeholder="Evcil hayvanın yaşı"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="addpet" value="Ekle"></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </section>
    <section>
    <?php foreach ($pets_and_info as $pet_data): ?>
    <div class="columns col-pet">
        <div class="col-pet-bg">
            <div class="col-pet-info">
                <div class="col-pet-info-pp">
                    <img src="" alt="" />
                </div>
                <div class="col-pet-info-text">
                    <h2><?php echo $pet_data['name']; ?></h2>
                    <ul>
                        <li><b>Irkı: </b><span><?php echo $pet_data['type']; ?></span></li>
                        <li><b>Cinsi: </b><span><?php echo $pet_data['breed']; ?></span></li>
                        <li><b>Cinsiyeti: </b><span><?php echo $pet_data['gender']; ?></span></li>
                        <li><b>Yaşı: </b><span><?php echo $pet_data['age']; ?></span></li>
                    </ul>
                    <div>
                        <button class="button btn-pet" name="edit-pet-info">Profili Düzenle</button>
                    </div>
                </div>
            </div>

            <div class="col-pet-health">
                <div>
                    <h1>Sağlık Bilgileri</h1>
                </div>
                <h2>Aşılar</h2>
                <div class="col-pet-vac">
                    <?php foreach ($pet_data['info']['vaccines'] as $vaccine): ?>
                        <div class="pet-vac">
                            <div>
                                <svg id="circle"></svg>
                            </div>
                            <img src="../img/vaccine_icon.png" alt="vaccine_photo" />
                            <h3><?php echo $vaccine['name']; ?></h3>
                            <div>
                                <h4>Son yapılan tarih</h4>
                                <span><?php echo $vaccine['date']; ?></span>
                            </div>
                            <div>
                                <h4>Gelecek Aşı</h4>
                                <!-- Buraya gelecek aşı tarihi eklenebilir -->
                                <span>00.00.0000</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <h2>Alerjiler</h2>
                <div class="col-pet-allergy">
                    <?php foreach ($pet_data['info']['allergies'] as $allergy): ?>
                        <div class="pet-allergy"><h3><?php echo $allergy['name']; ?></h3></div>
                    <?php endforeach; ?>
                </div>

                <h2>Hastalıklar</h2>
                <div class="col-pet-dis">
                    <?php foreach ($pet_data['info']['diseases'] as $disease): ?>
                        <div class="pet-disease">
                            <h3><?php echo $disease['name']; ?></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo beatae alias distinctio aperiam numquam, iusto repellendus.</p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-pet-find-dis">
                    <button class="button btn-disease">Evcil hayvanımın neyi var?</button>
                    <!-- bu buton pop-up butonudur aşağıdaki kodda popup kodudur -->
                </div>
                <div id="popup" class="popup-container">
                    <div class="close-btn" onclick="closePopup()">X</div>
                    <div class="col-popup">
                        <h2>Hastalık Sihirbazı</h2>
                        <div class="col-popup-item">
                        </div>
                    </div>
                </div>
                <script src="../js/popup.js"></script>
                <script>
                    function openPopup() {
                        document.getElementById("popup").style.display = "flex";
                    }

                    function closePopup() {
                        document.getElementById("popup").style.display = "none";
                    }
                </script>
            </div>
        </div>
    </div>
<?php endforeach; ?>
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
</body>
</html>