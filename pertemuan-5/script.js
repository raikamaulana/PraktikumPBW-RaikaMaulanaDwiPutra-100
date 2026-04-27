function cekNilai() {
    // Ambil semua elemen yang dibutuhkan dari DOM
    const nim = document.getElementById('nim').value;
    const nilai = document.getElementById('nilai').value;
    const info = document.getElementById('info-teks');
    let npmOutput = document.getElementById('npm-output');
    let grade = document.getElementById('grade-output');

    // Validasi input NIM tidak boleh kosong
    if (nim === "") {
        alert("NIM harus diisi!");
        return;
    }

    // Validasi input nilai tidak boleh kosong
    if (nilai === "") {
        alert("Nilai harus diisi!");
        return;
    }

    let hurufMutu = "";
    let warna = "";
    let warna2 = "";
    let keterangan = "Menunggu input ...";

    // Logika if-else berdasarkan tabel ketentuan skala nilai
    if (nilai < 0 || nilai > 100 || isNaN(nilai)) {
        hurufMutu = "-";
        warna = "#ffffff";
        warna2 = "#d1d1d1";
        keterangan = "Nilai tidak valid!";
    } if (nilai >= 80 && nilai <= 100) {
        hurufMutu = 'A';
        warna = "#25ff58";
        warna2 = "#62ff62";
        keterangan = "Sangat Baik";
    } else if (nilai >= 70 && nilai < 80) {
        hurufMutu = "B";
        warna = "#99ff99";
        warna2 = "#ccffcc";
        keterangan = "Baik";
    } else if (nilai >= 60 && nilai < 70) {
        hurufMutu = "C";
        warna = "#ffffff";
        warna2 = "#d1d1d1";
        keterangan = "Cukup";
    } else if (nilai >= 50 && nilai < 60) {
        hurufMutu = "D";
        warna = "#ff6161";
        warna2 = "#f7a6a6";
        keterangan = "Kurang - Remedial";
    } else if (nilai >= 0 && nilai < 50) {
        hurufMutu = "E";
        warna = "#ff2537";
        warna2 = "#ff7a7a";
        keterangan = "Sangat Kurang - Remedial";
    } 

    // Setelah menentukan huruf mutu, warna, dan keterangan berdasarkan nilai, kita update tampilan hasil di halaman
    npmOutput.innerText = nim;
    grade.innerHTML = hurufMutu;
    grade.style.background = `linear-gradient(to bottom, ${warna}, ${warna2})`;
    grade.style.webkitBackgroundClip = "text";
    info.innerText = keterangan;
}

// function untuk mereset dan mengosongkan form dan hasil penilaian saat tombol reset diklik, agar siap untuk input baru tanpa harus refresh halaman
function resetForm() {
    // 1. Kosongkan Input
    document.getElementById('nim').value = "";
    document.getElementById('nilai').value = "";

    // 2. Kembalikan Tampilan Hasil ke Awal
    document.getElementById('npm-output').innerText = "-";
    const grade = document.getElementById('grade-output');
    grade.innerText = "-";
    
    // Kembalikan warna grade ke putih/abu standar
    grade.style.background = "linear-gradient(to bottom, #ffffff, #ccc)";
    grade.style.webkitBackgroundClip = "text";
    
    document.getElementById('info-teks').innerText = "Menunggu input...";
    
    // 3. Fokuskan kembali ke input NIM
    document.getElementById('nim').focus();
}

