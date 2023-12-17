<?php
require "../koneksi.php"; // Include your database connection file

if (isset($_POST['submit_pengembalian'])) {
    $idTransaksi = $_POST['idTransaksi'];
    $namaBuku = $_POST['namaBuku'];
    $tanggalPengembalian = $_POST['tanggalPengembalian'];

    // Insert the pengembalian data into the database
    $queryInsertPengembalian = mysqli_query($con, "INSERT INTO tbpengembalian (idTransaksi, namaBuku, tanggalPengembalian) VALUES ('$idTransaksi', '$namaBuku', '$tanggalPengembalian')");
    if ($queryInsertPengembalian) {
        echo '<div class="alert alert-success mt-3" role="alert">Pengembalian berhasil ditambahkan</div>';
        echo '<meta http-equiv="refresh" content="2; url=list-pengembalian.php" />';
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Gagal menambahkan pengembalian</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengembalian</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <?php require "navbar.php"; ?> <!-- Include your navbar file -->

    <div class="container mt-5">
        <h2>Tambah Pengembalian</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="idTransaksi" class="form-label">ID Transaksi</label>
                <input type="number" class="form-control" id="idTransaksi" name="idTransaksi" required>
            </div>
            <div class="mb-3">
                <label for="namaBuku" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="namaBuku" name="namaBuku" required>
            </div>
            <div class="mb-3">
                <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="tanggalPengembalian" name="tanggalPengembalian" required>
            </div>
            <button type="submit" class="btn btn-success" name="submit_pengembalian">Submit</button>
        </form>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
