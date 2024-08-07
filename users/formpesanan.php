<?php
session_start();
include '../db.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

// Check if user is of the correct role
if ($_SESSION['user']['role'] !== 'user') {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - USER</title>
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
            <h1>Form Pesan Paket Wisata</h1>
            <!-- Form Pesanan -->
            <div class="container mt-5">
                <h1>Buat Pesanan</h1>
                <form action="process_pesanan.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin memesan paket ini?');">
                    <div class="mb-3">
                        <label for="id_paket_wisata" class="form-label">Paket Wisata</label>
                        <select id="id_paket_wisata" name="id_paket_wisata" class="form-select" required>
                            <?php
                            $stmt = $pdo->query("SELECT id, nama_paket, harga, harga_per_orang, kapasitas_max FROM paket_wisata");
                            while ($paket = $stmt->fetch()) {
                                echo "<option value='{$paket['id']}' data-harga='{$paket['harga']}' data-harga-per-orang='{$paket['harga_per_orang']}' data-kapasitas-max='{$paket['kapasitas_max']}'>{$paket['nama_paket']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tambahan_orang" class="form-label">Tambahan Orang</label>
                        <input type="number" id="tambahan_orang" name="tambahan_orang" class="form-control" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_biaya" class="form-label">Total Biaya</label>
                        <input type="text" id="total_biaya" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>
            </div>
            <!-- End Form Pesanan -->
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function calculateTotal() {
            var selectedOption = document.getElementById('id_paket_wisata').options[document.getElementById('id_paket_wisata').selectedIndex];
            var harga = parseFloat(selectedOption.getAttribute('data-harga'));
            var hargaPerOrang = parseFloat(selectedOption.getAttribute('data-harga-per-orang'));
            var tambahanOrang = parseInt(document.getElementById('tambahan_orang').value);

            var totalBiaya = harga + (tambahanOrang * hargaPerOrang);
            document.getElementById('total_biaya').value = totalBiaya.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        }

        document.getElementById('id_paket_wisata').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var kapasitasMax = selectedOption.getAttribute('data-kapasitas-max');
            var tambahanOrangInput = document.getElementById('tambahan_orang');
            tambahanOrangInput.max = kapasitasMax;
            calculateTotal();
        });

        document.getElementById('tambahan_orang').addEventListener('input', calculateTotal);

        window.onload = function() {
            var selectedOption = document.getElementById('id_paket_wisata').options[document.getElementById('id_paket_wisata').selectedIndex];
            var kapasitasMax = selectedOption.getAttribute('data-kapasitas-max');
            document.getElementById('tambahan_orang').max = kapasitasMax;
            calculateTotal();
        };
    </script>
</body>
</html>
