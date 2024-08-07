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

$user_id = $_SESSION['user']['id'];

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM pesanan WHERE id = ? AND id_user = ?");
    $stmt->execute([$order_id, $user_id]);
    $order = $stmt->fetch();

    if (!$order) {
        echo "Pesanan tidak ditemukan atau Anda tidak memiliki izin untuk mengakses pesanan ini.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_paket_wisata = $_POST['id_paket_wisata'];
    $tambahan_orang = $_POST['tambahan_orang'];

    $stmt = $pdo->prepare("SELECT harga, harga_per_orang, kapasitas_min, kapasitas_max FROM paket_wisata WHERE id = ?");
    $stmt->execute([$id_paket_wisata]);
    $paket_wisata = $stmt->fetch();

    if ($paket_wisata) {
        $harga_paket = $paket_wisata['harga'];
        $harga_per_orang = $paket_wisata['harga_per_orang'];
        $kapasitas_min = $paket_wisata['kapasitas_min'];
        $kapasitas_max = $paket_wisata['kapasitas_max'];

        if ($tambahan_orang > $kapasitas_max) {
            echo "Jumlah tambahan orang melebihi kapasitas maksimum paket.";
            exit();
        }

        $total_pembayaran = $harga_paket + ($tambahan_orang * $harga_per_orang);

        $stmt = $pdo->prepare("UPDATE pesanan SET id_paket_wisata = ?, tambahan_orang = ?, total_pembayaran = ? WHERE id = ? AND id_user = ?");
        $stmt->execute([$id_paket_wisata, $tambahan_orang, $total_pembayaran, $order_id, $user_id]);

        header('Location: users.php');
        exit();
    } else {
        echo "Paket wisata tidak ditemukan.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - EDIT PESANAN</title>
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
            <h3>Menu Users</h3>
            <nav class="menu">
                <a href="users.php" class="menu-item">Home</a>
                <a href="#" class="menu-item is-active">Buat Pesanan</a>
                <a href="../logout.php" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <div class="container mt-5">
                <h1>Edit Pesanan</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="id_paket_wisata" class="form-label">Paket Wisata</label>
                        <select id="id_paket_wisata" name="id_paket_wisata" class="form-select" required>
                            <?php
                            $stmt = $pdo->query("SELECT id, nama_paket, kapasitas_max FROM paket_wisata");
                            while ($paket = $stmt->fetch()) {
                                $selected = ($paket['id'] == $order['id_paket_wisata']) ? 'selected' : '';
                                echo "<option value='{$paket['id']}' data-kapasitas-max='{$paket['kapasitas_max']}' $selected>{$paket['nama_paket']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tambahan_orang" class="form-label">Tambahan Orang</label>
                        <input type="number" id="tambahan_orang" name="tambahan_orang" class="form-control" value="<?php echo $order['tambahan_orang']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.getElementById('id_paket_wisata').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var kapasitasMax = selectedOption.getAttribute('data-kapasitas-max');
            var tambahanOrangInput = document.getElementById('tambahan_orang');
            tambahanOrangInput.max = kapasitasMax;
        });

        window.onload = function() {
            var selectedOption = document.getElementById('id_paket_wisata').options[document.getElementById('id_paket_wisata').selectedIndex];
            var kapasitasMax = selectedOption.getAttribute('data-kapasitas-max');
            document.getElementById('tambahan_orang').max = kapasitasMax;
        };
    </script>
</body>
</html>
