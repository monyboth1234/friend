<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop | Farm Fresh</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        /* =========================================================
           LIGHT THEME — DEFAULT
        ========================================================= */
        :root {
            --forest: #123524;
            --forest-2: #194b31;
            --green: #287346;
            --green-light: #eaf5ed;
            --green-soft: #f4f9f5;

            --orange: #e8792f;
            --orange-dark: #c95d1b;
            --orange-soft: #fff1e7;

            --cream: #faf9f5;
            --white: #ffffff;

            --ink: #17251d;
            --muted: #77847c;
            --border: #e7ece8;

            --shadow-xs: 0 4px 15px rgba(18,53,36,.05);
            --shadow-sm: 0 10px 30px rgba(18,53,36,.07);
            --shadow-md: 0 20px 50px rgba(18,53,36,.10);
            --shadow-lg: 0 30px 80px rgba(18,53,36,.15);

            --radius-sm: 14px;
            --radius-md: 20px;
            --radius-lg: 28px;
            --radius-xl: 36px;

            --card-bg: #ffffff;
            --card-bg-soft: #ffffff;
            --header-bg: rgba(255,255,255,.93);
            --input-bg: #f8faf8;
            --hero-bg: linear-gradient(135deg, #f1f7f1 0%, #fffdf9 58%, #f8efe7 100%);

            --glow-primary: none;
            --glow-secondary: none;
        }


        /* =========================================================
           DARK THEME — ULTIMATE PREMIUM OVERRIDE
           Layered surfaces + chromatic shadows + soft glows
        ========================================================= */
        [data-theme="dark"] {

            /* Text hierarchy — from brightest to softest */
            --forest: #f0faf3;       /* headline text (brightest) */
            --forest-2: #c9ecd4;     /* sub-headline */
            --green: #7dd49a;        /* accent green (readable) */
            --green-light: rgba(125,212,154,.14);
            --green-soft: rgba(125,212,154,.06);

            --orange: #ffa66b;
            --orange-dark: #f59852;
            --orange-soft: rgba(255,166,107,.14);

            /* Depth: 5-layered surface system */
            --cream: #060d09;        /* L0 — page */
            --white: #0d1a12;        /* L1 — base surface */
            --surface-2: #122b1c;    /* L2 — elevated card */
            --surface-3: #16341f;    /* L3 — floating */
            --surface-glass: rgba(13, 26, 18, .72);

            --ink: #eaf5ee;
            --muted: #8ba394;
            --muted-soft: #5b7466;
            --border: rgba(125,212,154,.10);
            --border-bright: rgba(125,212,154,.22);

            /* Chromatic shadows — green-tinted, not pure black */
            --shadow-xs: 0 4px 16px rgba(0,0,0,.5);
            --shadow-sm: 0 10px 30px rgba(0,0,0,.55);
            --shadow-md: 0 20px 50px rgba(0,0,0,.6);
            --shadow-lg: 0 30px 80px rgba(0,0,0,.7);
            --shadow-glow-green: 0 0 40px rgba(125,212,154,.15);
            --shadow-glow-orange: 0 0 40px rgba(255,166,107,.2);

            --card-bg: #122b1c;
            --card-bg-soft: rgba(18, 43, 28, .55);
            --header-bg: rgba(6, 13, 9, .75);
            --input-bg: rgba(6, 13, 9, .7);
            --hero-bg:
                radial-gradient(ellipse 60% 50% at 80% 15%, rgba(255,166,107,.10), transparent 55%),
                radial-gradient(ellipse 70% 60% at 10% 80%, rgba(125,212,154,.12), transparent 55%),
                radial-gradient(ellipse 100% 60% at 50% -10%, rgba(125,212,154,.08), transparent 70%),
                #060d09;

            --glow-primary: 0 0 60px rgba(125,212,154,.10);
            --glow-secondary: 0 0 60px rgba(255,166,107,.10);
        }


        /* =========================================================
           BASE
        ========================================================= */
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--ink);
            font-family: "DM Sans", sans-serif;
            overflow-x: hidden;
            position: relative;
            transition: background-color .5s ease, color .5s ease;
        }

        /* Dark mode: layered ambient glows + star field */
        [data-theme="dark"] body {
            background:
                radial-gradient(ellipse 90% 55% at 50% -15%, rgba(125,212,154,.14), transparent 65%),
                radial-gradient(ellipse 70% 55% at 100% 100%, rgba(255,166,107,.10), transparent 60%),
                radial-gradient(ellipse 60% 50% at 0% 50%, rgba(125,212,154,.06), transparent 60%),
                var(--cream);
            background-attachment: fixed;
        }

        /* Animated star field — layered, subtle drift */
        [data-theme="dark"] body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: .35;
            background-image:
                radial-gradient(circle, rgba(200,240,215,.9) 1px, transparent 1.5px),
                radial-gradient(circle, rgba(255,200,150,.7) 1px, transparent 1.5px),
                radial-gradient(circle, rgba(200,240,215,.5) 1px, transparent 1.5px);
            background-size: 120px 120px, 180px 180px, 240px 240px;
            background-position: 0 0, 40px 60px, 130px 80px;
            animation: starDrift 180s linear infinite;
            mask-image: radial-gradient(ellipse at 50% 0%, black 20%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at 50% 0%, black 20%, transparent 80%);
        }

        @keyframes starDrift {
            from { background-position: 0 0, 40px 60px, 130px 80px; }
            to   { background-position: 120px 120px, -140px 240px, 370px 320px; }
        }

        /* Grain texture overlay — film-grade finish */
        [data-theme="dark"] body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            opacity: .025;
            background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>");
            mix-blend-mode: overlay;
        }

        a { text-decoration: none; }
        img { max-width: 100%; }

        ::selection {
            background: var(--orange);
            color: white;
        }

        /* Smooth theme transitions everywhere */
        *,
        *::before,
        *::after {
            transition:
                background-color .4s ease,
                border-color .4s ease,
                color .4s ease,
                box-shadow .4s ease;
        }

        /* Global content layer — sits above star field */
        .main-header,
        main,
        section,
        footer,
        .container,
        nav,
        .farm-toast,
        .trust-wrapper {
            position: relative;
            z-index: 2;
        }


        /* =========================================================
           SCROLLBAR
        ========================================================= */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--green-soft); }
        ::-webkit-scrollbar-thumb {
            background: #a9b8ad;
            border-radius: 20px;
            border: 2px solid var(--green-soft);
        }
        ::-webkit-scrollbar-thumb:hover { background: var(--green); }

        [data-theme="dark"] ::-webkit-scrollbar-track { background: #060d09; }
        [data-theme="dark"] ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #2a5538, #1b3a26);
            border-color: #060d09;
        }
        [data-theme="dark"] ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #7dd49a, #3f8155);
            box-shadow: 0 0 15px rgba(125,212,154,.6);
        }


        /* =========================================================
           TOP BAR
        ========================================================= */
        .top-bar {
            background: var(--forest);
            color: rgba(255,255,255,.78);
            padding: 9px 0;
            font-size: 11px;
            letter-spacing: .1px;
        }

        [data-theme="dark"] .top-bar {
            background: linear-gradient(90deg, #030906, #060d09, #030906);
            border-bottom: 1px solid rgba(125,212,154,.08);
            color: rgba(220,240,226,.72);
        }

        .top-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .top-item {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .top-item i { color: #f1a06a; }

        [data-theme="dark"] .top-item i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.6));
        }

        .top-right a {
            color: rgba(255,255,255,.68);
            transition: .2s ease;
        }

        .top-right a:hover { color: white; }

        [data-theme="dark"] .top-right a:hover {
            color: #7dd49a;
            text-shadow: 0 0 12px rgba(125,212,154,.6);
        }


        /* =========================================================
           NAVBAR
        ========================================================= */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: var(--header-bg);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--border);
        }

        [data-theme="dark"] .main-header {
            box-shadow:
                inset 0 -1px 0 rgba(125,212,154,.06),
                0 8px 40px rgba(0,0,0,.4);
        }

        .navbar { min-height: 78px; }

        .navbar-brand { color: var(--forest); }

        [data-theme="dark"] .navbar-brand { color: #f0faf3; }

        .navbar-brand img {
            width: 49px;
            height: 49px;
            object-fit: contain;
            transition: filter .4s ease, transform .4s ease;
        }

        [data-theme="dark"] .navbar-brand img {
            filter: brightness(.9) saturate(1.15)
                    drop-shadow(0 0 12px rgba(255,166,107,.35));
        }

        .brand-title {
            font-family: "Playfair Display", serif;
            font-size: 21px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        [data-theme="dark"] .brand-title {
            color: #f0faf3;
            text-shadow: 0 0 20px rgba(125,212,154,.2);
        }

        .brand-subtitle {
            margin-top: 5px;
            color: #7c887f;
            font-size: 7px;
            font-weight: 800;
            letter-spacing: 2.5px;
        }

        [data-theme="dark"] .brand-subtitle { color: #5b7466; }

        .navbar-nav { align-items: center; }

        .navbar-nav .nav-link {
            position: relative;
            padding: 10px 13px !important;
            color: #59665e;
            font-size: 12px;
            font-weight: 700;
            transition: .25s ease;
        }

        [data-theme="dark"] .navbar-nav .nav-link {
            color: #b3c9b9;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 13px;
            right: 13px;
            bottom: 3px;
            height: 2px;
            border-radius: 10px;
            background: var(--orange);
            transform: scaleX(0);
            transition: .3s cubic-bezier(.2,.7,.2,1);
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--forest);
        }

        [data-theme="dark"] .navbar-nav .nav-link:hover,
        [data-theme="dark"] .navbar-nav .nav-link.active {
            color: #ffa66b;
            text-shadow: 0 0 20px rgba(255,166,107,.5);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            transform: scaleX(1);
        }

        [data-theme="dark"] .navbar-nav .nav-link.active::after {
            box-shadow: 0 0 12px rgba(255,166,107,.9);
        }

        .register-link {
            border: 1px solid #d7e1d9;
            padding: 8px 15px !important;
            border-radius: 50px !important;
            color: var(--forest) !important;
        }

        .register-link::after { display: none !important; }

        .register-link:hover {
            background: var(--forest);
            border-color: var(--forest);
            color: white !important;
        }

        [data-theme="dark"] .register-link {
            border-color: rgba(125,212,154,.3);
            color: #c9ecd4 !important;
            background: rgba(125,212,154,.06);
        }

        [data-theme="dark"] .register-link:hover {
            background: rgba(125,212,154,.16);
            border-color: rgba(125,212,154,.5);
            color: white !important;
            box-shadow: 0 0 30px rgba(125,212,154,.4);
        }

        .login-link {
            padding: 9px 17px !important;
            border-radius: 50px !important;
            background: var(--forest);
            color: white !important;
            box-shadow: 0 7px 18px rgba(18,53,36,.18);
        }

        .login-link::after { display: none !important; }

        .login-link:hover {
            background: #0c2417;
            color: white !important;
            transform: translateY(-1px);
        }

        [data-theme="dark"] .login-link {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow:
                0 8px 25px rgba(63,129,85,.4),
                0 0 30px rgba(63,129,85,.2),
                inset 0 1px 0 rgba(255,255,255,.15);
        }

        [data-theme="dark"] .login-link:hover {
            background: linear-gradient(135deg, #e47732, #ffa66b);
            box-shadow:
                0 12px 35px rgba(255,166,107,.5),
                0 0 50px rgba(255,166,107,.35),
                inset 0 1px 0 rgba(255,255,255,.2);
        }


        /* =========================================================
           THEME TOGGLE BUTTON — ULTIMATE
        ========================================================= */
        .theme-toggle-btn {
            width: 42px;
            height: 42px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 50% !important;
            background: var(--card-bg-soft);
            color: var(--forest) !important;
            font-size: 16px !important;
            padding: 0 !important;
            margin-left: 6px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .theme-toggle-btn::after { display: none !important; }

        .theme-toggle-btn::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,166,107,.3), transparent 70%);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .theme-toggle-btn:hover {
            background: var(--orange-soft) !important;
            color: var(--orange) !important;
            border-color: var(--orange);
            transform: rotate(15deg) scale(1.08);
        }

        [data-theme="dark"] .theme-toggle-btn {
            background: rgba(255,166,107,.1);
            border-color: rgba(255,166,107,.35);
            color: #ffa66b !important;
            box-shadow:
                0 0 20px rgba(255,166,107,.25),
                inset 0 0 15px rgba(255,166,107,.08);
        }

        [data-theme="dark"] .theme-toggle-btn::before { opacity: 1; }

        [data-theme="dark"] .theme-toggle-btn:hover {
            background: rgba(255,166,107,.2);
            box-shadow:
                0 0 30px rgba(255,166,107,.5),
                inset 0 0 20px rgba(255,166,107,.15);
            transform: rotate(-15deg) scale(1.1);
        }


        /* =========================================================
           CART ICON
        ========================================================= */
        .cart-wrapper { margin-left: 5px; }

        .cart-icon {
            position: relative;
            width: 42px;
            height: 42px;
            padding: 0 !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--green-soft);
            color: var(--forest) !important;
            font-size: 18px !important;
            transition: .25s ease;
        }

        .cart-icon::after { display: none !important; }

        .cart-icon:hover {
            background: var(--orange-soft);
            color: var(--orange) !important;
            transform: translateY(-2px);
        }

        [data-theme="dark"] .cart-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a !important;
            box-shadow:
                inset 0 0 0 1px rgba(125,212,154,.15),
                0 0 15px rgba(125,212,154,.1);
        }

        [data-theme="dark"] .cart-icon:hover {
            background: rgba(255,166,107,.15);
            color: #ffa66b !important;
            box-shadow:
                inset 0 0 0 1px rgba(255,166,107,.35),
                0 0 25px rgba(255,166,107,.4);
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -2px;
            min-width: 19px;
            height: 19px;
            padding: 0 5px;
            display: none;
            align-items: center;
            justify-content: center;
            background: var(--orange);
            color: white;
            border: 2px solid var(--white);
            border-radius: 50px;
            font-size: 9px;
            font-weight: 900;
        }

        [data-theme="dark"] .cart-badge {
            border-color: #060d09;
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 0 15px rgba(255,166,107,.8),
                0 0 30px rgba(255,166,107,.4);
            animation: badgePulse 2s ease-in-out infinite;
        }

        @keyframes badgePulse {
            0%, 100% { box-shadow: 0 0 15px rgba(255,166,107,.8), 0 0 30px rgba(255,166,107,.4); }
            50%      { box-shadow: 0 0 20px rgba(255,166,107,1), 0 0 40px rgba(255,166,107,.6); }
        }


        /* =========================================================
           SEARCH
        ========================================================= */
        .search-box { position: relative; }

        .search-box input {
            width: 205px;
            height: 42px;
            padding: 0 43px 0 16px;
            border: 1px solid var(--border);
            border-radius: 50px;
            outline: none;
            background: var(--input-bg);
            color: var(--ink);
            font-size: 11px;
            transition: .3s ease;
        }

        .search-box input::placeholder { color: #9aa49d; }

        [data-theme="dark"] .search-box input {
            background: rgba(6,13,9,.7);
            border-color: rgba(125,212,154,.12);
            color: #eaf5ee;
        }

        [data-theme="dark"] .search-box input::placeholder { color: #5b7466; }

        .search-box input:focus {
            width: 225px;
            background: var(--card-bg);
            border-color: #b8cbbb;
            box-shadow: 0 0 0 4px rgba(40,115,70,.07);
        }

        [data-theme="dark"] .search-box input:focus {
            background: rgba(6,13,9,.95);
            border-color: #7dd49a;
            box-shadow:
                0 0 0 4px rgba(125,212,154,.14),
                0 0 30px rgba(125,212,154,.3);
        }

        .search-box button {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 50%;
            background: var(--forest);
            color: white;
            transition: .25s ease;
        }

        .search-box button:hover { background: var(--orange); }

        [data-theme="dark"] .search-box button {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
        }

        [data-theme="dark"] .search-box button:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 0 20px rgba(255,166,107,.7);
        }


        /* =========================================================
           HERO
        ========================================================= */
        .shop-hero {
            position: relative;
            min-height: 680px;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 80px 0 100px;
            background: var(--hero-bg);
        }

        .hero-decoration {
            position: absolute;
            border: 1px solid rgba(40,115,70,.09);
            border-radius: 50%;
            pointer-events: none;
        }

        [data-theme="dark"] .hero-decoration {
            border-color: rgba(125,212,154,.1);
            box-shadow: inset 0 0 100px rgba(125,212,154,.08);
        }

        .hero-decoration.one {
            width: 500px;
            height: 500px;
            right: -230px;
            top: -250px;
        }

        .hero-decoration.two {
            width: 300px;
            height: 300px;
            right: 80px;
            bottom: -220px;
            border-color: rgba(232,121,47,.09);
        }

        [data-theme="dark"] .hero-decoration.two {
            border-color: rgba(255,166,107,.15);
            box-shadow: inset 0 0 80px rgba(255,166,107,.1);
        }

        .hero-content { position: relative; z-index: 2; }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            background: rgba(255,255,255,.8);
            border: 1px solid rgba(40,115,70,.10);
            border-radius: 50px;
            box-shadow: var(--shadow-xs);
            color: var(--forest-2);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        [data-theme="dark"] .hero-label {
            background: rgba(18,43,28,.7);
            border-color: rgba(125,212,154,.2);
            color: #c9ecd4;
            box-shadow:
                0 10px 30px rgba(0,0,0,.5),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .hero-label i {
            color: var(--orange);
            font-size: 13px;
        }

        [data-theme="dark"] .hero-label i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.7));
        }

        .hero-title {
            max-width: 760px;
            margin: 21px 0 20px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: clamp(48px, 6vw, 78px);
            line-height: .97;
            font-weight: 800;
            letter-spacing: -3px;
        }

        [data-theme="dark"] .hero-title {
            color: #f0faf3;
            text-shadow:
                0 0 40px rgba(125,212,154,.15),
                0 2px 60px rgba(0,0,0,.6);
        }

        .hero-title span { color: var(--orange); }

        [data-theme="dark"] .hero-title span {
            color: #ffa66b;
            text-shadow:
                0 0 30px rgba(255,166,107,.5),
                0 0 60px rgba(255,166,107,.25);
            font-style: italic;
        }

        .hero-description {
            max-width: 570px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
        }

        [data-theme="dark"] .hero-description {
            color: #8ba394;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 11px;
            margin-top: 31px;
        }

        .btn-farm {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 21px;
            border-radius: 50px;
            border: 1px solid var(--forest);
            background: var(--forest);
            color: white;
            font-size: 11px;
            font-weight: 900;
            box-shadow: 0 13px 30px rgba(18,53,36,.18);
            transition: .3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-farm:hover {
            background: #0b2517;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(18,53,36,.23);
        }

        [data-theme="dark"] .btn-farm {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            border-color: rgba(125,212,154,.25);
            color: white;
            box-shadow:
                0 8px 25px rgba(63,129,85,.5),
                0 0 30px rgba(63,129,85,.25),
                inset 0 1px 0 rgba(255,255,255,.15);
        }

        [data-theme="dark"] .btn-farm::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.15), transparent);
            transition: left .6s ease;
        }

        [data-theme="dark"] .btn-farm:hover::before { left: 100%; }

        [data-theme="dark"] .btn-farm:hover {
            background: linear-gradient(135deg, #3f8155, #4ea76b);
            box-shadow:
                0 12px 35px rgba(63,129,85,.6),
                0 0 50px rgba(125,212,154,.4),
                inset 0 1px 0 rgba(255,255,255,.2);
            transform: translateY(-3px);
        }

        .btn-farm-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 21px;
            border-radius: 50px;
            border: 1px solid #d9e2db;
            background: white;
            color: var(--forest);
            font-size: 11px;
            font-weight: 900;
            transition: .3s ease;
        }

        .btn-farm-outline:hover {
            color: var(--orange);
            border-color: var(--orange);
            transform: translateY(-3px);
        }

        [data-theme="dark"] .btn-farm-outline {
            background: rgba(18,43,28,.4);
            border-color: rgba(125,212,154,.3);
            color: #c9ecd4;
        }

        [data-theme="dark"] .btn-farm-outline:hover {
            color: white;
            border-color: rgba(125,212,154,.6);
            background: rgba(125,212,154,.15);
            box-shadow:
                0 0 30px rgba(125,212,154,.3),
                inset 0 0 20px rgba(125,212,154,.05);
            transform: translateY(-3px);
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 34px;
            margin-top: 39px;
        }

        .hero-stat { position: relative; }

        .hero-stat:not(:last-child)::after {
            content: "";
            position: absolute;
            right: -18px;
            top: 5px;
            width: 1px;
            height: 35px;
            background: #dce5de;
        }

        [data-theme="dark"] .hero-stat:not(:last-child)::after {
            background: linear-gradient(180deg, transparent, rgba(125,212,154,.25), transparent);
        }

        .hero-stat strong {
            display: block;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 24px;
            line-height: 1;
        }

        [data-theme="dark"] .hero-stat strong {
            color: #f0faf3;
            text-shadow: 0 0 20px rgba(125,212,154,.3);
        }

        .hero-stat span {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }


        /* =========================================================
           HERO IMAGE
        ========================================================= */
        .hero-visual {
            position: relative;
            z-index: 2;
            padding: 15px;
        }

        .hero-image-card {
            position: relative;
            height: 515px;
            overflow: hidden;
            border-radius: 38px;
            box-shadow: var(--shadow-lg);
            transform: rotate(1.3deg);
            transition: transform .6s ease, box-shadow .6s ease;
        }

        .hero-image-card:hover {
            transform: rotate(0deg) translateY(-6px);
        }

        [data-theme="dark"] .hero-image-card {
            box-shadow:
                0 35px 90px rgba(0,0,0,.75),
                0 0 60px rgba(125,212,154,.2),
                0 0 100px rgba(255,166,107,.1);
        }

        .hero-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s ease;
        }

        [data-theme="dark"] .hero-image-card img {
            filter: brightness(.85) contrast(1.1) saturate(1.15);
        }

        .hero-image-card:hover img { transform: scale(1.06); }

        .hero-image-card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(
                180deg,
                transparent 45%,
                rgba(18,53,36,.62) 100%
            );
        }

        .hero-image-card::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            border-radius: 38px;
            padding: 1px;
            background: linear-gradient(135deg,
                rgba(125,212,154,.4),
                transparent 40%,
                transparent 60%,
                rgba(255,166,107,.4));
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
                    mask-composite: exclude;
            opacity: 0;
            transition: opacity .4s ease;
            pointer-events: none;
        }

        [data-theme="dark"] .hero-image-card::after { opacity: 1; }

        .hero-image-caption {
            position: absolute;
            z-index: 3;
            left: 25px;
            right: 25px;
            bottom: 23px;
            display: flex;
            align-items: end;
            justify-content: space-between;
            color: white;
        }

        .hero-image-caption small {
            display: block;
            margin-bottom: 5px;
            color: rgba(255,255,255,.68);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .hero-image-caption strong {
            font-family: "Playfair Display", serif;
            font-size: 23px;
        }

        .hero-image-arrow {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 50%;
            background: rgba(255,255,255,.13);
            backdrop-filter: blur(8px);
            font-size: 17px;
            transition: .3s ease;
        }

        .hero-image-card:hover .hero-image-arrow {
            background: var(--orange);
            border-color: var(--orange);
            transform: rotate(45deg) scale(1.1);
        }

        [data-theme="dark"] .hero-image-card:hover .hero-image-arrow {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 0 30px rgba(255,166,107,.7);
        }

        .quality-badge {
            position: absolute;
            z-index: 5;
            top: 22px;
            right: -8px;
            width: 98px;
            height: 98px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 7px solid rgba(255,255,255,.8);
            border-radius: 50%;
            background: var(--orange);
            color: white;
            text-align: center;
            box-shadow: var(--shadow-md);
        }

        [data-theme="dark"] .quality-badge {
            border-color: rgba(6,13,9,.85);
            background: linear-gradient(135deg, #e47732, #ffa66b);
            box-shadow:
                0 20px 50px rgba(0,0,0,.6),
                0 0 50px rgba(255,166,107,.5),
                inset 0 0 20px rgba(255,255,255,.15);
        }

        .quality-badge strong {
            font-size: 20px;
            line-height: 1;
            text-shadow: 0 1px 3px rgba(0,0,0,.2);
        }

        .quality-badge span {
            margin-top: 5px;
            font-size: 7px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .hero-floating {
            position: absolute;
            z-index: 6;
            left: -10px;
            bottom: 38px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 17px 13px 13px;
            background: white;
            border: 1px solid rgba(18,53,36,.07);
            border-radius: 17px;
            box-shadow: var(--shadow-md);
            transition: transform .3s ease;
        }

        .hero-floating:hover {
            transform: translateY(-4px);
        }

        [data-theme="dark"] .hero-floating {
            background: rgba(18,43,28,.85);
            border-color: rgba(125,212,154,.15);
            backdrop-filter: blur(20px);
            box-shadow:
                0 20px 60px rgba(0,0,0,.7),
                0 0 40px rgba(125,212,154,.15),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .floating-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
            font-size: 18px;
        }

        [data-theme="dark"] .floating-icon {
            background: rgba(125,212,154,.15);
            color: #7dd49a;
            box-shadow:
                0 0 25px rgba(125,212,154,.3),
                inset 0 0 15px rgba(125,212,154,.1);
        }

        .hero-floating strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

        [data-theme="dark"] .hero-floating strong { color: #f0faf3; }

        .hero-floating span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 9px;
        }


        /* =========================================================
           TRUST
        ========================================================= */
        .trust-wrapper {
            position: relative;
            z-index: 20;
            margin-top: -43px;
        }

        .trust-card {
            padding: 21px;
            border: 1px solid rgba(18,53,36,.06);
            border-radius: 22px;
            background: rgba(255,255,255,.97);
            box-shadow: var(--shadow-md);
        }

        [data-theme="dark"] .trust-card {
            background: rgba(13,26,18,.75);
            border-color: rgba(125,212,154,.15);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            box-shadow:
                0 25px 70px rgba(0,0,0,.7),
                0 0 60px rgba(125,212,154,.1),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 11px;
            height: 100%;
        }

        .trust-icon {
            flex: 0 0 auto;
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: var(--green-soft);
            color: var(--green);
            font-size: 18px;
        }

        [data-theme="dark"] .trust-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow:
                0 0 20px rgba(125,212,154,.2),
                inset 0 0 15px rgba(125,212,154,.08);
        }

        .trust-item strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

        [data-theme="dark"] .trust-item strong { color: #f0faf3; }

        .trust-item span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 9px;
        }


        /* =========================================================
           SHOP SECTION
        ========================================================= */
        .shop-section { padding: 100px 0 90px; }
        .shop-section.search-active { padding-top: 50px; }

        .section-eyebrow {
            margin-bottom: 9px;
            color: var(--orange);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2.2px;
            text-transform: uppercase;
        }

        [data-theme="dark"] .section-eyebrow {
            color: #ffa66b;
            text-shadow: 0 0 20px rgba(255,166,107,.4);
        }

        .section-title {
            margin-bottom: 12px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: clamp(34px, 4vw, 49px);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        [data-theme="dark"] .section-title {
            color: #f0faf3;
            text-shadow: 0 0 40px rgba(125,212,154,.1);
        }

        .section-subtitle {
            max-width: 620px;
            margin: auto;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.85;
        }


        /* =========================================================
           CATEGORY QUICK NAV
        ========================================================= */
        .category-nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 9px;
            margin: 35px 0 40px;
        }

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 50px;
            background: var(--card-bg);
            color: #627067;
            font-size: 10px;
            font-weight: 800;
            transition: .3s ease;
        }

        [data-theme="dark"] .category-pill {
            color: #b3c9b9;
            background: rgba(18,43,28,.5);
            border-color: rgba(125,212,154,.12);
        }

        .category-pill i { color: var(--green); }

        [data-theme="dark"] .category-pill i {
            color: #7dd49a;
            filter: drop-shadow(0 0 6px rgba(125,212,154,.5));
        }

        .category-pill:hover {
            border-color: var(--green);
            background: var(--forest);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        [data-theme="dark"] .category-pill:hover {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            border-color: rgba(125,212,154,.4);
            color: white;
            box-shadow:
                0 10px 30px rgba(63,129,85,.5),
                0 0 30px rgba(125,212,154,.3);
        }

        .category-pill:hover i { color: #9bd1a8; }
        [data-theme="dark"] .category-pill:hover i { color: white; }


        /* =========================================================
           TOOLBAR
        ========================================================= */
        .shop-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            padding: 15px 17px;
            margin-bottom: 58px;
            border: 1px solid var(--border);
            border-radius: 19px;
            background: var(--card-bg);
            box-shadow: var(--shadow-xs);
        }

        [data-theme="dark"] .shop-toolbar {
            background: rgba(13,26,18,.6);
            border-color: rgba(125,212,154,.12);
            backdrop-filter: blur(15px);
        }

        .result-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .result-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
        }

        [data-theme="dark"] .result-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow:
                0 0 20px rgba(125,212,154,.2),
                inset 0 0 15px rgba(125,212,154,.08);
        }

        .result-info strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

        [data-theme="dark"] .result-info strong { color: #f0faf3; }

        .result-info span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 9px;
        }

        .clear-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 13px;
            border: 1px solid #dce5de;
            border-radius: 50px;
            color: var(--forest);
            font-size: 10px;
            font-weight: 800;
            transition: .25s ease;
        }

        .clear-btn:hover {
            border-color: var(--forest);
            background: var(--forest);
            color: white;
        }

        [data-theme="dark"] .clear-btn {
            border-color: rgba(125,212,154,.3);
            color: #c9ecd4;
            background: rgba(125,212,154,.06);
        }

        [data-theme="dark"] .clear-btn:hover {
            background: rgba(125,212,154,.2);
            border-color: rgba(125,212,154,.6);
            color: white;
            box-shadow: 0 0 25px rgba(125,212,154,.4);
        }


        /* =========================================================
           CATEGORY BLOCK
        ========================================================= */
        .category-block { margin-bottom: 78px; }

        .category-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .category-title-wrap {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .category-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--green-light);
            color: var(--green);
            font-size: 21px;
        }

        [data-theme="dark"] .category-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow:
                0 0 30px rgba(125,212,154,.2),
                inset 0 0 20px rgba(125,212,154,.08);
        }

        .category-title {
            margin: 0;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 28px;
            line-height: 1;
            font-weight: 800;
        }

        [data-theme="dark"] .category-title {
            color: #f0faf3;
            text-shadow: 0 0 30px rgba(125,212,154,.12);
        }

        .category-caption {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .category-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        [data-theme="dark"] .category-line {
            background: linear-gradient(90deg,
                transparent,
                rgba(125,212,154,.25),
                transparent);
        }


        /* =========================================================
           PRODUCT CARD
        ========================================================= */
        .product-card {
            position: relative;
            height: 100%;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--card-bg);
            box-shadow: var(--shadow-xs);
            transition: transform .4s cubic-bezier(.2,.7,.2,1), box-shadow .4s ease, border-color .4s ease;
        }

        [data-theme="dark"] .product-card {
            background: rgba(18,43,28,.55);
            border-color: rgba(125,212,154,.1);
            backdrop-filter: blur(15px);
            box-shadow:
                0 4px 20px rgba(0,0,0,.5),
                inset 0 1px 0 rgba(125,212,154,.08);
        }

        .product-card:hover {
            transform: translateY(-9px);
            border-color: #d8e5da;
            box-shadow: var(--shadow-lg);
        }

        [data-theme="dark"] .product-card:hover {
            border-color: rgba(255,166,107,.4);
            background: rgba(22,52,31,.85);
            box-shadow:
                0 30px 80px rgba(0,0,0,.75),
                0 0 50px rgba(255,166,107,.25),
                inset 0 1px 0 rgba(255,166,107,.15);
        }

        /* Animated gradient border on hover (dark only) */
        [data-theme="dark"] .product-card::after {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            padding: 1px;
            background: conic-gradient(
                from 0deg,
                transparent 0deg,
                rgba(125,212,154,.8) 60deg,
                rgba(255,166,107,.8) 120deg,
                transparent 180deg,
                transparent 360deg
            );
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
                    mask-composite: exclude;
            opacity: 0;
            transition: opacity .5s ease;
            pointer-events: none;
            animation: spinGradient 4s linear infinite;
            z-index: 3;
        }

        [data-theme="dark"] .product-card:hover::after { opacity: 1; }

        @keyframes spinGradient {
            to { transform: rotate(360deg); }
        }

        .product-image-wrap {
            position: relative;
            height: 245px;
            overflow: hidden;
            background: var(--green-soft);
        }

        [data-theme="dark"] .product-image-wrap {
            background: #08150e;
        }

        .product-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .7s cubic-bezier(.2,.7,.2,1), filter .5s ease;
        }

        [data-theme="dark"] .product-image-wrap img {
            filter: brightness(.85) contrast(1.12) saturate(1.1);
        }

        .product-card:hover .product-image-wrap img { transform: scale(1.1); }

        [data-theme="dark"] .product-card:hover .product-image-wrap img {
            filter: brightness(1.05) contrast(1.15) saturate(1.2);
        }

        .product-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                rgba(18,53,36,.02) 40%,
                rgba(18,53,36,.28) 100%
            );
            pointer-events: none;
        }

        [data-theme="dark"] .product-overlay {
            background: linear-gradient(
                180deg,
                rgba(3,10,6,.25) 0%,
                rgba(3,10,6,.15) 40%,
                rgba(3,10,6,.65) 100%
            );
        }

        .fresh-label {
            position: absolute;
            top: 13px;
            left: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            border: 1px solid rgba(255,255,255,.6);
            border-radius: 50px;
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(8px);
            color: var(--forest);
            font-size: 8px;
            font-weight: 900;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        [data-theme="dark"] .fresh-label {
            background: rgba(13,26,18,.85);
            border-color: rgba(125,212,154,.25);
            color: #c9ecd4;
            backdrop-filter: blur(15px);
            box-shadow:
                0 8px 25px rgba(0,0,0,.5),
                inset 0 1px 0 rgba(125,212,154,.15);
        }

        .fresh-label i { color: var(--orange); }

        [data-theme="dark"] .fresh-label i {
            color: #ffa66b;
            filter: drop-shadow(0 0 6px rgba(255,166,107,.6));
        }

        .product-heart {
            position: absolute;
            top: 13px;
            right: 13px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 50%;
            background: rgba(255,255,255,.88);
            color: #67746b;
            backdrop-filter: blur(8px);
            transition: .25s ease;
        }

        [data-theme="dark"] .product-heart {
            background: rgba(6,13,9,.85);
            color: #8ba394;
            border: 1px solid rgba(125,212,154,.15);
            backdrop-filter: blur(15px);
        }

        .product-heart:hover {
            background: white;
            color: var(--orange);
            transform: scale(1.1);
        }

        [data-theme="dark"] .product-heart:hover {
            background: rgba(255,166,107,.15);
            color: #ffa66b;
            border-color: rgba(255,166,107,.45);
            box-shadow: 0 0 25px rgba(255,166,107,.5);
        }

        .product-heart.active i::before {
            content: "\f415";
        }

        .product-heart.active {
            color: #e5285d;
        }

        [data-theme="dark"] .product-heart.active {
            color: #ff6b8e;
            background: rgba(255,107,142,.15);
            border-color: rgba(255,107,142,.5);
            box-shadow: 0 0 25px rgba(255,107,142,.5);
        }

        .product-body {
            padding: 19px 19px 20px;
        }

        .product-category {
            color: var(--orange);
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        [data-theme="dark"] .product-category {
            color: #ffa66b;
            text-shadow: 0 0 15px rgba(255,166,107,.4);
        }

        .product-name {
            overflow: hidden;
            margin: 6px 0 7px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 19px;
            line-height: 1.2;
            font-weight: 800;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        [data-theme="dark"] .product-name { color: #f0faf3; }

        .product-description {
            display: -webkit-box;
            min-height: 38px;
            margin-bottom: 17px;
            overflow: hidden;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.75;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        [data-theme="dark"] .product-description { color: #8ba394; }

        .product-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .product-price {
            color: var(--forest);
            font-size: 17px;
            font-weight: 900;
        }

        [data-theme="dark"] .product-price {
            color: #c9ecd4;
            text-shadow: 0 0 20px rgba(125,212,154,.3);
        }

        .price-label {
            display: block;
            margin-top: 1px;
            color: #9ba49e;
            font-size: 8px;
            font-weight: 600;
        }

        [data-theme="dark"] .price-label { color: #5b7466; }

        .add-cart-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 38px;
            padding: 9px 13px;
            border: 0;
            border-radius: 50px;
            background: var(--forest);
            color: white;
            font-size: 9px;
            font-weight: 900;
            transition: .3s ease;
            position: relative;
            overflow: hidden;
        }

        .add-cart-btn:hover {
            background: var(--orange);
            color: white;
            transform: translateY(-2px);
        }

        [data-theme="dark"] .add-cart-btn {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow:
                0 6px 20px rgba(63,129,85,.4),
                0 0 20px rgba(63,129,85,.2),
                inset 0 1px 0 rgba(255,255,255,.15);
        }

        [data-theme="dark"] .add-cart-btn:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 10px 30px rgba(255,166,107,.5),
                0 0 40px rgba(255,166,107,.35),
                inset 0 1px 0 rgba(255,255,255,.2);
            transform: translateY(-2px);
        }

        .add-cart-btn.added { background: #318a50; }

        [data-theme="dark"] .add-cart-btn.added {
            background: linear-gradient(135deg, #2d8a4c, #4dab6b);
            box-shadow:
                0 0 30px rgba(77,171,107,.6),
                0 0 60px rgba(77,171,107,.3);
        }

        .add-cart-btn:disabled {
            opacity: .85;
            cursor: wait;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */
        .empty-state {
            padding: 90px 25px;
            border: 1px dashed #cfdcd2;
            border-radius: 30px;
            background: var(--card-bg);
            text-align: center;
        }

        [data-theme="dark"] .empty-state {
            background: rgba(13,26,18,.6);
            border-color: rgba(125,212,154,.2);
            border-style: dashed;
        }

        .empty-icon {
            width: 85px;
            height: 85px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--green-soft);
            color: var(--green);
            font-size: 34px;
        }

        [data-theme="dark"] .empty-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow:
                0 0 40px rgba(125,212,154,.25),
                inset 0 0 25px rgba(125,212,154,.1);
        }

        .empty-state h3 {
            margin: 21px 0 7px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 26px;
        }

        [data-theme="dark"] .empty-state h3 { color: #f0faf3; }

        .empty-state p {
            max-width: 450px;
            margin: 0 auto 22px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }


        /* =========================================================
           FARM STORY
        ========================================================= */
        .story-section {
            position: relative;
            overflow: hidden;
            padding: 105px 0;
            background: var(--forest);
            color: white;
        }

        [data-theme="dark"] .story-section {
            background:
                radial-gradient(ellipse 60% 50% at 20% 30%, rgba(125,212,154,.1), transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 70%, rgba(255,166,107,.08), transparent 60%),
                linear-gradient(135deg, #040b07, #08150e);
            border-top: 1px solid rgba(125,212,154,.08);
            border-bottom: 1px solid rgba(125,212,154,.08);
        }

        .story-section::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            right: -330px;
            top: -260px;
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 50%;
        }

        [data-theme="dark"] .story-section::before {
            border-color: rgba(125,212,154,.12);
            box-shadow: inset 0 0 120px rgba(125,212,154,.1);
        }

        .story-section::after {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            left: -220px;
            bottom: -200px;
            border: 1px solid rgba(255,255,255,.05);
            border-radius: 50%;
        }

        [data-theme="dark"] .story-section::after {
            border-color: rgba(255,166,107,.15);
            box-shadow: inset 0 0 80px rgba(255,166,107,.1);
        }

        .story-image-wrap { position: relative; }

        .story-image {
            height: 430px;
            overflow: hidden;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0,0,0,.28);
        }

        [data-theme="dark"] .story-image {
            box-shadow:
                0 35px 90px rgba(0,0,0,.8),
                0 0 60px rgba(125,212,154,.2);
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .8s ease, filter .5s ease;
        }

        [data-theme="dark"] .story-image img {
            filter: brightness(.8) contrast(1.1) saturate(1.15);
        }

        .story-image-wrap:hover img { transform: scale(1.05); }

        [data-theme="dark"] .story-image-wrap:hover img {
            filter: brightness(.95) contrast(1.15) saturate(1.2);
        }

        .story-small-card {
            position: absolute;
            right: -20px;
            bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 16px;
            background: rgba(255,255,255,.95);
            color: var(--forest);
            box-shadow: 0 20px 50px rgba(0,0,0,.2);
        }

        [data-theme="dark"] .story-small-card {
            background: rgba(13,26,18,.85);
            border-color: rgba(125,212,154,.2);
            color: #f0faf3;
            backdrop-filter: blur(24px);
            box-shadow:
                0 25px 70px rgba(0,0,0,.7),
                0 0 40px rgba(125,212,154,.15),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .story-small-card i {
            color: var(--orange);
            font-size: 20px;
        }

        [data-theme="dark"] .story-small-card i {
            color: #ffa66b;
            filter: drop-shadow(0 0 12px rgba(255,166,107,.7));
        }

        .story-small-card strong {
            display: block;
            font-size: 11px;
        }

        .story-small-card span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 8px;
        }

        .story-content {
            position: relative;
            z-index: 2;
            padding-left: 42px;
        }

        .story-content .section-eyebrow { color: #f0a16e; }

        [data-theme="dark"] .story-content .section-eyebrow {
            color: #ffa66b;
            text-shadow: 0 0 20px rgba(255,166,107,.5);
        }

        .story-content .section-title { color: white; }

        [data-theme="dark"] .story-content .section-title {
            text-shadow: 0 0 40px rgba(125,212,154,.15);
        }

        .story-description {
            max-width: 510px;
            color: rgba(255,255,255,.64);
            font-size: 13px;
            line-height: 1.9;
        }

        [data-theme="dark"] .story-description { color: #8ba394; }

        .story-list {
            list-style: none;
            padding: 0;
            margin: 27px 0 0;
        }

        .story-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 13px;
            color: rgba(255,255,255,.82);
            font-size: 11px;
        }

        [data-theme="dark"] .story-list li { color: #c9ecd4; }

        .story-list i {
            color: #9dd2a7;
            font-size: 13px;
        }

        [data-theme="dark"] .story-list i {
            color: #7dd49a;
            filter: drop-shadow(0 0 8px rgba(125,212,154,.6));
        }


        /* =========================================================
           PROMO BANNER
        ========================================================= */
        .shop-banner { padding: 100px 0; }

        .banner-card {
            position: relative;
            min-height: 340px;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 55px;
            border-radius: 34px;
            background:
                linear-gradient(
                    90deg,
                    rgba(18,53,36,.97) 0%,
                    rgba(18,53,36,.85) 42%,
                    rgba(18,53,36,.25) 100%
                ),
                url("https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1600&q=90")
                center/cover;
            box-shadow: var(--shadow-lg);
        }

        [data-theme="dark"] .banner-card {
            background:
                linear-gradient(
                    90deg,
                    rgba(3,10,6,.98) 0%,
                    rgba(8,21,14,.9) 42%,
                    rgba(8,21,14,.4) 100%
                ),
                url("https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1600&q=90")
                center/cover;
            box-shadow:
                0 35px 90px rgba(0,0,0,.75),
                0 0 60px rgba(125,212,154,.15);
        }

        .banner-card::after {
            content: "";
            position: absolute;
            right: 45px;
            top: 45px;
            width: 130px;
            height: 130px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
        }

        [data-theme="dark"] .banner-card::after {
            border-color: rgba(255,166,107,.2);
            box-shadow: inset 0 0 50px rgba(255,166,107,.1);
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .banner-content .section-eyebrow { color: #f3a774; }

        [data-theme="dark"] .banner-content .section-eyebrow {
            color: #ffa66b;
            text-shadow: 0 0 20px rgba(255,166,107,.5);
        }

        .banner-content .section-title {
            margin-bottom: 11px;
            color: white;
        }

        .banner-content p {
            max-width: 520px;
            color: rgba(255,255,255,.66);
            font-size: 12px;
            line-height: 1.8;
        }

        [data-theme="dark"] .banner-content p { color: #8ba394; }


        /* =========================================================
           FOOTER
        ========================================================= */
        footer {
            position: relative;
            overflow: hidden;
            padding-top: 70px;
            background: #091b11;
            color: white;
        }

        [data-theme="dark"] footer {
            background:
                radial-gradient(ellipse 60% 50% at 50% 0%, rgba(125,212,154,.06), transparent 60%),
                #020a05;
            border-top: 1px solid rgba(125,212,154,.08);
        }

        footer::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            right: -300px;
            top: -250px;
            border: 1px solid rgba(255,255,255,.04);
            border-radius: 50%;
        }

        [data-theme="dark"] footer::before {
            border-color: rgba(125,212,154,.08);
            box-shadow: inset 0 0 100px rgba(125,212,154,.06);
        }

        .footer-brand {
            color: white;
            font-family: "Playfair Display", serif;
            font-size: 27px;
            font-weight: 800;
        }

        [data-theme="dark"] .footer-brand {
            text-shadow: 0 0 30px rgba(125,212,154,.15);
        }

        .footer-description {
            max-width: 330px;
            margin-top: 13px;
            color: rgba(255,255,255,.47);
            font-size: 11px;
            line-height: 1.9;
        }

        [data-theme="dark"] .footer-description { color: #8ba394; }

        .social-links {
            display: flex;
            gap: 7px;
            margin-top: 23px;
        }

        .social-link {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            color: rgba(255,255,255,.62);
            transition: .3s ease;
        }

        [data-theme="dark"] .social-link {
            border-color: rgba(125,212,154,.15);
            background: rgba(13,26,18,.5);
            color: #8ba394;
        }

        .social-link:hover {
            background: var(--orange);
            border-color: var(--orange);
            color: white;
            transform: translateY(-3px);
        }

        [data-theme="dark"] .social-link:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            border-color: #ffa66b;
            color: white;
            box-shadow:
                0 10px 30px rgba(255,166,107,.5),
                0 0 40px rgba(255,166,107,.4);
        }

        .footer-title {
            margin-bottom: 18px;
            color: white;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        [data-theme="dark"] .footer-title {
            color: #ffa66b;
            text-shadow: 0 0 15px rgba(255,166,107,.4);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li { margin-bottom: 11px; }

        .footer-links a {
            color: rgba(255,255,255,.47);
            font-size: 11px;
            transition: .25s ease;
            display: inline-block;
        }

        [data-theme="dark"] .footer-links a { color: #8ba394; }

        .footer-links a:hover {
            padding-left: 4px;
            color: white;
        }

        [data-theme="dark"] .footer-links a:hover {
            color: #7dd49a;
            text-shadow: 0 0 15px rgba(125,212,154,.6);
        }

        .footer-contact {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin-bottom: 13px;
            color: rgba(255,255,255,.48);
            font-size: 10px;
            line-height: 1.5;
        }

        [data-theme="dark"] .footer-contact { color: #8ba394; }

        .footer-contact i {
            flex: 0 0 auto;
            color: #e68a52;
            font-size: 13px;
        }

        [data-theme="dark"] .footer-contact i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.6));
        }

        .footer-bottom {
            margin-top: 55px;
            padding: 20px 0;
            border-top: 1px solid rgba(255,255,255,.07);
            color: rgba(255,255,255,.3);
            font-size: 9px;
        }

        [data-theme="dark"] .footer-bottom {
            border-top-color: rgba(125,212,154,.08);
            color: #5b7466;
        }


        /* =========================================================
           TOAST
        ========================================================= */
        .farm-toast {
            position: fixed;
            z-index: 9999;
            right: 22px;
            bottom: 22px;
            min-width: 300px;
            max-width: 370px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 16px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 17px;
            background: #10271a;
            color: white;
            box-shadow: 0 25px 60px rgba(0,0,0,.25);
            opacity: 0;
            transform: translateY(120px);
            pointer-events: none;
            transition: .45s cubic-bezier(.2,.7,.2,1);
        }

        [data-theme="dark"] .farm-toast {
            background: rgba(13,26,18,.92);
            border-color: rgba(125,212,154,.25);
            backdrop-filter: blur(24px);
            box-shadow:
                0 25px 70px rgba(0,0,0,.8),
                0 0 50px rgba(125,212,154,.25),
                inset 0 1px 0 rgba(125,212,154,.12);
        }

        .farm-toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .farm-toast > i {
            width: 35px;
            height: 35px;
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(143,201,155,.12);
            color: #9bd4a5;
        }

        [data-theme="dark"] .farm-toast > i {
            background: rgba(125,212,154,.2);
            color: #7dd49a;
            box-shadow:
                0 0 25px rgba(125,212,154,.5),
                inset 0 0 15px rgba(125,212,154,.15);
        }

        .farm-toast strong {
            display: block;
            font-size: 11px;
        }

        .farm-toast span {
            display: block;
            margin-top: 2px;
            color: rgba(255,255,255,.5);
            font-size: 9px;
        }

        [data-theme="dark"] .farm-toast span { color: #8ba394; }


        /* =========================================================
           ANIMATIONS
        ========================================================= */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero-content > * { animation: fadeUp .7s ease both; }
        .hero-label { animation-delay: .05s; }
        .hero-title { animation-delay: .12s; }
        .hero-description { animation-delay: .2s; }
        .hero-actions { animation-delay: .28s; }
        .hero-stats { animation-delay: .35s; }


        /* =========================================================
           REDUCED MOTION — accessibility
        ========================================================= */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .001ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .001ms !important;
                scroll-behavior: auto !important;
            }

            [data-theme="dark"] body::before,
            [data-theme="dark"] .product-card::after,
            [data-theme="dark"] .cart-badge {
                animation: none !important;
            }
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */
        @media (max-width: 1199px) {
            .navbar-nav .nav-link {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }

            .search-box input { width: 165px; }
            .search-box input:focus { width: 180px; }
        }

        @media (max-width: 991px) {
            .top-right { display: none; }
            .navbar { padding: 11px 0; }

            .navbar-collapse {
                margin-top: 13px;
                padding: 15px;
                border: 1px solid var(--border);
                border-radius: 20px;
                background: var(--card-bg);
                box-shadow: var(--shadow-sm);
            }

            [data-theme="dark"] .navbar-collapse {
                background: rgba(6,13,9,.95);
                backdrop-filter: blur(24px);
                border-color: rgba(125,212,154,.15);
            }

            .navbar-nav { align-items: stretch; }
            .navbar-nav .nav-link { padding: 11px 10px !important; }

            .register-link,
            .login-link {
                margin-top: 5px;
                text-align: center;
            }

            .cart-wrapper { margin: 9px 0; }
            .cart-icon { margin-left: 0; }

            .theme-toggle-btn {
                margin: 9px 0 0;
                width: 100%;
                border-radius: 12px !important;
            }

            .search-box { margin-top: 8px; }
            .search-box input,
            .search-box input:focus { width: 100%; }

            .shop-hero {
                min-height: auto;
                padding: 70px 0 90px;
            }

            .hero-visual { margin-top: 55px; }
            .hero-image-card { height: 460px; }

            .story-content {
                padding-left: 0;
                margin-top: 45px;
            }

            .story-small-card { right: 15px; }
            .banner-card { min-height: 350px; }
        }

        @media (max-width: 767px) {
            .top-left {
                width: 100%;
                justify-content: center;
            }

            .top-item.hide-mobile { display: none; }

            .shop-hero { padding: 60px 0 75px; }

            .hero-title {
                font-size: 46px;
                letter-spacing: -2px;
            }

            .hero-description { font-size: 13px; }
            .hero-stats { gap: 25px; }
            .hero-stat:not(:last-child)::after { display: none; }

            .hero-image-card {
                height: 390px;
                border-radius: 29px;
            }

            .quality-badge { right: 2px; }

            .hero-floating {
                left: 3px;
                bottom: 28px;
            }

            .trust-wrapper { margin-top: -30px; }
            .trust-card { padding: 16px; }
            .trust-item { padding: 6px 0; }

            .shop-section { padding: 75px 0; }
            .shop-section.search-active { padding-top: 35px; }

            .category-nav {
                justify-content: flex-start;
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 7px;
            }

            .category-pill { flex: 0 0 auto; }
            .shop-toolbar { align-items: flex-start; }
            .category-line { display: none; }
            .category-title { font-size: 25px; }
            .product-image-wrap { height: 225px; }

            .story-section { padding: 75px 0; }
            .story-image { height: 330px; }

            .shop-banner { padding: 75px 0; }

            .banner-card {
                min-height: 360px;
                padding: 35px 25px;
                border-radius: 27px;
            }

            .banner-card::after {
                right: -55px;
                top: -45px;
            }

            .farm-toast {
                left: 15px;
                right: 15px;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .hero-title { font-size: 39px; }
            .hero-actions { flex-direction: column; }
            .btn-farm,
            .btn-farm-outline { width: 100%; }

            .hero-stats { gap: 18px; }
            .hero-stat strong { font-size: 21px; }

            .hero-image-card { height: 350px; }
            .hero-image-caption strong { font-size: 18px; }

            .quality-badge {
                width: 82px;
                height: 82px;
                border-width: 5px;
            }

            .quality-badge strong { font-size: 16px; }
            .quality-badge span { font-size: 6px; }

            .product-body { padding: 17px; }
            .product-name { font-size: 18px; }
            .product-price { font-size: 16px; }
            .add-cart-btn { padding: 9px 11px; }

            .story-small-card {
                right: 8px;
                bottom: 15px;
            }
        }
    </style>
</head>

<body>

<!-- =========================================================
     NAVBAR
========================================================= -->

<header class="main-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a href="{{ route('homeforclient') }}"
               class="navbar-brand d-flex align-items-center gap-2">

                <img
                    src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                    alt="Farm Fresh Logo">

                <div>
                    <div class="brand-title">Farm Fresh</div>
                    <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                </div>

            </a>


            <button
                class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-success"></i>
            </button>


            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav ms-auto gap-lg-1">

                    <li class="nav-item">
                        <a href="{{ route('homeforclient') }}" class="nav-link">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('shoppage') }}" class="nav-link active">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item cart-wrapper">
                        <a href="{{ route('cart') }}"
                           class="nav-link cart-icon"
                           aria-label="Shopping cart">
                            <i class="bi bi-bag"></i>
                            <span class="cart-badge" id="cart-count">0</span>
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <form
                            class="search-box"
                            role="search"
                            action="{{ route('shoppage') }}"
                            method="GET">

                            <input
                                type="search"
                                name="search"
                                placeholder="Search products..."
                                aria-label="Search products"
                                value="{{ request('search') }}">

                            <button type="submit" aria-label="Search">
                                <i class="bi bi-search"></i>
                            </button>

                        </form>
                    </li>

                    <!-- Dark mode toggle -->
                    <li class="nav-item">
                        <button
                            id="themeToggle"
                            class="nav-link theme-toggle-btn"
                            type="button"
                            aria-label="Toggle dark mode">
                            <i class="bi bi-moon-stars-fill"></i>
                        </button>
                    </li>

                </ul>

            </div>

        </div>
    </nav>
</header>


{{-- HERO + TRUST STRIP (visible only when NOT searching) --}}

@if($search === '' && !$category)

    <section class="shop-hero">

        <div class="hero-decoration one"></div>
        <div class="hero-decoration two"></div>

        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <div class="hero-content">

                        <div class="hero-label">
                            <i class="bi bi-stars"></i>
                            Fresh from the farm
                        </div>

                        <h1 class="hero-title">
                            Better food begins with
                            <span>better farms.</span>
                        </h1>

                        <p class="hero-description">
                            Explore fresh vegetables, naturally sweet fruits,
                            nutritious nuts, farm products and quality eggs —
                            carefully selected for your table.
                        </p>

                        <div class="hero-actions">

                            <a href="#products" class="btn-farm">
                                Explore Collection
                                <i class="bi bi-arrow-right"></i>
                            </a>

                            <a href="{{ route('about') }}" class="btn-farm-outline">
                                Our Story
                                <i class="bi bi-leaf"></i>
                            </a>

                        </div>


                        <div class="hero-stats">
                            <div class="hero-stat">
                                <strong>100%</strong>
                                <span>Fresh selection</span>
                            </div>

                            <div class="hero-stat">
                                <strong>5+</strong>
                                <span>Farm categories</span>
                            </div>

                            <div class="hero-stat">
                                <strong>Daily</strong>
                                <span>Quality checked</span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="hero-visual">

                        <div class="hero-image-card">

                            <img
                                src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=1100&q=90"
                                alt="Fresh organic vegetables">

                            <div class="hero-image-caption">

                                <div>
                                    <small>Farm collection</small>
                                    <strong>Fresh. Natural. Simple.</strong>
                                </div>

                                <div class="hero-image-arrow">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                            </div>

                        </div>


                        <div class="quality-badge">
                            <strong>100%</strong>
                            <span>FARM QUALITY</span>
                        </div>


                        <div class="hero-floating">

                            <div class="floating-icon">
                                <i class="bi bi-flower1"></i>
                            </div>

                            <div>
                                <strong>Farm Fresh</strong>
                                <span>Selected with care</span>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <div class="container trust-wrapper">
        <div class="trust-card">
            <div class="row g-3">

                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon"><i class="bi bi-leaf"></i></div>
                        <div>
                            <strong>Fresh Selection</strong>
                            <span>Carefully selected</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon"><i class="bi bi-patch-check"></i></div>
                        <div>
                            <strong>Quality Checked</strong>
                            <span>Before delivery</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon"><i class="bi bi-basket2"></i></div>
                        <div>
                            <strong>Easy Shopping</strong>
                            <span>Simple ordering</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon"><i class="bi bi-truck"></i></div>
                        <div>
                            <strong>Farm Delivery</strong>
                            <span>Fresh to your door</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif


<!-- =========================================================
     PRODUCTS
========================================================= -->

<section class="shop-section {{ ($search !== '' || $category) ? 'search-active' : '' }}" id="products">
    <div class="container">

        <div class="text-center">

            <div class="section-eyebrow">Our collection</div>

            @if($search !== '')

                <h1 class="section-title">Search Results</h1>

                <p class="section-subtitle">
                    Showing products matching <strong>"{{ $search }}"</strong>
                </p>

            @elseif($category)

                <h1 class="section-title">
                    {{ ucfirst(str_replace('-', ' ', $category)) }}
                </h1>

                <p class="section-subtitle">
                    Explore our carefully selected farm products.
                </p>

            @else

                <h1 class="section-title">
                    Fresh Products,
                    <br>
                    Better Choices
                </h1>

                <p class="section-subtitle">
                    From our farm collection to your kitchen,
                    discover fresh products selected for quality,
                    freshness and taste.
                </p>

            @endif

        </div>


        <div class="category-nav">

            <a href="#vegetables" class="category-pill">
                <i class="bi bi-flower1"></i>
                Vegetables
            </a>

            <a href="#fruits" class="category-pill">
                <i class="bi bi-apple"></i>
                Fruits
            </a>

            <a href="#fresh-nuts" class="category-pill">
                <i class="bi bi-circle"></i>
                Fresh Nuts
            </a>

            <a href="#farm-animals" class="category-pill">
                <i class="bi bi-heart"></i>
                Farm Animals
            </a>

            <a href="#eggs" class="category-pill">
                <i class="bi bi-egg"></i>
                Farm Eggs
            </a>

        </div>


        <div class="shop-toolbar">

            <div class="result-info">
                <div class="result-icon">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>

                <div>

                    @php
                        $totalProducts =
                            $vegetables->count()
                            + $fruits->count()
                            + $freshNuts->count()
                            + $animalFarms->count()
                            + $eggs->count();
                    @endphp

                    <strong>
                        {{ $totalProducts }} Products Available
                    </strong>

                    <span>
                        Fresh products from our farm collection
                    </span>

                </div>
            </div>


            @if($search !== '' || $category)
                <a href="{{ route('shoppage') }}" class="clear-btn">
                    <i class="bi bi-x-circle"></i>
                    Clear filter
                </a>
            @endif

        </div>


        @php
            $allEmpty =
                $vegetables->isEmpty()
                && $fruits->isEmpty()
                && $freshNuts->isEmpty()
                && $animalFarms->isEmpty()
                && $eggs->isEmpty();
        @endphp


        @if(($search !== '' || $category) && $allEmpty)

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>No products found</h3>

                <p>
                    We couldn't find products matching your search.
                    Try another keyword or browse our complete collection.
                </p>

                <a href="{{ route('shoppage') }}" class="btn-farm">
                    Browse All Products
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        @else


            <!-- VEGETABLES -->

            @if($vegetables->isNotEmpty())

                <div class="category-block" id="vegetables">

                    <div class="category-heading">
                        <div class="category-title-wrap">
                            <div class="category-icon"><i class="bi bi-flower1"></i></div>
                            <div>
                                <h2 class="category-title">Vegetables</h2>
                                <p class="category-caption">Fresh and nutritious farm vegetables</p>
                            </div>
                        </div>
                        <div class="category-line"></div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($vegetables as $vegetable)

                            <div class="col">
                                <div class="product-card">

                                    <div class="product-image-wrap">
                                        <img src="{{ $vegetable->image }}" alt="{{ $vegetable->name }}" loading="lazy">
                                        <div class="product-overlay"></div>
                                        <span class="fresh-label">
                                            <i class="bi bi-leaf-fill"></i> Fresh
                                        </span>
                                        <button type="button" class="product-heart" aria-label="Favorite product">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>

                                    <div class="product-body">

                                        <div class="product-category">Vegetable</div>
                                        <h3 class="product-name">{{ $vegetable->name }}</h3>
                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($vegetable->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>
                                                <div class="product-price">${{ number_format($vegetable->price, 2) }}</div>
                                                <span class="price-label">Farm price</span>
                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $vegetable->id }}"
                                                data-product-type="vegetable">
                                                <i class="bi bi-bag-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- FRUITS -->

            @if($fruits->isNotEmpty())

                <div class="category-block" id="fruits">

                    <div class="category-heading">
                        <div class="category-title-wrap">
                            <div class="category-icon"><i class="bi bi-apple"></i></div>
                            <div>
                                <h2 class="category-title">Fruits</h2>
                                <p class="category-caption">Naturally sweet and full of freshness</p>
                            </div>
                        </div>
                        <div class="category-line"></div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($fruits as $fruit)

                            <div class="col">
                                <div class="product-card">

                                    <div class="product-image-wrap">
                                        <img src="{{ $fruit->image }}" alt="{{ $fruit->name }}" loading="lazy">
                                        <div class="product-overlay"></div>
                                        <span class="fresh-label">
                                            <i class="bi bi-stars"></i> Fresh
                                        </span>
                                        <button type="button" class="product-heart" aria-label="Favorite product">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>

                                    <div class="product-body">

                                        <div class="product-category">Fruit</div>
                                        <h3 class="product-name">{{ $fruit->name }}</h3>
                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($fruit->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>
                                                <div class="product-price">${{ number_format($fruit->price, 2) }}</div>
                                                <span class="price-label">Farm price</span>
                                            </div>

                                            <button
                                                class="add-cart-btn add-to-fruit-cart"
                                                data-fruit-id="{{ $fruit->id }}">
                                                <i class="bi bi-bag-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- FRESH NUTS -->

            @if($freshNuts->isNotEmpty())

                <div class="category-block" id="fresh-nuts">

                    <div class="category-heading">
                        <div class="category-title-wrap">
                            <div class="category-icon"><i class="bi bi-circle"></i></div>
                            <div>
                                <h2 class="category-title">Fresh Nuts</h2>
                                <p class="category-caption">Carefully selected nutritious nuts</p>
                            </div>
                        </div>
                        <div class="category-line"></div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($freshNuts as $freshnut)

                            <div class="col">
                                <div class="product-card">

                                    <div class="product-image-wrap">
                                        <img src="{{ $freshnut->image }}" alt="{{ $freshnut->name }}" loading="lazy">
                                        <div class="product-overlay"></div>
                                        <span class="fresh-label">
                                            <i class="bi bi-check-circle-fill"></i> Quality
                                        </span>
                                        <button type="button" class="product-heart" aria-label="Favorite product">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>

                                    <div class="product-body">

                                        <div class="product-category">Fresh Nuts</div>
                                        <h3 class="product-name">{{ $freshnut->name }}</h3>
                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($freshnut->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>
                                                <div class="product-price">${{ number_format($freshnut->price, 2) }}</div>
                                                <span class="price-label">Farm price</span>
                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $freshnut->id }}"
                                                data-product-type="freshnut">
                                                <i class="bi bi-bag-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- FARM ANIMALS -->

            @if($animalFarms->isNotEmpty())

                <div class="category-block" id="farm-animals">

                    <div class="category-heading">
                        <div class="category-title-wrap">
                            <div class="category-icon"><i class="bi bi-heart"></i></div>
                            <div>
                                <h2 class="category-title">Farm Animals</h2>
                                <p class="category-caption">Products from healthy farm animals</p>
                            </div>
                        </div>
                        <div class="category-line"></div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($animalFarms as $farmanimal)

                            <div class="col">
                                <div class="product-card">

                                    <div class="product-image-wrap">
                                        <img src="{{ $farmanimal->image }}" alt="{{ $farmanimal->name }}" loading="lazy">
                                        <div class="product-overlay"></div>
                                        <span class="fresh-label">
                                            <i class="bi bi-heart-fill"></i> Farm
                                        </span>
                                        <button type="button" class="product-heart" aria-label="Favorite product">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>

                                    <div class="product-body">

                                        <div class="product-category">Farm Animal</div>
                                        <h3 class="product-name">{{ $farmanimal->name }}</h3>
                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($farmanimal->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>
                                                <div class="product-price">${{ number_format($farmanimal->price, 2) }}</div>
                                                <span class="price-label">Farm price</span>
                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $farmanimal->id }}"
                                                data-product-type="farmanimal">
                                                <i class="bi bi-bag-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- EGGS -->

            @if($eggs->isNotEmpty())

                <div class="category-block" id="eggs">

                    <div class="category-heading">
                        <div class="category-title-wrap">
                            <div class="category-icon"><i class="bi bi-egg"></i></div>
                            <div>
                                <h2 class="category-title">Farm Fresh Eggs</h2>
                                <p class="category-caption">Fresh eggs selected directly from the farm</p>
                            </div>
                        </div>
                        <div class="category-line"></div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($eggs as $egg)

                            <div class="col">
                                <div class="product-card">

                                    <div class="product-image-wrap">
                                        <img src="{{ $egg->image }}" alt="{{ $egg->name }}" loading="lazy">
                                        <div class="product-overlay"></div>
                                        <span class="fresh-label">
                                            <i class="bi bi-egg-fill"></i> Farm Fresh
                                        </span>
                                        <button type="button" class="product-heart" aria-label="Favorite product">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>

                                    <div class="product-body">

                                        <div class="product-category">Eggs</div>
                                        <h3 class="product-name">{{ $egg->name }}</h3>
                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($egg->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>
                                                <div class="product-price">${{ number_format($egg->price, 2) }}</div>
                                                <span class="price-label">Farm price</span>
                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $egg->id }}"
                                                data-product-type="egg">
                                                <i class="bi bi-bag-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        @endif

    </div>
</section>


<!-- =========================================================
     FARM STORY
========================================================= -->

<section class="story-section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="story-image-wrap">

                    <div class="story-image">
                        <img
                            src="https://images.unsplash.com/photo-1500076656116-558758c991c1?auto=format&fit=crop&w=1200&q=90"
                            alt="Organic farm">
                    </div>

                    <div class="story-small-card">
                        <i class="bi bi-flower1"></i>
                        <div>
                            <strong>Grown with care</strong>
                            <span>Quality comes first</span>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="story-content">

                    <div class="section-eyebrow">Why Farm Fresh</div>

                    <h2 class="section-title">
                        From our farm values
                        to your table.
                    </h2>

                    <p class="story-description">
                        We believe great food begins with great choices.
                        Our collection focuses on fresh farm products,
                        careful selection and a simple shopping experience
                        designed around quality.
                    </p>


                    <ul class="story-list">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Fresh products selected with care
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Quality-focused product selection
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Simple and convenient online shopping
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Convenient farm-to-door delivery
                        </li>
                    </ul>


                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="btn-farm">
                            Discover Our Story
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- =========================================================
     PROMOTIONAL BANNER
========================================================= -->

<section class="shop-banner">
    <div class="container">
        <div class="banner-card">

            <div class="banner-content">

                <div class="section-eyebrow">
                    Freshness you can feel
                </div>

                <h2 class="section-title">
                    Fill your basket
                    with something fresh.
                </h2>

                <p>
                    Explore our farm collection and choose the products
                    that belong on your table today.
                </p>

                <a href="#products" class="btn-farm mt-2">
                    Shop Fresh
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>
    </div>
</section>


<!-- =========================================================
     CART TOAST
========================================================= -->

<div class="farm-toast" id="farmToast">

    <i class="bi bi-check-lg"></i>

    <div>
        <strong id="toastTitle">Added to cart</strong>
        <span id="toastMessage">Product added successfully.</span>
    </div>

</div>


<!-- =========================================================
     BOOTSTRAP
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


<!-- =========================================================
     CART + DARK MODE JS
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const cartCount = document.getElementById('cart-count');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const toast = document.getElementById('farmToast');
    const toastTitle = document.getElementById('toastTitle');
    const toastMessage = document.getElementById('toastMessage');


    /* TOAST */

    let toastTimer;

    function showToast(title, message) {
        toastTitle.textContent = title;
        toastMessage.textContent = message;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () {
            toast.classList.remove('show');
        }, 2800);
    }


    /* CART COUNT */

    function setCartCount(count) {
        const numericCount = Number(count) || 0;
        cartCount.textContent = numericCount;
        cartCount.style.display = numericCount > 0 ? 'flex' : 'none';
    }


    function updateCartCount() {
        fetch('{{ route("cart.count") }}')
            .then(response => {
                if (!response.ok) throw new Error('Unable to get cart count.');
                return response.json();
            })
            .then(data => setCartCount(data.count))
            .catch(error => console.error('Cart count error:', error));
    }


    /* BUTTON STATE */

    function loadingButton(button) {
        button.disabled = true;
        button.innerHTML = '<i class="bi bi-arrow-repeat"></i> Adding';
    }

    function successButton(button, originalHTML) {
        button.classList.add('added');
        button.innerHTML = '<i class="bi bi-check-lg"></i> Added';
        setTimeout(function () {
            button.classList.remove('added');
            button.innerHTML = originalHTML;
            button.disabled = false;
        }, 1400);
    }

    function resetButton(button, originalHTML) {
        button.innerHTML = originalHTML;
        button.disabled = false;
    }


    /* NORMAL PRODUCTS */

    document.querySelectorAll('.add-to-cart').forEach(function (button) {
        button.addEventListener('click', function () {

            const productId = this.dataset.productId;
            const productType = this.dataset.productType || '';
            const originalHTML = this.innerHTML;

            loadingButton(this);

            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ type: productType })
            })

            .then(function (response) {
                if (!response.ok) throw new Error('Unable to add product.');
                return response.json();
            })

            .then(function (data) {
                if (data.success) {
                    setCartCount(data.count);
                    successButton(button, originalHTML);
                    showToast('Added to cart', 'Your product was added successfully.');
                } else {
                    resetButton(button, originalHTML);
                    showToast('Could not add product', data.message || 'Please try again.');
                }
            })

            .catch(function (error) {
                console.error('Add to cart failed:', error);
                resetButton(button, originalHTML);
                showToast('Something went wrong', 'Please try again.');
            });
        });
    });


    /* FRUITS */

    document.querySelectorAll('.add-to-fruit-cart').forEach(function (button) {
        button.addEventListener('click', function () {

            const fruitId = this.dataset.fruitId;
            const originalHTML = this.innerHTML;

            loadingButton(this);

            fetch(`/cart/add-fruit/${fruitId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ type: 'fruit' })
            })

            .then(function (response) {
                if (!response.ok) throw new Error('Unable to add fruit.');
                return response.json();
            })

            .then(function (data) {
                if (data.success) {
                    setCartCount(data.count);
                    successButton(button, originalHTML);
                    showToast('Added to cart', 'Fresh fruit added successfully.');
                } else {
                    resetButton(button, originalHTML);
                    showToast('Could not add fruit', data.message || 'Please try again.');
                }
            })

            .catch(function (error) {
                console.error('Add fruit failed:', error);
                resetButton(button, originalHTML);
                showToast('Something went wrong', 'Please try again.');
            });
        });
    });


    /* FAVORITE BUTTON */

    document.querySelectorAll('.product-heart').forEach(function (button) {
        button.addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-heart');
            icon.classList.toggle('bi-heart-fill');
            this.classList.toggle('active');
        });
    });


    /* INITIAL CART */

    updateCartCount();


    /* =====================================================
       ULTIMATE DARK MODE CONTROLLER
       - Persists via localStorage
       - Detects OS preference on first visit
       - Watches for OS theme changes
       - Smooth icon + aria updates
    ===================================================== */

    const themeToggle = document.getElementById('themeToggle');
    const htmlEl = document.documentElement;
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');


    function applyTheme(theme) {
        if (theme === 'dark') {
            htmlEl.setAttribute('data-theme', 'dark');
            if (themeToggle) {
                themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
                themeToggle.setAttribute('aria-label', 'Switch to light mode');
                themeToggle.setAttribute('title', 'Switch to light mode');
            }
        } else {
            htmlEl.removeAttribute('data-theme');
            if (themeToggle) {
                themeToggle.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
                themeToggle.setAttribute('aria-label', 'Switch to dark mode');
                themeToggle.setAttribute('title', 'Switch to dark mode');
            }
        }
    }


    /* Determine initial theme */

    const savedTheme = localStorage.getItem('farmfresh-theme');
    let initialTheme = 'light';

    if (savedTheme === 'dark' || savedTheme === 'light') {
        initialTheme = savedTheme;
    } else if (mediaQuery.matches) {
        initialTheme = 'dark';
    }

    applyTheme(initialTheme);


    /* Toggle on click */

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            const isDark = htmlEl.getAttribute('data-theme') === 'dark';
            const newTheme = isDark ? 'light' : 'dark';
            applyTheme(newTheme);
            localStorage.setItem('farmfresh-theme', newTheme);
        });
    }


    /* React to OS theme change if user hasn't chosen */

    mediaQuery.addEventListener('change', function (event) {
        const stored = localStorage.getItem('farmfresh-theme');
        if (stored !== 'dark' && stored !== 'light') {
            applyTheme(event.matches ? 'dark' : 'light');
        }
    });

});

</script>

</body>
</html>