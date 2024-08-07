<?php
include '../db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("SELECT foto FROM destinasi_wisata WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $destinasi = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($destinasi) {
        $foto = $destinasi['foto'];
        $uploadDir = '../assets/gallery/';
        $uploadFile = $uploadDir . $foto;
        
        if (file_exists($uploadFile)) {
            unlink($uploadFile);
        }
        
        // Hapus data dari database
        $stmt = $pdo->prepare("DELETE FROM destinasi_wisata WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

header('Location: kelola_destinasi_wisata.php');
exit;
?>
