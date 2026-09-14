
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farm Fresh | About Us</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           ROOT
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
        }


        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: var(--body);
            color: var(--text);
            background: var(--white);
            line-height: 1.7;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
        }

        a {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--heading);
        }

        .container {
            max-width: 1240px;
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
            to {
                transform: rotate(360deg);
            }
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

        .top-strip i {
            color: var(--orange-400);
            margin-right: 6px;
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
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(20,55,33,.08);
            transition: .3s ease;
        }

        .main-header.scrolled {
            box-shadow: 0 10px 35px rgba(15,50,30,.10);
        }

        .navbar {
            min-height: 78px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 23px;
            box-shadow: 0 8px 20px rgba(23,61,37,.2);
        }

        .brand-name {
            color: var(--green-900);
            font-size: 21px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.5px;
        }

        .brand-subtitle {
            color: var(--orange-600);
            font-size: 8px;
            letter-spacing: 2.5px;
            font-weight: 800;
            margin-top: 5px;
        }

        .navbar-nav {
            gap: 5px;
        }

        .nav-link {
            color: #3c4941 !important;
            font-size: 13px;
            font-weight: 700;
            padding: 11px 15px !important;
            border-radius: 10px;
            transition: .25s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--green-700) !important;
            background: #edf5ef;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 18px;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-900);
            transition: .25s ease;
        }

        .nav-icon:hover {
            background: var(--green-900);
            color: white;
            transform: translateY(-2px);
        }

        .btn-nav {
            border: 0;
            background: var(--orange-500);
            color: white;
            padding: 11px 18px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            transition: .25s ease;
        }

        .btn-nav:hover {
            background: var(--orange-600);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(217,95,32,.25);
        }

        .navbar-toggler {
            border: 0;
            box-shadow: none !important;
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

        @keyframes heroZoom {
            from {
                transform: scale(1.04);
            }
            to {
                transform: scale(1.10);
            }
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

        .hero-tag i {
            color: var(--orange-400);
        }

        .hero h1 {
            font-size: clamp(48px, 6vw, 82px);
            line-height: 1.03;
            font-weight: 700;
            letter-spacing: -2px;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #bce2a9;
            font-style: italic;
        }

        .hero-description {
            color: rgba(255,255,255,.78);
            font-size: 17px;
            max-width: 650px;
            margin-bottom: 35px;
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
        }

        .btn-primary-custom:hover {
            background: var(--orange-600);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(217,95,32,.3);
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
            50% { transform: translateY(6px); }
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
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow-lg);
            padding: 28px 25px;
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 8px 25px;
            border-right: 1px solid #e8ece9;
        }

        .stat:last-child {
            border-right: 0;
        }

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

        .stat-number {
            color: var(--green-900);
            font-family: var(--heading);
            font-size: 26px;
            font-weight: 800;
            line-height: 1;
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

        .eyebrow::before {
            content: "";
            width: 28px;
            height: 2px;
            background: var(--orange-500);
        }

        .section-title {
            color: var(--green-950);
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.12;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .section-title span {
            color: var(--green-600);
            font-style: italic;
        }

        .section-text {
            color: var(--muted);
            font-size: 15px;
            max-width: 620px;
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

        .about-small-image {
            position: absolute;
            width: 190px;
            height: 210px;
            object-fit: cover;
            border-radius: 22px;
            right: -5px;
            bottom: -35px;
            border: 8px solid white;
            box-shadow: var(--shadow-md);
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
            border: 7px solid white;
        }

        .experience-badge strong {
            font-family: var(--heading);
            font-size: 34px;
            line-height: 1;
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


        /* =========================================================
           SERVICES
        ========================================================= */

        .services-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 55px;
        }

        .services-heading .section-text {
            margin: auto;
        }

        .service-card {
            height: 100%;
            position: relative;
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 32px;
            overflow: hidden;
            transition: .35s ease;
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
            transition: .35s ease;
        }

        .service-card:hover {
            transform: translateY(-9px);
            border-color: transparent;
            box-shadow: var(--shadow-md);
        }

        .service-card:hover::after {
            transform: scale(2.3);
        }

        .service-number {
            position: absolute;
            top: 24px;
            right: 27px;
            color: #dfe7e1;
            font-family: var(--heading);
            font-size: 26px;
            font-weight: 800;
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

        .service-card:hover .service-icon {
            background: var(--green-900);
            color: white;
            transform: rotate(-5deg);
        }

        .service-card h3 {
            position: relative;
            z-index: 2;
            font-size: 20px;
            color: var(--green-950);
            margin-bottom: 10px;
        }

        .service-card p {
            position: relative;
            z-index: 2;
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }


        /* =========================================================
           WHY CHOOSE
        ========================================================= */

        .why-section {
            background: var(--green-950);
            color: white;
            position: relative;
            overflow: hidden;
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

        .why-image {
            position: relative;
            min-height: 650px;
        }

        .why-image img {
            width: 100%;
            height: 650px;
            object-fit: cover;
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

        .image-label small {
            color: #aed5b3;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 800;
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

        .why-content .eyebrow::before {
            background: var(--orange-400);
        }

        .why-content .section-title {
            color: white;
        }

        .why-content .section-text {
            color: rgba(255,255,255,.68);
        }

        .benefit {
            display: flex;
            gap: 17px;
            margin-top: 28px;
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

        .benefit h4 {
            color: white;
            font-size: 17px;
            margin-bottom: 5px;
        }

        .benefit p {
            color: rgba(255,255,255,.58);
            font-size: 13px;
            margin: 0;
        }


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
            background: white;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-700);
            font-size: 30px;
            position: relative;
            z-index: 2;
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

        .process-card h3 {
            margin-top: 22px;
            color: var(--green-950);
            font-size: 19px;
        }

        .process-card p {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .process-line {
            position: absolute;
            top: 45px;
            left: 58%;
            width: 84%;
            border-top: 1px dashed #cbd8ce;
        }


        /* =========================================================
           CTA
        ========================================================= */

        .cta {
            padding: 90px 0;
            background: var(--cream);
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

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
        }

        .cta h2 {
            font-size: clamp(34px, 4vw, 52px);
            margin-bottom: 15px;
        }

        .cta p {
            color: rgba(255,255,255,.72);
            margin-bottom: 28px;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        footer {
            background: #0c2114;
            color: white;
            padding: 80px 0 25px;
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

        .footer-brand strong {
            font-size: 21px;
        }

        .footer-description {
            color: rgba(255,255,255,.52);
            font-size: 13px;
            max-width: 310px;
        }

        .footer-title {
            color: white;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-family: var(--body);
            font-weight: 800;
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
            color: rgba(255,255,255,.52);
            font-size: 13px;
            transition: .2s;
        }

        .footer-links a:hover {
            color: var(--orange-400);
            padding-left: 4px;
        }

        .contact-item {
            display: flex;
            gap: 11px;
            color: rgba(255,255,255,.55);
            font-size: 13px;
            margin-bottom: 14px;
        }

        .contact-item i {
            color: var(--orange-400);
            margin-top: 4px;
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
            transition: .25s;
        }

        .social:hover {
            background: var(--orange-500);
            border-color: var(--orange-500);
            color: white;
            transform: translateY(-3px);
        }

        .newsletter-input {
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.12);
            color: white;
            border-radius: 11px;
            padding: 12px 14px;
            font-size: 12px;
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

        .newsletter-btn {
            background: var(--orange-500);
            color: white;
            border: 0;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 800;
            padding: 12px 16px;
        }

        .newsletter-btn:hover {
            background: var(--orange-600);
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.08);
            margin-top: 55px;
            padding-top: 22px;
            color: rgba(255,255,255,.35);
            font-size: 11px;
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

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
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


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991.98px) {

            .top-strip-right {
                display: none;
            }

            .nav-actions {
                margin-left: 0;
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid rgba(255,255,255,.15);
            }

            .navbar-collapse {
                padding: 15px 0;
            }

            .navbar-nav {
                gap: 2px;
            }

            .nav-link {
                padding: 12px 10px !important;
            }

            .hero {
                min-height: 600px;
            }

            .hero h1 {
                font-size: 55px;
            }

            .stats-wrap {
                margin-top: -35px;
            }

            .stat {
                border-right: 0;
                border-bottom: 1px solid #e8ece9;
                padding: 18px;
            }

            .stat:last-child {
                border-bottom: 0;
            }

            .about-content {
                padding-left: 0;
                margin-top: 70px;
            }

            .why-content {
                padding: 70px 30px;
            }

            .process-line {
                display: none;
            }

            .cta-box {
                padding: 55px 35px;
            }
        }


        @media (max-width: 767.98px) {

            .top-strip {
                display: none;
            }

            .navbar {
                min-height: 70px;
            }

            .brand-logo {
                width: 43px;
                height: 43px;
            }

            .brand-name {
                font-size: 18px;
            }

            .hero {
                min-height: 600px;
            }

            .hero-content {
                padding: 90px 0;
            }

            .hero h1 {
                font-size: 43px;
                letter-spacing: -1px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-scroll {
                display: none;
            }

            .stats-wrap {
                margin-top: 25px;
            }

            .stats-card {
                padding: 10px;
            }

            .section {
                padding: 80px 0;
            }

            .section-title {
                font-size: 36px;
            }

            .about-main-image {
                height: 400px;
            }

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

            .experience-badge strong {
                font-size: 25px;
            }

            .experience-badge span {
                font-size: 8px;
            }

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

            .cta {
                padding: 60px 0;
            }

            .cta-box {
                border-radius: 22px;
                padding: 45px 25px;
            }

            footer {
                padding-top: 60px;
            }
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
     TOP STRIP
========================================================= -->


<!-- =========================================================
     NAVBAR
========================================================= -->

<header class="main-header" id="mainHeader">

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <!-- BRAND -->

            <a href="{{ route('homeforclient') }}" class="brand">

                <div>

                    <img class="brand-logo" src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" alt="Farm Fresh">
                </div>

                <div>

                    <div class="brand-name">
                        Farm Fresh
                    </div>

                    <div class="brand-subtitle">
                        ORGANIC PRODUCTS
                    </div>

                </div>

            </a>


            <!-- MOBILE -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">

                <i class="bi bi-list fs-2"></i>

            </button>


            <!-- NAV -->

            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center">

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
                            class="nav-link">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('about') }}"
                            class="nav-link active">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            Contact
                        </a>
                    </li>

                </ul>


                <div class="nav-actions">

                                    <!-- LOGIN -->

                    <a href="{{ route('login') }}"
                       class="nav-link">

                        Login

                    </a>


                    <!-- REGISTER -->

                    <a href="{{ route('register') }}"
                       class="btn-nav">

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

                <a
                    href="{{ route('shoppage') }}"
                    class="btn-primary-custom">

                    Explore Our Products

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>


                <a
                    href="#our-story"
                    class="btn-light-custom">

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

                        <div class="stat-icon">
                            <i class="bi bi-calendar-heart"></i>
                        </div>

                        <div>

                            <div class="stat-number">
                                20+
                            </div>

                            <div class="stat-label">
                                Years of Farming
                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="stat">

                        <div class="stat-icon">
                            <i class="bi bi-basket2"></i>
                        </div>

                        <div>

                            <div class="stat-number">
                                50+
                            </div>

                            <div class="stat-label">
                                Fresh Products
                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="stat">

                        <div class="stat-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <div>

                            <div class="stat-number">
                                5K+
                            </div>

                            <div class="stat-label">
                                Happy Customers
                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="stat">

                        <div class="stat-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>

                        <div>

                            <div class="stat-number">
                                100%
                            </div>

                            <div class="stat-label">
                                Farm Fresh
                            </div>

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


            <!-- IMAGES -->

            <div class="col-lg-6 reveal">

                <div class="about-image">

                    <img
                        class="about-main-image"
                        src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1000&q=90"
                        alt="Farmer working in agricultural field">


                    <img
                        class="about-small-image"
                        src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&w=600&q=85"
                        alt="Fresh vegetables">


                    <div class="experience-badge">

                        <strong>20+</strong>

                        <span>
                            Years<br>
                            Experience
                        </span>

                    </div>

                </div>

            </div>


            <!-- CONTENT -->

            <div class="col-lg-6 reveal">

                <div class="about-content">

                    <div class="eyebrow">
                        Our Story
                    </div>


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


                    <a
                        href="{{ route('shoppage') }}"
                        class="btn-primary-custom">

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

            <div class="eyebrow justify-content-center">
                What We Do
            </div>

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


            <!-- 01 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        01
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-flower1"></i>
                    </div>

                    <h3>
                        Planting
                    </h3>

                    <p>
                        Carefully selected seeds are planted
                        using responsible farming practices.
                    </p>

                </div>

            </div>


            <!-- 02 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        02
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-moisture"></i>
                    </div>

                    <h3>
                        Smart Watering
                    </h3>

                    <p>
                        We provide crops with the right amount
                        of water to support healthy growth.
                    </p>

                </div>

            </div>


            <!-- 03 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        03
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-sun"></i>
                    </div>

                    <h3>
                        Natural Growing
                    </h3>

                    <p>
                        Our crops benefit from sunlight,
                        healthy soil, and careful monitoring.
                    </p>

                </div>

            </div>


            <!-- 04 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        04
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-basket"></i>
                    </div>

                    <h3>
                        Fresh Harvest
                    </h3>

                    <p>
                        Fresh products are carefully harvested
                        when they are ready for our customers.
                    </p>

                </div>

            </div>


            <!-- 05 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        05
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h3>
                        Quality Packing
                    </h3>

                    <p>
                        Products are prepared and packed carefully
                        to maintain freshness.
                    </p>

                </div>

            </div>


            <!-- 06 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        06
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-truck"></i>
                    </div>

                    <h3>
                        Fast Delivery
                    </h3>

                    <p>
                        We work to move fresh products quickly
                        from our farm to your home.
                    </p>

                </div>

            </div>


            <!-- 07 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        07
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h3>
                        Healthy Food
                    </h3>

                    <p>
                        Fresh food helps families build healthier
                        and better everyday lifestyles.
                    </p>

                </div>

            </div>


            <!-- 08 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="service-card">

                    <span class="service-number">
                        08
                    </span>

                    <div class="service-icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h3>
                        Farm Market
                    </h3>

                    <p>
                        Explore our collection of vegetables,
                        fruits, eggs, nuts, and more.
                    </p>

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


            <!-- IMAGE -->

            <div class="col-lg-5">

                <div class="why-image">

                    <img
                        src="https://images.unsplash.com/photo-1500076656116-558758c991c1?auto=format&fit=crop&w=1200&q=90"
                        alt="Farmer working on farm">

                    <div class="image-label">

                        <small>
                            Our commitment
                        </small>

                        <strong>
                            Better farming. Better future.
                        </strong>

                    </div>

                </div>

            </div>


            <!-- CONTENT -->

            <div class="col-lg-7">

                <div class="why-content reveal">

                    <div class="eyebrow">
                        Why Farm Fresh
                    </div>


                    <h2 class="section-title">

                        Good food starts with
                        <span>good farming.</span>

                    </h2>


                    <p class="section-text">

                        We care about more than simply producing
                        food. We care about the land, the farmers,
                        the community, and the people who enjoy
                        our products.

                    </p>


                    <!-- BENEFIT -->

                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="bi bi-leaf"></i>

                        </div>

                        <div>

                            <h4>
                                Fresh & Natural
                            </h4>

                            <p>
                                Products are grown and handled
                                with freshness as our priority.
                            </p>

                        </div>

                    </div>


                    <!-- BENEFIT -->

                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>

                        <div>

                            <h4>
                                Quality You Can Trust
                            </h4>

                            <p>
                                We focus on quality at every stage,
                                from farming to delivery.
                            </p>

                        </div>

                    </div>


                    <!-- BENEFIT -->

                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="bi bi-globe-americas"></i>

                        </div>

                        <div>

                            <h4>
                                Sustainable Thinking
                            </h4>

                            <p>
                                We believe protecting the land today
                                creates a better tomorrow.
                            </p>

                        </div>

                    </div>


                    <!-- BENEFIT -->

                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="bi bi-people"></i>

                        </div>

                        <div>

                            <h4>
                                Supporting Farmers
                            </h4>

                            <p>
                                Strong farming communities create
                                stronger local food systems.
                            </p>

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

            <div class="eyebrow justify-content-center">
                Our Process
            </div>

            <h2 class="section-title">
                How fresh food <span>gets to you</span>
            </h2>

            <p class="section-text">
                A simple journey powered by care,
                experience, and responsible farming.
            </p>

        </div>


        <div class="row g-4 position-relative">


            <!-- 01 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="process-card">

                    <div class="process-line"></div>

                    <div class="process-number">
                        01
                    </div>

                    <div class="process-icon">

                        <i class="bi bi-flower1"></i>

                    </div>

                    <h3>
                        Grow
                    </h3>

                    <p>
                        Healthy crops begin with
                        healthy soil and careful farming.
                    </p>

                </div>

            </div>


            <!-- 02 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="process-card">

                    <div class="process-line"></div>

                    <div class="process-number">
                        02
                    </div>

                    <div class="process-icon">

                        <i class="bi bi-sun"></i>

                    </div>

                    <h3>
                        Care
                    </h3>

                    <p>
                        We monitor and care for our
                        crops throughout their growth.
                    </p>

                </div>

            </div>


            <!-- 03 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="process-card">

                    <div class="process-line"></div>

                    <div class="process-number">
                        03
                    </div>

                    <div class="process-icon">

                        <i class="bi bi-basket"></i>

                    </div>

                    <h3>
                        Harvest
                    </h3>

                    <p>
                        Products are harvested at the
                        right time for maximum freshness.
                    </p>

                </div>

            </div>


            <!-- 04 -->

            <div class="col-lg-3 col-md-6 reveal">

                <div class="process-card">

                    <div class="process-number">
                        04
                    </div>

                    <div class="process-icon">

                        <i class="bi bi-house-heart"></i>

                    </div>

                    <h3>
                        Deliver
                    </h3>

                    <p>
                        Fresh products continue their
                        journey from our farm to your table.
                    </p>

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

                <div class="eyebrow"
                     style="color:#b9dfbc;">

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


                <a
                    href="{{ route('shoppage') }}"
                    class="btn-primary-custom">

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


            <!-- BRAND -->

            <div class="col-lg-4">

                <div class="footer-brand">

                    <div class="footer-brand-icon">

                        <i class="bi bi-leaf-fill"></i>

                    </div>

                    <div>

                        <strong>
                            Farm Fresh
                        </strong>

                        <div
                            style="
                            color:#ed762d;
                            font-size:8px;
                            letter-spacing:2px;
                            font-weight:800;
                            ">

                            ORGANIC PRODUCTS

                        </div>

                    </div>

                </div>


                <p class="footer-description">

                    Fresh products, responsible farming,
                    and a healthier future for our communities.

                </p>


                <div class="socials">

                    <a href="#" class="social">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <a href="#" class="social">
                        <i class="bi bi-telegram"></i>
                    </a>

                </div>

            </div>


            <!-- LINKS -->

            <div class="col-6 col-lg-2">

                <h4 class="footer-title">
                    Explore
                </h4>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('homeforclient') }}">
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
                        <a href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <!-- PRODUCTS -->

            <div class="col-6 col-lg-2">

                <h4 class="footer-title">
                    Products
                </h4>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('shoppage') }}">
                            Vegetables
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shoppage') }}">
                            Fruits
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shoppage') }}">
                            Fresh Nuts
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shoppage') }}">
                            Eggs
                        </a>
                    </li>

                </ul>

            </div>


            <!-- CONTACT -->

            <div class="col-lg-4">

                <h4 class="footer-title">
                    Contact Us
                </h4>


                <div class="contact-item">

                    <i class="bi bi-geo-alt-fill"></i>

                    <span>
                        Kep, Cambodia
                    </span>

                </div>


                <div class="contact-item">

                    <i class="bi bi-telephone-fill"></i>

                    <span>
                        +855 12 345 678
                    </span>

                </div>


                <div class="contact-item">

                    <i class="bi bi-envelope-fill"></i>

                    <span>
                        Farm@gmail.com
                    </span>

                </div>


                <form class="mt-4">

                    <div class="input-group">

                        <input
                            type="email"
                            class="form-control newsletter-input"
                            placeholder="Your email address">

                        <button
                            class="newsletter-btn"
                            type="submit">

                            Join

                        </button>

                    </div>

                </form>

            </div>

        </div>


        <!-- BOTTOM -->

        <div class="footer-bottom">

            <div class="row align-items-center">

                <div class="col-md-6">

                    © 2026 Farm Fresh.
                    All Rights Reserved.

                </div>

                <div class="col-md-6 text-md-end mt-2 mt-md-0">

                    Fresh food.
                    Better life.
                    Stronger future.

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

    /* =========================================================
       PAGE LOADER
    ========================================================= */

    window.addEventListener("load", function () {

        setTimeout(function () {

            document.getElementById("loader")
                .classList.add("hide");

        }, 500);

    });


    /* =========================================================
       NAVBAR SCROLL
    ========================================================= */

    const header =
        document.getElementById("mainHeader");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 30) {

            header.classList.add("scrolled");

        } else {

            header.classList.remove("scrolled");

        }

    });


    /* =========================================================
       BACK TO TOP
    ========================================================= */

    const backTop =
        document.getElementById("backTop");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 500) {

            backTop.classList.add("show");

        } else {

            backTop.classList.remove("show");

        }

    });


    backTop.addEventListener("click", function () {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });


    /* =========================================================
       SCROLL REVEAL
    ========================================================= */

    const revealElements =
        document.querySelectorAll(".reveal");

    const revealObserver =
        new IntersectionObserver(

            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add("active");

                        revealObserver.unobserve(
                            entry.target
                        );

                    }

                });

            },

            {
                threshold: 0.12
            }

        );


    revealElements.forEach(function (element) {

        revealObserver.observe(element);

    });


    /* =========================================================
       CLOSE MOBILE NAV AFTER CLICK
    ========================================================= */

    document.querySelectorAll(
        ".navbar-nav .nav-link"
    ).forEach(function (link) {

        link.addEventListener("click", function () {

            const navbar =
                document.getElementById("mainNavbar");

            if (
                navbar.classList.contains("show")
            ) {

                const collapse =
                    bootstrap.Collapse
                        .getInstance(navbar);

                if (collapse) {
                    collapse.hide();
                }

            }

        });

    });

</script>


</body>

</html>