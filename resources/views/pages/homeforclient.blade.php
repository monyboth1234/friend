
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farm Fresh | From Nature to Your Table</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600;1,700&display=swap"
          rel="stylesheet">

    <style>

        /* =========================================================
           ROOT
        ========================================================= */

        :root {
            --green-950: #071c12;
            --green-900: #0b2819;
            --green-800: #123d25;
            --green: #194c2d;
            --green-600: #28663d;
            --green-500: #3f8155;

            --orange: #e47732;
            --orange-dark: #c85b1c;
            --orange-light: #fff1e7;

            --cream: #f8f6ef;
            --cream-2: #f2eee3;

            --white: #ffffff;

            --text: #26342b;
            --muted: #778079;
            --muted-light: #a1a8a3;

            --border: rgba(20, 60, 38, .10);

            --shadow-sm: 0 10px 30px rgba(9, 45, 27, .07);
            --shadow-md: 0 20px 50px rgba(9, 45, 27, .10);
            --shadow-lg: 0 35px 90px rgba(9, 45, 27, .16);

            --radius-sm: 14px;
            --radius-md: 22px;
            --radius-lg: 32px;
            --radius-xl: 42px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text);
            font-family: "DM Sans", sans-serif;
            overflow-x: hidden;
        }

        ::selection {
            background: var(--orange);
            color: white;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
        }

        .container {
            max-width: 1240px;
        }

        /* =========================================================
           PAGE LOADER
        ========================================================= */

        .page-loader {
            position: fixed;
            inset: 0;
            z-index: 99999;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--green-950);

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

        .loader-leaf {
            width: 65px;
            height: 65px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: auto auto 18px;

            border-radius: 22px;

            background: var(--orange);

            font-size: 26px;

            animation: loaderPulse 1.3s infinite;
        }

        .loader-content strong {
            display: block;
            font-family: "Playfair Display", serif;
            font-size: 28px;
        }

        .loader-content span {
            display: block;
            margin-top: 4px;
            color: rgba(255,255,255,.5);
            font-size: 10px;
            letter-spacing: 3px;
        }

        @keyframes loaderPulse {
            0%,100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }
        }

        /* =========================================================
           SCROLL PROGRESS
        ========================================================= */

        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;

            width: 0;
            height: 3px;

            z-index: 9999;

            background: var(--orange);
        }

        /* =========================================================
           GLOBAL
        ========================================================= */

        .section-padding {
            padding: 115px 0;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            color: var(--orange);

            font-size: 11px;
            font-weight: 800;

            letter-spacing: 2.8px;
            text-transform: uppercase;
        }

        .section-label::before {
            content: "";

            width: 30px;
            height: 2px;

            background: currentColor;
        }

        .section-title {
            margin: 0;

            color: var(--green-800);

            font-family: "Playfair Display", serif;

            font-size: clamp(38px, 5vw, 58px);
            line-height: 1.08;

            font-weight: 700;

            letter-spacing: -1.5px;
        }

        .section-description {
            max-width: 650px;

            color: var(--muted);

            font-size: 14px;
            line-height: 1.9;
        }

        .btn-main,
        .btn-orange,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 11px;

            min-height: 52px;
            padding: 0 25px;

            border-radius: 100px;

            font-size: 13px;
            font-weight: 800;

            transition: .35s ease;
        }

        .btn-main {
            color: white;
            background: var(--green);
            border: 1px solid var(--green);
        }

        .btn-main:hover {
            color: white;
            background: var(--green-900);
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(25,76,45,.22);
        }

        .btn-orange {
            color: white;
            background: var(--orange);
            border: 1px solid var(--orange);
        }

        .btn-orange:hover {
            color: white;
            background: var(--orange-dark);
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(228,119,50,.25);
        }

        .btn-outline {
            color: var(--green);
            background: transparent;
            border: 1px solid rgba(25,76,45,.35);
        }

        .btn-outline:hover {
            color: white;
            background: var(--green);
            border-color: var(--green);
            transform: translateY(-4px);
        }

        /* =========================================================
           TOP BAR
        ========================================================= */

        .top-bar {
            background: var(--green-950);
            color: rgba(255,255,255,.65);

            padding: 9px 0;

            font-size: 11px;
        }

        .top-bar-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-bar i {
            color: #ffae78;
            margin-right: 6px;
        }

        .top-links {
            display: flex;
            gap: 20px;
        }

        .top-links a {
            color: rgba(255,255,255,.6);
            transition: .25s;
        }

        .top-links a:hover {
            color: white;
        }

        /* =========================================================
           NAVBAR
        ========================================================= */

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;

            background: rgba(255,255,255,.92);

            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            border-bottom: 1px solid rgba(0,0,0,.05);
        }

        .navbar {
            min-height: 82px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 49px;
            height: 49px;

            object-fit: cover;

            border-radius: 15px;

            box-shadow: 0 7px 20px rgba(23,63,42,.12);
        }

        .brand-name {
            color: var(--green-800);

            font-size: 20px;
            font-weight: 800;

            line-height: 1;
        }

        .brand-subtitle {
            margin-top: 5px;

            color: #929993;

            font-size: 7px;
            font-weight: 800;

            letter-spacing: 2.5px;
        }

        .navbar-nav {
            gap: 3px;
        }

        .nav-link {
            position: relative;

            padding: 10px 15px !important;

            border-radius: 100px;

            color: #47524b !important;

            font-size: 12px;
            font-weight: 700;

            transition: .3s;
        }

        .nav-link::after {
            content: "";

            position: absolute;

            left: 50%;
            bottom: 4px;

            width: 0;
            height: 2px;

            background: var(--orange);

            transform: translateX(-50%);

            transition: .3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--orange) !important;
            background: var(--orange-light);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 16px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .nav-login {
            color: var(--green);
            font-size: 12px;
            font-weight: 800;
        }

        .nav-register {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 42px;
            padding: 0 19px;

            border-radius: 100px;

            color: white;
            background: var(--green);

            font-size: 12px;
            font-weight: 800;

            transition: .3s;
        }

        .nav-register:hover {
            color: white;
            background: var(--orange);
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border: none;
            box-shadow: none !important;
        }

        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            position: relative;
            overflow: hidden;

            padding: 100px 0 120px;

            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(228,119,50,.13),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 5% 90%,
                    rgba(25,76,45,.10),
                    transparent 30%
                ),
                var(--cream);
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 650px;
            height: 650px;

            right: -350px;
            top: -300px;

            border: 1px solid rgba(25,76,45,.07);

            border-radius: 50%;
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            left: -220px;
            bottom: -230px;

            border: 1px solid rgba(228,119,50,.10);

            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 14px;

            border: 1px solid rgba(25,76,45,.08);

            border-radius: 100px;

            background: rgba(255,255,255,.85);

            color: var(--green);

            box-shadow: var(--shadow-sm);

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .hero-label i {
            color: var(--orange);
        }

        .hero-title {
            margin: 24px 0 0;

            color: var(--green-800);

            font-family: "Playfair Display", serif;

            font-size: clamp(52px, 7vw, 88px);
            line-height: .99;

            font-weight: 700;

            letter-spacing: -3px;
        }

        .hero-title span {
            color: var(--orange);
            font-style: italic;
        }

        .hero-text {
            max-width: 570px;

            margin-top: 27px;

            color: var(--muted);

            font-size: 15px;
            line-height: 1.9;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 11px;

            margin-top: 31px;
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;

            margin-top: 48px;
        }

        .hero-stat {
            position: relative;
        }

        .hero-stat:not(:last-child)::after {
            content: "";

            position: absolute;

            width: 1px;
            height: 35px;

            right: -21px;
            top: 5px;

            background: rgba(25,76,45,.13);
        }

        .hero-stat strong {
            display: block;

            color: var(--green-800);

            font-size: 24px;
            font-weight: 800;
        }

        .hero-stat span {
            display: block;

            margin-top: 3px;

            color: var(--muted-light);

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .8px;
        }

        /* HERO VISUAL */

        .hero-visual {
            position: relative;
            z-index: 2;

            padding: 15px;
        }

        .hero-image-wrapper {
            position: relative;

            padding: 8px;

            border-radius: 38px;

            background: white;

            box-shadow: var(--shadow-lg);

            transform: rotate(1.2deg);
        }

        .hero-image-wrapper::before {
            content: "";

            position: absolute;

            inset: -12px;

            z-index: -1;

            border: 1px solid rgba(25,76,45,.08);

            border-radius: 48px;

            transform: rotate(-2deg);
        }

        .hero-image {
            display: block;

            width: 100%;
            height: 560px;

            object-fit: cover;

            border-radius: 31px;
        }

        .hero-image-overlay {
            position: absolute;
            inset: 8px;

            border-radius: 31px;

            background:
                linear-gradient(
                    to top,
                    rgba(5,30,18,.45),
                    transparent 45%
                );
        }

        .hero-image-caption {
            position: absolute;

            left: 32px;
            bottom: 28px;

            color: white;
        }

        .hero-image-caption small {
            display: block;

            margin-bottom: 5px;

            color: rgba(255,255,255,.7);

            font-size: 10px;

            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-image-caption strong {
            font-family: "Playfair Display", serif;
            font-size: 24px;
        }

        .hero-badge {
            position: absolute;

            left: -20px;
            bottom: 28px;

            width: 155px;

            padding: 18px;

            border-radius: 22px;

            background: white;

            box-shadow: var(--shadow-lg);

            transform: rotate(-4deg);

            z-index: 4;
        }

        .hero-badge-icon {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 10px;

            border-radius: 14px;

            background: var(--orange-light);
            color: var(--orange);
        }

        .hero-badge strong {
            display: block;

            color: var(--green);

            font-size: 14px;
        }

        .hero-badge small {
            color: var(--muted);

            font-size: 9px;
        }

        .hero-floating {
            position: absolute;

            top: 28px;
            right: -18px;

            display: flex;
            align-items: center;
            gap: 9px;

            padding: 12px 17px;

            border-radius: 100px;

            color: white;
            background: var(--green);

            box-shadow: var(--shadow-lg);

            z-index: 5;

            animation: floating 4s ease-in-out infinite;
        }

        .hero-floating i {
            color: #ffd48e;
        }

        .hero-floating span {
            font-size: 10px;
            font-weight: 800;
        }

        @keyframes floating {
            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* =========================================================
           TRUST
        ========================================================= */

        .trust-strip {
            position: relative;
            z-index: 5;

            padding: 23px 0;

            background: var(--green-800);
        }

        .trust-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            color: white;

            font-size: 11px;
            font-weight: 800;
        }

        .trust-item i {
            color: #ffb57f;
            font-size: 17px;
        }

        /* =========================================================
           PRODUCTS
        ========================================================= */

        .products-section {
            background: white;
        }

        .product-card {
            position: relative;

            display: block;

            height: 100%;

            padding: 10px;

            border: 1px solid var(--border);

            border-radius: 27px;

            background: white;

            overflow: hidden;

            transition: .4s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);

            border-color: rgba(228,119,50,.35);

            box-shadow: var(--shadow-lg);
        }

        .product-image {
            position: relative;

            overflow: hidden;

            aspect-ratio: 1 / 1;

            border-radius: 20px;

            background: var(--cream);
        }

        .product-image::after {
            content: "";

            position: absolute;
            inset: 0;

            background: linear-gradient(
                to top,
                rgba(7,28,18,.25),
                transparent 50%
            );

            pointer-events: none;
        }

        .product-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .6s cubic-bezier(.2,.7,.2,1);
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-icon {
            position: absolute;

            right: 12px;
            bottom: 12px;

            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: white;
            color: var(--green);

            box-shadow: 0 7px 20px rgba(0,0,0,.13);

            z-index: 2;

            transition: .3s;
        }

        .product-card:hover .product-icon {
            color: white;
            background: var(--orange);
            transform: rotate(-45deg);
        }

        .product-content {
            padding: 17px 8px 9px;
        }

        .product-content h3 {
            margin: 0;

            color: var(--green-800);

            font-size: 15px;
            font-weight: 800;
        }

        .product-content p {
            margin: 5px 0 0;

            color: var(--muted);

            font-size: 10px;
        }

        /* =========================================================
           MARQUEE
        ========================================================= */

        .marquee {
            overflow: hidden;

            padding: 15px 0;

            background: var(--cream-2);

            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .marquee-track {
            display: flex;
            width: max-content;

            animation: marquee 30s linear infinite;
        }

        .marquee-item {
            display: flex;
            align-items: center;
            gap: 18px;

            margin-right: 55px;

            color: var(--green-600);

            font-family: "Playfair Display", serif;

            font-size: 17px;
            font-weight: 600;
            font-style: italic;
        }

        .marquee-item i {
            color: var(--orange);
            font-size: 12px;
        }

        @keyframes marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* =========================================================
           WHY US
        ========================================================= */

        .why-section {
            background: var(--cream);
        }

        .why-card {
            height: 100%;

            padding: 27px;

            border: 1px solid var(--border);

            border-radius: 23px;

            background: rgba(255,255,255,.8);

            transition: .35s;
        }

        .why-card:hover {
            transform: translateY(-7px);

            background: white;

            box-shadow: var(--shadow-md);
        }

        .why-icon {
            width: 51px;
            height: 51px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            border-radius: 16px;

            background: var(--orange-light);
            color: var(--orange);

            font-size: 19px;

            transition: .3s;
        }

        .why-card:hover .why-icon {
            color: white;
            background: var(--orange);
            transform: rotate(-5deg) scale(1.05);
        }

        .why-card h3 {
            margin-bottom: 8px;

            color: var(--green-800);

            font-size: 15px;
            font-weight: 800;
        }

        .why-card p {
            margin: 0;

            color: var(--muted);

            font-size: 11px;
            line-height: 1.75;
        }

        .farmer-box {
            position: relative;

            max-width: 480px;

            margin: auto;
        }

        .farmer-box::before {
            content: "";

            position: absolute;

            inset: -15px;

            z-index: 0;

            border: 1px solid rgba(25,76,45,.1);

            border-radius: 48px;

            transform: rotate(4deg);
        }

        .farmer-image {
            position: relative;
            z-index: 1;

            width: 100%;
            height: 540px;

            object-fit: cover;

            border-radius: 38px;

            box-shadow: var(--shadow-lg);
        }

        .farmer-label {
            position: absolute;

            left: -25px;
            bottom: 30px;

            z-index: 3;

            padding: 17px 22px;

            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-lg);
        }

        .farmer-label strong {
            display: block;

            color: var(--green);

            font-family: "Playfair Display", serif;

            font-size: 27px;
        }

        .farmer-label span {
            color: var(--muted);

            font-size: 10px;
        }

        /* =========================================================
           WHO WE SERVE
        ========================================================= */

        .industry-section {
            background: white;
        }

        .industry-card {
            position: relative;

            height: 100%;

            padding: 33px 20px;

            text-align: center;

            border: 1px solid var(--border);

            border-radius: 23px;

            background: white;

            overflow: hidden;

            transition: .4s;
        }

        .industry-card::before {
            content: "";

            position: absolute;

            width: 130px;
            height: 130px;

            right: -70px;
            top: -70px;

            border-radius: 50%;

            background: rgba(228,119,50,.08);

            transition: .4s;
        }

        .industry-card:hover {
            color: white;

            background: var(--green-800);

            border-color: var(--green-800);

            transform: translateY(-8px);

            box-shadow: var(--shadow-lg);
        }

        .industry-card:hover::before {
            transform: scale(2.5);
            background: rgba(255,255,255,.06);
        }

        .industry-card i {
            position: relative;

            color: var(--orange);

            font-size: 27px;

            margin-bottom: 17px;

            transition: .3s;
        }

        .industry-card h3 {
            position: relative;

            margin: 0;

            color: var(--green-800);

            font-size: 12px;
            font-weight: 800;

            line-height: 1.6;

            transition: .3s;
        }

        .industry-card:hover h3 {
            color: white;
        }

        .industry-card:hover i {
            color: #ffb57f;

            transform: translateY(-3px);
        }

        /* =========================================================
           DELIVERY
        ========================================================= */

        .delivery-section {
            background: var(--cream);
        }

        .delivery-image-wrap {
            position: relative;
        }

        .delivery-image-wrap::after {
            content: "";

            position: absolute;

            left: -15px;
            bottom: -15px;

            width: 160px;
            height: 160px;

            border: 1px solid rgba(228,119,50,.15);

            border-radius: 30px;

            z-index: 0;
        }

        .delivery-image {
            position: relative;
            z-index: 1;

            width: 100%;
            height: 500px;

            object-fit: cover;

            border-radius: 35px;

            box-shadow: var(--shadow-lg);
        }

        .delivery-floating {
            position: absolute;

            right: -20px;
            top: 30px;

            z-index: 3;

            padding: 15px 18px;

            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-lg);
        }

        .delivery-floating strong {
            display: block;

            color: var(--green);

            font-size: 15px;
        }

        .delivery-floating span {
            color: var(--muted);

            font-size: 9px;
        }

        .delivery-steps {
            margin-top: 30px;
        }

        .delivery-step {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 14px;

            margin-bottom: 11px;

            border: 1px solid var(--border);

            border-radius: 18px;

            background: white;

            transition: .3s;
        }

        .delivery-step:hover {
            transform: translateX(7px);
            box-shadow: var(--shadow-sm);
        }

        .delivery-number {
            width: 43px;
            height: 43px;

            min-width: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            color: white;
            background: var(--green);

            font-size: 10px;
            font-weight: 800;
        }

        .delivery-step strong {
            display: block;

            color: var(--green-800);

            font-size: 12px;
        }

        .delivery-step span {
            display: block;

            margin-top: 2px;

            color: var(--muted);

            font-size: 10px;
        }

        /* =========================================================
           TESTIMONIAL
        ========================================================= */

        .testimonial-section {
            background: white;
        }

        .testimonial-card {
            position: relative;

            height: 100%;

            padding: 29px;

            border: 1px solid var(--border);

            border-radius: 24px;

            background: white;

            overflow: hidden;

            transition: .35s;
        }

        .testimonial-card::before {
            content: "“";

            position: absolute;

            right: 20px;
            top: 3px;

            color: rgba(228,119,50,.08);

            font-family: Georgia, serif;

            font-size: 90px;
            line-height: 1;
        }

        .testimonial-card:hover {
            transform: translateY(-7px);

            box-shadow: var(--shadow-md);
        }

        .testimonial-stars {
            position: relative;

            color: #efa62e;

            font-size: 12px;

            letter-spacing: 2px;

            margin-bottom: 18px;
        }

        .testimonial-text {
            position: relative;

            min-height: 75px;

            color: #505a53;

            font-size: 12px;
            line-height: 1.9;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-top: 21px;
        }

        .author-avatar {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            color: white;
            background: var(--green);

            font-size: 13px;
            font-weight: 800;
        }

        .testimonial-author strong {
            display: block;

            color: var(--green-800);

            font-size: 11px;
        }

        .testimonial-author span {
            display: block;

            margin-top: 2px;

            color: #9da39f;

            font-size: 9px;
        }

        /* REVIEW */

        .review-box {
            max-width: 900px;

            margin: 65px auto 0;

            padding: 34px;

            border: 1px solid var(--border);

            border-radius: 28px;

            background: var(--cream);
        }

        .review-box h4 {
            color: var(--green-800);

            font-size: 19px;
            font-weight: 800;
        }

        .form-control,
        .form-select {
            min-height: 49px;

            border: 1px solid #dedfd9;

            border-radius: 14px;

            padding: 11px 14px;

            background: white;

            font-size: 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--green);

            box-shadow: 0 0 0 4px rgba(25,76,45,.08);
        }

        /* =========================================================
           CTA
        ========================================================= */

        .cta {
            position: relative;
            overflow: hidden;

            padding: 82px 0;

            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(255,255,255,.15),
                    transparent 25%
                ),
                var(--orange);

            color: white;
        }

        .cta::after {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            right: -230px;
            bottom: -280px;

            border: 1px solid rgba(255,255,255,.15);

            border-radius: 50%;
        }

        .cta-title {
            position: relative;
            z-index: 1;

            max-width: 700px;

            font-family: "Playfair Display", serif;

            font-size: clamp(35px, 5vw, 57px);
            line-height: 1.08;

            font-weight: 700;
        }

        .cta-text {
            position: relative;
            z-index: 1;

            max-width: 650px;

            color: rgba(255,255,255,.8);

            font-size: 13px;
            line-height: 1.8;
        }

        .cta .section-label {
            color: white;
        }

        .cta .btn-light {
            position: relative;
            z-index: 2;

            min-height: 53px;

            padding: 0 25px;

            border: none;

            border-radius: 100px;

            color: var(--orange);

            font-size: 12px;
            font-weight: 800;

            transition: .3s;
        }

        .cta .btn-light:hover {
            transform: translateY(-4px);

            box-shadow: 0 18px 35px rgba(95,35,7,.2);
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        footer {
            position: relative;

            padding: 80px 0 25px;

            background: var(--green-950);

            color: white;
        }

        .footer-brand {
            color: white;

            font-family: "Playfair Display", serif;

            font-size: 28px;
            font-weight: 700;
        }

        .footer-subtitle {
            margin-top: 5px;

            color: #ffb477;

            font-size: 8px;
            font-weight: 800;

            letter-spacing: 2.5px;
        }

        .footer-description {
            max-width: 290px;

            margin-top: 17px;

            color: rgba(255,255,255,.48);

            font-size: 11px;
            line-height: 1.9;
        }

        .footer-title {
            margin-bottom: 21px;

            color: #ffad72;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }

        .footer-links {
            padding: 0;
            margin: 0;

            list-style: none;
        }

        .footer-links li {
            margin-bottom: 13px;
        }

        .footer-links a {
            color: rgba(255,255,255,.55);

            font-size: 11px;

            transition: .25s;
        }

        .footer-links a:hover {
            padding-left: 5px;
            color: white;
        }

        .contact-item {
            display: flex;
            gap: 11px;

            margin-bottom: 16px;

            color: rgba(255,255,255,.55);

            font-size: 11px;
        }

        .contact-item i {
            width: 17px;

            color: #ff9b5c;
        }

        .socials {
            display: flex;
            gap: 8px;

            margin-top: 25px;
        }

        .social {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255,255,255,.12);

            border-radius: 50%;

            color: white;

            transition: .3s;
        }

        .social:hover {
            color: white;

            background: var(--orange);
            border-color: var(--orange);

            transform: translateY(-4px);
        }

        .newsletter {
            margin-top: 20px;
        }

        .newsletter-form {
            display: flex;

            padding: 5px;

            border: 1px solid rgba(255,255,255,.12);

            border-radius: 100px;

            background: rgba(255,255,255,.04);
        }

        .newsletter-form input {
            width: 100%;

            border: none;
            outline: none;

            padding: 8px 12px;

            background: transparent;

            color: white;

            font-size: 10px;
        }

        .newsletter-form input::placeholder {
            color: rgba(255,255,255,.4);
        }

        .newsletter-form button {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border: none;

            border-radius: 50%;

            color: white;
            background: var(--orange);

            transition: .3s;
        }

        .newsletter-form button:hover {
            background: white;
            color: var(--orange);
        }

        .copyright {
            margin-top: 60px;

            padding-top: 23px;

            border-top: 1px solid rgba(255,255,255,.08);

            color: rgba(255,255,255,.32);

            font-size: 9px;

            text-align: center;
        }

        /* =========================================================
           TOAST
        ========================================================= */

        #toast {
            position: fixed;

            right: 25px;
            bottom: 25px;

            z-index: 5000;

            display: flex;
            align-items: center;
            gap: 11px;

            max-width: 360px;

            padding: 15px 19px;

            border: 1px solid rgba(255,255,255,.1);

            border-radius: 16px;

            background: var(--green-950);
            color: white;

            box-shadow: var(--shadow-lg);

            transform: translateY(130px);

            opacity: 0;

            transition: .4s;
        }

        #toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        #toast i {
            color: #ffae72;
        }

        #toastMsg {
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================================================
           BACK TO TOP
        ========================================================= */

        .back-top {
            position: fixed;

            right: 24px;
            bottom: 90px;

            width: 43px;
            height: 43px;

            z-index: 1000;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 50%;

            color: white;
            background: var(--green);

            box-shadow: var(--shadow-md);

            opacity: 0;
            visibility: hidden;

            transform: translateY(10px);

            transition: .3s;
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-top:hover {
            background: var(--orange);
            transform: translateY(-3px);
        }

        /* =========================================================
           REVEAL ANIMATION
        ========================================================= */

        .reveal {
            opacity: 0;
            transform: translateY(30px);

            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1199px) {

            .hero-title {
                font-size: 70px;
            }

            .hero-image {
                height: 500px;
            }

            .hero-badge {
                left: 0;
            }

            .hero-floating {
                right: 0;
            }
        }

        @media (max-width: 991px) {

            .top-bar-content {
                justify-content: center;
            }

            .top-links {
                display: none;
            }

            .navbar {
                min-height: 72px;
            }

            .navbar-collapse {
                padding: 15px 0 20px;
            }

            .navbar-nav {
                gap: 4px;
            }

            .nav-link {
                padding: 11px 13px !important;
            }

            .nav-actions {
                margin-top: 10px;
                padding-top: 15px;

                border-top: 1px solid var(--border);
            }

            .hero {
                padding: 70px 0 90px;
            }

            .hero-title {
                font-size: clamp(54px, 9vw, 76px);
            }

            .hero-visual {
                margin-top: 30px;
            }

            .hero-image {
                height: 480px;
            }

            .section-padding {
                padding: 90px 0;
            }

            .farmer-box {
                margin-top: 20px;
            }

            .delivery-image-wrap {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 767px) {

            .section-padding {
                padding: 75px 0;
            }

            .section-title {
                font-size: 39px;
            }

            .hero {
                padding: 55px 0 75px;
            }

            .hero-title {
                font-size: 51px;
                letter-spacing: -2px;
            }

            .hero-text {
                font-size: 13px;
            }

            .hero-stats {
                gap: 28px;
            }

            .hero-stat:not(:last-child)::after {
                display: none;
            }

            .hero-image {
                height: 410px;
            }

            .hero-badge {
                left: -2px;
                bottom: 20px;
                width: 140px;
            }

            .hero-floating {
                right: -2px;
                top: 20px;
            }

            .trust-item {
                justify-content: flex-start;
                font-size: 10px;
            }

            .farmer-image {
                height: 430px;
            }

            .farmer-label {
                left: 10px;
            }

            .delivery-image {
                height: 400px;
            }

            .delivery-floating {
                right: 10px;
            }

            .review-box {
                padding: 23px;
            }

            .cta {
                padding: 65px 0;
            }

            .cta-title {
                font-size: 40px;
            }

            .newsletter {
                max-width: 350px;
            }
        }

        @media (max-width: 575px) {

            .top-bar {
                display: none;
            }

            .brand-logo {
                width: 43px;
                height: 43px;
            }

            .brand-name {
                font-size: 17px;
            }

            .hero-title {
                font-size: 45px;
            }

            .hero-buttons {
                width: 100%;
            }

            .hero-buttons a {
                width: 100%;
            }

            .hero-stats {
                justify-content: space-between;
                gap: 10px;
            }

            .hero-stat strong {
                font-size: 20px;
            }

            .hero-stat span {
                font-size: 8px;
            }

            .hero-image-wrapper {
                padding: 6px;
                border-radius: 28px;
            }

            .hero-image {
                height: 350px;
                border-radius: 23px;
            }

            .hero-image-overlay {
                inset: 6px;
                border-radius: 23px;
            }

            .hero-image-caption {
                left: 24px;
                bottom: 20px;
            }

            .hero-image-caption strong {
                font-size: 20px;
            }

            .hero-badge {
                width: 125px;
                padding: 14px;
            }

            .hero-badge-icon {
                width: 37px;
                height: 37px;
            }

            .hero-floating {
                padding: 10px 12px;
            }

            .hero-floating span {
                font-size: 8px;
            }

            .trust-strip {
                padding: 18px 0;
            }

            .trust-item i {
                font-size: 14px;
            }

            .section-title {
                font-size: 36px;
            }

            .farmer-image {
                height: 350px;
            }

            .delivery-image {
                height: 330px;
            }

            .delivery-floating {
                top: 15px;
                right: 10px;
            }

            .cta-title {
                font-size: 35px;
            }

            #toast {
                left: 15px;
                right: 15px;
                bottom: 15px;
            }

            .back-top {
                right: 15px;
                bottom: 75px;
            }
        }

    </style>
</head>

<body>

<!-- =========================================================
     LOADER
========================================================= -->

<div class="page-loader" id="pageLoader">

    <div class="loader-content">

        <div class="loader-leaf">
            <i class="fa-solid fa-seedling"></i>
        </div>

        <strong>Farm Fresh</strong>

        <span>ORGANIC PRODUCTS</span>

    </div>

</div>


<!-- SCROLL PROGRESS -->

<div class="scroll-progress" id="scrollProgress"></div>

<!-- =========================================================
     HEADER
========================================================= -->

<header class="main-header">

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a href="#home" class="brand">

                <img
                    src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                    class="brand-logo"
                    alt="Farm Fresh Logo">

                <div>

                    <div class="brand-name">
                        Farm Fresh
                    </div>

                    <div class="brand-subtitle">
                        ORGANIC PRODUCTS
                    </div>

                </div>

            </a>


            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-label="Toggle navigation">

                <i class="fa-solid fa-bars-staggered"></i>

            </button>


            <div
                class="collapse navbar-collapse"
                id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a href="#home" class="nav-link active">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('shoppage') }}" class="nav-link">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#products" class="nav-link">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            Contact
                        </a>
                    </li>

                </ul>


                <div class="nav-actions ms-lg-3">

                    <a
                        href="{{ route('login') }}"
                        class="nav-login">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="nav-register">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </nav>

</header>


<!-- =========================================================
     HERO
========================================================= -->

<section class="hero" id="home">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="hero-content reveal">

                    <div class="hero-label">

                        <i class="fa-solid fa-seedling"></i>

                        100% Fresh & Natural

                    </div>


                    <h1 class="hero-title">

                        From the

                        <span>Farm</span>

                        <br>

                        to Your Table.

                    </h1>


                    <p class="hero-text">

                        Discover fresh, safe and nutritious farm
                        products carefully selected from trusted
                        sources and delivered directly to your home
                        or business.

                    </p>


                    <div class="hero-buttons">

                        <a
                            href="#products"
                            class="btn-orange">

                            Explore Products

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>


                        <a
                            href="{{ route('shoppage') }}"
                            class="btn-outline">

                            Shop Fresh

                            <i class="fa-solid fa-basket-shopping"></i>

                        </a>

                    </div>


                    <div class="hero-stats">

                        <div class="hero-stat">

                            <strong>100%</strong>

                            <span>Fresh</span>

                        </div>

                        <div class="hero-stat">

                            <strong>24/7</strong>

                            <span>Ordering</span>

                        </div>

                        <div class="hero-stat">

                            <strong>Fast</strong>

                            <span>Delivery</span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="hero-visual reveal">

                    <div class="hero-image-wrapper">

                        <img
                            src="https://i.pinimg.com/1200x/e9/b1/67/e9b16750a87a69e8d182899c1a3fed8d.jpg"
                            class="hero-image"
                            alt="Fresh farm products">

                        <div class="hero-image-overlay"></div>

                        <div class="hero-image-caption">

                            <small>
                                Straight from nature
                            </small>

                            <strong>
                                Freshness you can see.
                            </strong>

                        </div>

                    </div>


                    <div class="hero-badge">

                        <div class="hero-badge-icon">

                            <i class="fa-solid fa-leaf"></i>

                        </div>

                        <strong>
                            Farm Fresh
                        </strong>

                        <small>
                            Carefully selected
                        </small>

                    </div>


                    <div class="hero-floating">

                        <i class="fa-solid fa-star"></i>

                        <span>
                            Quality You Can Trust
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TRUST STRIP
========================================================= -->

<section class="trust-strip">

    <div class="container">

        <div class="row g-3">

            <div class="col-6 col-lg-3">

                <div class="trust-item">

                    <i class="fa-solid fa-leaf"></i>

                    Fresh Every Day

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="trust-item">

                    <i class="fa-solid fa-shield-halved"></i>

                    Quality Assured

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="trust-item">

                    <i class="fa-solid fa-truck-fast"></i>

                    Fast Delivery

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="trust-item">

                    <i class="fa-solid fa-heart"></i>

                    Trusted Service

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     PRODUCTS
========================================================= -->

<section
    id="products"
    class="products-section section-padding">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <div class="section-label justify-content-center">
                What We Offer
            </div>

            <h2 class="section-title mt-3">
                Freshness in Every Choice
            </h2>

            <p class="section-description mx-auto mt-3">

                Explore our carefully selected range of fresh
                vegetables, fruits, nuts, eggs and farm products.

            </p>

        </div>


        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">


            <!-- VEGETABLES -->

            <div class="col reveal">

                <a
                    href="{{ route('showproduct.Vegetable') }}"
                    class="product-card">

                    <div class="product-image">

                        <img
                            src="https://i.pinimg.com/1200x/17/51/39/175139fee4ab5050c15347f075f0abe0.jpg"
                            alt="Fresh vegetables">

                        <div class="product-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                    </div>

                    <div class="product-content">

                        <h3>
                            Vegetables
                        </h3>

                        <p>
                            Fresh & nutritious
                        </p>

                    </div>

                </a>

            </div>


            <!-- FRUITS -->

            <div class="col reveal">

                <a
                    href="{{ route('showproduct.Fruit') }}"
                    class="product-card">

                    <div class="product-image">

                        <img
                            src="https://i.pinimg.com/736x/87/5c/19/875c19f4c3aff56b51416c2295f13145.jpg"
                            alt="Fresh fruits">

                        <div class="product-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                    </div>

                    <div class="product-content">

                        <h3>
                            Fruits
                        </h3>

                        <p>
                            Sweet & natural
                        </p>

                    </div>

                </a>

            </div>


            <!-- FRESH NUTS -->

            <div class="col reveal">

                <a
href="{{ route('showproduct.FreshNut') }}"
                    class="product-card">

                    <div class="product-image">

                        <img
                            src="https://i.pinimg.com/1200x/02/f1/52/02f1527da53638f41faca5deeb929d91.jpg"
                            alt="Fresh nuts">

                        <div class="product-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                    </div>

                    <div class="product-content">

                        <h3>
                            Fresh Nuts
                        </h3>

                        <p>
                            Healthy & premium
                        </p>

                    </div>

                </a>

            </div>


            <!-- FARM ANIMALS -->

            <div class="col reveal">

                <a
                    href="{{ route('showproduct.Farmanimal') }}"
                    class="product-card">

                    <div class="product-image">

                        <img
                            src="https://i.pinimg.com/736x/6b/ac/b8/6bacb8590a4fdf6f9fc7f7b13f734cd5.jpg"
                            alt="Farm animals">

                        <div class="product-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                    </div>

                    <div class="product-content">

                        <h3>
                            Farm Animals
                        </h3>

                        <p>
                            Healthy farm stock
                        </p>

                    </div>

                </a>

            </div>


            <!-- EGGS -->

            <div class="col reveal">

                <a
                    href="{{ route('showproduct.Egg') }}"
                    class="product-card">

                    <div class="product-image">

                        <img
                            src="https://i.pinimg.com/736x/1b/3e/0b/1b3e0b856b8937e09353290c7f9e3f88.jpg"
                            alt="Fresh eggs">

                        <div class="product-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                    </div>

                    <div class="product-content">

                        <h3>
                            Fresh Eggs
                        </h3>

                        <p>
                            Farm fresh daily
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     MARQUEE
========================================================= -->

<div class="marquee">

    <div class="marquee-track">

        <div class="marquee-item">
            Farm Fresh
            <i class="fa-solid fa-leaf"></i>
            Naturally Better
        </div>

        <div class="marquee-item">
            Fresh Every Day
            <i class="fa-solid fa-leaf"></i>
            Quality You Can Trust
        </div>

        <div class="marquee-item">
            From Farm to Table
            <i class="fa-solid fa-leaf"></i>
            Healthy Choices
        </div>

        <div class="marquee-item">
            Farm Fresh
            <i class="fa-solid fa-leaf"></i>
            Naturally Better
        </div>

        <div class="marquee-item">
            Fresh Every Day
            <i class="fa-solid fa-leaf"></i>
            Quality You Can Trust
        </div>

        <div class="marquee-item">
            From Farm to Table
            <i class="fa-solid fa-leaf"></i>
            Healthy Choices
        </div>

    </div>

</div>


<!-- =========================================================
     WHY US
========================================================= -->

<section
    id="why-us"
    class="why-section section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="reveal">

                    <div class="section-label">
                        Why Farm Fresh
                    </div>

                    <h2 class="section-title mt-3">
                        Good Food Starts With Good Farming.
                    </h2>

                    <p class="section-description mt-3">

                        We believe everyone deserves access to fresh,
                        nutritious and trustworthy farm products.
                        That's why we focus on quality from source
                        to delivery.

                    </p>

                </div>


                <div class="row g-3 mt-4">

                    <div class="col-sm-6 reveal">

                        <div class="why-card">

                            <div class="why-icon">
                                <i class="fa-solid fa-seedling"></i>
                            </div>

                            <h3>
                                Farm Fresh
                            </h3>

                            <p>
                                Products sourced directly from
                                trusted farms and suppliers.
                            </p>

                        </div>

                    </div>


                    <div class="col-sm-6 reveal">

                        <div class="why-card">

                            <div class="why-icon">
                                <i class="fa-solid fa-award"></i>
                            </div>

                            <h3>
                                Quality Assured
                            </h3>

                            <p>
                                Every product is carefully selected
                                for quality and freshness.
                            </p>

                        </div>

                    </div>


                    <div class="col-sm-6 reveal">

                        <div class="why-card">

                            <div class="why-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>

                            <h3>
                                Fast Delivery
                            </h3>

                            <p>
                                Fresh products delivered safely
                                and efficiently.
                            </p>

                        </div>

                    </div>


                    <div class="col-sm-6 reveal">

                        <div class="why-card">

                            <div class="why-icon">
                                <i class="fa-solid fa-heart"></i>
                            </div>

                            <h3>
                                Trusted Service
                            </h3>

                            <p>
                                Your satisfaction is always
                                at the heart of what we do.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="farmer-box reveal">

                    <img
                        src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1000&auto=format&fit=crop&q=80"
                        class="farmer-image"
                        alt="Farmer working in a farm">

                    <div class="farmer-label">

                        <strong>
                            100%
                        </strong>

                        <span>
                            Freshness & Quality
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     INDUSTRIES
========================================================= -->

<section class="industry-section section-padding">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <div class="section-label justify-content-center">
                Who We Serve
            </div>

            <h2 class="section-title mt-3">
                From Our Farm to Your Business
            </h2>

            <p class="section-description mx-auto mt-3">

                Reliable farm products for homes, restaurants,
                retailers and growing businesses.

            </p>

        </div>


        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">

            <div class="col reveal">

                <div class="industry-card">

                    <i class="fa-solid fa-cart-shopping"></i>

                    <h3>
                        Retail &
                        Supermarkets
                    </h3>

                </div>

            </div>


            <div class="col reveal">

                <div class="industry-card">

                    <i class="fa-solid fa-utensils"></i>

                    <h3>
                        Restaurants &
                        Cafés
                    </h3>

                </div>

            </div>


            <div class="col reveal">

                <div class="industry-card">

                    <i class="fa-solid fa-cake-candles"></i>

                    <h3>
                        Bakeries &
                        Confectionery
                    </h3>

                </div>

            </div>


            <div class="col reveal">

                <div class="industry-card">

                    <i class="fa-solid fa-hotel"></i>

                    <h3>
                        Hotels &
                        Catering
                    </h3>

                </div>

            </div>


            <div class="col reveal">

                <div class="industry-card">

                    <i class="fa-solid fa-industry"></i>

                    <h3>
                        Food
                        Industries
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     DELIVERY
========================================================= -->

<section
    id="delivery"
    class="delivery-section section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="delivery-image-wrap reveal">

                    <img
                        src="https://i.pinimg.com/1200x/d7/21/b3/d721b346b2c727ab885ab383dc242c8a.jpg"
                        class="delivery-image"
                        alt="Farm delivery">

                    <div class="delivery-floating">

                        <strong>
                            Fresh to Door
                        </strong>

                        <span>
                            Carefully handled
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="reveal">

                    <div class="section-label">
                        Our Process
                    </div>

                    <h2 class="section-title mt-3">
                        Fresh Products.
                        Delivered Safely.
                    </h2>

                    <p class="section-description mt-3">

                        Our delivery process is designed to protect
                        freshness and quality from the farm all
                        the way to your door.

                    </p>

                </div>


                <div class="delivery-steps">

                    <div class="delivery-step reveal">

                        <div class="delivery-number">
                            01
                        </div>

                        <div>

                            <strong>
                                Farm Collection
                            </strong>

                            <span>
                                Products are collected from
                                trusted farms.
                            </span>

                        </div>

                    </div>


                    <div class="delivery-step reveal">

                        <div class="delivery-number">
                            02
                        </div>

                        <div>

                            <strong>
                                Sorting & Grading
                            </strong>

                            <span>
                                Products are checked carefully
                                for quality.
                            </span>

                        </div>

                    </div>


                    <div class="delivery-step reveal">

                        <div class="delivery-number">
                            03
                        </div>

                        <div>

                            <strong>
                                Safe Packaging
                            </strong>

                            <span>
                                Products are carefully packed
                                for protection.
                            </span>

                        </div>

                    </div>


                    <div class="delivery-step reveal">

                        <div class="delivery-number">
                            04
                        </div>

                        <div>

                            <strong>
                                Fast Delivery
                            </strong>

                            <span>
                                Your order arrives safely
                                at your destination.
                            </span>

                        </div>

                    </div>

                </div>


                <a
                    href="{{ route('shoppage') }}"
                    class="btn-main mt-3">

                    Start Shopping

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TESTIMONIALS
========================================================= -->

<section
    id="testimonials"
    class="testimonial-section section-padding">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <div class="section-label justify-content-center">
                Customer Stories
            </div>

            <h2 class="section-title mt-3">
                What Our Customers Say
            </h2>

            <p class="section-description mx-auto mt-3">
                Real experiences from people who enjoy
                our products and service.
            </p>

        </div>


        <div
            class="row g-4"
            id="testimonials-list">

            <div class="col-12 text-center text-muted py-5">

                <div class="spinner-border spinner-border-sm me-2"></div>

                Loading reviews...

            </div>

        </div>


        <!-- REVIEW FORM -->

        <div class="review-box reveal">

            <h4>

                <i class="bi bi-pencil-square me-2"></i>

                Share Your Experience

            </h4>

            <p class="text-secondary small mb-4">

                Your feedback helps us improve our products
                and service.

            </p>


            <form id="homepage-review-form">

                <div class="row g-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            class="form-control"
                            name="user_name"
                            placeholder="Your name (optional)">

                    </div>


                    <div class="col-md-3">

                        <select
                            class="form-select"
                            name="rating"
                            required>

                            <option value="" disabled selected>
                                Select Rating
                            </option>

                            <option value="5">
                                ★★★★★ Excellent
                            </option>

                            <option value="4">
                                ★★★★ Very Good
                            </option>

                            <option value="3">
                                ★★★ Good
                            </option>

                            <option value="2">
                                ★★ Fair
                            </option>

                            <option value="1">
                                ★ Poor
                            </option>

                        </select>

                    </div>


                    <div class="col-md-5">

                        <input
                            type="text"
                            class="form-control"
                            name="comment"
                            placeholder="Write your review..."
                            required>

                    </div>

                </div>


                <input
                    type="hidden"
                    name="product_type"
                    value="homepage">

                <input
                    type="hidden"
                    name="product_id"
                    value="0">


                <button
                    type="submit"
                    class="btn-main mt-3">

                    Submit Review

                    <i class="fa-solid fa-paper-plane"></i>

                </button>

            </form>

        </div>

    </div>

</section>


<!-- =========================================================
     CTA
========================================================= -->

<section class="cta">

    <div class="container">

        <div class="row align-items-center g-4">

            <div class="col-lg-8">

                <div class="section-label">

                    Let's Work Together

                </div>

                <h2 class="cta-title mt-3">

                    Fresh products.
                    Healthy partnerships.

                </h2>

                <p class="cta-text mt-3 mb-0">

                    Looking for reliable farm products for your
                    restaurant, shop or business? We're ready to help.

                </p>

            </div>


            <div class="col-lg-4 text-lg-end">

                <a
                    href="{{ route('shoppage') }}"
                    class="btn btn-light">

                    Explore Our Shop

                    <i class="fa-solid fa-arrow-right ms-2"></i>

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

            <!-- BRAND -->

            <div class="col-lg-4">

                <div class="footer-brand">
                    Farm Fresh
                </div>

                <div class="footer-subtitle">
                    ORGANIC PRODUCTS
                </div>

                <p class="footer-description">

                    Fresh products, healthy lives.
                    Bringing quality farm products closer
                    to homes and businesses.

                </p>


                <div class="socials">

                    <a href="#" class="social">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="fa-brands fa-telegram"></i>
                    </a>

                </div>

            </div>


            <!-- EXPLORE -->

            <div class="col-6 col-lg-2">

                <div class="footer-title">
                    Explore
                </div>

                <ul class="footer-links">

                    <li>
                        <a href="#home">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shoppage') }}">
                            Shop
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#products">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="#delivery">
                            Delivery
                        </a>
                    </li>

                </ul>

            </div>


            <!-- PRODUCTS -->

            <div class="col-6 col-lg-2">

                <div class="footer-title">
                    Products
                </div>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('showproduct.Vegetable') }}">
                            Vegetables
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('showproduct.Fruit') }}">
                            Fruits
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('showproduct.FreshNut') }}">
                            Fresh Nuts
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('showproduct.Egg') }}">
                            Eggs
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('showproduct.Farmanimal') }}">
                            Farm Animals
                        </a>
                    </li>

                </ul>

            </div>


            <!-- CONTACT -->

            <div class="col-lg-4">

                <div class="footer-title">
                    Contact Us
                </div>


                <div class="contact-item">

                    <i class="fa-solid fa-phone"></i>

                    <span>
                        +855 123456789
                    </span>

                </div>


                <div class="contact-item">

                    <i class="fa-solid fa-envelope"></i>

                    <span>
                        Farm@gmail.com
                    </span>

                </div>


                <div class="contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <span>
                        Kep, Cambodia
                    </span>

                </div>


                <div class="newsletter">

                    <div class="footer-title mb-2">
                        Stay Updated
                    </div>

                    <form
                        class="newsletter-form"
                        onsubmit="event.preventDefault(); showToast('Thank you for subscribing!');">

                        <input
                            type="email"
                            placeholder="Your email address"
                            required>

                        <button type="submit">

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>


        <div class="copyright">

            © 2026 Farm Fresh.
            All Rights Reserved.

        </div>

    </div>

</footer>


<!-- =========================================================
     TOAST
========================================================= -->

<div id="toast">

    <i class="fa-solid fa-circle-check"></i>

    <span id="toastMsg">
        Message sent successfully!
    </span>

</div>


<!-- BACK TO TOP -->

<button
    class="back-top"
    id="backTop"
    aria-label="Back to top">

    <i class="fa-solid fa-arrow-up"></i>

</button>


<!-- =========================================================
     BOOTSTRAP
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>

    /* =========================================================
       PAGE LOADER
    ========================================================= */

    window.addEventListener('load', function () {

        setTimeout(() => {

            document
                .getElementById('pageLoader')
                .classList.add('hide');

        }, 500);

    });


    /* =========================================================
       SCROLL PROGRESS
    ========================================================= */

    window.addEventListener('scroll', function () {

        const scrollTop =
            document.documentElement.scrollTop ||
            document.body.scrollTop;

        const scrollHeight =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;

        const progress =
            scrollHeight > 0
                ? (scrollTop / scrollHeight) * 100
                : 0;

        document.getElementById(
            'scrollProgress'
        ).style.width = progress + '%';

    });


    /* =========================================================
       BACK TO TOP
    ========================================================= */

    const backTop =
        document.getElementById('backTop');

    window.addEventListener('scroll', function () {

        if (window.scrollY > 500) {

            backTop.classList.add('show');

        } else {

            backTop.classList.remove('show');

        }

    });


    backTop.addEventListener('click', function () {

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });


    /* =========================================================
       REVEAL ANIMATION
    ========================================================= */

    const revealElements =
        document.querySelectorAll('.reveal');

    const revealObserver =
        new IntersectionObserver(

            function (entries) {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('visible');

                        revealObserver.unobserve(
                            entry.target
                        );

                    }

                });

            },

            {
                threshold: .12
            }

        );


    revealElements.forEach(element => {

        revealObserver.observe(element);

    });


    /* =========================================================
       TOAST
    ========================================================= */

    function showToast(message) {

        const toast =
            document.getElementById('toast');

        const toastMsg =
            document.getElementById('toastMsg');

        toastMsg.innerText = message;

        toast.classList.add('show');

        setTimeout(() => {

            toast.classList.remove('show');

        }, 3500);

    }


    /* =========================================================
       STAR RENDER
    ========================================================= */

    function renderStars(rating) {

        let stars = '';

        for (let i = 1; i <= 5; i++) {

            if (i <= rating) {

                stars +=
                    '<i class="bi bi-star-fill"></i>';

            } else {

                stars +=
                    '<i class="bi bi-star"></i>';

            }

        }

        return stars;

    }


    /* =========================================================
       LOAD REVIEWS
    ========================================================= */

    function loadTestimonials() {

        fetch('/reviews/homepage/0')

            .then(response => {

                if (!response.ok) {
                    throw new Error('Failed to load reviews');
                }

                return response.json();

            })

            .then(data => {

                const list =
                    document.getElementById(
                        'testimonials-list'
                    );


                if (
                    data.total_reviews > 0 &&
                    data.reviews &&
                    data.reviews.length
                ) {

                    list.innerHTML =
                        data.reviews.map(review => {

                            const name =
                                review.user_name ||
                                'Anonymous Customer';


                            const avatar =
                                name
                                    .charAt(0)
                                    .toUpperCase();


                            const date =
                                new Date(
                                    review.created_at
                                ).toLocaleDateString(
                                    'en-US',
                                    {
                                        month: 'short',
                                        day: 'numeric',
                                        year: 'numeric'
                                    }
                                );


                            return `

                                <div class="col-md-6 col-lg-4 reveal visible">

                                    <div class="testimonial-card">

                                        <div class="testimonial-stars">

                                            ${renderStars(review.rating)}

                                        </div>


                                        <p class="testimonial-text">

                                            "${escapeHtml(review.comment)}"

                                        </p>


                                        <div class="testimonial-author">

                                            <div class="author-avatar">

                                                ${escapeHtml(avatar)}

                                            </div>


                                            <div>

                                                <strong>
                                                    ${escapeHtml(name)}
                                                </strong>

                                                <span>
                                                    ${date}
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            `;

                        }).join('');

                } else {

                    list.innerHTML = `

                        <div class="col-12 text-center">

                            <div class="py-5">

                                <i
                                    class="fa-regular fa-comment-dots"
                                    style="
                                        font-size:45px;
                                        color:#e47732;
                                    ">
                                </i>

                                <p class="text-muted mt-3">

                                    No reviews yet.
                                    Be the first to share
                                    your experience!

                                </p>

                            </div>

                        </div>

                    `;

                }

            })

            .catch(error => {

                console.error(error);

                document.getElementById(
                    'testimonials-list'
                ).innerHTML = `

                    <div class="col-12 text-center">

                        <div class="py-5">

                            <i
                                class="fa-solid fa-comment-slash mb-3"
                                style="
                                    font-size:35px;
                                    color:#e47732;
                                ">
                            </i>

                            <p class="text-muted">

                                Unable to load reviews.

                            </p>

                        </div>

                    </div>

                `;

            });

    }


    /* =========================================================
       ESCAPE HTML
       Protects review text from injecting HTML/JS
    ========================================================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.innerText =
            value ?? '';

        return div.innerHTML;

    }


    /* =========================================================
       REVIEW FORM
    ========================================================= */

    document
        .getElementById('homepage-review-form')
        .addEventListener('submit', function(e) {

            e.preventDefault();


            const form = this;

            const submitButton =
                form.querySelector(
                    'button[type="submit"]'
                );

            const originalText =
                submitButton.innerHTML;


            submitButton.disabled = true;

            submitButton.innerHTML = `

                <span
                    class="spinner-border spinner-border-sm">
                </span>

                Sending...

            `;


            const formData =
                new FormData(form);


            const data =
                Object.fromEntries(
                    formData.entries()
                );


            fetch('{{ route("reviews.store") }}', {

                method: 'POST',

                headers: {

                    'Content-Type':
                        'application/json',

                    'Accept':
                        'application/json',

                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}'

                },

                body:
                    JSON.stringify(data)

            })

            .then(response => {

                if (!response.ok) {

                    return response
                        .json()
                        .then(error => {

                            throw new Error(
                                error.message ||
                                'Unable to submit review.'
                            );

                        });

                }

                return response.json();

            })

            .then(result => {

                if (result.success) {

                    form.reset();

                    loadTestimonials();

                    showToast(
                        'Thank you for your review!'
                    );

                } else {

                    showToast(
                        result.message ||
                        'Unable to submit review.'
                    );

                }

            })

            .catch(error => {

                console.error(error);

                showToast(
                    error.message ||
                    'Error submitting review.'
                );

            })

            .finally(() => {

                submitButton.disabled = false;

                submitButton.innerHTML =
                    originalText;

            });

        });


    /* =========================================================
       MOBILE NAVBAR
    ========================================================= */

    document
        .querySelectorAll(
            '#mainNavbar .nav-link'
        )
        .forEach(link => {

            link.addEventListener(
                'click',
                function() {

                    const navbar =
                        document.getElementById(
                            'mainNavbar'
                        );

                    const collapse =
                        bootstrap.Collapse
                            .getInstance(navbar);

                    if (collapse) {

                        collapse.hide();

                    }

                }
            );

        });


    /* =========================================================
       ACTIVE NAVIGATION
    ========================================================= */

    const sections =
        document.querySelectorAll(
            'section[id]'
        );

    const navLinks =
        document.querySelectorAll(
            '.nav-link[href^="#"]'
        );


    window.addEventListener('scroll', function () {

        let current = 'home';

        sections.forEach(section => {

            const sectionTop =
                section.offsetTop - 130;

            if (
                window.scrollY >= sectionTop
            ) {

                current =
                    section.getAttribute('id');

            }

        });


        navLinks.forEach(link => {

            link.classList.remove('active');

            if (
                link.getAttribute('href') ===
                '#' + current
            ) {

                link.classList.add('active');

            }

        });

    });


    /* =========================================================
       LOAD REVIEWS
    ========================================================= */

    loadTestimonials();

</script>

</body>
</html>