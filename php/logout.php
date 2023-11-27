
<?php
session_start();

// Çıkış yapma işlemi
session_unset(); // Oturum değişkenlerini temizle
session_destroy(); // Oturumu sonlandır

// Başlangıç sayfasına yönlendirme
header("Location: ../php/index.php");
exit();
?>
