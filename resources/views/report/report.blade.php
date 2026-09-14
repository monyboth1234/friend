<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Review Report</title>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>
    :root {
        --green: #198754;
        --green-dark: #11663f;
        --green-light: #eaf8f0;
        --orange: #f59e0b;
        --blue: #3b82f6;
        --red: #ef4444;
        --purple: #8b5cf6;

        --dark: #0f172a;
        --text: #334155;
        --muted: #64748b;
        --border: #e5e7eb;
        --bg: #f6f8fb;
        --white: #ffffff;

        --card-radius: 20px;
        --shadow-sm: 0 2px 8px rgba(15, 23, 42, .04);
        --shadow-md: 0 12px 35px rgba(15, 23, 42, .07);
        --shadow-lg: 0 20px 50px rgba(15, 23, 42, .10);
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', 'Kantumruy Pro', sans-serif;
        background:
            radial-gradient(circle at top right, rgba(25, 135, 84, .07), transparent 28%),
            var(--bg);
        color: var(--text);
    }

    /* =========================================================
       SIDEBAR — UNCHANGED
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

    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        padding: 0;
    }

    /* =========================================================
       PAGE
    ========================================================= */

    .report-wrapper {
        padding: 32px;
        max-width: 1700px;
        margin: auto;
    }

    /* =========================================================
       TOP HEADER
    ========================================================= */

    .report-header {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ffffff 0%, #f8fffb 100%);
        border: 1px solid rgba(25, 135, 84, .12);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
    }

    .report-header::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(25, 135, 84, .06);
        right: -70px;
        top: -100px;
    }

    .report-header::after {
        content: "";
        position: absolute;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(245, 158, 11, .06);
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
        padding: 6px 11px;
        background: var(--green-light);
        color: var(--green-dark);
        border-radius: 999px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .8px;
        margin-bottom: 12px;
    }

    .report-title {
        font-size: clamp(1.7rem, 3vw, 2.4rem);
        font-weight: 800;
        color: var(--dark);
        letter-spacing: -.8px;
        margin-bottom: 8px;
    }

    .report-subtitle {
        color: var(--muted);
        margin: 0;
        font-size: 14px;
    }

    .header-actions {
        position: relative;
        z-index: 3;
    }

    .btn-premium {
        border: 0;
        border-radius: 12px;
        padding: 11px 16px;
        font-weight: 700;
        transition: .25s ease;
    }

    .btn-filter {
        background: #fff;
        color: var(--text);
        border: 1px solid var(--border);
        box-shadow: var(--shadow-sm);
    }

    .btn-filter:hover {
        border-color: var(--green);
        color: var(--green);
        transform: translateY(-2px);
    }

    .btn-print {
        background: var(--dark);
        color: #fff;
        box-shadow: 0 8px 20px rgba(15, 23, 42, .15);
    }

    .btn-print:hover {
        background: #1e293b;
        color: #fff;
        transform: translateY(-2px);
    }

    /* =========================================================
       STAT CARDS
    ========================================================= */

    .stat-card {
        position: relative;
        height: 100%;
        overflow: hidden;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: var(--card-radius);
        padding: 25px;
        box-shadow: var(--shadow-sm);
        transition: .3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        right: -65px;
        bottom: -65px;
        background: rgba(25, 135, 84, .04);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .stat-label {
        font-size: 11px;
        font-weight: 800;
        color: var(--muted);
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .stat-number {
        color: var(--dark);
        font-size: 2.25rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: -1px;
        margin: 10px 0;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .icon-star {
        color: #d97706;
        background: #fff7df;
    }

    .icon-review {
        color: #2563eb;
        background: #eff6ff;
    }

    .icon-positive {
        color: #15803d;
        background: #ecfdf3;
    }

    .rating-number {
        display: flex;
        align-items: baseline;
        gap: 8px;
    }

    .rating-number .out-of {
        color: var(--muted);
        font-size: 14px;
        font-weight: 600;
    }

    .stars-large {
        color: #f59e0b;
        letter-spacing: 2px;
        margin-bottom: 8px;
    }

    .stat-footer {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--muted);
        font-size: 12px;
    }

    .trend-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #ecfdf3;
        color: #15803d;
        border-radius: 999px;
        padding: 5px 9px;
        font-size: 11px;
        font-weight: 800;
    }

    /* =========================================================
       PANELS
    ========================================================= */

    .panel {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: var(--card-radius);
        box-shadow: var(--shadow-sm);
        height: 100%;
        overflow: hidden;
    }

    .panel-body {
        padding: 25px;
    }

    .panel-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 25px;
    }

    .panel-title {
        font-size: 16px;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
    }

    .panel-description {
        color: var(--muted);
        font-size: 12px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    /* =========================================================
       RATING DISTRIBUTION
    ========================================================= */

    .rating-row {
        display: grid;
        grid-template-columns: 54px 1fr 45px;
        gap: 12px;
        align-items: center;
        margin-bottom: 17px;
    }

    .rating-label {
        color: var(--text);
        font-size: 13px;
        font-weight: 700;
    }

    .rating-label i {
        color: #f59e0b;
        font-size: 10px;
    }

    .rating-count {
        text-align: right;
        font-size: 13px;
        font-weight: 800;
        color: var(--dark);
    }

    .rating-progress {
        height: 9px;
        background: #f1f5f9;
        border-radius: 999px;
        overflow: hidden;
    }

    .rating-progress .progress-bar {
        border-radius: 999px;
        transition: width 1s ease;
    }

    .bar-5 {
        background: linear-gradient(90deg, #16a34a, #4ade80);
    }

    .bar-4 {
        background: linear-gradient(90deg, #0ea5e9, #38bdf8);
    }

    .bar-3 {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .bar-2 {
        background: linear-gradient(90deg, #94a3b8, #cbd5e1);
    }

    .bar-1 {
        background: linear-gradient(90deg, #ef4444, #fb7185);
    }

    .distribution-footer {
        margin-top: 25px;
        padding-top: 18px;
        border-top: 1px dashed var(--border);
        display: flex;
        justify-content: space-between;
        color: var(--muted);
        font-size: 12px;
    }

    .distribution-footer strong {
        color: var(--dark);
    }

    /* =========================================================
       VOLUME OVERVIEW
    ========================================================= */

    .metric-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .metric-tile {
        position: relative;
        padding: 18px;
        border-radius: 16px;
        border: 1px solid var(--border);
        background: linear-gradient(135deg, #fafafa, #ffffff);
        transition: .25s ease;
        overflow: hidden;
    }

    .metric-tile:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-sm);
        border-color: #d1d5db;
    }

    .metric-tile::before {
        content: "";
        position: absolute;
        width: 6px;
        height: 100%;
        left: 0;
        top: 0;
        background: var(--green);
        opacity: .85;
    }

    .metric-tile.blue::before {
        background: var(--blue);
    }

    .metric-tile.orange::before {
        background: var(--orange);
    }

    .metric-tile.red::before {
        background: var(--red);
    }

    .metric-name {
        color: var(--muted);
        font-size: 12px;
        font-weight: 600;
    }

    .metric-value {
        color: var(--dark);
        font-size: 25px;
        font-weight: 800;
        margin-top: 7px;
    }

    .metric-status {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 800;
    }

    .status-excellent {
        color: #15803d;
        background: #dcfce7;
    }

    .status-good {
        color: #0369a1;
        background: #e0f2fe;
    }

    .status-average {
        color: #b45309;
        background: #fef3c7;
    }

    .status-critical {
        color: #b91c1c;
        background: #fee2e2;
    }

    /* =========================================================
       REVIEWS SECTION
    ========================================================= */

    .reviews-panel {
        margin-top: 24px;
    }

    .reviews-toolbar {
        padding: 25px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(to right, #fff, #fbfdfc);
    }

    .reviews-toolbar-title {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .reviews-title-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        color: var(--green);
        background: var(--green-light);
    }

    .review-filter {
        min-width: 170px;
        border-radius: 11px;
        border-color: var(--border);
        font-size: 13px;
        font-weight: 600;
        padding: 10px 13px;
    }

    .review-filter:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 .2rem rgba(25, 135, 84, .10);
    }

    .reviews-list {
        padding: 25px;
    }

    /* =========================================================
       REVIEW CARD
    ========================================================= */

    .review-card {
        position: relative;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 17px;
        padding: 20px;
        transition: .28s ease;
    }

    .review-card:hover {
        transform: translateY(-3px);
        border-color: rgba(25, 135, 84, .25);
        box-shadow: var(--shadow-md);
    }

    .review-card + .review-card {
        margin-top: 14px;
    }

    .review-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 18px;
        bottom: 18px;
        width: 3px;
        border-radius: 0 4px 4px 0;
        background: var(--green);
        opacity: 0;
        transition: .25s ease;
    }

    .review-card:hover::before {
        opacity: 1;
    }

    .review-layout {
        display: flex;
        gap: 17px;
    }

    .avatar {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 15px;
        background: linear-gradient(135deg, #198754, #0f6b40);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 800;
        box-shadow: 0 7px 16px rgba(25, 135, 84, .18);
    }

    .review-main {
        flex: 1;
        min-width: 0;
    }

    .review-top {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        align-items: flex-start;
    }

    .reviewer-name {
        color: var(--dark);
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .review-stars {
        color: #f59e0b;
        font-size: 11px;
        letter-spacing: 1px;
    }

    .review-stars .empty {
        color: #dbe1e8;
    }

    .review-date {
        color: #94a3b8;
        font-size: 11px;
        white-space: nowrap;
    }

    .review-comment {
        color: #475569;
        font-size: 13px;
        line-height: 1.75;
        margin: 13px 0 15px;
    }

    .review-comment::before {
        content: "“";
        font-size: 22px;
        font-weight: 800;
        color: #cbd5e1;
        margin-right: 2px;
    }

    .review-comment::after {
        content: "”";
        font-size: 22px;
        font-weight: 800;
        color: #cbd5e1;
        margin-left: 2px;
    }

    .product-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 9px;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        color: #166534;
        font-size: 10px;
        font-weight: 800;
    }

    .verified-tag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-left: 6px;
        padding: 5px 8px;
        border-radius: 999px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 9px;
        font-weight: 800;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        text-align: center;
        padding: 65px 20px;
    }

    .empty-icon {
        width: 76px;
        height: 76px;
        margin: 0 auto 18px;
        border-radius: 22px;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .empty-title {
        color: var(--dark);
        font-size: 16px;
        font-weight: 800;
    }

    .empty-text {
        color: var(--muted);
        font-size: 13px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991.98px) {
        .report-wrapper {
            padding: 22px;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn {
            flex: 1;
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
        }

        .report-wrapper {
            padding: 15px;
        }

        .report-header {
            padding: 22px;
            border-radius: 18px;
        }

        .stat-card,
        .panel {
            border-radius: 17px;
        }

        .metric-grid {
            grid-template-columns: 1fr;
        }

        .reviews-toolbar {
            padding: 20px;
        }

        .reviews-list {
            padding: 15px;
        }

        .review-layout {
            gap: 12px;
        }

        .review-top {
            flex-direction: column;
            gap: 7px;
        }

        .review-date {
            white-space: normal;
        }
    }

    @media print {
        body {
            background: #fff;
        }

        .no-print {
            display: none !important;
        }

        .main-content {
            margin-left: 0;
        }

        .report-wrapper {
            padding: 0;
            max-width: 100%;
        }

        .report-header,
        .stat-card,
        .panel,
        .review-card {
            box-shadow: none !important;
            break-inside: avoid;
        }

        .sidebar {
            display: none !important;
        }
    }

    /* =========================================================
       ANIMATION
    ========================================================= */

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

    .animate {
        animation: fadeUp .55s ease both;
    }

    .delay-1 {
        animation-delay: .08s;
    }

    .delay-2 {
        animation-delay: .16s;
    }

    .delay-3 {
        animation-delay: .24s;
    }
</style>

</head>

<body>

<!-- =========================================================
     SIDEBAR
     DO NOT CHANGE
========================================================= -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between">
    <div>
        <!-- Farm Logo -->
        <div class="text-center py-2 mb-2">
            <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                 alt="Farm Logo" class="img-fluid rounded-circle shadow-sm" style="max-width: 120px; background: white; padding: 5px;">
        </div>

        <hr class="border-light opacity-25">

        <!-- Nav Links -->
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

            <!-- Categories -->
            <li class="nav-item my-1">
                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm" style="font-size: 0.75rem; letter-spacing: 1px;">
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
                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm" style="font-size: 0.75rem; letter-spacing: 1px;">
                    Other
                </div>

                <a href="{{ route('sales.report') }}" class="nav-link sub-nav-link d-flex align-items-center">
                    <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                    <span>របាយការណ៍ការលក់</span>
                </a>
            </li>

            <li>
                <a href="{{ route('report') }}" class="nav-link sub-nav-link d-flex align-items-center {{ request()->routeIs('report*') ? 'active' : '' }}">
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

    <!-- User Profile & Logout -->
    <div class="border-top border-light border-opacity-25 pt-3 mt-3">
        <div class="d-flex align-items-center mb-3 px-2">
            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>
            <div class="lh-sm text-truncate">
                <div class="fw-bold text-white text-truncate">{{ Auth::user()->name }}</div>
                <small class="text-white-50">{{ Auth::user()->role }}</small>
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

    <div class="report-wrapper">

        <!-- HEADER -->
        <header class="report-header animate">

            <div class="header-content d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">

                <div>
                    <div class="eyebrow">
                        <i class="fa-solid fa-chart-simple"></i>
                        Customer Insights
                    </div>

                    <h1 class="report-title">
                        Customer Review Report
                    </h1>

                    <p class="report-subtitle">
                        Monitor customer satisfaction, ratings, feedback and product experience.
                    </p>
                </div>

                <div class="header-actions d-flex gap-2 no-print">

                    <button class="btn btn-premium btn-filter">
                        <i class="fa-solid fa-sliders me-2"></i>
                        Filter
                    </button>

                    <button class="btn btn-premium btn-print"
                        onclick="window.print()">
                        <i class="fa-solid fa-print me-2"></i>
                        Print Report
                    </button>

                </div>

            </div>

        </header>


        <!-- =====================================================
             STATISTICS
        ====================================================== -->

        <section class="row g-4 mb-4">

            <!-- Average Rating -->
            <div class="col-xl-4 col-md-6 animate delay-1">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>

                            <div class="stat-label">
                                Average Rating
                            </div>

                            <div class="rating-number">
                                <div class="stat-number">
                                    {{ number_format($averageRating, 1) }}
                                </div>

                                <span class="out-of">
                                    / 5.0
                                </span>
                            </div>

                            <div class="stars-large">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($averageRating))
                                        <i class="fa-solid fa-star"></i>
                                    @elseif($i - 0.5 <= $averageRating)
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                            </div>

                            <div class="stat-footer">
                                <i class="fa-solid fa-circle-check text-success"></i>
                                Based on
                                <strong class="text-dark">
                                    {{ $reviews->count() }}
                                </strong>
                                reviews
                            </div>

                        </div>

                        <div class="stat-icon icon-star">
                            <i class="fa-solid fa-star"></i>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Total Reviews -->
            <div class="col-xl-4 col-md-6 animate delay-2">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>

                            <div class="stat-label">
                                Total Reviews
                            </div>

                            <div class="stat-number">
                                {{ $reviews->count() }}
                            </div>

                            <div class="stat-footer">

                                <span class="trend-badge">
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                    12.5%
                                </span>

                                <span>
                                    vs last month
                                </span>

                            </div>

                        </div>

                        <div class="stat-icon icon-review">
                            <i class="fa-solid fa-comments"></i>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Positive Satisfaction -->
            <div class="col-xl-4 col-md-12 animate delay-3">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>

                            <div class="stat-label">
                                Positive Satisfaction
                            </div>

                            <div class="stat-number">
                                {{ $starCounts[5] + $starCounts[4] }}
                            </div>

                            <div class="stat-footer">

                                <span class="trend-badge">
                                    {{ $total > 0 ? number_format(($starCounts[5] + $starCounts[4]) / $total * 100, 1) : 0 }}%
                                </span>

                                <span>
                                    4 & 5 star reviews
                                </span>

                            </div>

                        </div>

                        <div class="stat-icon icon-positive">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             ANALYTICS
        ====================================================== -->

        <section class="row g-4 mb-4">

            <!-- Distribution -->
            <div class="col-lg-5 animate">

                <div class="panel">

                    <div class="panel-body">

                        <div class="panel-heading">

                            <div>
                                <h5 class="panel-title">
                                    Rating Distribution
                                </h5>

                                <p class="panel-description">
                                    Breakdown of customer ratings
                                </p>
                            </div>

                            <div class="text-warning">
                                <i class="fa-solid fa-chart-column"></i>
                            </div>

                        </div>


                        <!-- 5 -->
                        <div class="rating-row">

                            <div class="rating-label">
                                5 <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="rating-progress">
                                <div class="progress-bar bar-5"
                                    style="width: {{ $total > 0 ? number_format($starCounts[5] / $total * 100, 1) : 0 }}%;">
                                </div>
                            </div>

                            <div class="rating-count">
                                {{ $starCounts[5] }}
                            </div>

                        </div>


                        <!-- 4 -->
                        <div class="rating-row">

                            <div class="rating-label">
                                4 <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="rating-progress">
                                <div class="progress-bar bar-4"
                                    style="width: {{ $total > 0 ? number_format($starCounts[4] / $total * 100, 1) : 0 }}%;">
                                </div>
                            </div>

                            <div class="rating-count">
                                {{ $starCounts[4] }}
                            </div>

                        </div>


                        <!-- 3 -->
                        <div class="rating-row">

                            <div class="rating-label">
                                3 <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="rating-progress">
                                <div class="progress-bar bar-3"
                                    style="width: {{ $total > 0 ? number_format($starCounts[3] / $total * 100, 1) : 0 }}%;">
                                </div>
                            </div>

                            <div class="rating-count">
                                {{ $starCounts[3] }}
                            </div>

                        </div>


                        <!-- 2 -->
                        <div class="rating-row">

                            <div class="rating-label">
                                2 <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="rating-progress">
                                <div class="progress-bar bar-2"
                                    style="width: {{ $total > 0 ? number_format($starCounts[2] / $total * 100, 1) : 0 }}%;">
                                </div>
                            </div>

                            <div class="rating-count">
                                {{ $starCounts[2] }}
                            </div>

                        </div>


                        <!-- 1 -->
                        <div class="rating-row mb-0">

                            <div class="rating-label">
                                1 <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="rating-progress">
                                <div class="progress-bar bar-1"
                                    style="width: {{ $total > 0 ? number_format($starCounts[1] / $total * 100, 1) : 0 }}%;">
                                </div>
                            </div>

                            <div class="rating-count">
                                {{ $starCounts[1] }}
                            </div>

                        </div>


                        <div class="distribution-footer">

                            <span>
                                Total ratings
                            </span>

                            <strong>
                                {{ $total }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Volume -->
            <div class="col-lg-7 animate delay-1">

                <div class="panel">

                    <div class="panel-body">

                        <div class="panel-heading">

                            <div>
                                <h5 class="panel-title">
                                    Review Overview
                                </h5>

                                <p class="panel-description">
                                    Performance by rating level
                                </p>
                            </div>

                            <div class="text-success">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>

                        </div>


                        <div class="metric-grid">

                            <!-- 5 -->
                            <div class="metric-tile">

                                <div class="metric-name">
                                    5 Star Reviews
                                </div>

                                <div class="d-flex justify-content-between align-items-end">

                                    <div class="metric-value">
                                        {{ $starCounts[5] }}
                                    </div>

                                    <span class="metric-status status-excellent">
                                        Excellent
                                    </span>

                                </div>

                            </div>


                            <!-- 4 -->
                            <div class="metric-tile blue">

                                <div class="metric-name">
                                    4 Star Reviews
                                </div>

                                <div class="d-flex justify-content-between align-items-end">

                                    <div class="metric-value">
                                        {{ $starCounts[4] }}
                                    </div>

                                    <span class="metric-status status-good">
                                        Good
                                    </span>

                                </div>

                            </div>


                            <!-- 3 -->
                            <div class="metric-tile orange">

                                <div class="metric-name">
                                    3 Star Reviews
                                </div>

                                <div class="d-flex justify-content-between align-items-end">

                                    <div class="metric-value">
                                        {{ $starCounts[3] }}
                                    </div>

                                    <span class="metric-status status-average">
                                        Average
                                    </span>

                                </div>

                            </div>


                            <!-- 1-2 -->
                            <div class="metric-tile red">

                                <div class="metric-name">
                                    1–2 Star Reviews
                                </div>

                                <div class="d-flex justify-content-between align-items-end">

                                    <div class="metric-value">
                                        {{ $starCounts[1] + $starCounts[2] }}
                                    </div>

                                    <span class="metric-status status-critical">
                                        Critical
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             CUSTOMER REVIEWS
        ====================================================== -->

        <section class="panel reviews-panel animate">

            <!-- Toolbar -->

            <div class="reviews-toolbar">

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">

                    <div class="reviews-toolbar-title">

                        <div class="reviews-title-icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>

                        <div>

                            <h5 class="panel-title">
                                Customer Comments
                            </h5>

                            <p class="panel-description">
                                Latest feedback from your customers
                            </p>

                        </div>

                    </div>


                    <div class="d-flex gap-2 no-print">

                        <select id="ratingFilter"
                            class="form-select review-filter">

                            <option value="all" selected>
                                All Ratings
                            </option>

                            <option value="5">
                                ★★★★★ 5 Stars
                            </option>

                            <option value="4">
                                ★★★★ 4 Stars
                            </option>

                            <option value="3">
                                ★★★ 3 Stars
                            </option>

                            <option value="2">
                                ★★ 2 Stars
                            </option>

                            <option value="1">
                                ★ 1 Star
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!-- Reviews -->

            <div class="reviews-list">

                @forelse ($reviews as $review)

                    <article class="review-card"
                        data-rating="{{ $review->rating }}">

                        <div class="review-layout">

                            <!-- Avatar -->

                            <div class="avatar">
                                {{ strtoupper(mb_substr($review->user_name ?: 'A', 0, 1)) }}
                            </div>


                            <div class="review-main">

                                <div class="review-top">

                                    <div>

                                        <div class="reviewer-name">

                                            {{ $review->user_name ?: 'Anonymous' }}

                                            <span class="verified-tag">
                                                <i class="fa-solid fa-check"></i>
                                                Customer
                                            </span>

                                        </div>

                                        <div class="review-stars">

                                            @for($i = 1; $i <= 5; $i++)

                                                @if($i <= $review->rating)

                                                    <i class="fa-solid fa-star"></i>

                                                @else

                                                    <i class="fa-solid fa-star empty"></i>

                                                @endif

                                            @endfor

                                        </div>

                                    </div>


                                    <time class="review-date">

                                        <i class="fa-regular fa-calendar me-1"></i>

                                        {{ $review->created_at->format('d M Y') }}

                                    </time>

                                </div>


                                <p class="review-comment">
                                    {{ $review->comment }}
                                </p>


                                <div>

                                    <span class="product-tag">

                                        <i class="fa-solid fa-box-open"></i>

                                        {{ ucfirst($review->product_type) }}

                                        @if ($review->product_id)

                                            <span class="opacity-50">
                                                #{{ $review->product_id }}
                                            </span>

                                        @endif

                                    </span>

                                </div>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="fa-regular fa-comment-dots"></i>

                        </div>

                        <div class="empty-title">
                            No Customer Feedback
                        </div>

                        <p class="empty-text">
                            Customer reviews will appear here once they are submitted.
                        </p>

                    </div>

                @endforelse


                <!-- No filter results -->

                <div id="noReviews"
                    class="empty-state d-none">

                    <div class="empty-icon">

                        <i class="fa-solid fa-filter-circle-xmark"></i>

                    </div>

                    <div class="empty-title">
                        No Reviews Found
                    </div>

                    <p class="empty-text">
                        There are no reviews matching this rating.
                    </p>

                </div>

            </div>

        </section>


        <!-- FOOTER -->

        <div class="d-flex justify-content-between align-items-center mt-4 px-1">

            <small class="text-muted">
                <i class="fa-solid fa-shield-halved me-1"></i>
                Customer feedback analytics
            </small>

            <small class="text-muted">
                Total {{ $reviews->count() }} reviews
            </small>

        </div>

    </div>

</main>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

    /* Rating Filter */

    const ratingFilter = document.getElementById('ratingFilter');
    const reviewCards = document.querySelectorAll('.review-card');
    const noReviews = document.getElementById('noReviews');

    if (ratingFilter) {

        ratingFilter.addEventListener('change', function () {

            const selected = this.value;

            let visible = 0;

            reviewCards.forEach(card => {

                const rating = card.dataset.rating;

                if (selected === 'all' || rating === selected) {

                    card.style.display = '';

                    visible++;

                } else {

                    card.style.display = 'none';

                }

            });

            if (noReviews) {

                noReviews.classList.toggle(
                    'd-none',
                    visible !== 0
                );

            }

        });

    }


    /* Animate rating bars */

    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.progress-bar').forEach(bar => {

            const width = bar.style.width;

            bar.style.width = '0%';

            setTimeout(() => {

                bar.style.width = width;

            }, 250);

        });

    });

</script>


</body>

</html>
