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
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <style>
        .no-decoration {
            text-decoration: none;
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
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-black">
                        <i class="fas fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="list-pegawai.php" class="no-decoration text-black">
                        <i class="fas fa-users"></i> Pegawai
                    </a>
                </li>
            </ol>
        </nav>
        <h2>Daftar Pegawai</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahPegawai == 0) {
                        ?>
                        <tr>
                            <td colspan=7 class="text-center">Data Pegawai Tidak Tersedia</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($dataPegawai = mysqli_fetch_array($queryPegawai)) {
                            ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $dataPegawai['namaPegawai']; ?></td>
                                <td><?php echo $dataPegawai['noTelp']; ?></td>
                                <td><?php echo $dataPegawai['alamat']; ?></td>
                                <td><?php echo $dataPegawai['email']; ?></td>
                                <td><?php echo $dataPegawai['tanggalLahir']; ?></td>
                                <td>
                                    <a href="peg-detail.php?idPegawai=<?php echo $dataPegawai['idPegawai']; ?>" class="btn btn-info">
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
