<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the image filename
    $query = "SELECT foto FROM galery WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($image) {
        // Delete the image file
        $filePath = '../assets/gallery/carousel/' . $image['foto'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the image record from the database
        $query = "DELETE FROM galery WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        echo 'Image successfully deleted!';
    } else {
        echo 'Image not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
