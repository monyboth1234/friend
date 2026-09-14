
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farm Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Khmer Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #198754;
            --green-dark: #116b42;
            --green-light: #e9f7ef;
            --sidebar-width: 260px;
            --sidebar-collapsed: 82px;
            --bg: #f5f7f9;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e8ecef;
            --shadow: 0 8px 30px rgba(31, 41, 55, .06);
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
           SIDEBAR
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

        /* Sidebar tooltip */
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
           SIDEBAR TOGGLE
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

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 28px;
            transition: margin-left .35s ease;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed);
        }

        /* =========================================================
           TOP HEADER
        ========================================================= */

        .top-header {
            background: rgba(255,255,255,.95);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px 24px;
            box-shadow: var(--shadow);
            margin-bottom: 22px;
        }

        .welcome-icon {
            width: 54px;
            height: 54px;
            border-radius: 15px;
            background: var(--green-light);
            color: var(--green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .dashboard-title {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .dashboard-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin-top: 3px;
        }

        .profile-btn {
            border: 1px solid #dfe7e2;
            background: #fff;
            color: #374151;
            border-radius: 12px;
            padding: 10px 16px;
            font-weight: 600;
            transition: .25s;
        }

        .profile-btn:hover {
            background: var(--green);
            color: #fff;
            border-color: var(--green);
            transform: translateY(-2px);
        }

        /* =========================================================
           ALERT
        ========================================================= */

        .custom-alert {
            border: 0;
            border-radius: 14px;
            box-shadow: var(--shadow);
        }

        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stat-card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border) !important;
            border-radius: 18px !important;
            background: #fff;
            box-shadow: var(--shadow);
            transition: all .3s ease;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            right: -35px;
            top: -35px;
            border-radius: 50%;
            background: rgba(25,135,84,.05);
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(31,41,55,.11);
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 3px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            line-height: 1.2;
        }

        .stat-mini {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 4px;
        }

        /* =========================================================
           SECTION CARD
        ========================================================= */

        .dashboard-card {
            border: 1px solid var(--border);
            border-radius: 18px;
            background: #fff;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .section-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .section-title {
            font-weight: 700;
            font-size: 17px;
            margin: 0;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        /* =========================================================
           CHART
        ========================================================= */

        .chart-wrapper {
            height: 360px;
            padding: 20px;
        }

        .chart-filter {
            border: 1px solid #dfe5e2;
            border-radius: 10px;
            font-size: 13px;
            min-width: 170px;
        }

        /* =========================================================
           TABLE
        ========================================================= */

        .user-table {
            margin: 0;
        }

        .user-table thead th {
            background: #f8faf9;
            color: #6b7280;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .3px;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }

        .user-table tbody td {
            padding: 16px 20px;
            border-color: #f0f2f3;
            font-size: 13px;
        }

        .user-table tbody tr {
            transition: .2s;
        }

        .user-table tbody tr:hover {
            background: #f8fbf9;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: var(--green-light);
            color: var(--green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .role-badge {
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================================================
           PROFILE MODAL
        ========================================================= */

        .profile-modal .modal-content {
            border: 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,.2);
        }

        .profile-modal .modal-header {
            background: linear-gradient(135deg, #198754, #116b42);
            padding: 20px 24px;
            border: 0;
        }

        .profile-modal .modal-body {
            padding: 28px;
        }

        .profile-avatar {
            border: 5px solid #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,.12);
        }

        .form-control {
            border-radius: 10px;
            border-color: #dfe5e2;
            padding: 11px 13px;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25,135,84,.10);
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991.98px) {

            .sidebar {
                width: var(--sidebar-collapsed);
            }

            .sidebar .nav-link {
                justify-content: center;
            }

            .sidebar .nav-link span,
            .sidebar .text-uppercase,
            .sidebar .profile-info,
            .sidebar .logout-text {
                display: none;
            }

            .sidebar .nav-link i {
                margin-right: 0 !important;
            }

            .sidebar-toggle {
                left: 61px;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed);
            }

            .sidebar-toggle {
                display: none;
            }
        }

        @media (max-width: 767.98px) {

            .sidebar {
                position: fixed;
                width: 0;
                padding: 0 !important;
                overflow: hidden;
            }

            .sidebar.mobile-open {
                width: 260px;
                padding: 16px !important;
            }

            .sidebar.mobile-open .nav-link {
                justify-content: flex-start;
            }

            .sidebar.mobile-open .nav-link span,
            .sidebar.mobile-open .text-uppercase,
            .sidebar.mobile-open .profile-info,
            .sidebar.mobile-open .logout-text {
                display: block;
            }

            .sidebar.mobile-open .nav-link i {
                margin-right: .5rem !important;
            }

            .main-content,
            .main-content.expanded {
                margin-left: 0;
                padding: 15px;
            }

            .mobile-menu-btn {
                display: flex !important;
            }

            .top-header {
                padding: 16px;
            }

            .dashboard-title {
                font-size: 20px;
            }

            .chart-wrapper {
                height: 300px;
                padding: 10px;
            }
        }

        .mobile-menu-btn {
            display: none;
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 11px;
            background: var(--green-light);
            color: var(--green);
            align-items: center;
            justify-content: center;
        }

        /* Smooth page entrance */
        .fade-up {
            animation: fadeUp .5s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 {
            animation-delay: .05s;
        }

        .delay-2 {
            animation-delay: .1s;
        }

        .delay-3 {
            animation-delay: .15s;
        }

        .delay-4 {
            animation-delay: .2s;
        }

        /* Online indicator */
        .online-dot {
            width: 8px;
            height: 8px;
            background: #20c997;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 0 4px rgba(32,201,151,.12);
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

        </ul>
    </div>

    <!-- Profile -->
    <div class="border-top border-light border-opacity-25 pt-3 mt-3">

        <div class="d-flex align-items-center mb-3 px-2">

            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>

            <div class="lh-sm text-truncate profile-info">

                <div class="fw-bold text-white text-truncate">
                    {{ Auth::user()->name }}
                </div>

                <small class="text-white-50">
                    {{ Auth::user()->role }}
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


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main class="main-content" id="mainContent">

    <!-- Header -->
    <div class="top-header fade-up">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

            <div class="d-flex align-items-center gap-3">

                <div class="welcome-icon">
                    <i class="bi bi-speedometer2"></i>
                </div>

                <div>

                    <h1 class="dashboard-title">
                        ផ្ទាំងគ្រប់គ្រងកសិដ្ឋាន
                    </h1>

                    <div class="dashboard-subtitle">
                        <i class="bi bi-envelope me-1"></i>
                        {{ Auth::user()->email }}
                    </div>

                </div>

            </div>

            <div class="d-flex align-items-center gap-2">

                <div class="d-none d-md-flex align-items-center gap-2 me-2 text-muted small">
                    <span class="online-dot"></span>
                    System Online
                </div>

                <button
                    class="profile-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#profileModal">

                    <i class="bi bi-person-gear me-1"></i>
                    My Profile

                </button>

            </div>

        </div>

    </div>


    <!-- Success -->
    @if (session('success'))

        <div class="alert alert-success custom-alert alert-dismissible fade show mb-4 fade-up"
             role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            <strong>ជោគជ័យ!</strong>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- Errors -->
    @if ($errors->any())

        <div class="alert alert-danger custom-alert alert-dismissible fade show mb-4 fade-up"
             role="alert">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            <strong>មានបញ្ហា!</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-3 mb-4">

        <!-- Area -->
        <div class="col-sm-6 col-xl-3 fade-up delay-1">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>

                        <span class="badge bg-success-subtle text-success">
                            Land
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ផ្ទៃដីដាំដុះ
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalArea, 2) }}
                            <small class="fs-6 text-muted">ហិកតា</small>
                        </div>

                        <div class="stat-mini">
                            <i class="bi bi-arrow-up-right"></i>
                            Total cultivated area
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Egg -->
        <div class="col-sm-6 col-xl-3 fade-up delay-1">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-warning-subtle text-warning">
                            <i class="bi bi-egg-fried"></i>
                        </div>

                        <span class="badge bg-warning-subtle text-warning">
                            Eggs
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ចំនួនពងសរុប
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalEgg) }}
                        </div>

                        <div class="stat-mini">
                            <i class="bi bi-box-seam"></i>
                            Total egg inventory
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Animals -->
        <div class="col-sm-6 col-xl-3 fade-up delay-2">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-info-subtle text-info">
                            <i class="bi bi-bug"></i>
                        </div>

                        <span class="badge bg-info-subtle text-info">
                            Animals
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ចំនួនសត្វសរុប
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalAnimal) }}
                        </div>

                        <div class="stat-mini">
                            <i class="bi bi-activity"></i>
                            Farm animal inventory
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Users -->
        <div class="col-sm-6 col-xl-3 fade-up delay-2">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-primary-subtle text-primary">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <span class="badge bg-primary-subtle text-primary">
                            Users
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            គណនីអ្នកប្រើប្រាស់
                        </div>

                        <div class="stat-value">
                            {{ $users->count() }}
                        </div>

                        <div class="stat-mini">
                            <i class="bi bi-people"></i>
                            Registered accounts
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Vegetables -->
        <div class="col-sm-6 col-xl-3 fade-up delay-2">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="fa-solid fa-carrot"></i>
                        </div>

                        <span class="badge bg-success-subtle text-success">
                            Vegetables
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ចំនួនបន្លែសរុប
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalVegetable ?? 0) }}
                        </div>

                        <div class="stat-mini">
                            Total vegetables
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Fruit -->
        <div class="col-sm-6 col-xl-3 fade-up delay-3">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-danger-subtle text-danger">
                            <i class="bi bi-apple"></i>
                        </div>

                        <span class="badge bg-danger-subtle text-danger">
                            Fruit
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ចំនួនផ្លែឈើសរុប
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalFruit ?? 0) }}
                        </div>

                        <div class="stat-mini">
                            Total fruits
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Fresh Nut -->
        <div class="col-sm-6 col-xl-3 fade-up delay-3">

            <div class="card stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start justify-content-between">

                        <div class="stat-icon bg-secondary-subtle text-secondary">
                            <i class="bi bi-nut"></i>
                        </div>

                        <span class="badge bg-secondary-subtle text-secondary">
                            Fresh Nut
                        </span>

                    </div>

                    <div class="mt-3">

                        <div class="stat-label">
                            ចំនួនគ្រាប់ធញ្ញជាតិសរុប
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalFreshNut ?? 0) }}
                        </div>

                        <div class="stat-mini">
                            Total fresh nuts
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         CHART
    ====================================================== -->

    <div class="dashboard-card mb-4 fade-up delay-3">

        <div class="section-header">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                <div class="d-flex align-items-center gap-3">

                    <div class="stat-icon bg-success-subtle text-success"
                         style="width:48px;height:48px;font-size:20px;">

                        <i class="bi bi-graph-up-arrow"></i>

                    </div>

                    <div>

                        <h5 class="section-title">
                            Inventory quantity trend
                        </h5>

                        <div class="section-subtitle">
                            Quantities added across farm inventory categories
                        </div>

                    </div>

                </div>

                <form
                    method="GET"
                    action="{{ route('dashboard') }}">

                    <select
                        id="chart_period"
                        name="chart_period"
                        class="form-select chart-filter"
                        onchange="this.form.submit()">

                        <option value="day" @selected($chartPeriod === 'day')>
                            Daily · Last 7 days
                        </option>

                        <option value="month" @selected($chartPeriod === 'month')>
                            Monthly · This year
                        </option>

                        <option value="year" @selected($chartPeriod === 'year')>
                            Yearly · Last 5 years
                        </option>

                    </select>

                </form>

            </div>

        </div>

        <div class="chart-wrapper">

            <canvas id="inventoryTrendChart"></canvas>

        </div>

    </div>


    <!-- =====================================================
         USERS
    ====================================================== -->

    <div class="dashboard-card fade-up delay-4">

        <div class="section-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="section-title">
                        <i class="bi bi-people me-2 text-success"></i>
                        តារាងអ្នកប្រើប្រាស់
                    </h5>

                    <div class="section-subtitle">
                        All registered users and their roles
                    </div>

                </div>

                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">

                    <i class="bi bi-check-circle me-1"></i>
                    Updated

                </span>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table user-table align-middle">

                <thead>

                    <tr>

                        <th>ល.រ</th>
                        <th>អ្នកប្រើប្រាស់</th>
                        <th>អុីម៉ែល</th>
                        <th>តួនាទី</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($users as $user)

                        <tr>

                            <td class="fw-semibold text-muted">
                                {{ $user->id }}
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="user-avatar">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <div class="fw-semibold">
                                            {{ $user->name }}
                                        </div>

                                        <small class="text-muted">
                                            Farm user
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td class="text-muted">
                                {{ $user->email }}
                            </td>

                            <td>

                                <span class="role-badge bg-primary-subtle text-primary">

                                    <i class="bi bi-shield-check me-1"></i>

                                    {{ $user->role }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-5 text-muted">

                                <i class="bi bi-people fs-1 d-block mb-2"></i>

                                No users found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</main>


<!-- =========================================================
     PROFILE MODAL
========================================================= -->

<div
    class="modal fade profile-modal"
    id="profileModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header text-white">

                <div>

                    <h5 class="modal-title fw-bold mb-1">

                        <i class="bi bi-person-gear me-2"></i>
                        My Profile

                    </h5>

                    <small class="opacity-75">
                        Update your account information
                    </small>

                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form
                    action="{{ route('profile.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- Profile picture -->
                    <div class="text-center mb-4">

                        <div class="position-relative d-inline-block">

                            @if(Auth::user()->profile_image)

                                <img
                                    src="{{ Auth::user()->profile_image }}"
                                    alt="Profile"
                                    class="rounded-circle profile-avatar"
                                    style="width:120px;height:120px;object-fit:cover;">

                            @else

                                <div
                                    class="bg-light rounded-circle d-flex align-items-center justify-content-center profile-avatar"
                                    style="width:120px;height:120px;">

                                    <i
                                        class="bi bi-person-fill text-secondary"
                                        style="font-size:60px;">
                                    </i>

                                </div>

                            @endif

                            <label
                                for="profile_image"
                                class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle p-2 shadow"
                                style="cursor:pointer;width:38px;height:38px;display:flex;align-items:center;justify-content:center;">

                                <i class="bi bi-camera"></i>

                            </label>

                            <input
                                type="file"
                                name="profile_image"
                                id="profile_image"
                                class="d-none"
                                accept="image/png,image/jpeg,image/jpg,image/webp">

                        </div>

                        <p class="text-muted small mt-2 mb-0">
                            Click the camera icon to change your profile picture
                        </p>

                    </div>


                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Full Name
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', Auth::user()->name) }}"
                                required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Email
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', Auth::user()->email) }}"
                                required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone', Auth::user()->phone) }}"
                                placeholder="+855 ...">

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Address
                            </label>

                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                value="{{ old('address', Auth::user()->address) }}"
                                placeholder="City, Country">

                        </div>


                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Bio
                            </label>

                            <textarea
                                name="bio"
                                class="form-control"
                                rows="4"
                                placeholder="Tell us about yourself...">{{ old('bio', Auth::user()->bio) }}</textarea>

                        </div>

                    </div>


                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <button
                            type="button"
                            class="btn btn-light border px-4"
                            data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button
                            type="submit"
                            class="btn btn-success px-4">

                            <i class="bi bi-check-circle me-1"></i>
                            Save Changes

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script>

    /* =========================================================
       SIDEBAR OPEN / CLOSE
    ========================================================= */

    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const toggleIcon = document.getElementById('toggleIcon');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');

    sidebarToggle.addEventListener('click', function () {

        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');

        const collapsed = sidebar.classList.contains('collapsed');

        toggleIcon.className = collapsed
            ? 'bi bi-chevron-right'
            : 'bi bi-chevron-left';

        localStorage.setItem(
            'farmSidebarCollapsed',
            collapsed ? '1' : '0'
        );

    });


    /* Remember sidebar state */
    if (localStorage.getItem('farmSidebarCollapsed') === '1') {

        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');

        toggleIcon.className = 'bi bi-chevron-right';

    }


    /* =========================================================
       MOBILE SIDEBAR
    ========================================================= */

    mobileMenuBtn.addEventListener('click', function () {

        sidebar.classList.toggle('mobile-open');

    });


    /* Close mobile sidebar when clicking outside */
    document.addEventListener('click', function (event) {

        if (
            window.innerWidth <= 767 &&
            sidebar.classList.contains('mobile-open') &&
            !sidebar.contains(event.target) &&
            !mobileMenuBtn.contains(event.target)
        ) {

            sidebar.classList.remove('mobile-open');

        }

    });


    /* =========================================================
       INVENTORY CHART
    ========================================================= */

    const inventoryChart =
        document.getElementById('inventoryTrendChart');

    if (inventoryChart) {

        new Chart(inventoryChart, {

            type: 'line',

            data: {

                labels: @json($chart['labels']),

                datasets: [

                    {
                        label: 'Egg',
                        data: @json($chart['series']['Egg']),
                        borderColor: '#f59f00',
                        backgroundColor: 'rgba(245,159,0,.08)',
                        tension: .35,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 6
                    },

                    {
                        label: 'Farm Animals',
                        data: @json($chart['series']['Farm Animals']),
                        borderColor: '#0dcaf0',
                        backgroundColor: 'rgba(13,202,240,.06)',
                        tension: .35,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 6
                    },

                    {
                        label: 'Fresh Nut',
                        data: @json($chart['series']['Fresh Nut']),
                        borderColor: '#6f42c1',
                        backgroundColor: 'rgba(111,66,193,.06)',
                        tension: .35,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 6
                    },

                    {
                        label: 'Fruit',
                        data: @json($chart['series']['Fruit']),
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220,53,69,.06)',
                        tension: .35,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 6
                    },

                    {
                        label: 'Vegetable',
                        data: @json($chart['series']['Vegetable']),
                        borderColor: '#198754',
                        backgroundColor: 'rgba(25,135,84,.06)',
                        tension: .35,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 6
                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {
                    mode: 'index',
                    intersect: false
                },

                plugins: {

                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 18,
                            font: {
                                family: 'Kantumruy Pro',
                                size: 12
                            }
                        }
                    },

                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 10,
                        displayColors: true
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        title: {
                            display: true,
                            text: 'Quantity added'
                        },

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: 'rgba(0,0,0,.05)'
                        }

                    },

                    x: {

                        title: {
                            display: true,
                            text: @json(
                                $chartPeriod === 'day'
                                ? 'Day'
                                : (
                                    $chartPeriod === 'month'
                                    ? 'Month'
                                    : 'Year'
                                )
                            )
                        },

                        grid: {
                            display: false
                        }

                    }

                }

            }

        });

    }

</script>

</body>
</html>