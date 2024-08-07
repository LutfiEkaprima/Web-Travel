<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM GADANG TOUR - ADMIN</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a href="../logout.php" class="menu-item">Log Out</a>
            </nav>
        </aside>

        <main class="content">
            <h1>Kelola Galery</h1>
            <p>Kelola Foto untuk Galery Halaman Website</p>

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
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../db.php';
                    
                    $query = "SELECT * FROM galery";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($images as $image) {
                        echo '<tr>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>
