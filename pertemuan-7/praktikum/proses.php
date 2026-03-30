<?php

if (!empty($_POST["nama"])) {
    $nama = htmlspecialchars($_POST['nama']);
} else {
    echo "Nama tidak boleh kosong!";
}

if (empty($_POST['nilai'])) {
    echo "Nilai tidak boleh kosong!";
} else {
    $nilai = htmlspecialchars($_POST['nilai']);
}

if (empty($_POST['matakuliah'])) {
    echo "Mata Kuliah tidak boleh kosong!";
} else {
    $matakuliah = htmlspecialchars($_POST['matakuliah']);
}

if ($nilai >= 85 && $nilai <= 100) {
    $predikat = "A";
    $status = "Lulus";
} else if ($nilai >= 75 && $nilai < 85) {
    $predikat = "B";
    $status = "Lulus";
} else if ($nilai >= 65 && $nilai < 75) {
    $predikat = "C";
    $status = "Lulus";
} else if ($nilai >= 50 && $nilai < 65) {
    $predikat = "D";
    $status = "Tidak Lulus";
} else if ($nilai < 50) {
    $predikat = "E";
    $status = "Tidak Lulus";
} else {
    $predikat = "Tidak valid";
    $status = "Tidak valid";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai <?php echo $nama; ?></title>
</head>
<body>
    <h1>Hasil Nilai</h1>
    <p>Nama: <?php echo $nama; ?></p>
    <p>Mata Kuliah: <?php echo $matakuliah; ?></p>
    <p>Nilai: <?php echo $nilai; ?></p>
    <p>Predikat: <?php echo $predikat; ?></p>
    <p>Status: <?php echo $status; ?></p>

    <button onclick="window.location.href='latihan_nilai.php'">Back To Form</button>
</body>
</html>