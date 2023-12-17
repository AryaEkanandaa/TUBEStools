<?php
require "session.php";
require "../koneksi.php";

$idTransaksi = $_GET['idTransaksi'];

$queryTransaksi = mysqli_query($con, "SELECT * FROM tbTransaksi WHERE idTransaksi='$idTransaksi'");
$dataTransaksi = mysqli_fetch_array($queryTransaksi);

if (!$dataTransaksi) {
    // Handle jika data tidak ditemukan
    echo "Data transaksi tidak ditemukan.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
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
        <h2>Detail Transaksi</h2>
        <div class="col-12 col-md-6 mt-3 mb-5">
            <form action="" method="post">
                <div>
                    <label for="idPelanggan">ID Pelanggan</label>
                    <input type="text" id="idPelanggan" name="idPelanggan"
                        value="<?php echo $dataTransaksi['idPelanggan'] ?>" class="form-control" autocomplete="off"
                        readonly>
                </div>
                <div>
                    <label for="idPegawai">ID Pegawai</label>
                    <input type="text" id="idPegawai" name="idPegawai" value="<?php echo $dataTransaksi['idPegawai'] ?>"
                        class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="idBuku">ID Buku</label>
                    <input type="text" id="idBuku" name="idBuku" value="<?php echo $dataTransaksi['idBuku'] ?>"
                        class="form-control" autocomplete="off" readonly>
                </div>
                <div>
                    <label for="tanggalTransaksi">Tanggal Transaksi</label>
                    <input type="datetime" id="tanggalTransaksi" name="tanggalTransaksi"
                        value="<?php echo date('Y-m-d\TH:i:s', strtotime($dataTransaksi['tanggalTransaksi'])); ?>"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="totalHarga">Total Harga</label>
                    <input type="text" id="totalHarga" name="totalHarga"
                        value="<?php echo $dataTransaksi['totalHarga'] ?>" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="metodePembayaran">Metode Pembayaran</label>
                    <input type="text" id="metodePembayaran" name="metodePembayaran"
                        value="<?php echo $dataTransaksi['metodePembayaran'] ?>" class="form-control"
                        autocomplete="off">
                </div>
                <div>
                    <label for="statusPengiriman">Status Pengiriman</label>
                    <input type="text" id="statusPengiriman" name="statusPengiriman"
                        value="<?php echo $dataTransaksi['statusPengiriman'] ?>" class="form-control"
                        autocomplete="off">
                </div>
                <div>
                    <label for="alamatPengiriman">Alamat Pengiriman</label>
                    <textarea id="alamatPengiriman" name="alamatPengiriman" class="form-control"
                        autocomplete="off"><?php echo $dataTransaksi['alamatPengiriman'] ?></textarea>
                </div>
                <div>
                    <label for="kodeReferensi">Kode Referensi</label>
                    <input type="text" id="kodeReferensi" name="kodeReferensi"
                        value="<?php echo $dataTransaksi['kodeReferensi'] ?>" class="form-control" autocomplete="off"
                        readonly>
                </div>
                <div>
                    <label for="jenisTransaksi">Jenis Transaksi</label>
                    <input type="text" id="jenisTransaksi" name="jenisTransaksi"
                        value="<?php echo $dataTransaksi['jenisTransaksi'] ?>" class="form-control" autocomplete="off"
                        readonly>
                </div>
                <div>
                    <label for="modifiedDate">Tanggal Perubahan Data</label>
                    <input type="datetime" id="modifiedDate" name="modifiedDate"
                        value="<?php echo date('Y-m-d\TH:i:s', strtotime($dataTransaksi['modifiedDate'])); ?>"
                        class="form-control" autocomplete="off">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="updateTransaksi"><i
                            class="fa-solid fa-pen-to-square"></i> Update</button>
                    <button type="submit" class="btn btn-danger" name="deleteTransaksi"><i
                            class="fa-solid fa-trash"></i> Delete</button>
                </div>
            </form>

            <?php
            if (isset($_POST['updateTransaksi'])) {
                // Proses update transaksi
                $idPelanggan = $_POST['idPelanggan'];
                $idPegawai = $_POST['idPegawai'];
                $idBuku = $_POST['idBuku'];
                $tanggalTransaksi = $_POST['tanggalTransaksi'];
                $totalHarga = $_POST['totalHarga'];
                $metodePembayaran = $_POST['metodePembayaran'];
                $statusPengiriman = $_POST['statusPengiriman'];
                $alamatPengiriman = $_POST['alamatPengiriman'];
                $kodeReferensi = $_POST['kodeReferensi'];
                $jenisTransaksi = $_POST['jenisTransaksi'];
                $modifiedDate = $_POST['modifiedDate'];

                $queryUpdateTransaksi = mysqli_query($con, "UPDATE tbTransaksi SET 
                                                idPelanggan='$idPelanggan',
                                                idPegawai='$idPegawai',
                                                idBuku='$idBuku',
                                                tanggalTransaksi='$tanggalTransaksi',
                                                totalHarga='$totalHarga',
                                                metodePembayaran='$metodePembayaran',
                                                statusPengiriman='$statusPengiriman',
                                                alamatPengiriman='$alamatPengiriman',
                                                kodeReferensi='$kodeReferensi',
                                                jenisTransaksi='$jenisTransaksi',
                                                modifiedDate='$modifiedDate'
                                                WHERE idTransaksi='$idTransaksi'");

                if ($queryUpdateTransaksi) {
                    echo '<div class="alert alert-success mt-3" role="alert">Data Transaksi Berhasil Diupdate</div>';
                    echo '<meta http-equiv="refresh" content="2; url=list-transaksi.php" />';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Gagal Update Transaksi</div>';
                }
            }


            if (isset($_POST['deleteTransaksi'])) {
                // Proses delete transaksi
                $queryDeleteTransaksi = mysqli_query($con, "DELETE FROM tbTransaksi WHERE idTransaksi='$idTransaksi'");

                if ($queryDeleteTransaksi) {
                    echo '<div class="alert alert-success mt-3" role="alert">Data Transaksi Berhasil Dihapus</div>';
                    echo '<meta http-equiv="refresh" content="2; url=list-transaksi.php" />';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Gagal Menghapus Transaksi</div>';
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.2-web/js/all.min.js"></script>
</body>

</html>