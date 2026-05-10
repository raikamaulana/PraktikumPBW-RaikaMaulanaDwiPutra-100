<?php include 'session_proteksi.php'; // mencegah masuk jika belum login (jika tidak ada sesi?>
<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyiapkan query UPDATE dengan prepared statement
    $stmt = $conn->prepare("UPDATE Buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, stok=? WHERE ID=?");
    
    // Mengikat parameter (ssiiii = string, string, integer, integer, integer, integer)
    $stmt->bind_param("ssiiii", $judul, $penulis, $tahun, $harga, $stok, $id);

    // Eksekusi statement dan cek hasilnya
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='index.php';</script>";
    }

    // Menutup statement
    $stmt->close();
}
?>