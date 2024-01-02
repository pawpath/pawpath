<?php  session_start(); 

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
    <style>
        .col-abus-info{
            padding-top: 4em;
            flex-direction: row;
            text-align: center;
            justify-content: space-between;
            margin-bottom: 5em;
        }
        .col-abus-disease{
            background-color: #ffffff;
            width: 23%;
            height: 15em;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 30px;
            border-width: .25em 0 .25em .5em;
            border-style: solid;
            border-color: #F08080;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.236)
        }
        .col-abus-disease-title h3 {
            font-family: "Dongle-Bold";
            color: #000000;
            font-size: 2em;
            margin: 0;
            padding: 0 .5em;
            line-height: 2.5rem;
        }
        .col-abus-disease-info {

        }
        .col-abus-disease-info p {
            font-family: "Coco-Sharp-Regular";
            text-decoration: none;
            margin: 0 .25em;
            padding: 0;
            font-size: .9rem;
            color: #000000;
        }
        .col-abus-vac{
            background-color: #ffffff;
            width: 23%;
            height: 15em;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 30px;
            border-width: .25em .25em .25em .25em;
            border-style: solid;
            border-color: #8EBC38;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.236)
        }
        .col-abus-vac-title h3 {
            font-family: "Dongle-Bold";
            color: #000000;
            font-size: 2em;
            margin: 0;
            padding: 0 .5em;
            line-height: 2.5rem;
        }
        .col-abus-vac-info {

        }
        .col-abus-vac-info p {
            font-family: "Coco-Sharp-Regular";
            text-decoration: none;
            margin: 0 .25em;
            padding: 0;
            font-size: .9rem;
            color: #000000;
        }
        .col-abus-petcare{
            background-color: #ffffff;
            width: 23%;
            height: 15em;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 30px;
            border-width: .25em .25em .25em .25em;
            border-style: solid;
            border-color: #168AAD;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.236)
        }
        .col-abus-pet-title h3 {
            font-family: "Dongle-Bold";
            color: #000000;
            font-size: 2em;
            margin: 0;
            padding: 0 .5em;
            line-height: 2.5rem;
        }
        .col-abus-pet-info {
        }
        .col-abus-pet-info p {
            font-family: "Coco-Sharp-Regular";
            text-decoration: none;
            margin: 0 .25em;
            padding: 0;
            font-size: .9rem;
            color: #000000;
        }
        .col-abus-map{
            background-color: #ffffff;
            width: 23%;
            height: 15em;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 30px;
            border-width: .25em .5em .25em 0;
            border-style: solid;
            border-color: #EF9826;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.236)
        }
        .col-abus-map-title h3 {
            font-family: "Dongle-Bold";
            color: #000000;
            font-size: 2em;
            margin: 0;
            padding: 0 .5em;
            line-height: 2.5rem;
        }
        .col-abus-map-info {
        }
        .col-abus-map-info p {
            font-family: "Coco-Sharp-Regular";
            text-decoration: none;
            margin: 0 .25em;
            padding: 0;
            font-size: .9rem;
            color: #000000;
        }
    </style>
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

        <!--İlk Tanıtım-->
        <div class="columns col-intro col-intro-bg">
            <div class="col col-intro-1"><img src="../img/tanıtımimg.png"></div>
            <div class="col col-intro-2">
                <h2>Evcil Dostlarınızın İyi Bakımı:</h2>
                <h1>Onların <span class="accent-color">Sağlığı, Mutluluğu</span> ve <span class="accent-color">Sizin İçin</span> En İyi Kaynak!</h1>
                <p>Siz de evcil dostlarınızın sağlığını ve mutluluğunu önemsiyorsanız, doğru adrestesiniz! Aşı takip, günlük bakım, eğitim, sağlık önerileri ve daha fazlasını keşfedin. Evcil hayvanlarınızın hayat kalitesini artırmak ve sağlıklarını korumak için bizimle adım atın!</p>
                <a href="#" class="button btn-mid">Detaylar</a>
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
                <img src="../img/hakkımızda-first.png">
            </div>
        </div>

        <div class="columns col-abus-info">
            <div class="col-abus-disease">
                <div class="col-abus-disease-title"><h3>Hastalık Sihirbazı</h3></div>
                <div class="col-abus-disease-info"><p>Hastalık sihirbazı özelliği ile evcil hayvanlarınızın sağlığını daha yakından takip edebilir, hastalık belirtileri hakkında bilgi alabilirsiniz.</p></div>
            </div>
        
            <div class="col-abus-vac">
                <div class="col-abus-vac-title"><h3>Aşı Takip</h3></div>
                <div class="col-abus-vac-info"><p>Sitemizdeki aşı takip özelliği, evcil hayvanlarınızın aşı takvimini düzenli olarak takip etmenizi ve sağlık durumlarını en iyi şekilde korumanızı sağlar.</p></div>
            </div>
            <div class="col-abus-petcare">
                <div class="col-abus-pet-title"><h3>Hayvan Bakımı</h3></div>
                <div class="col-abus-pet-info"><p>Hayvan bakımı konusundaki kapsamlı bloglarımız ve ipuçları ile evcil dostlarınızın sağlığını ve mutluluğunu en iyi şekilde destekleyin.</p></div>
            </div>
            <div class="col-abus-map">
                <div class="col-abus-map-title"><h3>Petshop & Veteriner</h3></div>
                <div class="col-abus-map-info"><p>Yakındaki petshop'ları ve veterinerleri görebilme özelliği sayesinde evcil dostlarınıza en yakın hizmet sağlayıcıları kolayca bulun ve onların ihtiyaçlarını hızlıca karşılayın.</p></div>
            </div>
        </div>

        <div class="col-aboutus-top">
            <img src="../img/index-pattern.png">
        </div>

        <!--Hizmetlerimiz-->
        <div class="columns col-services">
            <h2>Hizmetlerimiz</h2><br>
            <h1>Kusursuz Evcil Hayvan Hizmetleri</h1>
        </div>

        <div class="columns col-services-1">
            <div class="col-serv-vaccine">
                <div class="col-serv-vac-mid"><p>Aşı Takibi</p></div>
                <div class="col-serv-vac-sub"><a href="#">Detaylar</a></div>
            </div>
            <div class="col-serv-disease">
                <div class="col-serv-dis-mid"><p>Hastalık Sihirbazı</p></div>
                <div class="col-serv-dis-sub"><a onclick="openPopup()">Detaylar</a></div> 
            </div>
            <div class="col-serv-faqs">
                <div class="col-serv-faq-mid"><p>Soru & Cevap</p></div>
                <div class="col-serv-faq-sub"><a href="#">Detaylar</a></div>
            </div>
        </div>
        <div class="columns col-services-2">
            <div class="col-serv-mypets">
                <div class="col-serv-pet-mid"><p>Evcil Hayvanlarım</p></div>
                <div class="col-serv-pet-sub"><a href="#">Detaylar</a></div>
            </div>
            <div class="col-serv-petshop">
                <div class="col-serv-petshop-mid"><p>Yakındaki Petshoplar</p></div>
                <div class="col-serv-petshop-sub"><a href="../php/maps.php">Detaylar</a></div>
            </div>
            <div class="col-serv-vets">
                <div class="col-serv-vet-mid"><p>Yakındaki Veterinerler</p></div>
                <div class="col-serv-vet-sub"><a href="../php/maps.php">Detaylar</a></div>
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
                            <h2>Hastalık Sihirbazı</h2>
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