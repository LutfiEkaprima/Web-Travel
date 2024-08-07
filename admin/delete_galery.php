<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT foto FROM galery WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($image) {
        $filePath = '../assets/gallery/carousel/' . $image['foto'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $query = "DELETE FROM galery WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        echo 'Image successfully deleted!';
        header('Location: kelola_galery.php');
    } else {
        echo 'Image not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
