<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <style>
        .no-decoration {
            text-decoration: none;
        }

        form div {
            margin-bottom: 10px;
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
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="list-kategori.php" class="no-decoration text-black">
                        <i class="fa-solid fa-list"></i> Kategori
                    </a>
                </li>
            </ol>
        </nav>
        <h2>Daftar Kategori</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahKategori == 0) {
                        ?>
                        <tr>
                            <td colspan=3 class="text-center">Data Kategori Tidak Tersedia</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryKategori)) {
                            ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <a href="kategori-detail.php?idKategori=<?php echo $data['idKategori']; ?>" class="btn btn-secondary">
                                        <i class="fas fa-search #ffffff"></i>
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
