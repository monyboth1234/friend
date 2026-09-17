<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farm Fresh | About Us</title>

    <!-- Google Fonts — same as shoppage -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           LIGHT THEME — DEFAULT
           (Fonts & structure match shoppage.blade.php)
        ========================================================= */

        :root {
            --green-950: #102a1a;
            --green-900: #173d25;
            --green-800: #1d5130;
            --green-700: #276a3d;
            --green-600: #33834b;
            --green-500: #4b9c5e;

            --orange-600: #d95f20;
            --orange-500: #ed762d;
            --orange-400: #f58c49;

            --cream: #faf8f2;
            --cream-dark: #f2efe5;

            --white: #ffffff;
            --black: #101713;

            --text: #26332b;
            --muted: #718078;

            --border: rgba(20, 55, 33, 0.10);

            --heading: "Playfair Display", Georgia, serif;
            --body: "DM Sans", Arial, sans-serif;

            --shadow-sm: 0 8px 30px rgba(20, 55, 33, 0.07);
            --shadow-md: 0 20px 60px rgba(20, 55, 33, 0.12);
            --shadow-lg: 0 30px 90px rgba(20, 55, 33, 0.18);

            --radius: 22px;

            --card-bg: #ffffff;
            --card-bg-soft: #ffffff;
            --header-bg: rgba(255,255,255,.92);
            --input-bg: rgba(255,255,255,.06);
        }


        /* =========================================================
           DARK THEME — ULTIMATE PREMIUM OVERRIDE
           Matches shoppage.blade.php: layered surfaces,
           chromatic glows, star field, grain texture.
        ========================================================= */

        [data-theme="dark"] {
            /* Text hierarchy — brightest to softest */
            --green-950: #f0faf3;
            --green-900: #c9ecd4;
            --green-800: #a8dfb5;
            --green-700: #7dd49a;
            --green-600: #7dd49a;
            --green-500: #4ea76b;

            --orange-600: #ffa66b;
            --orange-500: #f59852;
            --orange-400: #e47732;

            /* Layered surfaces */
            --cream: #060d09;
            --cream-dark: #0a1610;
            --white: #0d1a12;
            --black: #eaf5ee;

            --text: #eaf5ee;
            --muted: #8ba394;

            --border: rgba(125,212,154,.10);

            /* Chromatic shadows */
            --shadow-sm: 0 10px 30px rgba(0,0,0,.55);
            --shadow-md: 0 20px 50px rgba(0,0,0,.6);
            --shadow-lg: 0 30px 80px rgba(0,0,0,.7);

            --card-bg: #122b1c;
            --card-bg-soft: rgba(18,43,28,.55);
            --header-bg: rgba(6,13,9,.75);
            --input-bg: rgba(6,13,9,.7);
        }


        /* =========================================================
           GLOBAL
        ========================================================= */

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: var(--body);
            color: var(--text);
            background: var(--white);
            line-height: 1.7;
            overflow-x: hidden;
            position: relative;
            transition: background-color .5s ease, color .5s ease;
        }

        /* Dark ambient glow */
        [data-theme="dark"] body {
            background:
                radial-gradient(ellipse 90% 55% at 50% -15%, rgba(125,212,154,.14), transparent 65%),
                radial-gradient(ellipse 70% 55% at 100% 100%, rgba(255,166,107,.10), transparent 60%),
                radial-gradient(ellipse 60% 50% at 0% 50%, rgba(125,212,154,.06), transparent 60%),
                var(--cream);
            background-attachment: fixed;
        }

        /* Animated star field (dark only) */
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

        /* Grain texture (dark only) */
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

        /* Content layer above background effects */
        .main-header,
        main,
        section,
        footer,
        .container,
        nav,
        .back-top {
            position: relative;
            z-index: 2;
        }

        img { max-width: 100%; }
        a { text-decoration: none; }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--heading);
        }

        .container { max-width: 1240px; }

        ::selection {
            background: var(--orange-500);
            color: white;
        }

        /* Smooth theme transitions */
        *,
        *::before,
        *::after {
            transition:
                background-color .4s ease,
                border-color .4s ease,
                color .4s ease,
                box-shadow .4s ease;
        }


        /* =========================================================
           PRELOADER
        ========================================================= */

        .page-loader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: var(--green-950);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity .5s ease, visibility .5s ease;
        }

        .page-loader.hide {
            opacity: 0;
            visibility: hidden;
        }

        .loader-content {
            text-align: center;
            color: white;
        }

        .loader-icon {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255,255,255,.2);
            border-top-color: var(--orange-500);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        .loader-content p {
            margin-top: 18px;
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }


        /* =========================================================
           TOP STRIP
        ========================================================= */

        .top-strip {
            background: var(--green-950);
            color: rgba(255,255,255,.75);
            font-size: 12px;
            padding: 8px 0;
        }

        [data-theme="dark"] .top-strip {
            background: linear-gradient(90deg, #030906, #060d09, #030906);
            border-bottom: 1px solid rgba(125,212,154,.08);
        }

        .top-strip i {
            color: var(--orange-400);
            margin-right: 6px;
        }

        [data-theme="dark"] .top-strip i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.6));
        }

        .top-strip-right {
            display: flex;
            gap: 20px;
            justify-content: flex-end;
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
            transition: .3s ease;
        }

        .main-header.scrolled {
            box-shadow: 0 10px 35px rgba(15,50,30,.10);
        }

        [data-theme="dark"] .main-header {
            box-shadow:
                inset 0 -1px 0 rgba(125,212,154,.06),
                0 8px 40px rgba(0,0,0,.4);
        }

        [data-theme="dark"] .main-header.scrolled {
            box-shadow:
                inset 0 -1px 0 rgba(125,212,154,.08),
                0 12px 50px rgba(0,0,0,.5);
        }

        .navbar { min-height: 78px; }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            object-fit: contain;
            box-shadow: 0 8px 20px rgba(23,61,37,.2);
        }

        [data-theme="dark"] .brand-logo {
            filter: brightness(.9) saturate(1.15)
                    drop-shadow(0 0 12px rgba(255,166,107,.35));
        }

        .brand-name {
            color: var(--green-900);
            font-family: var(--heading);
            font-size: 21px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.5px;
        }

        [data-theme="dark"] .brand-name {
            color: #f0faf3;
            text-shadow: 0 0 20px rgba(125,212,154,.2);
        }

        .brand-subtitle {
            color: var(--orange-600);
            font-size: 8px;
            letter-spacing: 2.5px;
            font-weight: 800;
            margin-top: 5px;
        }

        [data-theme="dark"] .brand-subtitle {
            color: #ffa66b;
            text-shadow: 0 0 12px rgba(255,166,107,.4);
        }

        .navbar-nav { gap: 5px; }

        .nav-link {
            color: #3c4941 !important;
            font-size: 13px;
            font-weight: 700;
            padding: 11px 15px !important;
            border-radius: 10px;
            transition: .25s ease;
            position: relative;
        }

        [data-theme="dark"] .nav-link {
            color: #b3c9b9 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--green-700) !important;
            background: #edf5ef;
        }

        [data-theme="dark"] .nav-link:hover,
        [data-theme="dark"] .nav-link.active {
            color: #ffa66b !important;
            background: rgba(255,166,107,.1);
            text-shadow: 0 0 15px rgba(255,166,107,.4);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 18px;
        }

        .btn-nav {
            border: 0;
            background: var(--orange-500);
            color: white;
            padding: 11px 18px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            transition: .3s ease;
        }

        .btn-nav:hover {
            background: var(--orange-600);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(217,95,32,.25);
        }

        [data-theme="dark"] .btn-nav {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 8px 25px rgba(255,166,107,.4),
                0 0 30px rgba(255,166,107,.2),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        [data-theme="dark"] .btn-nav:hover {
            background: linear-gradient(135deg, #ffa66b, #ffb88a);
            box-shadow:
                0 12px 35px rgba(255,166,107,.55),
                0 0 50px rgba(255,166,107,.35),
                inset 0 1px 0 rgba(255,255,255,.25);
        }

        .navbar-toggler {
            border: 0;
            box-shadow: none !important;
        }

        [data-theme="dark"] .navbar-toggler i {
            color: #7dd49a !important;
        }


        /* =========================================================
           THEME TOGGLE — matches shoppage
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
            color: var(--green-900) !important;
            font-size: 16px !important;
            padding: 0 !important;
            margin-left: 6px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .theme-toggle-btn:hover {
            background: rgba(255,166,107,.12) !important;
            color: #e47732 !important;
            border-color: #f59852;
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

        [data-theme="dark"] .theme-toggle-btn:hover {
            background: rgba(255,166,107,.2);
            box-shadow:
                0 0 30px rgba(255,166,107,.5),
                inset 0 0 20px rgba(255,166,107,.15);
            transform: rotate(-15deg) scale(1.1);
        }


        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            position: relative;
            min-height: 650px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background: var(--green-950);
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .48;
            transform: scale(1.04);
            animation: heroZoom 12s ease-in-out infinite alternate;
        }

        [data-theme="dark"] .hero-bg {
            opacity: .35;
            filter: brightness(.7) contrast(1.1) saturate(1.15);
        }

        @keyframes heroZoom {
            from { transform: scale(1.04); }
            to   { transform: scale(1.10); }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(8,30,17,.92) 0%,
                    rgba(8,30,17,.70) 45%,
                    rgba(8,30,17,.15) 100%
                );
        }

        [data-theme="dark"] .hero-overlay {
            background:
                radial-gradient(ellipse 70% 60% at 20% 50%, rgba(6,13,9,.95), transparent 70%),
                linear-gradient(
                    90deg,
                    rgba(3,10,6,.97) 0%,
                    rgba(6,13,9,.85) 45%,
                    rgba(6,13,9,.35) 100%
                );
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 780px;
            padding: 110px 0;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            backdrop-filter: blur(10px);
            padding: 9px 14px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        [data-theme="dark"] .hero-tag {
            background: rgba(18,43,28,.7);
            border-color: rgba(125,212,154,.25);
            box-shadow:
                0 10px 30px rgba(0,0,0,.5),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .hero-tag i {
            color: var(--orange-400);
        }

        [data-theme="dark"] .hero-tag i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.7));
        }

        .hero h1 {
            font-size: clamp(48px, 6vw, 82px);
            line-height: 1.03;
            font-weight: 700;
            letter-spacing: -2px;
            margin-bottom: 25px;
        }

        [data-theme="dark"] .hero h1 {
            text-shadow: 0 0 60px rgba(125,212,154,.15);
        }

        .hero h1 span {
            color: #bce2a9;
            font-style: italic;
        }

        [data-theme="dark"] .hero h1 span {
            color: #a8dfb5;
            text-shadow:
                0 0 30px rgba(168,223,181,.4),
                0 0 60px rgba(125,212,154,.2);
        }

        .hero-description {
            color: rgba(255,255,255,.78);
            font-size: 17px;
            max-width: 650px;
            margin-bottom: 35px;
        }

        [data-theme="dark"] .hero-description {
            color: #b3c9b9;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: var(--orange-500);
            color: white;
            border-radius: 13px;
            padding: 14px 23px;
            font-size: 13px;
            font-weight: 800;
            border: 0;
            transition: .3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom:hover {
            background: var(--orange-600);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(217,95,32,.3);
        }

        [data-theme="dark"] .btn-primary-custom {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 10px 30px rgba(255,166,107,.4),
                0 0 40px rgba(255,166,107,.2),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        [data-theme="dark"] .btn-primary-custom::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.2), transparent);
            transition: left .6s ease;
        }

        [data-theme="dark"] .btn-primary-custom:hover::before { left: 100%; }

        [data-theme="dark"] .btn-primary-custom:hover {
            background: linear-gradient(135deg, #ffa66b, #ffb88a);
            box-shadow:
                0 15px 40px rgba(255,166,107,.6),
                0 0 60px rgba(255,166,107,.4),
                inset 0 1px 0 rgba(255,255,255,.25);
        }

        .btn-light-custom {
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.3);
            color: white;
            border-radius: 13px;
            padding: 13px 22px;
            font-size: 13px;
            font-weight: 800;
            backdrop-filter: blur(10px);
            transition: .3s ease;
        }

        .btn-light-custom:hover {
            background: white;
            color: var(--green-900);
            transform: translateY(-3px);
        }

        [data-theme="dark"] .btn-light-custom {
            background: rgba(125,212,154,.08);
            border-color: rgba(125,212,154,.3);
            color: #c9ecd4;
        }

        [data-theme="dark"] .btn-light-custom:hover {
            background: rgba(125,212,154,.18);
            border-color: rgba(125,212,154,.6);
            color: white;
            box-shadow:
                0 0 30px rgba(125,212,154,.35),
                inset 0 0 20px rgba(125,212,154,.1);
        }

        .hero-scroll {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            color: rgba(255,255,255,.65);
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-scroll i {
            display: block;
            text-align: center;
            margin-top: 5px;
            animation: bounce 1.6s infinite;
        }

        @keyframes bounce {
            0%,100% { transform: translateY(0); }
            50%     { transform: translateY(6px); }
        }


        /* =========================================================
           FLOATING STATS
        ========================================================= */

        .stats-wrap {
            position: relative;
            z-index: 5;
            margin-top: -55px;
        }

        .stats-card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow-lg);
            padding: 28px 25px;
            border: 1px solid var(--border);
        }

        [data-theme="dark"] .stats-card {
            background: rgba(13,26,18,.75);
            border-color: rgba(125,212,154,.15);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            box-shadow:
                0 25px 70px rgba(0,0,0,.7),
                0 0 60px rgba(125,212,154,.1),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 8px 25px;
            border-right: 1px solid #e8ece9;
        }

        [data-theme="dark"] .stat {
            border-right-color: rgba(125,212,154,.12);
        }

        .stat:last-child { border-right: 0; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: #edf6ef;
            color: var(--green-700);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            flex-shrink: 0;
        }

        [data-theme="dark"] .stat-icon {
            background: rgba(125,212,154,.12);
            color: #7dd49a;
            box-shadow:
                0 0 20px rgba(125,212,154,.2),
                inset 0 0 15px rgba(125,212,154,.08);
        }

        .stat-number {
            color: var(--green-900);
            font-family: var(--heading);
            font-size: 26px;
            font-weight: 800;
            line-height: 1;
        }

        [data-theme="dark"] .stat-number {
            color: #f0faf3;
            text-shadow: 0 0 20px rgba(125,212,154,.25);
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            margin-top: 5px;
        }


        /* =========================================================
           SECTION COMMON
        ========================================================= */

        .section {
            padding: 115px 0;
        }

        .section-soft {
            background: var(--cream);
        }

        [data-theme="dark"] .section-soft {
            background: transparent;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--orange-600);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        [data-theme="dark"] .eyebrow {
            color: #ffa66b;
            text-shadow: 0 0 15px rgba(255,166,107,.4);
        }

        .eyebrow::before {
            content: "";
            width: 28px;
            height: 2px;
            background: var(--orange-500);
        }

        [data-theme="dark"] .eyebrow::before {
            background: linear-gradient(90deg, #f59852, #ffa66b);
            box-shadow: 0 0 10px rgba(255,166,107,.6);
        }

        .section-title {
            color: var(--green-950);
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.12;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        [data-theme="dark"] .section-title {
            color: #f0faf3;
            text-shadow: 0 0 40px rgba(125,212,154,.1);
        }

        .section-title span {
            color: var(--green-600);
            font-style: italic;
        }

        [data-theme="dark"] .section-title span {
            color: #7dd49a;
            text-shadow: 0 0 25px rgba(125,212,154,.4);
        }

        .section-text {
            color: var(--muted);
            font-size: 15px;
            max-width: 620px;
        }

        [data-theme="dark"] .section-text {
            color: #8ba394;
        }


        /* =========================================================
           ABOUT INTRO
        ========================================================= */

        .about-image {
            position: relative;
            padding-right: 30px;
        }

        .about-main-image {
            width: 100%;
            height: 530px;
            object-fit: cover;
            border-radius: 28px;
            box-shadow: var(--shadow-lg);
        }

        [data-theme="dark"] .about-main-image {
            filter: brightness(.85) contrast(1.1) saturate(1.1);
            box-shadow:
                0 35px 90px rgba(0,0,0,.75),
                0 0 60px rgba(125,212,154,.2);
        }

        .about-small-image {
            position: absolute;
            width: 190px;
            height: 210px;
            object-fit: cover;
            border-radius: 22px;
            right: -5px;
            bottom: -35px;
            border: 8px solid var(--white);
            box-shadow: var(--shadow-md);
        }

        [data-theme="dark"] .about-small-image {
            border-color: #0d1a12;
            filter: brightness(.85) contrast(1.1);
            box-shadow:
                0 20px 60px rgba(0,0,0,.7),
                0 0 40px rgba(255,166,107,.15);
        }

        .experience-badge {
            position: absolute;
            left: -25px;
            bottom: 40px;
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background: var(--orange-500);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 20px 45px rgba(217,95,32,.3);
            border: 7px solid var(--white);
        }

        [data-theme="dark"] .experience-badge {
            background: linear-gradient(135deg, #e47732, #ffa66b);
            border-color: #0d1a12;
            box-shadow:
                0 20px 50px rgba(0,0,0,.6),
                0 0 50px rgba(255,166,107,.5),
                inset 0 0 20px rgba(255,255,255,.15);
        }

        .experience-badge strong {
            font-family: var(--heading);
            font-size: 34px;
            line-height: 1;
            text-shadow: 0 1px 3px rgba(0,0,0,.2);
        }

        .experience-badge span {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 6px;
        }

        .about-content {
            padding-left: 45px;
        }

        .about-content p {
            color: var(--muted);
            font-size: 15px;
        }

        .check-list {
            list-style: none;
            padding: 0;
            margin: 28px 0;
        }

        .check-list li {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 13px;
            color: #35433a;
            font-size: 13px;
            font-weight: 700;
        }

        [data-theme="dark"] .check-list li { color: #c9ecd4; }

        .check-list i {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e6f2e8;
            color: var(--green-700);
            font-size: 13px;
        }

        [data-theme="dark"] .check-list i {
            background: rgba(125,212,154,.15);
            color: #7dd49a;
            box-shadow:
                0 0 15px rgba(125,212,154,.3),
                inset 0 0 10px rgba(125,212,154,.1);
        }


        /* =========================================================
           SERVICES
        ========================================================= */

        .services-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 55px;
        }

        .services-heading .section-text { margin: auto; }

        .service-card {
            height: 100%;
            position: relative;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 32px;
            overflow: hidden;
            transition: .4s cubic-bezier(.2,.7,.2,1);
        }

        [data-theme="dark"] .service-card {
            background: rgba(18,43,28,.55);
            border-color: rgba(125,212,154,.1);
            backdrop-filter: blur(15px);
            box-shadow:
                0 4px 20px rgba(0,0,0,.5),
                inset 0 1px 0 rgba(125,212,154,.08);
        }

        .service-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #eef6ef;
            right: -40px;
            bottom: -40px;
            transition: .4s ease;
        }

        [data-theme="dark"] .service-card::after {
            background: rgba(125,212,154,.1);
        }

        .service-card:hover {
            transform: translateY(-9px);
            border-color: transparent;
            box-shadow: var(--shadow-md);
        }

        [data-theme="dark"] .service-card:hover {
            border-color: rgba(255,166,107,.4);
            background: rgba(22,52,31,.85);
            box-shadow:
                0 30px 80px rgba(0,0,0,.75),
                0 0 50px rgba(255,166,107,.2),
                inset 0 1px 0 rgba(255,166,107,.15);
        }

        .service-card:hover::after { transform: scale(2.3); }

        .service-number {
            position: absolute;
            top: 24px;
            right: 27px;
            color: #dfe7e1;
            font-family: var(--heading);
            font-size: 26px;
            font-weight: 800;
        }

        [data-theme="dark"] .service-number {
            color: rgba(125,212,154,.2);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: #edf6ef;
            color: var(--green-700);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 24px;
            transition: .35s ease;
        }

        [data-theme="dark"] .service-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow:
                0 0 20px rgba(125,212,154,.2),
                inset 0 0 15px rgba(125,212,154,.08);
        }

        .service-card:hover .service-icon {
            background: var(--green-900);
            color: white;
            transform: rotate(-5deg);
        }

        [data-theme="dark"] .service-card:hover .service-icon {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            color: white;
            box-shadow:
                0 0 30px rgba(125,212,154,.5),
                inset 0 0 20px rgba(125,212,154,.15);
        }

        .service-card h3 {
            position: relative;
            z-index: 2;
            font-size: 20px;
            color: var(--green-950);
            margin-bottom: 10px;
        }

        [data-theme="dark"] .service-card h3 { color: #f0faf3; }

        .service-card p {
            position: relative;
            z-index: 2;
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        [data-theme="dark"] .service-card p { color: #8ba394; }


        /* =========================================================
           WHY CHOOSE
        ========================================================= */

        .why-section {
            background: var(--green-950);
            color: white;
            position: relative;
            overflow: hidden;
        }

        [data-theme="dark"] .why-section {
            background:
                radial-gradient(ellipse 60% 50% at 80% 20%, rgba(125,212,154,.1), transparent 60%),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(255,166,107,.08), transparent 60%),
                linear-gradient(135deg, #040b07, #08150e);
            border-top: 1px solid rgba(125,212,154,.08);
            border-bottom: 1px solid rgba(125,212,154,.08);
        }

        .why-section::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(80,150,90,.10);
            right: -200px;
            top: -200px;
        }

        [data-theme="dark"] .why-section::before {
            background: rgba(125,212,154,.08);
            box-shadow: inset 0 0 120px rgba(125,212,154,.1);
        }

        .why-image {
            position: relative;
            min-height: 650px;
        }

        .why-image img {
            width: 100%;
            height: 650px;
            object-fit: cover;
        }

        [data-theme="dark"] .why-image img {
            filter: brightness(.8) contrast(1.1) saturate(1.15);
        }

        .image-label {
            position: absolute;
            bottom: 35px;
            left: 35px;
            right: 35px;
            padding: 18px 20px;
            background: rgba(10,35,19,.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 16px;
        }

        [data-theme="dark"] .image-label {
            background: rgba(13,26,18,.85);
            border-color: rgba(125,212,154,.2);
            backdrop-filter: blur(24px);
            box-shadow:
                0 20px 60px rgba(0,0,0,.7),
                0 0 40px rgba(125,212,154,.15),
                inset 0 1px 0 rgba(125,212,154,.1);
        }

        .image-label small {
            color: #aed5b3;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 800;
        }

        [data-theme="dark"] .image-label small {
            color: #7dd49a;
            text-shadow: 0 0 12px rgba(125,212,154,.5);
        }

        .image-label strong {
            display: block;
            margin-top: 3px;
            font-size: 16px;
        }

        .why-content {
            padding: 90px 8% 90px 7%;
            position: relative;
            z-index: 2;
        }

        .why-content .eyebrow {
            color: #a9d5ae;
        }

        [data-theme="dark"] .why-content .eyebrow {
            color: #ffa66b;
            text-shadow: 0 0 15px rgba(255,166,107,.5);
        }

        .why-content .eyebrow::before {
            background: var(--orange-400);
        }

        .why-content .section-title { color: white; }

        [data-theme="dark"] .why-content .section-title {
            text-shadow: 0 0 40px rgba(125,212,154,.15);
        }

        .why-content .section-text {
            color: rgba(255,255,255,.68);
        }

        [data-theme="dark"] .why-content .section-text { color: #8ba394; }

        .benefit {
            display: flex;
            gap: 17px;
            margin-top: 28px;
            padding: 12px;
            border-radius: 16px;
            transition: .3s ease;
        }

        [data-theme="dark"] .benefit:hover {
            background: rgba(125,212,154,.06);
            box-shadow: 0 0 30px rgba(125,212,154,.1);
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,.16);
            background: rgba(255,255,255,.07);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bce5bf;
            font-size: 20px;
            flex-shrink: 0;
        }

        [data-theme="dark"] .benefit-icon {
            background: rgba(125,212,154,.1);
            border-color: rgba(125,212,154,.2);
            color: #7dd49a;
            box-shadow:
                0 0 20px rgba(125,212,154,.2),
                inset 0 0 15px rgba(125,212,154,.08);
        }

        .benefit h4 {
            color: white;
            font-size: 17px;
            margin-bottom: 5px;
        }

        [data-theme="dark"] .benefit h4 { color: #f0faf3; }

        .benefit p {
            color: rgba(255,255,255,.58);
            font-size: 13px;
            margin: 0;
        }

        [data-theme="dark"] .benefit p { color: #8ba394; }


        /* =========================================================
           PROCESS
        ========================================================= */

        .process-card {
            position: relative;
            text-align: center;
            padding: 10px 20px;
        }

        .process-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin: auto;
            background: var(--white);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-700);
            font-size: 30px;
            position: relative;
            z-index: 2;
            transition: .3s ease;
        }

        [data-theme="dark"] .process-icon {
            background: rgba(18,43,28,.85);
            border-color: rgba(125,212,154,.2);
            color: #7dd49a;
            box-shadow:
                0 15px 40px rgba(0,0,0,.6),
                0 0 30px rgba(125,212,154,.2),
                inset 0 0 20px rgba(125,212,154,.08);
        }

        .process-card:hover .process-icon {
            transform: scale(1.08) rotate(-3deg);
        }

        [data-theme="dark"] .process-card:hover .process-icon {
            box-shadow:
                0 20px 50px rgba(0,0,0,.7),
                0 0 50px rgba(125,212,154,.4),
                inset 0 0 25px rgba(125,212,154,.15);
        }

        .process-number {
            position: absolute;
            top: -7px;
            right: calc(50% - 55px);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--orange-500);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 900;
            z-index: 3;
        }

        [data-theme="dark"] .process-number {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 0 20px rgba(255,166,107,.6),
                0 0 40px rgba(255,166,107,.3);
        }

        .process-card h3 {
            margin-top: 22px;
            color: var(--green-950);
            font-size: 19px;
        }

        [data-theme="dark"] .process-card h3 { color: #f0faf3; }

        .process-card p {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        [data-theme="dark"] .process-card p { color: #8ba394; }

        .process-line {
            position: absolute;
            top: 45px;
            left: 58%;
            width: 84%;
            border-top: 1px dashed #cbd8ce;
        }

        [data-theme="dark"] .process-line {
            border-top-color: rgba(125,212,154,.2);
            border-top-style: dashed;
        }


        /* =========================================================
           CTA
        ========================================================= */

        .cta {
            padding: 90px 0;
            background: var(--cream);
        }

        [data-theme="dark"] .cta {
            background: transparent;
        }

        .cta-box {
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            padding: 75px;
            background:
                linear-gradient(
                    120deg,
                    rgba(17,52,29,.97),
                    rgba(39,106,61,.90)
                ),
                url("https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            color: white;
        }

        [data-theme="dark"] .cta-box {
            background:
                linear-gradient(
                    120deg,
                    rgba(3,10,6,.98),
                    rgba(15,46,26,.92)
                ),
                url("https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            box-shadow:
                0 35px 90px rgba(0,0,0,.75),
                0 0 60px rgba(125,212,154,.2);
            border: 1px solid rgba(125,212,154,.15);
        }

        .cta-box::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
            right: -100px;
            top: -150px;
        }

        [data-theme="dark"] .cta-box::before {
            background: rgba(125,212,154,.1);
            box-shadow: inset 0 0 80px rgba(125,212,154,.15);
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
        }

        .cta h2 {
            font-size: clamp(34px, 4vw, 52px);
            margin-bottom: 15px;
        }

        [data-theme="dark"] .cta h2 {
            text-shadow: 0 0 40px rgba(125,212,154,.2);
        }

        .cta p {
            color: rgba(255,255,255,.72);
            margin-bottom: 28px;
        }

        [data-theme="dark"] .cta p { color: #b3c9b9; }


        /* =========================================================
           FOOTER
        ========================================================= */

        footer {
            position: relative;
            overflow: hidden;
            background: #0c2114;
            color: white;
            padding: 80px 0 25px;
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
            pointer-events: none;
        }

        [data-theme="dark"] footer::before {
            border-color: rgba(125,212,154,.08);
            box-shadow: inset 0 0 100px rgba(125,212,154,.06);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .footer-brand-icon {
            width: 45px;
            height: 45px;
            background: var(--orange-500);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        [data-theme="dark"] .footer-brand-icon {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 8px 25px rgba(255,166,107,.4),
                0 0 30px rgba(255,166,107,.2);
        }

        .footer-brand strong { font-size: 21px; }

        .footer-description {
            color: rgba(255,255,255,.52);
            font-size: 13px;
            max-width: 310px;
        }

        [data-theme="dark"] .footer-description { color: #8ba394; }

        .footer-title {
            color: white;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-family: var(--body);
            font-weight: 800;
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
            color: rgba(255,255,255,.52);
            font-size: 13px;
            transition: .25s;
            display: inline-block;
        }

        [data-theme="dark"] .footer-links a { color: #8ba394; }

        .footer-links a:hover {
            color: var(--orange-400);
            padding-left: 4px;
        }

        [data-theme="dark"] .footer-links a:hover {
            color: #7dd49a;
            text-shadow: 0 0 15px rgba(125,212,154,.6);
        }

        .contact-item {
            display: flex;
            gap: 11px;
            color: rgba(255,255,255,.55);
            font-size: 13px;
            margin-bottom: 14px;
        }

        [data-theme="dark"] .contact-item { color: #8ba394; }

        .contact-item i {
            color: var(--orange-400);
            margin-top: 4px;
        }

        [data-theme="dark"] .contact-item i {
            color: #ffa66b;
            filter: drop-shadow(0 0 8px rgba(255,166,107,.6));
        }

        .socials {
            display: flex;
            gap: 8px;
            margin-top: 22px;
        }

        .social {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            border: 1px solid rgba(255,255,255,.12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,.65);
            transition: .3s ease;
        }

        [data-theme="dark"] .social {
            border-color: rgba(125,212,154,.15);
            background: rgba(13,26,18,.5);
            color: #8ba394;
        }

        .social:hover {
            background: var(--orange-500);
            border-color: var(--orange-500);
            color: white;
            transform: translateY(-3px);
        }

        [data-theme="dark"] .social:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            border-color: #ffa66b;
            color: white;
            box-shadow:
                0 10px 30px rgba(255,166,107,.5),
                0 0 40px rgba(255,166,107,.4);
        }

        .newsletter-input {
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.12);
            color: white;
            border-radius: 11px;
            padding: 12px 14px;
            font-size: 12px;
        }

        [data-theme="dark"] .newsletter-input {
            background: rgba(6,13,9,.7);
            border-color: rgba(125,212,154,.15);
        }

        .newsletter-input::placeholder {
            color: rgba(255,255,255,.4);
        }

        .newsletter-input:focus {
            background: rgba(255,255,255,.08);
            color: white;
            border-color: var(--orange-500);
            box-shadow: none;
        }

        [data-theme="dark"] .newsletter-input:focus {
            background: rgba(6,13,9,.95);
            border-color: #7dd49a;
            box-shadow:
                0 0 0 4px rgba(125,212,154,.14),
                0 0 25px rgba(125,212,154,.3);
        }

        .newsletter-btn {
            background: var(--orange-500);
            color: white;
            border: 0;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 800;
            padding: 12px 16px;
            transition: .25s ease;
        }

        .newsletter-btn:hover {
            background: var(--orange-600);
            color: white;
        }

        [data-theme="dark"] .newsletter-btn {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 0 25px rgba(255,166,107,.5);
        }

        [data-theme="dark"] .newsletter-btn:hover {
            background: linear-gradient(135deg, #ffa66b, #ffb88a);
            box-shadow: 0 0 35px rgba(255,166,107,.7);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.08);
            margin-top: 55px;
            padding-top: 22px;
            color: rgba(255,255,255,.35);
            font-size: 11px;
        }

        [data-theme="dark"] .footer-bottom {
            border-top-color: rgba(125,212,154,.08);
            color: #5b7466;
        }


        /* =========================================================
           BACK TO TOP
        ========================================================= */

        .back-top {
            position: fixed;
            right: 25px;
            bottom: 25px;
            width: 45px;
            height: 45px;
            border-radius: 14px;
            border: 0;
            background: var(--orange-500);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: .3s;
            box-shadow: 0 10px 25px rgba(217,95,32,.25);
        }

        [data-theme="dark"] .back-top {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow:
                0 15px 40px rgba(0,0,0,.6),
                0 0 40px rgba(255,166,107,.5);
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        [data-theme="dark"] .back-top:hover {
            background: linear-gradient(135deg, #ffa66b, #ffb88a);
            box-shadow:
                0 20px 50px rgba(0,0,0,.7),
                0 0 60px rgba(255,166,107,.7);
        }


        /* =========================================================
           ANIMATIONS
        ========================================================= */

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: .8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .001ms !important;
                transition-duration: .001ms !important;
            }
            [data-theme="dark"] body::before { animation: none !important; }
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991.98px) {
            .top-strip-right { display: none; }

            .nav-actions {
                margin-left: 0;
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid rgba(255,255,255,.15);
            }

            [data-theme="dark"] .nav-actions {
                border-top-color: rgba(125,212,154,.15);
            }

            .navbar-collapse { padding: 15px 0; }
            .navbar-nav { gap: 2px; }
            .nav-link { padding: 12px 10px !important; }

            .hero { min-height: 600px; }
            .hero h1 { font-size: 55px; }

            .stats-wrap { margin-top: -35px; }

            .stat {
                border-right: 0;
                border-bottom: 1px solid #e8ece9;
                padding: 18px;
            }

            [data-theme="dark"] .stat {
                border-bottom-color: rgba(125,212,154,.12);
            }

            .stat:last-child { border-bottom: 0; }

            .about-content {
                padding-left: 0;
                margin-top: 70px;
            }

            .why-content { padding: 70px 30px; }
            .process-line { display: none; }
            .cta-box { padding: 55px 35px; }

            .theme-toggle-btn {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
                border-radius: 12px !important;
            }
        }

        @media (max-width: 767.98px) {
            .top-strip { display: none; }
            .navbar { min-height: 70px; }
            .brand-logo { width: 43px; height: 43px; }
            .brand-name { font-size: 18px; }

            .hero { min-height: 600px; }
            .hero-content { padding: 90px 0; }
            .hero h1 { font-size: 43px; letter-spacing: -1px; }
            .hero-description { font-size: 14px; }
            .hero-scroll { display: none; }

            .stats-wrap { margin-top: 25px; }
            .stats-card { padding: 10px; }

            .section { padding: 80px 0; }
            .section-title { font-size: 36px; }

            .about-main-image { height: 400px; }

            .about-small-image {
                width: 130px;
                height: 150px;
                right: 0;
            }

            .experience-badge {
                width: 110px;
                height: 110px;
                left: -5px;
            }

            .experience-badge strong { font-size: 25px; }
            .experience-badge span { font-size: 8px; }

            .why-image,
            .why-image img {
                min-height: 450px;
                height: 450px;
            }

            .image-label {
                left: 20px;
                right: 20px;
                bottom: 20px;
            }

            .cta { padding: 60px 0; }

            .cta-box {
                border-radius: 22px;
                padding: 45px 25px;
            }

            footer { padding-top: 60px; }
        }

    </style>
</head>


<body>


<!-- =========================================================
     LOADER
========================================================= -->

<div class="page-loader" id="loader">
    <div class="loader-content">
        <div class="loader-icon">
            <i class="bi bi-leaf"></i>
        </div>
        <p>Farm Fresh</p>
    </div>
</div>


<!-- =========================================================
     NAVBAR
========================================================= -->

<header class="main-header" id="mainHeader">

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <!-- BRAND -->
            <a href="{{ route('homeforclient') }}" class="brand">

                <img class="brand-logo"
                     src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                     alt="Farm Fresh">

                <div>
                    <div class="brand-name">Farm Fresh</div>
                    <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                </div>

            </a>


            <!-- MOBILE -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">
                <i class="bi bi-list fs-2"></i>
            </button>


            <!-- NAV -->
            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a href="{{ route('homeforclient') }}" class="nav-link">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('shoppage') }}" class="nav-link">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link active">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            Contact
                        </a>
                    </li>

                    <!-- THEME TOGGLE -->
                    <li class="nav-item">
                        <button id="themeToggle"
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


<!-- =========================================================
     HERO
========================================================= -->

<section class="hero">

    <img
        class="hero-bg"
        src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=2000&q=90"
        alt="Green agricultural field">

    <div class="hero-overlay"></div>


    <div class="container">

        <div class="hero-content reveal">

            <div class="hero-tag">
                <i class="bi bi-stars"></i>
                Growing Better. Living Better.
            </div>

            <h1>
                Rooted in nature.<br>
                <span>Made for life.</span>
            </h1>

            <p class="hero-description">
                We believe good food begins with healthy soil,
                responsible farming, and a commitment to bringing
                fresh, nutritious products directly to your table.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('shoppage') }}" class="btn-primary-custom">
                    Explore Our Products
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

                <a href="#our-story" class="btn-light-custom">
                    Discover Our Story
                </a>

            </div>

        </div>

    </div>


    <div class="hero-scroll">
        Scroll to explore
        <i class="bi bi-chevron-down"></i>
    </div>

</section>


<!-- =========================================================
     STATS
========================================================= -->

<section class="stats-wrap">

    <div class="container">

        <div class="stats-card">

            <div class="row g-0">

                <div class="col-lg-3 col-md-6">
                    <div class="stat">
                        <div class="stat-icon"><i class="bi bi-calendar-heart"></i></div>
                        <div>
                            <div class="stat-number">20+</div>
                            <div class="stat-label">Years of Farming</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat">
                        <div class="stat-icon"><i class="bi bi-basket2"></i></div>
                        <div>
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Fresh Products</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat">
                        <div class="stat-icon"><i class="bi bi-people"></i></div>
                        <div>
                            <div class="stat-number">5K+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat">
                        <div class="stat-icon"><i class="bi bi-patch-check"></i></div>
                        <div>
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Farm Fresh</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     OUR STORY
========================================================= -->

<section class="section" id="our-story">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 reveal">

                <div class="about-image">

                    <img class="about-main-image"
                         src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1000&q=90"
                         alt="Farmer working in agricultural field">

                    <img class="about-small-image"
                         src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&w=600&q=85"
                         alt="Fresh vegetables">

                    <div class="experience-badge">
                        <strong>20+</strong>
                        <span>Years<br>Experience</span>
                    </div>

                </div>

            </div>


            <div class="col-lg-6 reveal">

                <div class="about-content">

                    <div class="eyebrow">Our Story</div>

                    <h2 class="section-title">
                        Farming with purpose,
                        <span>growing with heart.</span>
                    </h2>

                    <p>
                        Farm Fresh was built around a simple idea:
                        everyone deserves access to fresh, healthy,
                        and responsibly grown food.
                    </p>

                    <p>
                        From carefully preparing the soil to selecting
                        quality crops and delivering fresh produce,
                        every step is handled with care.
                    </p>


                    <ul class="check-list">

                        <li>
                            <i class="bi bi-check-lg"></i>
                            Fresh products harvested with care
                        </li>

                        <li>
                            <i class="bi bi-check-lg"></i>
                            Responsible and sustainable farming
                        </li>

                        <li>
                            <i class="bi bi-check-lg"></i>
                            Quality products at fair prices
                        </li>

                        <li>
                            <i class="bi bi-check-lg"></i>
                            Supporting local agriculture
                        </li>

                    </ul>


                    <a href="{{ route('shoppage') }}" class="btn-primary-custom">
                        Shop Fresh Products
                        <i class="bi bi-arrow-up-right ms-2"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     SERVICES
========================================================= -->

<section class="section section-soft">

    <div class="container">

        <div class="services-heading reveal">

            <div class="eyebrow justify-content-center">What We Do</div>

            <h2 class="section-title">
                From <span>soil</span> to your table
            </h2>

            <p class="section-text">
                We take care of every stage of the farming journey
                to ensure that our customers receive fresh and
                quality products.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">01</span>
                    <div class="service-icon"><i class="bi bi-flower1"></i></div>
                    <h3>Planting</h3>
                    <p>Carefully selected seeds are planted using responsible farming practices.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">02</span>
                    <div class="service-icon"><i class="bi bi-moisture"></i></div>
                    <h3>Smart Watering</h3>
                    <p>We provide crops with the right amount of water to support healthy growth.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">03</span>
                    <div class="service-icon"><i class="bi bi-sun"></i></div>
                    <h3>Natural Growing</h3>
                    <p>Our crops benefit from sunlight, healthy soil, and careful monitoring.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">04</span>
                    <div class="service-icon"><i class="bi bi-basket"></i></div>
                    <h3>Fresh Harvest</h3>
                    <p>Fresh products are carefully harvested when they are ready for our customers.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">05</span>
                    <div class="service-icon"><i class="bi bi-box-seam"></i></div>
                    <h3>Quality Packing</h3>
                    <p>Products are prepared and packed carefully to maintain freshness.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">06</span>
                    <div class="service-icon"><i class="bi bi-truck"></i></div>
                    <h3>Fast Delivery</h3>
                    <p>We work to move fresh products quickly from our farm to your home.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">07</span>
                    <div class="service-icon"><i class="bi bi-heart-pulse"></i></div>
                    <h3>Healthy Food</h3>
                    <p>Fresh food helps families build healthier and better everyday lifestyles.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="service-card">
                    <span class="service-number">08</span>
                    <div class="service-icon"><i class="bi bi-shop"></i></div>
                    <h3>Farm Market</h3>
                    <p>Explore our collection of vegetables, fruits, eggs, nuts, and more.</p>
                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     WHY CHOOSE US
========================================================= -->

<section class="why-section">

    <div class="container-fluid p-0">

        <div class="row g-0 align-items-stretch">

            <div class="col-lg-5">

                <div class="why-image">

                    <img src="https://images.unsplash.com/photo-1500076656116-558758c991c1?auto=format&fit=crop&w=1200&q=90"
                         alt="Farmer working on farm">

                    <div class="image-label">
                        <small>Our commitment</small>
                        <strong>Better farming. Better future.</strong>
                    </div>

                </div>

            </div>


            <div class="col-lg-7">

                <div class="why-content reveal">

                    <div class="eyebrow">Why Farm Fresh</div>

                    <h2 class="section-title">
                        Good food starts with
                        <span>good farming.</span>
                    </h2>

                    <p class="section-text">
                        We care about more than simply producing food.
                        We care about the land, the farmers, the community,
                        and the people who enjoy our products.
                    </p>


                    <div class="benefit">
                        <div class="benefit-icon"><i class="bi bi-leaf"></i></div>
                        <div>
                            <h4>Fresh & Natural</h4>
                            <p>Products are grown and handled with freshness as our priority.</p>
                        </div>
                    </div>

                    <div class="benefit">
                        <div class="benefit-icon"><i class="bi bi-shield-check"></i></div>
                        <div>
                            <h4>Quality You Can Trust</h4>
                            <p>We focus on quality at every stage, from farming to delivery.</p>
                        </div>
                    </div>

                    <div class="benefit">
                        <div class="benefit-icon"><i class="bi bi-globe-americas"></i></div>
                        <div>
                            <h4>Sustainable Thinking</h4>
                            <p>We believe protecting the land today creates a better tomorrow.</p>
                        </div>
                    </div>

                    <div class="benefit">
                        <div class="benefit-icon"><i class="bi bi-people"></i></div>
                        <div>
                            <h4>Supporting Farmers</h4>
                            <p>Strong farming communities create stronger local food systems.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FARMING PROCESS
========================================================= -->

<section class="section section-soft">

    <div class="container">

        <div class="services-heading reveal">

            <div class="eyebrow justify-content-center">Our Process</div>

            <h2 class="section-title">
                How fresh food <span>gets to you</span>
            </h2>

            <p class="section-text">
                A simple journey powered by care,
                experience, and responsible farming.
            </p>

        </div>


        <div class="row g-4 position-relative">

            <div class="col-lg-3 col-md-6 reveal">
                <div class="process-card">
                    <div class="process-line"></div>
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="bi bi-flower1"></i></div>
                    <h3>Grow</h3>
                    <p>Healthy crops begin with healthy soil and careful farming.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="process-card">
                    <div class="process-line"></div>
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="bi bi-sun"></i></div>
                    <h3>Care</h3>
                    <p>We monitor and care for our crops throughout their growth.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="process-card">
                    <div class="process-line"></div>
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="bi bi-basket"></i></div>
                    <h3>Harvest</h3>
                    <p>Products are harvested at the right time for maximum freshness.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="bi bi-house-heart"></i></div>
                    <h3>Deliver</h3>
                    <p>Fresh products continue their journey from our farm to your table.</p>
                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CTA
========================================================= -->

<section class="cta">

    <div class="container">

        <div class="cta-box reveal">

            <div class="cta-content">

                <div class="eyebrow" style="color:#b9dfbc;">
                    Freshness starts here
                </div>

                <h2>
                    Ready to bring
                    farm freshness home?
                </h2>

                <p>
                    Explore our fresh collection and discover
                    quality products grown with care.
                </p>

                <a href="{{ route('shoppage') }}" class="btn-primary-custom">
                    Shop Now
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer id="contact">

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-4">

                <div class="footer-brand">

                    <div class="footer-brand-icon">
                        <i class="bi bi-leaf-fill"></i>
                    </div>

                    <div>
                        <strong>Farm Fresh</strong>
                        <div style="color:#ed762d;font-size:8px;letter-spacing:2px;font-weight:800;">
                            ORGANIC PRODUCTS
                        </div>
                    </div>

                </div>

                <p class="footer-description">
                    Fresh products, responsible farming,
                    and a healthier future for our communities.
                </p>

                <div class="socials">
                    <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="social"><i class="bi bi-telegram"></i></a>
                </div>

            </div>


            <div class="col-6 col-lg-2">

                <h4 class="footer-title">Explore</h4>

                <ul class="footer-links">
                    <li><a href="{{ route('homeforclient') }}">Home</a></li>
                    <li><a href="{{ route('shoppage') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>

            </div>


            <div class="col-6 col-lg-2">

                <h4 class="footer-title">Products</h4>

                <ul class="footer-links">
                    <li><a href="{{ route('shoppage') }}">Vegetables</a></li>
                    <li><a href="{{ route('shoppage') }}">Fruits</a></li>
                    <li><a href="{{ route('shoppage') }}">Fresh Nuts</a></li>
                    <li><a href="{{ route('shoppage') }}">Eggs</a></li>
                </ul>

            </div>


            <div class="col-lg-4">

                <h4 class="footer-title">Contact Us</h4>

                <div class="contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Kep, Cambodia</span>
                </div>

                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+855 12 345 678</span>
                </div>

                <div class="contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Farm@gmail.com</span>
                </div>

                <form class="mt-4">
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Your email address">
                        <button class="newsletter-btn" type="submit">Join</button>
                    </div>
                </form>

            </div>

        </div>


        <div class="footer-bottom">

            <div class="row align-items-center">

                <div class="col-md-6">
                    © 2026 Farm Fresh. All Rights Reserved.
                </div>

                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                    Fresh food. Better life. Stronger future.
                </div>

            </div>

        </div>

    </div>

</footer>


<!-- =========================================================
     BACK TO TOP
========================================================= -->

<button class="back-top" id="backTop">
    <i class="bi bi-arrow-up"></i>
</button>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>

    /* PAGE LOADER */

    window.addEventListener("load", function () {
        setTimeout(function () {
            document.getElementById("loader").classList.add("hide");
        }, 500);
    });


    /* NAVBAR SCROLL */

    const header = document.getElementById("mainHeader");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 30) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });


    /* BACK TO TOP */

    const backTop = document.getElementById("backTop");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 500) {
            backTop.classList.add("show");
        } else {
            backTop.classList.remove("show");
        }
    });

    backTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });


    /* SCROLL REVEAL */

    const revealElements = document.querySelectorAll(".reveal");

    const revealObserver = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12 }
    );

    revealElements.forEach(function (element) {
        revealObserver.observe(element);
    });


    /* CLOSE MOBILE NAV */

    document.querySelectorAll(".navbar-nav .nav-link").forEach(function (link) {
        link.addEventListener("click", function () {
            const navbar = document.getElementById("mainNavbar");
            if (navbar.classList.contains("show")) {
                const collapse = bootstrap.Collapse.getInstance(navbar);
                if (collapse) collapse.collapse = collapse.hide();
            }
        });
    });


    /* =========================================================
       DARK MODE CONTROLLER — SAME AS SHOPPAGE
       - Persists via localStorage
       - Detects OS preference on first visit
       - Watches for OS theme changes
    ========================================================= */

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


    /* Initial theme */

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


    /* OS theme change listener */

    mediaQuery.addEventListener('change', function (event) {
        const stored = localStorage.getItem('farmfresh-theme');
        if (stored !== 'dark' && stored !== 'light') {
            applyTheme(event.matches ? 'dark' : 'light');
        }
    });

</script>


</body>

</html>