<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delivery Orders | Farm Fresh</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Kantumruy Pro', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(25, 135, 84, .08), transparent 30%),
                #f5f7f9;
            color: #1e293b;
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
            background: linear-gradient(
                135deg,
                #ffffff 0%,
                #f8fffb 100%
            );
            border: 1px solid #e7ece9;
            border-radius: 22px;
            padding: 25px 28px;
            box-shadow: 0 10px 35px rgba(15, 23, 42, .06);
            overflow: hidden;
        }

        .page-header::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -70px;
            top: -90px;
            background: rgba(25, 135, 84, .07);
            border-radius: 50%;
        }

        .header-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #198754, #20a36a);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 8px 20px rgba(25, 135, 84, .25);
        }

        .page-title {
            font-size: 1.65rem;
            font-weight: 800;
            color: #17251d;
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: #718096;
            font-size: .9rem;
        }


        /* =========================================================
           HEADER ACTIONS
        ========================================================= */

        .filter-box {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            padding: 5px 8px 5px 12px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
        }

        .filter-box select {
            border: 0;
            box-shadow: none !important;
            font-size: .82rem;
            font-weight: 600;
            color: #334155;
            background-color: transparent;
        }

        .dashboard-btn {
            border-radius: 13px;
            padding: 10px 15px;
            font-weight: 700;
            border: 1px solid #dbe3df;
            background: white;
            color: #475569;
            transition: .2s;
        }

        .dashboard-btn:hover {
            background: #198754;
            color: white;
            border-color: #198754;
            transform: translateY(-2px);
        }


        /* =========================================================
           SUMMARY CARDS
        ========================================================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin: 22px 0;
        }

        .summary-card {
            position: relative;
            background: #fff;
            border: 1px solid #e7ece9;
            border-radius: 18px;
            padding: 20px;
            min-height: 128px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .045);
            transition: all .25s ease;
        }

        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 35px rgba(15, 23, 42, .08);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -35px;
            bottom: -40px;
            background: rgba(25, 135, 84, .06);
            border-radius: 50%;
        }

        .summary-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #ecfdf5;
            color: #198754;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .summary-label {
            color: #7b8794;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .summary-number {
            font-size: 1.65rem;
            font-weight: 800;
            color: #17251d;
            line-height: 1.2;
        }

        .summary-description {
            font-size: .75rem;
            color: #94a3b8;
        }

        .summary-card.pending .summary-icon {
            background: #fff7ed;
            color: #ea580c;
        }

        .summary-card.accepted .summary-icon {
            background: #eff6ff;
            color: #2563eb;
        }

        .summary-card.completed .summary-icon {
            background: #ecfdf5;
            color: #059669;
        }


        /* =========================================================
           CONTENT CARD
        ========================================================= */

        .orders-card {
            background: #fff;
            border: 1px solid #e5ebe7;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .055);
        }

        .orders-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #edf1ef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .orders-title {
            font-size: 1rem;
            font-weight: 800;
            color: #17251d;
            margin: 0;
        }

        .orders-subtitle {
            font-size: .78rem;
            color: #94a3b8;
            margin-top: 3px;
        }

        .live-indicator {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            background: #f0fdf4;
            border: 1px solid #dcfce7;
            border-radius: 30px;
            color: #15803d;
            font-size: .72rem;
            font-weight: 700;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 0 4px rgba(34,197,94,.12);
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table-wrap {
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            min-width: 1100px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .orders-table thead th {
            background: #f8faf9;
            color: #64748b;
            font-size: .68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .07em;
            padding: 14px 18px;
            border-bottom: 1px solid #e8eeeb;
            white-space: nowrap;
        }

        .orders-table tbody td {
            padding: 18px;
            border-bottom: 1px solid #f0f3f2;
            vertical-align: middle;
            font-size: .84rem;
        }

        .orders-table tbody tr {
            transition: all .2s ease;
        }

        .orders-table tbody tr:hover {
            background: #fbfefc;
        }

        .orders-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           ORDER ID
        ========================================================= */

        .order-id {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #f1f8f4;
            color: #16734a;
            border-radius: 9px;
            padding: 6px 9px;
            font-size: .78rem;
            font-weight: 800;
        }

        .order-date {
            display: block;
            color: #94a3b8;
            font-size: .7rem;
            margin-top: 7px;
        }


        /* =========================================================
           CUSTOMER
        ========================================================= */

        .customer-name {
            color: #17251d;
            font-weight: 750;
            margin-bottom: 5px;
        }

        .customer-detail {
            color: #7c8996;
            font-size: .73rem;
            margin-top: 3px;
            display: flex;
            align-items: flex-start;
            gap: 6px;
        }

        .customer-detail i {
            color: #198754;
            margin-top: 2px;
        }

        .address-text {
            max-width: 230px;
            line-height: 1.4;
        }


        /* =========================================================
           ITEMS
        ========================================================= */

        .item-row {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 5px 0;
        }

        .item-row + .item-row {
            border-top: 1px dashed #e5e9e7;
            margin-top: 5px;
            padding-top: 9px;
        }

        .item-icon {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #f0fdf4;
            color: #198754;
            font-size: .75rem;
        }

        .item-name {
            font-weight: 700;
            color: #334155;
            font-size: .78rem;
        }

        .item-meta {
            color: #94a3b8;
            font-size: .67rem;
            margin-top: 2px;
        }

        .category-badge {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #64748b;
            border-radius: 5px;
            padding: 2px 5px;
            font-size: .62rem;
            font-weight: 700;
        }


        /* =========================================================
           DELIVERY DATE
        ========================================================= */

        .delivery-date {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 10px;
            background: #f8fafc;
            border: 1px solid #e9eef2;
            border-radius: 9px;
            color: #475569;
            font-size: .72rem;
            font-weight: 700;
        }

        .delivery-date i {
            color: #198754;
        }


        /* =========================================================
           PRICE
        ========================================================= */

        .price {
            font-size: 1rem;
            font-weight: 850;
            color: #16804e;
            white-space: nowrap;
        }

        .price-label {
            display: block;
            color: #a0aab5;
            font-size: .64rem;
            margin-top: 2px;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border-radius: 30px;
            padding: 7px 11px;
            font-size: .7rem;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-pill.waiting {
            color: #b45309;
            background: #fff7ed;
            border: 1px solid #fed7aa;
        }

        .status-pill.accepted {
            color: #1d4ed8;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }

        .status-pill.completed {
            color: #047857;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }


        /* =========================================================
           PAID BADGE
        ========================================================= */

        .paid-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 9px;
            border-radius: 20px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: .65rem;
            font-weight: 800;
            margin-top: 6px;
        }

        .paid-badge i {
            font-size: .7rem;
        }


        /* =========================================================
           STATUS SELECT
        ========================================================= */

        .status-control {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .status-control select {
            appearance: none;
            -webkit-appearance: none;
            min-width: 142px;
            padding: 9px 32px 9px 12px;
            border-radius: 10px;
            outline: none;
            cursor: pointer;
            font-size: .72rem;
            font-weight: 800;
            transition: .2s;
        }

        .status-control select:hover {
            transform: translateY(-1px);
        }

        .status-control i {
            position: absolute;
            right: 11px;
            pointer-events: none;
            font-size: .65rem;
        }

        .status-control select.status-waiting {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #b45309;
        }

        .status-control select.status-accepted {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
        }

        .status-control select.status-completed {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #047857;
        }


        /* =========================================================
           QUICK PAID BUTTON
        ========================================================= */

        .quick-paid-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
            padding: 7px 12px;
            border-radius: 9px;
            border: 1px solid #bbf7d0;
            background: #ecfdf5;
            color: #047857;
            font-size: .68rem;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .quick-paid-btn:hover {
            background: #047857;
            color: white;
            border-color: #047857;
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(4,120,87,.2);
        }

        .quick-paid-btn i {
            font-size: .75rem;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding: 75px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: #f1f5f9;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-title {
            font-weight: 800;
            color: #475569;
            margin-bottom: 5px;
        }

        .empty-text {
            color: #94a3b8;
            font-size: .82rem;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .success-alert {
            border: 0;
            background: #ecfdf5;
            color: #047857;
            border-left: 4px solid #10b981;
            border-radius: 13px;
            box-shadow: 0 7px 22px rgba(16,185,129,.08);
            padding: 14px 17px;
            font-size: .82rem;
            font-weight: 600;
        }


        /* =========================================================
           PAGINATION
        ========================================================= */

        .pagination {
            margin: 0;
        }

        .pagination .page-link {
            border: 1px solid #e2e8f0;
            color: #64748b;
            background: white;
            margin: 0 3px;
            border-radius: 9px !important;
            font-size: .75rem;
            font-weight: 700;
            padding: 8px 12px;
        }

        .pagination .page-item.active .page-link {
            background: #198754;
            border-color: #198754;
            color: white;
        }

        .pagination .page-link:hover {
            background: #f0fdf4;
            color: #198754;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                padding: 20px;
            }

            .header-actions {
                width: 100%;
            }

            .filter-box,
            .dashboard-btn {
                flex: 1;
            }

            .orders-card-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>

</head>

<body>

<!-- ============================================================
     SIDEBAR
     ============================================================ -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between">

<div>

    <!-- Farm Logo -->
    <div class="text-center py-2 mb-2">
        <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
             alt="Farm Logo"
             class="img-fluid rounded-circle shadow-sm"
             style="max-width: 120px; background: white; padding: 5px;">
    </div>

    <hr class="border-light opacity-25">

    <!-- Nav Links -->
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link d-flex align-items-center">
                <i class="bi bi-speedometer2 me-2 fs-5"></i>
                ផ្ទាំងដើម
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('Arable_lands') }}"
               class="nav-link d-flex align-items-center">
                <i class="bi bi-bounding-box-circles me-2 fs-5"></i>
                ផ្ទៃដីដាំដុះ
            </a>
        </li>

        <li class="nav-item my-1">

            <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm"
                 style="font-size: 0.75rem; letter-spacing: 1px;">
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
                    <a href="{{ route('Fresh_Nut') }}"
                       class="nav-link sub-nav-link d-flex align-items-center">
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
                    <a href="{{ route('Fruit') }}"
                       class="nav-link sub-nav-link d-flex align-items-center">
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

            <div class="px-3 py-2 text-uppercase text-white-50 fw-bold style-sm"
                 style="font-size: 0.75rem; letter-spacing: 1px;">
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
               class="nav-link sub-nav-link d-flex align-items-center {{ request()->routeIs('delivery*') ? 'active' : '' }}">

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

<!-- User -->
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

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->

<main class="main-content">


<!-- PAGE HEADER -->
<div class="page-header mb-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 position-relative"
         style="z-index:2;">

        <div class="d-flex align-items-center gap-3">

            <div class="header-icon">
                <i class="bi bi-truck"></i>
            </div>

            <div>

                <h1 class="page-title">
                    Orders
                </h1>

                <div class="page-subtitle">
                    Manage, track and update customer deliveries from one place.
                </div>

            </div>

        </div>


        <div class="d-flex align-items-center gap-2 flex-wrap header-actions">

            <form method="GET"
                  action="{{ route('delivery.index') }}"
                  class="filter-box d-flex align-items-center">

                <i class="bi bi-funnel text-success me-2"></i>

                <select name="status"
                        onchange="this.form.submit()"
                        aria-label="Filter orders">

                    <option value="">
                        All Orders
                    </option>

                    <option value="waiting"
                        {{ ($status ?? '') === 'waiting' ? 'selected' : '' }}>
                        Waiting
                    </option>

                    <option value="accepted"
                        {{ ($status ?? '') === 'accepted' ? 'selected' : '' }}>
                        Accepted
                    </option>

                    <option value="completed"
                        {{ ($status ?? '') === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </form>


            <a href="{{ route('dashboard') }}"
               class="dashboard-btn text-decoration-none">

                <i class="bi bi-grid me-1"></i>
                Dashboard

            </a>

        </div>

    </div>

</div>


<!-- SUCCESS ALERT -->

@if (session('success'))

    <div class="alert success-alert alert-dismissible fade show mb-4"
         role="alert">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


<!-- ========================================================
     SUMMARY
     ======================================================== -->

@php

    $totalOrders = $groupedOrders->count();

    $waitingOrders = $groupedOrders->filter(function ($group) {
        return $group->every(fn ($order) =>
            $order->delivery_status === 'waiting'
        );
    })->count();

    $acceptedOrders = $groupedOrders->filter(function ($group) {

        $allCompleted = $group->every(fn ($order) =>
            $order->delivery_status === 'completed'
        );

        $allAccepted = !$allCompleted &&
            $group->every(fn ($order) =>
                in_array(
                    $order->delivery_status,
                    ['accepted', 'completed'],
                    true
                )
            );

        return $allAccepted;

    })->count();

    $completedOrders = $groupedOrders->filter(function ($group) {

        return $group->every(fn ($order) =>
            $order->delivery_status === 'completed'
        );

    })->count();

@endphp


<div class="summary-grid">

    <!-- Total -->
    <div class="summary-card">

        <div class="summary-icon">
            <i class="bi bi-box-seam"></i>
        </div>

        <div class="summary-label">
            Total Orders
        </div>

        <div class="summary-number">
            {{ $totalOrders }}
        </div>

        <div class="summary-description">
            Customer orders
        </div>

    </div>


    <!-- Waiting -->
    <div class="summary-card pending">

        <div class="summary-icon">
            <i class="bi bi-hourglass-split"></i>
        </div>

        <div class="summary-label">
            Waiting
        </div>

        <div class="summary-number">
            {{ $waitingOrders }}
        </div>

        <div class="summary-description">
            Need attention
        </div>

    </div>


    <!-- Accepted -->
    <div class="summary-card accepted">

        <div class="summary-icon">
            <i class="bi bi-truck"></i>
        </div>

        <div class="summary-label">
            Accepted
        </div>

        <div class="summary-number">
            {{ $acceptedOrders }}
        </div>

        <div class="summary-description">
            Being prepared
        </div>

    </div>


    <!-- Completed -->
    <div class="summary-card completed">

        <div class="summary-icon">
            <i class="bi bi-check2-circle"></i>
        </div>

        <div class="summary-label">
            Completed
        </div>

        <div class="summary-number">
            {{ $completedOrders }}
        </div>

        <div class="summary-description">
            Successfully delivered
        </div>

    </div>

</div>


<!-- ========================================================
     ORDERS CARD
     ======================================================== -->

<div class="orders-card">

    <div class="orders-card-header">

        <div>

            <h2 class="orders-title">
                <i class="bi bi-list-check text-success me-2"></i>
                Customer Delivery Orders
            </h2>

            <div class="orders-subtitle">
                Review order details and update delivery progress.
            </div>

        </div>


        <div class="live-indicator">

            <span class="live-dot"></span>

            Order management active

        </div>

    </div>


    <!-- TABLE -->

    <div class="table-wrap">

        <table class="orders-table">

            <thead>

                <tr>

                    <th>
                        Order
                    </th>

                    <th>
                        Customer
                    </th>

                    <th>
                        Items
                    </th>

                    <th>
                        Delivery
                    </th>

                    <th>
                        Total
                    </th>

                    <th>
                        Status
                    </th>

                    <th class="text-center">
                        Update
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($groupedOrders as $group)

                    @php

                        $firstOrder = $group->first();

                        $allCompleted = $group->every(
                            fn ($order) =>
                            $order->delivery_status === 'completed'
                        );

                        $allAccepted =
                            !$allCompleted &&
                            $group->every(
                                fn ($order) =>
                                in_array(
                                    $order->delivery_status,
                                    ['accepted', 'completed'],
                                    true
                                )
                            );

                        $groupStatus =
                            $allCompleted
                                ? 'completed'
                                : ($allAccepted
                                    ? 'accepted'
                                    : 'waiting');

                        $groupTotal =
                            $group->sum(
                                fn ($order) =>
                                $order->total_price
                            );

                        $statusConfig = [

                            'waiting' => [
                                'class' => 'status-waiting',
                                'label' => 'Waiting',
                                'icon' => 'bi-hourglass-split'
                            ],

                            'accepted' => [
                                'class' => 'status-accepted',
                                'label' => 'Accepted',
                                'icon' => 'bi-truck'
                            ],

                            'completed' => [
                                'class' => 'status-completed',
                                'label' => 'Completed',
                                'icon' => 'bi-check-circle'
                            ],

                        ];

                        $current =
                            $statusConfig[$groupStatus]
                            ?? $statusConfig['waiting'];

                    @endphp


                    <tr>

                        <!-- ORDER -->

                        <td>

                            <span class="order-id">

                                <i class="bi bi-hash"></i>

                                {{ $firstOrder->id }}

                            </span>

                            <span class="order-date">

                                <i class="bi bi-clock me-1"></i>

                                {{ $firstOrder->created_at->format('d M Y, H:i') }}

                            </span>

                            @if ($groupStatus === 'completed')

                                <div class="paid-badge">

                                    <i class="bi bi-patch-check-fill"></i>

                                    Paid

                                </div>

                            @endif

                        </td>


                        <!-- CUSTOMER -->

                        <td>

                            <div class="customer-name">
                                {{ $firstOrder->customer_name }}
                            </div>

                            <div class="customer-detail">

                                <i class="bi bi-telephone"></i>

                                <span>
                                    {{ $firstOrder->customer_phone }}
                                </span>

                            </div>

                            <div class="customer-detail">

                                <i class="bi bi-geo-alt"></i>

                                <span class="address-text"
                                      title="{{ $firstOrder->customer_address }}, {{ $firstOrder->customer_city }}">

                                    {{ $firstOrder->customer_address }},
                                    {{ $firstOrder->customer_city }}

                                </span>

                            </div>

                        </td>


                        <!-- ITEMS -->

                        <td>

                            @foreach ($group as $orderItem)

                                <div class="item-row">

                                    <div class="item-icon">

                                        <i class="bi bi-basket2"></i>

                                    </div>

                                    <div>

                                        <div class="item-name">
                                            {{ $orderItem->item_name }}
                                        </div>

                                        <div class="item-meta">

                                            <span class="category-badge">
                                                {{ $orderItem->category }}
                                            </span>

                                            <span class="ms-1">
                                                Qty {{ $orderItem->quantity }}
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </td>


                        <!-- DELIVERY DATE -->

                        <td>

                            <span class="delivery-date">

                                <i class="bi bi-calendar-event"></i>

                                {{ $firstOrder->delivery_date?->format('d M Y') ?? 'Not scheduled' }}

                            </span>

                        </td>


                        <!-- TOTAL -->

                        <td>

                            <div class="price">
                                ${{ number_format($groupTotal, 2) }}
                            </div>

                            <span class="price-label">
                                Order total
                            </span>

                        </td>


                        <!-- STATUS -->

                        <td>

                            <span class="status-pill {{ $groupStatus }}">

                                <span class="status-dot"></span>

                                {{ $current['label'] }}

                            </span>

                        </td>


                        <!-- UPDATE -->

                        <td class="text-center">

                            <form method="POST"
                                  action="{{ route('delivery.status', $firstOrder) }}">

                                @csrf

                                @method('PUT')

                                <div class="status-control">

                                    <select name="delivery_status"
                                            onchange="this.form.submit()"
                                            class="{{ $current['class'] }}"
                                            aria-label="Update delivery status">

                                        <option value="waiting"
                                            {{ $groupStatus === 'waiting' ? 'selected' : '' }}>
                                            Waiting
                                        </option>

                                        <option value="accepted"
                                            {{ $groupStatus === 'accepted' ? 'selected' : '' }}>
                                            Accepted
                                        </option>

                                        <option value="completed"
                                            {{ $groupStatus === 'completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>

                                    </select>

                                    <i class="bi bi-chevron-down"></i>

                                </div>

                            </form>


                            {{-- QUICK MARK AS PAID & COMPLETED --}}

                            @if ($groupStatus === 'accepted')

                                <form method="POST"
                                      action="{{ route('delivery.status', $firstOrder) }}"
                                      class="d-inline">

                                    @csrf

                                    @method('PUT')

                                    <input type="hidden"
                                           name="delivery_status"
                                           value="completed">

                                    <button type="submit"
                                            class="quick-paid-btn"
                                            title="Mark as paid and completed">

                                        <i class="bi bi-patch-check-fill"></i>

                                        Mark Paid &amp; Complete

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-inbox"></i>

                                </div>

                                <div class="empty-title">
                                    No delivery orders found
                                </div>

                                <div class="empty-text">
                                    New customer checkout orders will appear here.
                                </div>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<!-- PAGINATION -->

@if ($groupedOrders->hasPages())

    <div class="mt-4 d-flex justify-content-end">

        {{ $groupedOrders->links() }}

    </div>

@endif


</main>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>