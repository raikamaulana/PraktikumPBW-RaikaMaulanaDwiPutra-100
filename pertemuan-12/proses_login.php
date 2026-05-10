<?php
session_start(); // Memulai session [cite: 1822]
include 'koneksi_db.php'; // Koneksi menggunakan MySQLi OOP [cite: 1822, 1823]

// Proses jika form dikirim [cite: 1823]
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; // Mengambil input username [cite: 1823]
    $password = $_POST['password']; // Mengambil input password [cite: 1824]

    // Cek user di database menggunakan prepared statement untuk keamanan [cite: 1824]
    $stmt = $conn->prepare("SELECT id, nama, katasandi FROM pengguna WHERE nama = ? AND katasandi = ?");
    $stmt->bind_param("ss", $username, $password); // Mengikat parameter string [cite: 1825]
    $stmt->execute();

    $result = $stmt->get_result();

    // Validasi hasil: jika ditemukan tepat 1 pengguna [cite: 1825]
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Menyimpan data pengguna ke dalam session 
        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['login_Un51k4'] = true; // Flag penanda sudah login 

        // Redirect ke halaman utama jika sukses [cite: 1827]
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, kembali ke login dengan pesan error 
        header("Location: login.php?message=" . urlencode("password salah broo..."));
    }

    $stmt->close();
}
?>