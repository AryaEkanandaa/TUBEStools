<?php
require "session.php";
require "../koneksi.php";

// Check if the ID parameter is provided
if (isset($_GET['idPengembalian'])) {
    $idPengembalian = $_GET['idPengembalian'];

    // Fetch pengembalian data based on idPengembalian
    $queryPengembalian = mysqli_query($con, "SELECT * FROM tbpengembalian WHERE idPengembalian='$idPengembalian'");
    $dataPengembalian = mysqli_fetch_array($queryPengembalian);

    // Check if the form is submitted for updating
    if (isset($_POST['updatePengembalian'])) {
        // Update pengembalian data
        $namaBuku = $_POST['namaBuku'];
        $tanggalPengembalian = $_POST['tanggalPengembalian'];

        $queryUpdatePengembalian = mysqli_query($con, "UPDATE tbpengembalian SET 
                                                    namaBuku='$namaBuku',
                                                    tanggalPengembalian='$tanggalPengembalian'
                                                    WHERE idPengembalian='$idPengembalian'");

        if ($queryUpdatePengembalian) {
            echo '<div class="alert alert-success mt-3" role="alert">Data Pengembalian Berhasil Diupdate</div>';
            echo '<meta http-equiv="refresh" content="2; url=list-pengembalian.php" />';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Gagal Update Pengembalian</div>';
        }
    }

    // Check if the form is submitted for deleting
    if (isset($_POST['deletePengembalian'])) {
        // Delete pengembalian data
        $queryDeletePengembalian = mysqli_query($con, "DELETE FROM tbpengembalian WHERE idPengembalian='$idPengembalian'");

        if ($queryDeletePengembalian) {
            echo '<div class="alert alert-success mt-3" role="alert">Data Pengembalian Berhasil Dihapus</div>';
            echo '<meta http-equiv="refresh" content="2; url=list-pengembalian.php" />';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Gagal Menghapus Pengembalian</div>';
        }
    }
} else {
    // Redirect to the list-pengembalian.php page if ID is not provided
    header("Location: list-pengembalian.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengembalian</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <style>
        .no-decoration {
            text-decoration: none;
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
                <li class="breadcrumb-item">
                    <a href="list-pengembalian.php" class="no-decoration text-black">
                        <i class="fa-solid fa-undo-alt"></i> Pengembalian
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-search"></i> Detail Pengembalian
                </li>
            </ol>
        </nav>
        <h2>Detail Pengembalian</h2>

        <div class="row mt-3">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaBuku" class="form-label">Nama Buku</label>
                        <input type="text" id="namaBuku" name="namaBuku" class="form-control" value="<?php echo $dataPengembalian['namaBuku']; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" id="tanggalPengembalian" name="tanggalPengembalian" class="form-control" value="<?php echo $dataPengembalian['tanggalPengembalian']; ?>" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="updatePengembalian">Update</button>
                    <button type="submit" class="btn btn-danger" name="deletePengembalian">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
