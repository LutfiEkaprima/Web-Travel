<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $harga_per_orang = $_POST['harga_per_orang'];

    // Update query
    $sql = "UPDATE paket_wisata SET nama_paket = :nama_paket, deskripsi = :deskripsi, harga = :harga, harga_per_orang = :harga_per_orang WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama_paket', $nama_paket);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':harga_per_orang', $harga_per_orang);
    $stmt->execute();
}

// Jika ada ID yang diset di URL, ambil data paket untuk diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM paket_wisata WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $package = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <style>
        /* Tambahkan styling khusus untuk tabel dan formulir */
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .content th, .content td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .content th {
            background-color: #f4f4f4;
            color: #3C3F58;
        }
        .content tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .content tr:hover {
            background-color: #f1f1f1;
        }
        .form-container {
            margin: 20px 0;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container form input,
        .form-container form textarea {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container form button {
            padding: 0.75rem;
            background-color: #3bba9c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container form button:hover {
            background-color: #34a892;
        }
    </style>
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
                <a href="#" class="menu-item">Log Out</a>
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

            <!-- Tabel untuk menampilkan paket wisata -->
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
                    include '../db.php'; // Menghubungkan ke database

                    // Query untuk mengambil data paket wisata
                    $sql = "SELECT * FROM paket_wisata";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $paket_wisata = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Menampilkan data dalam tabel HTML
                    foreach ($paket_wisata as $paket) {
                        echo "<tr>
                                <td>{$paket['id']}</td>
                                <td>{$paket['nama_paket']}</td>
                                <td>{$paket['deskripsi']}</td>
                                <td>{$paket['harga']}</td>
                                <td>{$paket['harga_per_orang']}</td>
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
