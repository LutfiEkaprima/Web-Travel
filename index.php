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
        <div class="destinasi-carousel container d-flex flex-column align-items-center vh-100 position-relative">
            <div class="text-center mb-4">
                <h1 class="display-5 fw-bold">Destinasi Wisata</h1>
            </div>
            <div id="carouselDestinasi" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/jamgadang.jpg" class="card-img-top" alt="Destinasi 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Jam Gadang</h5>
                                        <p class="card-text">Jam Gadang adalah menara jam yang menjadi penanda atau ikon Kota Bukittinggi, Sumatera Barat, Indonesia. Menara jam ini menjulang setinggi 27 meter dan diresmikan pembangunannya pada 25 Juli 1927. Terdapat jam berukuran besar berdiameter 80 cm di empat sisi menara sehingga dinamakan Jam Gadang, sebutan bahasa Minangkabau yang berarti "jam besar".</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/Harau.jpg" class="card-img-top" alt="Destinasi 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Lembah Harau</h5>
                                        <p class="card-text">Lembah Harau adalah sebuah ngarai dekat Kota Payakumbuh di Kabupaten Limapuluh Koto, provinsi Sumatera Barat. Lembah Harau diapit dua bukit cadas terjal dengan ketinggian mencapai 150 meter berupa batu pasir yang terjal berwarna-warni, dengan ketinggian 100 sampai 500 meter.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/lembahanai.jpg" class="card-img-top" alt="Destinasi 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Air Terjun Lembah Anai</h5>
                                        <p class="card-text">Air Terjun Lembah Anai adalah sebuah air terjun yang terletak di jorong aie mancua nagari Singgalang, X Koto, Kabupaten Tanah Datar, Sumatera Barat. Air terjun setinggi sekira 35 meter ini berada tepat di tepi Jalan Raya Padang-Bukittinggi di kaki Gunung Singgalang. Air Terjun Lembah Anai merupakan bagian dari aliran Sungai Batang Lurah, anak Sungai Batang Anai yang berhulu di Gunung Singgalang di ketinggian 400 Mdpl.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/ngarai-sianok.jpg" class="card-img-top" alt="Destinasi 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Ngarai Sianok</h5>
                                        <p class="card-text">Ngarai Sianok merupakan sebuah lembah curam yang terletak di perbatasan Kota Bukittinggi, di Kecamatan IV Koto, Kabupaten Agam, Sumatera Barat. Lembah ini memanjang dan berkelok sebagai garis batas kota dari selatan Ngarai Koto Gadang sampai ke nagari Sianok Anam Suku, dan berakhir di Kecamatan Palupuh. Ngarai Sianok memiliki pemandangan yang sangat indah dan juga menjadi salah satu objek wisata yang paling sering dikunjungi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="assets/gallery/Istana-Basa-Pagaruyung.jpg" class="card-img-top" alt="Destinasi 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Istana Basa Pagaruyung</h5>
                                        <p class="card-text">Istano Basa Pagaruyung yang lebih terkenal dengan nama Istana Besar Kerajaan Pagaruyung adalah museum berupa replika istana Kerajaan Pagaruyung terletak di Nagari Pagaruyung, Kecamatan Tanjung Emas, Kabupaten Tanah Datar, Sumatera Barat. Istana ini berjarak lebih kurang 5 kilometer dari Batusangkar. Istana ini merupakan objek wisata budaya yang terkenal di Sumatera Barat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Paket Wisata Small</h5>
                            <p class="card-text fw-light">Paket ini cocok untuk kelompok kecil yang terdiri dari 3 hingga 5 orang. Ideal untuk liburan singkat atau perjalanan santai bersama teman atau keluarga dengan total 3 destinasi objek Wisata.</p>
                            <ul>
                                <li>Transportasi kendaraan pribadi selama perjalanan</li>
                                <li>Akomodasi di hotel bintang 3</li>
                                <li>Makanan 3 kali sehari (sarapan, makan siang, makan malam)</li>
                                <li>Tiket masuk ke objek wisata utama</li>
                            </ul>
                            <h6>Harga: Rp 3.000.000</h6><br>
                            <p>Note : <br></p>
                            <h6>Harga per orang (jika lebih dari 5 orang): Rp 700.000 per orang</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Paket Wisata Medium</h5>
                            <p class="card-text fw-light">Paket ini dirancang untuk kelompok menengah, dengan kapasitas 6 hingga 10 orang. Cocok untuk keluarga besar atau kelompok teman yang ingin menjelajahi lebih banyak tempat wisata dengan total 5 destinasi objek Wisata.</p>
                            <ul>
                                <li>Transportasi kendaraan pribadi dengan kapasitas lebih besar</li>
                                <li>Akomodasi di hotel bintang 4</li>
                                <li>Makanan 3 kali sehari (sarapan, makan siang, makan malam)</li>
                                <li>Tiket masuk ke beberapa objek wisata utama</li>
                                <li>Aktivitas tambahan (seperti rafting, trekking, atau city tour)</li>
                            </ul>
                            <h6>Harga: Rp 6.000.000</h6><br>
                            <p>Note : <br></p>
                            <h6>Harga per orang (jika lebih dari 10 orang): Rp 750.000 per orang</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Paket Wisata Large</h5>
                            <p class="card-text fw-light">Paket ini ditujukan untuk kelompok besar, mulai dari 11 hingga 20 orang. Ideal untuk rombongan wisata, acara kantor, atau grup besar lainnya yang ingin pengalaman wisata lengkap dan mendalam dengan total 10 destinasi objek Wisata.</p>
                            <ul>
                                <li>Transportasi bus pariwisata</li>
                                <li>Akomodasi di hotel bintang 5</li>
                                <li>Makanan 3 kali sehari (sarapan, makan siang, makan malam)</li>
                                <li>Tiket masuk ke banyak objek wisata utama</li>
                                <li>Aktivitas tambahan eksklusif (seperti spa, golf, atau tur khusus)</li>
                                <li>Pemandu wisata berlisensi</li>
                            </ul>
                            <h6>Harga: Rp 15.000.000</h6><br>
                            <p>Note : <br></p>
                            <h6>Harga per orang (jika lebih dari 20 orang): Rp 800.000 per orang</h6>
                        </div>
                    </div>
                </div>
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
            <div id="carouselGalery" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/gallery/Harau.jpg" class="d-block w-100" alt="Galery Photo 1" height="700" width="500">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/gallery/jamgadang.jpg" class="d-block w-100" alt="Galery Photo 2" height="700" width="500">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/gallery/lembahanai.jpg" class="d-block w-100" alt="Galery Photo 3" height="700" width="500">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/gallery/ngarai-sianok.jpg" class="d-block w-100" alt="Galery Photo 4" height="700" width="500">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/gallery/Istana-Basa-Pagaruyung.jpg" class="d-block w-100" alt="Galery Photo 5" height="700" width="500">
                    </div>
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