<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO user (nama, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $email, $password]);

    echo "<script>alert('Registration successful! Please login.'); window.location.href='index.php';</script>";
}
?>
