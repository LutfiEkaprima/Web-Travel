<?php
include 'db.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JAM GADANG TOUR</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<body>

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <img src="./assets/icon.png" alt="Jam Gadang" width="50" height="50">
                <p class="fw-bold mb-0 ms-2 fs-2 text-black">JAM GADANG TOUR</p>
            </a>
            <!-- End Logo -->

            <!-- Responsive Bar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- End Responsive Bar -->

            <!-- Nav Bar Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link active" id="nav-home" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" id="nav-about" href="#about">About</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" id="nav-destinasi" href="#destinasi">Destinasi</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" id="nav-paketwisata" href="#paketwisata">Paket Wisata</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" id="nav-galery" href="#galery">Galery</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" id="nav-login" href="#">Login</a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Bar Items -->
        </div>
    </nav>
    <!-- End Nav Bar -->

    <!-- Main Content -->

    <!-- Heroes -->
    <section class="hero-section">
        <video autoplay muted loop class="video-background">
            <source src="./assets/gallery/Wonderful Indonesia - Magnificent Minangkabau  Sumatera Barat (TVC).mp4" type="video/mp4">
            https://youtu.be/kX-yZtVd5Sg?si=xskQnCRSbMfA1mCc
        </video>
        <div class="d-flex vh-100">
            <div class="container my-auto">
                <div class="text-hero text-center">
                    <h1 class="display-5 fw-bold">SUMATERA BARAT</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Heroes -->

    <!-- About -->
    <section class="about-section" id="about">
        <div class="d-flex vh-100">
            <div class="container my-auto">
                <div class="text-about text-center">
                    <h1 class="display-5 fw-bold">About Sumatera Barat</h1>
                    <div class="col-lg-6 mx-auto pt-5">
                        <p class="lead mb-4 fw-light">
                            Sumatera Barat adalah sebuah provinsi di Indonesia yang terletak di Pulau Sumatra dengan ibu kota Padang, dan juga
                            merupakan rumah bagi etnis Minangkabau dan Mentawai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Destinasi Wisata -->
    <section class="destinasi-section" id="destinasi">
        <div class="destinasi-carousel container d-flex flex-column align-items-center vh-100 position-relative mt-5">
            <div class="text-center mb-4">
                <h1 class="display-5 fw-bold">Destinasi Wisata</h1>
            </div>
            <div id="carouselDestinasi" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    // Fetch data from database
                    $query = "SELECT * FROM destinasi_wisata";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Check if we have data
                    if (count($destinations) > 0) {
                        $itemCount = 0;
                        foreach ($destinations as $index => $destination) {
                            // Start a new carousel item if the count is 0 or if we reached the max items per slide
                            if ($itemCount % 3 === 0) {
                                // Close the previous carousel item if not the first
                                if ($index > 0) {
                                    echo '</div></div>';
                                }
                                // Determine if this item should be active
                                $activeClass = ($itemCount === 0) ? ' active' : '';
                                echo '<div class="carousel-item' . $activeClass . '"><div class="row justify-content-center">';
                            }

                            // Display the destination item
                            echo '<div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/' . htmlspecialchars($destination['foto']) . '" class="card-img-top" alt="' . htmlspecialchars($destination['judul']) . '">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($destination['judul']) . '</h5>
                                        <p class="card-text">' . htmlspecialchars($destination['keterangan']) . '</p>
                                    </div>
                                </div>
                            </div>';

                            $itemCount++;
                        }
                        // Close the last carousel item and inner div
                        echo '</div></div>';
                    } else {
                        echo '<p class="text-center">No destinations found.</p>';
                    }
                    ?>
                </div>
                <!-- Buttons outside carousel-inner -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestinasi" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselDestinasi" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- End Destinasi Wisata -->

    <!-- Paket Wisata -->
    <section class="paketwisata-section" id="paketwisata">
        <div class="container py-5">
            <div class="text-center mb-4 mt-5">
                <h1 class="display-5 fw-bold">Paket Wisata</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $sql = "SELECT * FROM paket_wisata";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $paket_wisata = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($paket_wisata as $paket) {
                    echo "
                        <div class='col-12 col-md-4 mb-3'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title text-center fw-bold'> Paket " . htmlspecialchars($paket['nama_paket']) . "</h5>
                                    <p class='card-text fw-light'>" . htmlspecialchars($paket['deskripsi']) . "</p>
                                    <ul>";
                    echo "</ul>
                                    <h6>Harga: Rp " . number_format($paket['harga'], 0, ',', '.') . "</h6><br>
                                    <p>Note : <br></p>
                                    <h6>Harga per orang (jika lebih dari " . htmlspecialchars($paket['kapasitas_max']) . " orang): <br> akan dikenakan biaya sebesar Rp " . number_format($paket['harga_per_orang'], 0, ',', '.') . " per orangnya.</h6>
                                </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Paket Wisata -->

    <!-- Galery -->
    <section class="galery-section" id="galery">
        <div class="container py-5">
            <div class="text-center mb-4 mt-4">
                <h1 class="display-5 fw-bold">Galery</h1>
            </div>
            <div id="carouselGalery" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    include 'db.php';

                    $stmt = $pdo->query("SELECT * FROM galery");
                    $isActive = true;

                    while ($row = $stmt->fetch()) {
                        $activeClass = $isActive ? ' active' : '';
                        $isActive = false;
                        echo "<div class='carousel-item$activeClass'>
                            <img src='assets/gallery/carousel/{$row['foto']}' class='d-block w-100' alt='Galery Photo' height='700' width='500'>
                          </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Galery -->

    <!-- Footer -->
    <footer class="text-center mt-3 mb-3">
        <div class="container">
            <p class="text-black">&copy; 2024 JAM GADANG TOUR. All rights reserved.</p>
            <p class="text-black">Follow us on:
                <a href="#" class="text-black">Facebook</a> |
                <a href="#" class="text-black">Twitter</a> |
                <a href="#" class="text-black">Instagram</a>
            </p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- End Main Content -->

    <!-- Script -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- End Script -->

</body>

</html>