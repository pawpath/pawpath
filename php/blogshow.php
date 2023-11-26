 <?php
    // Veritabanı bağlantısı
    $conn = new mysqli("localhost", "root", "", "pawpath");

    if ($conn->connect_error) {
        die("Veritabanına bağlanırken hata: " . $conn->connect_error);
    }

    // Sayfalama işlemleri
$postsPerPage = 4; // Her sayfada kaç blog gösterilecek
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Hangi sayfa gösteriliyor
$startFrom = ($page - 1) * $postsPerPage; // Bu sayfa hangi sıradan başlayacak

// Blog yazılarını çekme
$sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT $startFrom, $postsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='blog-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='blog-post'>";
        echo "<h2>{$row['title']}</h2>";
        echo "<p>{$row['content']}</p>";
        echo "<img src='{$row['image']}' alt='Blog Resmi'>";
        echo "</div>";
    }
     // blog-container kapat
} else {
    echo "<p>Henüz blog yazısı bulunmamaktadır.</p>";
}


// Toplam sayfa sayısını bulma
$totalPagesQuery = "SELECT COUNT(*) as total FROM blog";
$totalPagesResult = $conn->query($totalPagesQuery);
$totalPages = ceil($totalPagesResult->fetch_assoc()['total'] / $postsPerPage);

// Sayfalama bağlantıları
echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='blog.php?page=$i'>$i</a> ";
}
echo "</div>";
echo "</div>";
$conn->close();
?>
       