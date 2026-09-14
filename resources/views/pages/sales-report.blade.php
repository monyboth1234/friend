<!DOCTYPE html>

<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>គ្រប់គ្រងរបាយការណ៍ការលក់ (Sales Report Management)</title>


<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Khmer Font -->
<link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        --green: #198754;
        --green-dark: #11643d;
        --green-deep: #0b3d27;
        --green-soft: #eaf7ef;

        --orange: #f28c28;
        --orange-soft: #fff3e5;

        --blue: #0d6efd;
        --blue-soft: #eaf2ff;

        --purple: #7950f2;
        --purple-soft: #f0ebff;

        --red: #dc3545;
        --red-soft: #fff0f1;

        --yellow: #f5b800;
        --yellow-soft: #fff8dc;

        --bg: #f4f7f5;
        --white: #ffffff;
        --dark: #17231c;
        --text: #33423a;
        --muted: #7a8980;
        --border: #e4ebe6;

        --radius: 20px;
        --shadow: 0 10px 35px rgba(24, 55, 39, .07);
        --shadow-hover: 0 18px 45px rgba(24, 55, 39, .12);
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Kantumruy Pro', sans-serif;
        background:
            radial-gradient(circle at top right, rgba(25, 135, 84, .07), transparent 30%),
            var(--bg);
        color: var(--text);
    }

    /* =========================================================
       SIDEBAR — KEPT AS PROVIDED
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

    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        padding: 28px;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
        }

        .main-content {
            margin-left: 0;
            padding: 18px;
        }
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
       PAGE HEADER
    ========================================================= */

    .page-header {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ffffff 0%, #f8fcf9 100%);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 28px 30px;
        margin-bottom: 25px;
        box-shadow: var(--shadow);
    }

    .page-header::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(25, 135, 84, .06);
        right: -80px;
        top: -100px;
    }

    .page-header::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(242, 140, 40, .05);
        right: 100px;
        bottom: -90px;
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--green-soft);
        color: var(--green-dark);
        padding: 7px 12px;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .page-title {
        font-size: clamp(1.65rem, 3vw, 2.25rem);
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        letter-spacing: -.5px;
    }

    .page-subtitle {
        color: var(--muted);
        margin: 7px 0 0;
        font-size: .95rem;
    }

    .header-user {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--muted);
        font-size: .88rem;
        margin-top: 12px;
    }

    .header-user i {
        color: var(--green);
    }

    .year-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 16px;
        background: var(--green);
        color: white;
        border-radius: 14px;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(25, 135, 84, .2);
    }

    /* =========================================================
       KPI CARDS
    ========================================================= */

    .kpi-card {
        position: relative;
        overflow: hidden;
        border: 1px solid var(--border);
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        min-height: 155px;
        transition: .3s ease;
    }

    .kpi-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-hover);
    }

    .kpi-card::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        right: -45px;
        bottom: -55px;
        background: rgba(25, 135, 84, .05);
    }

    .kpi-body {
        position: relative;
        z-index: 2;
        padding: 23px;
    }

    .kpi-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .kpi-icon {
        width: 53px;
        height: 53px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 1.35rem;
    }

    .icon-green {
        background: var(--green-soft);
        color: var(--green);
    }

    .icon-blue {
        background: var(--blue-soft);
        color: var(--blue);
    }

    .icon-orange {
        background: var(--orange-soft);
        color: var(--orange);
    }

    .kpi-label {
        color: var(--muted);
        font-size: .86rem;
        font-weight: 600;
        margin-top: 18px;
    }

    .kpi-value {
        color: var(--dark);
        font-size: 1.75rem;
        font-weight: 800;
        line-height: 1.2;
        margin-top: 4px;
    }

    .kpi-value.green {
        color: var(--green);
    }

    .kpi-value.blue {
        color: var(--blue);
    }

    .kpi-value.orange {
        color: var(--orange);
    }

    /* =========================================================
       GENERAL CARDS
    ========================================================= */

    .premium-card {
        border: 1px solid var(--border);
        border-radius: var(--radius);
        background: var(--white);
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .card-heading {
        padding: 22px 24px 5px;
    }

    .card-heading-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .section-title {
        color: var(--dark);
        font-weight: 800;
        font-size: 1rem;
        margin: 0;
    }

    .section-subtitle {
        color: var(--muted);
        font-size: .78rem;
        margin-top: 4px;
    }

    .heading-icon {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: var(--green-soft);
        color: var(--green);
        margin-right: 10px;
    }

    .chart-wrapper {
        height: 335px;
        padding: 20px 22px 24px;
    }

    .chart-wrapper.small {
        height: 335px;
    }

    /* =========================================================
       DATE FILTER
    ========================================================= */

    .filter-card {
        background: linear-gradient(135deg, #0d5f39, #198754);
        border: none;
        border-radius: var(--radius);
        padding: 23px;
        box-shadow: 0 15px 35px rgba(25, 135, 84, .18);
        color: white;
    }

    .filter-title {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .filter-description {
        color: rgba(255,255,255,.72);
        font-size: .8rem;
        margin-bottom: 18px;
    }

    .filter-card .form-label {
        color: rgba(255,255,255,.88);
        font-size: .82rem;
        font-weight: 600;
    }

    .filter-card .form-control {
        min-height: 46px;
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
    }

    .filter-card .btn-light {
        min-height: 46px;
        border-radius: 12px;
        font-weight: 700;
        color: var(--green-dark);
    }

    .today-btn {
        min-height: 46px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,.3);
        color: white;
        background: rgba(255,255,255,.1);
        font-weight: 600;
    }

    .today-btn:hover {
        background: rgba(255,255,255,.18);
        color: white;
    }

    /* =========================================================
       ORDERS SECTION
    ========================================================= */

    .orders-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 14px;
    }

    .orders-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .orders-title-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: var(--green-soft);
        color: var(--green);
    }

    .orders-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
    }

    .orders-count {
        color: var(--muted);
        font-size: .78rem;
        margin-top: 2px;
    }

    .table-card {
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        background: white;
        box-shadow: var(--shadow);
    }

    .table-responsive {
        min-height: 180px;
    }

    .sales-table {
        margin: 0;
    }

    .sales-table thead th {
        background: #f5faf7;
        color: #63736a;
        border-bottom: 1px solid var(--border);
        border-top: none;
        padding: 17px 16px;
        font-size: .77rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .sales-table tbody td {
        padding: 17px 16px;
        border-bottom: 1px solid #edf1ee;
        color: var(--text);
        font-size: .88rem;
        vertical-align: middle;
    }

    .sales-table tbody tr {
        transition: .2s ease;
    }

    .sales-table tbody tr:hover {
        background: #f8fcf9;
    }

    .sales-table tbody tr:last-child td {
        border-bottom: none;
    }

    .order-number {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #f0f4f1;
        color: var(--green-dark);
        font-size: .78rem;
        font-weight: 800;
    }

    .customer-cell {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 180px;
    }

    .customer-avatar {
        width: 39px;
        height: 39px;
        flex: 0 0 39px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #dff2e6, #bfe4cc);
        color: var(--green-dark);
        font-weight: 800;
        font-size: .8rem;
    }

    .customer-name {
        font-weight: 700;
        color: var(--dark);
    }

    .customer-email {
        color: var(--muted);
        font-size: .74rem;
        margin-top: 2px;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f2f5f3;
        color: #5f6c64;
        padding: 7px 10px;
        border-radius: 9px;
        font-size: .73rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .product-name {
        color: var(--green-dark);
        font-weight: 700;
    }

    .quantity-badge {
        display: inline-flex;
        min-width: 42px;
        justify-content: center;
        background: var(--blue-soft);
        color: var(--blue);
        padding: 7px 10px;
        border-radius: 9px;
        font-weight: 800;
        font-size: .76rem;
    }

    .price-badge {
        display: inline-flex;
        justify-content: center;
        background: var(--green-soft);
        color: var(--green-dark);
        padding: 8px 11px;
        border-radius: 9px;
        font-weight: 800;
        font-size: .78rem;
        white-space: nowrap;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 65px 25px !important;
        text-align: center;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 18px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f4f1;
        color: #94a199;
        font-size: 2rem;
    }

    .empty-title {
        font-size: 1rem;
        font-weight: 800;
        color: var(--dark);
    }

    .empty-text {
        color: var(--muted);
        font-size: .8rem;
    }

    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 991.98px) {
        .main-content {
            padding: 22px;
        }

        .page-header {
            padding: 23px;
        }

        .chart-wrapper,
        .chart-wrapper.small {
            height: 300px;
        }
    }

    @media (max-width: 575.98px) {
        .main-content {
            padding: 14px;
        }

        .page-header {
            border-radius: 18px;
            padding: 20px;
        }

        .year-badge {
            margin-top: 18px;
        }

        .kpi-card {
            min-height: 140px;
        }

        .kpi-value {
            font-size: 1.45rem;
        }

        .filter-card {
            padding: 18px;
        }

        .orders-header {
            align-items: flex-start;
        }

        .chart-wrapper,
        .chart-wrapper.small {
            height: 280px;
            padding: 15px;
        }

        .sales-table thead th,
        .sales-table tbody td {
            padding: 13px 12px;
        }
    }

    /* =========================================================
       PRINT
    ========================================================= */

    @media print {
        body {
            background: white !important;
        }

        .sidebar,
        .filter-card,
        .no-print {
            display: none !important;
        }

        .main-content {
            margin-left: 0 !important;
            padding: 0 !important;
        }

        .page-header,
        .premium-card,
        .table-card,
        .kpi-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .page-header {
            margin-bottom: 15px;
        }

        .chart-wrapper {
            height: 280px;
        }

        .kpi-card {
            break-inside: avoid;
        }
    }
</style>
</head>

<body>

<!-- =============================================================
     SIDEBAR — ORIGINAL STRUCTURE
============================================================= -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between">
    <div>
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
                <i class="bi bi-speedometer2 me-2 fs-5"></i> ផ្ទាំងដើម
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('Arable_lands') }}" class="nav-link d-flex align-items-center">
                <i class="bi bi-bounding-box-circles me-2 fs-5"></i> ផ្ទៃដីដាំដុះ
            </a>
        </li>

        <li class="nav-item my-1">
            <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm"
                 style="font-size: 0.75rem; letter-spacing: 1px;">
                ប្រភេទទំនិញ
            </div>

            <ul class="list-unstyled ps-2 mb-0">
                <li>
                    <a href="{{ route('vegetable') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="fa-solid fa-carrot me-2"></i> Vegetable
                    </a>
                </li>

                <li>
                    <a href="{{ route('Fresh_Nut') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="bi bi-nut me-2"></i> Fresh Nut
                    </a>
                </li>

                <li>
                    <a href="{{ route('Egg') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="bi bi-egg-fried me-2"></i> Egg
                    </a>
                </li>

                <li>
                    <a href="{{ route('Fruit') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="bi bi-apple me-2"></i> Fruit
                    </a>
                </li>

                <li>
                    <a href="{{ route('Farm_Animals') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="bi bi-bug me-2"></i> Farm Animals
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm"
                 style="font-size: 0.75rem; letter-spacing: 1px;">
                របាយការណ៍
            </div>

            <a href="{{ route('sales.report') }}" class="nav-link d-flex align-items-center active">
                <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                <span>របាយការណ៍ការលក់</span>
            </a>
        </li>

        <li>
            <a href="{{ route('report') }}" class="nav-link sub-nav-link d-flex align-items-center">
                <i class="bi bi-star-fill me-2 fs-5"></i>
                <span>Report and rate</span>
            </a>
        </li>

        <li>
            <a href="{{ route('delivery.index') }}" class="nav-link sub-nav-link d-flex align-items-center">
                <i class="bi bi-truck me-2 fs-5"></i>
                <span>Orders</span>
            </a>
        </li>

        <hr class="border-light opacity-25">

        <li class="nav-item">
            <a href="{{ route('shoppage') }}" class="nav-link d-flex align-items-center">
                <i class="fa-solid fa-cart-shopping me-2 fs-5"></i> Shop
            </a>
        </li>
    </ul>
</div>

<div class="border-top border-light border-opacity-25 pt-3 mt-3">

    <div class="d-flex align-items-center mb-3 px-2">
        <i class="bi bi-person-circle fs-2 me-2 text-white"></i>

        <div class="lh-sm text-truncate">
            <div class="fw-bold text-white text-truncate">
                {{ Auth::user()->name ?? 'Guest' }}
            </div>

            <small class="text-white-50">
                {{ Auth::user()->role ?? 'visitor' }}
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

<!-- =============================================================
     MAIN CONTENT
============================================================= -->

<main class="main-content">

<!-- PAGE HEADER -->
<section class="page-header">

    <div class="header-content">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="eyebrow">
                    <i class="bi bi-bar-chart-fill"></i>
                    SALES ANALYTICS
                </div>

                <h1 class="page-title">
                    របាយការណ៍ការលក់
                </h1>

                <p class="page-subtitle">
                    តាមដានចំណូល ការកុម្ម៉ង់ និងប្រតិបត្តិការលក់របស់ Farm Fresh
                    នៅកន្លែងតែមួយ។
                </p>

                <div class="header-user">
                    <i class="bi bi-envelope-fill"></i>
                    <span>{{ Auth::user()->email ?? 'guest' }}</span>
                </div>

            </div>

            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

                <div class="year-badge">
                    <i class="bi bi-calendar3"></i>
                    ឆ្នាំ {{ date('Y') }}
                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     KPI CARDS
========================================================== -->

<div class="row g-4 mb-4">

    <!-- Revenue -->
    <div class="col-md-6 col-xl-4">

        <div class="kpi-card">

            <div class="kpi-body">

                <div class="kpi-top">

                    <div class="kpi-icon icon-green">
                        <i class="bi bi-cash-stack"></i>
                    </div>

                    <i class="bi bi-arrow-up-right text-success"></i>

                </div>

                <div class="kpi-label">
                    ចំណូលសរុប
                </div>

                <div class="kpi-value green">
                    ${{ number_format($orders->sum('total_price'), 2) }}
                </div>

            </div>

        </div>

    </div>


    <!-- Orders -->
    <div class="col-md-6 col-xl-4">

        <div class="kpi-card">

            <div class="kpi-body">

                <div class="kpi-top">

                    <div class="kpi-icon icon-blue">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>

                    <i class="bi bi-clipboard-check text-primary"></i>

                </div>

                <div class="kpi-label">
                    ចំនួនការកុម្ម៉ង់សរុប
                </div>

                <div class="kpi-value blue">
                    {{ number_format($orders->count()) }}
                </div>

            </div>

        </div>

    </div>


    <!-- Daily Quantity -->
    <div class="col-md-6 col-xl-4">

        <div class="kpi-card">

            <div class="kpi-body">

                <div class="kpi-top">

                    <div class="kpi-icon icon-orange">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <i class="bi bi-calendar-check text-warning"></i>

                </div>

                <div class="kpi-label">
                    បរិមាណលក់ថ្ងៃទី
                    {{ \Carbon\Carbon::parse($selectedDate)->format('d/m/Y') }}
                </div>

                <div class="kpi-value orange">
                    {{ number_format(array_sum($dailySalesChartData)) }}
                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     DATE FILTER
========================================================== -->

<section class="filter-card mb-4">

    <div class="row align-items-end g-3">

        <div class="col-lg-5">

            <div class="filter-title">
                <i class="bi bi-sliders me-2"></i>
                ត្រងទិន្នន័យការលក់
            </div>

            <div class="filter-description">
                ជ្រើសរើសថ្ងៃដែលអ្នកចង់វិភាគការលក់តាមប្រភេទទំនិញ។
            </div>

        </div>

        <div class="col-md-5 col-lg-4">

            <form action="{{ route('sales.report') }}" method="GET">

                <label for="sale_date" class="form-label">
                    <i class="bi bi-calendar-date me-1"></i>
                    ជ្រើសរើសថ្ងៃលក់
                </label>

                <input
                    type="date"
                    id="sale_date"
                    name="sale_date"
                    class="form-control"
                    value="{{ $selectedDate }}"
                    max="{{ now()->toDateString() }}"
                >

        </div>

        <div class="col-md-3 col-lg-2">

                <button type="submit"
                        class="btn btn-light w-100">
                    <i class="bi bi-search me-1"></i>
                    បង្ហាញ
                </button>

            </form>

        </div>

        <div class="col-md-4 col-lg-1">

            <a href="{{ route('sales.report') }}"
               class="btn today-btn w-100">
                <i class="bi bi-calendar-day"></i>
            </a>

        </div>

    </div>

</section>


<!-- =========================================================
     CHARTS
========================================================== -->

<div class="row g-4 mb-4">

    <!-- Monthly Chart -->
    <div class="col-xl-7">

        <div class="premium-card h-100">

            <div class="card-heading">

                <div class="card-heading-row">

                    <div class="d-flex align-items-center">

                        <div class="heading-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <div>

                            <h5 class="section-title">
                                ការលក់ប្រចាំខែ
                            </h5>

                            <div class="section-subtitle">
                                Monthly Sales Trend · {{ date('Y') }}
                            </div>

                        </div>

                    </div>

                    <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                        <i class="bi bi-activity me-1"></i>
                        Live Data
                    </span>

                </div>

            </div>

            <div class="chart-wrapper">

                <canvas id="monthlySalesChart"></canvas>

            </div>

        </div>

    </div>


    <!-- Daily Doughnut -->
    <div class="col-xl-5">

        <div class="premium-card h-100">

            <div class="card-heading">

                <div class="card-heading-row">

                    <div class="d-flex align-items-center">

                        <div class="heading-icon">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>

                        <div>

                            <h5 class="section-title">
                                ការលក់តាមប្រភេទ
                            </h5>

                            <div class="section-subtitle">
                                {{ \Carbon\Carbon::parse($selectedDate)->format('d/m/Y') }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="chart-wrapper small">

                <canvas id="dailySalesChart"></canvas>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     ORDERS HEADER
========================================================== -->

<div class="orders-header">

    <div class="orders-title-wrap">

        <div class="orders-title-icon">
            <i class="bi bi-receipt"></i>
        </div>

        <div>

            <h5 class="orders-title">
                បញ្ជីការកុម្ម៉ង់ទាំងអស់
            </h5>

            <div class="orders-count">
                Orders List · {{ number_format($orders->count()) }} records
            </div>

        </div>

    </div>

    <button onclick="window.print()"
            class="btn btn-outline-success rounded-3 px-3 no-print">
        <i class="bi bi-printer me-1"></i>
        Print Report
    </button>

</div>


<!-- =========================================================
     ORDERS TABLE
========================================================== -->

<div class="table-card">

    <div class="table-responsive">

        <table class="table sales-table align-middle">

            <thead>

                <tr>

                    <th class="text-center">#</th>

                    <th>
                        អតិថិជន
                    </th>

                    <th>
                        អ៊ីមែល
                    </th>

                    <th class="text-center">
                        ប្រភេទទំនិញ
                    </th>

                    <th>
                        ឈ្មោះទំនិញ
                    </th>

                    <th class="text-center">
                        ចំនួន
                    </th>

                    <th class="text-center">
                        តម្លៃសរុប
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($orders as $index => $order)

                    <tr>

                        <!-- Number -->

                        <td class="text-center">

                            <span class="order-number">
                                {{ $index + 1 }}
                            </span>

                        </td>


                        <!-- Customer -->

                        <td>

                            <div class="customer-cell">

                                <div class="customer-avatar">

                                    {{ strtoupper(substr($order->customer_name ?? 'C', 0, 1)) }}

                                </div>

                                <div>

                                    <div class="customer-name">
                                        {{ $order->customer_name }}
                                    </div>

                                    <div class="customer-email">
                                        Customer
                                    </div>

                                </div>

                            </div>

                        </td>


                        <!-- Email -->

                        <td>

                            <span class="text-muted small">
                                <i class="bi bi-envelope me-1"></i>
                                {{ $order->customer_email }}
                            </span>

                        </td>


                        <!-- Category -->

                        <td class="text-center">

                            <span class="category-badge">

                                <i class="bi bi-tag-fill"></i>

                                {{ $order->category }}

                            </span>

                        </td>


                        <!-- Product -->

                        <td>

                            <span class="product-name">
                                {{ $order->item_name }}
                            </span>

                        </td>


                        <!-- Quantity -->

                        <td class="text-center">

                            <span class="quantity-badge">

                                {{ number_format($order->quantity) }}

                            </span>

                        </td>


                        <!-- Price -->

                        <td class="text-center">

                            <span class="price-badge">

                                ${{ number_format($order->total_price, 2) }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-receipt"></i>
                            </div>

                            <div class="empty-title">
                                មិនទាន់មានទិន្នន័យការកុម្ម៉ង់ទេ
                            </div>

                            <div class="empty-text">
                                នៅពេលមានការកុម្ម៉ង់ ទិន្នន័យនឹងបង្ហាញនៅទីនេះ។
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</main>

<!-- =============================================================
     BOOTSTRAP JS
============================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- =============================================================
     CHARTS
============================================================= -->

<script>

    /* =========================================================
       CHART DEFAULTS
    ========================================================== */

    Chart.defaults.font.family = 'Kantumruy Pro';
    Chart.defaults.color = '#7a8980';

    /* =========================================================
       DAILY SALES DOUGHNUT
    ========================================================== */

    const dailyCanvas = document.getElementById('dailySalesChart');

    if (dailyCanvas) {

        const dailyCtx = dailyCanvas.getContext('2d');

        new Chart(dailyCtx, {

            type: 'doughnut',

            data: {

                labels: [
                    'Vegetable',
                    'Fresh Nut',
                    'Fruit',
                    'Egg',
                    'Farm Animal'
                ],

                datasets: [{

                    data: @json($dailySalesChartData),

                    backgroundColor: [
                        '#198754',
                        '#f5b800',
                        '#0dcaf0',
                        '#f28c28',
                        '#20c997'
                    ],

                    borderWidth: 4,

                    borderColor: '#ffffff',

                    hoverOffset: 10
                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '68%',

                animation: {
                    animateRotate: true,
                    duration: 1000
                },

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,

                            pointStyle: 'circle',

                            padding: 18,

                            font: {
                                size: 11,
                                weight: '600'
                            }

                        }

                    },

                    tooltip: {

                        backgroundColor: '#17231c',

                        titleFont: {
                            weight: '700'
                        },

                        bodyFont: {
                            size: 12
                        },

                        padding: 12,

                        cornerRadius: 10,

                        displayColors: true
                    }

                }
            }

        });

    }


    /* =========================================================
       MONTHLY SALES LINE CHART
    ========================================================== */

    const monthlyCanvas = document.getElementById('monthlySalesChart');

    if (monthlyCanvas) {

        const monthlyCtx = monthlyCanvas.getContext('2d');

        const monthlyData = @json($monthlySales);

        new Chart(monthlyCtx, {

            type: 'line',

            data: {

                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],

                datasets: [

                    {
                        label: 'Vegetable',
                        data: monthlyData.vegetable,
                        borderColor: '#198754',
                        backgroundColor: 'rgba(25, 135, 84, .08)',
                        tension: .42,
                        borderWidth: 3,
                        pointRadius: 3,
                        pointHoverRadius: 7,
                        fill: true
                    },

                    {
                        label: 'Fresh Nut',
                        data: monthlyData.fresh_nut,
                        borderColor: '#f5b800',
                        backgroundColor: 'transparent',
                        tension: .42,
                        borderWidth: 2.5,
                        pointRadius: 2,
                        pointHoverRadius: 6,
                        fill: false
                    },

                    {
                        label: 'Fruit',
                        data: monthlyData.fruit,
                        borderColor: '#0dcaf0',
                        backgroundColor: 'transparent',
                        tension: .42,
                        borderWidth: 2.5,
                        pointRadius: 2,
                        pointHoverRadius: 6,
                        fill: false
                    },

                    {
                        label: 'Egg',
                        data: monthlyData.egg,
                        borderColor: '#f28c28',
                        backgroundColor: 'transparent',
                        tension: .42,
                        borderWidth: 2.5,
                        pointRadius: 2,
                        pointHoverRadius: 6,
                        fill: false
                    },

                    {
                        label: 'Farm Animal',
                        data: monthlyData.farmanimal,
                        borderColor: '#20c997',
                        backgroundColor: 'transparent',
                        tension: .42,
                        borderWidth: 2.5,
                        pointRadius: 2,
                        pointHoverRadius: 6,
                        fill: false
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

                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        border: {
                            display: false
                        },

                        ticks: {
                            font: {
                                size: 10
                            }
                        }

                    },

                    y: {

                        beginAtZero: true,

                        border: {
                            display: false
                        },

                        grid: {
                            color: '#edf1ee'
                        },

                        ticks: {
                            font: {
                                size: 10
                            },

                            padding: 8
                        }

                    }

                },

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,

                            pointStyle: 'circle',

                            padding: 16,

                            font: {
                                size: 10,
                                weight: '600'
                            }

                        }

                    },

                    tooltip: {

                        backgroundColor: '#17231c',

                        titleFont: {
                            weight: '700'
                        },

                        bodyFont: {
                            size: 11
                        },

                        padding: 13,

                        cornerRadius: 11,

                        boxPadding: 5

                    }

                }

            }

        });

    }

</script>

</body>
</html>
