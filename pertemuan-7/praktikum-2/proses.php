<?php
// Pastikan ada data yang dikirim lewat POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = htmlspecialchars($_POST['npm']);
    $nama = htmlspecialchars($_POST['nama']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $semester = (int)$_POST['semester'];
    $biaya_ukt = (float)$_POST['biaya_ukt'];

    // Logika perhitungan diskon
    $diskon_persen = 0;
    if ($biaya_ukt >= 5000000) {
        $diskon_persen = 10;
        if ($semester > 8) {
            $diskon_persen += 5;
        }
    }

    $nominal_diskon = ($diskon_persen / 100) * $biaya_ukt;
    $total_bayar = $biaya_ukt - $nominal_diskon;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pembayaran UKT - <?= $nama ?></title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .container { border: 1px solid #000; padding: 20px; width: fit-content; }
        h3 { margin-top: 0; text-decoration: underline; }
        .back-btn { margin-top: 15px; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <p>NPM : <?php echo $npm; ?></p>
        <p>NAMA : <?php echo strtoupper($nama); ?></p>
        <p>PRODI : <?php echo strtoupper($prodi); ?></p>
        <p>SEMESTER : <?php echo $semester; ?></p>
        <p>BIAYA UKT : Rp. <?php echo number_format($biaya_ukt, 0, ',', '.'); ?>,-</p>
        <p>DISKON : <?php echo $diskon_persen; ?>%</p>
        <p><strong>YANG HARUS DIBAYAR : Rp. <?php echo number_format($total_bayar, 0, ',', '.'); ?></strong></p>
    </div>

    <button class="back-btn" onclick="window.location.href='input_pembayaran.php'">Back To Form</button>

</body>
</html>