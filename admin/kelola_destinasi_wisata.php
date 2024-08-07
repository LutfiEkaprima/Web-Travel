<?php
include '../db.php';

$query = "SELECT * FROM destinasi_wisata";
$stmt = $pdo->prepare("SELECT * FROM destinasi_wisata");
$stmt->execute();
$destinasi_wisata = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Destinasi Wisata - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a href="#" class="menu-item is-active">Kelola Destinasi Wisata</a>
                <a href="kelola_paketwisata.php" class="menu-item">Kelola Paket Wisata</a>
                <a href="kelola_galery.php" class="menu-item">Kelola Galery</a>
                <a href="../logout.php" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Kelola Destinasi Wisata</h1>
            <p>Kelola destinasi wisata yang ditampilkan di situs web Anda.</p>
            <a href="tambah_destinasi.php" class="btn btn-primary mb-3">Tambah Destinasi Wisata</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($destinasi_wisata as $destinasi): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($destinasi['id']); ?></td>
                                <td>
                                    <img src="../assets/gallery/<?php echo htmlspecialchars($destinasi['foto']); ?>" 
                                         alt="<?php echo htmlspecialchars($destinasi['judul']); ?>" 
                                         class="img-thumbnail" width="100">
                                </td>
                                <td><?php echo htmlspecialchars($destinasi['judul']); ?></td>
                                <td><?php echo htmlspecialchars($destinasi['keterangan']); ?></td>
                                <td>
                                    <a href="edit_destinasi.php?id=<?php echo htmlspecialchars($destinasi['id']); ?>" 
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_destinasi.php?id=<?php echo htmlspecialchars($destinasi['id']); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Anda yakin ingin menghapus destinasi ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>
