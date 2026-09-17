
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings | Farm Fresh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Kantumruy+Pro:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        :root {
            --green: #198754;
            --bg: #f4f7f5;
            --text: #17251d;
            --sidebar-width: 260px;
            --sidebar-collapsed: 78px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Kantumruy Pro', sans-serif;
            overflow-x: hidden;
        }

        /* =========================================================
           YOUR SIDEBAR
        ========================================================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: #198754;
            z-index: 1050;
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 5px 0 25px rgba(0,0,0,.08);
            transition: width .35s ease;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.25);
            border-radius: 20px;
        }

        .sidebar-logo {
            transition: all .35s ease;
        }

        .sidebar.collapsed .sidebar-logo {
            max-width: 52px !important;
        }

        .sidebar .nav-link {
            position: relative;
            color: rgba(255,255,255,.88);
            padding: 6px 14px;
            border-radius: 12px;
            margin-bottom: 5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            white-space: nowrap;
            transition: all .25s ease;
        }

        .sidebar .nav-link i {
            min-width: 25px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.14);
            transform: translateX(3px);
        }

        .sidebar .nav-link.active {
            color: var(--green) !important;
            background: #fff !important;
            box-shadow: 0 8px 20px rgba(0,0,0,.10);
        }

        .sidebar .sub-nav-link {
            font-size: .9rem;
            color: rgba(255,255,255,.78);
        }

        .sidebar .sub-nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.10);
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding-left: 10px;
            padding-right: 10px;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0 !important;
        }

        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .nav-link:not(.sub-nav-link)::after {
            display: none;
        }

        .sidebar.collapsed .text-uppercase,
        .sidebar.collapsed .border-top,
        .sidebar.collapsed hr {
            opacity: 0;
            height: 0;
            padding: 0 !important;
            margin: 5px 0 !important;
            overflow: hidden;
        }

        .sidebar.collapsed .profile-info {
            display: none !important;
        }

        .sidebar.collapsed .logout-text {
            display: none;
        }

        .sidebar.collapsed .logout-btn {
            width: 48px !important;
            height: 42px;
            margin: auto;
        }

        .sidebar.collapsed .logout-btn i {
            margin: 0 !important;
        }

        /* =========================================================
           YOUR SIDEBAR TOOLTIP
        ========================================================= */

        .sidebar.collapsed .nav-link {
            position: relative;
        }

        .sidebar.collapsed .nav-link:hover::after {
            content: attr(data-title);
            position: absolute;
            left: 70px;
            top: 50%;
            transform: translateY(-50%);
            background: #111827;
            color: #fff;
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 12px;
            z-index: 9999;
            white-space: nowrap;
            pointer-events: none;
            box-shadow: 0 8px 20px rgba(0,0,0,.18);
        }

        /* =========================================================
           YOUR SIDEBAR TOGGLE
        ========================================================= */

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 238px;
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 50%;
            background: #fff;
            color: var(--green);
            z-index: 1100;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s ease;
            cursor: pointer;
        }

        .sidebar.collapsed + .sidebar-toggle {
            left: 61px;
        }

        .sidebar-toggle:hover {
            transform: scale(1.08);
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left .35s ease;
        }

        .sidebar.collapsed ~ .main {
            margin-left: var(--sidebar-collapsed);
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        .mobile-menu-btn {
            display: none;
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 12px;
            background: #fff;
            color: var(--green);
            align-items: center;
            justify-content: center;
            z-index: 1200;
        }

        .sidebar-overlay {
            display: none;
        }

        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            height: 76px;
            background: #fff;
            border-bottom: 1px solid #e7ece9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 34px;
        }

        .page-title h3 {
            margin: 0;
            font-size: 21px;
            font-weight: 800;
        }

        .page-title p {
            margin: 3px 0 0;
            color: #87938c;
            font-size: 12px;
        }

        .top-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-user img {
            width: 38px;
            height: 38px;
            object-fit: cover;
            border-radius: 50%;
        }

        .top-user strong {
            font-size: 13px;
        }

        .top-user span {
            display: block;
            color: #8a958f;
            font-size: 10px;
        }

        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            padding: 30px 34px 50px;
        }

        /* =========================================================
           SETTINGS HERO
        ========================================================= */

        .settings-hero {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            padding: 30px;
            color: white;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(232,117,47,.35),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #123b25,
                    #1c6039
                );
            margin-bottom: 25px;
        }

        .settings-hero::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -90px;
            bottom: -120px;
            border: 40px solid rgba(255,255,255,.04);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: rgba(255,255,255,.13);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 17px;
        }

        .settings-hero h2 {
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .settings-hero p {
            margin: 0;
            color: rgba(255,255,255,.7);
            font-size: 13px;
        }

        /* =========================================================
           PROFILE
        ========================================================= */

        .profile-card {
            background: white;
            border-radius: 22px;
            border: 1px solid #e8eee9;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .profile-banner {
            height: 125px;
            background: linear-gradient(
                135deg,
                #173f28,
                #287648
            );
            position: relative;
        }

        .profile-banner::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border: 35px solid rgba(255,255,255,.04);
            border-radius: 50%;
            right: -60px;
            top: -100px;
        }

        .profile-body {
            padding: 0 28px 28px;
        }

        .profile-top {
            margin-top: -58px;
            position: relative;
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
        }

        .profile-left {
            display: flex;
            align-items: end;
            gap: 18px;
        }

        .profile-image-wrapper {
            position: relative;
        }

        .profile-image {
            width: 112px;
            height: 112px;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid white;
            background: #e9f2ec;
            box-shadow: 0 8px 25px rgba(0,0,0,.12);
        }

        .camera-button {
            position: absolute;
            right: 3px;
            bottom: 4px;
            width: 35px;
            height: 35px;
            border: 3px solid white;
            border-radius: 50%;
            background: #e8752f;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .profile-name {
            padding-bottom: 8px;
        }

        .profile-name h4 {
            margin: 0;
            font-weight: 800;
            font-size: 20px;
        }

        .profile-name p {
            margin: 3px 0 0;
            color: #829087;
            font-size: 12px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #e8f6ed;
            color: #198754;
            padding: 6px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            margin-top: 7px;
        }

        /* =========================================================
           SECTION
        ========================================================= */

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .section-heading-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: #e9f6ee;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .section-heading h5 {
            margin: 0;
            font-weight: 800;
            font-size: 16px;
        }

        .section-heading p {
            margin: 2px 0 0;
            color: #8a968f;
            font-size: 11px;
        }

        /* =========================================================
           FORMS
        ========================================================= */

        .form-card,
        .security-card,
        .preference-card {
            background: white;
            border: 1px solid #e8eee9;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 24px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #445249;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dfe7e2;
            border-radius: 11px;
            min-height: 46px;
            font-size: 13px;
            padding: 10px 13px;
            box-shadow: none !important;
        }

        textarea.form-control {
            min-height: 110px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25,135,84,.08) !important;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 14px;
            top: 14px;
            color: #8c9992;
            z-index: 2;
        }

        .input-icon .form-control {
            padding-left: 40px;
        }

        /* =========================================================
           BUTTON
        ========================================================= */

        .btn-save {
            background: #198754;
            color: white;
            border: 0;
            border-radius: 11px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-save:hover {
            background: #146c43;
            color: white;
            transform: translateY(-1px);
        }

        .btn-orange {
            background: #e8752f;
            color: white;
        }

        .btn-orange:hover {
            background: #d9601c;
            color: white;
        }

        /* =========================================================
           SECURITY
        ========================================================= */

        .security-alert {
            background: #fff8f2;
            border: 1px solid #ffe6d4;
            color: #9b582d;
            border-radius: 13px;
            padding: 13px 15px;
            display: flex;
            gap: 10px;
            align-items: center;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* =========================================================
           PREFERENCES
        ========================================================= */

        .preference-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #edf1ee;
        }

        .preference-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .preference-left {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .preference-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #f0f5f2;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preference-left strong {
            display: block;
            font-size: 13px;
        }

        .preference-left span {
            display: block;
            color: #8a968f;
            font-size: 11px;
            margin-top: 2px;
        }

        .form-switch .form-check-input {
            width: 42px;
            height: 22px;
            cursor: pointer;
        }

        .form-switch .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 900px) {

            .sidebar {
                width: var(--sidebar-width);
                transform: translateX(-100%);
                transition: transform .35s ease;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .sidebar.collapsed {
                width: var(--sidebar-width);
            }

            .sidebar.collapsed .sidebar-logo {
                max-width: none !important;
            }

            .sidebar.collapsed .nav-link {
                justify-content: flex-start;
            }

            .sidebar.collapsed .nav-link span {
                display: inline;
            }

            .sidebar.collapsed .profile-info {
                display: block !important;
            }

            .sidebar.collapsed .text-uppercase,
            .sidebar.collapsed .border-top,
            .sidebar.collapsed hr {
                opacity: 1;
                height: auto;
                padding: initial !important;
                margin: initial !important;
                overflow: visible;
            }

            .sidebar-toggle {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.4);
                z-index: 1040;
            }

            .main,
            .sidebar.collapsed ~ .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px 0 75px;
            }

            .content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 600px) {

            .top-user div {
                display: none;
            }

            .profile-top {
                display: block;
            }

            .profile-left {
                align-items: start;
                flex-direction: column;
            }

            .profile-name {
                padding-bottom: 0;
            }

            .profile-body {
                padding: 0 18px 22px;
            }

            .form-card,
            .security-card,
            .preference-card {
                padding: 18px;
            }

            .settings-hero {
                padding: 23px;
            }

            .settings-hero h2 {
                font-size: 23px;
            }

        }

    </style>
</head>

<body>

<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between" id="sidebar">

    <div>

        <!-- Logo -->
        <div class="text-center py-2 mb-2">
            <img
                src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                class="img-fluid rounded-circle shadow-sm sidebar-logo"
                style="max-width:120px;background:white;padding:5px;"
            >
        </div>

        <hr class="border-light opacity-25">

        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   data-title="ផ្ទាំងដើម"
                   class="nav-link active">
                    <i class="bi bi-speedometer2 me-2 fs-5"></i>
                    <span>ផ្ទាំងដើម</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Arable_lands') }}"
                   data-title="ផ្ទៃដីដាំដុះ"
                   class="nav-link">
                    <i class="bi bi-bounding-box-circles me-2 fs-5"></i>
                    <span>ផ្ទៃដីដាំដុះ</span>
                </a>
            </li>

            <!-- Categories -->
            <li class="nav-item my-1">

                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold"
                     style="font-size:.75rem;letter-spacing:1px;">
                    ប្រភេទទំនិញ
                </div>

                <ul class="list-unstyled ps-2 mb-0">

                    <li>
                        <a href="{{ route('vegetable') }}"
                           data-title="Vegetable"
                           class="nav-link sub-nav-link">
                            <i class="fa-solid fa-carrot me-2"></i>
                            <span>Vegetable</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Fresh_Nut') }}"
                           data-title="Fresh Nut"
                           class="nav-link sub-nav-link">
                            <i class="bi bi-nut me-2"></i>
                            <span>Fresh Nut</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Egg') }}"
                           data-title="Egg"
                           class="nav-link sub-nav-link">
                            <i class="bi bi-egg-fried me-2"></i>
                            <span>Egg</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Fruit') }}"
                           data-title="Fruit"
                           class="nav-link sub-nav-link">
                            <i class="bi bi-apple me-2"></i>
                            <span>Fruit</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Farm_Animals') }}"
                           data-title="Farm Animals"
                           class="nav-link sub-nav-link">
                            <i class="bi bi-bug me-2"></i>
                            <span>Farm Animals</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>

                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold"
                     style="font-size:.75rem;letter-spacing:1px;">
                    Other
                </div>

                <a href="{{ route('sales.report') }}"
                   data-title="របាយការណ៍ការលក់"
                   class="nav-link sub-nav-link">
                    <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                    <span>របាយការណ៍ការលក់</span>
                </a>

            </li>

            <li>
                <a href="{{ route('report') }}"
                   data-title="Report and rate"
                   class="nav-link sub-nav-link">
                    <i class="bi bi-star-fill me-2 fs-5"></i>
                    <span>Report and rate</span>
                </a>
            </li>

            <li>
                <a href="{{ route('delivery.index') }}"
                   data-title="Delivery Orders"
                   class="nav-link sub-nav-link">
                    <i class="bi bi-truck me-2 fs-5"></i>
                    <span>Orders</span>
                </a>
            </li>

            <hr class="border-light opacity-25">

            <li>
                <a href="{{ route('shoppage') }}"
                   data-title="Shop"
                   class="nav-link">
                    <i class="fa-solid fa-cart-shopping me-2 fs-5"></i>
                    <span>Shop</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings') }}"
                   data-title="Settings"
                   class="nav-link">
                    <i class="fa-solid fa-gear me-2 fs-5"></i>
                    <span>Settings</span>
                </a>
            </li>

        </ul>
    </div>

    <!-- Profile -->
    <div class="border-top border-light border-opacity-25 pt-3 mt-3">

        <div class="d-flex align-items-center mb-3 px-2">

            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>

            <div class="lh-sm text-truncate profile-info">

                <div class="fw-bold text-white text-truncate">
                    {{ $user->name }}
                </div>

                <small class="text-white-50">
                    {{ ucfirst($user->role ?? 'Admin') }}
                </small>

            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2 logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                <span class="logout-text">
                    ចាកចេញ (Logout)
                </span>

            </button>

        </form>

    </div>

</aside>


<!-- Sidebar Toggle -->
<button
    type="button"
    class="sidebar-toggle"
    id="sidebarToggle"
    title="Open / Close Sidebar">

    <i class="bi bi-chevron-left" id="toggleIcon"></i>

</button>


<!-- Mobile Menu -->
<button
    type="button"
    class="mobile-menu-btn position-fixed top-0 start-0 m-3 shadow-sm"
    id="mobileMenuBtn"
    style="z-index:1200;">

    <i class="bi bi-list fs-5"></i>

</button>

        <!-- USER -->

        <div class="position-absolute bottom-0 start-0 end-0 p-3">

            <div class="border-top border-white border-opacity-25 pt-3">

                <div class="d-flex align-items-center gap-2">

                    @if($user->profile_image)

                        <img
                            src="{{ asset($user->profile_image) }}"
                            alt="Profile"
                            style="
                                width:42px;
                                height:42px;
                                border-radius:50%;
                                object-fit:cover;
                                border:2px solid rgba(255,255,255,.5);
                            ">

                    @else

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=e8752f&color=fff"
                            alt="Profile"
                            style="
                                width:42px;
                                height:42px;
                                border-radius:50%;
                                object-fit:cover;
                                border:2px solid rgba(255,255,255,.5);
                            ">

                    @endif


                    <div class="profile-info">

                        <strong class="text-white d-block small">
                            {{ $user->name }}
                        </strong>

                        <small class="text-white-50">
                            {{ ucfirst($user->role ?? 'Admin') }}
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </aside>


    <!-- =========================================================
         SIDEBAR TOGGLE
    ========================================================= -->

    <button
        type="button"
        class="sidebar-toggle"
        id="sidebarToggle"
        title="Open / Close Sidebar">

        <i
            class="bi bi-chevron-left"
            id="toggleIcon">
        </i>

    </button>


    <!-- =========================================================
         MOBILE MENU
    ========================================================= -->

    <button
        type="button"
        class="mobile-menu-btn position-fixed top-0 start-0 m-3 shadow-sm"
        id="mobileMenuBtn">

        <i class="bi bi-list fs-5"></i>

    </button>


    <!-- OVERLAY -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay">
    </div>


    <!-- =========================================================
         MAIN
    ========================================================= -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">

            <div class="page-title">

                <h3>
                    Settings
                </h3>

                <p>
                    Manage your account and preferences
                </p>

            </div>


            <div class="top-user">

                @if($user->profile_image)

                    <img
                        src="{{ asset($user->profile_image) }}"
                        alt="Profile">

                @else

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=198754&color=fff"
                        alt="Profile">

                @endif


                <div>

                    <strong>
                        {{ $user->name }}
                    </strong>

                    <span>
                        {{ $user->email }}
                    </span>

                </div>

            </div>

        </header>


        <!-- =====================================================
             CONTENT
        ===================================================== -->

        <section class="content">


            <!-- SUCCESS -->

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            <!-- ERROR -->

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            <!-- =================================================
                 HERO
            ================================================= -->

            <div class="settings-hero">

                <div class="hero-content">

                    <div class="hero-icon">

                        <i class="bi bi-sliders2"></i>

                    </div>

                    <h2>
                        Account Settings
                    </h2>

                    <p>
                        Customize your profile, security and account preferences.
                    </p>

                </div>

            </div>


            <!-- =================================================
                 PROFILE
            ================================================= -->

            <div class="profile-card">

                <div class="profile-banner"></div>

                <div class="profile-body">

                    <div class="profile-top">

                        <div class="profile-left">

                            <div class="profile-image-wrapper">

                                @if($user->profile_image)

                                    <img
                                        id="profilePreview"
                                        src="{{ asset($user->profile_image) }}"
                                        class="profile-image"
                                        alt="Profile">

                                @else

                                    <img
                                        id="profilePreview"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=e8f6ed&color=198754&size=200"
                                        class="profile-image"
                                        alt="Profile">

                                @endif


                                <label
                                    for="profile_image"
                                    class="camera-button">

                                    <i class="bi bi-camera-fill"></i>

                                </label>

                            </div>


                            <div class="profile-name">

                                <h4>
                                    {{ $user->name }}
                                </h4>

                                <p>
                                    {{ $user->email }}
                                </p>

                                <div class="role-badge">

                                    <i class="bi bi-shield-check"></i>

                                    {{ ucfirst($user->role ?? 'Admin') }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 PROFILE INFORMATION
            ================================================= -->

            <div class="section-heading">

                <div class="section-heading-icon">

                    <i class="bi bi-person-fill"></i>

                </div>

                <div>

                    <h5>
                        Profile Information
                    </h5>

                    <p>
                        Update your personal information
                    </p>

                </div>

            </div>


            <form
                action="{{ route('settings.profile.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="form-card">

                    <div class="row g-4">


                        <!-- NAME -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Full Name
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-person"></i>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter your name"
                                    required>

                            </div>

                            @error('name')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- EMAIL -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Email Address
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-envelope"></i>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Enter your email"
                                    required>

                            </div>

                            @error('email')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- PHONE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-telephone"></i>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone', $user->phone) }}"
                                    placeholder="+855 xx xxx xxx">

                            </div>

                            @error('phone')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- ADDRESS -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Address
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-geo-alt"></i>

                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    value="{{ old('address', $user->address) }}"
                                    placeholder="Enter your address">

                            </div>

                            @error('address')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- BIO -->

                        <div class="col-12">

                            <label class="form-label">
                                About You
                            </label>

                            <textarea
                                name="bio"
                                class="form-control"
                                placeholder="Write something about yourself...">{{ old('bio', $user->bio) }}</textarea>

                            @error('bio')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- PROFILE IMAGE -->

                        <div class="col-12">

                            <label class="form-label">
                                Profile Photo
                            </label>

                            <input
                                type="file"
                                id="profile_image"
                                name="profile_image"
                                class="form-control"
                                accept="image/png,image/jpeg,image/webp">

                            <small class="text-muted">
                                JPG, PNG or WEBP. Maximum 2MB.
                            </small>

                            @error('profile_image')

                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- SAVE -->

                        <div class="col-12 d-flex justify-content-end">

                            <button
                                type="submit"
                                class="btn-save">

                                <i class="bi bi-check2-circle me-1"></i>

                                Save Changes

                            </button>

                        </div>

                    </div>

                </div>

            </form>


            <!-- =================================================
                 SECURITY
            ================================================= -->

            <div class="section-heading">

                <div class="section-heading-icon">

                    <i class="bi bi-shield-lock-fill"></i>

                </div>

                <div>

                    <h5>
                        Security
                    </h5>

                    <p>
                        Keep your account secure
                    </p>

                </div>

            </div>


            <form
                action="{{ route('settings.password.update') }}"
                method="POST">

                @csrf

                @method('PUT')


                <div class="security-card">

                    <div class="security-alert">

                        <i class="bi bi-info-circle-fill"></i>

                        <span>
                            Use a strong password with at least 8 characters.
                        </span>

                    </div>


                    <div class="row g-4">


                        <!-- CURRENT -->

                        <div class="col-12">

                            <label class="form-label">
                                Current Password
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-lock"></i>

                                <input
                                    type="password"
                                    name="current_password"
                                    class="form-control"
                                    placeholder="Enter current password"
                                    required>

                            </div>

                            @error('current_password')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- NEW -->

                        <div class="col-md-6">

                            <label class="form-label">
                                New Password
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-key"></i>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter new password"
                                    required>

                            </div>

                            @error('password')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <!-- CONFIRM -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-check2-square"></i>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm new password"
                                    required>

                            </div>

                        </div>


                        <!-- CHANGE -->

                        <div class="col-12 d-flex justify-content-end">

                            <button
                                type="submit"
                                class="btn-save btn-orange">

                                <i class="bi bi-shield-check me-1"></i>

                                Change Password

                            </button>

                        </div>

                    </div>

                </div>

            </form>


            <!-- =================================================
                 PREFERENCES
            ================================================= -->

            <div class="section-heading mt-4">

                <div class="section-heading-icon">

                    <i class="bi bi-toggles"></i>

                </div>

                <div>

                    <h5>
                        Preferences
                    </h5>

                    <p>
                        Control how your admin panel behaves
                    </p>

                </div>

            </div>


            <div class="preference-card">


                <!-- NOTIFICATIONS -->

                <div class="preference-item">

                    <div class="preference-left">

                        <div class="preference-icon">

                            <i class="bi bi-bell-fill"></i>

                        </div>

                        <div>

                            <strong>
                                Notifications
                            </strong>

                            <span>
                                Receive system notifications
                            </span>

                        </div>

                    </div>


                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="notificationsToggle"
                            checked>

                    </div>

                </div>


                <!-- LOW STOCK -->

                <div class="preference-item">

                    <div class="preference-left">

                        <div class="preference-icon">

                            <i class="bi bi-box-seam-fill"></i>

                        </div>

                        <div>

                            <strong>
                                Low Stock Alerts
                            </strong>

                            <span>
                                Alert when product stock is low
                            </span>

                        </div>

                    </div>


                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="lowStockToggle"
                            checked>

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="preference-item">

                    <div class="preference-left">

                        <div class="preference-icon">

                            <i class="bi bi-envelope-fill"></i>

                        </div>

                        <div>

                            <strong>
                                Email Updates
                            </strong>

                            <span>
                                Receive important account emails
                            </span>

                        </div>

                    </div>


                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="emailToggle"
                            checked>

                    </div>

                </div>


                <!-- DARK MODE -->

                <div class="preference-item">

                    <div class="preference-left">

                        <div class="preference-icon">

                            <i class="bi bi-moon-fill"></i>

                        </div>

                        <div>

                            <strong>
                                Dark Mode
                            </strong>

                            <span>
                                Use dark appearance for the dashboard
                            </span>

                        </div>

                    </div>


                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="darkModeToggle">

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================= -->

    <script>

        /* =========================================================
           SIDEBAR TOGGLE
        ========================================================= */

        const sidebar =
            document.getElementById('sidebar');

        const sidebarToggle =
            document.getElementById('sidebarToggle');

        const toggleIcon =
            document.getElementById('toggleIcon');


        sidebarToggle.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('collapsed');

                const isCollapsed =
                    sidebar.classList.contains('collapsed');

                localStorage.setItem(
                    'farm_sidebar_collapsed',
                    isCollapsed
                );

            }
        );


        /* =========================================================
           LOAD SIDEBAR STATE
        ========================================================= */

        if (
            localStorage.getItem(
                'farm_sidebar_collapsed'
            ) === 'true'
            &&
            window.innerWidth > 900
        ) {

            sidebar.classList.add('collapsed');

        }


        /* =========================================================
           MOBILE MENU
        ========================================================= */

        const mobileMenuBtn =
            document.getElementById('mobileMenuBtn');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        mobileMenuBtn.addEventListener(
            'click',
            function () {

                sidebar.classList.add('mobile-open');

                sidebarOverlay.classList.add('show');

            }
        );


        sidebarOverlay.addEventListener(
            'click',
            function () {

                sidebar.classList.remove(
                    'mobile-open'
                );

                sidebarOverlay.classList.remove(
                    'show'
                );

            }
        );


        /* =========================================================
           PROFILE IMAGE PREVIEW
        ========================================================= */

        const profileInput =
            document.getElementById('profile_image');

        const profilePreview =
            document.getElementById('profilePreview');


        profileInput.addEventListener(
            'change',
            function (event) {

                const file =
                    event.target.files[0];

                if (!file) {
                    return;
                }


                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];


                if (!allowedTypes.includes(file.type)) {

                    alert(
                        'Please select JPG, PNG or WEBP image.'
                    );

                    profileInput.value = '';

                    return;
                }


                if (
                    file.size >
                    2 * 1024 * 1024
                ) {

                    alert(
                        'Profile image must be less than 2MB.'
                    );

                    profileInput.value = '';

                    return;
                }


                const reader =
                    new FileReader();


                reader.onload =
                    function (e) {

                        profilePreview.src =
                            e.target.result;

                    };


                reader.readAsDataURL(file);

            }
        );


        /* =========================================================
           DARK MODE
        ========================================================= */

        const darkModeToggle =
            document.getElementById('darkModeToggle');


        const savedDarkMode =
            localStorage.getItem(
                'farm_dark_mode'
            );


        if (savedDarkMode === 'true') {

            darkModeToggle.checked = true;

        }


        darkModeToggle.addEventListener(
            'change',
            function () {

                localStorage.setItem(
                    'farm_dark_mode',
                    this.checked
                );

            }
        );


        /* =========================================================
           PREFERENCE MEMORY
        ========================================================= */

        const preferenceIds = [
            'notificationsToggle',
            'lowStockToggle',
            'emailToggle'
        ];


        preferenceIds.forEach(
            function (id) {

                const checkbox =
                    document.getElementById(id);

                if (!checkbox) {
                    return;
                }


                const saved =
                    localStorage.getItem(
                        'farm_' + id
                    );


                if (saved !== null) {

                    checkbox.checked =
                        saved === 'true';

                }


                checkbox.addEventListener(
                    'change',
                    function () {

                        localStorage.setItem(
                            'farm_' + id,
                            this.checked
                        );

                    }
                );

            }
        );


        /* =========================================================
           MOBILE RESIZE
        ========================================================= */

        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 900) {

                    sidebar.classList.remove(
                        'mobile-open'
                    );

                    sidebarOverlay.classList.remove(
                        'show'
                    );

                }

            }
        );

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>