<?php
session_start();

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");

if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata: " . $conn->connect_error);
}

// Admin kontrolü
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.html"); // Admin değilse başka bir sayfaya yönlendir
    exit();
}

// Blog yazısı eklenmesi
if (isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Resim yükleme işlemi (isteğe bağlı)
    $target_dir = "uploads/"; // Resimlerin yükleneceği klasör
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Veritabanına blog yazısını ekleme
    $stmt = $conn->prepare("INSERT INTO blog (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $target_file);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Blog Yazısı Ekle</title>
</head>
<body>
    <h1>Admin Paneli - Blog Yazısı Ekle</h1>

    <!-- Blog yazısı ekleme formu -->
    <form action="addblog.php" method="POST" enctype="multipart/form-data">
        <label for="title">Başlık:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">İçerik:</label>
        <textarea name="content" required></textarea>
        <br>
        <label for="image">Resim:</label>
        <input type="file" name="image">
        <br>
        <button type="submit" name="add_blog">Blog Yazısı Ekle</button>
    </form>
</body>
</html>