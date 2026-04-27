<!-- 2. Gunakan for untuk mencetak bilangan genap dari 2 sampai 10. -->

<h3>Soal 2: Cetak Bilangan Genap (For Loop)</h3>
<form method="post">
    <label for="angka">Cetak sampai angka:</label>
    <input id="angka" type="number" name="maks" max="100">
    <button type="submit">Tampilkan</button>
</form>

<?php
if (isset($_POST['maks'])) {
    $maks = $_POST['maks'];
    for ($i = 2; $i <= $maks; $i++) {
        if ($i % 2 == 0) {
            echo "$i ";
        }
    }
}
?>