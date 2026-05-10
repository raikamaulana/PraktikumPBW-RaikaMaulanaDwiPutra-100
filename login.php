<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* ══════════════════════════════════════════
           THEME TOKENS
           Dark  → deep ink black
           Light → deep ocean navy  (stark contrast with gold → no nyaru)
        ══════════════════════════════════════════ */
        :root {
            --gold:       #c9a84c;
            --gold-light: #e8c96e;
            --gold-dark:  #a8732e;

            /* ── DARK MODE defaults ── */
            --bg:            #0d0b0f;
            --bg-panel:      #100e14;
            --surface:       rgba(255,255,255,0.03);
            --border:        rgba(201,168,76,0.20);
            --border-line:   rgba(201,168,76,0.15);
            --text-main:     #f5f0e8;
            --text-muted:    rgba(245,240,232,0.35);
            --text-faint:    rgba(245,240,232,0.20);
            --big-text-clr:  rgba(245,240,232,0.07);
            --input-bg:      rgba(255,255,255,0.04);
            --input-color:   #f5f0e8;
            --input-ph:      rgba(245,240,232,0.30);
            --label-color:   rgba(245,240,232,0.45);
            --card-shadow:   0 32px 64px rgba(0,0,0,0.55);
            --orb1-clr:      rgba(201,168,76,0.12);
            --orb2-clr:      rgba(100,60,160,0.10);

            --t: background-color 0.5s ease, color 0.5s ease,
                 border-color 0.4s ease, box-shadow 0.4s ease;
        }

        /* ── LIGHT MODE (deep ocean navy) ── */
        [data-theme="light"] {
            --bg:            #16263a;
            --bg-panel:      #101e2e;
            --surface:       rgba(255,255,255,0.07);
            --border:        rgba(201,168,76,0.38);
            --border-line:   rgba(201,168,76,0.22);
            --text-main:     #ddeeff;       /* icy-blue white, pops against navy */
            --text-muted:    rgba(221,238,255,0.45);
            --text-faint:    rgba(221,238,255,0.28);
            --big-text-clr:  rgba(221,238,255,0.10);  /* visible on navy */
            --input-bg:      rgba(255,255,255,0.07);
            --input-color:   #ddeeff;
            --input-ph:      rgba(221,238,255,0.32);
            --label-color:   rgba(221,238,255,0.50);
            --card-shadow:   0 32px 64px rgba(0,0,0,0.45), 0 0 0 1px rgba(201,168,76,0.12);
            --orb1-clr:      rgba(201,168,76,0.16);
            --orb2-clr:      rgba(30,110,200,0.20);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            min-height: 100vh;
            overflow-x: hidden;
            transition: var(--t);
        }
        .font-display { font-family: 'Cormorant Garamond', serif; }

        /* ── Particle canvas ── */
        #bg-canvas { position: fixed; inset: 0; z-index: 0; pointer-events: none; }

        /* ── Noise overlay ── */
        .noise::after {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 1; opacity: 0.35;
        }

        /* ══ THEME TOGGLE BUTTON ══ */
        #theme-toggle {
            position: fixed; top: 1.3rem; right: 1.4rem; z-index: 200;
            display: flex; align-items: center; gap: 9px;
            cursor: pointer;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 5px 14px 5px 5px;
            backdrop-filter: blur(12px);
            transition: background 0.4s, border-color 0.4s, box-shadow 0.3s;
            user-select: none;
        }
        #theme-toggle:hover { box-shadow: 0 0 0 3px rgba(201,168,76,0.18); }

        .tt-thumb {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            box-shadow: 0 2px 8px rgba(201,168,76,0.45);
            display: flex; align-items: center; justify-content: center;
            transition: background 0.4s, transform 0.35s cubic-bezier(.34,1.56,.64,1);
            flex-shrink: 0;
        }
        [data-theme="light"] .tt-thumb {
            background: linear-gradient(135deg, #4ea8de, #1a6fa8);
            box-shadow: 0 2px 8px rgba(30,110,200,0.5);
            transform: rotate(180deg);
        }
        .tt-icon { width: 13px; height: 13px; stroke: #0d0b0f; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        [data-theme="light"] .tt-icon { stroke: #ddeeff; }

        .tt-label {
            font-size: 0.68rem; font-weight: 500;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--text-faint);
            transition: color 0.4s;
            white-space: nowrap;
        }

        /* ══ LAYOUT ══ */
        .layout { display: grid; grid-template-columns: 1fr 1fr; min-height: 100vh; position: relative; z-index: 2; }
        @media (max-width: 768px) { .layout { grid-template-columns: 1fr; } .left-panel { display: none; } }

        /* ══ LEFT PANEL ══ */
        .left-panel {
            display: flex; flex-direction: column; justify-content: space-between;
            padding: 3rem; position: relative;
            border-right: 1px solid var(--border-line);
            background: var(--bg-panel);
            overflow: hidden;
            transition: var(--t), border-color 0.4s;
        }

        .big-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(4rem, 8vw, 7rem);
            font-weight: 300; line-height: 0.9; letter-spacing: -0.03em;
            color: var(--big-text-clr);
            user-select: none;
            animation: fadeUp 1.2s cubic-bezier(.16,1,.3,1) both;
            transition: color 0.5s;
        }
        .tagline { animation: fadeUp 1.2s 0.2s cubic-bezier(.16,1,.3,1) both; }

        .book-stack {
            position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);
            display: flex; align-items: flex-end; gap: 8px;
            animation: fadeUp 1.4s 0.4s cubic-bezier(.16,1,.3,1) both;
        }
        .book {
            border-radius: 3px 6px 6px 3px;
            transform-origin: bottom center;
            transition: transform 0.4s cubic-bezier(.34,1.56,.64,1); cursor: default;
        }
        .book:hover { transform: translateY(-12px) rotate(-3deg); }

        /* ══ RIGHT PANEL ══ */
        .right-panel {
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            padding: 3rem 2rem;
            background: var(--bg);
            transition: var(--t);
        }

        /* ══ GLASS CARD ══ */
        .glass-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px; padding: 2.5rem;
            width: 100%; max-width: 400px;
            backdrop-filter: blur(20px);
            box-shadow: var(--card-shadow), inset 0 1px 0 rgba(255,255,255,0.05);
            animation: cardReveal 1s 0.3s cubic-bezier(.16,1,.3,1) both;
            transition: background 0.5s, border-color 0.4s, box-shadow 0.4s;
        }
        @keyframes cardReveal { from { opacity:0; transform:translateY(24px) scale(0.98); } to { opacity:1; transform:none; } }
        @keyframes fadeUp     { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:none; } }

        /* ══ INPUTS ══ */
        .input-wrap { position: relative; animation: fadeUp 0.8s cubic-bezier(.16,1,.3,1) both; }
        .input-wrap:nth-child(1) { animation-delay:.55s; }
        .input-wrap:nth-child(2) { animation-delay:.65s; }

        .field-input {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: 10px; padding: 0.9rem 2.8rem 0.9rem 2.8rem;
            color: var(--input-color);
            font-family: 'DM Sans', sans-serif; font-size: 0.9rem; letter-spacing: 0.01em;
            outline: none;
            transition: border-color 0.3s, background 0.3s, box-shadow 0.3s, color 0.4s;
        }
        .field-input::placeholder { color: var(--input-ph); }
        .field-input:focus {
            border-color: var(--gold);
            background: rgba(201,168,76,0.06);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.12), 0 0 20px rgba(201,168,76,0.08);
        }
        .field-icon {
            position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%);
            color: rgba(201,168,76,0.5); pointer-events: none; transition: color 0.3s;
        }
        .input-wrap:focus-within .field-icon { color: var(--gold); }

        .field-label {
            display: block; font-size: 0.72rem; font-weight: 500;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--label-color); margin-bottom: 0.5rem; transition: color 0.3s;
        }
        .input-wrap:focus-within .field-label { color: var(--gold-light); }

        .toggle-pw {
            position: absolute; right: 0.85rem; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: var(--input-ph); transition: color 0.3s; padding: 0;
        }
        .toggle-pw:hover { color: var(--gold); }

        /* ══ BUTTON ══ */
        .btn-login {
            width: 100%; padding: 0.9rem;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            border: none; border-radius: 10px;
            color: #0d0b0f; font-family: 'DM Sans', sans-serif;
            font-weight: 500; font-size: 0.9rem; letter-spacing: 0.05em; text-transform: uppercase;
            cursor: pointer; position: relative; overflow: hidden;
            transition: transform 0.2s, box-shadow 0.3s;
            animation: fadeUp 0.8s 0.75s cubic-bezier(.16,1,.3,1) both;
        }
        .btn-login::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(201,168,76,0.35); }
        .btn-login:hover::before { opacity: 1; }
        .btn-login:active { transform: translateY(0); }
        .btn-login span { position: relative; z-index: 1; }
        .btn-login::after {
            content: '';
            position: absolute; top: -50%; left: -75%; width: 50%; height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transform: skewX(-20deg);
            animation: shimmer 3s 2s infinite;
        }
        @keyframes shimmer {
            0%   { left:-75%; opacity:1; }
            50%  { left:125%; opacity:1; }
            100% { left:125%; opacity:0; }
        }

        /* ══ MISC ══ */
        .gold-line {
            width: 40px; height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 0 auto;
        }
        .alert-info {
            background: rgba(201,168,76,0.1); border: 1px solid rgba(201,168,76,0.3);
            border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.85rem;
            color: var(--gold-light);
            display: flex; align-items: center; justify-content: space-between;
            animation: fadeUp 0.6s ease both;
        }

        /* ══ ORBS ══ */
        .orb { position: fixed; border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 0; animation: drift 12s ease-in-out infinite; }
        .orb-1 { width:400px; height:400px; top:-100px; left:-100px; }
        .orb-2 { width:300px; height:300px; bottom:-50px; right:-50px; animation-delay:-6s; }
        @keyframes drift { 0%,100%{transform:translate(0,0)} 33%{transform:translate(30px,-20px)} 66%{transform:translate(-20px,30px)} }

        /* ══ STAGGER ══ */
        .s1{animation:fadeUp .8s .40s both} .s2{animation:fadeUp .8s .50s both}
        .s3{animation:fadeUp .8s .85s both} .s4{animation:fadeUp .8s .95s both}

        /* ══ THEME TEXT HELPERS ══ */
        .txt-main  { color: var(--text-main);  transition: color 0.4s; }
        .txt-muted { color: var(--text-muted); transition: color 0.4s; }
        .txt-faint { color: var(--text-faint); transition: color 0.4s; }
    </style>
</head>
<body class="noise">

    <!-- ══ THEME TOGGLE ══ -->
    <button id="theme-toggle" aria-label="Ganti tema" title="Ganti tema">
        <div class="tt-thumb">
            <!-- icon replaced by JS -->
            <svg class="tt-icon" id="tt-icon" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
            </svg>
        </div>
        <span class="tt-label" id="tt-label">Dark</span>
    </button>

    <!-- Orbs -->
    <div class="orb orb-1" id="orb1"></div>
    <div class="orb orb-2" id="orb2"></div>

    <!-- Particles -->
    <canvas id="bg-canvas"></canvas>

    <div class="layout">

        <!-- ══ LEFT PANEL ══ -->
        <div class="left-panel">
            <div class="tagline">
                <p class="font-display italic text-sm tracking-widest mb-1" style="color:var(--gold);opacity:0.85;">Toko Buku Online</p>
                <div class="gold-line" style="margin:0;width:32px;"></div>
            </div>
            <div>
                <div class="big-text">Buku<br>adalah<br>jendela<br>dunia.</div>
            </div>
            <div class="book-stack">
                <div class="book" style="width:28px;height:160px;background:linear-gradient(180deg,#3a2a5e,#241a3d);"></div>
                <div class="book" style="width:22px;height:200px;background:linear-gradient(180deg,#c9a84c,#8a6a28);"></div>
                <div class="book" style="width:32px;height:140px;background:linear-gradient(180deg,#2d4a3e,#1a3028);"></div>
                <div class="book" style="width:20px;height:190px;background:linear-gradient(180deg,#5e2a2a,#3d1a1a);"></div>
                <div class="book" style="width:26px;height:165px;background:linear-gradient(180deg,#1a3050,#0d1e36);"></div>
                <div class="book" style="width:18px;height:210px;background:linear-gradient(180deg,#4a3a1a,#2e2510);"></div>
                <div class="book" style="width:30px;height:150px;background:linear-gradient(180deg,#3d1a4a,#260f30);"></div>
            </div>
            <p class="txt-faint text-xs" style="letter-spacing:0.12em;">© 2026 INFORMATIKA UNSIKA</p>
        </div>

        <!-- ══ RIGHT PANEL ══ -->
        <div class="right-panel">
            <div class="glass-card">

                <!-- Header -->
                <div class="text-center mb-6 s1">
                    <p class="text-xs tracking-widest uppercase mb-2" style="color:var(--gold);letter-spacing:0.15em;">Selamat datang</p>
                    <h1 class="font-display text-3xl font-light txt-main" style="line-height:1.1;">
                        Masuk ke<br><em>Sistem</em>
                    </h1>
                    <div class="gold-line mt-3"></div>
                </div>

                <!-- Alert (PHP) -->
                <?php if (isset($_GET['message'])): ?>
                <div class="alert-info mb-4 s2">
                    <span><?= htmlspecialchars($_GET['message']) ?></span>
                    <button onclick="this.parentElement.style.opacity='0';setTimeout(()=>this.parentElement.remove(),300)"
                        style="background:none;border:none;color:inherit;cursor:pointer;font-size:1rem;line-height:1;">✕</button>
                </div>
                <?php endif; ?>

                <!-- Form -->
                <form method="post" action="proses_login.php" class="flex flex-col gap-4">

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

                    <button type="submit" class="btn-login mt-2">
                        <span>Masuk Sekarang</span>
                    </button>
                </form>

                <!-- Register -->
                <div class="text-center mt-5 s3">
                    <div class="gold-line mb-4"></div>
                    <p class="text-xs mb-2 txt-muted">Belum punya akun?</p>
                    <a href="registrasi.php"
                        style="color:var(--gold);font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;font-weight:500;transition:color 0.3s;display:inline-flex;align-items:center;gap:6px;"
                        onmouseover="this.style.color='var(--gold-light)'"
                        onmouseout="this.style.color='var(--gold)'">
                        Daftar di sini
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>

            </div>

            <p class="text-center mt-6 txt-faint s4" style="font-size:0.7rem;letter-spacing:0.1em;">
                © 2026 INFORMATIKA UNSIKA
            </p>
        </div>
    </div>

<script>
/* ══ THEME SYSTEM ══ */
const html     = document.documentElement;
const ttBtn    = document.getElementById('theme-toggle');
const ttIcon   = document.getElementById('tt-icon');
const ttLabel  = document.getElementById('tt-label');
const orb1el   = document.getElementById('orb1');
const orb2el   = document.getElementById('orb2');

const MOON = `<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>`;
const SUN  = `<circle cx="12" cy="12" r="5"/>
<line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/>
<line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
<line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
<line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>`;

let isDark = localStorage.getItem('tbou-theme') !== 'light';
applyTheme(isDark);

function applyTheme(dark) {
    isDark = dark;
    html.setAttribute('data-theme', dark ? 'dark' : 'light');
    ttIcon.innerHTML  = dark ? MOON : SUN;
    ttLabel.textContent = dark ? 'Dark' : 'Light';
    localStorage.setItem('tbou-theme', dark ? 'dark' : 'light');

    orb1el.style.background = dark
        ? 'radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%)'
        : 'radial-gradient(circle, rgba(201,168,76,0.16) 0%, transparent 70%)';
    orb2el.style.background = dark
        ? 'radial-gradient(circle, rgba(100,60,160,0.10) 0%, transparent 70%)'
        : 'radial-gradient(circle, rgba(30,110,200,0.20) 0%, transparent 70%)';
}

ttBtn.addEventListener('click', () => applyTheme(!isDark));

/* ══ PARTICLES ══ */
const canvas = document.getElementById('bg-canvas');
const ctx    = canvas.getContext('2d');
let W, H, pts = [];

function resize() { W = canvas.width = innerWidth; H = canvas.height = innerHeight; }
resize(); addEventListener('resize', resize);

class Pt {
    constructor() { this.reset(true); }
    reset(init) {
        this.x  = Math.random() * W;
        this.y  = init ? Math.random() * H : H + 10;
        this.r  = Math.random() * 1.5 + 0.3;
        this.vy = -(Math.random() * 0.4 + 0.1);
        this.vx = (Math.random() - 0.5) * 0.2;
        this.a  = Math.random() * 0.5 + 0.1;
        this.gold = Math.random() > 0.6;
    }
    step() { this.x += this.vx; this.y += this.vy; if (this.y < -10) this.reset(false); }
    draw() {
        ctx.beginPath(); ctx.arc(this.x, this.y, this.r, 0, Math.PI*2);
        ctx.fillStyle = this.gold
            ? `rgba(201,168,76,${this.a})`
            : isDark
                ? `rgba(245,240,232,${this.a * 0.4})`
                : `rgba(180,220,255,${this.a * 0.55})`;
        ctx.fill();
    }
}

for (let i = 0; i < 120; i++) pts.push(new Pt());
(function loop() { ctx.clearRect(0,0,W,H); pts.forEach(p=>{p.step();p.draw();}); requestAnimationFrame(loop); })();

/* ══ TOGGLE PASSWORD ══ */
const pwInput  = document.getElementById('password');
const pwToggle = document.getElementById('toggle-pw');
const eyeIcon  = document.getElementById('eye-icon');
const EYE_OPEN   = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
const EYE_CLOSED = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;

pwToggle.addEventListener('click', () => {
    const h = pwInput.type === 'password';
    pwInput.type = h ? 'text' : 'password';
    eyeIcon.innerHTML = h ? EYE_CLOSED : EYE_OPEN;
});

/* ══ INPUT SCALE ON FOCUS ══ */
document.querySelectorAll('.field-input').forEach(inp => {
    inp.addEventListener('focus', function() {
        this.closest('.input-wrap').style.cssText += 'transform:scale(1.01);transition:transform 0.3s;';
    });
    inp.addEventListener('blur', function() {
        this.closest('.input-wrap').style.transform = 'scale(1)';
    });
});
</script>
</body>
</html>
