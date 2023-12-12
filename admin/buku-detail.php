<?php
require "session.php";
require "../koneksi.php";

$idBuku = $_GET['idBuku'];

$query = mysqli_query($con, "SELECT * FROM buku WHERE idBuku='$idBuku'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE idKategori!='$data[idKategori]'");

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
    <title>Detail Buku</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <style>
        .no-decoration {
            text-decoration: none;
        }

        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }

        .alert {
            margin-top: 15px;
        }

        .btn-success {
            margin-top: 15px;
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
                    <a href="list-buku.php" class="no-decoration text-black">
                        <i class="fa-solid fa-book"></i> Buku
                    </a>
                <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa-solid fa-search"></i>Detail Buku
                </li>
            </ol>
        </nav>
    <h2>Detail Buku</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo $data['nama'] ?>" class="form-control"
                    autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" autocomplete="off">
                    <option value="<?php echo $data['idKategori']; ?>">
                        <?php echo $data['idKategori'] ?>
                    </option>
                    <?php
                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                        <option value="<?php echo $data['idKategori']; ?>">
                            <?php echo $dataKategori['nama']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" value="<?php echo $data['harga'] ?>" name="harga"
                    autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="currentPhoto">Foto Produk</label>
                <br>
                <img src="../images/<?php echo $data['foto'] ?>" alt="">
            </div>
            <div class="mb-3">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"
                    autocomplete="off"><?php echo $data['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <select name="stok" id="stok" class="form-control">
                    <option value="<?php echo $data['stok'] ?>">
                        <?php echo $data['stok'] ?>
                    </option>
                    <?php
                    if ($data['stok'] == 'tersedia') {
                        ?>
                        <option value="habis">Habis</option>
                        <?php
                    } else {
                        ?>
                        <option value="tersedia">Tersedia</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <i class="fa-regular fa-pen-to-square"></i>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $kategori = htmlspecialchars($_POST['kategori']);
            $harga = htmlspecialchars($_POST['harga']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            $stok = htmlspecialchars($_POST['stok']);

            $target_dir = "../images/";
            $namaFile = basename($_FILES["foto"]["name"]);
            $target_file = $target_dir . $namaFile;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_size = $_FILES["foto"]["size"];
            $randomName = generateRandomString(20);
            $newName = $randomName . "." . $imageFileType;

            if ($nama == '' || $kategori == '' || $harga == '') {
                ?>
                <div class="alert alert-danger" role="alert">
                    Nama, Kategori, dan Harga Wajib Diisi!
                </div>
                <?php
            } else {
                $queryUpdate = mysqli_query($con, "UPDATE buku SET idKategori='$kategori', 
                nama='$nama', harga='$harga', deskripsi='$deskripsi',
                stok='$stok' WHERE idBuku=$idBuku");

                if ($namaFile != '') {
                    if ($image_size > 500000) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Ukuran File Lebih Dari 500kb!
                        </div>
                        <?php
                    } else {
                        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                File WAJIB Bertipe JPG / PNG / GIF!
                            </div>
                            <?php
                        } else {
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $newName);
                            $queryUpdate = mysqli_query($con, "UPDATE buku SET foto='$newName' WHERE idBuku='$idBuku'");
                            if ($queryUpdate) {
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Buku Berhasil Tersimpan
                                </div>
                                <meta http-equiv="refresh" content="2; url=buku.php" />
                                <?php
                            }
                        }
                    }
                }
            }
        }
        ?>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
