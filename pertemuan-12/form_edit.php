<?php include 'session_proteksi.php'; // mencegah masuk jika belum login (jika tidak ada sesi?>
<?php
include 'koneksi_db.php';
include 'nav.php';
 
// Mengambil ID dari URL, jika tidak ada set ke 0
$id = $_GET['id'] ?? 0;
 
// Ambil data buku berdasarkan ID menggunakan prepared statement
$stmt = $conn->prepare("SELECT * FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Buku</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Buku</h2>
        <form method="post" action="proses_edit.php">
            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
 
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" 
                       value="<?= htmlspecialchars($row['Judul']) ?>" required>
            </div>
 
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" 
                       value="<?= htmlspecialchars($row['Penulis']) ?>" required>
            </div>
 
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" 
                       value="<?= $row['Tahun_Terbit'] ?>" required>
            </div>
 
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" 
                       value="<?= $row['Harga'] ?>" step="0.01" required>
            </div>
 
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" 
                       value="<?= $row['stok'] ?>" required>
            </div>
 
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>