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
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--ink);
            font-family: "DM Sans", sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
        }

        ::selection {
            background: var(--orange);
            color: white;
        }

        /* =====================================================
           SCROLLBAR
        ===================================================== */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #edf2ed;
        }

        ::-webkit-scrollbar-thumb {
            background: #a9b8ad;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--green);
        }

        /* =====================================================
           TOP BAR
        ===================================================== */

        .top-bar {
            background: var(--forest);
            color: rgba(255,255,255,.78);
            padding: 9px 0;
            font-size: 11px;
            letter-spacing: .1px;
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

        .top-item i {
            color: #f1a06a;
        }

        .top-right a {
            color: rgba(255,255,255,.68);
            transition: .2s ease;
        }

        .top-right a:hover {
            color: white;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255,255,255,.93);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(18,53,36,.07);
        }

        .navbar {
            min-height: 78px;
        }

        .navbar-brand {
            color: var(--forest);
        }

        .navbar-brand img {
            width: 49px;
            height: 49px;
            object-fit: contain;
        }

        .brand-title {
            font-family: "Playfair Display", serif;
            font-size: 21px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .brand-subtitle {
            margin-top: 5px;
            color: #7c887f;
            font-size: 7px;
            font-weight: 800;
            letter-spacing: 2.5px;
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-nav .nav-link {
            position: relative;
            padding: 10px 13px !important;
            color: #59665e;
            font-size: 12px;
            font-weight: 700;
            transition: .25s ease;
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
            transition: .25s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--forest);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            transform: scaleX(1);
        }

        .auth-link {
            border-radius: 50px !important;
        }

        .auth-link::after {
            display: none !important;
        }

        .register-link {
            border: 1px solid #d7e1d9;
            padding: 8px 15px !important;
            color: var(--forest) !important;
        }

        .register-link:hover {
            background: var(--forest);
            border-color: var(--forest);
            color: white !important;
        }

        .login-link {
            padding: 9px 17px !important;
            background: var(--forest);
            color: white !important;
            box-shadow: 0 7px 18px rgba(18,53,36,.18);
        }

        .login-link:hover {
            background: #0c2417;
            color: white !important;
            transform: translateY(-1px);
        }

        /* =====================================================
           CART
        ===================================================== */

        .cart-wrapper {
            margin-left: 5px;
        }

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

        .cart-icon:hover {
            background: var(--orange-soft);
            color: var(--orange) !important;
            transform: translateY(-2px);
        }

        .cart-icon::after {
            display: none !important;
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
            border: 2px solid white;
            border-radius: 50px;
            font-size: 9px;
            font-weight: 900;
        }

        /* =====================================================
           SEARCH
        ===================================================== */

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 205px;
            height: 42px;
            padding: 0 43px 0 16px;
            border: 1px solid var(--border);
            border-radius: 50px;
            outline: none;
            background: #f8faf8;
            color: var(--ink);
            font-size: 11px;
            transition: .25s ease;
        }

        .search-box input::placeholder {
            color: #9aa49d;
        }

        .search-box input:focus {
            width: 225px;
            background: white;
            border-color: #b8cbbb;
            box-shadow: 0 0 0 4px rgba(40,115,70,.07);
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
            transition: .2s ease;
        }

        .search-box button:hover {
            background: var(--orange);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .shop-hero {
            position: relative;
            min-height: 680px;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 80px 0 100px;
            background:
                radial-gradient(circle at 80% 20%, rgba(232,121,47,.11), transparent 23%),
                radial-gradient(circle at 5% 80%, rgba(40,115,70,.10), transparent 28%),
                linear-gradient(135deg, #f1f7f1 0%, #fffdf9 58%, #f8efe7 100%);
        }

        .hero-decoration {
            position: absolute;
            border: 1px solid rgba(40,115,70,.09);
            border-radius: 50%;
            pointer-events: none;
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

        .hero-content {
            position: relative;
            z-index: 2;
        }

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

        .hero-label i {
            color: var(--orange);
            font-size: 13px;
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

        .hero-title span {
            color: var(--orange);
        }

        .hero-description {
            max-width: 570px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
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
            transition: .25s ease;
        }

        .btn-farm:hover {
            background: #0b2517;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(18,53,36,.23);
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
            transition: .25s ease;
        }

        .btn-farm-outline:hover {
            color: var(--orange);
            border-color: var(--orange);
            transform: translateY(-3px);
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 34px;
            margin-top: 39px;
        }

        .hero-stat {
            position: relative;
        }

        .hero-stat:not(:last-child)::after {
            content: "";
            position: absolute;
            right: -18px;
            top: 5px;
            width: 1px;
            height: 35px;
            background: #dce5de;
        }

        .hero-stat strong {
            display: block;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 24px;
            line-height: 1;
        }

        .hero-stat span {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }

        /* =====================================================
           HERO IMAGE
        ===================================================== */

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
        }

        .hero-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s ease;
        }

        .hero-image-card:hover img {
            transform: scale(1.06);
        }

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

        .quality-badge strong {
            font-size: 20px;
            line-height: 1;
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

        .hero-floating strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

        .hero-floating span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 9px;
        }

        /* =====================================================
           TRUST
        ===================================================== */

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

        .trust-item strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

        .trust-item span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 9px;
        }

        /* =====================================================
           SHOP SECTION
        ===================================================== */

        .shop-section {
            padding: 100px 0 90px;
        }

        /* When searching, reduce top padding */
        .shop-section.search-active {
            padding-top: 50px;
        }

        .section-eyebrow {
            margin-bottom: 9px;
            color: var(--orange);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2.2px;
            text-transform: uppercase;
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

        .section-subtitle {
            max-width: 620px;
            margin: auto;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.85;
        }

        /* =====================================================
           CATEGORY QUICK NAV
        ===================================================== */

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
            background: white;
            color: #627067;
            font-size: 10px;
            font-weight: 800;
            transition: .25s ease;
        }

        .category-pill i {
            color: var(--green);
        }

        .category-pill:hover {
            border-color: var(--green);
            background: var(--forest);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .category-pill:hover i {
            color: #9bd1a8;
        }

        /* =====================================================
           TOOLBAR
        ===================================================== */

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
            background: white;
            box-shadow: var(--shadow-xs);
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

        .result-info strong {
            display: block;
            color: var(--forest);
            font-size: 11px;
        }

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
            transition: .2s ease;
        }

        .clear-btn:hover {
            border-color: var(--forest);
            background: var(--forest);
            color: white;
        }

        /* =====================================================
           CATEGORY BLOCK
        ===================================================== */

        .category-block {
            margin-bottom: 78px;
        }

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

        .category-title {
            margin: 0;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 28px;
            line-height: 1;
            font-weight: 800;
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

        /* =====================================================
           PRODUCT CARD
        ===================================================== */

        .product-card {
            position: relative;
            height: 100%;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: white;
            box-shadow: var(--shadow-xs);
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }

        .product-card:hover {
            transform: translateY(-9px);
            border-color: #d8e5da;
            box-shadow: var(--shadow-lg);
        }

        .product-image-wrap {
            position: relative;
            height: 245px;
            overflow: hidden;
            background: #f1f5f1;
        }

        .product-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .65s cubic-bezier(.2,.7,.2,1);
        }

        .product-card:hover .product-image-wrap img {
            transform: scale(1.09);
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

        .fresh-label i {
            color: var(--orange);
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
            transition: .2s ease;
        }

        .product-heart:hover {
            background: white;
            color: var(--orange);
            transform: scale(1.08);
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

        .price-label {
            display: block;
            margin-top: 1px;
            color: #9ba49e;
            font-size: 8px;
            font-weight: 600;
        }

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
            transition: .25s ease;
        }

        .add-cart-btn:hover {
            background: var(--orange);
            color: white;
            transform: translateY(-2px);
        }

        .add-cart-btn.added {
            background: #318a50;
        }

        .add-cart-btn:disabled {
            opacity: .85;
            cursor: wait;
        }

        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            padding: 90px 25px;
            border: 1px dashed #cfdcd2;
            border-radius: 30px;
            background: white;
            text-align: center;
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

        .empty-state h3 {
            margin: 21px 0 7px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 26px;
        }

        .empty-state p {
            max-width: 450px;
            margin: 0 auto 22px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* =====================================================
           FARM STORY
        ===================================================== */

        .story-section {
            position: relative;
            overflow: hidden;
            padding: 105px 0;
            background: var(--forest);
            color: white;
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

        .story-image-wrap {
            position: relative;
        }

        .story-image {
            height: 430px;
            overflow: hidden;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0,0,0,.28);
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .8s ease;
        }

        .story-image-wrap:hover img {
            transform: scale(1.05);
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

        .story-small-card i {
            color: var(--orange);
            font-size: 20px;
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

        .story-content .section-eyebrow {
            color: #f0a16e;
        }

        .story-content .section-title {
            color: white;
        }

        .story-description {
            max-width: 510px;
            color: rgba(255,255,255,.64);
            font-size: 13px;
            line-height: 1.9;
        }

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

        .story-list i {
            color: #9dd2a7;
            font-size: 13px;
        }

        /* =====================================================
           PROMO BANNER
        ===================================================== */

        .shop-banner {
            padding: 100px 0;
        }

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

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .banner-content .section-eyebrow {
            color: #f3a774;
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

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            position: relative;
            overflow: hidden;
            padding-top: 70px;
            background: #091b11;
            color: white;
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

        .footer-brand {
            color: white;
            font-family: "Playfair Display", serif;
            font-size: 27px;
            font-weight: 800;
        }

        .footer-description {
            max-width: 330px;
            margin-top: 13px;
            color: rgba(255,255,255,.47);
            font-size: 11px;
            line-height: 1.9;
        }

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
            transition: .25s ease;
        }

        .social-link:hover {
            background: var(--orange);
            border-color: var(--orange);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            margin-bottom: 18px;
            color: white;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 11px;
        }

        .footer-links a {
            color: rgba(255,255,255,.47);
            font-size: 11px;
            transition: .2s ease;
        }

        .footer-links a:hover {
            padding-left: 4px;
            color: white;
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

        .footer-contact i {
            flex: 0 0 auto;
            color: #e68a52;
            font-size: 13px;
        }

        .footer-bottom {
            margin-top: 55px;
            padding: 20px 0;
            border-top: 1px solid rgba(255,255,255,.07);
            color: rgba(255,255,255,.3);
            font-size: 9px;
        }

        /* =====================================================
           TOAST
        ===================================================== */

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
            transition: .4s cubic-bezier(.2,.7,.2,1);
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

        /* =====================================================
           ANIMATIONS
        ===================================================== */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content > * {
            animation: fadeUp .7s ease both;
        }

        .hero-label {
            animation-delay: .05s;
        }

        .hero-title {
            animation-delay: .12s;
        }

        .hero-description {
            animation-delay: .2s;
        }

        .hero-actions {
            animation-delay: .28s;
        }

        .hero-stats {
            animation-delay: .35s;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1199px) {
            .navbar-nav .nav-link {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }

            .search-box input {
                width: 165px;
            }

            .search-box input:focus {
                width: 180px;
            }
        }

        @media (max-width: 991px) {

            .top-right {
                display: none;
            }

            .navbar {
                padding: 11px 0;
            }

            .navbar-collapse {
                margin-top: 13px;
                padding: 15px;
                border: 1px solid var(--border);
                border-radius: 20px;
                background: white;
                box-shadow: var(--shadow-sm);
            }

            .navbar-nav {
                align-items: stretch;
            }

            .navbar-nav .nav-link {
                padding: 11px 10px !important;
            }

            .register-link,
            .login-link {
                margin-top: 5px;
                text-align: center;
            }

            .cart-wrapper {
                margin: 9px 0;
            }

            .cart-icon {
                margin-left: 0;
            }

            .search-box {
                margin-top: 8px;
            }

            .search-box input,
            .search-box input:focus {
                width: 100%;
            }

            .shop-hero {
                min-height: auto;
                padding: 70px 0 90px;
            }

            .hero-visual {
                margin-top: 55px;
            }

            .hero-image-card {
                height: 460px;
            }

            .story-content {
                padding-left: 0;
                margin-top: 45px;
            }

            .story-small-card {
                right: 15px;
            }

            .banner-card {
                min-height: 350px;
            }
        }

        @media (max-width: 767px) {

            .top-left {
                width: 100%;
                justify-content: center;
            }

            .top-item.hide-mobile {
                display: none;
            }

            .shop-hero {
                padding: 60px 0 75px;
            }

            .hero-title {
                font-size: 46px;
                letter-spacing: -2px;
            }

            .hero-description {
                font-size: 13px;
            }

            .hero-stats {
                gap: 25px;
            }

            .hero-stat:not(:last-child)::after {
                display: none;
            }

            .hero-image-card {
                height: 390px;
                border-radius: 29px;
            }

            .quality-badge {
                right: 2px;
            }

            .hero-floating {
                left: 3px;
                bottom: 28px;
            }

            .trust-wrapper {
                margin-top: -30px;
            }

            .trust-card {
                padding: 16px;
            }

            .trust-item {
                padding: 6px 0;
            }

            .shop-section {
                padding: 75px 0;
            }

            .shop-section.search-active {
                padding-top: 35px;
            }

            .category-nav {
                justify-content: flex-start;
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 7px;
            }

            .category-pill {
                flex: 0 0 auto;
            }

            .shop-toolbar {
                align-items: flex-start;
            }

            .category-line {
                display: none;
            }

            .category-title {
                font-size: 25px;
            }

            .product-image-wrap {
                height: 225px;
            }

            .story-section {
                padding: 75px 0;
            }

            .story-image {
                height: 330px;
            }

            .shop-banner {
                padding: 75px 0;
            }

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

            .hero-title {
                font-size: 39px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .btn-farm,
            .btn-farm-outline {
                width: 100%;
            }

            .hero-stats {
                gap: 18px;
            }

            .hero-stat strong {
                font-size: 21px;
            }

            .hero-image-card {
                height: 350px;
            }

            .hero-image-caption strong {
                font-size: 18px;
            }

            .quality-badge {
                width: 82px;
                height: 82px;
                border-width: 5px;
            }

            .quality-badge strong {
                font-size: 16px;
            }

            .quality-badge span {
                font-size: 6px;
            }

            .product-body {
                padding: 17px;
            }

            .product-name {
                font-size: 18px;
            }

            .product-price {
                font-size: 16px;
            }

            .add-cart-btn {
                padding: 9px 11px;
            }

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
                    alt="Farm Fresh Logo"
                >

                <div>
                    <div class="brand-title">
                        Farm Fresh
                    </div>

                    <div class="brand-subtitle">
                        ORGANIC PRODUCTS
                    </div>
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
                        <a
                            href="{{ route('homeforclient') }}"
                            class="nav-link">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('shoppage') }}"
                            class="nav-link active">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('about') }}"
                            class="nav-link">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('contact') }}"
                            class="nav-link">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item cart-wrapper">
                        <a
                            href="{{ route('cart') }}"
                            class="nav-link cart-icon"
                            aria-label="Shopping cart">

                            <i class="bi bi-bag"></i>

                            <span
                                class="cart-badge"
                                id="cart-count">
                                0
                            </span>

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

                            <button
                                type="submit"
                                aria-label="Search">

                                <i class="bi bi-search"></i>

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

</header>


{{-- =========================================================
     HERO + TRUST STRIP
     Only visible when NOT searching and NO category filter.
========================================================= --}}

@if($search === '' && !$category)

    <!-- =========================================================
         HERO
    ========================================================= -->

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

                            <a
                                href="#products"
                                class="btn-farm">

                                Explore Collection
                                <i class="bi bi-arrow-right"></i>

                            </a>

                            <a
                                href="{{ route('about') }}"
                                class="btn-farm-outline">

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

                                    <small>
                                        Farm collection
                                    </small>

                                    <strong>
                                        Fresh. Natural. Simple.
                                    </strong>

                                </div>

                                <div class="hero-image-arrow">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                            </div>

                        </div>


                        <div class="quality-badge">

                            <strong>100%</strong>

                            <span>
                                FARM QUALITY
                            </span>

                        </div>


                        <div class="hero-floating">

                            <div class="floating-icon">
                                <i class="bi bi-flower1"></i>
                            </div>

                            <div>

                                <strong>
                                    Farm Fresh
                                </strong>

                                <span>
                                    Selected with care
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         TRUST STRIP
    ========================================================= -->

    <div class="container trust-wrapper">

        <div class="trust-card">

            <div class="row g-3">

                <div class="col-md-3 col-6">

                    <div class="trust-item">

                        <div class="trust-icon">
                            <i class="bi bi-leaf"></i>
                        </div>

                        <div>
                            <strong>Fresh Selection</strong>
                            <span>Carefully selected</span>
                        </div>

                    </div>

                </div>


                <div class="col-md-3 col-6">

                    <div class="trust-item">

                        <div class="trust-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>

                        <div>
                            <strong>Quality Checked</strong>
                            <span>Before delivery</span>
                        </div>

                    </div>

                </div>


                <div class="col-md-3 col-6">

                    <div class="trust-item">

                        <div class="trust-icon">
                            <i class="bi bi-basket2"></i>
                        </div>

                        <div>
                            <strong>Easy Shopping</strong>
                            <span>Simple ordering</span>
                        </div>

                    </div>

                </div>


                <div class="col-md-3 col-6">

                    <div class="trust-item">

                        <div class="trust-icon">
                            <i class="bi bi-truck"></i>
                        </div>

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

        <!-- PAGE TITLE -->

        <div class="text-center">

            <div class="section-eyebrow">
                Our collection
            </div>


            @if($search !== '')

                <h1 class="section-title">
                    Search Results
                </h1>

                <p class="section-subtitle">
                    Showing products matching
                    <strong>"{{ $search }}"</strong>
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


        <!-- CATEGORY QUICK NAV -->

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


        <!-- TOOLBAR -->

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

                <a
                    href="{{ route('shoppage') }}"
                    class="clear-btn">

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


        <!-- EMPTY -->

        @if(($search !== '' || $category) && $allEmpty)

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>
                    No products found
                </h3>

                <p>
                    We couldn't find products matching your search.
                    Try another keyword or browse our complete collection.
                </p>

                <a
                    href="{{ route('shoppage') }}"
                    class="btn-farm">

                    Browse All Products
                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        @else


            <!-- =================================================
                 VEGETABLES
            ================================================= -->

            @if($vegetables->isNotEmpty())

                <div class="category-block" id="vegetables">

                    <div class="category-heading">

                        <div class="category-title-wrap">

                            <div class="category-icon">
                                <i class="bi bi-flower1"></i>
                            </div>

                            <div>

                                <h2 class="category-title">
                                    Vegetables
                                </h2>

                                <p class="category-caption">
                                    Fresh and nutritious farm vegetables
                                </p>

                            </div>

                        </div>

                        <div class="category-line"></div>

                    </div>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($vegetables as $vegetable)

                            <div class="col">

                                <div class="product-card">

                                    <div class="product-image-wrap">

                                        <img
                                            src="{{ $vegetable->image }}"
                                            alt="{{ $vegetable->name }}"
                                            loading="lazy">

                                        <div class="product-overlay"></div>

                                        <span class="fresh-label">
                                            <i class="bi bi-leaf-fill"></i>
                                            Fresh
                                        </span>

                                        <button
                                            type="button"
                                            class="product-heart"
                                            aria-label="Favorite product">

                                            <i class="bi bi-heart"></i>

                                        </button>

                                    </div>


                                    <div class="product-body">

                                        <div class="product-category">
                                            Vegetable
                                        </div>

                                        <h3 class="product-name">
                                            {{ $vegetable->name }}
                                        </h3>

                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($vegetable->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>

                                                <div class="product-price">
                                                    ${{ number_format($vegetable->price, 2) }}
                                                </div>

                                                <span class="price-label">
                                                    Farm price
                                                </span>

                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $vegetable->id }}"
                                                data-product-type="vegetable">

                                                <i class="bi bi-bag-plus"></i>
                                                Add

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- =================================================
                 FRUITS
            ================================================= -->

            @if($fruits->isNotEmpty())

                <div class="category-block" id="fruits">

                    <div class="category-heading">

                        <div class="category-title-wrap">

                            <div class="category-icon">
                                <i class="bi bi-apple"></i>
                            </div>

                            <div>

                                <h2 class="category-title">
                                    Fruits
                                </h2>

                                <p class="category-caption">
                                    Naturally sweet and full of freshness
                                </p>

                            </div>

                        </div>

                        <div class="category-line"></div>

                    </div>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($fruits as $fruit)

                            <div class="col">

                                <div class="product-card">

                                    <div class="product-image-wrap">

                                        <img
                                            src="{{ $fruit->image }}"
                                            alt="{{ $fruit->name }}"
                                            loading="lazy">

                                        <div class="product-overlay"></div>

                                        <span class="fresh-label">
                                            <i class="bi bi-stars"></i>
                                            Fresh
                                        </span>

                                        <button
                                            type="button"
                                            class="product-heart"
                                            aria-label="Favorite product">

                                            <i class="bi bi-heart"></i>

                                        </button>

                                    </div>


                                    <div class="product-body">

                                        <div class="product-category">
                                            Fruit
                                        </div>

                                        <h3 class="product-name">
                                            {{ $fruit->name }}
                                        </h3>

                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($fruit->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>

                                                <div class="product-price">
                                                    ${{ number_format($fruit->price, 2) }}
                                                </div>

                                                <span class="price-label">
                                                    Farm price
                                                </span>

                                            </div>

                                            <button
                                                class="add-cart-btn add-to-fruit-cart"
                                                data-fruit-id="{{ $fruit->id }}">

                                                <i class="bi bi-bag-plus"></i>
                                                Add

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- =================================================
                 FRESH NUTS
            ================================================= -->

            @if($freshNuts->isNotEmpty())

                <div class="category-block" id="fresh-nuts">

                    <div class="category-heading">

                        <div class="category-title-wrap">

                            <div class="category-icon">
                                <i class="bi bi-circle"></i>
                            </div>

                            <div>

                                <h2 class="category-title">
                                    Fresh Nuts
                                </h2>

                                <p class="category-caption">
                                    Carefully selected nutritious nuts
                                </p>

                            </div>

                        </div>

                        <div class="category-line"></div>

                    </div>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($freshNuts as $freshnut)

                            <div class="col">

                                <div class="product-card">

                                    <div class="product-image-wrap">

                                        <img
                                            src="{{ $freshnut->image }}"
                                            alt="{{ $freshnut->name }}"
                                            loading="lazy">

                                        <div class="product-overlay"></div>

                                        <span class="fresh-label">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Quality
                                        </span>

                                        <button
                                            type="button"
                                            class="product-heart"
                                            aria-label="Favorite product">

                                            <i class="bi bi-heart"></i>

                                        </button>

                                    </div>


                                    <div class="product-body">

                                        <div class="product-category">
                                            Fresh Nuts
                                        </div>

                                        <h3 class="product-name">
                                            {{ $freshnut->name }}
                                        </h3>

                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($freshnut->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>

                                                <div class="product-price">
                                                    ${{ number_format($freshnut->price, 2) }}
                                                </div>

                                                <span class="price-label">
                                                    Farm price
                                                </span>

                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $freshnut->id }}"
                                                data-product-type="freshnut">

                                                <i class="bi bi-bag-plus"></i>
                                                Add

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- =================================================
                 FARM ANIMALS
            ================================================= -->

            @if($animalFarms->isNotEmpty())

                <div class="category-block" id="farm-animals">

                    <div class="category-heading">

                        <div class="category-title-wrap">

                            <div class="category-icon">
                                <i class="bi bi-heart"></i>
                            </div>

                            <div>

                                <h2 class="category-title">
                                    Farm Animals
                                </h2>

                                <p class="category-caption">
                                    Products from healthy farm animals
                                </p>

                            </div>

                        </div>

                        <div class="category-line"></div>

                    </div>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($animalFarms as $farmanimal)

                            <div class="col">

                                <div class="product-card">

                                    <div class="product-image-wrap">

                                        <img
                                            src="{{ $farmanimal->image }}"
                                            alt="{{ $farmanimal->name }}"
                                            loading="lazy">

                                        <div class="product-overlay"></div>

                                        <span class="fresh-label">
                                            <i class="bi bi-heart-fill"></i>
                                            Farm
                                        </span>

                                        <button
                                            type="button"
                                            class="product-heart"
                                            aria-label="Favorite product">

                                            <i class="bi bi-heart"></i>

                                        </button>

                                    </div>


                                    <div class="product-body">

                                        <div class="product-category">
                                            Farm Animal
                                        </div>

                                        <h3 class="product-name">
                                            {{ $farmanimal->name }}
                                        </h3>

                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($farmanimal->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>

                                                <div class="product-price">
                                                    ${{ number_format($farmanimal->price, 2) }}
                                                </div>

                                                <span class="price-label">
                                                    Farm price
                                                </span>

                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $farmanimal->id }}"
                                                data-product-type="farmanimal">

                                                <i class="bi bi-bag-plus"></i>
                                                Add

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- =================================================
                 EGGS
            ================================================= -->

            @if($eggs->isNotEmpty())

                <div class="category-block" id="eggs">

                    <div class="category-heading">

                        <div class="category-title-wrap">

                            <div class="category-icon">
                                <i class="bi bi-egg"></i>
                            </div>

                            <div>

                                <h2 class="category-title">
                                    Farm Fresh Eggs
                                </h2>

                                <p class="category-caption">
                                    Fresh eggs selected directly from the farm
                                </p>

                            </div>

                        </div>

                        <div class="category-line"></div>

                    </div>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                        @foreach ($eggs as $egg)

                            <div class="col">

                                <div class="product-card">

                                    <div class="product-image-wrap">

                                        <img
                                            src="{{ $egg->image }}"
                                            alt="{{ $egg->name }}"
                                            loading="lazy">

                                        <div class="product-overlay"></div>

                                        <span class="fresh-label">
                                            <i class="bi bi-egg-fill"></i>
                                            Farm Fresh
                                        </span>

                                        <button
                                            type="button"
                                            class="product-heart"
                                            aria-label="Favorite product">

                                            <i class="bi bi-heart"></i>

                                        </button>

                                    </div>


                                    <div class="product-body">

                                        <div class="product-category">
                                            Eggs
                                        </div>

                                        <h3 class="product-name">
                                            {{ $egg->name }}
                                        </h3>

                                        <p class="product-description">
                                            {{ \Illuminate\Support\Str::limit($egg->description, 70, '...') }}
                                        </p>

                                        <div class="product-bottom">

                                            <div>

                                                <div class="product-price">
                                                    ${{ number_format($egg->price, 2) }}
                                                </div>

                                                <span class="price-label">
                                                    Farm price
                                                </span>

                                            </div>

                                            <button
                                                class="add-cart-btn add-to-cart"
                                                data-product-id="{{ $egg->id }}"
                                                data-product-type="egg">

                                                <i class="bi bi-bag-plus"></i>
                                                Add

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

                            <strong>
                                Grown with care
                            </strong>

                            <span>
                                Quality comes first
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="story-content">

                    <div class="section-eyebrow">
                        Why Farm Fresh
                    </div>

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

                        <a
                            href="{{ route('about') }}"
                            class="btn-farm">

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

                <a
                    href="#products"
                    class="btn-farm mt-2">

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

<div
    class="farm-toast"
    id="farmToast">

    <i class="bi bi-check-lg"></i>

    <div>

        <strong id="toastTitle">
            Added to cart
        </strong>

        <span id="toastMessage">
            Product added successfully.
        </span>

    </div>

</div>


<!-- =========================================================
     BOOTSTRAP
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> 
 
 
<!-- ========================================================= 
     CART JAVASCRIPT 
========================================================= --> 
 
<script> 
 
document.addEventListener('DOMContentLoaded', function () { 
 
    const cartCount = 
        document.getElementById('cart-count'); 
 
    const csrfToken = 
        document.querySelector( 
            'meta[name="csrf-token"]' 
        ).content; 
 
    const toast = 
        document.getElementById('farmToast'); 
 
    const toastTitle = 
        document.getElementById('toastTitle'); 
 
    const toastMessage = 
        document.getElementById('toastMessage'); 
 
 
    /* ===================================================== 
       TOAST 
    ===================================================== */ 
 
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
 
 
    /* ===================================================== 
       CART COUNT 
    ===================================================== */ 
 
    function setCartCount(count) { 
 
        const numericCount = 
            Number(count) || 0; 
 
        cartCount.textContent = 
            numericCount; 
 
        cartCount.style.display = 
            numericCount > 0 
                ? 'flex' 
                : 'none'; 
    } 
 
 
    function updateCartCount() { 
 
        fetch('{{ route("cart.count") }}') 
 
            .then(response => { 
 
                if (!response.ok) { 
 
                    throw new Error( 
                        'Unable to get cart count.' 
                    ); 
 
                } 
 
                return response.json(); 
 
            }) 
 
            .then(data => { 
 
                setCartCount(data.count); 
 
            }) 
 
            .catch(error => { 
 
                console.error( 
                    'Cart count error:', 
                    error 
                ); 
 
            }); 
 
    } 
 
 
    /* ===================================================== 
       BUTTON STATE 
    ===================================================== */ 
 
    function loadingButton(button) { 
 
        button.disabled = true; 
 
        button.innerHTML = 
            '<i class="bi bi-arrow-repeat"></i> Adding'; 
    } 
 
 
    function successButton(button, originalHTML) { 
 
        button.classList.add('added'); 
 
        button.innerHTML = 
            '<i class="bi bi-check-lg"></i> Added'; 
 
        setTimeout(function () { 
 
            button.classList.remove('added'); 
 
            button.innerHTML = 
                originalHTML; 
 
            button.disabled = false; 
 
        }, 1400); 
    } 
 
 
    function resetButton(button, originalHTML) { 
 
        button.innerHTML = 
            originalHTML; 
 
        button.disabled = false; 
    } 
 
 
    /* ===================================================== 
       NORMAL PRODUCTS 
       Vegetable / Fresh Nut / Farm Animal / Egg 
    ===================================================== */ 
 
    document 
        .querySelectorAll('.add-to-cart') 
        .forEach(function (button) { 
 
            button.addEventListener( 
                'click', 
                function () { 
 
                    const productId = 
                        this.dataset.productId; 
 
                    const productType = 
                        this.dataset.productType || ''; 
 
                    const originalHTML = 
                        this.innerHTML; 
 
                    loadingButton(this); 
 
 
                    fetch( 
                        `/cart/add/${productId}`, 
                        { 
                            method: 'POST', 
 
                            headers: { 
                                'Content-Type': 
                                    'application/json', 
 
                                'X-CSRF-TOKEN': 
                                    csrfToken, 
 
                                'Accept': 
                                    'application/json' 
                            }, 
 
                            body: 
                                JSON.stringify({ 
                                    type: 
                                        productType 
                                }) 
                        } 
                    ) 
 
                    .then(function (response) { 
 
                        if (!response.ok) { 
 
                            throw new Error( 
                                'Unable to add product.' 
                            ); 
 
                        } 
 
                        return response.json(); 
 
                    }) 
 
                    .then( 
                        function (data) { 
 
                            if (data.success) { 
 
                                setCartCount( 
                                    data.count 
                                ); 
 
                                successButton( 
                                    button, 
                                    originalHTML 
                                ); 
 
                                showToast( 
                                    'Added to cart', 
                                    'Your product was added successfully.' 
                                ); 
 
                            } else { 
 
                                resetButton( 
                                    button, 
                                    originalHTML 
                                ); 
 
                                showToast( 
                                    'Could not add product', 
                                    data.message || 
                                    'Please try again.' 
                                ); 
 
                            } 
 
                        } 
                    ) 
 
                    .catch( 
                        function (error) { 
 
                            console.error( 
                                'Add to cart failed:', 
                                error 
                            ); 
 
                            resetButton( 
                                button, 
                                originalHTML 
                            ); 
 
                            showToast( 
                                'Something went wrong', 
                                'Please try again.' 
                            ); 
 
                        } 
                    ); 
 
                } 
            ); 
 
        }); 
 
 
    /* ===================================================== 
       FRUIT PRODUCTS 
    ===================================================== */ 
 
    document 
        .querySelectorAll('.add-to-fruit-cart') 
        .forEach(function (button) { 
 
            button.addEventListener( 
                'click', 
                function () { 
 
                    const fruitId = 
                        this.dataset.fruitId; 
 
                    const originalHTML = 
                        this.innerHTML; 
 
                    loadingButton(this); 
 
 
                    fetch( 
                        `/cart/add-fruit/${fruitId}`, 
                        { 
                            method: 'POST', 
 
                            headers: { 
                                'Content-Type': 
                                    'application/json', 
 
                                'X-CSRF-TOKEN': 
                                    csrfToken, 
 
                                'Accept': 
                                    'application/json' 
                            }, 
 
                            body: 
                                JSON.stringify({ 
                                    type: 'fruit' 
                                }) 
                        } 
                    ) 
 
                    .then(function (response) { 
 
                        if (!response.ok) { 
 
                            throw new Error( 
                                'Unable to add fruit.' 
                            ); 
 
                        } 
 
                        return response.json(); 
 
                    }) 
 
                    .then( 
                        function (data) { 
 
                            if (data.success) { 
 
                                setCartCount( 
                                    data.count 
                                ); 
 
                                successButton( 
                                    button, 
                                    originalHTML 
                                ); 
 
                                showToast( 
                                    'Added to cart', 
                                    'Fresh fruit added successfully.' 
                                ); 
 
                            } else { 
 
                                resetButton( 
                                    button, 
                                    originalHTML 
                                ); 
 
                                showToast( 
                                    'Could not add fruit', 
                                    data.message || 
                                    'Please try again.' 
                                ); 
 
                            } 
 
                        } 
                    ) 
 
                    .catch( 
                        function (error) { 
 
                            console.error( 
                                'Add fruit failed:', 
                                error 
                            ); 
 
                            resetButton( 
                                button, 
                                originalHTML 
                            ); 
 
                            showToast( 
                                'Something went wrong', 
                                'Please try again.' 
                            ); 
 
                        } 
                    ); 
 
                } 
            ); 
 
        }); 
 
 
    /* ===================================================== 
       FAVORITE BUTTON VISUAL 
    ===================================================== */ 
 
    document 
        .querySelectorAll('.product-heart') 
        .forEach(function (button) { 
 
            button.addEventListener( 
                'click', 
                function () { 
 
                    const icon = 
                        this.querySelector('i'); 
 
                    icon.classList.toggle( 
                        'bi-heart' 
                    ); 
 
                    icon.classList.toggle( 
                        'bi-heart-fill' 
                    ); 
 
                    this.classList.toggle( 
                        'active' 
                    ); 
 
                } 
            ); 
 
        }); 
 
 
    /* ===================================================== 
       INITIAL CART COUNT 
    ===================================================== */ 
 
    updateCartCount(); 
 
}); 
 
</script> 
 
</body> 
</html>