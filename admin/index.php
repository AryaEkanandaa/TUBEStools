<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryBuku = mysqli_query($con, "SELECT * FROM buku");
$jumlahBuku = mysqli_num_rows($queryBuku);

$queryPelanggan = mysqli_query($con, "SELECT * FROM tbpelanggan");
$jumlahPelanggan = mysqli_num_rows($queryPelanggan);

$queryPegawai = mysqli_query($con, "SELECT * FROM tbpegawai");
$jumlahPegawai = mysqli_num_rows($queryPegawai);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .kotak {
        border: solid;
        margin-bottom: 20px; /* Jarak antar kotak */
    }

    .summary-kategori {
        background-color: #0a6b4a;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }

    .sumarry-buku {
        background-color: #0a516b;
        border-radius: 15px;
    }

    .summary-pelanggan {
        background-color: #b4552e;
        border-radius: 15px;
    }

    .summary-pegawai {
        background-color: #853c65;
        border-radius: 15px;
    }

    /* Style tambahan untuk pelanggan */
    .summary-pelanggan i {
        margin-top: 10px;
    }

    .summary-pelanggan h3 {
        margin-bottom: 5px;
    }

    .summary-pelanggan p {
        margin-bottom: 0;
    }
</style>

<body>
    <?php require "navbar.php" ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-house"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username'] ?></h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="kotak summary-kategori p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-align-justify fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Kategori</h3>
                                <p class="fs-4"><?php echo $jumlahKategori; ?> Kategori</p>
                                <p><a href="kategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="kotak sumarry-buku p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-book fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Buku</h3>
                                <p class="fs-4"><?php echo $jumlahBuku; ?> Buku</p>
                                <p><a href="buku.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="kotak summary-pelanggan p-3">
                        <div class="row">
                            <div class="col-8">
                                <i class="fas fa-user fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Pelanggan</h3>
                                <p class="fs-4"><?php echo $jumlahPelanggan; ?> Pelanggan</p>
                                <p><a href="kustomer.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="kotak summary-pegawai p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-user-tie fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Pegawai</h3>
                                <p class="fs-4"><?php echo $jumlahPegawai; ?> Pegawai</p>
                                <p><a href="pegawai.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
