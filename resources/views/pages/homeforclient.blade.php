<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swasth Ande - Premium Organic Products</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"rel="stylesheet">
    <style>
        :root {
            --brand-green: #1c3e27;
            --brand-green-dark: #142f1d;
            --brand-green-light: #2d5a3c;

            --brand-orange: #e06d26;
            --brand-orange-dark: #c85a18;
            --brand-orange-light: #fdf0e6;

            --cream-bg: #f8f6f0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--cream-bg);
            color: #333;
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }

        .text-brand-green {
            color: var(--brand-green) !important;
        }

        .text-brand-orange {
            color: var(--brand-orange) !important;
        }

        .bg-brand-green {
            background-color: var(--brand-green) !important;
        }

        .bg-brand-green-dark {
            background-color: var(--brand-green-dark) !important;
        }

        .bg-brand-orange {
            background-color: var(--brand-orange) !important;
        }

        .bg-brand-orange-light {
            background-color: var(--brand-orange-light) !important;
        }

        .bg-cream {
            background-color: var(--cream-bg) !important;
        }

        .btn-brand-green {
            background-color: var(--brand-green);
            color: white;
            border: none;
        }

        .btn-brand-green:hover {
            background-color: var(--brand-green-dark);
            color: white;
        }

        .btn-brand-orange {
            background-color: var(--brand-orange);
            color: white;
            border: none;
        }

        .btn-brand-orange:hover {
            background-color: var(--brand-orange-dark);
            color: white;
        }

        .btn-outline-brand-orange {
            color: var(--brand-orange);
            border: 1px solid var(--brand-orange);
            background-color: white;
        }

        .btn-outline-brand-orange:hover {
            background-color: var(--brand-orange);
            color: white;
        }

        .custom-shadow {
            box-shadow: 0 10px 30px -5px rgba(28, 62, 39, 0.08);
        }

        .hero-bg {
            background: linear-gradient(
                135deg,
                #f8f6f0 0%,
                #f5efe4 100%
            );
        }

        .modal-open {
            overflow: hidden;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand img {
            width: 70px;
            height: 50px;
            object-fit: contain;
        }

        .brand-title {
            color: var(--brand-green);
            font-size: 20px;
            font-weight: 800;
            line-height: 1;
        }

        .brand-subtitle {
            font-size: 9px;
            letter-spacing: 2px;
            font-weight: 700;
            color: #777;
        }

        .navbar-nav .nav-link {
            color: #444;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--brand-orange);
        }

        .cart-icon {
            font-size: 20px;
            color: var(--brand-green);
        }

        .cart-icon:hover {
            color: var(--brand-orange);
        }


        /* =========================================================
           HERO
        ========================================================== */

        .hero-section {
            padding: 50px 0 70px;
            background: linear-gradient(
                135deg,
                #f8f6f0 0%,
                #f5efe4 100%
            );
            border-bottom: 1px solid #ddd;
        }

        .hero-title {
            color: var(--brand-green);
            font-size: clamp(40px, 5vw, 65px);
            font-weight: 800;
            line-height: 1.15;
        }

        .hero-title span {
            color: var(--brand-orange);
        }

        .hero-description {
            color: #666;
            font-size: 17px;
            line-height: 1.7;
            max-width: 600px;
        }

        .feature-small {
            background: rgba(255,255,255,0.8);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feature-icon {
            width: 30px;
            height: 30px;
            min-width: 30px;
            border-radius: 50%;
            background: var(--brand-orange-light);
            color: var(--brand-orange);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-small span {
            font-size: 11px;
            font-weight: 700;
            color: var(--brand-green);
        }

        .hero-image-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: auto;
            border: 4px solid white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .hero-main-image {
            width: 100%;
            height: 390px;
            object-fit: cover;
            opacity: 0.88;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(0,0,0,0.4),
                transparent
            );
        }

        .egg-card {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 45%;
            max-width: 230px;
            padding: 8px;
            background: rgba(255,255,255,0.35);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 15px;
            transform: rotate(-2deg);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .egg-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-card {
            position: absolute;
            bottom: 25px;
            right: 20px;
            width: 42%;
            max-width: 220px;
            background: #fff3d6;
            border: 2px solid #edcf91;
            border-radius: 12px;
            padding: 14px;
            transform: rotate(2deg);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .product-card-inner {
            border: 1px dashed #d8b86c;
            padding: 10px;
            border-radius: 8px;
        }


        /* =========================================================
           PRODUCTS
        ========================================================== */

        .section-title-small {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 3px;
            color: var(--brand-green);
        }

        .section-title {
            color: var(--brand-green);
            font-size: 32px;
            font-weight: 800;
        }

        .orange-line {
            width: 40px;
            height: 3px;
            background: var(--brand-orange);
            border-radius: 5px;
            margin: 12px auto 0;
        }

        .product-category {
            display: block;
            text-decoration: none;
            background: white;
            border-radius: 20px;
            padding: 16px;
            text-align: center;
            border: 1px solid #eee;
            transition: 0.3s;
            height: 100%;
        }

        .product-category:hover {
            transform: translateY(-5px);
            border-color: var(--brand-orange);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .product-image-circle {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border-radius: 50%;
        }

        .product-image-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }

        .product-category:hover img {
            transform: scale(1.1);
        }

        .product-category h3 {
            margin-top: 16px;
            color: var(--brand-green);
            font-size: 16px;
            font-weight: 700;
        }

        .product-category:hover h3 {
            color: var(--brand-orange);
        }


        /* =========================================================
           WHY US
        ========================================================== */

        .why-section {
            background: white;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .why-card {
            padding: 25px;
            border-radius: 18px;
            background: var(--cream-bg);
            border: 1px solid #eee;
            text-align: center;
            height: 100%;
        }

        .why-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: white;
            color: var(--brand-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .why-card h3 {
            color: var(--brand-green);
            font-size: 16px;
            font-weight: 700;
        }

        .why-card p {
            color: #777;
            font-size: 12px;
            margin-bottom: 0;
        }

        .farmer-container {
            position: relative;
            width: 320px;
            height: 320px;
            margin: auto;
        }

        .farmer-border {
            position: absolute;
            inset: 0;
            border: 2px dashed #9ed3b2;
            border-radius: 50%;
            transform: scale(1.05);
        }

        .farmer-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .quality-badge {
            position: absolute;
            top: -10px;
            left: -10px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: var(--brand-green);
            color: white;
            border: 2px solid white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .quality-badge strong {
            font-size: 20px;
        }

        .quality-badge span {
            font-size: 10px;
            font-weight: 600;
        }


        /* =========================================================
           INDUSTRIES
        ========================================================== */

        .industry-card {
            background: white;
            padding: 25px 15px;
            border-radius: 18px;
            border: 1px solid #ddd;
            text-align: center;
            height: 100%;
            transition: 0.3s;
        }

        .industry-card:hover {
            border-color: var(--brand-orange);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            transform: translateY(-3px);
        }

        .industry-card i {
            color: var(--brand-orange);
            font-size: 32px;
            margin-bottom: 12px;
        }

        .industry-card h3 {
            color: var(--brand-green);
            font-size: 14px;
            font-weight: 700;
        }


        /* =========================================================
           DELIVERY
        ========================================================== */

        .delivery-section {
            background: white;
            border-top: 1px solid #ddd;
        }

        .map-box {
            background: var(--cream-bg);
            padding: 20px;
            border-radius: 18px;
            border: 1px solid #ddd;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .delivery-step {
            display: flex;
            align-items: center;
            gap: 14px;
            background: var(--cream-bg);
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #eee;
            margin-bottom: 12px;
        }

        .delivery-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 50%;
            background: white;
            border: 1px solid #ddd;
            color: var(--brand-green);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .delivery-step span {
            color: var(--brand-green);
            font-size: 13px;
            font-weight: 700;
        }


        /* =========================================================
           CTA
        ========================================================== */

        .cta-section {
            background: var(--brand-orange);
            color: white;
            padding: 32px 0;
        }

        .cta-image {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.6);
        }


        /* =========================================================
           FOOTER
        ========================================================== */

        footer {
            background: var(--brand-green);
            color: white;
            padding: 55px 0 30px;
        }

        .footer-title {
            color: #ffd2b7;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            font-size: 12px;
        }

        .footer-links a:hover {
            color: var(--brand-orange);
        }

        .social-link {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            color: #ddd;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-right: 5px;
            transition: 0.3s;
        }

        .social-link:hover {
            background: var(--brand-orange);
            border-color: var(--brand-orange);
            color: white;
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-list li {
            color: #ccc;
            font-size: 12px;
            margin-bottom: 14px;
        }

        .contact-list i {
            color: var(--brand-orange);
            margin-right: 8px;
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 22px;
            margin-top: 10px;
            text-align: center;
            color: #aaa;
            font-size: 11px;
        }


        /* =========================================================
           TOAST
        ========================================================== */

        #toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 2000;
            display: none;
            align-items: center;
            gap: 12px;
            background: var(--brand-green);
            color: white;
            padding: 14px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        #toast.show {
            display: flex;
        }

        #toast i {
            color: var(--brand-orange);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 991.98px) {

            .hero-section {
                padding: 40px 0 50px;
            }

            .hero-title {
                font-size: 45px;
            }

            .hero-image-container {
                margin-top: 30px;
            }

            .navbar-nav {
                padding-top: 15px;
            }

            .navbar-nav .nav-link {
                padding: 10px 0;
            }

        }

        @media (max-width: 575.98px) {

            .hero-title {
                font-size: 38px;
            }

            .hero-description {
                font-size: 15px;
            }

            .hero-main-image {
                height: 300px;
            }

            .egg-card {
                width: 48%;
                left: 10px;
                bottom: 10px;
            }

            .egg-card img {
                height: 100px;
            }

            .product-card {
                width: 45%;
                right: 10px;
                bottom: 15px;
                padding: 8px;
            }

            .product-card-inner {
                padding: 7px;
            }

            .farmer-container {
                width: 250px;
                height: 250px;
            }

            .quality-badge {
                width: 90px;
                height: 90px;
            }

            .quality-badge strong {
                font-size: 16px;
            }

            .feature-small {
                min-height: 55px;
            }
        }
         /* ================= HEADER & TOP BAR ================= */


    </style>
</head>
<body>
<!-- =========================================================
     HEADER
========================================================== -->
<header class="main-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="#home" class="navbar-brand d-flex align-items-center gap-2">

                <img
                    src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                    alt="Farm Fresh">

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
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- NAVIGATION -->

            <div
                class="collapse navbar-collapse"
                id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                    <li class="nav-item">
                        <a
                            href="#home"
                            class="nav-link active">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route ('shoppage') }}"
                            class="nav-link">
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
                            href="#contact"
                            class="nav-link " style="margin-right: 200px">
                            Contact
                        </a>
                    </li>


                    <!-- DASHBOARD -->

                    <li class="nav-item ms-lg-2"></li>


                    <!-- REGISTER -->

                    <li class="nav-item">

                        <a
                            href="{{ route('register') }}"
                            class="nav-link"style="margin-left: 200px">

                            Register

                        </a>

                    </li>


                    <!-- LOGIN -->

                    <li class="nav-item">

                        <a
                            href="{{ route('login') }}"
                            class="nav-link">

                            Login

                        </a>

                    </li>


                    <!-- CART -->
                </ul>

            </div>

        </div>

    </nav>

</header>



<!-- =========================================================
     HERO
========================================================== -->

<section
    id="home"
    class="hero-section">

    <div class="container">

        <div class="row align-items-center g-5">


            <!-- LEFT -->

            <div class="col-lg-6">

                <h1 class="hero-title">

                    Fresh & Organic

                    <br>

                    <span>Products</span>

                    for You.

                </h1>


                <p class="hero-description mt-4">

                    Fresh, safe and nutritious products delivered directly
                    from trusted farms to your home and business.

                </p>


                <div class="d-flex flex-wrap gap-3 mt-4">

                    {{-- <button
                        onclick="openQuoteModal()"
                        class="btn btn-brand-green px-4 py-3 fw-bold">

                        <i class="fa-solid fa-handshake text-warning me-2"></i>

                        Get a Quote

                    </button> --}}


                    <a
                        href="#products"
                        class="btn btn-outline-brand-orange px-4 py-3 fw-bold">

                        View Products

                        <i class="fa-solid fa-arrow-right ms-2"></i>

                    </a>

                </div>


                <!-- FEATURES -->

                <div class="row row-cols-2 row-cols-sm-4 g-2 mt-4">

                    <div class="col">

                        <div class="feature-small">

                            <div class="feature-icon">
                                <i class="fa-solid fa-leaf"></i>
                            </div>

                            <span>
                                Fresh Every Day
                            </span>

                        </div>

                    </div>


                    <div class="col">

                        <div class="feature-small">

                            <div class="feature-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>

                            <span>
                                Quality Assured
                            </span>

                        </div>

                    </div>


                    <div class="col">

                        <div class="feature-small">

                            <div class="feature-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>

                            <span>
                                Fast Delivery
                            </span>

                        </div>

                    </div>


                    <div class="col">

                        <div class="feature-small">

                            <div class="feature-icon">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>

                            <span>
                                Bulk Supply
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- RIGHT -->

            <div class="col-lg-6">

                <div class="hero-image-container">
                         <img src="https://i.pinimg.com/1200x/e9/b1/67/e9b16750a87a69e8d182899c1a3fed8d.jpg" class="w-100" style="height:400px; object-fit:cover;">
                    {{-- <img
                        src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1000&auto=format&fit=crop&q=80"
                        alt="Organic Farm"
                        class="hero-main-image">

                    <div class="hero-overlay"></div>


                    <!-- EGGS -->

                    <div class="egg-card">

                        <img
                            src="https://images.unsplash.com/photo-1516467508483-a7212febe31a?w=500&auto=format&fit=crop&q=80"
                            alt="Fresh Eggs">

                    </div>


                    <!-- PRODUCT CARD -->

                    <div class="product-card">

                        <div class="product-card-inner">

                            <div class="d-flex align-items-center gap-2 mb-2">

                                <div
                                    class="rounded-circle bg-brand-orange text-white d-flex align-items-center justify-content-center"
                                    style="width:22px;height:22px;font-size:10px;">

                                    <i class="fa-solid fa-egg"></i>

                                </div>

                                <span
                                    class="fw-bold text-brand-green"
                                    style="font-size:12px;">

                                    Swasth Ande

                                </span>

                            </div>


                            <p
                                class="text-secondary mb-2"
                                style="font-size:9px;letter-spacing:1px;">

                                ORGANIC PRODUCTS

                            </p>


                            <div
                                class="border-top pt-2 d-flex justify-content-between"
                                style="font-size:10px;">

                                <span class="text-success fw-bold">

                                    <i class="fa-solid fa-check-circle"></i>

                                    Fresh

                                </span>

                                <span class="text-success fw-bold">

                                    Premium

                                </span>

                            </div>

                        </div>

                    </div> --}}

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     PRODUCTS
========================================================== -->

<section
    id="products"
    class="py-5 bg-cream">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-title-small">
                OUR PRODUCTS
            </div>

            <h2 class="section-title mt-2">
               SEE ALL PRODUCTS
            </h2>

            <div class="orange-line"></div>

        </div>


        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-4">


            <!-- VEGETABLES -->

            <div class="col">

                <a
                    href="{{ route('showproduct.Vegetable') }}"
                    class="product-category">

                    <div class="product-image-circle">

                        <img
                            src="https://i.pinimg.com/1200x/17/51/39/175139fee4ab5050c15347f075f0abe0.jpg"
                            alt="Vegetables">

                    </div>

                    <h3>
                        Vegetables
                    </h3>

                </a>

            </div>


            <!-- FRUITS -->

            <div class="col">

                <a
                    href="{{ route('showproduct.Fruit') }}"
                    class="product-category">

                    <div class="product-image-circle">

                        <img
                            src="https://i.pinimg.com/736x/87/5c/19/875c19f4c3aff56b51416c2295f13145.jpg"
                            alt="Fruits">

                    </div>

                    <h3>
                        Fruits
                    </h3>

                </a>

            </div>


            <!-- FRESH NUTS -->

            <div class="col">

                <a
                    href="{{ route('showproduct.Freshnut') }}"
                    class="product-category">

                    <div class="product-image-circle">

                        <img
                            src="https://i.pinimg.com/1200x/02/f1/52/02f1527da53638f41faca5deeb929d91.jpg"
                            alt="Fresh Nuts">

                    </div>

                    <h3>
                        Fresh Nuts
                    </h3>

                </a>

            </div>


            <!-- JUICES -->

            <div class="col">

                <a
                    href="{{ route('showproduct.Farmanimal') }}"
                    class="product-category">

                    <div class="product-image-circle">

                        <img
                            src="https://i.pinimg.com/736x/6b/ac/b8/6bacb8590a4fdf6f9fc7f7b13f734cd5.jpg"
                            alt="Juices">

                    </div>

                    <h3>
                        Farm animal
                    </h3>

                </a>

            </div>


            <!-- EGGS -->

            <div class="col">

                <a
                    href="{{ route('showproduct.Egg') }}"
                    class="product-category">

                    <div class="product-image-circle">

                        <img
                            src="https://i.pinimg.com/736x/1b/3e/0b/1b3e0b856b8937e09353290c7f9e3f88.jpg"
                            alt="Eggs">

                    </div>

                    <h3>
                        Eggs
                    </h3>

                </a>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     WHY CHOOSE US
========================================================== -->

<section
    id="why-us"
    class="why-section py-5">

    <div class="container">

        <div class="mb-5">

            <div class="section-title-small">
                WHY CHOOSE US?
            </div>

            <div
                class="orange-line ms-0">
            </div>

        </div>


        <div class="row align-items-center g-5">


            <!-- FEATURES -->

            <div class="col-lg-7">

                <div class="row row-cols-1 row-cols-sm-2 g-4">


                    <div class="col">

                        <div class="why-card">

                            <div class="why-icon">

                                <i class="fa-solid fa-seedling"></i>

                            </div>

                            <h3>
                                Farm Fresh
                            </h3>

                            <p>
                                Sourced directly from trusted farms
                            </p>

                        </div>

                    </div>


                    <div class="col">

                        <div class="why-card">

                            <div class="why-icon">

                                <i class="fa-solid fa-award"></i>

                            </div>

                            <h3>
                                Quality Assured
                            </h3>

                            <p>
                                Hygienic, fresh and carefully selected
                            </p>

                        </div>

                    </div>


                    <div class="col">

                        <div class="why-card">

                            <div class="why-icon">

                                <i class="fa-solid fa-user-group"></i>

                            </div>

                            <h3>
                                Trusted by Many
                            </h3>

                            <p>
                                Serving customers with quality products
                            </p>

                        </div>

                    </div>


                    <div class="col">

                        <div class="why-card">

                            <div class="why-icon">

                                <i class="fa-solid fa-truck-ramp-box"></i>

                            </div>

                            <h3>
                                Timely Delivery
                            </h3>

                            <p>
                                Fast and reliable delivery
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- FARMER -->

            <div class="col-lg-5">

                <div class="farmer-container">

                    <div class="farmer-border"></div>

                    <img
                        src=""
                        alt="Farmer"
                        class="farmer-image">


                    <div class="quality-badge">

                        <strong>
                            100%
                        </strong>

                        <span>
                            Quality
                            <br>
                            Assured
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     INDUSTRIES
========================================================== -->

<section
    id="industries"
    class="py-5">

    <div class="container">

        <div class="text-center text-md-start mb-5">

            <div class="section-title-small">
                INDUSTRIES WE SERVE
            </div>

            <div class="orange-line ms-md-0"></div>

        </div>


        <div class="row row-cols-2 row-cols-md-5 g-4">


            <div class="col">

                <div class="industry-card">

                    <i class="fa-solid fa-cart-shopping"></i>

                    <h3>
                        Retail &
                        <br>
                        Supermarkets
                    </h3>

                </div>

            </div>


            <div class="col">

                <div class="industry-card">

                    <i class="fa-solid fa-utensils"></i>

                    <h3>
                        Restaurants &
                        <br>
                        Cafés
                    </h3>

                </div>

            </div>


            <div class="col">

                <div class="industry-card">

                    <i class="fa-solid fa-cake-candles"></i>

                    <h3>
                        Bakeries &
                        <br>
                        Confectionery
                    </h3>

                </div>

            </div>


            <div class="col">

                <div class="industry-card">

                    <i class="fa-solid fa-hotel"></i>

                    <h3>
                        Hotels &
                        <br>
                        Catering
                    </h3>

                </div>

            </div>


            <div class="col">

                <div class="industry-card">

                    <i class="fa-solid fa-industry"></i>

                    <h3>
                        Food
                        <br>
                        Industries
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     DELIVERY
========================================================== -->

<section
    id="delivery"
    class="delivery-section py-5">

    <div class="container">

        <div class="row align-items-center g-5">


            <!-- LEFT -->

            <div class="col-lg-5">

                <div class="section-title-small">
                    FAST DELIVERY
                </div>

                <div class="orange-line ms-0"></div>

                <p class="text-secondary mt-4">

                    Our delivery process is designed to keep products
                    fresh, safe and ready for your home or business.

                </p>

                <button
                    onclick="openProcessModal()"
                    class="btn btn-brand-green px-4 py-3 fw-bold mt-3">

                    Our Delivery Process

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>


            <!-- RIGHT -->

            <div class="col-lg-7">

                <div class="row g-4">


                    <!-- MAP -->

                    <div class="col-md-6">

                        <div class="map-box">
                            <img width="320px" src="https://i.pinimg.com/1200x/d7/21/b3/d721b346b2c727ab885ab383dc242c8a.jpg" alt="">

                            {{-- <svg
                                width="200"
                                height="200"
                                viewBox="0 0 200 200"
                                fill="#1c3e27"
                                opacity="0.15">

                                <path
                                    d="M100 10 C140 10, 180 40, 170 90 C160 140, 120 180, 100 190 C80 180, 40 140, 30 90 C20 40, 60 10, 100 10 Z">
                                </path>

                            </svg> --}}

                        </div>

                    </div>


                    <!-- STEPS -->

                    <div class="col-md-6">

                        <div class="delivery-step">

                            <div class="delivery-icon">

                                <i class="fa-solid fa-wheat-awn"></i>

                            </div>

                            <span>
                                Farm Collection
                            </span>

                        </div>


                        <div class="delivery-step">

                            <div class="delivery-icon">

                                <i class="fa-solid fa-magnifying-glass"></i>

                            </div>

                            <span>
                                Sorting & Grading
                            </span>

                        </div>


                        <div class="delivery-step">

                            <div class="delivery-icon">

                                <i class="fa-solid fa-box"></i>

                            </div>

                            <span>
                                Safe Packaging
                            </span>

                        </div>


                        <div class="delivery-step">

                            <div class="delivery-icon">

                                <i class="fa-solid fa-truck-fast"></i>

                            </div>

                            <span>
                                Fast Delivery
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     CTA
========================================================== -->

<section class="cta-section">

    <div class="container">

        <div class="row align-items-center justify-content-between g-4">

            <div class="col-md-8">

                <div class="d-flex align-items-center gap-3">

                    <img
                        src="https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=200&auto=format&fit=crop&q=80"
                        alt="Fresh Eggs"
                        class="cta-image d-none d-sm-block">

                    <div>

                        <h3 class="fw-bold mb-1">
                            Let's build a healthy partnership.
                        </h3>

                        <p class="mb-0 text-white-50">
                            For bulk orders and inquiries, reach out to our team today.
                        </p>

                    </div>

                </div>

            </div>

{{-- 
            <div class="col-md-4 text-md-end">

                <button
                    onclick="openQuoteModal()"
                    class="btn btn-light text-brand-orange fw-bold px-4 py-3">

                    Get a Quote

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                 </button>

            </div> --}}

        </div>

    </div>

</section>



<!-- =========================================================
     TESTIMONIALS / REVIEWS
========================================================= -->
<section id="testimonials" class="py-5" style="background: #ffffff;">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-title-small">TESTIMONIALS</div>
            <h2 class="section-title mt-2">What Our Customers Say</h2>
        </div>

        <div class="row g-4" id="testimonials-list">
            <div class="col-12 text-center text-muted">Loading reviews...</div>
        </div>

        <!-- Add Review Form -->
        <div class="mt-5 p-4 rounded-4" style="background: #f8f9fa; border: 1px solid #e9ecef;">
            <h5 class="fw-bold mb-3"><i class="bi bi-pencil-square me-2"></i>Write a Review</h5>
            <form id="homepage-review-form">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="user_name" placeholder="Your name (optional)">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="rating" required>
                            <option value="" disabled selected>Select Rating</option>
                            <option value="5">5 Stars - Excellent</option>
                            <option value="4">4 Stars - Very Good</option>
                            <option value="3">3 Stars - Good</option>
                            <option value="2">2 Stars - Fair</option>
                            <option value="1">1 Star - Poor</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="comment" placeholder="Write your review..." required>
                    </div>
                </div>
                <input type="hidden" name="product_type" value="homepage">
                <input type="hidden" name="product_id" value="0">
                <button type="submit" class="btn btn-dark mt-3 px-4">Submit Review</button>
            </form>
        </div>
    </div>
</section>

<style>
    .testimonial-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 16px;
        padding: 24px;
        transition: all 0.3s ease;
        height: 100%;
    }
    .testimonial-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
    .testimonial-stars {
        color: #ffc107;
        font-size: 0.9rem;
        margin-bottom: 12px;
    }
    .testimonial-text {
        color: #333;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 16px;
    }
    .testimonial-author {
        font-weight: 700;
        color: #000;
        font-size: 0.9rem;
    }
    .testimonial-date {
        font-size: 0.75rem;
        color: #888;
    }
</style>

<script>
    function renderStars(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= rating) {
                stars += '<i class="bi bi-star-fill"></i>';
            } else if (i - 0.5 <= rating) {
                stars += '<i class="bi bi-star-half"></i>';
            } else {
                stars += '<i class="bi bi-star"></i>';
            }
        }
        return stars;
    }

    function loadTestimonials() {
        fetch('/reviews/homepage/0')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('testimonials-list');
                if (data.total_reviews > 0) {
                    list.innerHTML = data.reviews.map(review => `
                        <div class="col-md-4">
                            <div class="testimonial-card">
                                <div class="testimonial-stars">${renderStars(review.rating)}</div>
                                <p class="testimonial-text">"${review.comment}"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="testimonial-author">${review.user_name}</span>
                                    <span class="testimonial-date">${new Date(review.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                                </div>
                            </div>
                        </div>
                    `).join('');
                } else {
                    list.innerHTML = '<div class="col-12 text-center text-muted">No reviews yet. Be the first to leave a review!</div>';
                }
            });
    }

    document.getElementById('homepage-review-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        fetch('{{ route("reviews.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                this.reset();
                loadTestimonials();
            }
        })
        .catch(error => alert('Error submitting review'));
    });

    loadTestimonials();
</script>



<!-- =========================================================
     FOOTER
========================================================== -->

<footer id="contact">

    <div class="container">

        <div class="row g-5 pb-5">


            <!-- BRAND -->

            <div class="col-sm-6 col-lg-3">

                <h3 class="fw-bold">
                    Swasth Ande
                </h3>

                <small class="text-white-50">
                    ORGANIC PRODUCTS
                </small>

                <p class="text-white-50 small mt-3">
                    Fresh products, healthy lives.
                </p>


                <div class="mt-4">

                    <a href="#" class="social-link">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" class="social-link">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="social-link">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="#" class="social-link">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                </div>

            </div>


            <!-- QUICK LINKS -->

            <div class="col-sm-6 col-lg-3">

                <h4 class="footer-title">
                    Quick Links
                </h4>

                <ul class="footer-links">

                    <li>
                        <a href="#home">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#products">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="#why-us">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#why-us">
                            Quality
                        </a>
                    </li>

                    <li>
                        <a href="#contact">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <!-- CONTACT -->

            <div class="col-sm-6 col-lg-3">

                <h4 class="footer-title">
                    Contact Us
                </h4>

                <ul class="contact-list">

                    <li>
                        <i class="fa-solid fa-phone"></i>
                        +855 123456789
                    </li>

                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        Farm@gmail.com
                    </li>

                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        kep,cambodia
                    </li>

                </ul>

            </div>


            <!-- NEWSLETTER -->

            <div class="col-sm-6 col-lg-3">

                <h4 class="footer-title">
                    Newsletter
                </h4>

                <p class="small text-white-50">
                    Subscribe for updates and offers.
                </p>

                <form
                    onsubmit="handleSubscribe(event)">

                    <input
                        type="email"
                        id="subscribeEmail"
                        placeholder="Enter your email"
                        required
                        class="form-control form-control-sm mb-2">

                    <button
                        type="submit"
                        class="btn btn-brand-orange btn-sm w-100">

                        Subscribe

                    </button>

                </form>

            </div>

        </div>


        <div class="copyright">

            © 2026 Swasth Ande. All Rights Reserved.

        </div>

    </div>

</footer>



<!-- =========================================================
     QUOTE MODAL
========================================================== -->

<div
    class="modal fade"
    id="quoteModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header">

                <div class="d-flex align-items-center gap-2">

                    <div
                        class="rounded-circle bg-brand-orange text-white d-flex align-items-center justify-content-center"
                        style="width:35px;height:35px;">

                        <i class="fa-solid fa-egg"></i>

                    </div>

                    <h5 class="modal-title text-brand-green fw-bold">

                        Request Bulk Quote

                    </h5>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <form
                    onsubmit="handleQuoteSubmit(event)">


                    <!-- NAME -->

                    <div class="mb-3">

                        <label
                            class="form-label small fw-semibold">

                            Full Name

                        </label>

                        <input
                            type="text"
                            id="quoteName"
                            required
                            class="form-control">

                    </div>


                    <!-- PHONE -->

                    <div class="mb-3">

                        <label
                            class="form-label small fw-semibold">

                            Phone / WhatsApp Number

                        </label>

                        <input
                            type="tel"
                            id="quotePhone"
                            required
                            class="form-control">

                    </div>


                    <!-- PRODUCT -->

                    <div class="mb-3">

                        <label
                            class="form-label small fw-semibold">

                            Product Requirement

                        </label>

                        <select
                            id="modalProductSelect"
                            class="form-select">

                            <option value="Vegetables">
                                Vegetables
                            </option>

                            <option value="Fruits">
                                Fruits
                            </option>

                            <option value="Fresh Nuts">
                                Fresh Nuts
                            </option>

                            <option value="Juices">
                                Juices
                            </option>

                            <option value="Eggs">
                                Eggs
                            </option>

                        </select>

                    </div>


                    <!-- QUANTITY -->

                    <div class="mb-4">

                        <label
                            class="form-label small fw-semibold">

                            Quantity

                        </label>

                        <input
                            type="text"
                            id="quoteQuantity"
                            placeholder="e.g. 50 boxes daily"
                            required
                            class="form-control">

                    </div>


                    <button
                        type="submit"
                        class="btn btn-brand-orange w-100 py-2 fw-bold">

                        Submit Requirement

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>



<!-- =========================================================
     TOAST
========================================================== -->

<div id="toast">

    <i class="fa-solid fa-circle-check"></i>

    <span id="toastMsg">
        Message sent successfully!
    </span>

</div>



<!-- =========================================================
     BOOTSTRAP JS
========================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

    /* =========================================================
       QUOTE MODAL
    ========================================================== */

    function openQuoteModal(productName = '') {

        const modalElement =
            document.getElementById('quoteModal');

        const select =
            document.getElementById('modalProductSelect');

        if (productName) {
            select.value = productName;
        }

        const modal =
            bootstrap.Modal.getOrCreateInstance(modalElement);

        modal.show();
    }


    /* =========================================================
       QUOTE FORM
    ========================================================== */

    function handleQuoteSubmit(event) {

        event.preventDefault();

        const name =
            document.getElementById('quoteName').value.trim();

        const phone =
            document.getElementById('quotePhone').value.trim();

        const product =
            document.getElementById('modalProductSelect').value;

        const quantity =
            document.getElementById('quoteQuantity').value.trim();


        if (!name || !phone || !product || !quantity) {

            showToast('Please fill in all fields.');

            return;
        }


        const modalElement =
            document.getElementById('quoteModal');

        const modal =
            bootstrap.Modal.getInstance(modalElement);

        if (modal) {
            modal.hide();
        }


        showToast(
            'Thank you! Our sales team will contact you shortly.'
        );


        document.getElementById('quoteName').value = '';
        document.getElementById('quotePhone').value = '';
        document.getElementById('quoteQuantity').value = '';

    }


    /* =========================================================
       TOAST
    ========================================================== */

    function showToast(message) {

        const toast =
            document.getElementById('toast');

        const toastMsg =
            document.getElementById('toastMsg');

        toastMsg.innerText = message;

        toast.classList.add('show');


        setTimeout(function () {

            toast.classList.remove('show');

        }, 3500);

    }


    /* =========================================================
       NEWSLETTER
    ========================================================== */

    function handleSubscribe(event) {

        event.preventDefault();

        const email =
            document.getElementById('subscribeEmail').value.trim();


        if (!email) {

            showToast('Please enter your email.');

            return;

        }


        document.getElementById('subscribeEmail').value = '';

        showToast(
            'Subscribed to Swasth Ande updates!'
        );

    }


    /* =========================================================
       DELIVERY PROCESS
    ========================================================== */

    function openProcessModal() {

        showToast(
            'Our delivery process ensures fresh and safe products.'
        );

    }


    /* =========================================================
       CLOSE MOBILE NAVBAR AFTER CLICK
    ========================================================== */

    document.querySelectorAll(
        '#mainNavbar .nav-link'
    ).forEach(function (link) {

        link.addEventListener('click', function () {

            const navbar =
                document.getElementById('mainNavbar');

            const collapse =
                bootstrap.Collapse.getInstance(navbar);

            if (collapse) {
                collapse.hide();
            }

        });

    });

</script>

</body>

</html>
