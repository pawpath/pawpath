<?php 
    session_start();
    $conn = new mysqli("localhost", "root", "", "pawpath");
$conn->set_charset("utf8");
$blog_id = $_GET['blog_id'];
$stmt = $conn->prepare("SELECT image, content, title FROM blog WHERE blog_id = ?");
$stmt->bind_param('i', $blog_id);
$stmt->execute();
$stmt->bind_result($image, $content, $title);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pawpath</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://kit.fontawesome.com/b1573057bf.js" crossorigin="anonymous"></script>
        <style>
            .col-blog{
  flex-direction: column;
  justify-content: center;
  align-items: center ;

}
.col-blog-img img{
    margin-top: 4em;
  width: 100%;
}
.col-blog-content{
    text-align: center;
  width: 100%;
  margin-bottom: 3em;
}
.col-blog-content h1{
    text-align: center;
    font-size: 3rem;
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

            <!--blog-details-->
            <div class="columns col-blog">
            <div class="col-blog-img">
        <img src="../blogimg/<?php echo $image; ?>" alt="Blog Image">
    </div>
    <div class="col-blog-content">
        <?php echo "<h1>$title</h1>" . "<br>". $content; ?>
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
                            <form action="" method="POST">
                                <textarea type="text" id="footertext" name="messagefot" placeholder="Mesajınızı Buraya Bırakabilirsiniz"></textarea>
                                <button type="submit" id="footerbtn" name="fotgonder">Gönder</button>
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