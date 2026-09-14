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
            --shadow-sm: 0 5px 20px rgba(16, 40, 26, .05);
            --shadow-md: 0 15px 45px rgba(16, 40, 26, .08);
            --shadow-lg: 0 25px 70px rgba(16, 40, 26, .13);
            --radius-sm: 12px;
            --radius-md: 18px;
            --radius-lg: 26px;
            --radius-xl: 34px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 0%, rgba(55,131,76,.08), transparent 30%),
                radial-gradient(circle at 100% 10%, rgba(228,119,50,.07), transparent 25%),
                var(--cream);
            min-height: 100vh;
        }

        a { text-decoration: none; }
        button, input, textarea { font-family: inherit; }

        /* ===================== HEADER ===================== */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255,255,255,.91);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(16,40,26,.07);
            transition: box-shadow .25s ease;
        }
        .main-header.scrolled { box-shadow: 0 8px 35px rgba(16,40,26,.08); }
        .navbar { min-height: 76px; }
        .brand { display: flex; align-items: center; gap: 12px; }
        .brand-logo {
            width: 48px; height: 48px;
            border-radius: 15px;
            object-fit: cover;
            background: var(--green-50);
            padding: 5px;
            border: 1px solid var(--border);
        }
        .brand-text { line-height: 1; }
        .brand-name {
            font-family: 'Playfair Display', serif;
            color: var(--green-900);
            font-size: 21px;
            font-weight: 700;
        }
        .brand-subtitle {
            display: block;
            color: var(--text-muted);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-top: 5px;
        }
        .navbar-toggler {
            border: 0;
            width: 44px; height: 44px;
            border-radius: 12px;
            background: var(--green-50);
            color: var(--green-900);
        }
        .nav-link {
            color: #59645d !important;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 15px !important;
            border-radius: 10px;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--green-800) !important;
            background: var(--green-50);
        }

        .header-cart {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px; height: 44px;
            border-radius: 14px;
            background: var(--green-900);
            color: white;
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
            border: 2px solid white;
            font-size: 9px;
            font-weight: 800;
        }

        /* ===================== PAGE ===================== */
        .page-container {
            max-width: 1240px;
            margin: auto;
            padding: 45px 20px 90px;
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
        }
        .eyebrow-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green-600);
        }
        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 5vw, 48px);
            line-height: 1;
            letter-spacing: -1.5px;
            color: var(--green-950);
            margin: 0;
        }
        .page-description {
            color: var(--text-soft);
            margin: 12px 0 0;
            font-size: 14px;
        }
        .clear-cart-btn {
            border: 0;
            background: transparent;
            color: #8d9490;
            font-size: 12px;
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 10px;
        }
        .clear-cart-btn:hover { color: var(--danger); background: #fff0f1; }

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
            color: #a0a7a2;
        }
        .step.active { color: var(--green-800); }
        .step-number {
            width: 29px; height: 29px;
            border-radius: 50%;
            display: flex;
            align-items: center; justify-content: center;
            background: #edf0ed;
            color: #89928c;
            font-size: 11px;
            font-weight: 800;
        }
        .step.active .step-number {
            color: white;
            background: var(--green-800);
            box-shadow: 0 5px 15px rgba(40,97,58,.22);
        }
        .step-line {
            flex: 1;
            height: 1px;
            background: var(--border-dark);
            margin: 0 12px;
            min-width: 30px;
        }

        /* ===================== CART CARD ===================== */
        .cart-card {
            background: rgba(255,255,255,.94);
            border: 1px solid rgba(16,40,26,.07);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }
        .cart-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 21px 24px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(180deg, #fff, #fcfdfc);
        }
        .cart-card-header-title { font-size: 14px; font-weight: 800; color: var(--green-950); }
        .cart-card-header-count { color: var(--text-muted); font-size: 11px; font-weight: 600; }

        .cart-item {
            display: grid;
            grid-template-columns: 92px minmax(160px,1fr) auto 110px 30px;
            align-items: center;
            gap: 20px;
            padding: 21px 24px;
            border-bottom: 1px solid var(--border);
        }
        .cart-item:last-child { border-bottom: 0; }
        .cart-item:hover { background: #fcfefc; }

        .product-image-wrap {
            width: 92px; height: 92px;
            border-radius: 18px;
            background: linear-gradient(135deg, #f4f8f4, #edf4ee);
            overflow: hidden;
            position: relative;
            border: 1px solid var(--border);
        }
        .cart-item-img { width: 100%; height: 100%; object-fit: cover; }
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
        }
        .product-info { min-width: 0; }
        .product-category {
            color: var(--green-600);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .cart-item-name {
            color: var(--green-950);
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cart-item-price { color: var(--text-soft); font-size: 12px; font-weight: 600; }
        .unit-label { color: var(--text-muted); font-size: 10px; }

        .qty-control {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 4px;
            border: 1px solid var(--border-dark);
            border-radius: 100px;
            background: white;
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
        }
        .qty-btn:hover { color: white; background: var(--green-800); }
        .qty-value { min-width: 32px; text-align: center; color: var(--green-950); font-size: 12px; font-weight: 800; }

        .item-subtotal-label {
            color: var(--text-muted);
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 3px;
        }
        .cart-item-subtotal { color: var(--green-800); font-size: 16px; font-weight: 800; }

        .btn-remove {
            width: 30px; height: 30px;
            border: 0;
            border-radius: 9px;
            display: flex;
            align-items: center; justify-content: center;
            color: #adb4af;
            background: transparent;
        }
        .btn-remove:hover { color: var(--danger); background: #fff0f1; }

        .continue-shopping {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
            color: var(--green-800);
            font-size: 12px;
            font-weight: 800;
        }
        .continue-shopping:hover { color: var(--orange); gap: 12px; }

        /* ===================== SUMMARY ===================== */
        .summary-card { position: sticky; top: 105px; padding: 26px; }
        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            color: var(--green-950);
            margin: 0 0 5px;
        }
        .summary-subtitle { color: var(--text-muted); font-size: 11px; margin-bottom: 25px; }
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
        }
        .shipping-message {
            display: flex;
            gap: 9px;
            padding: 12px;
            margin: 20px 0;
            border-radius: 13px;
            background: var(--orange-light);
            color: #9a4d20;
            font-size: 10px;
            line-height: 1.5;
        }
        .shipping-message i { color: var(--orange); font-size: 14px; }
        .summary-divider { border-top: 1px dashed var(--border-dark); margin: 21px 0; }
        .total-row { display: flex; justify-content: space-between; align-items: flex-end; }
        .total-label { font-size: 13px; font-weight: 800; color: var(--green-950); }
        .total-small { display: block; color: var(--text-muted); font-size: 9px; font-weight: 500; margin-top: 3px; }
        .total-price { color: var(--green-800); font-size: 29px; font-weight: 800; letter-spacing: -1px; }

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
            box-shadow: 0 12px 25px rgba(22,55,34,.20);
        }
        .btn-checkout:hover { color: white; transform: translateY(-2px); }

        .secure-checkout {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            font-size: 9px;
            margin-top: 13px;
        }
        .secure-checkout i { color: var(--green-600); }

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
            background: #fff;
        }
        .trust-card i { display: block; color: var(--green-700); font-size: 16px; margin-bottom: 5px; }
        .trust-card span { color: var(--text-muted); font-size: 8px; font-weight: 700; line-height: 1.3; }

        /* ===================== EMPTY CART ===================== */
        .empty-cart {
            max-width: 700px;
            margin: 35px auto;
            padding: 70px 25px;
            text-align: center;
            border-radius: var(--radius-xl);
            background: rgba(255,255,255,.92);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }
        .empty-cart::before {
            content: "";
            position: absolute;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: var(--green-50);
            top: -130px; left: -100px;
        }
        .empty-cart::after {
            content: "";
            position: absolute;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: var(--orange-light);
            bottom: -100px; right: -70px;
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
        }
        .empty-title {
            position: relative; z-index: 1;
            font-family: 'Playfair Display', serif;
            color: var(--green-950);
            font-size: 29px;
            margin-bottom: 10px;
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
        }
        .btn-shop:hover { color: white; background: var(--green-700); }

        /* ===================== MODAL ===================== */
        .modal-backdrop.show { opacity: .72; }
        .modal-content {
            border: 0;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 30px 100px rgba(0,0,0,.20);
        }
        .checkout-modal-header {
            padding: 24px 28px;
            background: linear-gradient(135deg, var(--green-950), var(--green-800));
            color: white;
            position: relative;
            overflow: hidden;
        }
        .modal-eyebrow { color: #a9d9b2; font-size: 9px; font-weight: 800; letter-spacing: 1.3px; text-transform: uppercase; }
        .modal-title { font-family: 'Playfair Display', serif; font-size: 25px; margin-top: 5px; }
        .modal-subtitle { color: rgba(255,255,255,.68); font-size: 11px; }
        .modal-header .btn-close { filter: brightness(0) invert(1); opacity: .7; }
        .modal-body { padding: 28px; }
        .form-section-title {
            color: var(--green-950);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .form-label { color: #4d5850; font-size: 10px; font-weight: 800; margin-bottom: 6px; }
        .form-control {
            border: 1px solid var(--border-dark);
            border-radius: 11px;
            padding: 11px 13px;
            color: var(--text);
            font-size: 12px;
            background: #fff;
        }
        .form-control:focus { border-color: var(--green-600); box-shadow: 0 0 0 4px rgba(55,131,76,.10); }
        .input-group-text {
            border: 1px solid var(--border-dark);
            border-right: 0;
            background: var(--green-50);
            color: var(--green-700);
            border-radius: 11px 0 0 11px;
        }
        .input-group .form-control { border-left: 0; border-radius: 0 11px 11px 0; }

        .order-preview {
            height: 100%;
            padding: 22px;
            border-radius: 18px;
            background: var(--green-50);
            border: 1px solid #deeadf;
        }
        .preview-title { font-family: 'Playfair Display', serif; color: var(--green-950); font-size: 21px; margin-bottom: 18px; }
        .preview-row { display: flex; justify-content: space-between; color: var(--text-soft); font-size: 11px; margin-bottom: 12px; }
        .preview-row strong { color: var(--text); }
        .preview-total {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-top: 17px;
            border-top: 1px dashed #d2ddd4;
            margin-top: 18px;
        }
        .preview-total span:first-child { color: var(--green-950); font-size: 12px; font-weight: 800; }
        .preview-total-value { color: var(--green-800); font-size: 25px; font-weight: 800; }

        .cod-box {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            margin-top: 20px;
            padding: 11px;
            border-radius: 11px;
            background: #fff8e9;
            border: 1px solid #f4e1b8;
            color: #8a6720;
            font-size: 9px;
            line-height: 1.5;
        }
        .cod-box i { color: #c18a20; font-size: 14px; }

        .modal-footer { padding: 17px 28px; border-top: 1px solid var(--border); background: #fafcfb; }
        .btn-cancel {
            border: 1px solid var(--border-dark);
            background: white;
            color: var(--text-soft);
            border-radius: 100px;
            padding: 11px 20px;
            font-size: 11px;
            font-weight: 800;
        }
        .btn-place-order {
            border: 0;
            border-radius: 100px;
            background: var(--green-900);
            color: white;
            padding: 11px 22px;
            font-size: 11px;
            font-weight: 800;
        }
        .btn-place-order:hover { background: var(--green-700); color: white; }

        /* ===================== RECEIPT ===================== */
        .receipt-modal .modal-content { background: #eef1ee; }
        .receipt-body { padding: 10px; }
        .receipt-paper {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 4px;
            padding: 38px;
            box-shadow: 0 15px 50px rgba(0,0,0,.08);
        }
        .receipt-brand { font-family: 'Playfair Display', serif; color: var(--green-950); font-size: 30px; font-weight: 700; }
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
        }
        .receipt-reference { text-align: right; }
        .receipt-reference small { display: block; color: var(--text-muted); font-size:12px; text-transform: uppercase; letter-spacing: .8px; }
        .receipt-reference strong { color: var(--green-950); font-family: monospace; font-size: 13px; }
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
        }
        .receipt-meta strong { color: var(--text); }
        .customer-box { padding: 16px; background: #f7f9f7; border-radius: 12px; margin-bottom: 25px; }
        .customer-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 5px;
        }
        .customer-name { color: var(--green-950); font-size: 12px; font-weight: 800; }
        .customer-detail { color: var(--text-soft); font-size: 12px; margin-top: 2px; }
        .receipt-table { width: 100%; border-collapse: collapse; }
        .receipt-table th {
            padding: 9px 0;
            border-bottom: 1px solid var(--border);
            color: var(--text-muted);
            font-size: 8px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
        }
        .receipt-table td {
            padding: 11px 0;
            border-bottom: 1px solid #f1f3f1;
            color: var(--text-soft);
            font-size: 14px;
        }
        .receipt-table td:first-child { color: var(--text); font-weight: 700; }
        .receipt-total { display: flex; justify-content: flex-end; gap: 30px; padding-top: 18px; font-weight: 800; }
        .receipt-total-value { color: var(--green-800); font-size: 18px; }
        .receipt-footer {
            text-align: center;
            border-top: 1px dashed var(--border-dark);
            margin-top: 25px;
            padding-top: 20px;
            color: var(--text-muted);
            font-size: 9px;
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
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(18px);
            box-shadow: 0 15px 50px rgba(0,0,0,.18);
            border: 1px solid rgba(16,40,26,.08);
        }
        .mobile-total { color: var(--green-950); font-size: 9px; font-weight: 700; }
        .mobile-total strong { display: block; font-size: 17px; color: var(--green-800); }
        .mobile-checkout-btn {
            border: 0;
            border-radius: 13px;
            background: var(--green-900);
            color: white;
            padding: 12px 17px;
            font-size: 11px;
            font-weight: 800;
        }

        /* =====================================================
           QR PAYMENT MODAL — NEW DESIGN
        ===================================================== */

        .qr-modal .modal-dialog {
            max-width: 920px;
        }

        .qr-modal .modal-content {
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(16,45,27,.06);
            box-shadow: 0 30px 80px rgba(16,45,27,.25);
            background: #ffffff;
        }

        .qr-modal .modal-body {
            padding: 0;
        }

        /* Grid layout: sidebar + main */
        .pay-card {
            display: grid;
            grid-template-columns: 340px 1fr;
            min-height: 560px;
        }

        /* ---------- LEFT SIDEBAR ---------- */
        .pay-sidebar {
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

        .pay-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
        }
        .pay-brand-icon {
            width: 42px; height: 42px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 13px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.13);
            font-size: 19px;
            color: #a8dfb5;
        }
        .pay-brand-name { font-size: 15px; font-weight: 800; letter-spacing: -.3px; }
        .pay-brand-sub {
            display: block;
            color: rgba(255,255,255,.48);
            font-size: 8.5px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .pay-secure-badge {
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
        .pay-secure-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #72d28b;
            box-shadow: 0 0 0 5px rgba(114,210,139,.10);
            animation: payDotPulse 1.8s infinite;
        }
        @keyframes payDotPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%      { opacity: .55; transform: scale(.8); }
        }

        .pay-title {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            line-height: 1.12;
            margin: 0 0 14px;
            letter-spacing: -.8px;
            color: #fff;
        }
        .pay-desc {
            color: rgba(255,255,255,.60);
            font-size: 11.5px;
            line-height: 1.7;
            margin: 0 0 26px;
            max-width: 240px;
        }

        .pay-steps {
            margin-bottom: 20px;
        }
        .pay-step {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }
        .pay-step-num {
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
        .pay-step-title {
            color: #fff;
            font-size: 10.5px;
            font-weight: 800;
            margin-bottom: 3px;
        }
        .pay-step-text {
            color: rgba(255,255,255,.45);
            font-size: 9px;
            line-height: 1.5;
        }

        .pay-sidebar-footer {
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.09);
            color: rgba(255,255,255,.35);
            font-size: