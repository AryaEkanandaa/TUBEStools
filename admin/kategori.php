<?php
require "session.php";
require "../koneksi.php";

if (isset($_POST["simpan_kategori"])) {
    $kategori = htmlspecialchars($_POST["kategori"]);

    $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

    if ($jumlahDataKategoriBaru > 0) {
        $alertMessage = "Kategori Sudah Ada";
        $alertType = "danger";
    } else {
        $querySave = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

        if ($querySave) {
            $alertMessage = "Kategori Berhasil Tersimpan";
            $alertType = "success";
            header("refresh:2; url=list-kategori.php");
        } else {
            $alertMessage = mysqli_error($con);
            $alertType = "danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

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
                    <i class="fa-solid fa-align-justify"></i> Kategori
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3> Tambah Kategori </h3>
            <?php if (isset($alertMessage) && isset($alertType)) { ?>
                <div class="alert alert-<?php echo $alertType; ?> mt-3" role="alert">
                    <?php echo $alertMessage; ?>
                </div>
            <?php } ?>

            <form action="" method="post">
                <div>
                    <div class="mt-3">
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input Nama Kategori"
                            class="form-control" autocomplete="off">
                    </div>
                </div>
                <div>
                    <div class="mt-3">
                        <button class="btn btn-success" type="submit" name="simpan_kategori">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
