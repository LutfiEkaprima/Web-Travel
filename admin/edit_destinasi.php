<?php
include '../db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: kelola_destinasi_wisata.php');
    exit;
}

// Ambil data destinasi wisata
$query = "SELECT * FROM destinasi_wisata WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);
$destinasi = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$destinasi) {
    header('Location: kelola_destinasi_wisata.php');
    exit;
}

// Proses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    
    // Proses upload foto
    $foto = $destinasi['foto']; // tetap gunakan foto lama jika tidak ada upload foto baru
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $tempName = $_FILES['foto']['tmp_name'];
        $uploadDir = '../assets/gallery/';
        $uploadFile = $uploadDir . basename($foto);
        
        if (move_uploaded_file($tempName, $uploadFile)) {
            // Hapus foto lama
            if (file_exists($uploadDir . $destinasi['foto'])) {
                unlink($uploadDir . $destinasi['foto']);
            }
        } else {
            $error = 'Upload foto gagal.';
        }
    }
    
    $stmt = $pdo->prepare("UPDATE destinasi_wisata SET foto = :foto, judul = :judul, keterangan = :keterangan WHERE id = :id");
    $stmt->execute([
        ':foto' => $foto,
        ':judul' => $judul,
        ':keterangan' => $keterangan,
        ':id' => $id
    ]);
    header('Location: kelola_destinasi_wisata.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi Wisata - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
    <div class="app">
        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <aside class="sidebar">
            <h3>Menu</h3>
            <nav class="menu">
                <a href="admin.php" class="menu-item">Home</a>
                <a href="kelola_destinasi_wisata.php" class="menu-item is-active">Kelola Destinasi Wisata</a>
                <a href="kelola_paketwisata.php" class="menu-item">Kelola Paket Wisata</a>
                <a href="kelola_galery.php" class="menu-item">Kelola Galery</a>
                <a href="#" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Edit Destinasi Wisata</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo htmlspecialchars($destinasi['judul']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required><?php echo htmlspecialchars($destinasi['keterangan']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    <img src="../assets/gallery/<?php echo htmlspecialchars($destinasi['foto']); ?>" alt="Foto Destinasi" class="img-thumbnail mt-2" width="100">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="kelola_destinasi_wisata.php" class="btn btn-secondary">Batal</a>
            </form>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>
