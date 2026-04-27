<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Toko Buku Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_buku.php">Tambah Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat_transaksi.php">Riwayat Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<?php
// Pastikan session sudah dimulai sebelum mengakses $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Toko Buku Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_buku.php">Tambah Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat_transaksi.php">Riwayat Transaksi</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['nama'])): ?>
                    <li class="nav-item">
                        <span class="nav-link text-white me-3">
                            Halo, <strong><?php echo htmlspecialchars($_SESSION['nama']); ?></strong>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger btn-sm mt-1" href="logout.php" 
                            onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>