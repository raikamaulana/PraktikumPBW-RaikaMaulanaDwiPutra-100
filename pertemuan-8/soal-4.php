<!-- 4. Gunakan ternary operator untuk menentukan apakah angka adalah genap atau ganjil -->

<h3>Soal 4: Ganjil atau Genap (Ternary Operator)</h3>
<form method="post">
    <label for="angka-ganjil-genap">Masukkan Angka:</label> 
    <input id="angka-ganjil-genap" type="number" name="angka">
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_POST['angka'])) {
    $n = $_POST['angka'];

    $status = ($n % 2 == 0) ? "Genap" : "Ganjil";
    echo "<p>Angka $n adalah bilangan <b>$status</b></p>";
}
?>