<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $harga_per_orang = $_POST['harga_per_orang'];

    $sql = "UPDATE paket_wisata SET nama_paket = :nama_paket, deskripsi = :deskripsi, harga = :harga, harga_per_orang = :harga_per_orang WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama_paket', $nama_paket);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':harga_per_orang', $harga_per_orang);
    $stmt->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM paket_wisata WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $package = $stmt->fetch(PDO::FETCH_ASSOC);
}

function formatRupiah($amount) {
    return "Rp " . number_format($amount, 0, ',', '.');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - ADMIN</title>
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
                <a href="kelola_destinasi_wisata.php" class="menu-item">Kelola Destinasi Wisata</a>
                <a href="#" class="menu-item is-active">Kelola Paket Wisata</a>
                <a href="kelola_galery.php" class="menu-item">Kelola Galery</a>
                <a href="../logout.php" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Kelola Paket Wisata</h1>
            <p>Manage your tour packages here. You can update package details as needed.</p>

            <!-- Formulir untuk menambah atau mengedit paket wisata -->
            <div class="form-container">
                <h2>Edit Paket Wisata</h2>
                <form action="kelola_paketwisata.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo isset($package['id']) ? htmlspecialchars($package['id']) : ''; ?>">
                    <label for="nama_paket">Nama Paket:</label>
                    <input type="text" id="nama_paket" name="nama_paket" value="<?php echo isset($package['nama_paket']) ? htmlspecialchars($package['nama_paket']) : ''; ?>" required>
                    
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo isset($package['deskripsi']) ? htmlspecialchars($package['deskripsi']) : ''; ?></textarea>
                    
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" value="<?php echo isset($package['harga']) ? htmlspecialchars($package['harga']) : ''; ?>" required>
                    
                    <label for="harga_per_orang">Harga per Orang:</label>
                    <input type="number" id="harga_per_orang" name="harga_per_orang" value="<?php echo isset($package['harga_per_orang']) ? htmlspecialchars($package['harga_per_orang']) : ''; ?>">
                    
                    <button type="submit" name="update">Update Paket</button>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Paket</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Harga per Orang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../db.php';

                    $sql = "SELECT * FROM paket_wisata";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $paket_wisata = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($paket_wisata as $paket) {
                        echo "<tr>
                                <td>{$paket['id']}</td>
                                <td>{$paket['nama_paket']}</td>
                                <td>{$paket['deskripsi']}</td>
                                <td>" . formatRupiah($paket['harga']) . "</td>
                                <td>" . formatRupiah($paket['harga_per_orang']) . "</td>
                                <td>
                                    <a href='kelola_paketwisata.php?id={$paket['id']}' class='btn-edit'>Edit</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
