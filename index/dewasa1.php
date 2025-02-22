<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk membaca buku kategori fiksi
function readDewasaBooks($conn) {
    $sql = "SELECT * FROM books WHERE category='Dewasa'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$fiksi_books = readDewasaBooks($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Dewasa - Perpustakaan Bersama</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1>Perpustakaan Bersama</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Beranda</a></li>
            <li><a href="../layanan1.php">Layanan</a></li>
            <li><a href="../login.php">Login</a></li>
        </ul>
    </nav>
    <div class="container">
        <aside>
            <h2>Kategori Buku</h2>
            <ul>
                <li><a href="fiksi1.php"><i class="fas fa-book"></i> Fiksi</a></li>
                <li><a href="non-fiksi1.php"><i class="fas fa-book-open"></i> Non-Fiksi</a></li>
                <li><a href="anak1.php"><i class="fas fa-child"></i> Anak</a></li>
                <li><a href="remaja1.php"><i class="fas fa-user-graduate"></i> Remaja</a></li>
                <li><a href="dewasa1.php"><i class="fas fa-user"></i> Dewasa</a></li>
            </ul>
        </aside>
        <main>
            <h2>Kategori Dewasa</h2>
            <table>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                </tr>
                <?php foreach ($fiksi_books as $book): ?>
                    <tr>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['published_year']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Perpustakaan Bersama. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>