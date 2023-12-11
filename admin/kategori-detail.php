<?php
require "session.php";
require "../koneksi.php";

$idKategori = $_GET['idKategori'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE idKategori='$idKategori'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <h2>Detail Kategori</h2>
        <div class="col-12 col-md-6 mt-3">
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control"
                        value="<?php echo $data['nama'] ?>">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-warning" name="edit">Edit</button>
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $kategori = htmlspecialchars($_POST['kategori']);

                if ($data['nama'] == $kategori) {
                    ?>
                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                } else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahData = mysqli_num_rows($query);

                    if ($jumlahData > 0) {
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Kategori Sudah Ada
                        </div>

                        <meta http-equiv="refresh" content="1; url=kategori.php" />
                        <?php
                    } else {
                        $querySave = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE idKategori='$idKategori'");

                        if ($querySave) {
                            ?>
                            <div class="alert alert-success mt-3" role="alert">
                                Kategori Berhasil Dirubah
                            </div>
                            <meta http-equiv="refresh" content="2; url=kategori.php" />
                            <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            if (isset($_POST["delete"])) {
                $queryCheck = mysqli_query($con,"SELECT * FROM buku WHERE idKategori = '$idKategori'");
                $dataCount = mysqli_num_rows($queryCheck);

                if($dataCount>0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Tidak Dapat Dihapus Karena Memiliki Produk !
                    </div>
                    <?php
                    die();
                }

                $queryDelete = mysqli_query($con, "DELETE FROM kategori Where idKategori='$idKategori'");

                if ($queryDelete) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Kategori Berhasil Dihapus !
                    </div>

                    <meta http-equiv="refresh" content="1; url=kategori.php" />
                    <?php
                }
                else{
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