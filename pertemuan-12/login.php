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

<!-- ============================ BOOTSTRAP ============================ -->
<!-- <!DOCTYPE html>
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
</html> -->
<!-- ============================ BOOTSTRAP ============================ -->

<!-- ============================ TAILWIND CSS ============================ -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku Online</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0d0b0f;
            --cream: #f5f0e8;
            --gold: #c9a84c;
            --gold-light: #e8c96e;
            --muted: #6b6270;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--ink);
            color: var(--cream);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .font-display { font-family: 'Cormorant Garamond', serif; }

        /* ── Canvas bg ── */
        #bg-canvas {
            position: fixed; inset: 0; z-index: 0;
            pointer-events: none;
        }

        /* ── Noise texture overlay ── */
        .noise::after {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 1; opacity: 0.4;
        }

        /* ── Layout split ── */
        .layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            position: relative; z-index: 2;
        }

        @media (max-width: 768px) {
            .layout { grid-template-columns: 1fr; }
            .left-panel { display: none; }
        }

        /* ── Left decorative panel ── */
        .left-panel {
            display: flex; flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
            position: relative;
            border-right: 1px solid rgba(201,168,76,0.15);
            overflow: hidden;
        }

        .left-panel .big-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(4rem, 8vw, 7rem);
            font-weight: 300;
            line-height: 0.9;
            letter-spacing: -0.03em;
            color: rgba(245,240,232,0.07);
            user-select: none;
            animation: fadeSlideUp 1.2s cubic-bezier(.16,1,.3,1) both;
        }

        .left-panel .tagline {
            animation: fadeSlideUp 1.2s 0.2s cubic-bezier(.16,1,.3,1) both;
        }

        .book-stack {
            position: absolute;
            bottom: 0; left: 50%;
            transform: translateX(-50%);
            display: flex; align-items: flex-end; gap: 8px;
            animation: fadeSlideUp 1.4s 0.4s cubic-bezier(.16,1,.3,1) both;
        }

        .book {
            border-radius: 3px 6px 6px 3px;
            transform-origin: bottom center;
            transition: transform 0.4s cubic-bezier(.34,1.56,.64,1);
            cursor: default;
        }
        .book:hover { transform: translateY(-12px) rotate(-3deg); }

        /* ── Right form panel ── */
        .right-panel {
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            padding: 3rem 2rem;
        }

        .glass-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(201,168,76,0.2);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%; max-width: 400px;
            backdrop-filter: blur(20px);
            box-shadow:
                0 0 0 1px rgba(201,168,76,0.05),
                0 32px 64px rgba(0,0,0,0.5),
                inset 0 1px 0 rgba(255,255,255,0.05);
            animation: cardReveal 1s 0.3s cubic-bezier(.16,1,.3,1) both;
        }

        @keyframes cardReveal {
            from { opacity: 0; transform: translateY(24px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Input fields ── */
        .input-wrap {
            position: relative;
            animation: fadeSlideUp 0.8s cubic-bezier(.16,1,.3,1) both;
        }
        .input-wrap:nth-child(1) { animation-delay: 0.55s; }
        .input-wrap:nth-child(2) { animation-delay: 0.65s; }

        .field-input {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(201,168,76,0.2);
            border-radius: 10px;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            color: var(--cream);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 0.01em;
            transition: border-color 0.3s, background 0.3s, box-shadow 0.3s;
            outline: none;
        }
        .field-input::placeholder { color: rgba(245,240,232,0.3); }
        .field-input:focus {
            border-color: var(--gold);
            background: rgba(201,168,76,0.06);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.12), 0 0 20px rgba(201,168,76,0.08);
        }

        .field-icon {
            position: absolute; left: 0.85rem; top: 50%;
            transform: translateY(-50%);
            color: rgba(201,168,76,0.5);
            pointer-events: none;
            transition: color 0.3s;
        }
        .input-wrap:focus-within .field-icon { color: var(--gold); }

        .field-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(245,240,232,0.45);
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }
        .input-wrap:focus-within .field-label { color: var(--gold-light); }

        /* ── Toggle password ── */
        .toggle-pw {
            position: absolute; right: 0.85rem; top: 50%;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: rgba(245,240,232,0.3);
            transition: color 0.3s; padding: 0;
        }
        .toggle-pw:hover { color: var(--gold); }

        /* ── Submit button ── */
        .btn-login {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--gold) 0%, #a8732e 100%);
            border: none; border-radius: 10px;
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            cursor: pointer;
            position: relative; overflow: hidden;
            transition: transform 0.2s, box-shadow 0.3s, opacity 0.3s;
            animation: fadeSlideUp 0.8s 0.75s cubic-bezier(.16,1,.3,1) both;
        }
        .btn-login::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, #e8c96e, var(--gold));
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(201,168,76,0.35); }
        .btn-login:hover::before { opacity: 1; }
        .btn-login:active { transform: translateY(0); }
        .btn-login span { position: relative; z-index: 1; }

        /* ── Shimmer on button ── */
        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%; left: -75%;
            width: 50%; height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transform: skewX(-20deg);
            animation: shimmer 3s 2s infinite;
        }
        @keyframes shimmer {
            0%   { left: -75%; opacity: 1; }
            50%  { left: 125%; opacity: 1; }
            100% { left: 125%; opacity: 0; }
        }

        /* ── Alert ── */
        .alert-info {
            background: rgba(201,168,76,0.1);
            border: 1px solid rgba(201,168,76,0.3);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
            color: var(--gold-light);
            display: flex; align-items: center; justify-content: space-between;
            animation: fadeSlideUp 0.6s ease both;
        }

        /* ── Gold divider ── */
        .gold-line {
            width: 40px; height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 0 auto;
        }

        /* ── Floating orbs ── */
        .orb {
            position: fixed; border-radius: 50%;
            filter: blur(80px);
            pointer-events: none; z-index: 0;
            animation: drift 12s ease-in-out infinite;
        }
        .orb-1 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
            top: -100px; left: -100px;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(100,60,160,0.1) 0%, transparent 70%);
            bottom: -50px; right: -50px;
            animation-delay: -6s;
        }
        @keyframes drift {
            0%, 100% { transform: translate(0, 0); }
            33%       { transform: translate(30px, -20px); }
            66%       { transform: translate(-20px, 30px); }
        }

        /* ── Stagger for card children ── */
        .stagger-1 { animation: fadeSlideUp 0.8s 0.4s both; }
        .stagger-2 { animation: fadeSlideUp 0.8s 0.5s both; }
        .stagger-3 { animation: fadeSlideUp 0.8s 0.85s both; }
        .stagger-4 { animation: fadeSlideUp 0.8s 0.95s both; }
    </style>
</head>
<body class="noise">

    <!-- Floating orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- Animated particles canvas -->
    <canvas id="bg-canvas"></canvas>

    <div class="layout">

        <!-- ══ LEFT PANEL ══ -->
        <div class="left-panel">
            <div class="tagline">
                <p class="font-display italic text-sm tracking-widest mb-1" style="color:var(--gold);opacity:0.8;">Toko Buku Online</p>
                <div class="gold-line" style="margin:0;width:32px;"></div>
            </div>

            <div>
                <div class="big-text">Buku<br>adalah<br>jendela<br>dunia.</div>
            </div>

            <!-- Decorative book stack -->
            <div class="book-stack" style="padding-bottom: 0;">
                <div class="book" style="width:28px;height:160px;background:linear-gradient(180deg,#3a2a5e,#241a3d);"></div>
                <div class="book" style="width:22px;height:200px;background:linear-gradient(180deg,#c9a84c,#8a6a28);"></div>
                <div class="book" style="width:32px;height:140px;background:linear-gradient(180deg,#2d4a3e,#1a3028);"></div>
                <div class="book" style="width:20px;height:190px;background:linear-gradient(180deg,#5e2a2a,#3d1a1a);"></div>
                <div class="book" style="width:26px;height:165px;background:linear-gradient(180deg,#1a3050,#0d1e36);"></div>
                <div class="book" style="width:18px;height:210px;background:linear-gradient(180deg,#4a3a1a,#2e2510);"></div>
                <div class="book" style="width:30px;height:150px;background:linear-gradient(180deg,#3d1a4a,#260f30);"></div>
            </div>

            <p class="text-xs tracking-widest" style="color:rgba(245,240,232,0.2);letter-spacing:0.12em;">© 2026 INFORMATIKA UNSIKA</p>
        </div>

        <!-- ══ RIGHT PANEL ══ -->
        <div class="right-panel">
            <div class="glass-card">

                <!-- Header -->
                <div class="text-center mb-6 stagger-1">
                    <p class="text-xs tracking-widest uppercase mb-2" style="color:var(--gold);letter-spacing:0.15em;">Selamat datang</p>
                    <h1 class="font-display text-3xl font-light" style="color:var(--cream);line-height:1.1;">
                        Masuk ke<br><em>Sistem</em>
                    </h1>
                    <div class="gold-line mt-3"></div>
                </div>

                <!-- Alert (PHP conditional) -->
                <?php if (isset($_GET['message'])): ?>
                <div class="alert-info mb-4 stagger-2">
                    <span><?= htmlspecialchars($_GET['message']) ?></span>
                    <button onclick="this.parentElement.style.opacity='0';setTimeout(()=>this.parentElement.remove(),300)"
                        style="background:none;border:none;color:inherit;cursor:pointer;font-size:1rem;line-height:1;transition:opacity 0.3s;">✕</button>
                </div>
                <?php endif; ?>

                <!-- Form -->
                <form method="post" action="proses_login.php" class="flex flex-col gap-4">

                    <!-- Username -->
                    <div class="input-wrap">
                        <label for="username" class="field-label">Nama Pengguna</label>
                        <div style="position:relative;">
                            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                            </svg>
                            <input type="text" id="username" name="username" class="field-input"
                                placeholder="Masukkan username" required autocomplete="username">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-wrap">
                        <label for="password" class="field-label">Kata Sandi</label>
                        <div style="position:relative;">
                            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            <input type="password" id="password" name="password" class="field-input"
                                placeholder="Masukkan password" required autocomplete="current-password">
                            <button type="button" class="toggle-pw" id="toggle-pw" aria-label="Toggle password">
                                <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-login mt-2">
                        <span>Masuk Sekarang</span>
                    </button>

                </form>

                <!-- Register link -->
                <div class="text-center mt-5 stagger-3">
                    <div class="gold-line mb-4"></div>
                    <p class="text-xs mb-2" style="color:rgba(245,240,232,0.35);letter-spacing:0.03em;">Belum punya akun?</p>
                    <a href="registrasi.php" style="color:var(--gold);font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;font-weight:500;transition:color 0.3s;display:inline-flex;align-items:center;gap:6px;"
                        onmouseover="this.style.color='var(--gold-light)'"
                        onmouseout="this.style.color='var(--gold)'">
                        Daftar di sini
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>

            </div>

            <p class="text-center mt-6 stagger-4" style="color:rgba(245,240,232,0.2);font-size:0.7rem;letter-spacing:0.1em;">
                © 2026 INFORMATIKA UNSIKA
            </p>
        </div>
    </div>

    <script>
        // ── Particle canvas ──
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');
        let W, H, particles = [];

        function resize() {
            W = canvas.width  = window.innerWidth;
            H = canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        class Particle {
            constructor() { this.reset(true); }
            reset(init) {
                this.x = Math.random() * W;
                this.y = init ? Math.random() * H : H + 10;
                this.size = Math.random() * 1.5 + 0.3;
                this.speedY = -(Math.random() * 0.4 + 0.1);
                this.speedX = (Math.random() - 0.5) * 0.2;
                this.opacity = Math.random() * 0.5 + 0.1;
                this.gold = Math.random() > 0.6;
            }
            update() {
                this.x += this.speedX; this.y += this.speedY;
                if (this.y < -10) this.reset(false);
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = this.gold
                    ? `rgba(201,168,76,${this.opacity})`
                    : `rgba(245,240,232,${this.opacity * 0.4})`;
                ctx.fill();
            }
        }

        for (let i = 0; i < 120; i++) particles.push(new Particle());

        function animate() {
            ctx.clearRect(0, 0, W, H);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animate);
        }
        animate();

        // ── Toggle password ──
        const pwInput = document.getElementById('password');
        const toggleBtn = document.getElementById('toggle-pw');
        const eyeIcon = document.getElementById('eye-icon');

        const eyeOpen  = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
        const eyeClosed = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;

        toggleBtn.addEventListener('click', () => {
            const isHidden = pwInput.type === 'password';
            pwInput.type = isHidden ? 'text' : 'password';
            eyeIcon.innerHTML = isHidden ? eyeClosed : eyeOpen;
        });

        // ── Input ripple effect on focus ──
        document.querySelectorAll('.field-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.input-wrap').style.transform = 'scale(1.01)';
                this.closest('.input-wrap').style.transition = 'transform 0.3s';
            });
            input.addEventListener('blur', function() {
                this.closest('.input-wrap').style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
<!-- ============================ TAILWIND CSS ============================ -->