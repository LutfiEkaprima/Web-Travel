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

        $stmt = $pdo->prepare("INSERT INTO pesanan (id_user, id_paket_wisata, tambahan_orang, total_pembayaran) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $id_paket_wisata, $tambahan_orang, $total_pembayaran]);

        header('Location: users.php');
        exit();
    } else {
        echo "Paket wisata tidak ditemukan.";
    }
}
?>
