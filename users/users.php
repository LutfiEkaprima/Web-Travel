<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

if ($_SESSION['user']['role'] !== 'user') {
    header('Location: ../index.php');
    exit();
}

function formatRupiah($amount) {
    return "Rp " . number_format($amount, 0, ',', '.');
}

$user_id = $_SESSION['user']['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - ADMIN</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a href="formpesanan.php" class="menu-item">Buat Pesanan</a>
                <a href="../logout.php" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Pesanan</h1>
            <section class="orders my-5">
                <h2>Pesanan Saya</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Paket Wisata</th>
                            <th>Tambahan Orang</th>
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->prepare("SELECT pesanan.id, paket_wisata.nama_paket, pesanan.tambahan_orang, pesanan.total_pembayaran FROM pesanan JOIN paket_wisata ON pesanan.id_paket_wisata = paket_wisata.id WHERE pesanan.id_user = ?");
                        $stmt->execute([$user_id]);
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>{$row['nama_paket']}</td>";
                            echo "<td>{$row['tambahan_orang']}</td>";
                            echo "<td>" . formatRupiah($row['total_pembayaran']) . "</td>";
                            echo "<td><a href='editpesanan.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a> <a href='delete_order.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>