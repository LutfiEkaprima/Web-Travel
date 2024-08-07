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

    $stmt = $pdo->prepare("DELETE FROM pesanan WHERE id = ? AND id_user = ?");
    $stmt->execute([$order_id, $user_id]);

    header('Location: users.php');
    exit();
} else {
    echo "Pesanan tidak ditemukan.";
    exit();
}
?>
