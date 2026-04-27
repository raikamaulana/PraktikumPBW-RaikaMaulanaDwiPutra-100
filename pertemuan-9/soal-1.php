<!-- 1. Buat program menggunakan switch untuk menentukan jenis kendaraan berdasarkan jumlah roda. -->

<h3>Soal 1: Jenis Kendaraan (Switch-case)</h3>
<form method="post">
    <label for="roda">Jumlah Roda:</label>
    <input id="roda" type="number" name="roda" required>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_POST['roda'])) {
    $roda = $_POST['roda'];
    switch ($roda) {
        case 1:
            $hasil = "Unicycle";
            break;
        case 2: 
            $hasil = "Sepeda Motor"; 
            break;
        case 3: 
            $hasil = "Bajaj/Becak"; 
            break;
        case 4: 
            $hasil = "Mobil"; 
            break;
        case 6: 
            $hasil = "Truk Fuso"; 
            break;
        case 8: 
            $hasil = "Tank Tempur"; 
            break;
        default: 
            $hasil = "Kendaraan tidak dikenal"; 
            break;
    }
    echo "<p>Kendaraan: <b>$hasil</b></p>";
}
?>
<hr>