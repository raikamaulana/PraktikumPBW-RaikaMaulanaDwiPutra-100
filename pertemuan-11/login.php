<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2> Masuk kedalam sistem</h2>
    
    <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>
    
    <form method="post" action="proses_login.php">
        <div class="mb-3">
            <label>Nama pengguna :</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Kata sandi :</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Masuk ke Sistem</h2>
                        
                        <?php if (isset($_GET['message'])): ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($_GET['message']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>
                        
                        <form method="post" action="proses_login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nama pengguna :</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata sandi :</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                            <div class="mt-4 text-center">
                                <p class="mb-0 text-muted">Belum punya akun?</p>
                                <a href="registrasi.php" class="btn btn-link text-decoration-none p-0">Daftar di sini</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <p class="text-center mt-3 text-secondary small">
                    &copy; 2026 Informatika UNSIKA
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>