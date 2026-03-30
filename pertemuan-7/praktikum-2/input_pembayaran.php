<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pembayaran Mahasiswa</title>
</head>
<body>
    <h2>Input Data Pembayaran Mahasiswa</h2>
    <form action="proses.php" method="POST">
        <label>NPM:</label><br>
        <input type="text" name="npm" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" required><br><br>

        <label>Semester:</label><br>
        <input type="number" name="semester" required><br><br>

        <label>Biaya UKT (Rupiah):</label><br>
        <input type="number" name="biaya_ukt" required><br><br>

        <button type="submit">Proses Pembayaran</button>
    </form>
</body>
</html>