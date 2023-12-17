<?php
require "session.php";
require "../koneksi.php";

$queryBuku = mysqli_query($con, "SELECT * FROM buku");
$jumlahBuku = mysqli_num_rows($queryBuku);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters);
    $randomString = "";
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKU - Tambah Buku</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 15px;
    }

    h3 {
        margin-bottom: 30px;
    }

    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 130vh;
    }

    label {
        font-weight: bold;
    }
</style>

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
                    <a href="list-buku.php" class="no-decoration text-black">
                        <i class="fa-solid fa-book"></i> Buku
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fa-solid fa-square-plus"></i> Tambah Buku
                </li>
            </ol>
        </nav>
    </div>
    <!-- Form untuk Menambah Buku -->
    <div class="container mt-5 center-form">
        <div class="col-12 col-md-6">
            <div class="card p-3">
                <h3 class="mb-4">Tambah Buku</h3>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" autocomplete="off" required>
                            <option value="">Pilih Satu</option>
                            <?php
                            while ($data = mysqli_fetch_array($queryKategori)) {
                                ?>
                                <option value="<?php echo $data['idKategori']; ?>">
                                    <?php echo $data['nama']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                            autocomplete="off" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <select name="stok" id="stok" class="form-select" autocomplete="off" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $deskripsi = htmlspecialchars($_POST['deskripsi']);
                    $stok = htmlspecialchars($_POST['stok']);
                    $penulis = htmlspecialchars($_POST['penulis']);
                    $penerbit = htmlspecialchars($_POST['penerbit']);
                    $modifiedDate = htmlspecialchars($_POST['modifiedDate']);

                    $target_dir = "../images/";
                    $namaFile = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $namaFile;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $randomName = generateRandomString(20);
                    $newName = $randomName . "." . $imageFileType;

                    // echo $target_dir."<br>";
                    // echo $namaFile."<br>";
                    // echo $target_file."<br>";
                    // echo $imageFileType."<br>";
                    // echo $image_size."<br>";
                
                    if ($nama == '' || $kategori == '' || $harga == '') {
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Nama, Kategori, dan Harga Wajib Diisi !
                        </div>

                        <?php
                    } else {
                        if ($namaFile != '') {
                            if ($image_size > 500000) {
                                ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    Ukuran File Lebih Dari 500kb!
                                </div>
                                <?php
                            } else {
                                if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                    ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        File WAJIB Bertipe JPG / PNG / GIF !
                                    </div>
                                    <?php
                                } else {
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $newName);
                                }
                            }
                        }
                        $queryTambah = mysqli_query($con, "INSERT INTO buku(idKategori, nama, harga, foto, deskripsi, stok, penulis, penerbit) VALUES ('$kategori','$nama','$harga','$newName','$deskripsi','$stok','$penulis','$penerbit')");

                        if ($queryTambah) {
                            ?>
                            <div class="alert alert-success mt-3" role="alert">
                                Buku Berhasil Tersimpan
                            </div>
                            <meta http-equiv="refresh" content="2; url=buku.php" />
                            <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
                ?>
            </div>
        </div>

        <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>