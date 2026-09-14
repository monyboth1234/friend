<!DOCTYPE html>

<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>គ្រប់គ្រងផ្ទៃដីដាំដុះ | Farm Fresh</title>


<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Khmer Font -->
<link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #198754;
        --primary-dark: #116b42;
        --primary-soft: #eaf7ef;
        --orange: #f59e0b;
        --blue: #0d6efd;
        --red: #dc3545;
        --dark: #17221b;
        --muted: #6b7280;
        --bg: #f4f7f5;
        --border: #e7ece9;
        --shadow: 0 12px 35px rgba(24, 42, 32, .07);
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Kantumruy Pro', sans-serif;
        background:
            radial-gradient(circle at top right, rgba(25,135,84,.08), transparent 30%),
            #f4f7f5;
        color: var(--dark);
    }

    /* =========================================================
       SIDEBAR — ORIGINAL / NOT CHANGED
    ========================================================= */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        background-color: #198754;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.85);
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 0.25rem;
        transition: all 0.2s ease-in-out;
        font-weight: 500;
    }

    .sidebar .nav-link:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateX(3px);
    }

    .sidebar .nav-link.active {
        color: #198754 !important;
        background-color: #ffffff !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar .sub-nav-link {
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        transition: all 0.2s;
    }

    .sidebar .sub-nav-link:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }

    /* =========================================================
       MAIN AREA
    ========================================================= */

    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        padding: 28px;
    }

    /* =========================================================
       PAGE HERO
    ========================================================= */

    .page-hero {
        position: relative;
        overflow: hidden;
        background:
            linear-gradient(135deg, #ffffff 0%, #f0f9f3 100%);
        border: 1px solid rgba(25,135,84,.10);
        border-radius: 24px;
        padding: 28px;
        margin-bottom: 24px;
        box-shadow: var(--shadow);
    }

    .page-hero::before {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        background: rgba(25,135,84,.07);
        right: -70px;
        top: -100px;
    }

    .page-hero::after {
        content: "";
        position: absolute;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(245,158,11,.07);
        right: 100px;
        bottom: -90px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary);
        color: white;
        font-size: 25px;
        box-shadow: 0 10px 25px rgba(25,135,84,.25);
    }

    .hero-title {
        font-size: 1.65rem;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .hero-subtitle {
        color: var(--muted);
        margin: 0;
        font-size: .92rem;
    }

    .user-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        background: white;
        border: 1px solid var(--border);
        border-radius: 50px;
        color: var(--muted);
        font-size: .85rem;
    }

    .user-chip i {
        color: var(--primary);
    }

    .add-land-btn {
        border: 0;
        border-radius: 14px;
        padding: 12px 20px;
        font-weight: 600;
        background: var(--primary);
        box-shadow: 0 8px 20px rgba(25,135,84,.20);
        transition: .25s ease;
    }

    .add-land-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(25,135,84,.27);
    }

    /* =========================================================
       STAT CARDS
    ========================================================= */

    .stat-card {
        position: relative;
        overflow: hidden;
        border: 1px solid var(--border);
        background: rgba(255,255,255,.92);
        border-radius: 20px;
        box-shadow: var(--shadow);
        transition: .3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(24,42,32,.11);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        right: -35px;
        top: -35px;
        background: rgba(25,135,84,.06);
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        flex-shrink: 0;
    }

    .stat-label {
        color: var(--muted);
        font-size: .84rem;
        margin-bottom: 4px;
    }

    .stat-value {
        font-size: 1.45rem;
        font-weight: 700;
        margin: 0;
    }

    .stat-footer {
        margin-top: 16px;
        padding-top: 12px;
        border-top: 1px solid #edf1ee;
        color: var(--muted);
        font-size: .78rem;
    }

    .stat-footer i {
        color: var(--primary);
    }

    /* =========================================================
       TOOLBAR
    ========================================================= */

    .content-panel {
        background: white;
        border: 1px solid var(--border);
        border-radius: 22px;
        box-shadow: var(--shadow);
    }

    .toolbar {
        padding: 20px;
        border-bottom: 1px solid var(--border);
    }

    .section-title {
        font-size: 1.05rem;
        font-weight: 700;
        margin: 0;
    }

    .section-subtitle {
        font-size: .8rem;
        color: var(--muted);
        margin: 3px 0 0;
    }

    .search-box {
        width: 290px;
    }

    .search-box .input-group {
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        background: #fafcfb;
    }

    .search-box .input-group-text {
        border: 0;
        background: transparent;
    }

    .search-box .form-control {
        border: 0;
        background: transparent;
        padding: 11px 10px;
    }

    .search-box .form-control:focus {
        box-shadow: none;
    }

    /* =========================================================
       LAND CARDS
    ========================================================= */

    .lands-container {
        padding: 20px;
    }

    .land-card {
        position: relative;
        height: 100%;
        overflow: hidden;
        border: 1px solid var(--border);
        border-radius: 20px;
        background: white;
        transition: .3s ease;
    }

    .land-card:hover {
        transform: translateY(-6px);
        border-color: rgba(25,135,84,.35);
        box-shadow: 0 18px 38px rgba(24,42,32,.10);
    }

    .land-top {
        padding: 20px 20px 14px;
    }

    .land-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-soft);
        color: var(--primary);
        font-size: 21px;
    }

    .land-name {
        font-size: 1rem;
        font-weight: 700;
        margin: 0 0 3px;
        color: var(--dark);
    }

    .land-location {
        font-size: .78rem;
        color: var(--muted);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 50px;
        background: #eaf7ef;
        color: #198754;
        font-size: .7rem;
        font-weight: 600;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        background: #198754;
        border-radius: 50%;
    }

    .area-box {
        margin: 0 20px 15px;
        padding: 17px;
        border-radius: 15px;
        background: linear-gradient(135deg, #f3faf6, #f8fbf9);
        border: 1px solid #e5f0e9;
    }

    .area-label {
        color: var(--muted);
        font-size: .72rem;
        margin-bottom: 5px;
    }

    .area-number {
        font-size: 1.55rem;
        line-height: 1;
        font-weight: 700;
        color: var(--primary);
    }

    .area-unit {
        font-size: .75rem;
        color: var(--muted);
        margin-left: 4px;
    }

    .description {
        padding: 0 20px 17px;
        color: var(--muted);
        font-size: .78rem;
        line-height: 1.6;
        min-height: 42px;
    }

    .land-actions {
        padding: 13px 20px;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .view-btn {
        color: var(--muted);
        font-size: .78rem;
        text-decoration: none;
        transition: .2s;
    }

    .view-btn:hover {
        color: var(--primary);
    }

    .delete-btn {
        border: 0;
        border-radius: 10px;
        padding: 7px 11px;
        font-size: .74rem;
        background: #fff0f1;
        color: #dc3545;
        transition: .2s;
    }

    .delete-btn:hover {
        background: #dc3545;
        color: white;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 70px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 90px;
        height: 90px;
        border-radius: 25px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-soft);
        color: var(--primary);
        font-size: 40px;
    }

    .empty-state h5 {
        font-weight: 700;
    }

    .empty-state p {
        color: var(--muted);
        font-size: .85rem;
    }

    /* =========================================================
       MODAL
    ========================================================= */

    .modal-content {
        border: 0;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(0,0,0,.18);
    }

    .modal-header-custom {
        position: relative;
        padding: 24px 26px;
        background: linear-gradient(135deg, #198754, #116b42);
        color: white;
    }

    .modal-header-custom::after {
        content: "";
        position: absolute;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        right: -45px;
        top: -85px;
    }

    .modal-title-wrap {
        position: relative;
        z-index: 2;
    }

    .modal-icon {
        width: 48px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: rgba(255,255,255,.16);
        font-size: 21px;
        margin-right: 10px;
    }

    .form-section {
        background: #f8faf9;
        border: 1px solid #edf1ee;
        border-radius: 15px;
        padding: 17px;
    }

    .form-label {
        font-size: .82rem;
        font-weight: 600;
        color: #374151;
    }

    .form-control,
    .form-select {
        border-radius: 11px;
        border: 1px solid #dfe7e2;
        padding: 11px 13px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 4px rgba(25,135,84,.08);
    }

    .save-btn {
        border-radius: 11px;
        padding: 10px 20px;
        font-weight: 600;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991.98px) {
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        .search-box {
            width: 240px;
        }
    }

    @media (max-width: 767.98px) {
        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
        }

        .main-content {
            margin-left: 0;
            padding: 14px;
        }

        .page-hero {
            padding: 20px;
            border-radius: 18px;
        }

        .hero-title {
            font-size: 1.3rem;
        }

        .hero-actions {
            width: 100%;
            margin-top: 18px;
        }

        .add-land-btn {
            width: 100%;
        }

        .search-box {
            width: 100%;
        }

        .toolbar {
            padding: 16px;
        }

        .toolbar .d-flex {
            width: 100%;
        }

        .lands-container {
            padding: 14px;
        }
    }

    /* =========================================================
       ANIMATIONS
    ========================================================= */

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-card {
        animation: fadeUp .5s ease both;
    }

    .land-card:nth-child(2) {
        animation-delay: .05s;
    }

    .land-card:nth-child(3) {
        animation-delay: .1s;
    }

    .land-card:nth-child(4) {
        animation-delay: .15s;
    }
/* =========================================================
   COLLAPSIBLE SIDEBAR
========================================================= */

.sidebar {
    transition: width .3s ease, transform .3s ease;
}

/* Sidebar closed */
body.sidebar-collapsed .sidebar {
    width: 80px;
}

/* Main content when sidebar is closed */
body.sidebar-collapsed .main-content {
    margin-left: 80px;
}

/* Hide sidebar text when collapsed */
body.sidebar-collapsed .sidebar .nav-link {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}

body.sidebar-collapsed .sidebar .nav-link > span,
body.sidebar-collapsed .sidebar .sub-nav-link,
body.sidebar-collapsed .sidebar .text-uppercase,
body.sidebar-collapsed .sidebar .border-top > div .lh-sm,
body.sidebar-collapsed .sidebar .border-top > div {
    /* Keep icons visible */
}

/* Hide text elements */
body.sidebar-collapsed .sidebar .nav-link {
    font-size: 0;
}

body.sidebar-collapsed .sidebar .nav-link i {
    font-size: 1.25rem;
    margin-right: 0 !important;
}

body.sidebar-collapsed .sidebar .text-uppercase {
    display: none;
}

/* Hide logo */
body.sidebar-collapsed .sidebar img {
    max-width: 48px !important;
}

/* Hide user information */
body.sidebar-collapsed .sidebar .border-top .lh-sm {
    display: none;
}

body.sidebar-collapsed .sidebar .border-top > div {
    justify-content: center;
}

body.sidebar-collapsed .sidebar .border-top .btn {
    font-size: 0;
    padding: 8px;
}

body.sidebar-collapsed .sidebar .border-top .btn i {
    font-size: 1rem;
    margin: 0 !important;
}

/* Toggle button */
.sidebar-toggle {
    position: fixed;
    top: 18px;
    left: 235px;
    width: 42px;
    height: 42px;
    border: 0;
    border-radius: 50%;
    background: #ffffff;
    color: #198754;
    box-shadow: 0 6px 20px rgba(0,0,0,.12);
    z-index: 1100;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: left .3s ease, transform .2s ease;
}

.sidebar-toggle:hover {
    transform: scale(1.05);
    background: #f1f8f4;
}

/* Toggle position when closed */
body.sidebar-collapsed .sidebar-toggle {
    left: 55px;
}

/* Main transition */
.main-content {
    transition: margin-left .3s ease;
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767.98px) {

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 260px;
        height: 100vh;
        transform: translateX(-100%);
        z-index: 1050;
    }

    body.sidebar-mobile-open .sidebar {
        transform: translateX(0);
    }

    .main-content,
    body.sidebar-collapsed .main-content {
        margin-left: 0;
        padding: 14px;
    }

    .sidebar-toggle,
    body.sidebar-collapsed .sidebar-toggle {
        left: 15px;
        top: 15px;
    }

    body.sidebar-mobile-open .sidebar-toggle {
        left: 275px;
    }

    body.sidebar-mobile-open::after {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.35);
        z-index: 1040;
    }
}
</style>

</head>

<body>
<!-- =========================================================
     SIDEBAR — KEPT AS YOUR ORIGINAL
========================================================= -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between">

<!-- Sidebar Toggle -->
<button type="button"
        class="sidebar-toggle"
        id="sidebarToggle"
        aria-label="Toggle sidebar">

    <i class="bi bi-chevron-left" id="sidebarToggleIcon"></i>

</button>

    <div>

        <!-- Farm Logo -->
        <div class="text-center py-2 mb-2">
            <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                 alt="Farm Logo"
                 class="img-fluid rounded-circle shadow-sm"
                 style="max-width: 120px; background: white; padding: 5px;">
        </div>

        <hr class="border-light opacity-25">

        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-speedometer2 me-2 fs-5"></i>
                    ផ្ទាំងដើម
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Arable_lands') }}" class="nav-link active d-flex align-items-center">
                    <i class="bi bi-bounding-box-circles me-2 fs-5"></i>
                    ផ្ទៃដីដាំដុះ
                </a>
            </li>

            <li class="nav-item my-1">

                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold"
                     style="font-size:0.75rem;letter-spacing:1px;">
                    ប្រភេទទំនិញ
                </div>

                <ul class="list-unstyled ps-2 mb-0">

                    <li>
                        <a href="{{ route('vegetable') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="fa-solid fa-carrot me-2"></i>
                            Vegetable
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-nut me-2"></i>
                            Fresh Nut
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Egg') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-egg-fried me-2"></i>
                            Egg
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-apple me-2"></i>
                            Fruit
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Farm_Animals') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-bug me-2"></i>
                            Farm Animals
                        </a>
                    </li>

                </ul>
            </li>

            <li>

                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold"
                     style="font-size:0.75rem;letter-spacing:1px;">
                    Other
                </div>

                <a href="{{ route('sales.report') }}"
                   class="nav-link sub-nav-link d-flex align-items-center">
                    <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                    <span>របាយការណ៍ការលក់</span>
                </a>

            </li>

            <li>
                <a href="{{ route('report') }}"
                   class="nav-link sub-nav-link d-flex align-items-center">
                    <i class="bi bi-star-fill me-2 fs-5"></i>
                    <span>Report and rate</span>
                </a>
            </li>

            <li>
                <a href="{{ route('delivery.index') }}"
                   class="nav-link sub-nav-link d-flex align-items-center">
                    <i class="bi bi-truck me-2 fs-5"></i>
                    <span>Orders</span>
                </a>
            </li>

            <hr class="border-light opacity-25">

            <li class="nav-item">
                <a href="{{ route('shoppage') }}"
                   class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-cart-shopping me-2 fs-5"></i>
                    Shop
                </a>
            </li>

        </ul>
    </div>

    <!-- User Profile -->
    <div class="border-top border-light border-opacity-25 pt-3 mt-3">

        <div class="d-flex align-items-center mb-3 px-2">

            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>

            <div class="lh-sm text-truncate">

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

            <button type="submit"
                    class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2">

                <i class="bi bi-box-arrow-right"></i>

                ចាកចេញ (Logout)

            </button>

        </form>

    </div>

</aside>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main class="main-content">

    <!-- HERO -->
    <section class="page-hero">

        <div class="hero-content">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="d-flex align-items-center gap-3">

                        <div class="hero-icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>

                        <div>

                            <h1 class="hero-title">
                                គ្រប់គ្រងផ្ទៃដីដាំដុះ
                            </h1>

                            <p class="hero-subtitle">
                                គ្រប់គ្រង និងតាមដានព័ត៌មានផ្ទៃដីកសិដ្ឋានរបស់អ្នក
                            </p>

                        </div>

                    </div>

                    <div class="mt-3">

                        <span class="user-chip">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                        </span>

                        <span class="user-chip ms-1">
                            <i class="bi bi-envelope"></i>
                            {{ Auth::user()->email }}
                        </span>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="hero-actions d-flex justify-content-lg-end">

                        <button class="btn btn-success add-land-btn d-flex align-items-center gap-2"
                                data-bs-toggle="modal"
                                data-bs-target="#addLandModal">

                            <i class="bi bi-plus-lg"></i>

                            បន្ថែមផ្ទៃដីថ្មី

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         STATISTICS
    ===================================================== -->

    <div class="row g-3 mb-4">

        <!-- Total Area -->
        <div class="col-md-4">

            <div class="stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>

                        <div>

                            <div class="stat-label">
                                ផ្ទៃដីសរុប
                            </div>

                            <h3 class="stat-value text-success">
                                {{ number_format($totalArea, 2) }}
                                <span class="fs-6 fw-normal">ហិកតា</span>
                            </h3>

                        </div>

                    </div>

                    <div class="stat-footer">
                        <i class="bi bi-arrow-up-right"></i>
                        ផ្ទៃដីដែលបានកត់ត្រាសរុប
                    </div>

                </div>

            </div>

        </div>


        <!-- Total Plots -->
        <div class="col-md-4">

            <div class="stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="stat-icon bg-primary-subtle text-primary">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </div>

                        <div>

                            <div class="stat-label">
                                ចំនួនឡូរសរុប
                            </div>

                            <h3 class="stat-value">
                                {{ $totalLand }}
                                <span class="fs-6 fw-normal text-muted">ឡូរ</span>
                            </h3>

                        </div>

                    </div>

                    <div class="stat-footer">
                        <i class="bi bi-layers"></i>
                        បញ្ជីផ្ទៃដីទាំងអស់ក្នុងប្រព័ន្ធ
                    </div>

                </div>

            </div>

        </div>


        <!-- Active -->
        <div class="col-md-4">

            <div class="stat-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="stat-icon bg-warning-subtle text-warning">
                            <i class="bi bi-sprout"></i>
                        </div>

                        <div>

                            <div class="stat-label">
                                ស្ថានភាព
                            </div>

                            <h3 class="stat-value">
                                Active
                            </h3>

                        </div>

                    </div>

                    <div class="stat-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        ប្រព័ន្ធគ្រប់គ្រងផ្ទៃដីកំពុងដំណើរការ
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         LAND MANAGEMENT PANEL
    ===================================================== -->

    <section class="content-panel">

        <!-- Toolbar -->
        <div class="toolbar">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                <div>

                    <h2 class="section-title">
                        <i class="bi bi-map me-2 text-success"></i>
                        បញ្ជីផ្ទៃដីដាំដុះ
                    </h2>

                    <p class="section-subtitle">
                        បង្ហាញផ្ទៃដីទាំងអស់ដែលបានបញ្ចូលក្នុងប្រព័ន្ធ
                    </p>

                </div>

                <div class="search-box">

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search text-success"></i>
                        </span>

                        <input type="text"
                               id="landSearch"
                               class="form-control"
                               placeholder="ស្វែងរកឈ្មោះ ឬទីតាំង...">

                    </div>

                </div>

            </div>

        </div>


        <!-- Cards -->
        <div class="lands-container">

            <div class="row g-3" id="landGrid">

                @forelse($arableLand as $land)

                    <div class="col-12 col-md-6 col-xl-4 land-item animate-card"
                         data-name="{{ strtolower($land->name) }}"
                         data-location="{{ strtolower($land->location ?? '') }}">

                        <div class="land-card">

                            <!-- Card Header -->
                            <div class="land-top">

                                <div class="d-flex justify-content-between align-items-start">

                                    <div class="d-flex align-items-center gap-3">

                                        <div class="land-icon">
                                            <i class="bi bi-bounding-box"></i>
                                        </div>

                                        <div>

                                            <h3 class="land-name">
                                                {{ $land->name }}
                                            </h3>

                                            <div class="land-location">

                                                <i class="bi bi-geo-alt-fill text-danger me-1"></i>

                                                {{ $land->location ?? 'មិនមានទីតាំង' }}

                                            </div>

                                        </div>

                                    </div>

                                    <span class="status-badge">

                                        <span class="status-dot"></span>

                                        សកម្ម

                                    </span>

                                </div>

                            </div>


                            <!-- Area -->
                            <div class="area-box">

                                <div class="area-label">
                                    ទំហំផ្ទៃដី
                                </div>

                                <div>

                                    <span class="area-number">
                                        {{ number_format($land->area, 2) }}
                                    </span>

                                    <span class="area-unit">
                                        {{ $land->unit }}
                                    </span>

                                </div>

                            </div>


                            <!-- Description -->
                            <div class="description">

                                @if($land->description)

                                    <i class="bi bi-info-circle me-1 text-success"></i>

                                    {{ $land->description }}

                                @else

                                    <span class="text-muted">
                                        មិនមានការពិពណ៌នាបន្ថែម
                                    </span>

                                @endif

                            </div>


                            <!-- Actions -->
                            <div class="land-actions">

                                <button type="button"
                                        class="btn view-btn p-0"
                                        data-bs-toggle="modal"
                                        data-bs-target="#landDetails{{ $land->id }}">

                                    <i class="bi bi-eye me-1"></i>

                                    មើលព័ត៌មាន

                                </button>


                                <form action="{{ route('Arable_land.destroy', $land->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('តើអ្នកប្រាកដជាចង់លុបទិន្នន័យនេះមែនទេ?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="delete-btn">

                                        <i class="bi bi-trash3 me-1"></i>

                                        លុប

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>


                    <!-- Details Modal -->
                    <div class="modal fade"
                         id="landDetails{{ $land->id }}"
                         tabindex="-1"
                         aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header-custom">

                                    <div class="modal-title-wrap">

                                        <div class="d-flex align-items-center">

                                            <span class="modal-icon">
                                                <i class="bi bi-map"></i>
                                            </span>

                                            <div>

                                                <h5 class="mb-1 fw-bold">
                                                    {{ $land->name }}
                                                </h5>

                                                <small class="opacity-75">
                                                    ព័ត៌មានលម្អិតផ្ទៃដី
                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="modal-body p-4">

                                    <div class="row g-3">

                                        <div class="col-6">

                                            <div class="form-section h-100">

                                                <small class="text-muted d-block mb-1">
                                                    ទំហំ
                                                </small>

                                                <strong class="text-success fs-5">
                                                    {{ number_format($land->area, 2) }}
                                                </strong>

                                                <small class="text-muted">
                                                    {{ $land->unit }}
                                                </small>

                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-section h-100">

                                                <small class="text-muted d-block mb-1">
                                                    ស្ថានភាព
                                                </small>

                                                <strong class="text-success">
                                                    <i class="bi bi-check-circle-fill me-1"></i>
                                                    សកម្ម
                                                </strong>

                                            </div>

                                        </div>

                                        <div class="col-12">

                                            <div class="form-section">

                                                <small class="text-muted d-block mb-1">
                                                    ទីតាំង
                                                </small>

                                                <div>

                                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>

                                                    {{ $land->location ?? 'មិនមានទីតាំង' }}

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-12">

                                            <div class="form-section">

                                                <small class="text-muted d-block mb-1">
                                                    ការពិពណ៌នា
                                                </small>

                                                <div class="text-muted">

                                                    {{ $land->description ?? 'មិនមានការពិពណ៌នា' }}

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer border-0 px-4 pb-4">

                                    <button type="button"
                                            class="btn btn-light px-4"
                                            data-bs-dismiss="modal">

                                        បិទ

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-state">

                            <div class="empty-icon">

                                <i class="bi bi-map"></i>

                            </div>

                            <h5>
                                មិនទាន់មានទិន្នន័យផ្ទៃដី
                            </h5>

                            <p>
                                ចាប់ផ្តើមដោយបន្ថែមផ្ទៃដីដាំដុះថ្មីរបស់អ្នក។
                            </p>

                            <button class="btn btn-success px-4 py-2 rounded-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addLandModal">

                                <i class="bi bi-plus-lg me-1"></i>

                                បន្ថែមផ្ទៃដី

                            </button>

                        </div>

                    </div>

                @endforelse

            </div>

            <!-- No Search Result -->
            <div id="noResults"
                 class="text-center py-5 d-none">

                <div class="text-muted mb-2">
                    <i class="bi bi-search fs-1"></i>
                </div>

                <h6 class="fw-bold">
                    រកមិនឃើញផ្ទៃដី
                </h6>

                <small class="text-muted">
                    សូមសាកល្បងស្វែងរកដោយឈ្មោះ ឬទីតាំងផ្សេងទៀត។
                </small>

            </div>

        </div>

    </section>

</main>


<!-- =========================================================
     ADD LAND MODAL
========================================================= -->

<div class="modal fade"
     id="addLandModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header-custom">

                <div class="modal-title-wrap">

                    <div class="d-flex align-items-center">

                        <span class="modal-icon">
                            <i class="bi bi-plus-lg"></i>
                        </span>

                        <div>

                            <h5 class="mb-1 fw-bold">
                                បន្ថែមផ្ទៃដីថ្មី
                            </h5>

                            <small class="opacity-75">
                                បញ្ចូលព័ត៌មានផ្ទៃដីដាំដុះរបស់អ្នក
                            </small>

                        </div>

                    </div>

                </div>

                <button type="button"
                        class="btn-close btn-close-white position-absolute top-0 end-0 m-4"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body p-4">

                <form action="{{ route('Arable_land.store') }}"
                      method="POST">

                    @csrf

                    <div class="form-section mb-3">

                        <div class="mb-3">

                            <label class="form-label">

                                ឈ្មោះដី / ឡូរ

                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-tag text-success"></i>
                                </span>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="ឧ. ដីចំការ A1"
                                       required>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3 mb-md-0">

                                <label class="form-label">

                                    ទំហំផ្ទៃដី

                                    <span class="text-danger">*</span>

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-rulers text-success"></i>
                                    </span>

                                    <input type="number"
                                           name="area"
                                           class="form-control"
                                           step="0.01"
                                           min="0"
                                           placeholder="ឧ. 10.5"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">

                                    ឯកតា

                                    <span class="text-danger">*</span>

                                </label>

                                <select name="unit"
                                        class="form-select"
                                        required>

                                    <option value="hectare">
                                        Hectare (ហិកតា)
                                    </option>

                                    <option value="acre">
                                        Acre
                                    </option>

                                    <option value="m²">
                                        m²
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <div class="form-section mb-3">

                        <label class="form-label">

                            <i class="bi bi-geo-alt me-1 text-danger"></i>

                            ទីតាំង

                        </label>

                        <input type="text"
                               name="location"
                               class="form-control"
                               placeholder="ឧ. ភូមិ A, ឃុំ B">

                    </div>


                    <div class="form-section mb-4">

                        <label class="form-label">

                            <i class="bi bi-card-text me-1 text-success"></i>

                            ការពិពណ៌នាបន្ថែម

                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="4"
                                  placeholder="បញ្ជាក់ព័ត៌មានបន្ថែមអំពីផ្ទៃដី..."></textarea>

                    </div>


                    <div class="d-flex justify-content-end gap-2">

                        <button type="button"
                                class="btn btn-light px-4 py-2 rounded-3"
                                data-bs-dismiss="modal">

                            បោះបង់

                        </button>

                        <button type="submit"
                                class="btn btn-success save-btn">

                            <i class="bi bi-check2-circle me-1"></i>

                            រក្សាទុកផ្ទៃដី

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- =========================================================
     SEARCH
========================================================= -->

<script>

    const searchInput = document.getElementById('landSearch');
    const landItems = document.querySelectorAll('.land-item');
    const noResults = document.getElementById('noResults');

    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();

            let visibleCount = 0;

            landItems.forEach(function (item) {

                const name = item.dataset.name || '';
                const location = item.dataset.location || '';

                const matched =
                    name.includes(keyword) ||
                    location.includes(keyword);

                if (matched) {

                    item.classList.remove('d-none');
                    visibleCount++;

                } else {

                    item.classList.add('d-none');

                }

            });

            if (visibleCount === 0 && keyword !== '') {

                noResults.classList.remove('d-none');

            } else {

                noResults.classList.add('d-none');

            }

        });

    }

</script>
<script>
    /* =========================================================
       SIDEBAR OPEN / CLOSE
    ========================================================= */

    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarToggleIcon = document.getElementById('sidebarToggleIcon');

    // Load saved sidebar state
    const sidebarCollapsed =
        localStorage.getItem('sidebarCollapsed') === 'true';

    if (sidebarCollapsed && window.innerWidth > 767) {
        document.body.classList.add('sidebar-collapsed');
        sidebarToggleIcon.classList.remove('bi-chevron-left');
        sidebarToggleIcon.classList.add('bi-chevron-right');
    }

    sidebarToggle.addEventListener('click', function () {

        /* Mobile */
        if (window.innerWidth <= 767) {

            document.body.classList.toggle('sidebar-mobile-open');

            const mobileOpen =
                document.body.classList.contains('sidebar-mobile-open');

            if (mobileOpen) {
                sidebarToggleIcon.classList.remove('bi-list');
                sidebarToggleIcon.classList.add('bi-x-lg');
            } else {
                sidebarToggleIcon.classList.remove('bi-x-lg');
                sidebarToggleIcon.classList.add('bi-list');
            }

            return;
        }

        /* Desktop */
        document.body.classList.toggle('sidebar-collapsed');

        const collapsed =
            document.body.classList.contains('sidebar-collapsed');

        if (collapsed) {

            sidebarToggleIcon.classList.remove('bi-chevron-left');
            sidebarToggleIcon.classList.add('bi-chevron-right');

            localStorage.setItem('sidebarCollapsed', 'true');

        } else {

            sidebarToggleIcon.classList.remove('bi-chevron-right');
            sidebarToggleIcon.classList.add('bi-chevron-left');

            localStorage.setItem('sidebarCollapsed', 'false');
        }
    });

    /* Close mobile sidebar when clicking outside */
    document.addEventListener('click', function (event) {

        if (window.innerWidth > 767) {
            return;
        }

        const sidebar = document.querySelector('.sidebar');

        if (
            document.body.classList.contains('sidebar-mobile-open') &&
            !sidebar.contains(event.target) &&
            !sidebarToggle.contains(event.target)
        ) {

            document.body.classList.remove('sidebar-mobile-open');

            sidebarToggleIcon.classList.remove('bi-x-lg');
            sidebarToggleIcon.classList.add('bi-list');
        }
    });
</script>


</body>
</html>
