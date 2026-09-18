<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Your Cart — Farm Fresh</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --green-950: #10281a;
            --green-900: #163722;
            --green-800: #1c4a2b;
            --green-700: #28613a;
            --green-600: #37834c;
            --green-100: #eaf5ed;
            --green-50: #f4faf5;
            --orange: #e47732;
            --orange-dark: #c95c1c;
            --orange-light: #fff1e7;
            --cream: #fbfaf7;
            --white: #ffffff;
            --text: #172019;
            --text-soft: #68736c;
            --text-muted: #929b95;
            --border: #e8ece8;
            --border-dark: #dce3dd;
            --danger: #dc3545;
            --shadow-md: 0 15px 45px rgba(16, 40, 26, .08);
            --shadow-lg: 0 25px 70px rgba(16, 40, 26, .13);
            --radius-lg: 26px;
            --radius-xl: 34px;

            /* Component surfaces — light defaults */
            --header-bg: rgba(255,255,255,.91);
            --card-bg: rgba(255,255,255,.94);
            --card-header-bg: linear-gradient(180deg, #fff, #fcfdfc);
            --cart-item-hover: #fcfefc;
            --input-bg: #fff;
            --trust-bg: #fff;
            --empty-bg: rgba(255,255,255,.92);
            --modal-footer-bg: #fafcfb;
            --order-preview-bg: var(--green-50);
            --order-preview-border: #deeadf;
            --receipt-paper-bg: #fff;
            --receipt-modal-bg: #eef1ee;
            --receipt-customer-box: #f7f9f7;
            --receipt-table-border: #f1f3f1;
            --cod-bg: #fff8e9;
            --cod-border: #f4e1b8;
            --cod-text: #8a6720;
            --shipping-message-bg: var(--orange-light);
            --shipping-message-text: #9a4d20;
            --clear-hover-bg: #fff0f1;
            --remove-hover-bg: #fff0f1;
            --btn-checkout-shadow: 0 12px 25px rgba(22,55,34,.20);
            --body-bg:
                radial-gradient(circle at 10% 0%, rgba(55,131,76,.08), transparent 30%),
                radial-gradient(circle at 100% 10%, rgba(228,119,50,.07), transparent 25%),
                var(--cream);
        }

        /* =========================================================
           DARK THEME — added without changing light code
        ========================================================= */
        [data-theme="dark"] {
            --green-950: #eef8f1;
            --green-900: #d8f0de;
            --green-800: #a8dfb5;
            --green-700: #7dd49a;
            --green-600: #5cc27d;
            --green-100: rgba(125,212,154,.14);
            --green-50: rgba(125,212,154,.06);
            --orange: #ffa66b;
            --orange-dark: #f59852;
            --orange-light: rgba(255,166,107,.14);
            --cream: #060d09;
            --white: #0d1a12;
            --text: #eaf5ee;
            --text-soft: #8ba394;
            --text-muted: #5b7466;
            --border: rgba(125,212,154,.10);
            --border-dark: rgba(125,212,154,.18);
            --danger: #ff6b8e;
            --shadow-md: 0 15px 45px rgba(0,0,0,.55);
            --shadow-lg: 0 25px 70px rgba(0,0,0,.7);

            --header-bg: rgba(6,13,9,.75);
            --card-bg: rgba(13,26,18,.72);
            --card-header-bg: linear-gradient(180deg, rgba(18,43,28,.9), rgba(13,26,18,.85));
            --cart-item-hover: rgba(125,212,154,.04);
            --input-bg: rgba(6,13,9,.7);
            --trust-bg: rgba(13,26,18,.6);
            --empty-bg: rgba(13,26,18,.72);
            --modal-footer-bg: rgba(6,13,9,.6);
            --order-preview-bg: rgba(18,43,28,.6);
            --order-preview-border: rgba(125,212,154,.15);
            --receipt-paper-bg: #0f1f15;
            --receipt-modal-bg: #050b07;
            --receipt-customer-box: rgba(18,43,28,.6);
            --receipt-table-border: rgba(125,212,154,.08);
            --cod-bg: rgba(255,166,107,.08);
            --cod-border: rgba(255,166,107,.2);
            --cod-text: #ffc59a;
            --shipping-message-bg: rgba(255,166,107,.12);
            --shipping-message-text: #ffc59a;
            --clear-hover-bg: rgba(255,107,142,.1);
            --remove-hover-bg: rgba(255,107,142,.1);
            --btn-checkout-shadow: 0 12px 30px rgba(0,0,0,.5);
            --body-bg:
                radial-gradient(ellipse 80% 50% at 50% -10%, rgba(125,212,154,.10), transparent 60%),
                radial-gradient(ellipse 60% 45% at 100% 100%, rgba(255,166,107,.08), transparent 60%),
                radial-gradient(ellipse 50% 40% at 0% 60%, rgba(125,212,154,.05), transparent 60%),
                #060d09;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--body-bg);
            min-height: 100vh;
            transition: background .8s cubic-bezier(0.22, 1, 0.36, 1),
                        color .5s ease;
        }

        /* Dark ambient starfield */
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

        a { text-decoration: none; }
        button, input, textarea { font-family: inherit; }

        /* Smooth transitions on everything */
        *, *::before, *::after {
            transition:
                background-color .55s cubic-bezier(0.22, 1, 0.36, 1),
                border-color .5s cubic-bezier(0.22, 1, 0.36, 1),
                color .5s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow .55s cubic-bezier(0.22, 1, 0.36, 1),
                transform .4s cubic-bezier(0.22, 1, 0.36, 1),
                opacity .4s ease;
        }

        /* ===================== HEADER ===================== */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: var(--header-bg);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--border);
            transition: background .6s ease, border-color .6s ease, box-shadow .4s ease;
        }
        .main-header.scrolled {
            box-shadow: 0 8px 35px rgba(16,40,26,.08);
        }
        [data-theme="dark"] .main-header.scrolled {
            box-shadow: 0 8px 35px rgba(0,0,0,.5);
        }

        .navbar { min-height: 76px; }

        .brand { display: flex; align-items: center; gap: 12px; }

        .brand-logo {
            width: 48px; height: 48px;
            border-radius: 15px;
            object-fit: cover;
            background: var(--green-50);
            padding: 5px;
            border: 1px solid var(--border);
            transition: filter .5s ease, border-color .5s ease, background .5s ease;
        }
        [data-theme="dark"] .brand-logo {
            filter: brightness(.9) saturate(1.15) drop-shadow(0 0 10px rgba(255,166,107,.25));
            border-color: rgba(125,212,154,.15);
        }

        .brand-text { line-height: 1; }
        .brand-name {
            font-family: 'Playfair Display', serif;
            color: var(--green-950);
            font-size: 21px;
            font-weight: 700;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .brand-name {
            text-shadow: 0 0 20px rgba(125,212,154,.15);
        }
        .brand-subtitle {
            display: block;
            color: var(--text-muted);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-top: 5px;
            transition: color .5s ease;
        }

        .navbar-toggler {
            border: 0;
            width: 44px; height: 44px;
            border-radius: 12px;
            background: var(--green-50);
            color: var(--green-900);
            transition: background .4s ease, color .4s ease;
        }
        [data-theme="dark"] .navbar-toggler {
            background: rgba(125,212,154,.1);
            color: #a8dfb5;
        }

        .nav-link {
            color: var(--text-soft) !important;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 15px !important;
            border-radius: 10px;
            transition: background .35s ease, color .35s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--green-800) !important;
            background: var(--green-50);
        }
        [data-theme="dark"] .nav-link:hover,
        [data-theme="dark"] .nav-link.active {
            color: #ffa66b !important;
            background: rgba(255,166,107,.08);
        }

        /* Cart button */
        .header-cart {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px; height: 44px;
            border-radius: 14px;
            background: var(--green-900);
            color: white;
            transition: background .5s ease, box-shadow .5s ease, transform .3s ease;
        }
        [data-theme="dark"] .header-cart {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 6px 20px rgba(63,129,85,.4), 0 0 25px rgba(63,129,85,.2);
        }
        [data-theme="dark"] .header-cart:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 10px 30px rgba(255,166,107,.5), 0 0 40px rgba(255,166,107,.3);
            transform: translateY(-2px);
        }
        .header-cart i { font-size: 18px; }

        .cart-badge {
            position: absolute;
            right: -5px; top: -6px;
            min-width: 20px; height: 20px;
            padding: 0 5px;
            border-radius: 100px;
            display: flex;
            align-items: center; justify-content: center;
            background: var(--orange);
            color: white;
            border: 2px solid var(--white);
            font-size: 9px;
            font-weight: 800;
            transition: background .5s ease, border-color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .cart-badge {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            border-color: #060d09;
            box-shadow: 0 0 15px rgba(255,166,107,.7);
        }

        /* ===================== THEME TOGGLE ===================== */
        .theme-toggle-btn {
            width: 44px; height: 44px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 14px !important;
            background: var(--green-50);
            color: var(--green-800) !important;
            font-size: 17px !important;
            padding: 0 !important;
            cursor: pointer;
            transition: background .4s ease, border-color .4s ease, color .4s ease, transform .3s ease, box-shadow .4s ease;
        }
        .theme-toggle-btn:hover {
            background: var(--orange-light);
            color: var(--orange) !important;
            border-color: var(--orange);
            transform: rotate(15deg) scale(1.05);
        }
        [data-theme="dark"] .theme-toggle-btn {
            background: rgba(255,166,107,.1);
            border-color: rgba(255,166,107,.3);
            color: #ffa66b !important;
            box-shadow: 0 0 20px rgba(255,166,107,.2), inset 0 0 12px rgba(255,166,107,.05);
        }
        [data-theme="dark"] .theme-toggle-btn:hover {
            background: rgba(255,166,107,.2);
            box-shadow: 0 0 30px rgba(255,166,107,.45), inset 0 0 18px rgba(255,166,107,.1);
            transform: rotate(-15deg) scale(1.08);
        }

        /* ===================== PAGE ===================== */
        .page-container {
            max-width: 1240px;
            margin: auto;
            padding: 45px 20px 90px;
            position: relative;
            z-index: 1;
        }
        .page-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--green-700);
            background: var(--green-100);
            border-radius: 100px;
            padding: 7px 12px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.1px;
            text-transform: uppercase;
            margin-bottom: 10px;
            transition: background .5s ease, color .5s ease;
        }
        [data-theme="dark"] .eyebrow {
            background: rgba(125,212,154,.12);
            color: #a8dfb5;
        }
        .eyebrow-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green-600);
            transition: background .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .eyebrow-dot {
            background: #7dd49a;
            box-shadow: 0 0 10px rgba(125,212,154,.6);
        }
        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 5vw, 48px);
            line-height: 1;
            letter-spacing: -1.5px;
            color: var(--green-950);
            margin: 0;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .page-title {
            text-shadow: 0 0 40px rgba(125,212,154,.1);
        }
        .page-description {
            color: var(--text-soft);
            margin: 12px 0 0;
            font-size: 14px;
        }
        .clear-cart-btn {
            border: 0;
            background: transparent;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 10px;
            transition: background .3s ease, color .3s ease;
        }
        .clear-cart-btn:hover {
            color: var(--danger);
            background: var(--clear-hover-bg);
        }
        [data-theme="dark"] .clear-cart-btn:hover {
            background: rgba(255,107,142,.12);
        }

        /* ===================== STEPS ===================== */
        .checkout-steps {
            display: flex;
            align-items: center;
            gap: 0;
            margin-bottom: 30px;
            max-width: 650px;
        }
        .step {
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
            font-size: 11px;
            font-weight: 800;
            color: var(--text-muted);
            transition: color .4s ease;
        }
        .step.active { color: var(--green-800); }
        [data-theme="dark"] .step.active { color: #ffa66b; }
        .step-number {
            width: 29px; height: 29px;
            border-radius: 50%;
            display: flex;
            align-items: center; justify-content: center;
            background: var(--border);
            color: var(--text-muted);
            font-size: 11px;
            font-weight: 800;
            transition: background .4s ease, color .4s ease, box-shadow .4s ease;
        }
        [data-theme="dark"] .step-number {
            background: rgba(125,212,154,.08);
            color: #5b7466;
        }
        .step.active .step-number {
            color: white;
            background: var(--green-800);
            box-shadow: 0 5px 15px rgba(40,97,58,.22);
        }
        [data-theme="dark"] .step.active .step-number {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 5px 20px rgba(63,129,85,.5), 0 0 25px rgba(63,129,85,.25);
        }
        .step-line {
            flex: 1;
            height: 1px;
            background: var(--border-dark);
            margin: 0 12px;
            min-width: 30px;
            transition: background .5s ease;
        }
        [data-theme="dark"] .step-line {
            background: linear-gradient(90deg, transparent, rgba(125,212,154,.2), transparent);
        }

        /* ===================== CART CARD ===================== */
        .cart-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: background .6s ease, border-color .6s ease, box-shadow .6s ease;
        }
        [data-theme="dark"] .cart-card {
            backdrop-filter: blur(15px);
            box-shadow: 0 15px 50px rgba(0,0,0,.6), inset 0 1px 0 rgba(125,212,154,.06);
        }
        .cart-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 21px 24px;
            border-bottom: 1px solid var(--border);
            background: var(--card-header-bg);
            transition: background .6s ease, border-color .6s ease;
        }
        .cart-card-header-title {
            font-size: 14px;
            font-weight: 800;
            color: var(--green-950);
            transition: color .5s ease;
        }
        .cart-card-header-count {
            color: var(--text-muted);
            font-size: 11px;
            font-weight: 600;
            transition: color .5s ease;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 92px minmax(160px,1fr) auto 110px 30px;
            align-items: center;
            gap: 20px;
            padding: 21px 24px;
            border-bottom: 1px solid var(--border);
            transition: background .4s ease, border-color .4s ease;
        }
        .cart-item:last-child { border-bottom: 0; }
        .cart-item:hover { background: var(--cart-item-hover); }

        .product-image-wrap {
            width: 92px; height: 92px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--green-50), var(--green-100));
            overflow: hidden;
            position: relative;
            border: 1px solid var(--border);
            transition: background .5s ease, border-color .5s ease;
        }
        [data-theme="dark"] .product-image-wrap {
            background: linear-gradient(135deg, #08150e, #0d1f15);
        }
        .cart-item-img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: filter .5s ease, transform .5s ease;
        }
        [data-theme="dark"] .cart-item-img {
            filter: brightness(.85) contrast(1.1) saturate(1.1);
        }
        .fresh-label {
            position: absolute;
            left: 8px; bottom: 8px;
            background: rgba(255,255,255,.93);
            backdrop-filter: blur(8px);
            border-radius: 7px;
            padding: 4px 7px;
            color: var(--green-800);
            font-size: 7px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .6px;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .fresh-label {
            background: rgba(13,26,18,.85);
            color: #a8dfb5;
            box-shadow: 0 4px 15px rgba(0,0,0,.5), inset 0 1px 0 rgba(125,212,154,.1);
        }

        .product-info { min-width: 0; }
        .product-category {
            color: var(--green-600);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 5px;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .product-category {
            color: #7dd49a;
            text-shadow: 0 0 10px rgba(125,212,154,.3);
        }
        .cart-item-name {
            color: var(--green-950);
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: color .5s ease;
        }
        .cart-item-price {
            color: var(--text-soft);
            font-size: 12px;
            font-weight: 600;
        }
        .unit-label { color: var(--text-muted); font-size: 10px; }

        .qty-control {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 4px;
            border: 1px solid var(--border-dark);
            border-radius: 100px;
            background: var(--white);
            transition: background .5s ease, border-color .5s ease;
        }
        [data-theme="dark"] .qty-control {
            background: rgba(6,13,9,.6);
            border-color: rgba(125,212,154,.18);
        }
        .qty-btn {
            width: 31px; height: 31px;
            border: 0;
            border-radius: 50%;
            display: flex;
            align-items: center; justify-content: center;
            background: transparent;
            color: var(--green-800);
            font-size: 13px;
            transition: background .3s ease, color .3s ease, box-shadow .3s ease;
        }
        .qty-btn:hover {
            color: white;
            background: var(--green-800);
        }
        [data-theme="dark"] .qty-btn {
            color: #7dd49a;
        }
        [data-theme="dark"] .qty-btn:hover {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 0 20px rgba(63,129,85,.4);
        }
        .qty-value {
            min-width: 32px;
            text-align: center;
            color: var(--green-950);
            font-size: 12px;
            font-weight: 800;
            transition: color .5s ease;
        }

        .item-subtotal-label {
            color: var(--text-muted);
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 3px;
        }
        .cart-item-subtotal {
            color: var(--green-800);
            font-size: 16px;
            font-weight: 800;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .cart-item-subtotal {
            color: #a8dfb5;
            text-shadow: 0 0 15px rgba(125,212,154,.3);
        }

        .btn-remove {
            width: 30px; height: 30px;
            border: 0;
            border-radius: 9px;
            display: flex;
            align-items: center; justify-content: center;
            color: var(--text-muted);
            background: transparent;
            transition: background .3s ease, color .3s ease, transform .3s ease;
        }
        .btn-remove:hover {
            color: var(--danger);
            background: var(--remove-hover-bg);
            transform: rotate(90deg);
        }
        [data-theme="dark"] .btn-remove:hover {
            background: rgba(255,107,142,.12);
        }

        .continue-shopping {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
            color: var(--green-800);
            font-size: 12px;
            font-weight: 800;
            transition: color .3s ease, gap .3s ease;
        }
        .continue-shopping:hover {
            color: var(--orange);
            gap: 12px;
        }
        [data-theme="dark"] .continue-shopping {
            color: #a8dfb5;
        }
        [data-theme="dark"] .continue-shopping:hover {
            color: #ffa66b;
            text-shadow: 0 0 15px rgba(255,166,107,.5);
        }

        /* ===================== SUMMARY ===================== */
        .summary-card { position: sticky; top: 105px; padding: 26px; }
        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            color: var(--green-950);
            margin: 0 0 5px;
            transition: color .5s ease;
        }
        .summary-subtitle {
            color: var(--text-muted);
            font-size: 11px;
            margin-bottom: 25px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            color: var(--text-soft);
            font-size: 12px;
            margin-bottom: 15px;
        }
        .summary-row strong { color: var(--text); }

        .free-shipping {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 8px;
            border-radius: 100px;
            background: var(--green-100);
            color: var(--green-700);
            font-size: 9px;
            font-weight: 800;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .free-shipping {
            background: rgba(125,212,154,.12);
            color: #a8dfb5;
            box-shadow: 0 0 15px rgba(125,212,154,.15);
        }

        .shipping-message {
            display: flex;
            gap: 9px;
            padding: 12px;
            margin: 20px 0;
            border-radius: 13px;
            background: var(--shipping-message-bg);
            color: var(--shipping-message-text);
            font-size: 10px;
            line-height: 1.5;
            transition: background .5s ease, color .5s ease;
        }
        .shipping-message i {
            color: var(--orange);
            font-size: 14px;
            transition: color .5s ease, filter .5s ease;
        }
        [data-theme="dark"] .shipping-message i {
            color: #ffa66b;
            filter: drop-shadow(0 0 6px rgba(255,166,107,.5));
        }

        .summary-divider {
            border-top: 1px dashed var(--border-dark);
            margin: 21px 0;
            transition: border-color .5s ease;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .total-label {
            font-size: 13px;
            font-weight: 800;
            color: var(--green-950);
            transition: color .5s ease;
        }
        .total-small {
            display: block;
            color: var(--text-muted);
            font-size: 9px;
            font-weight: 500;
            margin-top: 3px;
        }
        .total-price {
            color: var(--green-800);
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .total-price {
            color: #a8dfb5;
            text-shadow: 0 0 25px rgba(125,212,154,.4);
        }

        .btn-checkout {
            position: relative;
            width: 100%;
            margin-top: 22px;
            padding: 15px 20px;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--green-900), var(--green-700));
            color: white;
            font-size: 13px;
            font-weight: 800;
            box-shadow: var(--btn-checkout-shadow);
            transition: transform .3s ease, box-shadow .4s ease, background .5s ease;
        }
        .btn-checkout:hover {
            color: white;
            transform: translateY(-2px);
        }
        [data-theme="dark"] .btn-checkout {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 12px 35px rgba(63,129,85,.45), 0 0 40px rgba(63,129,85,.2), inset 0 1px 0 rgba(255,255,255,.12);
        }
        [data-theme="dark"] .btn-checkout:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 16px 40px rgba(255,166,107,.5), 0 0 55px rgba(255,166,107,.3), inset 0 1px 0 rgba(255,255,255,.2);
        }

        .secure-checkout {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            font-size: 9px;
            margin-top: 13px;
        }
        .secure-checkout i {
            color: var(--green-600);
            transition: color .5s ease, filter .5s ease;
        }
        [data-theme="dark"] .secure-checkout i {
            color: #7dd49a;
            filter: drop-shadow(0 0 6px rgba(125,212,154,.5));
        }

        .trust-grid {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 8px;
            margin-top: 22px;
        }
        .trust-card {
            text-align: center;
            padding: 12px 5px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--trust-bg);
            transition: background .5s ease, border-color .5s ease, transform .3s ease, box-shadow .4s ease;
        }
        [data-theme="dark"] .trust-card {
            background: rgba(13,26,18,.5);
            border-color: rgba(125,212,154,.1);
        }
        [data-theme="dark"] .trust-card:hover {
            border-color: rgba(255,166,107,.3);
            box-shadow: 0 0 25px rgba(255,166,107,.15);
            transform: translateY(-2px);
        }
        .trust-card i {
            display: block;
            color: var(--green-700);
            font-size: 16px;
            margin-bottom: 5px;
            transition: color .5s ease, filter .5s ease;
        }
        [data-theme="dark"] .trust-card i {
            color: #7dd49a;
            filter: drop-shadow(0 0 6px rgba(125,212,154,.4));
        }
        .trust-card span {
            color: var(--text-muted);
            font-size: 8px;
            font-weight: 700;
            line-height: 1.3;
        }

        /* ===================== EMPTY CART ===================== */
        .empty-cart {
            max-width: 700px;
            margin: 35px auto;
            padding: 70px 25px;
            text-align: center;
            border-radius: var(--radius-xl);
            background: var(--empty-bg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
            transition: background .6s ease, border-color .6s ease, box-shadow .6s ease;
        }
        .empty-cart::before {
            content: "";
            position: absolute;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: var(--green-50);
            top: -130px; left: -100px;
            transition: background .6s ease;
        }
        .empty-cart::after {
            content: "";
            position: absolute;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: var(--orange-light);
            bottom: -100px; right: -70px;
            transition: background .6s ease;
        }
        [data-theme="dark"] .empty-cart::before {
            background: rgba(125,212,154,.06);
        }
        [data-theme="dark"] .empty-cart::after {
            background: rgba(255,166,107,.06);
        }
        .empty-icon {
            position: relative; z-index: 1;
            width: 95px; height: 95px;
            margin: 0 auto 22px;
            border-radius: 30px;
            display: flex;
            align-items: center; justify-content: center;
            color: var(--green-800);
            background: var(--green-100);
            font-size: 40px;
            transition: background .6s ease, color .6s ease, box-shadow .6s ease;
        }
        [data-theme="dark"] .empty-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow: 0 0 40px rgba(125,212,154,.2), inset 0 0 20px rgba(125,212,154,.08);
        }
        .empty-title {
            position: relative; z-index: 1;
            font-family: 'Playfair Display', serif;
            color: var(--green-950);
            font-size: 29px;
            margin-bottom: 10px;
            transition: color .5s ease;
        }
        .empty-description {
            position: relative; z-index: 1;
            color: var(--text-soft);
            font-size: 13px;
            max-width: 440px;
            margin: 0 auto 25px;
            line-height: 1.7;
        }
        .btn-shop {
            position: relative; z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 22px;
            border-radius: 100px;
            background: var(--green-900);
            color: white;
            font-size: 12px;
            font-weight: 800;
            transition: background .5s ease, box-shadow .5s ease, transform .3s ease;
        }
        .btn-shop:hover {
            color: white;
            background: var(--green-700);
            transform: translateY(-2px);
        }
        [data-theme="dark"] .btn-shop {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 8px 25px rgba(63,129,85,.4), 0 0 30px rgba(63,129,85,.2);
        }
        [data-theme="dark"] .btn-shop:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 12px 35px rgba(255,166,107,.5), 0 0 45px rgba(255,166,107,.3);
        }

        /* ===================== CHECKOUT MODAL ===================== */
        .modal-backdrop.show { opacity: .72; }
        [data-theme="dark"] .modal-backdrop.show { opacity: .85; }

        .modal-content {
            border: 0;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 30px 100px rgba(0,0,0,.20);
            background: var(--white);
            transition: background .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .modal-content {
            background: #0d1a12;
            border: 1px solid rgba(125,212,154,.12);
            box-shadow: 0 30px 100px rgba(0,0,0,.85), 0 0 60px rgba(125,212,154,.08);
        }

        .checkout-modal-header {
            padding: 24px 28px;
            background: linear-gradient(135deg, var(--green-950), var(--green-800));
            color: white;
            position: relative;
            overflow: hidden;
            transition: background .6s ease;
        }
        [data-theme="dark"] .checkout-modal-header {
            background: linear-gradient(135deg, #0b2415, #1b4a2e);
        }
        .modal-eyebrow {
            color: #a9d9b2;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }
        .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            margin-top: 5px;
        }
        .modal-subtitle {
            color: rgba(255,255,255,.68);
            font-size: 11px;
        }
        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: .7;
        }

        .modal-body { padding: 28px; }
        [data-theme="dark"] .modal-body {
            background: #0d1a12;
        }

        .form-section-title {
            color: var(--green-950);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 16px;
            transition: color .5s ease;
        }
        .form-label {
            color: var(--text-soft);
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 6px;
            transition: color .5s ease;
        }
        .form-control {
            border: 1px solid var(--border-dark);
            border-radius: 11px;
            padding: 11px 13px;
            color: var(--text);
            font-size: 12px;
            background: var(--input-bg);
            transition: background .5s ease, border-color .4s ease, color .5s ease, box-shadow .4s ease;
        }
        [data-theme="dark"] .form-control {
            background: rgba(6,13,9,.7);
            border-color: rgba(125,212,154,.15);
            color: #eaf5ee;
        }
        [data-theme="dark"] .form-control::placeholder {
            color: #5b7466;
        }
        .form-control:focus {
            border-color: var(--green-600);
            box-shadow: 0 0 0 4px rgba(55,131,76,.10);
            background: var(--input-bg);
            color: var(--text);
        }
        [data-theme="dark"] .form-control:focus {
            border-color: #7dd49a;
            box-shadow: 0 0 0 4px rgba(125,212,154,.12), 0 0 25px rgba(125,212,154,.25);
            background: rgba(6,13,9,.95);
        }

        .input-group-text {
            border: 1px solid var(--border-dark);
            border-right: 0;
            background: var(--green-50);
            color: var(--green-700);
            border-radius: 11px 0 0 11px;
            transition: background .5s ease, border-color .5s ease, color .5s ease;
        }
        [data-theme="dark"] .input-group-text {
            background: rgba(125,212,154,.06);
            border-color: rgba(125,212,154,.15);
            color: #a8dfb5;
        }
        .input-group .form-control {
            border-left: 0;
            border-radius: 0 11px 11px 0;
        }

        .order-preview {
            height: 100%;
            padding: 22px;
            border-radius: 18px;
            background: var(--order-preview-bg);
            border: 1px solid var(--order-preview-border);
            transition: background .5s ease, border-color .5s ease;
        }
        .preview-title {
            font-family: 'Playfair Display', serif;
            color: var(--green-950);
            font-size: 21px;
            margin-bottom: 18px;
            transition: color .5s ease;
        }
        .preview-row {
            display: flex;
            justify-content: space-between;
            color: var(--text-soft);
            font-size: 11px;
            margin-bottom: 12px;
        }
        .preview-row strong { color: var(--text); }

        .preview-total {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-top: 17px;
            border-top: 1px dashed var(--border-dark);
            margin-top: 18px;
            transition: border-color .5s ease;
        }
        .preview-total span:first-child {
            color: var(--green-950);
            font-size: 12px;
            font-weight: 800;
            transition: color .5s ease;
        }
        .preview-total-value {
            color: var(--green-800);
            font-size: 25px;
            font-weight: 800;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .preview-total-value {
            color: #a8dfb5;
            text-shadow: 0 0 20px rgba(125,212,154,.3);
        }

        .cod-box {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            margin-top: 20px;
            padding: 11px;
            border-radius: 11px;
            background: var(--cod-bg);
            border: 1px solid var(--cod-border);
            color: var(--cod-text);
            font-size: 9px;
            line-height: 1.5;
            transition: background .5s ease, border-color .5s ease, color .5s ease;
        }
        .cod-box i {
            color: #c18a20;
            font-size: 14px;
            transition: color .5s ease, filter .5s ease;
        }
        [data-theme="dark"] .cod-box i {
            color: #ffa66b;
            filter: drop-shadow(0 0 6px rgba(255,166,107,.5));
        }

        .modal-footer {
            padding: 17px 28px;
            border-top: 1px solid var(--border);
            background: var(--modal-footer-bg);
            transition: background .5s ease, border-color .5s ease;
        }
        .btn-cancel {
            border: 1px solid var(--border-dark);
            background: var(--white);
            color: var(--text-soft);
            border-radius: 100px;
            padding: 11px 20px;
            font-size: 11px;
            font-weight: 800;
            transition: background .4s ease, border-color .4s ease, color .4s ease;
        }
        [data-theme="dark"] .btn-cancel {
            background: rgba(6,13,9,.6);
            border-color: rgba(125,212,154,.2);
            color: #8ba394;
        }
        [data-theme="dark"] .btn-cancel:hover {
            background: rgba(125,212,154,.1);
            border-color: rgba(125,212,154,.4);
            color: #eaf5ee;
        }
        .btn-place-order {
            border: 0;
            border-radius: 100px;
            background: var(--green-900);
            color: white;
            padding: 11px 22px;
            font-size: 11px;
            font-weight: 800;
            transition: background .5s ease, box-shadow .5s ease, transform .3s ease;
        }
        .btn-place-order:hover {
            background: var(--green-700);
            color: white;
            transform: translateY(-1px);
        }
        [data-theme="dark"] .btn-place-order {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 6px 20px rgba(63,129,85,.4), 0 0 25px rgba(63,129,85,.2);
        }
        [data-theme="dark"] .btn-place-order:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 10px 30px rgba(255,166,107,.5), 0 0 40px rgba(255,166,107,.3);
        }

        /* ===================== RECEIPT ===================== */
        .receipt-modal .modal-content {
            background: var(--receipt-modal-bg);
            transition: background .6s ease;
        }
        .receipt-body { padding: 10px; }
        .receipt-paper {
            max-width: 800px;
            margin: auto;
            background: var(--receipt-paper-bg);
            border-radius: 4px;
            padding: 38px;
            box-shadow: 0 15px 50px rgba(0,0,0,.08);
            transition: background .6s ease, box-shadow .6s ease, color .5s ease;
        }
        [data-theme="dark"] .receipt-paper {
            box-shadow: 0 15px 60px rgba(0,0,0,.7), 0 0 40px rgba(125,212,154,.06);
            border: 1px solid rgba(125,212,154,.08);
        }
        .receipt-brand {
            font-family: 'Playfair Display', serif;
            color: var(--green-950);
            font-size: 30px;
            font-weight: 700;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .receipt-brand {
            text-shadow: 0 0 30px rgba(125,212,154,.15);
        }
        .waiting-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 100px;
            color: #9a6817;
            background: #fff5d8;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .6px;
            text-transform: uppercase;
            transition: background .5s ease, color .5s ease;
        }
        [data-theme="dark"] .waiting-badge {
            background: rgba(255,166,107,.12);
            color: #ffc59a;
            box-shadow: 0 0 20px rgba(255,166,107,.2);
        }
        .receipt-reference { text-align: right; }
        .receipt-reference small {
            display: block;
            color: var(--text-muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .8px;
        }
        .receipt-reference strong {
            color: var(--green-950);
            font-family: monospace;
            font-size: 13px;
            transition: color .5s ease;
        }
        .receipt-meta {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 12px 0;
            margin: 22px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            color: var(--text-soft);
            font-size: 12px;
            transition: border-color .5s ease, color .5s ease;
        }
        .receipt-meta strong { color: var(--text); }

        .customer-box {
            padding: 16px;
            background: var(--receipt-customer-box);
            border-radius: 12px;
            margin-bottom: 25px;
            transition: background .5s ease;
        }
        .customer-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 5px;
        }
        .customer-name {
            color: var(--green-950);
            font-size: 12px;
            font-weight: 800;
            transition: color .5s ease;
        }
        .customer-detail {
            color: var(--text-soft);
            font-size: 12px;
            margin-top: 2px;
        }

        .receipt-table { width: 100%; border-collapse: collapse; }
        .receipt-table th {
            padding: 9px 0;
            border-bottom: 1px solid var(--border);
            color: var(--text-muted);
            font-size: 8px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
            transition: border-color .5s ease, color .5s ease;
        }
        .receipt-table td {
            padding: 11px 0;
            border-bottom: 1px solid var(--receipt-table-border);
            color: var(--text-soft);
            font-size: 14px;
            transition: border-color .5s ease, color .5s ease;
        }
        .receipt-table td:first-child {
            color: var(--text);
            font-weight: 700;
        }

        .receipt-total {
            display: flex;
            justify-content: flex-end;
            gap: 30px;
            padding-top: 18px;
            font-weight: 800;
            color: var(--green-950);
            transition: color .5s ease;
        }
        .receipt-total-value {
            color: var(--green-800);
            font-size: 18px;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .receipt-total-value {
            color: #a8dfb5;
            text-shadow: 0 0 15px rgba(125,212,154,.3);
        }

        .receipt-footer {
            text-align: center;
            border-top: 1px dashed var(--border-dark);
            margin-top: 25px;
            padding-top: 20px;
            color: var(--text-muted);
            font-size: 9px;
            transition: border-color .5s ease, color .5s ease;
        }
        .waiting-icon {
            width: 40px; height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center; justify-content: center;
            margin: 0 auto 8px;
            background: #fff5d8;
            color: #b47b15;
            animation: pulseWaiting 1.8s infinite;
            transition: background .5s ease, color .5s ease;
        }
        [data-theme="dark"] .waiting-icon {
            background: rgba(255,166,107,.12);
            color: #ffc59a;
        }
        @keyframes pulseWaiting {
            0%, 100% { box-shadow: 0 0 0 0 rgba(180,123,21,.18); }
            50% { box-shadow: 0 0 0 10px rgba(180,123,21,0); }
        }

        /* ===================== MOBILE CHECKOUT ===================== */
        .mobile-checkout {
            display: none;
            position: fixed;
            left: 12px; right: 12px; bottom: 12px;
            z-index: 1000;
            padding: 10px 12px;
            border-radius: 18px;
            background: var(--card-bg);
            backdrop-filter: blur(18px);
            box-shadow: 0 15px 50px rgba(0,0,0,.18);
            border: 1px solid var(--border);
            transition: background .5s ease, border-color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .mobile-checkout {
            background: rgba(13,26,18,.92);
            border-color: rgba(125,212,154,.15);
            box-shadow: 0 15px 50px rgba(0,0,0,.6), 0 0 30px rgba(125,212,154,.1);
        }
        .mobile-total {
            color: var(--green-950);
            font-size: 9px;
            font-weight: 700;
            transition: color .5s ease;
        }
        .mobile-total strong {
            display: block;
            font-size: 17px;
            color: var(--green-800);
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .mobile-total strong {
            color: #a8dfb5;
            text-shadow: 0 0 15px rgba(125,212,154,.4);
        }
        .mobile-checkout-btn {
            border: 0;
            border-radius: 13px;
            background: var(--green-900);
            color: white;
            padding: 12px 17px;
            font-size: 11px;
            font-weight: 800;
            transition: background .5s ease, box-shadow .4s ease;
        }
        [data-theme="dark"] .mobile-checkout-btn {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 6px 20px rgba(63,129,85,.4), 0 0 25px rgba(63,129,85,.2);
        }

        /* =====================================================
           BAKONG QR MODAL
        ===================================================== */
        #qrPaymentModal .modal-dialog { max-width: 920px; }
        #qrPaymentModal .modal-content {
            border: 0;
            border-radius: 28px;
            overflow: hidden;
            background: var(--white);
            box-shadow: 0 30px 80px rgba(16,45,27,.25);
            transition: background .6s ease, box-shadow .6s ease;
        }
        [data-theme="dark"] #qrPaymentModal .modal-content {
            background: #0b1a10;
            border: 1px solid rgba(125,212,154,.15);
            box-shadow: 0 30px 100px rgba(0,0,0,.85), 0 0 80px rgba(125,212,154,.1);
        }
        #qrPaymentModal .modal-body { padding: 0; }

        .bkqr-card {
            display: grid;
            grid-template-columns: 340px 1fr;
            min-height: 540px;
        }

        .bkqr-sidebar {
            position: relative;
            padding: 34px 30px;
            color: white;
            background:
                radial-gradient(circle at 90% 5%, rgba(143,212,157,.18), transparent 28%),
                radial-gradient(circle at 5% 95%, rgba(228,119,50,.14), transparent 30%),
                linear-gradient(145deg, #0b2415, #153a23 55%, #205637);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        [data-theme="dark"] .bkqr-sidebar {
            background:
                radial-gradient(circle at 90% 5%, rgba(143,212,157,.14), transparent 30%),
                radial-gradient(circle at 5% 95%, rgba(228,119,50,.1), transparent 32%),
                linear-gradient(145deg, #061610, #0d2818 55%, #153a23);
        }

        .bkqr-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 36px;
        }
        .bkqr-brand-icon {
            width: 42px; height: 42px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 13px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.13);
            font-size: 19px;
            color: #a8dfb5;
        }
        .bkqr-brand-name {
            font-size: 15px;
            font-weight: 800;
            letter-spacing: -.3px;
            color: #fff;
        }
        .bkqr-brand-sub {
            display: block;
            color: rgba(255,255,255,.48);
            font-size: 8.5px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .bkqr-secure-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 10px;
            border-radius: 100px;
            background: rgba(143,212,157,.10);
            border: 1px solid rgba(143,212,157,.18);
            color: #a8dfb5;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }
        .bkqr-secure-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #72d28b;
            box-shadow: 0 0 0 5px rgba(114,210,139,.10);
            animation: bkqrDotPulse 1.8s infinite;
        }
        @keyframes bkqrDotPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: .55; transform: scale(.8); }
        }

        .bkqr-title {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            line-height: 1.12;
            margin: 0 0 14px;
            letter-spacing: -.8px;
            color: #fff;
        }
        .bkqr-desc {
            color: rgba(255,255,255,.60);
            font-size: 11.5px;
            line-height: 1.7;
            margin: 0 0 26px;
            max-width: 240px;
        }

        .bkqr-steps { margin-bottom: 20px; }
        .bkqr-step {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }
        .bkqr-step-num {
            flex: 0 0 28px;
            width: 28px; height: 28px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            color: rgba(255,255,255,.75);
            font-size: 10px;
            font-weight: 800;
        }
        .bkqr-step-title {
            color: #fff;
            font-size: 10.5px;
            font-weight: 800;
            margin-bottom: 3px;
        }
        .bkqr-step-text {
            color: rgba(255,255,255,.45);
            font-size: 9px;
            line-height: 1.5;
        }

        .bkqr-sidebar-footer {
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.09);
            color: rgba(255,255,255,.35);
            font-size: 9px;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        .bkqr-sidebar-footer i { color: #8bd29b; }

        .bkqr-main {
            padding: 30px 34px 28px;
            background: var(--white);
            text-align: center;
            transition: background .6s ease;
        }
        [data-theme="dark"] .bkqr-main {
            background: #0b1a10;
        }

        .bkqr-main-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .bkqr-label {
            color: var(--text-muted);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }
        .bkqr-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 10px;
            background: var(--green-50);
            color: var(--green-700);
            font-size: 9px;
            font-weight: 800;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-badge {
            background: rgba(125,212,154,.1);
            color: #a8dfb5;
            box-shadow: 0 0 15px rgba(125,212,154,.15);
        }

        .bkqr-amount { margin-bottom: 20px; }
        .bkqr-amount-caption {
            color: var(--text-muted);
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .bkqr-amount-value {
            font-size: 40px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -2px;
            color: var(--green-950);
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-amount-value {
            text-shadow: 0 0 30px rgba(125,212,154,.2);
        }
        .bkqr-currency {
            font-size: 15px;
            font-weight: 800;
            color: var(--green-700);
            margin-left: 5px;
            letter-spacing: 0;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-currency {
            color: #7dd49a;
            text-shadow: 0 0 15px rgba(125,212,154,.4);
        }

        .bkqr-area {
            position: relative;
            display: inline-block;
            margin-bottom: 18px;
        }
        .bkqr-glow {
            position: absolute;
            inset: -25px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(40,115,70,.12), transparent 68%);
            pointer-events: none;
            transition: background .5s ease;
        }
        [data-theme="dark"] .bkqr-glow {
            background: radial-gradient(circle, rgba(125,212,154,.15), transparent 68%);
        }

        .bkqr-box {
            position: relative;
            padding: 14px;
            background: var(--white);
            border-radius: 23px;
            border: 1px solid var(--border);
            box-shadow: 0 18px 45px rgba(16,45,27,.10), 0 3px 10px rgba(16,45,27,.04);
            min-width: 263px;
            min-height: 263px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .6s ease, border-color .6s ease, box-shadow .6s ease;
        }
        [data-theme="dark"] .bkqr-box {
            background: #0f1f15;
            border-color: rgba(125,212,154,.15);
            box-shadow: 0 18px 50px rgba(0,0,0,.7), 0 0 40px rgba(125,212,154,.1);
        }
        .bkqr-box::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 24px;
            border: 2px solid transparent;
            background:
                linear-gradient(var(--white), var(--white)) padding-box,
                linear-gradient(135deg, #287346, #e47732, #287346) border-box;
            pointer-events: none;
            transition: background .6s ease;
        }
        [data-theme="dark"] .bkqr-box::before {
            background:
                linear-gradient(#0f1f15, #0f1f15) padding-box,
                linear-gradient(135deg, #7dd49a, #ffa66b, #7dd49a) border-box;
        }

        #bakongQr {
            position: relative;
            width: 235px;
            height: 235px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        #bakongQr img,
        #bakongQr canvas {
            display: block !important;
            width: 235px !important;
            height: 235px !important;
            max-width: 100%;
            background: white;
            image-rendering: pixelated;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
            -ms-interpolation-mode: nearest-neighbor;
        }

        .bkqr-scan-label {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            color: var(--green-700);
            font-size: 10px;
            font-weight: 800;
            margin-top: 5px;
            transition: color .5s ease, text-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-scan-label {
            color: #7dd49a;
            text-shadow: 0 0 12px rgba(125,212,154,.4);
        }
        .bkqr-scan-label i { font-size: 13px; }

        .bkqr-status {
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
            padding: 12px 15px;
            border-radius: 15px;
            background: var(--green-50);
            border: 1px solid var(--border);
            margin: 0 auto 15px;
            max-width: 400px;
            transition: background .5s ease, border-color .5s ease;
        }
        [data-theme="dark"] .bkqr-status {
            background: rgba(125,212,154,.05);
            border-color: rgba(125,212,154,.1);
        }
        .bkqr-status-icon {
            width: 36px; height: 36px;
            flex: 0 0 36px;
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            color: var(--green-700);
            background: var(--green-100);
            font-size: 15px;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-status-icon {
            background: rgba(125,212,154,.1);
            color: #7dd49a;
            box-shadow: 0 0 15px rgba(125,212,154,.2);
        }
        .bkqr-status-title {
            font-size: 10px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 2px;
            transition: color .5s ease;
        }
        .bkqr-status-text {
            font-size: 9px;
            color: var(--text-muted);
            line-height: 1.4;
            transition: color .5s ease;
        }
        .bkqr-status-loader {
            margin-left: auto;
            width: 13px; height: 13px;
            border-radius: 50%;
            border: 2px solid var(--border);
            border-top-color: var(--green-700);
            animation: bkqrSpin .8s linear infinite;
            transition: border-color .5s ease;
        }
        [data-theme="dark"] .bkqr-status-loader {
            border-color: rgba(125,212,154,.15);
            border-top-color: #7dd49a;
        }
        @keyframes bkqrSpin { to { transform: rotate(360deg); } }

        .bkqr-timer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            color: var(--text-muted);
            font-size: 9px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .bkqr-timer-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 9px;
            background: var(--green-50);
            color: var(--green-950);
            font-size: 10px;
            font-weight: 800;
            min-width: 56px;
            justify-content: center;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-timer-pill {
            background: rgba(125,212,154,.08);
            color: #eaf5ee;
            box-shadow: 0 0 10px rgba(125,212,154,.15);
        }
        .bkqr-timer-pill.warning {
            background: #fff0f1;
            color: var(--danger);
            animation: bkqrTimerWarn 1s infinite;
        }
        [data-theme="dark"] .bkqr-timer-pill.warning {
            background: rgba(255,107,142,.12);
            color: #ff6b8e;
            box-shadow: 0 0 20px rgba(255,107,142,.3);
        }
        @keyframes bkqrTimerWarn {
            0%, 100% { opacity: 1; }
            50% { opacity: .55; }
        }

        .bkqr-info {
            max-width: 430px;
            margin: 0 auto 18px;
            padding: 11px 14px;
            border-radius: 13px;
            background: var(--orange-light);
            border: 1px solid #f5dfcf;
            color: var(--shipping-message-text);
            font-size: 9.5px;
            line-height: 1.55;
            text-align: left;
            display: flex;
            gap: 9px;
            transition: background .5s ease, border-color .5s ease, color .5s ease;
        }
        [data-theme="dark"] .bkqr-info {
            border-color: rgba(255,166,107,.2);
        }
        .bkqr-info i {
            color: var(--orange);
            font-size: 14px;
            flex: 0 0 auto;
            transition: color .5s ease, filter .5s ease;
        }
        [data-theme="dark"] .bkqr-info i {
            color: #ffa66b;
            filter: drop-shadow(0 0 6px rgba(255,166,107,.5));
        }

        .bkqr-confirm {
            position: relative;
            width: 100%;
            max-width: 430px;
            border: 0;
            border-radius: 15px;
            padding: 15px 20px;
            background: linear-gradient(135deg, #12351f, #287346);
            color: white;
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 13px 25px rgba(22,55,34,.20);
            transition: transform .3s ease, box-shadow .4s ease, background .5s ease;
        }
        .bkqr-confirm:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 17px 30px rgba(22,55,34,.27);
        }
        .bkqr-confirm:active { transform: translateY(0); }
        .bkqr-confirm:disabled {
            opacity: .5;
            cursor: not-allowed;
            transform: none;
        }
        [data-theme="dark"] .bkqr-confirm {
            background: linear-gradient(135deg, #2d6b42, #3f8155);
            box-shadow: 0 13px 30px rgba(63,129,85,.5), 0 0 35px rgba(63,129,85,.25);
        }
        [data-theme="dark"] .bkqr-confirm:hover {
            background: linear-gradient(135deg, #f59852, #ffa66b);
            box-shadow: 0 17px 40px rgba(255,166,107,.5), 0 0 50px rgba(255,166,107,.3);
        }

        .bkqr-done {
            width: 100%;
            padding: 13px 20px;
            border-radius: 12px;
            border: 1px solid #dfe7e2;
            background: transparent;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all .25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 10px;
        }

        .bkqr-done:hover {
            background: var(--bg);
            color: var(--green-700);
            border-color: var(--green-700);
        }

        [data-theme="dark"] .bkqr-done {
            background: transparent;
            color: #8ba394;
            border-color: rgba(125,212,154,.15);
        }

        [data-theme="dark"] .bkqr-done:hover {
            background: rgba(125,212,154,.08);
            color: #eaf5ee;
            border-color: #7dd49a;
        }

        .bkqr-expired {
            position: absolute;
            inset: 0;
            background: rgba(247,249,247,.96);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 12px;
            border-radius: 28px;
            z-index: 10;
            padding: 30px;
            text-align: center;
            transition: background .5s ease;
        }
        [data-theme="dark"] .bkqr-expired {
            background: rgba(6,13,9,.96);
        }
        .bkqr-expired.show { display: flex; }
        .bkqr-expired-icon {
            width: 68px; height: 68px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 22px;
            background: #fff0f1;
            color: var(--danger);
            font-size: 27px;
            transition: background .5s ease, color .5s ease, box-shadow .5s ease;
        }
        [data-theme="dark"] .bkqr-expired-icon {
            background: rgba(255,107,142,.12);
            color: #ff6b8e;
            box-shadow: 0 0 30px rgba(255,107,142,.25);
        }
        .bkqr-expired-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: var(--green-950);
            margin: 0 0 6px;
            transition: color .5s ease;
        }
        .bkqr-expired-text {
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.7;
            margin-bottom: 20px;
            max-width: 320px;
        }

        /* ===================== RESPONSIVE ===================== */
        @media (max-width: 991.98px) {
            .page-container { padding-top: 30px; }
            .summary-card { position: static; }
            .trust-grid { margin-bottom: 30px; }

            .cart-item { grid-template-columns: 78px 1fr auto; gap: 14px; }
            .product-image-wrap { width: 78px; height: 78px; }
            .cart-item .qty-control { grid-column: 2; justify-self: start; }
            .cart-item .text-end { grid-column: 3; grid-row: 1 / span 2; }
            .cart-item .btn-remove { position: absolute; right: 15px; top: 15px; }
            .cart-item { position: relative; padding-right: 45px; }

            #qrPaymentModal .modal-dialog { max-width: 560px; }
            .bkqr-card { grid-template-columns: 1fr; min-height: auto; }
            .bkqr-sidebar { padding: 26px 24px; }
            .bkqr-title { font-size: 24px; }
            .bkqr-steps { display: none; }
        }

        @media (max-width: 767.98px) {
            .top-bar { display: none; }
            .navbar { min-height: 68px; }
            .page-container { padding: 25px 13px 100px; }
            .page-heading { align-items: flex-start; margin-bottom: 20px; }
            .page-title { font-size: 34px; }
            .page-description { font-size: 12px; }
            .checkout-steps { margin-bottom: 20px; }
            .step { font-size: 0; }
            .step-number { width: 27px; height: 27px; }
            .step-line { margin: 0 7px; }
            .cart-card { border-radius: 20px; }
            .cart-card-header { padding: 17px; }

            .cart-item {
                grid-template-columns: 65px 1fr;
                padding: 16px;
                gap: 12px;
            }
            .product-image-wrap { width: 65px; height: 65px; border-radius: 13px; }
            .cart-item-name { font-size: 13px; }
            .cart-item-price { font-size: 10px; }
            .cart-item .qty-control { grid-column: 2; margin-top: 4px; }
            .cart-item .text-end {
                position: absolute;
                right: 16px; top: 19px;
                grid-column: unset; grid-row: unset;
            }
            .item-subtotal-label { display: none; }
            .cart-item-subtotal { font-size: 13px; }
            .btn-remove { right: 10px !important; top: 56px !important; width: 25px; height: 25px; }
            .continue-shopping { margin-left: 3px; }
            .summary-card { padding: 20px; }
            .trust-grid { display: none; }
            .mobile-checkout {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
            }
            .desktop-checkout { display: none; }
            .modal-body { padding: 20px; }
            .checkout-modal-header { padding: 20px; }
            .modal-footer { padding: 14px 20px; }
            .receipt-paper { padding: 22px; }
            .receipt-brand { font-size: 23px; }
            .receipt-meta { flex-direction: column; gap: 6px; }

            .bkqr-main { padding: 22px 20px 24px; }
            #bakongQr { width: 200px; height: 200px; }
            #bakongQr img,
            #bakongQr canvas { width: 200px !important; height: 200px !important; }
            .bkqr-box { min-width: 228px; min-height: 228px; }
            .bkqr-amount-value { font-size: 34px; }
            .bkqr-title { font-size: 22px; }
        }

        @media (max-width: 420px) {
            .brand-subtitle { display: none; }
            .brand-name { font-size: 18px; }
            .brand-logo { width: 42px; height: 42px; }
            .header-cart { width: 40px; height: 40px; }
            .page-title { font-size: 31px; }
            .clear-cart-btn { font-size: 10px; }
            .total-price { font-size: 25px; }

            #bakongQr { width: 175px; height: 175px; }
            #bakongQr img,
            #bakongQr canvas { width: 175px !important; height: 175px !important; }
            .bkqr-box { min-width: 203px; min-height: 203px; }
            .bkqr-amount-value { font-size: 30px; }
        }

        /* ===================== PRINT ===================== */
        @media print {
            body { background: white !important; }
            body * { visibility: hidden !important; }
            #receiptModal, #receiptModal * { visibility: visible !important; }
            #receiptModal {
                position: absolute !important;
                left: 0 !important; top: 0 !important;
                width: 100% !important;
                display: block !important;
                background: white !important;
            }
            #receiptModal .modal-dialog { max-width: none !important; margin: 0 !important; }
            #receiptModal .modal-content { box-shadow: none !important; }
            #receiptModal .modal-header,
            #receiptModal .modal-footer,
            .btn-close { display: none !important; }
            .receipt-body { padding: 0 !important; }
            .receipt-paper { box-shadow: none !important; max-width: none !important; padding: 30px !important; }
        }
    </style>
</head>

<body>

<!-- =========================================================
     HEADER
========================================================== -->
<header class="main-header" id="mainHeader">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="{{ route('shoppage') }}" class="brand">
                <img
                    src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                    alt="Farm Fresh"
                    class="brand-logo"
                >
                <div class="brand-text">
                    <div class="brand-name">Farm Fresh</div>
                    <span class="brand-subtitle">ORGANIC PRODUCTS</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <i class="bi bi-list fs-5"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a href="{{ route('homeforclient') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('shoppage') }}" class="nav-link">Shop</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ route('cart') }}" class="header-cart" aria-label="Shopping cart">
                            <i class="bi bi-bag"></i>
                            <span class="cart-badge" id="cart-count">
                                {{ collect(session()->get('cart', []))->sum('quantity') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <button id="themeToggle" class="theme-toggle-btn" type="button" aria-label="Toggle dark mode">
                            <i class="bi bi-moon-stars-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- =========================================================
     MAIN
========================================================== -->
<main class="page-container">

@php
    $cart = session()->get('cart', []);
    $cartTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $cartQuantity = collect($cart)->sum('quantity');
@endphp

@if(empty($cart))

    <div class="page-heading">
        <div>
            <div class="eyebrow"><span class="eyebrow-dot"></span> Your Shopping Cart</div>
            <h1 class="page-title">Your cart</h1>
        </div>
    </div>

    <div class="empty-cart">
        <div class="empty-icon"><i class="bi bi-bag-x"></i></div>
        <h2 class="empty-title">Your cart is waiting for something fresh</h2>
        <p class="empty-description">
            Discover vegetables, fruits, eggs and other
            farm-fresh products carefully selected for your table.
        </p>
        <a href="{{ route('shoppage') }}" class="btn-shop">
            Explore Fresh Products <i class="bi bi-arrow-right"></i>
        </a>
    </div>

@else

    <div class="page-heading">
        <div>
            <div class="eyebrow"><span class="eyebrow-dot"></span> Fresh Selection</div>
            <h1 class="page-title">Your cart</h1>
            <p class="page-description">Review your fresh products before checkout.</p>
        </div>
        <button class="clear-cart-btn" id="clear-cart">
            <i class="bi bi-trash3 me-1"></i> Clear cart
        </button>
    </div>

    <div class="checkout-steps">
        <div class="step active"><span class="step-number">1</span><span>Cart</span></div>
        <div class="step-line"></div>
        <div class="step"><span class="step-number">2</span><span>Details</span></div>
        <div class="step-line"></div>
        <div class="step"><span class="step-number">3</span><span>Confirmation</span></div>
    </div>

    <div class="row g-4">

        <div class="col-lg-8">
            <div class="cart-card">
                <div class="cart-card-header">
                    <div>
                        <div class="cart-card-header-title">Shopping Bag</div>
                        <div class="cart-card-header-count">
                            {{ $cartQuantity }} {{ $cartQuantity == 1 ? 'item' : 'items' }}
                        </div>
                    </div>
                    <i class="bi bi-bag-check text-success"></i>
                </div>

                @foreach($cart as $id => $item)
                    @php
                        $parts = explode('_', $id);
                        $type = strtolower($item['model'] ?? $parts[0]);
                        $itemId = end($parts);
                    @endphp

                    <div class="cart-item" id="cart-item-{{ $id }}">
                        <div class="product-image-wrap">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="cart-item-img">
                            <span class="fresh-label">Fresh</span>
                        </div>

                        <div class="product-info">
                            <div class="product-category">Farm Fresh</div>
                            <h2 class="cart-item-name">{{ $item['name'] }}</h2>
                            <div class="cart-item-price">
                                ${{ number_format($item['price'], 2) }}
                                <span class="unit-label">/ unit</span>
                            </div>

                            <div class="qty-control mt-2">
                                <button type="button" class="qty-btn cart-decrement"
                                    data-type="{{ $type }}" data-id="{{ $itemId }}" data-action="decrement">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="qty-value" id="qty-{{ $id }}">{{ $item['quantity'] }}</span>
                                <button type="button" class="qty-btn cart-increment"
                                    data-type="{{ $type }}" data-id="{{ $itemId }}" data-action="increment">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-end">
                            <div class="item-subtotal-label">Subtotal</div>
                            <div class="cart-item-subtotal" id="subtotal-{{ $id }}">
                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </div>
                        </div>

                        <button type="button" class="btn-remove" onclick="removeSingleItem(this)" title="Remove item">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('shoppage') }}" class="continue-shopping">
                <i class="bi bi-arrow-left"></i> Continue shopping
            </a>
        </div>

        <div class="col-lg-4">
            <div class="cart-card summary-card">
                <h2 class="summary-title">Order Summary</h2>
                <p class="summary-subtitle">Your fresh order at a glance.</p>

                <div class="summary-row"><span>Products</span><strong id="summary-items">{{ $cartQuantity }}</strong></div>
                <div class="summary-row"><span>Subtotal</span><strong id="summary-subtotal">${{ number_format($cartTotal, 2) }}</strong></div>
                <div class="summary-row">
                    <span>Delivery</span>
                    <span class="free-shipping"><i class="bi bi-truck"></i> FREE</span>
                </div>

                <div class="shipping-message">
                    <i class="bi bi-leaf"></i>
                    <span>Great choice! Your order qualifies for free farm-to-door delivery.</span>
                </div>

                <div class="summary-divider"></div>

                <div class="total-row">
                    <div>
                        <div class="total-label">Total</div>
                        <span class="total-small">Including delivery</span>
                    </div>
                    <div class="total-price" id="cart-total">${{ number_format($cartTotal, 2) }}</div>
                </div>

                <div class="desktop-checkout">
                    <button type="button" class="btn-checkout" id="checkout-btn">
                        <i class="bi bi-lock-fill me-1"></i> Secure Checkout
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>

                <div class="secure-checkout">
                    <i class="bi bi-shield-check"></i> Secure & simple checkout
                </div>

                <div class="trust-grid">
                    <div class="trust-card"><i class="bi bi-leaf"></i><span>Farm Fresh</span></div>
                    <div class="trust-card"><i class="bi bi-truck"></i><span>Free Delivery</span></div>
                    <div class="trust-card"><i class="bi bi-qr-code"></i><span>Bakong QR Pay</span></div>
                </div>
            </div>
        </div>

    </div>

@endif

</main>

@if(!empty($cart))
<div class="mobile-checkout">
    <div class="mobile-total">
        Total
        <strong id="mobile-total">${{ number_format($cartTotal, 2) }}</strong>
    </div>
    <button type="button" class="mobile-checkout-btn" id="mobile-checkout-btn">
        Checkout <i class="bi bi-arrow-right ms-1"></i>
    </button>
</div>
@endif

<!-- =========================================================
     CHECKOUT MODAL
========================================================== -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="checkout-modal-header">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-4"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-eyebrow">Step 2 of 3</div>
                <div class="modal-title">Complete Your Order</div>
                <div class="modal-subtitle">Tell us where to deliver your fresh products.</div>
            </div>

            <div class="modal-body">
                <form id="checkout-form">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div class="form-section-title">
                                <i class="bi bi-person-vcard me-1"></i> Contact & Delivery
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="customer_name" required placeholder="Your full name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" class="form-control" name="customer_phone" required placeholder="+855 XX XXX XXX">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" name="customer_email" placeholder="you@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Delivery Address *</label>
                                    <textarea class="form-control" name="customer_address" rows="2" required placeholder="Street, house number, village..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City *</label>
                                    <input type="text" class="form-control" name="customer_city" required placeholder="Phnom Penh">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" name="postal_code" placeholder="12000">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Delivery Date</label>
                                    <input type="date" class="form-control" name="delivery_date">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Order Notes</label>
                                    <textarea class="form-control" name="order_notes" rows="2" placeholder="Special delivery instructions..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-section-title">
                                <i class="bi bi-receipt me-1"></i> Order Preview
                            </div>
                            <div class="order-preview">
                                <div class="preview-title">Fresh Basket</div>

                                <div class="preview-row"><span>Items</span><strong>{{ $cartQuantity }}</strong></div>
                                <div class="preview-row"><span>Products subtotal</span><strong id="checkout-subtotal-val">${{ number_format($cartTotal, 2) }}</strong></div>
                                <div class="preview-row"><span>Delivery</span><strong class="text-success">FREE</strong></div>

                                <div class="preview-total">
                                    <span>Total Due</span>
                                    <span class="preview-total-value" id="checkout-total-val">
                                        ${{ number_format($cartTotal, 2) }}
                                    </span>
                                </div>

                                <div class="cod-box">
                                    <i class="bi bi-qr-code"></i>
                                    <span>
                                        <strong>Bakong QR Payment</strong><br>
                                        Pay securely via Bakong after the admin accepts your order.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn-place-order" id="proceed-to-receipt">
                    <i class="bi bi-check2-circle me-1"></i> Place Order & Wait for Admin
                </button>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     BAKONG QR MODAL — Premium split layout
========================================================== -->
<div class="modal fade" id="qrPaymentModal" tabindex="-1" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content position-relative">
            <div class="modal-body">

                <!-- EXPIRED OVERLAY -->
                <div class="bkqr-expired" id="qrExpiredOverlay">
                    <div class="bkqr-expired-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h3 class="bkqr-expired-title">Payment Expired</h3>
                    <p class="bkqr-expired-text">
                        This payment QR code has expired.
                        Please return to your cart and create a new payment request.
                    </p>
                    <a href="{{ route('cart') }}" class="btn btn-dark rounded-pill px-4 py-2">
                        <i class="bi bi-cart3 me-1"></i> Return to Cart
                    </a>
                </div>

                <div class="bkqr-card">

                    <!-- LEFT SIDEBAR -->
                    <aside class="bkqr-sidebar">
                        <div>
                            <div class="bkqr-brand">
                                <div class="bkqr-brand-icon">
                                    <i class="bi bi-leaf-fill"></i>
                                </div>
                                <div>
                                    <div class="bkqr-brand-name">Farm Fresh</div>
                                    <span class="bkqr-brand-sub">Organic Products</span>
                                </div>
                            </div>

                            <div class="bkqr-secure-badge">
                                <span class="bkqr-secure-dot"></span>
                                Secure Checkout
                            </div>

                            <h1 class="bkqr-title">Simple.<br>Fast.<br>Secure.</h1>

                            <p class="bkqr-desc">
                                Complete your Farm Fresh order using
                                Bakong or your supported Cambodian
                                banking application.
                            </p>

                            <div class="bkqr-steps">
                                <div class="bkqr-step">
                                    <div class="bkqr-step-num">01</div>
                                    <div>
                                        <div class="bkqr-step-title">Open your banking app</div>
                                        <div class="bkqr-step-text">Use Bakong, ABA, Wing, ACLEDA, or another supported app.</div>
                                    </div>
                                </div>
                                <div class="bkqr-step">
                                    <div class="bkqr-step-num">02</div>
                                    <div>
                                        <div class="bkqr-step-title">Scan the QR code</div>
                                        <div class="bkqr-step-text">Scan the payment QR displayed on this screen.</div>
                                    </div>
                                </div>
                                <div class="bkqr-step">
                                    <div class="bkqr-step-num">03</div>
                                    <div>
                                        <div class="bkqr-step-title">Confirm your payment</div>
                                        <div class="bkqr-step-text">Pay the exact amount shown on this page.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bkqr-sidebar-footer">
                            <i class="bi bi-shield-lock-fill"></i>
                            Secure payment powered by KHQR / Bakong
                        </div>
                    </aside>

                    <!-- RIGHT MAIN -->
                    <main class="bkqr-main">

                        <div class="bkqr-main-top">
                            <span class="bkqr-label">Payment</span>
                            <span class="bkqr-badge">
                                <i class="bi bi-shield-check"></i> Secure
                            </span>
                        </div>

                        <!-- AMOUNT -->
                        <div class="bkqr-amount">
                            <div class="bkqr-amount-caption">Amount to pay</div>
                            <div class="bkqr-amount-value">
                                <span id="qrAmount">$0.00</span>
                                <span class="bkqr-currency">USD</span>
                            </div>
                        </div>

                        <!-- QR CODE -->
                        <div class="bkqr-area">
                            <div class="bkqr-glow"></div>
                            <div class="bkqr-box">
                                <div id="bakongQr"></div>
                            </div>
                            <div class="bkqr-scan-label">
                                <i class="bi bi-phone"></i>
                                Scan with your banking app
                            </div>
                        </div>

                        <!-- STATUS -->
                        <div class="bkqr-status">
                            <div class="bkqr-status-icon">
                                <i class="bi bi-broadcast-pin" id="statusIcon"></i>
                            </div>
                            <div>
                                <div class="bkqr-status-title" id="statusTitle">Waiting for payment</div>
                                <div class="bkqr-status-text" id="statusText">We are automatically checking for your payment.</div>
                            </div>
                            <div class="bkqr-status-loader" id="statusLoader"></div>
                        </div>

                        <!-- TIMER -->
                        <div class="bkqr-timer">
                            <span>QR expires in</span>
                            <span class="bkqr-timer-pill" id="timerPill">
                                <i class="bi bi-clock"></i>
                                <span id="timerValue">03:00</span>
                            </span>
                        </div>

                        <!-- INFO -->
                        <div class="bkqr-info">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>
                                Please pay the exact amount shown above.
                                After payment, this page will automatically
                                detect your transaction.
                                <strong>You do not need to refresh the page.</strong>
                            </span>
                        </div>

<!-- CONFIRM -->
                    <button type="button" class="bkqr-confirm" id="btnPaid">
                        <i class="bi bi-check-circle me-1"></i>
                        I've Paid — Check Payment
                    </button>

                    <!-- DONE -->
                    <button type="button" class="bkqr-done" id="btnQrDone" style="display:none;">
                        <i class="bi bi-check2 me-1"></i>
                        Done
                    </button>

                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     RECEIPT MODAL
========================================================== -->
<div class="modal fade receipt-modal" id="receiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"></button>
            </div>

            <div class="receipt-body" id="receipt-content">
                <div class="receipt-paper">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="receipt-brand">Farm Fresh</div>
                            <div class="text-muted small">Organic & Premium Products</div>
                            <div class="waiting-badge mt-2">
                                <i class="bi bi-hourglass-split"></i> Waiting for Admin
                            </div>
                        </div>
                        <div class="receipt-reference">
                            <small>Order Reference</small>
                            <strong id="receipt-no">#FF-000000</strong>
                        </div>
                    </div>

                    <div class="receipt-meta">
                        <span>Date: <strong id="receipt-date">—</strong></span>
                        <span>Payment: <strong>Bakong QR</strong></span>
                    </div>

                    <div class="customer-box">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="customer-label">Customer</div>
                                <div id="receipt-customer-name" class="customer-name">—</div>
                                <div id="receipt-customer-phone" class="customer-detail">—</div>
                                <div id="receipt-customer-email" class="customer-detail">—</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="customer-label">Delivery Address</div>
                                <div id="receipt-customer-address" class="customer-name">—</div>
                                <div class="customer-detail">
                                    <span id="receipt-customer-city">—</span>,
                                    <span id="receipt-postal-code">—</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="receipt-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="receipt-items"></tbody>
                    </table>

                    <div class="receipt-total">
                        <span>Order Total</span>
                        <span class="receipt-total-value" id="receipt-total">$0.00</span>
                    </div>

                    <div class="receipt-footer">
                        <div class="waiting-icon"><i class="bi bi-hourglass-split"></i></div>
                        Your order has been submitted.<br>
                        Please wait for admin acceptance.<br><br>
                        <strong>Thank you for supporting local farming.</strong>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold"
                    id="receipt-action-button" disabled>
                    <i class="bi bi-hourglass-split me-1"></i> Waiting for Admin Acceptance
                </button>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     SCRIPTS — QRCode library MUST be loaded BEFORE the main script
========================================================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

<script>

/* =========================================================
   DARK MODE CONTROLLER — added, non-invasive
========================================================== */
(function() {
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

    const savedTheme = localStorage.getItem('farmfresh-theme');
    let initialTheme = 'light';
    if (savedTheme === 'dark' || savedTheme === 'light') {
        initialTheme = savedTheme;
    } else if (mediaQuery.matches) {
        initialTheme = 'dark';
    }
    applyTheme(initialTheme);

    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const isDark = htmlEl.getAttribute('data-theme') === 'dark';
            const newTheme = isDark ? 'light' : 'dark';
            applyTheme(newTheme);
            localStorage.setItem('farmfresh-theme', newTheme);
        });
    }

    mediaQuery.addEventListener('change', function(event) {
        const stored = localStorage.getItem('farmfresh-theme');
        if (stored !== 'dark' && stored !== 'light') {
            applyTheme(event.matches ? 'dark' : 'light');
        }
    });
})();


/* =========================================================
   CSRF
========================================================== */
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


/* =========================================================
   ROUTES
========================================================== */
const routes = {
    count:          '{{ route("cart.count") }}',
    clear:          '{{ route("cart.clear") }}',
    productInc:     '{{ route("cart.increment", ["id" => "__ID__"]) }}',
    productDec:     '{{ route("cart.decrement", ["id" => "__ID__"]) }}',
    fruitInc:       '{{ route("cart.increment-fruit", ["id" => "__ID__"]) }}',
    fruitDec:       '{{ route("cart.decrement-fruit", ["id" => "__ID__"]) }}',
    juiceInc:       '{{ route("cart.increment-juice", ["id" => "__ID__"]) }}',
    juiceDec:       '{{ route("cart.decrement-juice", ["id" => "__ID__"]) }}',
    checkoutStore:  '{{ route("orders.store") }}',
    deliveryStatus: '{{ route("orders.delivery-status") }}',
    bakongGenerate: '{{ route("bakong.generate") }}',
    bakongCheck:    '{{ route("bakong.check") }}'
};


/* =========================================================
   HELPERS
========================================================== */
function formatMoney(n) {
    return '$' + parseFloat(n || 0).toFixed(2);
}

const mainHeader = document.getElementById('mainHeader');
window.addEventListener('scroll', () => {
    if (window.scrollY > 10) mainHeader.classList.add('scrolled');
    else mainHeader.classList.remove('scrolled');
});

const models = {
    vegetable: { inc: routes.productInc, dec: routes.productDec },
    freshnut: { inc: routes.productInc, dec: routes.productDec },
    'fresh-nut': { inc: routes.productInc, dec: routes.productDec },
    egg: { inc: routes.productInc, dec: routes.productDec },
    farmanimal: { inc: routes.productInc, dec: routes.productDec },
    'farm-animal': { inc: routes.productInc, dec: routes.productDec },
    fruit: { inc: routes.fruitInc, dec: routes.fruitDec },
    juice: { inc: routes.juiceInc, dec: routes.juiceDec },
    product: { inc: routes.productInc, dec: routes.productDec }
};

function endpointFor(action, model, id) {
    model = String(model || '').toLowerCase();
    const entry = models[model];
    if (!entry) return null;
    const template = action === 'increment' ? entry.inc : entry.dec;
    if (!template) return null;
    return template.replace('__ID__', encodeURIComponent(id));
}

function updateHeaderCount(count) {
    const badge = document.getElementById('cart-count');
    if (badge) badge.textContent = count;
}

function refreshTotals() {
    let total = 0, quantity = 0;
    document.querySelectorAll('[id^="subtotal-"]').forEach(el => {
        total += parseFloat(el.textContent.replace(/[^0-9.]/g, '')) || 0;
    });
    document.querySelectorAll('.qty-value').forEach(el => {
        quantity += parseInt(el.textContent) || 0;
    });
    ['cart-total', 'summary-subtotal', 'checkout-subtotal-val', 'checkout-total-val', 'mobile-total']
        .forEach(id => {
            const el = document.getElementById(id);
            if (el) el.textContent = formatMoney(total);
        });
    const itemsEl = document.getElementById('summary-items');
    if (itemsEl) itemsEl.textContent = quantity;
}


/* =========================================================
   QUANTITY
========================================================== */
async function adjustQty(button) {
    const type = String(button.dataset.type || '').toLowerCase();
    const id = button.dataset.id;
    const action = button.dataset.action;
    const url = endpointFor(action, type, id);

    if (!url) {
        Swal.fire({ icon: 'error', title: 'Unsupported item', text: 'Cannot update.' });
        return;
    }

    button.disabled = true;
    const row = button.closest('.cart-item');
    if (row) row.style.opacity = '.65';

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        if (!response.ok || !data.success) throw new Error(data.message || 'Update failed');

        if (data.removed) {
            if (row) {
                row.style.transform = 'translateX(-20px)';
                row.style.opacity = '0';
                setTimeout(() => row.remove(), 220);
            }
        } else if (row) {
            const qtyEl = row.querySelector('.qty-value');
            if (qtyEl) qtyEl.textContent = data.quantity;

            const priceEl = row.querySelector('.cart-item-price');
            const unitPrice = parseFloat(priceEl.textContent.replace(/[^0-9.]/g, '')) || 0;

            const subtotalEl = row.querySelector('.cart-item-subtotal');
            if (subtotalEl) subtotalEl.textContent = formatMoney(unitPrice * data.quantity);
        }

        updateHeaderCount(data.count);
        refreshTotals();

        if (data.count === 0) setTimeout(() => location.reload(), 350);
    } catch (error) {
        Swal.fire({ icon: 'error', title: 'Update failed', text: error.message });
    } finally {
        button.disabled = false;
        if (row) row.style.opacity = '';
    }
}

document.querySelectorAll('.cart-increment, .cart-decrement').forEach(btn => {
    btn.addEventListener('click', () => adjustQty(btn));
});

function removeSingleItem(button) {
    const row = button.closest('.cart-item');
    if (!row) return;
    const minusButton = row.querySelector('.cart-decrement');
    if (!minusButton) return;
    const qty = parseInt(row.querySelector('.qty-value')?.textContent) || 0;

    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    Swal.fire({
        title: qty <= 1 ? 'Remove this item?' : 'Remove item?',
        text: qty <= 1 ? 'This product will be removed from your cart.' : 'You can reduce the quantity instead.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: qty <= 1 ? 'Remove' : 'Remove one',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#dc3545',
        background: isDark ? '#0d1a12' : '#fff',
        color: isDark ? '#eaf5ee' : '#172019'
    }).then(r => { if (r.isConfirmed) adjustQty(minusButton); });
}

const clearBtn = document.getElementById('clear-cart');
if (clearBtn) {
    clearBtn.addEventListener('click', async () => {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const result = await Swal.fire({
            title: 'Clear your cart?',
            text: 'All products will be removed.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, clear cart',
            cancelButtonText: 'Keep products',
            confirmButtonColor: '#dc3545',
            background: isDark ? '#0d1a12' : '#fff',
            color: isDark ? '#eaf5ee' : '#172019'
        });
        if (!result.isConfirmed) return;

        clearBtn.disabled = true;
        try {
            const response = await fetch(routes.clear, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await response.json();
            if (!response.ok || !data.success) throw new Error(data.message || 'Failed');

            updateHeaderCount(0);
            await Swal.fire({
                icon: 'success',
                title: 'Cart cleared',
                timer: 1200,
                showConfirmButton: false,
                background: isDark ? '#0d1a12' : '#fff',
                color: isDark ? '#eaf5ee' : '#172019'
            });
            location.reload();
        } catch (error) {
            clearBtn.disabled = false;
            Swal.fire({ icon: 'error', title: 'Failed', text: error.message });
        }
    });
}


/* =========================================================
   CHECKOUT
========================================================== */
function openCheckout() {
    const el = document.getElementById('checkoutModal');
    if (!el) return;
    bootstrap.Modal.getOrCreateInstance(el).show();
}

const checkoutBtn = document.getElementById('checkout-btn');
const mobileCheckoutBtn = document.getElementById('mobile-checkout-btn');
if (checkoutBtn) checkoutBtn.addEventListener('click', openCheckout);
if (mobileCheckoutBtn) mobileCheckoutBtn.addEventListener('click', openCheckout);


/* =========================================================
   PLACE ORDER
========================================================== */
const proceedButton = document.getElementById('proceed-to-receipt');
if (proceedButton) {
    proceedButton.addEventListener('click', async function () {
        const form = document.getElementById('checkout-form');
        if (!form.checkValidity()) { form.reportValidity(); return; }

        const button = this;
        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';

        const formData = new FormData(form);

        try {
            const response = await fetch(routes.checkoutStore, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
            const data = await response.json();
            if (!response.ok || !data.success) throw new Error(data.message || 'Failed to place order.');

            const cm = bootstrap.Modal.getInstance(document.getElementById('checkoutModal'));
            if (cm) cm.hide();

            const customerInfo = Object.fromEntries(formData.entries());
            const receiptNo = 'FF-' + Date.now().toString().slice(-8);
            const date = new Date().toLocaleDateString('en-US', {
                year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit'
            });

            document.getElementById('receipt-no').textContent = '#' + receiptNo;
            document.getElementById('receipt-date').textContent = date;
            document.getElementById('receipt-customer-name').textContent = customerInfo.customer_name;
            document.getElementById('receipt-customer-phone').textContent = customerInfo.customer_phone;
            document.getElementById('receipt-customer-email').textContent = customerInfo.customer_email || 'N/A';
            document.getElementById('receipt-customer-address').textContent = customerInfo.customer_address;
            document.getElementById('receipt-customer-city').textContent = customerInfo.customer_city;
            document.getElementById('receipt-postal-code').textContent = customerInfo.postal_code || 'N/A';

            let itemsHtml = '', total = 0;
            data.orders.forEach(order => {
                const qty = parseInt(order.quantity) || 0;
                const subtotal = parseFloat(order.total_price) || 0;
                const price = qty > 0 ? subtotal / qty : 0;
                total += subtotal;
                itemsHtml += `
                    <tr>
                        <td>${order.item_name}</td>
                        <td class="text-center">${qty}</td>
                        <td class="text-end">$${price.toFixed(2)}</td>
                        <td class="text-end">$${subtotal.toFixed(2)}</td>
                    </tr>`;
            });

            document.getElementById('receipt-items').innerHTML = itemsHtml;
            document.getElementById('receipt-total').textContent = '$' + total.toFixed(2);

            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            await Swal.fire({
                icon: 'success',
                title: 'Order Submitted!',
                html: `<div style="font-size:13px;color:${isDark ? '#8ba394' : '#68736c'};line-height:1.7;">
                          Your order has been sent successfully.<br>
                          Please wait while our admin reviews it.
                       </div>`,
                confirmButtonText: 'View Order',
                confirmButtonColor: '#163722',
                background: isDark ? '#0d1a12' : '#fff',
                color: isDark ? '#eaf5ee' : '#172019',
                timer: 2500,
                timerProgressBar: true
            });

            new bootstrap.Modal(document.getElementById('receiptModal')).show();

            waitForAdminAcceptance(
                data.orders.map(o => o.id),
                total
            );

        } catch (error) {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            Swal.fire({
                icon: 'error',
                title: 'Order Failed',
                text: error.message,
                background: isDark ? '#0d1a12' : '#fff',
                color: isDark ? '#eaf5ee' : '#172019'
            });
        } finally {
            button.disabled = false;
            button.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Place Order & Wait for Admin';
        }
    });
}


/* =========================================================
   WAIT FOR ADMIN
========================================================== */
function waitForAdminAcceptance(orderIds, orderTotal) {
    const actionButton = document.getElementById('receipt-action-button');
    if (!actionButton) return;

    let finished = false;

    const checkStatus = async () => {
        if (finished) return true;

        const query = new URLSearchParams();
        orderIds.forEach(id => query.append('order_ids[]', id));

        try {
            const response = await fetch(`${routes.deliveryStatus}?${query.toString()}`,
                { headers: { 'Accept': 'application/json' } });
            const data = await response.json();
            if (!data.accepted) return false;

            finished = true;

            actionButton.disabled = false;
            actionButton.className = 'btn btn-success rounded-pill px-4 fw-bold';
            actionButton.innerHTML = '<i class="bi bi-printer me-1"></i> Print Receipt';
            actionButton.onclick = () => window.print();

            const rm = bootstrap.Modal.getInstance(document.getElementById('receiptModal'));
            if (rm) rm.hide();

            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            Swal.fire({
                icon: 'success',
                title: 'Order Accepted!',
                html: `<div style="font-size:13px;color:${isDark ? '#8ba394' : '#68736c'};line-height:1.7;">
                          The admin has accepted your order.<br>
                          Please scan the Bakong QR to complete payment.
                       </div>`,
                confirmButtonText: 'Proceed to Payment',
                confirmButtonColor: '#163722',
                background: isDark ? '#0d1a12' : '#fff',
                color: isDark ? '#eaf5ee' : '#172019',
                allowOutsideClick: false
            }).then(() => {
                openQrPaymentModal(orderTotal);
            });

            return true;
        } catch (error) {
            console.error('Status check failed:', error);
            return false;
        }
    };

    const interval = setInterval(async () => {
        if (await checkStatus()) clearInterval(interval);
    }, 5000);

    checkStatus().then(accepted => { if (accepted) clearInterval(interval); });
}


/* =========================================================
   BAKONG KHQR PAYMENT
========================================================= */

let qrTimerInterval = null;
let bakongPollingTimer = null;

const QR_TOTAL_SECONDS = 180;

let qrSecondsRemaining = QR_TOTAL_SECONDS;
let currentMd5 = null;
let currentReference = null;
let currentPaymentAmount = 0;
let paymentFinished = false;


/* =========================================================
   QR LOADING
========================================================= */

function showQrLoading() {
    const container = document.getElementById('bakongQr');
    if (!container) return;

    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    container.innerHTML = `
        <div style="
            width:235px;
            height:235px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            background:${isDark ? '#0f1f15' : '#f5faf6'};
            border-radius:10px;
        ">
            <div class="spinner-border text-success mb-3"
                 style="width:35px;height:35px;">
            </div>

            <div style="
                font-size:12px;
                color:${isDark ? '#8ba394' : '#68736c'};
                font-weight:600;
            ">
                Creating secure QR...
            </div>
        </div>
    `;
}


/* =========================================================
   RENDER QR CODE — HIGH RESOLUTION FOR SCANNABILITY
========================================================= */
function renderQrCode(qrString) {
    const container = document.getElementById('bakongQr');
    if (!container) {
        throw new Error('Bakong QR container was not found.');
    }

    container.innerHTML = '';

    const wrapper = document.createElement('div');
    wrapper.style.width = '235px';
    wrapper.style.height = '235px';
    wrapper.style.display = 'flex';
    wrapper.style.alignItems = 'center';
    wrapper.style.justifyContent = 'center';
    wrapper.style.background = '#ffffff';
    wrapper.style.borderRadius = '10px';
    container.appendChild(wrapper);

    new QRCode(wrapper, {
        text: qrString,
        width: 400,
        height: 400,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.M
    });

    const generated = wrapper.querySelector('canvas, img');
    if (generated) {
        generated.style.width = '235px';
        generated.style.height = '235px';
        generated.style.imageRendering = 'pixelated';
        generated.style.imageRendering = '-moz-crisp-edges';
        generated.style.imageRendering = 'crisp-edges';
        generated.style.msInterpolationMode = 'nearest-neighbor';
    }
}


/* =========================================================
   GENERATE REAL BAKONG KHQR
========================================================= */
async function generateBakongQr(amount) {
    const statusTitle = document.getElementById('statusTitle');
    const statusText = document.getElementById('statusText');
    const statusLoader = document.getElementById('statusLoader');
    const paidButton = document.getElementById('btnPaid');

    currentPaymentAmount = parseFloat(amount) || 0;
    currentReference = 'FF-' + Date.now().toString().slice(-8);
    currentMd5 = null;
    paymentFinished = false;

    showQrLoading();

    if (statusTitle) statusTitle.textContent = 'Creating payment request';
    if (statusText) statusText.textContent = 'Generating your secure Bakong KHQR...';
    if (statusLoader) statusLoader.style.display = '';
    if (paidButton) paidButton.disabled = true;

    try {
        const url = `${routes.bakongGenerate}?amount=${encodeURIComponent(currentPaymentAmount)}&ref=${encodeURIComponent(currentReference)}`;

        console.log('Bakong generate URL:', url);

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const rawText = await response.text();
        console.log('Bakong generate HTTP:', response.status);
        console.log('Bakong generate response:', rawText);

        let data;
        try {
            data = JSON.parse(rawText);
        } catch (e) {
            throw new Error('Server did not return valid JSON. Check Laravel logs.');
        }

        if (!response.ok) {
            throw new Error(data.message || data.error || `Server returned HTTP ${response.status}`);
        }

        if (!data.success) {
            throw new Error(data.message || 'Bakong QR generation failed.');
        }

        const qrString = data.qr;
        if (!qrString) {
            console.error('Bakong response without QR:', data);
            throw new Error('Bakong did not return a KHQR string.');
        }

        if (!data.md5) {
            console.error('Bakong response without MD5:', data);
            throw new Error('Bakong did not return an MD5 hash.');
        }

        currentMd5 = data.md5;

        renderQrCode(qrString);

        console.log('Bakong KHQR generated successfully.');
        console.log('Reference:', data.reference || currentReference);
        console.log('Amount:', data.amount);
        console.log('Currency:', data.currency);
        console.log('MD5:', data.md5);

        if (statusTitle) statusTitle.textContent = 'Waiting for payment';
        if (statusText) statusText.textContent = 'Scan the QR with Bakong or a supported banking app.';
        if (statusLoader) statusLoader.style.display = '';
        if (paidButton) paidButton.disabled = false;

        const doneButton = document.getElementById('btnQrDone');
        if (doneButton) doneButton.style.display = 'flex';

        startBakongPolling(currentMd5);

    } catch (error) {
        console.error('Bakong QR generation error:', error);

        if (statusTitle) statusTitle.textContent = 'Unable to create payment';
        if (statusText) statusText.textContent = error.message || 'Please try again.';
        if (statusLoader) statusLoader.style.display = 'none';

        const container = document.getElementById('bakongQr');
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        if (container) {
            container.innerHTML = `
                <div style="
                    width:235px;
                    height:235px;
                    display:flex;
                    flex-direction:column;
                    align-items:center;
                    justify-content:center;
                    text-align:center;
                    background:${isDark ? 'rgba(255,107,142,.1)' : '#fff5f5'};
                    border-radius:10px;
                    padding:20px;
                ">
                    <i class="bi bi-exclamation-triangle-fill"
                       style="font-size:30px;color:#dc3545;margin-bottom:12px;">
                    </i>

                    <strong style="color:${isDark ? '#ff6b8e' : '#842029'};font-size:12px;">
                        QR Generation Failed
                    </strong>

                    <small style="color:${isDark ? '#8ba394' : '#6c757d'};margin-top:8px;line-height:1.5;">
                        ${escapeHtml(error.message)}
                    </small>
                </div>
            `;
        }

        Swal.fire({
            icon: 'error',
            title: 'QR Generation Failed',
            text: error.message || 'Could not create a Bakong QR.',
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#163722',
            background: isDark ? '#0d1a12' : '#fff',
            color: isDark ? '#eaf5ee' : '#172019',
            showCancelButton: true,
            cancelButtonText: 'Close'
        }).then(result => {
            if (result.isConfirmed) {
                generateBakongQr(currentPaymentAmount);
            }
        });
    }
}


/* =========================================================
   ESCAPE HTML
========================================================= */
function escapeHtml(value) {
    const div = document.createElement('div');
    div.textContent = value == null ? '' : String(value);
    return div.innerHTML;
}


/* =========================================================
   START POLLING
========================================================= */
function startBakongPolling(md5) {
    clearInterval(bakongPollingTimer);
    if (!md5) return;

    checkBakongPayment(md5);

    bakongPollingTimer = setInterval(() => {
        if (qrSecondsRemaining <= 0 || paymentFinished) {
            clearInterval(bakongPollingTimer);
            return;
        }
        checkBakongPayment(md5);
    }, 5000);
}


/* =========================================================
   CHECK BAKONG PAYMENT
========================================================= */
async function checkBakongPayment(md5) {
    if (!md5) return;
    if (paymentFinished) return;

    try {
        const response = await fetch(
            `${routes.bakongCheck}?md5=${encodeURIComponent(md5)}`,
            {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        );

        const rawText = await response.text();

        let data;
        try {
            data = JSON.parse(rawText);
        } catch (e) {
            console.error('Invalid Bakong check response:', rawText);
            return;
        }

        console.log('Bakong payment status:', data);

        if (!response.ok) {
            console.error('Bakong check HTTP error:', response.status, data);
            return;
        }

        if (data.success === true && data.is_paid === true) {
            await paymentSuccess();
            return;
        }

        const statusText = document.getElementById('statusText');
        if (statusText) {
            statusText.textContent = 'Waiting for Bakong to confirm your payment...';
        }

    } catch (error) {
        console.error('Bakong polling error:', error);
    }
}


/* =========================================================
   PAYMENT SUCCESS
========================================================= */
async function paymentSuccess() {
    if (paymentFinished) return;
    paymentFinished = true;

    clearInterval(bakongPollingTimer);
    clearInterval(qrTimerInterval);

    const statusLoader = document.getElementById('statusLoader');
    const statusIcon = document.getElementById('statusIcon');
    const statusTitle = document.getElementById('statusTitle');
    const statusText = document.getElementById('statusText');
    const paidButton = document.getElementById('btnPaid');

    if (statusLoader) statusLoader.style.display = 'none';

    if (statusIcon) {
        statusIcon.className = 'bi bi-check-circle-fill';
        statusIcon.style.color = '#198754';
    }

    if (statusTitle) statusTitle.textContent = 'Payment confirmed';
    if (statusText) statusText.textContent = 'Bakong has confirmed your payment.';

    if (paidButton) {
        paidButton.disabled = true;
        paidButton.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Payment Confirmed';
    }

    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    await Swal.fire({
        icon: 'success',
        title: 'Payment Received!',
        html: `
            <div style="font-size:13px;color:${isDark ? '#8ba394' : '#68736c'};line-height:1.8;">
                Your Bakong payment has been confirmed.<br>
                <strong>Thank you for shopping with Farm Fresh.</strong>
            </div>
        `,
        confirmButtonText: 'Continue',
        confirmButtonColor: '#163722',
        background: isDark ? '#0d1a12' : '#fff',
        color: isDark ? '#eaf5ee' : '#172019',
        allowOutsideClick: false
    });

    const qrElement = document.getElementById('qrPaymentModal');
    if (qrElement) {
        const qrInstance = bootstrap.Modal.getInstance(qrElement);
        if (qrInstance) qrInstance.hide();
    }

    updateHeaderCount(0);

    setTimeout(() => {
        window.location.href = '{{ route("cart") }}';
    }, 300);
}


/* =========================================================
   TIMER DISPLAY
========================================================= */
function updateQrTimerDisplay() {
    const timerValue = document.getElementById('timerValue');
    const timerPill = document.getElementById('timerPill');

    if (!timerValue) return;

    const minutes = Math.floor(qrSecondsRemaining / 60);
    const seconds = qrSecondsRemaining % 60;

    timerValue.textContent =
        String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');

    if (timerPill) {
        if (qrSecondsRemaining <= 60) {
            timerPill.classList.add('warning');
        } else {
            timerPill.classList.remove('warning');
        }
    }
}


/* =========================================================
   TIMER EXPIRED
========================================================= */
function handleQrTimerExpired() {
    clearInterval(bakongPollingTimer);

    const paidButton = document.getElementById('btnPaid');
    if (paidButton) {
        paidButton.disabled = true;
        paidButton.innerHTML = '<i class="bi bi-x-circle me-1"></i> Payment Window Expired';
    }

    const statusLoader = document.getElementById('statusLoader');
    if (statusLoader) statusLoader.style.display = 'none';

    const statusTitle = document.getElementById('statusTitle');
    if (statusTitle) statusTitle.textContent = 'Payment window expired';

    const statusText = document.getElementById('statusText');
    if (statusText) statusText.textContent = 'Please create a new payment request.';

    const overlay = document.getElementById('qrExpiredOverlay');
    if (overlay) overlay.classList.add('show');
}


/* =========================================================
   OPEN BAKONG MODAL
========================================================= */
function openQrPaymentModal(amount) {
    const qrModalElement = document.getElementById('qrPaymentModal');
    if (!qrModalElement) return;

    const qrModal = bootstrap.Modal.getOrCreateInstance(qrModalElement);

    qrSecondsRemaining = QR_TOTAL_SECONDS;
    currentMd5 = null;
    currentReference = null;
    currentPaymentAmount = parseFloat(amount) || 0;
    paymentFinished = false;

    const expiredOverlay = document.getElementById('qrExpiredOverlay');
    if (expiredOverlay) expiredOverlay.classList.remove('show');

    const paidButton = document.getElementById('btnPaid');
    if (paidButton) {
        paidButton.disabled = true;
        paidButton.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Creating QR...';
    }

    const amountElement = document.getElementById('qrAmount');
    if (amountElement) {
        amountElement.textContent = '$' + currentPaymentAmount.toFixed(2);
    }

    const statusIcon = document.getElementById('statusIcon');
    if (statusIcon) {
        statusIcon.className = 'bi bi-broadcast-pin';
        statusIcon.style.color = '';
    }

    const statusTitle = document.getElementById('statusTitle');
    if (statusTitle) statusTitle.textContent = 'Creating payment request';

    const statusText = document.getElementById('statusText');
    if (statusText) statusText.textContent = 'Generating your secure Bakong QR...';

    showQrLoading();
    updateQrTimerDisplay();
    clearInterval(qrTimerInterval);

    qrModal.show();

    generateBakongQr(currentPaymentAmount);

    qrTimerInterval = setInterval(() => {
        if (paymentFinished) {
            clearInterval(qrTimerInterval);
            return;
        }

        qrSecondsRemaining--;
        updateQrTimerDisplay();

        if (qrSecondsRemaining <= 0) {
            clearInterval(qrTimerInterval);
            handleQrTimerExpired();
        }
    }, 1000);

    qrModalElement.addEventListener('hidden.bs.modal', () => {
        clearInterval(qrTimerInterval);
        clearInterval(bakongPollingTimer);
    }, { once: true });

    const doneButton = document.getElementById('btnQrDone');
    if (doneButton) {
        doneButton.onclick = function () {
            const qrInstance = bootstrap.Modal.getInstance(qrModalElement);
            if (qrInstance) qrInstance.hide();
        };
        doneButton.style.display = 'none';
    }

    if (paidButton) {
        paidButton.onclick = async () => {
            if (qrSecondsRemaining <= 0) return;

            if (!currentMd5) {
                const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                await Swal.fire({
                    icon: 'info',
                    title: 'Please Wait',
                    text: 'The Bakong QR is still being generated.',
                    confirmButtonColor: '#163722',
                    background: isDark ? '#0d1a12' : '#fff',
                    color: isDark ? '#eaf5ee' : '#172019'
                });
                return;
            }

            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            const result = await Swal.fire({
                title: 'Check Payment?',
                html: `
                    <div style="font-size:13px;color:${isDark ? '#8ba394' : '#68736c'};line-height:1.7;">
                        Have you already paid
                        <strong>${formatMoney(currentPaymentAmount)}</strong>?
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Check Now',
                cancelButtonText: 'Not Yet',
                confirmButtonColor: '#163722',
                background: isDark ? '#0d1a12' : '#fff',
                color: isDark ? '#eaf5ee' : '#172019'
            });

            if (!result.isConfirmed) return;

            paidButton.disabled = true;
            paidButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Checking Payment...';

            await checkBakongPayment(currentMd5);

            if (!paymentFinished) {
                paidButton.disabled = false;
                paidButton.innerHTML = '<i class="bi bi-check-circle me-1"></i> I\'ve Paid — Check Payment';
            }
        };
    }
}

</script>
</body>
</html>