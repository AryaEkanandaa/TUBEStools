<?php
require "session.php";
require "../koneksi.php";

$queryPegawai = mysqli_query($con, "SELECT * FROM tbpegawai");
$jumlahPegawai = mysqli_num_rows($queryPegawai);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    .form-container {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        margin-bottom: 30px;
    }

    /* Center the form */
    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh; /* Set the height to 60% of the viewport height */
    }

    /* Custom styles for the form */
    label {
        font-weight: bold;
    }

    /* Custom styles for the alerts */
    .alert {
        margin-top: 15px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <!-- Navigation Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../admin" class="no-decoration text-black">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="list-pegawai" class="no-decoration text-black">
                        <i class="fa-solid fa-users"></i> Pegawai
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-user-plus"></i> Tambah Pegawai
                </li>
            </ol>
        </nav>
    </div>

    <!-- Centered Form -->
    <div class="container mt-5 center-form">
        <div class="form-container col-12 col-md-6">
            <h3> Tambah Pegawai </h3>

            <!-- Form -->
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="namaPegawai">Nama</label>
                    <input type="text" id="namaPegawai" name="namaPegawai" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="noTelp">No Telepon</label>
                    <input name="noTelp" id="noTelp" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" autocomplete="off">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" autocomplete="off">
                </div>
                <div>
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggalLahir" autocomplete="off">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-success" name="simpanPegawai">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpanPegawai'])) {
                $namaPegawai = mysqli_real_escape_string($con, $_POST['namaPegawai']);
                $noTelp = mysqli_real_escape_string($con, $_POST['noTelp']);
                $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $tanggalLahir = mysqli_real_escape_string($con, $_POST['tanggalLahir']);

                if (empty($namaPegawai) || empty($noTelp) || empty($alamat) || empty($email) || empty($tanggalLahir)) {
                    echo '<div class="alert alert-danger mt-3" role="alert">Semua kolom harus diisi!</div>';
                } else {
                    $queryTambahPegawai = mysqli_query($con, "INSERT INTO tbpegawai (namaPegawai, noTelp, alamat, email, tanggalLahir) 
                                                        VALUES ('$namaPegawai', '$noTelp', '$alamat', '$email', '$tanggalLahir')");

                    if ($queryTambahPegawai) {
                        echo '<div class="alert alert-success mt-3" role="alert">Pegawai berhasil ditambahkan</div>';
                        echo '<meta http-equiv="refresh" content="2; url=list-pegawai.php" />';
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">Gagal menambahkan pegawai</div>';
                    }
                }
            }
            ?>
        </div>
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>