<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pawpath</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="styleseet" href="../css/tasima.css">
        <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
       <style>
  .blog-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.blog-post {
    border: 1px solid #ddd;
    padding: 20px;
}

.blog-post img {
    max-width: 100%;
    height: auto;
}

.pagination {
    text-align:center;
    margin-top: 20px;
}

.pagination a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ddd;
    color: #333;
}

.pagination a:hover {
    background-color: #ddd;
}

        </style>
    </head>
    <body>
        <div class="container">
            <!--Header-->
            <div class="col-head">
                <div class="col-logo"><img src="../img/logo.png"></div>
                <div class="col-menu">
                    <ul>
                        <li><a href="../html/index.html">Anasayfa</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="../html/hakkimizda.html">Hakkımızda</a></li>
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
                        <li><a href="../html/index.html">Anasayfa</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="../html/hakkimizda.html">Hakkımızda</a></li>                  
                    </div>
                </div>
            </div>

            <!--blog-->
            <div class="col-aboutus-top">
                <img src="../img/blogimg.png">
            </div>
            <div class="columns col-blog">
                <!-- Blog yazılarını gösterme -->
                <?php include 'blogshow.php'; ?>
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
                            <li><a href="../html/index.html">Anasayfa</a></li>
                            <li><a href="#">Hizmetlerimiz</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="../html/hakkimizda.html">Hakkımızda</a></li>
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
        </div>
    </body>
</html>