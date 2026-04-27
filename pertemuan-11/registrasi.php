<?php
// Mengimpor file koneksi database
include 'koneksi_db.php';

// Menonaktifkan laporan error sementara (opsional, seperti contohmu)
error_reporting(0);

session_start();

// Jika sudah login, lempar ke index 
if (isset($_SESSION['login_Un51k4'])) {
    header("Location: index.php");
    exit;
}

// Proses saat tombol submit ditekan
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Validasi apakah password dan confirm password sama
    if ($password == $cpassword) {
        // Cek apakah username sudah ada di database 
        $sql_cek = "SELECT * FROM pengguna WHERE nama = ?";
        $stmt_cek = $conn->prepare($sql_cek);
        $stmt_cek->bind_param("s", $username);
        $stmt_cek->execute();
        $result_cek = $stmt_cek->get_result();

        if ($result_cek->num_rows == 0) {
            // Jika belum ada, lakukan INSERT 
            $sql_ins = "INSERT INTO pengguna (nama, katasandi) VALUES (?, ?)";
            $stmt_ins = $conn->prepare($sql_ins);
            $stmt_ins->bind_param("ss", $username, $password);
            
            if ($stmt_ins->execute()) {
                echo "<script>alert('Selamat, registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan sistem.')</script>";
            }
            $stmt_ins->close();
        } else {
            echo "<script>alert('Woops! Username sudah terdaftar.')</script>";
        }
        $stmt_cek->close();
    } else {
        echo "<script>alert('Password tidak sesuai!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register - Toko Buku Online</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Register</h2>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" 
                                        value="<?php echo $username; ?>" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" 
                                        value="<?php echo $_POST['password']; ?>" placeholder="Masukkan password" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" id="cpassword" name="cpassword" class="form-control" 
                                        value="<?php echo $_POST['cpassword']; ?>" placeholder="Ulangi password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button name="submit" class="btn btn-primary">Register</button>
                            </div>
                            <p class="mt-3 text-center text-muted">
                                Sudah punya akun? <a href="login.php" class="text-decoration-none text-primary">Login di sini</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>