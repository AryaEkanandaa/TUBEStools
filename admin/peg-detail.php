<?php
require "session.php";
require "../koneksi.php";

$idPegawai = $_GET['idPegawai'];

$queryPegawai = mysqli_query($con, "SELECT * FROM tbpegawai WHERE idPegawai='$idPegawai'");
$dataPegawai = mysqli_fetch_array($queryPegawai);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
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
        <h2>Detail Pegawai</h2>
        <div class="col-12 col-md-6 mt-3 mb-5">
            <form action="" method="post">
                <div>
                    <label for="namaPegawai">Nama Pegawai</label>
                    <input type="text" id="namaPegawai" name="namaPegawai" value="<?php echo $dataPegawai['namaPegawai'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="noTelp">No Telepon</label>
                    <input type="text" id="noTelp" name="noTelp" value="<?php echo $dataPegawai['noTelp'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $dataPegawai['alamat'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $dataPegawai['email'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" id="tanggalLahir" name="tanggalLahir" value="<?php echo $dataPegawai['tanggalLahir'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="updatePegawai">Update</button>
                    <button type="submit" class="btn btn-danger" name="deletePegawai">Delete</button>
                </div>
            </form>

            <?php
            if (isset($_POST['updatePegawai'])) {
                // Proses update pegawai
                $namaPegawai = mysqli_real_escape_string($con, $_POST['namaPegawai']);
                $noTelp = mysqli_real_escape_string($con, $_POST['noTelp']);
                $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $tanggalLahir = mysqli_real_escape_string($con, $_POST['tanggalLahir']);

                $queryUpdatePegawai = mysqli_query($con, "UPDATE tbpegawai SET 
                                                        namaPegawai='$namaPegawai',
                                                        noTelp='$noTelp',
                                                        alamat='$alamat',
                                                        email='$email',
                                                        tanggalLahir='$tanggalLahir'
                                                        WHERE idPegawai='$idPegawai'");

                if ($queryUpdatePegawai) {
                    echo '<div class="alert alert-success mt-3" role="alert">Data Pegawai Berhasil Diupdate</div>';
                    echo '<meta http-equiv="refresh" content="2; url=pegawai.php" />';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Gagal Update Pegawai</div>';
                }
            }

            if (isset($_POST['deletePegawai'])) {
                // Proses delete pegawai
                $queryDeletePegawai = mysqli_query($con, "DELETE FROM tbpegawai WHERE idPegawai='$idPegawai'");

                if ($queryDeletePegawai) {
                    echo '<div class="alert alert-success mt-3" role="alert">Data Pegawai Berhasil Dihapus</div>';
                    echo '<meta http-equiv="refresh" content="2; url=pegawai.php" />';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Gagal Menghapus Pegawai</div>';
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
