<?php

include '../db.php';

// Proses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    
    // Proses upload foto
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $tempName = $_FILES['foto']['tmp_name'];
        $uploadDir = '../assets/gallery/';
        $uploadFile = $uploadDir . basename($foto);
        
        if (move_uploaded_file($tempName, $uploadFile)) {
            $stmt = $pdo->prepare("INSERT INTO destinasi_wisata (foto, judul, keterangan) VALUES (:foto, :judul, :keterangan)");
            $stmt->execute([
                ':foto' => $foto,
                ':judul' => $judul,
                ':keterangan' => $keterangan
            ]);
            header('Location: kelola_destinasi_wisata.php');
            exit;
        } else {
            $error = 'Upload foto gagal.';
        }
    } else {
        $error = 'Foto tidak ditemukan.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi Wisata - Admin</title>
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
            <h1>Tambah Destinasi Wisata</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
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
