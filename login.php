<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'nama' => $user['nama'],
        'role' => 'user'
    ];
    header("Location: index.php?user_id=" . $user['id']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM admin WHERE nama = ? AND password = ?");
$stmt->execute([$email, $password]);
$admin = $stmt->fetch();

if ($admin) {
    $_SESSION['user'] = [
        'id' => $admin['id'],
        'nama' => $admin['nama'],
        'role' => 'admin'
    ];
    header("Location: index.php");
    exit;
}

header("Location: index.php?error=Invalid login credentials");
exit;
?>
