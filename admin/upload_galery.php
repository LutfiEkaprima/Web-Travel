<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $foto = $_FILES['foto'];

    // Check if the file was uploaded without errors
    if ($foto['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/gallery/carousel/';
        $uploadFile = $uploadDir . basename($foto['name']);

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($foto['tmp_name'], $uploadFile)) {
            // Insert image information into the database
            $query = "INSERT INTO galery (foto) VALUES (:foto)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['foto' => basename($foto['name'])]);

            echo 'File successfully uploaded and saved!';
        } else {
            echo 'Failed to move uploaded file.';
        }
    } else {
        echo 'Error uploading file.';
    }
} else {
    echo 'No file uploaded or invalid request method.';
}
?>
