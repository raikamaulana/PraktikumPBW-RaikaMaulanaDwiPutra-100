<!-- 3. Buat array daftar nama hewan dan tampilkan menggunakan foreach -->

<h3>Soal 3: Daftar Hewan (Foreach)</h3>
<form method="post">
    <label for="nama-hewan">Input nama-nama hewan (pisahkan dengan koma):</label>
    <input id="nama-hewan" type="text" name="hewan_raw" style="width:100%">
    <button type="submit">Proses Array</button>
</form>

<?php
if (!empty($_POST['hewan_raw'])) {
    $daftar_hewan = explode(",", $_POST['hewan_raw']);
    echo "<ul>";
    foreach ($daftar_hewan as $h) {
        echo "<li>" . trim($h) . "</li>";
    }
    echo "</ul>";
}
?>