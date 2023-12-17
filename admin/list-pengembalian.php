<?php
require "session.php";
require "../koneksi.php";

$queryPengembalian = mysqli_query($con, "SELECT * FROM tbpengembalian");
$jumlahPengembalian = mysqli_num_rows($queryPengembalian);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengembalian</title>
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
                <li class="breadcrumb-item">
                    <a href="../admin" class="no-decoration text-black">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-undo-alt"></i> Pengembalian
                </li>
            </ol>
        </nav>
        <h2>List Pengembalian</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Pengembalian</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahPengembalian == 0) {
                        echo '<tr><td colspan="6" class="text-center">Data Pengembalian Tidak Tersedia</td></tr>';
                    } else {
                        $jumlah = 1;
                        while ($dataPengembalian = mysqli_fetch_array($queryPengembalian)) {
                            ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $dataPengembalian['idPengembalian']; ?></td>
                                <td><?php echo $dataPengembalian['idTransaksi']; ?></td>
                                <td><?php echo $dataPengembalian['namaBuku']; ?></td>
                                <td><?php echo $dataPengembalian['tanggalPengembalian']; ?></td>
                                <td>
                                    <a href="detail-pengembalian.php?idPengembalian=<?php echo $dataPengembalian['idPengembalian']; ?>" class="btn btn-secondary">
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
