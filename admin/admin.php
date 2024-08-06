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
                <a href="#" class="menu-item is-active">Home</a>
                <a href="kelola_destinasi_wisata.php" class="menu-item">Kelola Destinasi Wisata</a>
                <a href="kelola_paketwisata.php" class="menu-item">Kelola Paket Wisata</a>
                <a href="kelola_galery.php" class="menu-item">Kelola Galery</a>
                <a href="#" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Pesanan</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Paket Wisata</th>
                        <th>Tambahan Orang</th>
                        <th>Total Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../db.php'; // Menghubungkan ke database

                    // Query untuk mengambil data pesanan
                    $sql = "SELECT ps.id, u.nama AS nama_pelanggan, pw.nama_paket, ps.tambahan_orang, ps.total_pembayaran
        FROM pesanan ps
        JOIN user u ON ps.id_user = u.id
        JOIN paket_wisata pw ON ps.id_paket_wisata = pw.id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Menampilkan data dalam tabel HTML
                    foreach ($pesanan as $pesan) {
                        echo "<tr>
            <td>{$pesan['id']}</td>
            <td>{$pesan['nama_pelanggan']}</td>
            <td>{$pesan['nama_paket']}</td>
            <td>{$pesan['tambahan_orang']}</td>
            <td>{$pesan['total_pembayaran']}</td>
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