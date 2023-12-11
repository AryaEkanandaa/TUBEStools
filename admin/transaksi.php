<?php
require "../koneksi.php";

$queryPelanggan = mysqli_query($con, "SELECT * FROM tbpelanggan");
$queryPegawai = mysqli_query($con, "SELECT * FROM tbpegawai");

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
    <title>TRANSAKSI - Tambah Transaksi</title>
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
                    <a href="list-transaksi.php" class="no-decoration text-black">
                        <i class="fa-solid fa-shopping-cart"></i> Transaksi
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fa-solid fa-square-plus"></i> Tambah Transaksi
                </li>
            </ol>
        </nav>
    </div>
    <!-- Form untuk Menambah Transaksi -->
    <div class="container mt-5 center-form">
        <div class="col-12 col-md-6">
            <div class="card p-3">
                <h3 class="mb-4">Tambah Transaksi</h3>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="idPelanggan" class="form-label">Pelanggan</label>
                        <select name="idPelanggan" id="idPelanggan" class="form-select" required>
                            <option value="">Pilih Pelanggan</option>
                            <?php
                            while ($dataPelanggan = mysqli_fetch_array($queryPelanggan)) {
                                echo "<option value='{$dataPelanggan['idPelanggan']}'>{$dataPelanggan['namaPelanggan']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idPegawai" class="form-label">Pegawai</label>
                        <select name="idPegawai" id="idPegawai" class="form-select" required>
                            <option value="">Pilih Pegawai</option>
                            <?php
                            while ($dataPegawai = mysqli_fetch_array($queryPegawai)) {
                                echo "<option value='{$dataPegawai['idPegawai']}'>{$dataPegawai['namaPegawai']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalTransaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="datetime-local" id="tanggalTransaksi" name="tanggalTransaksi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="totalHarga" class="form-label">Total Harga</label>
                        <input type="number" id="totalHarga" name="totalHarga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                        <select name="metodePembayaran" id="metodePembayaran" class="form-select" required>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="statusPengiriman" class="form-label">Status Pengiriman</label>
                        <select name="statusPengiriman" id="statusPengiriman" class="form-select" required>
                            <option value="Belum Diproses">Belum Diproses</option>
                            <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                            <option value="Terkirim">Terkirim</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamatPengiriman" class="form-label">Alamat Pengiriman</label>
                        <textarea name="alamatPengiriman" id="alamatPengiriman" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kodeReferensi" class="form-label">Kode Referensi</label>
                        <input type="text" id="kodeReferensi" name="kodeReferensi" class="form-control" value="<?php echo generateRandomString(10); ?>" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="jenisTransaksi" class="form-label">Jenis Transaksi</label>
                        <select name="jenisTransaksi" id="jenisTransaksi" class="form-select" required>
                            <option value="sewa">Sewa</option>
                            <option value="bayar">Bayar</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                    $idPelanggan = $_POST['idPelanggan'];
                    $idPegawai = $_POST['idPegawai'];
                    $tanggalTransaksi = $_POST['tanggalTransaksi'];
                    $totalHarga = $_POST['totalHarga'];
                    $metodePembayaran = $_POST['metodePembayaran'];
                    $statusPengiriman = $_POST['statusPengiriman'];
                    $alamatPengiriman = $_POST['alamatPengiriman'];
                    $kodeReferensi = $_POST['kodeReferensi'];
                    $jenisTransaksi = $_POST['jenisTransaksi'];

                    $queryTambah = mysqli_query($con, "INSERT INTO tbTransaksi (idPelanggan, idPegawai, tanggalTransaksi, totalHarga, metodePembayaran, statusPengiriman, alamatPengiriman, kodeReferensi, jenisTransaksi) VALUES ('$idPelanggan', '$idPegawai', '$tanggalTransaksi', '$totalHarga', '$metodePembayaran', '$statusPengiriman', '$alamatPengiriman', '$kodeReferensi', '$jenisTransaksi')");

                    if ($queryTambah) {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Transaksi Berhasil Tersimpan
                        </div>
                        <meta http-equiv="refresh" content="2; url=list-transaksi.php" />
                        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>
