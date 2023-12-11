<?php
require "session.php";
require "../koneksi.php";

$idPelanggan = $_GET['idPelanggan'];

$queryPelanggan = mysqli_query($con, "SELECT * FROM tbpelanggan WHERE idPelanggan='$idPelanggan'");
$dataPelanggan = mysqli_fetch_array($queryPelanggan);

if (!$dataPelanggan) {
    // Handle the case when the customer is not found
    echo "Pelanggan tidak ditemukan.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <h2>Detail Pelanggan</h2>
        <div class="col-12 col-md-6 mt-3 mb-5">
            <form action="" method="post">
                <div>
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" id="namaPelanggan" name="namaPelanggan" value="<?php echo $dataPelanggan['namaPelanggan'] ?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="noTelp">No Telepon</label>
                    <input type="text" id="noTelp" name="noTelp" value="<?php echo $dataPelanggan['noTelp'] ?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $dataPelanggan['alamat'] ?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $dataPelanggan['email'] ?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" id="tanggalLahir" name="tanggalLahir" value="<?php echo $dataPelanggan['tanggalLahir'] ?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                // Handle the update action
                $namaPelanggan = htmlspecialchars($_POST['namaPelanggan']);
                $noTelp = htmlspecialchars($_POST['noTelp']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $email = htmlspecialchars($_POST['email']);
                $tanggalLahir = htmlspecialchars($_POST['tanggalLahir']);

                // Perform the update query here
                $queryUpdate = mysqli_query($con, "UPDATE tbpelanggan SET 
                    namaPelanggan='$namaPelanggan',
                    noTelp='$noTelp',
                    alamat='$alamat',
                    email='$email',
                    tanggalLahir='$tanggalLahir'
                    WHERE idPelanggan='$idPelanggan'");

                if ($queryUpdate) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Data Pelanggan Berhasil Tersimpan
                    </div>
                    <meta http-equiv="refresh" content="2; url=kustomer.php" />
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }

            if (isset($_POST['hapus'])) {
                // Handle the delete action
                $queryDelete = mysqli_query($con, "DELETE FROM tbpelanggan WHERE idPelanggan='$idPelanggan'");

                if ($queryDelete) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Data Pelanggan Berhasil Dihapus
                    </div>
                    <meta http-equiv="refresh" content="2; url=kustomer.php" />
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
