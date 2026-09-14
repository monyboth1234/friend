
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us | Farm Fresh Organic Products</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --green: #1c3e27;
            --green-dark: #102719;
            --green-deep: #08170d;
            --green-soft: #edf5ef;

            --orange: #e06d26;
            --orange-dark: #c85b1d;
            --orange-soft: #fff1e8;

            --cream: #fafcf9;
            --white: #ffffff;

            --text: #17221a;
            --muted: #728078;
            --border: #e5ebe6;

            --shadow-sm: 0 8px 25px rgba(18,45,27,.05);
            --shadow-md: 0 18px 55px rgba(18,45,27,.08);
            --shadow-lg: 0 30px 90px rgba(18,45,27,.12);

            --radius-md: 18px;
            --radius-lg: 26px;
            --radius-xl: 34px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--text);
            background: var(--cream);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        /* =====================================================
           NAVBAR
        ====================================================== */

        .main-header {
            position: sticky;
            top: 0;
            z-index: 9999;
            padding: 13px 0;
            background: rgba(255,255,255,.90);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border-bottom: 1px solid rgba(28,62,39,.07);
            transition: all .3s ease;
        }

        .main-header.scrolled {
            padding: 9px 0;
            box-shadow: 0 10px 35px rgba(20,45,27,.08);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--green);
            flex-shrink: 0;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 8px 22px rgba(28,62,39,.16);
            transition: transform .3s ease;
        }

        .brand:hover .brand-logo {
            transform: rotate(-4deg) scale(1.04);
        }

        .brand-name {
            color: var(--green);
            font-size: 19px;
            font-weight: 800;
            line-height: 1;
        }

        .brand-subtitle {
            margin-top: 5px;
            color: var(--muted);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .navbar-toggler {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green);
            background: var(--green-soft);
            border: 1px solid rgba(28,62,39,.08);
            border-radius: 12px;
            box-shadow: none !important;
        }

        .navbar-nav {
            gap: 4px;
        }

        .nav-link {
            position: relative;
            padding: 10px 14px !important;
            color: #566259 !important;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 700;
            transition: all .25s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 4px;
            width: 0;
            height: 2px;
            background: var(--orange);
            border-radius: 5px;
            transform: translateX(-50%);
            transition: width .25s ease;
        }

        .nav-link:hover {
            color: var(--green) !important;
            background: var(--green-soft);
        }

        .nav-link:hover::after {
            width: 18px;
        }

        .nav-link.active {
            color: var(--green) !important;
            background: var(--green-soft);
        }

        .nav-link.active::after {
            width: 18px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-left: 13px;
        }

        .nav-actions .nav-link {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        /* =====================================================
           REGISTER
        ====================================================== */

        .btn-nav {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            color: #fff !important;
            background: var(--orange);
            border-radius: 11px;
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(224,109,38,.16);
            transition: all .25s ease;
        }

        .btn-nav:hover {
            color: #fff !important;
            background: var(--orange-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(224,109,38,.25);
        }

        /* =====================================================
           HERO
        ====================================================== */

        .hero {
            position: relative;
            min-height: 610px;
            display: flex;
            align-items: center;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 8% 15%,
                    rgba(224,109,38,.13),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 90% 70%,
                    rgba(28,62,39,.12),
                    transparent 30%
                ),
                linear-gradient(
                    180deg,
                    #fbfcf9,
                    #f3f8f3
                );
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            opacity: .55;

            background-image:
                linear-gradient(
                    rgba(28,62,39,.035) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(28,62,39,.035) 1px,
                    transparent 1px
                );

            background-size: 55px 55px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black,
                    transparent 92%
                );
        }

        .hero-circle {
            position: absolute;
            border: 1px solid rgba(28,62,39,.08);
            border-radius: 50%;
        }

        .hero-circle.one {
            width: 520px;
            height: 520px;
            right: -230px;
            top: -220px;
        }

        .hero-circle.two {
            width: 300px;
            height: 300px;
            left: -150px;
            bottom: -170px;
            border-color: rgba(224,109,38,.12);
        }

        .hero-circle.three {
            width: 120px;
            height: 120px;
            right: 17%;
            bottom: 12%;
            background: rgba(224,109,38,.04);
            border-color: rgba(224,109,38,.08);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 850px;
            margin: auto;
            text-align: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            color: var(--green);
            background: rgba(237,245,239,.9);
            border: 1px solid rgba(28,62,39,.08);
            border-radius: 100px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            box-shadow: var(--shadow-sm);
        }

        .hero-badge i {
            color: var(--orange);
            font-size: 13px;
        }

        .hero-title {
            margin: 25px 0 20px;
            color: var(--green-dark);
            font-size: clamp(45px, 7vw, 78px);
            line-height: 1.01;
            font-weight: 800;
            letter-spacing: -4px;
        }

        .hero-title span {
            display: block;
            color: var(--orange);
        }

        .hero-text {
            max-width: 670px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.9;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 47px;
            padding: 0 19px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            transition: all .25s ease;
        }

        .hero-btn.primary {
            color: #fff;
            background: var(--green);
            box-shadow: 0 12px 28px rgba(28,62,39,.17);
        }

        .hero-btn.primary:hover {
            color: #fff;
            background: var(--green-dark);
            transform: translateY(-3px);
        }

        .hero-btn.secondary {
            color: var(--green);
            background: #fff;
            border: 1px solid var(--border);
        }

        .hero-btn.secondary:hover {
            color: var(--orange);
            border-color: #efd4c3;
            transform: translateY(-3px);
        }

        /* =====================================================
           CONTACT BOX
        ====================================================== */

        .contact-wrapper {
            position: relative;
            z-index: 10;
            margin-top: -65px;
            padding-bottom: 105px;
        }

        .contact-box {
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
        }

        /* =====================================================
           CONTACT INFO
        ====================================================== */

        .contact-info {
            position: relative;
            height: 100%;
            min-height: 620px;
            padding: 55px 45px;
            overflow: hidden;
            color: #fff;

            background:
                radial-gradient(
                    circle at 100% 0%,
                    rgba(224,109,38,.19),
                    transparent 30%
                ),
                linear-gradient(
                    145deg,
                    #235332,
                    #173c24 48%,
                    #0d2414
                );
        }

        .contact-info::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            right: -210px;
            top: -210px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 50%;
        }

        .contact-info::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            left: -140px;
            bottom: -150px;
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 50%;
        }

        .info-inner {
            position: relative;
            z-index: 2;
        }

        .info-kicker {
            margin-bottom: 11px;
            color: #9fc0a6;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .info-title {
            margin-bottom: 16px;
            color: #fff;
            font-size: 32px;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -.9px;
        }

        .info-description {
            margin-bottom: 38px;
            color: #bfd0c3;
            font-size: 12px;
            line-height: 1.85;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 21px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,.055);
            background: rgba(255,255,255,.035);
            border-radius: 15px;
            transition: all .25s ease;
        }

        .info-item:hover {
            background: rgba(255,255,255,.075);
            transform: translateX(4px);
        }

        .info-icon {
            flex: 0 0 43px;
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff9a5c;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 12px;
            font-size: 16px;
        }

        .info-item small {
            display: block;
            margin-bottom: 4px;
            color: #8ea796;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .info-item a,
        .info-item p {
            margin: 0;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.5;
        }

        .info-item a:hover {
            color: #ff9a5c;
        }

        /* =====================================================
           SOCIAL
        ====================================================== */

        .social-area {
            margin-top: 32px;
            padding-top: 25px;
            border-top: 1px solid rgba(255,255,255,.08);
        }

        .social-label {
            margin-bottom: 12px;
            color: #8ea796;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .social-links {
            display: flex;
            gap: 8px;
        }

        .social-link {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 11px;
            transition: all .25s ease;
        }

        .social-link:hover {
            color: #fff;
            background: var(--orange);
            transform: translateY(-4px);
            box-shadow: 0 10px 22px rgba(224,109,38,.25);
        }

        /* =====================================================
           FORM
        ====================================================== */

        .contact-form {
            padding: 55px 52px;
        }

        .form-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-kicker {
            margin-bottom: 8px;
            color: var(--orange);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .form-title {
            margin-bottom: 8px;
            color: var(--green-dark);
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.9px;
        }

        .form-description {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.75;
        }

        .form-status {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            color: #357047;
            background: #eef8f0;
            border: 1px solid #d7eadb;
            border-radius: 50px;
            font-size: 8px;
            font-weight: 800;
        }

        /* =====================================================
           ALERTS
        ====================================================== */

        .success-message {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 13px 15px;
            margin-bottom: 24px;
            color: #24603a;
            background: #edf8f0;
            border: 1px solid #d2ead8;
            border-radius: 13px;
            font-size: 11px;
            font-weight: 600;
        }

        .error-box {
            margin-top: 7px;
            color: #b84242;
            font-size: 9px;
            font-weight: 600;
        }

        /* =====================================================
           FORM FIELDS
        ====================================================== */

        .form-label {
            margin-bottom: 7px;
            color: var(--green-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .field {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            z-index: 2;
            color: #89958d;
            transform: translateY(-50%);
            transition: color .2s ease;
        }

        .field:focus-within .input-icon {
            color: var(--green);
        }

        .message-icon {
            top: 17px;
            transform: none;
        }

        .form-control,
        .form-select {
            width: 100%;
            min-height: 49px;
            padding: 11px 14px;
            color: var(--text);
            background: #fafcf9;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 11px;
            box-shadow: none !important;
            transition: all .22s ease;
        }

        .field .form-control {
            padding-left: 40px;
        }

        textarea.form-control {
            min-height: 145px;
            padding-top: 13px;
            resize: vertical;
        }

        .form-control::placeholder {
            color: #a3aca6;
        }

        .form-control:hover,
        .form-select:hover {
            background: #fff;
            border-color: #d2ddd5;
        }

        .form-control:focus,
        .form-select:focus {
            color: var(--text);
            background: #fff;
            border-color: var(--green);
            box-shadow: 0 0 0 4px rgba(28,62,39,.07) !important;
        }

        .form-select {
            cursor: pointer;
        }

        /* =====================================================
           SUBMIT
        ====================================================== */

        .submit-btn {
            width: 100%;
            min-height: 53px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: 0;
            border-radius: 12px;
            color: #fff;
            background: linear-gradient(
                135deg,
                var(--green),
                #2b5a39
            );
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 12px 27px rgba(28,62,39,.16);
            transition: all .25s ease;
        }

        .submit-btn:hover {
            color: #fff;
            background: linear-gradient(
                135deg,
                var(--green-dark),
                var(--green)
            );
            transform: translateY(-2px);
            box-shadow: 0 17px 32px rgba(28,62,39,.22);
        }

        .submit-btn i {
            transition: transform .25s ease;
        }

        .submit-btn:hover i {
            transform: translateX(4px);
        }

        .form-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            margin-top: 12px;
            color: #8c9790;
            font-size: 9px;
        }

        /* =====================================================
           SECTIONS
        ====================================================== */

        .quick-section,
        .faq-section,
        .location-section {
            padding-bottom: 105px;
        }

        .section-heading {
            max-width: 700px;
            margin: 0 auto 45px;
            text-align: center;
        }

        .section-label {
            margin-bottom: 9px;
            color: var(--orange);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            margin-bottom: 11px;
            color: var(--green-dark);
            font-size: 35px;
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* =====================================================
           QUICK CARDS
        ====================================================== */

        .quick-card {
            position: relative;
            height: 100%;
            padding: 30px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 21px;
            box-shadow: var(--shadow-sm);
            transition: all .3s ease;
        }

        .quick-card::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -55px;
            top: -55px;
            border-radius: 50%;
            background: var(--green-soft);
            transition: transform .35s ease;
        }

        .quick-card:hover {
            transform: translateY(-8px);
            border-color: #d4e0d7;
            box-shadow: var(--shadow-md);
        }

        .quick-card:hover::before {
            transform: scale(1.4);
        }

        .quick-icon {
            position: relative;
            z-index: 2;
            width: 53px;
            height: 53px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 19px;
            color: var(--orange);
            background: var(--orange-soft);
            border: 1px solid #f4dfd1;
            border-radius: 15px;
            font-size: 20px;
        }

        .quick-card h5 {
            position: relative;
            z-index: 2;
            margin-bottom: 9px;
            color: var(--green-dark);
            font-size: 14px;
            font-weight: 800;
        }

        .quick-card p {
            position: relative;
            z-index: 2;
            min-height: 58px;
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.8;
        }

        .quick-link {
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--green);
            font-size: 10px;
            font-weight: 800;
        }

        .quick-link i {
            transition: transform .2s ease;
        }

        .quick-link:hover {
            color: var(--orange);
        }

        .quick-link:hover i {
            transform: translateX(4px);
        }

        /* =====================================================
           FAQ
        ====================================================== */

        .faq-wrapper {
            max-width: 850px;
            margin: auto;
        }

        .accordion-item {
            margin-bottom: 11px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border) !important;
            border-radius: 15px !important;
            box-shadow: var(--shadow-sm);
        }

        .accordion-button {
            padding: 19px 21px;
            color: var(--green-dark);
            background: #fff;
            font-size: 11px;
            font-weight: 800;
            box-shadow: none !important;
        }

        .accordion-button:not(.collapsed) {
            color: var(--green);
            background: var(--green-soft);
        }

        .accordion-body {
            padding: 0 21px 20px;
            color: var(--muted);
            background: var(--green-soft);
            font-size: 10px;
            line-height: 1.8;
        }

        /* =====================================================
           LOCATION
        ====================================================== */

        .location-box {
            position: relative;
            padding: 55px;
            overflow: hidden;
            color: #fff;

            background:
                radial-gradient(
                    circle at 90% 15%,
                    rgba(224,109,38,.19),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #1d472a,
                    #0d2414
                );

            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
        }

        .location-box::before {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            right: -230px;
            top: -240px;
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 50%;
        }

        .location-content {
            position: relative;
            z-index: 2;
        }

        .location-label {
            margin-bottom: 9px;
            color: #9fc0a6;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .location-box h3 {
            margin-bottom: 12px;
            color: #fff;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .location-box p {
            max-width: 650px;
            margin-bottom: 25px;
            color: #bfd0c4;
            font-size: 11px;
            line-height: 1.8;
        }

        .location-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 17px;
            color: var(--green);
            background: #fff;
            border-radius: 11px;
            font-size: 10px;
            font-weight: 800;
            transition: all .25s ease;
        }

        .location-btn:hover {
            color: #fff;
            background: var(--orange);
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(224,109,38,.22);
        }

        /* =====================================================
           FOOTER
        ====================================================== */

        footer {
            padding: 55px 0 25px;
            color: #fff;
            background: linear-gradient(
                135deg,
                #102519,
                #07150b
            );
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 12px;
        }

        .footer-logo {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 11px;
        }

        .footer-name {
            color: #fff;
            font-size: 18px;
            font-weight: 800;
        }

        .footer-description {
            max-width: 430px;
            color: #92a49a;
            font-size: 10px;
            line-height: 1.8;
        }

        .footer-links {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 21px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #aebbb2;
            font-size: 10px;
            font-weight: 600;
            transition: color .2s ease;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .footer-bottom {
            margin-top: 32px;
            padding-top: 19px;
            color: #718379;
            border-top: 1px solid rgba(255,255,255,.07);
            font-size: 9px;
        }

        /* =====================================================
           ANIMATION
        ====================================================== */

        .fade-up {
            animation: fadeUp .8s cubic-bezier(.2,.7,.2,1) both;
        }

        .delay-1 {
            animation-delay: .1s;
        }

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 991px) {

            .navbar-collapse {
                padding-top: 15px;
            }

            .navbar-nav {
                gap: 2px;
            }

            .nav-link {
                padding: 11px 13px !important;
            }

            .nav-actions {
                margin: 10px 0 0;
                padding-top: 10px;
                border-top: 1px solid var(--border);
                justify-content: flex-start;
            }

            .hero {
                min-height: 560px;
            }

            .contact-info {
                min-height: auto;
            }

            .contact-form {
                padding: 42px 35px;
            }

            .contact-info {
                padding: 45px 35px;
            }

            .footer-links {
                justify-content: flex-start;
                margin-top: 25px;
            }

        }

        @media (max-width: 767px) {

            .main-header {
                padding: 10px 0;
            }

            .brand-logo {
                width: 43px;
                height: 43px;
            }

            .brand-name {
                font-size: 17px;
            }

            .brand-subtitle {
                font-size: 7px;
            }

            .hero {
                min-height: 530px;
                padding: 55px 0 100px;
            }

            .hero-title {
                font-size: 43px;
                letter-spacing: -2.4px;
            }

            .hero-text {
                font-size: 12px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-btn {
                width: 100%;
                max-width: 245px;
            }

            .contact-wrapper {
                margin-top: -45px;
                padding-bottom: 75px;
            }

            .contact-box {
                border-radius: 24px;
            }

            .contact-info,
            .contact-form {
                padding: 32px 24px;
            }

            .info-title {
                font-size: 27px;
            }

            .form-title {
                font-size: 26px;
            }

            .form-top {
                display: block;
            }

            .form-status {
                margin-top: 15px;
            }

            .quick-section,
            .faq-section,
            .location-section {
                padding-bottom: 75px;
            }

            .section-heading {
                margin-bottom: 32px;
            }

            .section-heading h2 {
                font-size: 28px;
            }

            .quick-card {
                padding: 25px;
            }

            .location-box {
                padding: 35px 25px;
                border-radius: 24px;
            }

            .location-box h3 {
                font-size: 25px;
            }

            .footer-links {
                gap: 14px;
            }

            .footer-bottom {
                text-align: center;
            }

        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }

        }

    </style>

</head>

<body>

<!-- =====================================================
     NAVBAR
====================================================== -->

<header class="main-header" id="mainHeader">

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <!-- BRAND -->

            <a
                href="{{ route('homeforclient') }}"
                class="brand"
            >

                <div>

                    <img
                        class="brand-logo"
                        src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                        alt="Farm Fresh"
                    >

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


            <!-- MOBILE MENU -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <i class="bi bi-list fs-2"></i>

            </button>


            <!-- NAVIGATION -->

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
                            class="nav-link ">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link active">
                            Contact
                        </a>
                    </li>

                </ul>


                <div class="nav-actions">

                    <!-- CART -->

                


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


<!-- =====================================================
     HERO
====================================================== -->

<section class="hero">

    <div class="hero-grid"></div>

    <div class="hero-circle one"></div>
    <div class="hero-circle two"></div>
    <div class="hero-circle three"></div>

    <div class="container">

        <div class="hero-content fade-up">

            <div class="hero-badge">

                <i class="bi bi-chat-heart-fill"></i>

                We're here to help

            </div>

            <h1 class="hero-title">

                Let's grow something

                <span>good together.</span>

            </h1>

            <p class="hero-text">

                Have a question about our products, your order,
                delivery, or anything Farm Fresh?
                Our team is ready to help you.

            </p>

            <div class="hero-actions">

                <a
                    href="#contact-form"
                    class="hero-btn primary"
                >

                    Start a conversation

                    <i class="bi bi-arrow-down"></i>

                </a>

                <a
                    href="tel:+85512345678"
                    class="hero-btn secondary"
                >

                    <i class="bi bi-telephone"></i>

                    Call us

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     CONTACT MAIN
====================================================== -->

<section
    class="contact-wrapper"
    id="contact-form"
>

    <div class="container">

        <div class="contact-box fade-up delay-1">

            <div class="row g-0">

                <!-- LEFT -->

                <div class="col-lg-5">

                    <div class="contact-info">

                        <div class="info-inner">

                            <div class="info-kicker">
                                Contact information
                            </div>

                            <h2 class="info-title">
                                We'd love to
                                hear from you.
                            </h2>

                            <p class="info-description">

                                Whether you need help with an order,
                                have a product question, or simply want
                                to learn more about Farm Fresh,
                                our team is ready to help.

                            </p>


                            <!-- PHONE -->

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>

                                <div>

                                    <small>
                                        Call us
                                    </small>

                                    <a href="tel:+85512345678">
                                        +855 12 345 678
                                    </a>

                                </div>

                            </div>


                            <!-- EMAIL -->

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>

                                <div>

                                    <small>
                                        Email us
                                    </small>

                                    <a href="mailto:hello@farmfresh.com">
                                        hello@farmfresh.com
                                    </a>

                                </div>

                            </div>


                            <!-- LOCATION -->

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>

                                <div>

                                    <small>
                                        Visit us
                                    </small>

                                    <p>
                                        Phnom Penh, Cambodia
                                    </p>

                                </div>

                            </div>


                            <!-- HOURS -->

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="bi bi-clock-fill"></i>
                                </div>

                                <div>

                                    <small>
                                        Opening hours
                                    </small>

                                    <p>
                                        Mon – Sat · 8:00 AM – 6:00 PM
                                    </p>

                                </div>

                            </div>


                            <!-- SOCIAL -->

                            <div class="social-area">

                                <div class="social-label">
                                    Follow Farm Fresh
                                </div>

                                <div class="social-links">

                                    <a
                                        href="#"
                                        class="social-link"
                                        aria-label="Facebook"
                                    >
                                        <i class="bi bi-facebook"></i>
                                    </a>

                                    <a
                                        href="#"
                                        class="social-link"
                                        aria-label="Instagram"
                                    >
                                        <i class="bi bi-instagram"></i>
                                    </a>

                                    <a
                                        href="#"
                                        class="social-link"
                                        aria-label="Telegram"
                                    >
                                        <i class="bi bi-telegram"></i>
                                    </a>

                                    <a
                                        href="#"
                                        class="social-link"
                                        aria-label="TikTok"
                                    >
                                        <i class="bi bi-tiktok"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->

                <div class="col-lg-7">

                    <div class="contact-form">

                        <!-- SUCCESS -->

                        @if(session('success'))

                            <div class="success-message">

                                <i class="bi bi-check-circle-fill"></i>

                                {{ session('success') }}

                            </div>

                        @endif


                        <!-- FORM HEADER -->

                        <div class="form-top">

                            <div>

                                <div class="form-kicker">
                                    Send us a message
                                </div>

                                <h2 class="form-title">
                                    How can we help?
                                </h2>

                                <p class="form-description mb-0">
                                    Fill out the form and our team
                                    will get back to you shortly.
                                </p>

                            </div>

                            <div class="form-status">

                                <i class="bi bi-shield-check"></i>

                                Secure message

                            </div>

                        </div>


                        <!-- CONTACT FORM -->

                        <form
                            action="{{ route('contact.store') }}"
                            method="POST"
                        >

                            @csrf

                            <div class="row g-3">

                                <!-- NAME -->

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <div class="field">

                                        <i class="bi bi-person input-icon"></i>

                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            placeholder="Your full name"
                                            value="{{ old('name') }}"
                                            required
                                        >

                                    </div>

                                    @error('name')

                                        <div class="error-box">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- EMAIL -->

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Email Address
                                    </label>

                                    <div class="field">

                                        <i class="bi bi-envelope input-icon"></i>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            placeholder="you@example.com"
                                            value="{{ old('email') }}"
                                            required
                                        >

                                    </div>

                                    @error('email')

                                        <div class="error-box">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- PHONE -->

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <div class="field">

                                        <i class="bi bi-telephone input-icon"></i>

                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            placeholder="+855..."
                                            value="{{ old('phone') }}"
                                        >

                                    </div>

                                    @error('phone')

                                        <div class="error-box">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- SUBJECT -->

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Subject
                                    </label>

                                    <select
                                        name="subject"
                                        class="form-select"
                                    >

                                        <option value="">
                                            Select a topic
                                        </option>

                                        <option
                                            value="Order Support"
                                            {{ old('subject') == 'Order Support' ? 'selected' : '' }}
                                        >
                                            Order Support
                                        </option>

                                        <option
                                            value="Product Question"
                                            {{ old('subject') == 'Product Question' ? 'selected' : '' }}
                                        >
                                            Product Question
                                        </option>

                                        <option
                                            value="Delivery Question"
                                            {{ old('subject') == 'Delivery Question' ? 'selected' : '' }}
                                        >
                                            Delivery Question
                                        </option>

                                        <option
                                            value="Partnership"
                                            {{ old('subject') == 'Partnership' ? 'selected' : '' }}
                                        >
                                            Partnership
                                        </option>

                                        <option
                                            value="Other"
                                            {{ old('subject') == 'Other' ? 'selected' : '' }}
                                        >
                                            Other
                                        </option>

                                    </select>

                                    @error('subject')

                                        <div class="error-box">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- MESSAGE -->

                                <div class="col-12">

                                    <label class="form-label">
                                        Message
                                    </label>

                                    <div class="field">

                                        <i class="bi bi-chat-left-text input-icon message-icon"></i>

                                        <textarea
                                            name="message"
                                            class="form-control"
                                            placeholder="Tell us how we can help..."
                                            required
                                        >{{ old('message') }}</textarea>

                                    </div>

                                    @error('message')

                                        <div class="error-box">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- SUBMIT -->

                                <div class="col-12 mt-3">

                                    <button
                                        type="submit"
                                        class="submit-btn"
                                    >

                                        Send Message

                                        <i class="bi bi-arrow-right"></i>

                                    </button>

                                    <div class="form-note">

                                        <i class="bi bi-lock-fill"></i>

                                        Your information is safe and secure.

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     QUICK HELP
====================================================== -->

<section class="quick-section">

    <div class="container">

        <div class="section-heading">

            <div class="section-label">
                Need quick help?
            </div>

            <h2>
                We're here for every step.
            </h2>

            <p>
                Choose the easiest way to get the help you need.
            </p>

        </div>


        <div class="row g-4">

            <!-- ORDER -->

            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h5>
                        Questions about your order?
                    </h5>

                    <p>
                        Need an update about your order,
                        delivery, or something missing
                        from your package?
                    </p>

                    <a
                        href="#contact-form"
                        class="quick-link"
                    >
                        Get order help
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>


            <!-- PRODUCTS -->

            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="bi bi-basket2"></i>
                    </div>

                    <h5>
                        Curious about our products?
                    </h5>

                    <p>
                        Explore our vegetables, fruits,
                        eggs, fresh nuts and other
                        farm-fresh products.
                    </p>

                    <a
                        href="{{ route('shoppage') }}"
                        class="quick-link"
                    >
                        Explore products
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>


            <!-- PARTNERSHIP -->

            <div class="col-md-4">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>

                    <h5>
                        Want to work with us?
                    </h5>

                    <p>
                        Interested in partnerships,
                        suppliers, or growing together
                        with Farm Fresh?
                    </p>

                    <a
                        href="#contact-form"
                        class="quick-link"
                    >
                        Contact our team
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     FAQ
====================================================== -->

<section class="faq-section">

    <div class="container">

        <div class="section-heading">

            <div class="section-label">
                Frequently asked
            </div>

            <h2>
                Questions, answered.
            </h2>

            <p>
                A few things our customers commonly ask.
            </p>

        </div>


        <div class="faq-wrapper">

            <div
                class="accordion"
                id="faqAccordion"
            >

                <!-- FAQ 1 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faqOne"
                        >

                            How can I place an order?

                        </button>

                    </h2>

                    <div
                        id="faqOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#faqAccordion"
                    >

                        <div class="accordion-body">

                            Visit our Shop page, choose the products
                            you want, add them to your cart, and
                            continue with checkout.

                        </div>

                    </div>

                </div>


                <!-- FAQ 2 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faqTwo"
                        >

                            Do you provide delivery?

                        </button>

                    </h2>

                    <div
                        id="faqTwo"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion"
                    >

                        <div class="accordion-body">

                            Yes. Farm Fresh provides delivery for
                            customers in supported areas.
                            Delivery details are confirmed during
                            the order process.

                        </div>

                    </div>

                </div>


                <!-- FAQ 3 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faqThree"
                        >

                            How fresh are your products?

                        </button>

                    </h2>

                    <div
                        id="faqThree"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion"
                    >

                        <div class="accordion-body">

                            We focus on bringing quality agricultural
                            products closer to customers while
                            supporting local farmers.

                        </div>

                    </div>

                </div>


                <!-- FAQ 4 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faqFour"
                        >

                            Can I contact Farm Fresh about partnerships?

                        </button>

                    </h2>

                    <div
                        id="faqFour"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion"
                    >

                        <div class="accordion-body">

                            Absolutely. Select "Partnership" in the
                            contact form and tell us about your idea.
                            Our team will get back to you.

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     LOCATION
====================================================== -->

<section class="location-section">

    <div class="container">

        <div class="location-box">

            <div class="location-content">

                <div class="location-label">
                    Find Farm Fresh
                </div>

                <h3>
                    Freshness starts close to home.
                </h3>

                <p>

                    Farm Fresh connects customers with quality
                    agricultural products while supporting local
                    farmers and bringing fresh food closer to
                    your table.

                </p>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=Phnom+Penh+Cambodia"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="location-btn"
                >

                    <i class="bi bi-geo-alt-fill"></i>

                    View our location

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     FOOTER
====================================================== -->

<footer>

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <div class="footer-brand">

                    <div class="footer-logo">
                        <i class="bi bi-leaf-fill"></i>
                    </div>

                    <div class="footer-name">
                        Farm Fresh
                    </div>

                </div>

                <p class="footer-description mb-0">

                    Fresh, quality and naturally grown products
                    delivered closer to your table.

                </p>

            </div>


            <div class="col-lg-5">

                <div class="footer-links">

                    <a href="{{ route('homeforclient') }}">
                        Home
                    </a>

                    <a href="{{ route('shoppage') }}">
                        Shop
                    </a>

                    <a href="{{ route('about') }}">
                        About Us
                    </a>

                    <a href="{{ route('contact') }}">
                        Contact
                    </a>

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                </div>

            </div>

        </div>


        <div class="footer-bottom">

            <div class="row">

                <div class="col-md-6">

                    © {{ date('Y') }}
                    Farm Fresh.
                    All rights reserved.

                </div>

                <div class="col-md-6 text-md-end mt-2 mt-md-0">

                    Made with care for fresh food.

                </div>

            </div>

        </div>

    </div>

</footer>


<!-- =====================================================
     BOOTSTRAP JS
====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- =====================================================
     NAVBAR SCROLL
====================================================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const header = document.getElementById("mainHeader");

    function updateHeader() {

        if (window.scrollY > 20) {

            header.classList.add("scrolled");

        } else {

            header.classList.remove("scrolled");

        }

    }

    updateHeader();

    window.addEventListener("scroll", updateHeader);

});

</script>

</body>

</html>
