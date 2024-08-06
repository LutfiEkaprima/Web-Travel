<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - ADMIN</title>
    <link rel="stylesheet" href="assets/style.css" />
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="app">
        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <aside class="sidebar">
            <h3>Menu</h3>
            
            <nav class="menu">
                <a href="admin.php" class="menu-item">Home</a>
                <a href="kelola_destinasi_wisata.php" class="menu-item">Kelola Destinasi Wisata</a>
                <a href="kelola_paketwisata.php" class="menu-item">Kelola Paket Wisata</a>
                <a href="#" class="menu-item is-active">Kelola Galery</a>
                <a href="#" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Kelola Galery</h1>
            <p>Manage your gallery images here. You can add, edit, or delete images.</p>

            <form action="upload_galery.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="foto">Upload New Image:</label>
                    <input type="file" name="foto" id="foto" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

            <h2 class="mt-4">Gallery Images</h2>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../db.php';
                    
                    // Fetch gallery images from database
                    $query = "SELECT * FROM galery";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Display each image
                    foreach ($images as $image) {
                        echo '<tr>
                            <td>' . htmlspecialchars($image['id']) . '</td>
                            <td><img src="../assets/gallery/carousel/' . htmlspecialchars($image['foto']) . '" alt="Gallery Image" height="100" width="100"></td>
                            <td>
                                <a href="delete_galery.php?id=' . htmlspecialchars($image['id']) . '" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
