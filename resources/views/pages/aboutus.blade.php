<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agri Culture</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-color: #087333;
            --primary-hover: #065d29;
            --text-dark: #2c3e50;
            --text-muted: #6c757d;
            --bg-light: #f8fbf9;
            --font-heading: 'Merriweather', Georgia, serif;
            --font-body: 'Open Sans', Arial, sans-serif;
        }

        body {
            margin: 0;
            font-family: var(--font-body);
            color: var(--text-dark);
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
        }

        /* ================= TOP HEADER ================= */

        .top-header {
            background: #fff;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .logo {
            color: var(--primary-color);
            font-family: var(--font-heading);
            font-size: 1.25rem;
            line-height: 1.2;
            text-decoration: none;
        }

        .logo i {
            font-size: 2.5rem;
            margin-right: 10px;
            color: var(--primary-color);
        }

        .top-info {
            font-family: var(--font-body);
        }

        .top-info i {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .top-info small {
            font-size: 0.875rem;
            font-weight: 600;
            color: #333;
            display: block;
        }

        .top-info span {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ================= NAVBAR ================= */

        .main-navbar {
            background: var(--primary-color);
            padding: 0;
        }

        .main-navbar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 16px 20px !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s ease-in-out;
        }

        .main-navbar .nav-link:hover,
        .main-navbar .nav-link.active {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* ================= HERO ================= */

        .hero {
            position: relative;
            min-height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #222;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.65;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 60px 20px;
        }

        .hero-content h1 {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .hero-content .btn {
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 12px 28px;
            transition: background 0.2s ease;
        }

        .hero-content .btn:hover {
            background: var(--primary-hover);
        }

        /* ================= SERVICES ================= */

        .services-section {
            padding: 70px 0;
            background: #fff;
        }

        .section-subtitle {
            color: var(--primary-color);
            font-size: 0.8125rem;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .section-title {
            text-align: center;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 45px;
            color: var(--text-dark);
        }

        .service-card {
            height: 100%;
            padding: 30px 20px;
            border: 1px solid #eef2f0;
            position: relative;
            background: #fff;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            background: var(--bg-light);
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .service-number {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #e0e0e0;
            font-size: 0.875rem;
            font-weight: 700;
        }

        .service-icon {
            font-size: 2.25rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-card h3 {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .service-card p {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* ================= WHY CHOOSE US ================= */

        .choose-section {
            background: var(--primary-color);
            color: white;
            padding: 0;
            overflow: hidden;
        }

        .choose-image-wrapper {
            height: 100%;
            min-height: 400px;
        }

        .choose-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .choose-content {
            padding: 70px 50px;
        }

        .choose-subtitle {
            color: #b8dbc5;
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .choose-title {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 1.3;
            margin-top: 10px;
            color: #ffffff;
        }

        .choose-description {
            color: #d1e7dd;
            font-size: 0.9375rem;
            margin-top: 15px;
            margin-bottom: 30px;
        }

        .benefit {
            display: flex;
            align-items: flex-start;
            margin-bottom: 22px;
        }

        .benefit-icon {
            min-width: 44px;
            height: 44px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.25rem;
            margin-right: 18px;
            flex-shrink: 0;
        }

        .benefit h4 {
            font-size: 1rem;
            font-weight: 600;
            margin: 0 0 4px;
            color: #ffffff;
        }

        .benefit p {
            color: #d1e7dd;
            font-size: 0.84rem;
            margin: 0;
        }

        /* ================= RESPONSIVE ADJUSTMENTS ================= */

        @media (max-width: 991.98px) {
            .choose-content {
                padding: 50px 30px;
            }
            .choose-image-wrapper {
                max-height: 350px;
            }
        }

        /* Homepage-style navigation */
        .top-bar,
        .top-header {
            display: none;
        }

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .main-header .navbar-brand {
            color: var(--primary-color);
            text-decoration: none;
        }

        .main-header .brand-title {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1;
        }

        .main-header .brand-subtitle {
            color: var(--text-muted);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .main-header .nav-link {
            color: #444;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.75rem 0.5rem;
        }

        .main-header .nav-link:hover,
        .main-header .nav-link.active {
            color: #e06d26;
            background: transparent;
        }

        @media (max-width: 767.98px) {
            .contact-information {
                display: none;
            }

            .hero-content h1 {
                font-size: 1.65rem;
            }

            .services-section {
                padding: 50px 0;
            }

            .section-title {
                font-size: 1.4rem;
            }
        }
                .top-bar {
            background: #ffffff;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .brand-logo {
            text-decoration: none;
            color: var(--primary-color);
        }

        .brand-title {
            font-family: var(--font-heading);
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.1;
            color: var(--primary-color);
        }

        .brand-subtitle {
            font-family: var(--font-body);
            font-size: 0.65rem;
            letter-spacing: 1px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .top-info-item {
            font-size: 0.85rem;
        }

        .top-info-item i {
            color: var(--primary-color);
            font-size: 1.35rem;
        }

        .top-info-item small {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .top-info-item span {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ================= MAIN NAVIGATION BAR ================= */

        .main-navbar {
            background: var(--primary-color);
            padding: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .main-navbar .nav-link {
            color: rgba(255, 255, 255, 0.88);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 16px 18px !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.25 ease;
        }

        .main-navbar .nav-link:hover,
        .main-navbar .nav-link.active {
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.15);
        }

        .main-navbar .btn-auth {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .main-navbar .btn-auth-outline {
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .main-navbar .btn-auth-outline:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }

        .main-navbar .btn-auth-solid {
            background-color: #ffffff;
            color: var(--primary-color);
        }

        .main-navbar .btn-auth-solid:hover {
            background-color: #f0f0f0;
            color: var(--primary-hover);
        }

        @media (max-width: 991.98px) {
            .main-navbar .navbar-collapse {
                padding: 15px 0;
            }
            .main-navbar .nav-link {
                padding: 10px 15px !important;
            }
            .auth-buttons {
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid rgba(255, 255, 255, 0.15);
            }
        }

        .main-header .btn-auth {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .main-header .btn-auth-outline {
            color: #e06d26;
            border: 1px solid #e06d26;
        }

        .main-header .btn-auth-outline:hover {
            background: #e06d26;
            color: #fff;
        }

        .main-header .btn-auth-solid {
            background: #e06d26;
            color: #fff;
        }

        .main-header .btn-auth-solid:hover {
            background: #c85a18;
            color: #fff;
        }

        @media (max-width: 991.98px) {
            .main-header .navbar-collapse {
                padding: 15px 0;
            }

            .main-header .auth-buttons {
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid #eee;
            }
        }

        /* Homepage-style footer */
        footer {
            background: #1c3e27;
            color: #fff;
            padding: 55px 0 30px;
        }

        .footer-title {
            color: #ffd2b7;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .footer-links,
        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            font-size: 0.75rem;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #e06d26;
        }

        .social-link {
            width: 34px;
            height: 34px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: #ddd;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-link:hover {
            background: #e06d26;
            border-color: #e06d26;
            color: #fff;
        }

        .contact-list li {
            color: #ccc;
            font-size: 0.75rem;
            margin-bottom: 14px;
        }

        .contact-list i {
            color: #e06d26;
            margin-right: 8px;
        }

        .footer-subscribe-btn {
            background: #e06d26;
            border: 0;
            color: #fff;
        }

        .footer-subscribe-btn:hover {
            background: #c85a18;
            color: #fff;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 0.6875rem;
            margin-top: 10px;
            padding-top: 22px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- ================= HEADER SECTION ================= -->
<header class="main-header">

    <!-- 1. TOP INFORMATION BAR -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">

                <!-- BRAND / LOGO -->
                <div class="col-lg-3 col-md-4 col-12 text-center text-md-start mb-2 mb-md-0">
                    <a href="#home" class="brand-logo d-inline-flex align-items-center gap-2">
                        <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                            alt="Farm Fresh" height="48" class="rounded">
                        <div>
                            <div class="brand-title">Farm Fresh</div>
                            <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                        </div>
                    </a>
                </div>

                <!-- TOP CONTACT DETAILS -->
                <div class="col-lg-9 col-md-8 d-none d-md-block">
                    <div class="row justify-content-end text-start">

                        <!-- LOCATION -->
                        <div class="col-auto">
                            <div class="top-info-item d-flex align-items-center gap-2">
                                <i class="bi bi-geo-alt"></i>
                                <div>
                                    <small>San Francisco</small>
                                    <span>1050 Market Street, CA</span>
                                </div>
                            </div>
                        </div>

                        <!-- PHONE -->
                        <div class="col-auto ms-lg-4">
                            <div class="top-info-item d-flex align-items-center gap-2">
                                <i class="bi bi-telephone"></i>
                                <div>
                                    <small>+1 209 392 4312</small>
                                    <span>Call us now</span>
                                </div>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="col-auto ms-lg-4">
                            <div class="top-info-item d-flex align-items-center gap-2">
                                <i class="bi bi-envelope"></i>
                                <div>
                                    <small>info@gmail.com</small>
                                    <span>Email us</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 2. MAIN NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a href="{{ route('homeforclient') }}" class="navbar-brand d-flex align-items-center gap-2">
                <i class="bi bi-truck fs-2"></i>
                <div>
                    <div class="brand-title">Farm Fresh</div>
                    <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <!-- MAIN PAGES LINKS -->
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a href="{{ route('homeforclient') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shoppage') }}" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link active">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- AUTHENTICATION / ACCOUNT BUTTONS -->
                <div class="auth-buttons d-flex align-items-center gap-2">
                    <a href="{{ route('register') }}" class="btn btn-auth btn-auth-outline">
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-auth btn-auth-solid">
                        Login
                    </a>
                </div>

            </div>

        </div>
    </nav>

</header>

    <header class="top-header">
        <div class="container">
            <div class="row align-items-center">

                <!-- LOGO -->
                <div class="col-md-3 col-12 text-center text-md-start mb-2 mb-md-0">
                    <a href="#" class="logo d-inline-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <div>
                            AGRI<br><strong>CULTURE</strong>
                        </div>
                    </a>
                </div>

                <!-- INFORMATION -->
                <div class="col-md-9">
                    <div class="row contact-information justify-content-end">

                        <!-- LOCATION -->
                        <div class="col-lg-4 col-md-4">
                            <div class="top-info d-flex align-items-center">
                                <i class="bi bi-geo-alt me-3"></i>
                                <div>
                                    <small>San Francisco</small>
                                    <span>1050 Market Street, CA</span>
                                </div>
                            </div>
                        </div>

                        <!-- PHONE -->
                        <div class="col-lg-4 col-md-4">
                            <div class="top-info d-flex align-items-center">
                                <i class="bi bi-telephone me-3"></i>
                                <div>
                                    <small>+1 209 392 4312</small>
                                    <span>Call us now</span>
                                </div>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="col-lg-4 col-md-4">
                            <div class="top-info d-flex align-items-center">
                                <i class="bi bi-envelope me-3"></i>
                                <div>
                                    <small>info@gmail.com</small>
                                    <span>Email us</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </header>

    

    <!-- ================= HERO ================= -->
    <section class="hero">
        <img class="hero-bg"
            src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1600&q=80"
            alt="Agricultural field">

        <div class="hero-content">
            <div class="container">
                <h1>Farming is the best solution<br class="d-none d-md-block"> of world's starvation</h1>
                <a href="#" class="btn">DISCOVER MORE</a>
            </div>
        </div>
    </section>

    <!-- ================= SERVICES ================= -->
    <section class="services-section">
        <div class="container">
            <div class="section-subtitle">SERVICES</div>
            <h2 class="section-title">Providing Fresh Produce Every Single Day</h2>

            <div class="row g-4">

                <!-- 01 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">01</span>
                        <div class="service-icon"><i class="bi bi-flower1"></i></div>
                        <h3>Planting</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 02 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">02</span>
                        <div class="service-icon"><i class="bi bi-brightness-high"></i></div>
                        <h3>Mulching</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 03 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">03</span>
                        <div class="service-icon"><i class="bi bi-truck"></i></div>
                        <h3>Plowing</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 04 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">04</span>
                        <div class="service-icon"><i class="bi bi-wind"></i></div>
                        <h3>Mowing</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 05 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">05</span>
                        <div class="service-icon"><i class="bi bi-box-seam"></i></div>
                        <h3>Seeding</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 06 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">06</span>
                        <div class="service-icon"><i class="bi bi-flower2"></i></div>
                        <h3>Fresh Vegetables</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 07 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">07</span>
                        <div class="service-icon"><i class="bi bi-droplet"></i></div>
                        <h3>Watering</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

                <!-- 08 -->
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <span class="service-number">08</span>
                        <div class="service-icon"><i class="bi bi-basket"></i></div>
                        <h3>Vegetable Selling</h3>
                        <p>Gravida sodales condimentum pellentesque accumsan orci quam sagittis sapien.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= WHY CHOOSE US ================= -->
    <section class="choose-section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">

                <!-- IMAGE -->
                <div class="col-lg-5">
                    <div class="choose-image-wrapper">
                        <img src="https://i.pinimg.com/1200x/17/51/39/175139fee4ab5050c15347f075f0abe0.jpg"
                            alt="Farmer working in the field">
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="col-lg-7">
                    <div class="choose-content">

                        <div class="choose-subtitle">WHY CHOOSE US</div>

                        <h2 class="choose-title">
                            More than 50 years of<br class="d-none d-md-block"> experience in the agriculture industry
                        </h2>

                        <p class="choose-description">
                            Reprehenderit, odio laboriosam? Blanditiis quae ullam quasi illum minima nostrum perspiciatis error consequatur sit nulla.
                        </p>

                        <!-- BENEFIT 1 -->
                        <div class="benefit">
                            <div class="benefit-icon">
                                <i class="bi bi-leaf"></i>
                            </div>
                            <div>
                                <h4>Always Fresh Foods</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <!-- BENEFIT 2 -->
                        <div class="benefit">
                            <div class="benefit-icon">
                                <i class="bi bi-patch-check"></i>
                            </div>
                            <div>
                                <h4>Organic Foods</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <!-- BENEFIT 3 -->
                        <div class="benefit">
                            <div class="benefit-icon">
                                <i class="bi bi-globe-americas"></i>
                            </div>
                            <div>
                                <h4>Healthier Soil</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer id="contact">
        <div class="container">
            <div class="row g-5 pb-5">
                <div class="col-sm-6 col-lg-3">
                    <h3 class="fw-bold mb-0">Farm Fresh</h3>
                    <small class="text-white-50">ORGANIC PRODUCTS</small>
                    <p class="text-white-50 small mt-3">Fresh products, healthy lives.</p>

                    <div class="mt-4">
                        <a href="#" class="social-link" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('homeforclient') }}">Home</a></li>
                        <li><a href="{{ route('shoppage') }}">Shop</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <h4 class="footer-title">Contact Us</h4>
                    <ul class="contact-list">
                        <li><i class="bi bi-telephone"></i>+855 123456789</li>
                        <li><i class="bi bi-envelope"></i>Farm@gmail.com</li>
                        <li><i class="bi bi-geo-alt"></i>Kep, Cambodia</li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <h4 class="footer-title">Newsletter</h4>
                    <p class="small text-white-50">Subscribe for updates and offers.</p>
                    <form>
                        <label class="visually-hidden" for="subscribeEmail">Email address</label>
                        <input type="email" id="subscribeEmail" placeholder="Enter your email" class="form-control form-control-sm mb-2">
                        <button type="submit" class="btn footer-subscribe-btn btn-sm w-100">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="copyright">© 2026 Farm Fresh. All Rights Reserved.</div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
