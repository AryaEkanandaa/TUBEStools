<?php
require "session.php";
require "../koneksi.php";

$queryTransaksi = mysqli_query($con, "SELECT * FROM tbTransaksi");
$jumlahTransaksi = mysqli_num_rows($queryTransaksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
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
                    <a href="list-transaksi.php" class="no-decoration text-black">
                        <i class="fa-solid fa-money-bill"></i> Transaksi
                    </a>
                </li>
            </ol>
        </nav>
        <h2>Daftar Transaksi</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">ID Pegawai</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Status Pengiriman</th>
                        <th scope="col">Alamat Pengiriman</th>
                        <th scope="col">Kode Referensi</th>
                        <th scope="col">Jenis Transaksi</th>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Waktu Perubahan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahTransaksi == 0) {
                        ?>
                        <tr>
                            <td colspan=13 class="text-center">Data Transaksi Tidak Tersedia</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryTransaksi)) {
                            ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['idTransaksi']; ?></td>
                                <td><?php echo $data['idPelanggan']; ?></td>
                                <td><?php echo $data['idPegawai']; ?></td>
                                <td><?php echo $data['tanggalTransaksi']; ?></td>
                                <td><?php echo $data['totalHarga']; ?></td>
                                <td><?php echo $data['metodePembayaran']; ?></td>
                                <td><?php echo $data['statusPengiriman']; ?></td>
                                <td><?php echo $data['alamatPengiriman']; ?></td>
                                <td><?php echo $data['kodeReferensi']; ?></td>
                                <td><?php echo $data['jenisTransaksi']; ?></td>
                                <td><?php echo $data['idBuku']; ?></td>
                                <td><?php echo $data['modifiedDate']; ?></td>

                                <td>
                                    <a href="transaksi-detail.php?idTransaksi=<?php echo $data['idTransaksi']; ?>" class="btn btn-secondary">
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
