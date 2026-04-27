<?php
// Mendefinisikan Konstanta Pajak
// Menggunakan fungsi define() untuk membuat konstanta pajak agar nilainya tetap (immutable)
define("PAJAK", 0.10); // Pajak 10%

// Menyimpan Informasi Harga Barang dalam Array
$daftar_barang = [
    ["nama" => "Keyboard Mechanical", "harga" => 150000],
    ["nama" => "Gaming Mouse", "harga" => 100000],
    ["nama" => "Monitor LED", "harga" => 1200000],
    ["nama" => "Headset RGB", "harga" => 250000],
    ["nama" => "Webcam Full HD", "harga" => 400000],
    ["nama" => "Mousepad XL", "harga" => 80000]
];

// Inisialisasi variabel flag untuk menentukan apakah struk harus muncul atau tidak
$tampil_hasil = false;

// Memeriksa apakah form telah dikirim menggunakan metode POST melalui tombol 'beli'
if (isset($_POST['beli'])) {
    $tampil_hasil = true; // Set true agar section struk ditampilkan
    
    // Mengambil data dari form (Input & Variabel)
    $index_pilihan = $_POST['pilihan_barang']; 

    // Menyimpan jumlah input ke dalam variabel dan melakukan casting ke (int) untuk keamanan
    $jumlah_beli = (int)$_POST['jumlah_beli']; // Variabel jumlah beli
    
    // Ambil detail barang dari array berdasarkan index
    // Mengakses data array $daftar_barang berdasarkan index yang dipilih user
    $barang_terpilih = $daftar_barang[$index_pilihan];
    $nama_barang = $barang_terpilih['nama'];
    $harga_satuan = $barang_terpilih['harga'];
    
    // Perhitungan Aritmatika
    // Menghitung total harga awal (Harga Satuan x Jumlah Beli)
    $total_sebelum_pajak = $harga_satuan * $jumlah_beli;

    // Menghitung nominal pajak menggunakan konstanta yang sudah didefinisikan
    $nominal_pajak = $total_sebelum_pajak * PAJAK;

    // Menghitung total akhir yang harus dibayar
    $total_bayar = $total_sebelum_pajak + $nominal_pajak;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir Elektronik Pt.6</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <section class="form-section">
            <div class="header-kasir">
                <h1>Kasir Elektronik</h1>
                <p>Pilih satu barang untuk diproses.</p>
            </div>

            <form action="" method="POST" id="formKasir">
                <div class="product-grid">
                    <?php 
                        // Menggunakan perulangan foreach untuk menampilkan semua data dari array
                        // $index digunakan sebagai 'value' pada input radio agar sistem tahu barang mana yang diklik
                        foreach ($daftar_barang as $index => $item): 
                    ?>
                        <label class="product-card">
                            <input type="radio" name="pilihan_barang" value="<?= $index ?>" required>
                            <div class="card-content">
                                <span class="p-name"><?= $item['nama'] ?></span>
                                <span class="p-price">Rp <?= number_format($item['harga'], 0, ',', '.') ?></span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="qty-section">
                    <label>Jumlah Beli:</label>
                    <input type="number" name="jumlah_beli" value="1" min="1" required>
                </div>

                <button type="submit" name="beli" class="btn-beli">PROSES TRANSAKSI</button>
            </form>
        </section>

        <section class="receipt-section">
            <div class="receipt-paper">
                <h2>Struk Pembelian</h2>
                <hr>
                <?php 
                    // Menggunakan logika pengkondisian if untuk mengecek apakah data sudah diproses
                    if($tampil_hasil): 
                ?>
                    <div class="receipt-details">
                        <p>Nama Barang: <strong><?= $nama_barang ?></strong></p>
                        <p>Harga Satuan: <span>Rp <?= number_format($harga_satuan, 0, ',', '.') ?></span></p>
                        <p>Jumlah Beli: <span><?= $jumlah_beli ?></span></p>
                        <p>Total Harga (Sebelum Pajak): <span>Rp <?= number_format($total_sebelum_pajak, 0, ',', '.') ?></span></p>
                        <p>Pajak (10%): <span>Rp <?= number_format($nominal_pajak, 0, ',', '.') ?></span></p>
                        <div class="total-bayar">
                            Total Bayar: Rp <?= number_format($total_bayar, 0, ',', '.') ?>
                        </div>
                        <button onclick="window.location.href=window.location.href" class="btn-reset">Reset Kasir</button>
                    </div>
                <?php else: ?>
                    <div class="no-data">
                        <p>Menunggu Transaksi...</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</body>
</html>