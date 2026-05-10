<?php include 'session_proteksi.php'; ?>
<?php include 'proses_index.php'; ?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Toko Buku Online</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
    // Tailwind config — extend dengan design tokens kustom
    tailwind.config = {
        darkMode: ['attribute', '[data-theme="dark"]'],
        theme: {
            extend: {
                fontFamily: {
                    sans:    ['DM Sans', 'sans-serif'],
                    display: ['Cormorant Garamond', 'serif'],
                },
                colors: {
                    gold:    { DEFAULT: '#c9a84c', light: '#e8c96e', dim: 'rgba(201,168,76,0.12)' },
                    danger:  { DEFAULT: '#d95b5b', dim: 'rgba(217,91,91,0.12)' },
                    warn:    { DEFAULT: '#d9955b', dim: 'rgba(217,149,91,0.12)' },
                    success: { DEFAULT: '#5ba882', dim: 'rgba(91,168,130,0.12)' },
                },
                keyframes: {
                    slideDown: {
                        from: { opacity: '0', transform: 'translateY(-16px)' },
                        to:   { opacity: '1', transform: 'translateY(0)' },
                    },
                    drift: {
                        '0%,100%': { transform: 'translate(0,0)' },
                        '33%':     { transform: 'translate(-30px,20px)' },
                        '66%':     { transform: 'translate(20px,-30px)' },
                    },
                },
                animation: {
                    'slide-down':   'slideDown 0.7s cubic-bezier(.16,1,.3,1) both',
                    'slide-down-1': 'slideDown 0.7s 0.1s cubic-bezier(.16,1,.3,1) both',
                    'slide-down-2': 'slideDown 0.7s 0.2s cubic-bezier(.16,1,.3,1) both',
                    'slide-down-3': 'slideDown 0.7s 0.3s cubic-bezier(.16,1,.3,1) both',
                    'slide-down-4': 'slideDown 0.7s 0.4s cubic-bezier(.16,1,.3,1) both',
                    'drift':        'drift 15s ease-in-out infinite',
                    'drift-rev':    'drift 18s ease-in-out infinite reverse',
                },
            },
        },
    }
    </script>

    <style>
        /* ── CSS Variables (dark / light) ── */
        :root, [data-theme="dark"] {
            --bg:          #0d0b0f;
            --bg2:         #13101a;
            --surface:     rgba(255,255,255,0.03);
            --border:      rgba(201,168,76,0.18);
            --border-soft: rgba(201,168,76,0.08);
            --ink:         #f5f0e8;
            --ink-muted:   rgba(245,240,232,0.45);
            --ink-faint:   rgba(245,240,232,0.18);
            --gold:        #c9a84c;
            --gold-light:  #e8c96e;
            --gold-dim:    rgba(201,168,76,0.12);
            --danger:      #d95b5b;
            --danger-dim:  rgba(217,91,91,0.12);
            --warn:        #d9955b;
            --warn-dim:    rgba(217,149,91,0.12);
            --success:     #5ba882;
            --success-dim: rgba(91,168,130,0.12);
            --row-hover:   rgba(201,168,76,0.05);
        }
        [data-theme="light"] {
            --bg:          #faf8f4;
            --bg2:         #f0ece2;
            --surface:     rgba(255,255,255,0.8);
            --border:      rgba(150,110,30,0.2);
            --border-soft: rgba(150,110,30,0.08);
            --ink:         #1a1510;
            --ink-muted:   rgba(26,21,16,0.5);
            --ink-faint:   rgba(26,21,16,0.2);
            --gold:        #a8762a;
            --gold-light:  #c9a84c;
            --gold-dim:    rgba(168,118,42,0.1);
            --danger:      #b53030;
            --danger-dim:  rgba(181,48,48,0.1);
            --warn:        #b56620;
            --warn-dim:    rgba(181,102,32,0.1);
            --success:     #2e7a54;
            --success-dim: rgba(46,122,84,0.1);
            --row-hover:   rgba(168,118,42,0.05);
        }

        /* ── Base ── */
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--ink);
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        /* ── Noise grain overlay ── */
        body::after {
            content: '';
            position: fixed; inset: 0; z-index: 1;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; opacity: 0.35;
            transition: opacity 0.5s;
        }
        [data-theme="light"] body::after { opacity: 0.15; }

        .bg-surface    { background: var(--surface); }
        .border-token  { border-color: var(--border); }
        .border-soft   { border-color: var(--border-soft); }
        .text-ink      { color: var(--ink); }
        .text-muted    { color: var(--ink-muted); }
        .text-faint    { color: var(--ink-faint); }
        .text-gold     { color: var(--gold); }
        .bg-gold-dim   { background: var(--gold-dim); }
        .bg-danger-dim { background: var(--danger-dim); }
        .bg-warn-dim   { background: var(--warn-dim); }
        .bg-success-dim{ background: var(--success-dim); }
        .border-gold   { border-color: var(--gold); }
        .border-danger { border-color: rgba(217,91,91,0.25); }
        .border-warn   { border-color: rgba(217,149,91,0.25); }
        .border-success{ border-color: rgba(91,168,130,0.2); }

        /* ── Glass card ── */
        .glass-card {
            background: var(--surface);
            border: 1px solid var(--border);
            backdrop-filter: blur(20px);
            transition: background 0.5s, border-color 0.5s;
        }

        /* ── Sidebar nav links ── */
        .nav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 0.7rem 0.75rem;
            border-radius: 10px;
            color: var(--ink-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 400;
            transition: background 0.25s, color 0.25s, transform 0.2s;
            position: relative;
        }
        .nav-link:hover {
            background: var(--gold-dim);
            color: var(--ink);
            transform: translateX(3px);
        }
        .nav-link.active {
            background: var(--gold-dim);
            color: var(--gold);
            font-weight: 500;
        }
        .nav-link.active::before {
            content: '';
            position: absolute; left: 0; top: 20%; bottom: 20%;
            width: 3px;
            background: var(--gold);
            border-radius: 0 3px 3px 0;
        }
        .nav-link-danger:hover {
            background: var(--danger-dim);
            color: var(--danger);
        }

        /* ── Table rows ── */
        tbody tr:hover td { background: var(--row-hover); }

        /* ── Stat card hover ── */
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2), 0 0 0 1px var(--border);
        }
        .stat-card::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(201,168,76,0.06) 0%, transparent 60%);
            pointer-events: none;
            border-radius: inherit;
        }

        /* ── Theme toggle ── */
        .toggle-thumb { transition: transform 0.4s cubic-bezier(.34,1.56,.64,1); }
        [data-theme="light"] .toggle-thumb { transform: translateX(24px); }

        /* ── Rank bar animation ── */
        .rank-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 2px;
            transition: width 1s 0.5s cubic-bezier(.16,1,.3,1);
        }

        /* ── Reveal animation ── */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s cubic-bezier(.16,1,.3,1), transform 0.6s cubic-bezier(.16,1,.3,1);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* ── Input focus ring ── */
        .field-input:focus {
            border-color: var(--gold);
            background: var(--gold-dim);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.12);
            outline: none;
        }
        .field-input::placeholder { color: var(--ink-faint); }

        /* ── Buttons ── */
        .btn-primary {
            background: linear-gradient(135deg, var(--gold) 0%, #8a5e20 100%);
            color: #0d0b0f;
            box-shadow: 0 4px 16px rgba(201,168,76,0.3);
            position: relative; overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-primary:hover { box-shadow: 0 8px 24px rgba(201,168,76,0.4); }
        .btn-primary:hover::after { opacity: 1; }
        .btn-primary span { position: relative; z-index: 1; }

        .btn-ghost {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--ink-muted);
        }
        .btn-ghost:hover {
            background: var(--gold-dim);
            color: var(--ink);
            border-color: var(--gold);
        }

        .btn-edit {
            background: var(--warn-dim);
            border: 1px solid rgba(217,149,91,0.25);
            color: var(--warn);
        }
        .btn-edit:hover { background: rgba(217,149,91,0.2); box-shadow: 0 4px 12px rgba(217,149,91,0.2); }

        .btn-delete {
            background: var(--danger-dim);
            border: 1px solid rgba(217,91,91,0.25);
            color: var(--danger);
        }
        .btn-delete:hover { background: rgba(217,91,91,0.2); box-shadow: 0 4px 12px rgba(217,91,91,0.2); }

        /* ── Bar chart ── */
        .bar {
            flex: 1;
            background: var(--gold-dim);
            border: 1px solid var(--border);
            border-radius: 4px 4px 0 0;
            transition: background 0.3s;
            cursor: pointer;
        }
        .bar:hover { background: rgba(201,168,76,0.3); }
        .bar.highlighted {
            background: linear-gradient(180deg, var(--gold-light), var(--gold));
            border-color: var(--gold);
        }

        /* ── Custom scrollbar ── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">

    <!-- Ambient orbs -->
    <div class="fixed top-[-150px] right-[-150px] w-[500px] h-[500px] rounded-full pointer-events-none z-0 animate-drift"
         style="background:radial-gradient(circle, rgba(201,168,76,0.1) 0%, transparent 70%); filter:blur(100px);"></div>
    <div class="fixed bottom-0 left-[-80px] w-[350px] h-[350px] rounded-full pointer-events-none z-0 animate-drift-rev"
         style="background:radial-gradient(circle, rgba(80,40,140,0.08) 0%, transparent 70%); filter:blur(100px);"></div>
    <canvas id="bg-canvas" class="fixed inset-0 z-0 pointer-events-none"></canvas>

    <!-- App shell: sidebar + topbar + main -->
    <div class="relative z-[2] grid min-h-screen" style="grid-template-columns:260px 1fr;grid-template-rows:auto 1fr;">

        <!-- ══ TOP BAR ══ -->
        <header class="col-span-2 flex items-center justify-between px-8 h-16 glass-card sticky top-0 z-50 border-b border-token"
                style="backdrop-filter:blur(20px);">

            <!-- Brand -->
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-[10px] flex items-center justify-center"
                     style="background:linear-gradient(135deg,var(--gold),#8a5e20);box-shadow:0 4px 12px rgba(201,168,76,0.3);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0d0b0f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
                <span class="font-display italic text-gold" style="font-size:1.1rem;font-weight:400;">Toko Buku Online</span>
            </div>

            <!-- Right side -->
            <div class="flex items-center gap-4">
                <!-- Theme toggle -->
                <label class="relative w-[52px] h-7 cursor-pointer" title="Toggle Dark/Light Mode">
                    <input type="checkbox" id="theme-switch" class="opacity-0 w-0 h-0 absolute">
                    <div class="absolute inset-0 bg-gold-dim border border-token rounded-[14px] flex items-center px-1 transition-all duration-300">
                        <div class="toggle-thumb w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                             style="background:var(--gold);">
                            <svg id="theme-icon" width="11" height="11" viewBox="0 0 24 24" fill="currentColor" style="color:#0d0b0f;">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        </div>
                    </div>
                </label>

                <?php include 'nav.php'; ?>

                <a href="logout.php" class="flex items-center gap-2 px-3 py-1.5 rounded-full border border-token bg-gold-dim hover:bg-[rgba(201,168,76,0.18)] transition-all duration-300 no-underline"
                   style="box-shadow:none;" title="Keluar"
                   onmouseover="this.style.boxShadow='0 4px 16px rgba(201,168,76,0.2)'"
                   onmouseout="this.style.boxShadow='none'">
                    <div class="w-7 h-7 rounded-full flex items-center justify-center font-semibold text-[0.7rem]"
                         style="background:linear-gradient(135deg,var(--gold),#8a5e20);color:#0d0b0f;">
                        <?php echo isset($_SESSION['username']) ? strtoupper(substr($_SESSION['username'],0,2)) : 'US'; ?>
                    </div>
                    <span class="text-muted text-[0.8rem]">
                        <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?>
                    </span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-faint" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                </a>
            </div>
        </header>

        <!-- ══ SIDEBAR ══ -->
        <aside class="glass-card border-r border-token p-5 flex flex-col gap-2 hidden md:flex" style="backdrop-filter:blur(20px);">
            <p class="text-[0.62rem] tracking-[0.15em] uppercase text-faint px-3 mt-4 mb-1">Menu Utama</p>

            <a href="index.php" class="nav-link active">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                Daftar Buku
            </a>

            <a href="form_tambah.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
                Tambah Buku
            </a>

            <p class="text-[0.62rem] tracking-[0.15em] uppercase text-faint px-3 mt-4 mb-1">Akun</p>

            <a href="profil.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                Profil
            </a>

            <div class="mt-auto border-t border-soft pt-4">
                <a href="logout.php" class="nav-link nav-link-danger">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Keluar
                </a>
                <p class="text-[0.65rem] text-faint tracking-[0.1em] uppercase px-3 pt-3">
                    © 2026 Informatika UNSIKA
                </p>
            </div>
        </aside>

        <!-- ══ MAIN CONTENT ══ -->
        <main class="p-10 sm:p-5 overflow-y-auto flex flex-col gap-8">

            <!-- Page Header -->
            <div class="animate-slide-down">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-gold-dim border border-token rounded-full text-[0.7rem] tracking-[0.12em] uppercase text-gold mb-3">
                    <svg width="8" height="8" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4" fill="currentColor"/></svg>
                    Dashboard
                </div>
                <h1 class="font-display text-ink" style="font-size:2rem;font-weight:300;line-height:1.1;">
                    Daftar <em>Buku</em>
                </h1>
                <p class="text-muted text-sm mt-1">Kelola koleksi buku Anda dengan mudah dan elegan.</p>
            </div>

            <!-- ── STATS ── -->
            <?php
                $total_buku = 0; $total_nilai = 0; $harga_tertinggi = 0;
                $tahun_terlama = date('Y'); $rows_cache = [];
                if (isset($result)) {
                    while ($row = $result->fetch_assoc()) {
                        $rows_cache[] = $row;
                        $total_buku++;
                        $total_nilai += $row['Harga'];
                        if ($row['Harga'] > $harga_tertinggi) $harga_tertinggi = $row['Harga'];
                        if ($row['Tahun_Terbit'] < $tahun_terlama) $tahun_terlama = $row['Tahun_Terbit'];
                    }
                }
                $rata_harga = $total_buku > 0 ? $total_nilai / $total_buku : 0;
            ?>

            <div class="grid gap-4 animate-slide-down-1" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr));">

                <!-- Total Buku -->
                <div class="stat-card glass-card relative rounded-2xl p-6 transition-transform duration-300 cursor-default overflow-hidden border border-token">
                    <div class="w-10 h-10 rounded-[10px] flex items-center justify-center mb-4 bg-gold-dim border border-token">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                        </svg>
                    </div>
                    <div class="font-display text-ink leading-none text-[2.2rem] font-light" id="count-total"><?php echo $total_buku; ?></div>
                    <div class="text-muted text-[0.75rem] tracking-[0.06em] mt-1">Total Buku</div>
                    <span class="inline-flex items-center gap-1 mt-2 px-2 py-0.5 rounded-[10px] text-[0.72rem] bg-success-dim" style="color:var(--success);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                        Koleksi aktif
                    </span>
                </div>

                <!-- Total Nilai -->
                <div class="stat-card glass-card relative rounded-2xl p-6 transition-transform duration-300 cursor-default overflow-hidden border border-token">
                    <div class="w-10 h-10 rounded-[10px] flex items-center justify-center mb-4 bg-success-dim border border-success">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>
                    <div class="font-display text-ink leading-none font-light" style="font-size:1.4rem;">Rp<?php echo number_format($total_nilai,0,',','.'); ?></div>
                    <div class="text-muted text-[0.75rem] tracking-[0.06em] mt-1">Total Nilai Koleksi</div>
                    <span class="inline-flex items-center gap-1 mt-2 px-2 py-0.5 rounded-[10px] text-[0.72rem] bg-success-dim" style="color:var(--success);">
                        Akumulasi harga
                    </span>
                </div>

                <!-- Rata-rata Harga -->
                <div class="stat-card glass-card relative rounded-2xl p-6 transition-transform duration-300 cursor-default overflow-hidden border border-token">
                    <div class="w-10 h-10 rounded-[10px] flex items-center justify-center mb-4 bg-warn-dim border border-warn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--warn)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>
                        </svg>
                    </div>
                    <div class="font-display text-ink leading-none font-light" style="font-size:1.4rem;">Rp<?php echo number_format($rata_harga,0,',','.'); ?></div>
                    <div class="text-muted text-[0.75rem] tracking-[0.06em] mt-1">Rata-rata Harga</div>
                    <span class="inline-flex items-center gap-1 mt-2 px-2 py-0.5 rounded-[10px] text-[0.72rem] bg-warn-dim" style="color:var(--warn);">
                        Per buku
                    </span>
                </div>

                <!-- Harga Tertinggi -->
                <div class="stat-card glass-card relative rounded-2xl p-6 transition-transform duration-300 cursor-default overflow-hidden border border-token">
                    <div class="w-10 h-10 rounded-[10px] flex items-center justify-center mb-4 bg-danger-dim border border-danger">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--danger)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <div class="font-display text-ink leading-none font-light" style="font-size:1.4rem;"><?php echo $harga_tertinggi > 0 ? 'Rp'.number_format($harga_tertinggi,0,',','.') : '—'; ?></div>
                    <div class="text-muted text-[0.75rem] tracking-[0.06em] mt-1">Harga Tertinggi</div>
                    <span class="inline-flex items-center gap-1 mt-2 px-2 py-0.5 rounded-[10px] text-[0.72rem] bg-danger-dim" style="color:var(--danger);">
                        Buku termahal
                    </span>
                </div>
            </div>

            <!-- ── CHART + TOP PENULIS ── -->
            <div class="grid gap-4 reveal animate-slide-down-2" style="grid-template-columns:1fr 280px;">

                <!-- Bar chart -->
                <div class="glass-card rounded-2xl p-6 border border-token">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-[0.68rem] tracking-[0.12em] uppercase text-gold mb-0.5">Visualisasi</p>
                            <h3 class="font-display text-ink font-normal" style="font-size:1.2rem;">Harga Buku per Item</h3>
                        </div>
                        <span class="text-muted text-[0.75rem]"><?php echo $total_buku; ?> buku</span>
                    </div>

                    <div class="flex items-end gap-1 h-[100px] pb-1" id="price-chart">
                        <?php
                        if (!empty($rows_cache)) {
                            $max_h = max(array_column($rows_cache, 'Harga'));
                            foreach ($rows_cache as $i => $r) {
                                $pct = $max_h > 0 ? ($r['Harga'] / $max_h * 100) : 0;
                                $is_max = ($r['Harga'] == $max_h);
                                echo '<div class="bar '.($is_max?'highlighted':'').'" 
                                    style="height:'.round($pct).'%;min-width:4px;max-width:32px;border-radius:3px 3px 0 0;"
                                    title="'.htmlspecialchars($r['Judul']).': Rp'.number_format($r['Harga'],0,',','.').'"></div>';
                            }
                        } else {
                            echo '<p class="text-faint text-[0.8rem] self-center">Belum ada data</p>';
                        }
                        ?>
                    </div>
                    <div class="flex justify-between mt-1.5">
                        <span class="text-faint text-[0.65rem]">Buku #1</span>
                        <span class="text-gold text-[0.65rem]">▐ Tertinggi</span>
                        <span class="text-faint text-[0.65rem]">Buku #<?php echo $total_buku; ?></span>
                    </div>
                </div>

                <!-- Top Penulis -->
                <div class="glass-card rounded-2xl p-6 border border-token">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-[0.68rem] tracking-[0.12em] uppercase text-gold mb-0.5">Penulis</p>
                            <h3 class="font-display text-ink font-normal" style="font-size:1.2rem;">Terbanyak</h3>
                        </div>
                    </div>

                    <?php
                    $author_counts = [];
                    foreach ($rows_cache as $r) {
                        $a = htmlspecialchars($r['Penulis']);
                        $author_counts[$a] = ($author_counts[$a] ?? 0) + 1;
                    }
                    arsort($author_counts);
                    $top_authors = array_slice($author_counts, 0, 5, true);
                    $max_count = $top_authors ? max($top_authors) : 1;
                    $rank = 1;
                    foreach ($top_authors as $author => $count):
                        $pct = round($count / $max_count * 100);
                    ?>
                    <div class="flex items-center gap-2.5 py-2.5 border-b border-soft last:border-0">
                        <span class="font-display text-gold font-light w-6 text-center flex-shrink-0" style="font-size:1.2rem;"><?php echo $rank; ?></span>
                        <div class="flex-1 overflow-hidden">
                            <div class="text-ink font-medium text-[0.8rem] truncate"><?php echo $author; ?></div>
                            <div class="mt-1 h-1 rounded-sm border-soft" style="background:var(--border-soft);">
                                <div class="rank-bar-fill rounded-sm" style="width:<?php echo $pct; ?>%;"></div>
                            </div>
                        </div>
                        <span class="text-muted text-[0.75rem] flex-shrink-0"><?php echo $count; ?></span>
                    </div>
                    <?php $rank++; endforeach; ?>

                    <?php if (empty($top_authors)): ?>
                    <p class="text-faint text-[0.8rem] text-center py-4">Belum ada data</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ── SEARCH ── -->
            <div class="glass-card rounded-2xl p-6 border border-token reveal animate-slide-down-3">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-[0.68rem] tracking-[0.12em] uppercase text-gold mb-0.5">Temukan</p>
                        <h3 class="font-display text-ink font-normal" style="font-size:1.2rem;">Cari Buku</h3>
                    </div>
                    <a href="form_tambah.php" class="btn-primary inline-flex items-center gap-1.5 px-5 py-3 rounded-[10px] font-sans text-[0.8rem] font-medium tracking-[0.04em] no-underline transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        <span>Tambah Buku</span>
                    </a>
                </div>

                <form method="get" class="flex flex-wrap gap-3 items-end">
                    <!-- Judul -->
                    <div class="flex flex-col gap-1.5 flex-1 min-w-[180px]">
                        <label class="text-[0.7rem] font-medium tracking-[0.1em] uppercase text-muted">Judul Buku</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                            <input type="text" name="judul"
                                class="field-input w-full bg-surface border border-token rounded-[10px] py-3 pl-10 pr-4 text-ink font-sans text-[0.875rem] transition-all duration-300"
                                placeholder="Cari judul buku..."
                                value="<?php echo htmlspecialchars($search_judul ?? '') ?>">
                        </div>
                    </div>

                    <!-- Tahun -->
                    <div class="flex flex-col gap-1.5 min-w-[160px]">
                        <label class="text-[0.7rem] font-medium tracking-[0.1em] uppercase text-muted">Tahun Terbit</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <input type="number" name="tahun_terbit"
                                class="field-input w-full bg-surface border border-token rounded-[10px] py-3 pl-10 pr-4 text-ink font-sans text-[0.875rem] transition-all duration-300"
                                placeholder="Tahun..."
                                value="<?php echo htmlspecialchars($search_tahun ?? '') ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary inline-flex items-center gap-1.5 px-5 py-3 rounded-[10px] font-sans text-[0.8rem] font-medium tracking-[0.04em] flex-shrink-0 border-0 cursor-pointer transition-all duration-200 hover:-translate-y-0.5">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <span>Cari</span>
                    </button>

                    <a href="index.php" class="btn-ghost inline-flex items-center gap-1.5 px-5 py-3 rounded-[10px] font-sans text-[0.8rem] font-medium tracking-[0.04em] flex-shrink-0 no-underline transition-all duration-200 hover:-translate-y-0.5">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.93"/>
                        </svg>
                        Reset
                    </a>
                </form>
            </div>

            <!-- ── TABLE ── -->
            <div class="reveal animate-slide-down-4">
                <div class="overflow-x-auto rounded-2xl border border-token">
                    <table class="w-full border-collapse text-[0.875rem]">
                        <thead class="border-b border-token bg-gold-dim">
                            <tr>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-left whitespace-nowrap">ID</th>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-left whitespace-nowrap">Judul</th>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-left whitespace-nowrap">Penulis</th>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-left whitespace-nowrap">Tahun</th>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-left whitespace-nowrap">Harga</th>
                                <th class="px-4 py-3.5 text-[0.67rem] font-semibold tracking-[0.12em] uppercase text-gold text-right whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rows_cache)): ?>
                                <?php foreach ($rows_cache as $row): ?>
                                <tr class="transition-colors duration-200">
                                    <td class="px-4 py-4 text-faint text-[0.75rem] font-medium border-b border-soft">#<?php echo str_pad($row['ID'],3,'0',STR_PAD_LEFT); ?></td>
                                    <td class="px-4 py-4 border-b border-soft">
                                        <div class="flex items-center gap-1.5">
                                            <div class="w-1 rounded-sm flex-shrink-0" style="height:1.1rem;background:var(--gold);"></div>
                                            <span class="font-medium text-ink"><?php echo htmlspecialchars($row['Judul']); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-muted text-[0.82rem] border-b border-soft"><?php echo htmlspecialchars($row['Penulis']); ?></td>
                                    <td class="px-4 py-4 border-b border-soft">
                                        <span class="inline-flex items-center px-2 py-0.5 bg-surface border border-token rounded-md text-[0.75rem] text-muted">
                                            <?php echo $row['Tahun_Terbit']; ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 font-display text-gold border-b border-soft" style="font-size:1rem;">
                                        Rp<?php echo number_format($row['Harga'],0,',','.'); ?>
                                    </td>
                                    <td class="px-4 py-4 text-right border-b border-soft">
                                        <div class="flex gap-2 justify-end">
                                            <a href="form_edit.php?id=<?php echo $row['ID'] ?>"
                                               class="btn-edit inline-flex items-center gap-1 px-3 py-1.5 rounded-[7px] text-[0.75rem] font-medium no-underline transition-all duration-200 hover:-translate-y-0.5">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="proses_hapus.php?id=<?php echo $row['ID'] ?>"
                                               class="btn-delete inline-flex items-center gap-1 px-3 py-1.5 rounded-[7px] text-[0.75rem] font-medium no-underline transition-all duration-200 hover:-translate-y-0.5"
                                               onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
                                                </svg>
                                                Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="text-center py-16 px-8 text-muted">
                                            <svg class="mx-auto mb-4 opacity-30" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                            </svg>
                                            <p class="font-display font-light text-ink" style="font-size:1.2rem;">Tidak ada buku ditemukan</p>
                                            <p class="text-[0.8rem] mt-1 text-muted">Coba ubah filter pencarian atau tambahkan buku baru.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Table footer -->
                    <div class="flex items-center justify-between px-4 py-3 border-t border-soft bg-gold-dim rounded-b-2xl text-[0.78rem] text-muted">
                        <span>Menampilkan <?php echo count($rows_cache); ?> buku</span>
                        <span class="text-gold">Toko Buku Online — 2026</span>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script>
    // ─── PARTICLE CANVAS ───────────────────────────────
    const canvas = document.getElementById('bg-canvas');
    const ctx    = canvas.getContext('2d');
    let W, H, particles = [];

    function resize() { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
    resize();
    window.addEventListener('resize', resize);

    class Particle {
        constructor() { this.reset(true); }
        reset(init) {
            this.x = Math.random() * W;
            this.y = init ? Math.random() * H : H + 10;
            this.size    = Math.random() * 1.2 + 0.2;
            this.speedY  = -(Math.random() * 0.3 + 0.08);
            this.speedX  = (Math.random() - 0.5) * 0.15;
            this.opacity = Math.random() * 0.4 + 0.05;
            this.gold    = Math.random() > 0.65;
        }
        update() { this.x += this.speedX; this.y += this.speedY; if (this.y < -10) this.reset(false); }
        draw() {
            ctx.beginPath(); ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.gold ? `rgba(201,168,76,${this.opacity})` : `rgba(245,240,232,${this.opacity * 0.35})`;
            ctx.fill();
        }
    }
    for (let i = 0; i < 100; i++) particles.push(new Particle());
    (function animate() {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => { p.update(); p.draw(); });
        requestAnimationFrame(animate);
    })();

    // ─── DARK / LIGHT TOGGLE ──────────────────────────
    const html        = document.documentElement;
    const themeSwitch = document.getElementById('theme-switch');
    const themeIcon   = document.getElementById('theme-icon');
    const moonSVG = `<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>`;
    const sunSVG  = `<circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>`;

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('buku-theme', theme);
        if (theme === 'light') {
            themeSwitch.checked = true;
            themeIcon.innerHTML = sunSVG;
            themeIcon.setAttribute('fill', 'none');
            themeIcon.setAttribute('stroke', '#0d0b0f');
            themeIcon.setAttribute('stroke-width', '2');
        } else {
            themeSwitch.checked = false;
            themeIcon.innerHTML = moonSVG;
            themeIcon.setAttribute('fill', 'currentColor');
            themeIcon.setAttribute('stroke', 'none');
        }
    }
    applyTheme(localStorage.getItem('buku-theme') || 'dark');
    themeSwitch.addEventListener('change', () => applyTheme(themeSwitch.checked ? 'light' : 'dark'));

    // ─── SCROLL REVEAL ────────────────────────────────
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((e, i) => {
            if (e.isIntersecting) {
                setTimeout(() => e.target.classList.add('visible'), i * 80);
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.08 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // ─── STAT COUNTER ANIMATION ───────────────────────
    const countEl = document.getElementById('count-total');
    if (countEl) {
        const finalVal = parseInt(countEl.textContent) || 0;
        let start = 0;
        const dur = 1200, startTime = performance.now();
        (function step(now) {
            const t = Math.min((now - startTime) / dur, 1);
            const ease = 1 - Math.pow(1 - t, 3);
            countEl.textContent = Math.round(ease * finalVal).toLocaleString('id-ID');
            if (t < 1) requestAnimationFrame(step);
        })(performance.now());
    }

    // ─── BAR CHART TOOLTIP ────────────────────────────
    document.querySelectorAll('#price-chart .bar').forEach(bar => {
        bar.addEventListener('mouseenter', () => {
            const tip = document.createElement('div');
            tip.className = '_bar-tip';
            tip.style.cssText = `position:fixed;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:6px 10px;font-size:0.72rem;color:var(--ink);pointer-events:none;z-index:100;white-space:nowrap;box-shadow:0 8px 24px rgba(0,0,0,0.3);`;
            tip.textContent = bar.getAttribute('title');
            document.body.appendChild(tip);
            const rect = bar.getBoundingClientRect();
            tip.style.left = (rect.left + rect.width / 2 - tip.offsetWidth / 2) + 'px';
            tip.style.top  = (rect.top - tip.offsetHeight - 8) + 'px';
        });
        bar.addEventListener('mouseleave', () => document.querySelectorAll('._bar-tip').forEach(t => t.remove()));
    });

    // ─── INPUT MICRO-INTERACTION ──────────────────────
    document.querySelectorAll('.field-input').forEach(input => {
        input.addEventListener('focus', function() {
            this.closest('.flex-col').style.transform = 'scale(1.01)';
            this.closest('.flex-col').style.transition = 'transform 0.3s';
        });
        input.addEventListener('blur', function() {
            this.closest('.flex-col').style.transform = 'scale(1)';
        });
    });
    </script>
</body>
</html>
