<?php
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'web-travel';  // Nama database
$username = 'root';  // Username database
$password = '';      // Password database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
?>
