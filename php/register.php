<?php


session_start();

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "pawpath");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kaydet'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $mail = $_POST['username'];
    $password = $_POST['username'];
    $sec = $_POST['select'];

    // Şifreyi hashleme
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Veritabanına kullanıcıyı ekleme
    $stmt = $conn->prepare("INSERT INTO users (username, mail,name,surname,sec,password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $mail,$name,$surname,$sec,$hashedPassword);
    $stmt->execute();

    echo "Kayıt başarıyla tamamlandı!";
}
?>