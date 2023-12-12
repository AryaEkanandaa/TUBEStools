<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../admin">Home</a>
                </li>
                <li class="nav-item dropdown"> <!-- Menambahkan dropdown pada item Kategori -->
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                        <li><a class="dropdown-item" href="kategori.php">List Kategori</a></li>
                        <li><a class="dropdown-item" href="kategori.php">Tambah Kategori</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"> <!-- Menambahkan dropdown pada item Buku -->
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="bukuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Buku
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bukuDropdown">
                        <li><a class="dropdown-item" href="list-buku.php">List Buku</a></li>
                        <li><a class="dropdown-item" href="buku.php">Tambah Buku</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"> <!-- Menambahkan dropdown pada item Pelanggan -->
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="pelangganDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pelanggan
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="pelangganDropdown">
                        <li><a class="dropdown-item" href="list-kustomer.php">List Pelanggan</a></li>
                        <li><a class="dropdown-item" href="kustomer.php">Tambah Pelanggan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"> <!-- Menambahkan dropdown pada item Pegawai -->
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="pegawaiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pegawai
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pegawaiDropdown">
                        <li><a class="dropdown-item" href="list-pegawai.php">List Pegawai</a></li>
                        <li><a class="dropdown-item" href="pegawai.php">Tambah Pegawai</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"> <!-- Menambahkan dropdown pada item Pegawai -->
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="transkasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transaksi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="transaksiDropdown">
                        <li><a class="dropdown-item" href="list-pegawai.php">List Transaksi</a></li>
                        <li><a class="dropdown-item" href="transaksi.php">Tambah Transaksi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
