<?php
require "session.php";
require "../koneksi.php";

$queryPelanggan = mysqli_query($con, "SELECT * FROM tbpelanggan");
$jumlahPelanggan = mysqli_num_rows($queryPelanggan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 15px;
    }

    h2 {
        margin-bottom: 30px;
    }

    /* Custom styles for the table */
    .table th,
    .table td {
        text-align: center;
    }

    .table thead th {
        background-color: #343a40; /* Dark background color for table header */
        color: #ffffff; /* Text color for table header */
    }

    .table-responsive {
        margin-top: 20px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../admin" class="no-decoration text-black">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-users"></i> Pelanggan
                </li>
            </ol>
        </nav>
        <h2>Daftar Pelanggan</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahPelanggan == 0) {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">Data Pelanggan Tidak Tersedia</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($dataPelanggan = mysqli_fetch_array($queryPelanggan)) {
                            ?>
                            <tr>
                                <td><?php echo $dataPelanggan['idPelanggan']; ?></td>
                                <td><?php echo $dataPelanggan['namaPelanggan']; ?></td>
                                <td><?php echo $dataPelanggan['noTelp']; ?></td>
                                <td><?php echo $dataPelanggan['alamat']; ?></td>
                                <td><?php echo $dataPelanggan['email']; ?></td>
                                <td><?php echo $dataPelanggan['tanggalLahir']; ?></td>
                                <td>
                                    <a href="pel-detail.php?idPelanggan=<?php echo $dataPelanggan['idPelanggan']; ?>" class="btn btn-info">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $jumlah++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
