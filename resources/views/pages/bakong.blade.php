{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Secure Payment — Farm Fresh</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        :root {
            --forest: #102d1b;
            --forest-2: #174126;
            --green: #287346;
            --green-light: #eaf6ed;
            --green-soft: #f5faf6;

            --orange: #e47732;
            --orange-soft: #fff2e8;

            --cream: #f6f8f5;
            --white: #ffffff;

            --text: #142018;
            --muted: #748078;
            --border: #e3e9e4;

            --success: #198754;
            --danger: #dc3545;

            --shadow:
                0 30px 80px rgba(16,45,27,.12);

            --radius: 28px;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background:
                radial-gradient(
                    circle at 10% 5%,
                    rgba(40,115,70,.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 95% 10%,
                    rgba(228,119,50,.09),
                    transparent 24%
                ),
                linear-gradient(
                    180deg,
                    #f8faf8 0%,
                    #f3f6f3 100%
                );

            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 35px 16px;
        }

        /* =====================================================
           PAGE
        ====================================================== */

        .payment-page {
            width: 100%;
            max-width: 1050px;
        }

        .payment-card {
            display: grid;
            grid-template-columns: 390px 1fr;

            background: var(--white);

            border: 1px solid rgba(16,45,27,.06);

            border-radius: var(--radius);

            overflow: hidden;

            box-shadow: var(--shadow);
        }

        /* =====================================================
           LEFT SIDE
        ====================================================== */

        .payment-sidebar {
            position: relative;

            padding: 45px 38px;

            color: white;

            background:
                radial-gradient(
                    circle at 90% 5%,
                    rgba(143,212,157,.18),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 5% 95%,
                    rgba(228,119,50,.14),
                    transparent 30%
                ),
                linear-gradient(
                    145deg,
                    #0b2415,
                    #153a23 55%,
                    #205637
                );

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-glow {
            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            right: -100px;
            top: 170px;

            background:
                radial-gradient(
                    circle,
                    rgba(255,255,255,.08),
                    transparent 70%
                );

            pointer-events: none;
        }

        .brand {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 60px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(255,255,255,.10);

            border: 1px solid rgba(255,255,255,.13);

            font-size: 20px;

            color: #a8dfb5;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.3px;
        }

        .brand-sub {
            display: block;

            color: rgba(255,255,255,.48);

            font-size: 9px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            margin-top: 2px;
        }

        .sidebar-content {
            position: relative;
            z-index: 2;
        }

        .secure-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 11px;

            border-radius: 100px;

            background: rgba(143,212,157,.10);

            border: 1px solid rgba(143,212,157,.18);

            color: #a8dfb5;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: .8px;

            text-transform: uppercase;

            margin-bottom: 20px;
        }

        .secure-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #72d28b;

            box-shadow:
                0 0 0 5px rgba(114,210,139,.10);

            animation: dotPulse 1.8s infinite;
        }

        @keyframes dotPulse {

            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .55;
                transform: scale(.8);
            }

        }

        .sidebar-title {
            font-family: 'Playfair Display', serif;

            font-size: 35px;

            line-height: 1.12;

            margin: 0 0 16px;

            letter-spacing: -.8px;
        }

        .sidebar-text {
            color: rgba(255,255,255,.60);

            font-size: 12px;

            line-height: 1.8;

            margin: 0;

            max-width: 280px;
        }

        .steps {
            margin-top: 40px;
        }

        .step {
            display: flex;

            gap: 14px;

            margin-bottom: 20px;
        }

        .step-number {
            flex: 0 0 31px;

            width: 31px;
            height: 31px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,.08);

            border: 1px solid rgba(255,255,255,.12);

            color: rgba(255,255,255,.75);

            font-size: 11px;

            font-weight: 800;
        }

        .step-title {
            color: white;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 3px;
        }

        .step-text {
            color: rgba(255,255,255,.43);

            font-size: 9.5px;

            line-height: 1.5;
        }

        .sidebar-footer {
            position: relative;
            z-index: 2;

            padding-top: 30px;

            border-top: 1px solid rgba(255,255,255,.09);

            color: rgba(255,255,255,.35);

            font-size: 9px;

            display: flex;
            align-items: center;
            gap: 7px;
        }

        .sidebar-footer i {
            color: #8bd29b;
        }

        /* =====================================================
           RIGHT SIDE
        ====================================================== */

        .payment-main {
            padding: 38px 42px 34px;

            background: #fff;

            text-align: center;
        }

        .main-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 24px;
        }

        .payment-label {
            color: var(--muted);

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;
        }

        .order-badge {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 7px 10px;

            border-radius: 10px;

            background: var(--green-soft);

            color: var(--green);

            font-size: 9px;

            font-weight: 800;
        }

        /* =====================================================
           AMOUNT
        ====================================================== */

        .amount-section {
            margin-bottom: 25px;
        }

        .amount-caption {
            color: var(--muted);

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 4px;
        }

        .amount {
            font-size: 43px;

            line-height: 1;

            font-weight: 800;

            letter-spacing: -2px;

            color: var(--forest);
        }

        .currency {
            font-size: 16px;

            font-weight: 800;

            color: var(--green);

            margin-left: 5px;

            letter-spacing: 0;
        }

        /* =====================================================
           QR
        ====================================================== */

        .qr-area {
            position: relative;

            display: inline-block;

            margin-bottom: 20px;
        }

        .qr-glow {
            position: absolute;

            inset: -25px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(40,115,70,.12),
                    transparent 68%
                );

            pointer-events: none;
        }

        .qr-box {
            position: relative;

            padding: 14px;

            background: white;

            border-radius: 23px;

            border: 1px solid #e4eae5;

            box-shadow:
                0 18px 45px rgba(16,45,27,.10),
                0 3px 10px rgba(16,45,27,.04);
        }

        .qr-box::before {
            content: "";

            position: absolute;

            inset: -1px;

            border-radius: 24px;

            border: 2px solid transparent;

            background:
                linear-gradient(
                    white,
                    white
                ) padding-box,
                linear-gradient(
                    135deg,
                    #287346,
                    #e47732,
                    #287346
                ) border-box;

            pointer-events: none;
        }

        .qr-box img {
            position: relative;

            display: block;

            width: 245px;
            height: 245px;

            object-fit: contain;

            background: white;

            border-radius: 10px;

            image-rendering: pixelated;
        }

        .scan-label {
            display: flex;

            justify-content: center;

            align-items: center;

            gap: 7px;

            color: var(--green);

            font-size: 10px;

            font-weight: 800;

            margin-top: 5px;
        }

        .scan-label i {
            font-size: 13px;
        }

        /* =====================================================
           PAYMENT STATUS
        ====================================================== */

        .status-card {
            display: flex;

            align-items: center;

            gap: 12px;

            text-align: left;

            padding: 13px 15px;

            border-radius: 15px;

            background: #f8faf8;

            border: 1px solid #e8eee9;

            margin: 0 auto 17px;

            max-width: 400px;
        }

        .status-icon {
            width: 37px;
            height: 37px;

            flex: 0 0 37px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--green);

            background: var(--green-light);

            font-size: 16px;
        }

        .status-title {
            font-size: 10px;

            font-weight: 800;

            color: var(--text);

            margin-bottom: 2px;
        }

        .status-text {
            font-size: 9px;

            color: var(--muted);

            line-height: 1.4;
        }

        .status-loading {
            margin-left: auto;

            width: 13px;
            height: 13px;

            border-radius: 50%;

            border: 2px solid #dbe8de;

            border-top-color: var(--green);

            animation: spin .8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* =====================================================
           TIMER
        ====================================================== */

        .timer-row {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            color: var(--muted);

            font-size: 9px;

            font-weight: 700;

            margin-bottom: 18px;
        }

        .timer-pill {
            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 6px 10px;

            border-radius: 9px;

            background: #f4f6f4;

            color: var(--forest);

            font-size: 10px;

            font-weight: 800;

            min-width: 58px;

            justify-content: center;
        }

        .timer-pill.warning {
            background: #fff0f1;

            color: var(--danger);

            animation: timerWarning 1s infinite;
        }

        @keyframes timerWarning {

            0%, 100% {
                opacity: 1;
            }

            50% {
                opacity: .55;
            }

        }

        /* =====================================================
           INFO
        ====================================================== */

        .info-box {
            max-width: 440px;

            margin: 0 auto 20px;

            padding: 12px 15px;

            border-radius: 13px;

            background: var(--orange-soft);

            border: 1px solid #f5dfcf;

            color: #79502f;

            font-size: 9.5px;

            line-height: 1.6;

            text-align: left;

            display: flex;

            gap: 9px;
        }

        .info-box i {
            color: var(--orange);

            font-size: 14px;

            flex: 0 0 auto;
        }

        /* =====================================================
           BUTTON
        ====================================================== */

        .btn-confirm {
            position: relative;

            width: 100%;

            max-width: 440px;

            border: 0;

            border-radius: 15px;

            padding: 15px 20px;

            background:
                linear-gradient(
                    135deg,
                    #12351f,
                    #287346
                );

            color: white;

            font-size: 11px;

            font-weight: 800;

            box-shadow:
                0 13px 25px rgba(22,55,34,.20);

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .btn-confirm:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 17px 30px rgba(22,55,34,.27);
        }

        .btn-confirm:active {
            transform: translateY(0);
        }

        .btn-confirm:disabled {
            opacity: .5;

            cursor: not-allowed;

            transform: none;
        }

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            margin-top: 18px;

            color: var(--muted);

            text-decoration: none;

            font-size: 9px;

            font-weight: 800;

            transition: .2s ease;
        }

        .back-link:hover {
            color: var(--green);

            gap: 9px;
        }

        /* =====================================================
           EXPIRED
        ====================================================== */

        .expired-overlay {
            position: fixed;

            inset: 0;

            z-index: 9999;

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;

            background:
                rgba(247,249,247,.92);

            backdrop-filter: blur(15px);

            -webkit-backdrop-filter: blur(15px);
        }

        .expired-overlay.show {
            display: flex;
        }

        .expired-card {
            width: 100%;

            max-width: 410px;

            padding: 38px 30px;

            text-align: center;

            background: white;

            border: 1px solid var(--border);

            border-radius: 25px;

            box-shadow: 0 30px 80px rgba(16,45,27,.14);
        }

        .expired-icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 22px;

            background: #fff0f1;

            color: var(--danger);

            font-size: 28px;
        }

        .expired-title {
            font-family: 'Playfair Display', serif;

            font-size: 25px;

            color: var(--forest);

            margin-bottom: 8px;
        }

        .expired-text {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.7;

            margin-bottom: 22px;
        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 850px) {

            .payment-card {
                grid-template-columns: 1fr;

                max-width: 560px;

                margin: auto;
            }

            .payment-sidebar {
                padding: 28px 28px 30px;
            }

            .brand {
                margin-bottom: 35px;
            }

            .sidebar-title {
                font-size: 28px;
            }

            .sidebar-text {
                max-width: 500px;
            }

            .steps {
                display: none;
            }

            .sidebar-footer {
                margin-top: 30px;
            }

            .payment-main {
                padding: 30px 25px 32px;
            }

        }

        @media (max-width: 480px) {

            body {
                padding: 0;
            }

            .payment-page {
                max-width: none;
            }

            .payment-card {
                border-radius: 0;

                min-height: 100vh;
            }

            .payment-sidebar {
                padding: 24px 20px;
            }

            .sidebar-title {
                font-size: 25px;
            }

            .sidebar-text {
                font-size: 11px;
            }

            .payment-main {
                padding: 25px 18px 30px;
            }

            .main-top {
                margin-bottom: 20px;
            }

            .amount {
                font-size: 38px;
            }

            .qr-box img {
                width: 220px;
                height: 220px;
            }

            .status-card,
            .info-box,
            .btn-confirm {
                max-width: 100%;
            }

        }

    </style>
</head>

<body>

<div class="payment-page">

    <div class="payment-card">

        <!-- =================================================
             SIDEBAR
        ================================================== -->

        <aside class="payment-sidebar">

            <div class="sidebar-glow"></div>

            <div>

                <div class="brand">

                    <div class="brand-icon">
                        <i class="bi bi-leaf-fill"></i>
                    </div>

                    <div>
                        <div class="brand-name">
                            Farm Fresh
                        </div>

                        <span class="brand-sub">
                            Organic Products
                        </span>
                    </div>

                </div>


                <div class="sidebar-content">

                    <div class="secure-badge">

                        <span class="secure-dot"></span>

                        Secure Checkout

                    </div>


                    <h1 class="sidebar-title">
                        Simple.<br>
                        Fast.<br>
                        Secure.
                    </h1>


                    <p class="sidebar-text">
                        Complete your Farm Fresh order using
                        Bakong or your supported Cambodian
                        banking application.
                    </p>


                    <div class="steps">

                        <div class="step">

                            <div class="step-number">
                                01
                            </div>

                            <div>

                                <div class="step-title">
                                    Open your banking app
                                </div>

                                <div class="step-text">
                                    Use Bakong, ABA, Wing,
                                    ACLEDA, or another supported app.
                                </div>

                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                02
                            </div>

                            <div>

                                <div class="step-title">
                                    Scan the QR code
                                </div>

                                <div class="step-text">
                                    Scan the payment QR displayed
                                    on this page.
                                </div>

                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                03
                            </div>

                            <div>

                                <div class="step-title">
                                    Confirm your payment
                                </div>

                                <div class="step-text">
                                    Pay the exact amount shown
                                    on the checkout screen.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="sidebar-footer">

                <i class="bi bi-shield-lock-fill"></i>

                Secure payment powered by KHQR / Bakong

            </div>

        </aside>


        <!-- =================================================
             MAIN PAYMENT
        ================================================== -->

        <main class="payment-main">


            <div class="main-top">

                <span class="payment-label">
                    Payment
                </span>

                <span class="order-badge">

                    <i class="bi bi-shield-check"></i>

                    Secure

                </span>

            </div>


            <!-- AMOUNT -->

            <div class="amount-section">

                <div class="amount-caption">
                    Amount to pay
                </div>

                <div class="amount">

                    ${{ number_format($amount, 2) }}

                    <span class="currency">
                        USD
                    </span>

                </div>

            </div>


            <!-- QR -->

            <div class="qr-area">

                <div class="qr-glow"></div>

                <div class="qr-box">

                    <img
                        id="qrCodeImage"
                        alt="Bakong KHQR Payment"
                    >

                </div>

                <div class="scan-label">

                    <i class="bi bi-phone"></i>

                    Scan with your banking app

                </div>

            </div>


            <!-- STATUS -->

            <div class="status-card">

                <div class="status-icon">

                    <i
                        class="bi bi-broadcast-pin"
                        id="statusIcon"
                    ></i>

                </div>

                <div>

                    <div
                        class="status-title"
                        id="statusTitle"
                    >
                        Waiting for payment
                    </div>

                    <div
                        class="status-text"
                        id="statusText"
                    >
                        We are automatically checking for your payment.
                    </div>

                </div>

                <div
                    class="status-loading"
                    id="statusLoader"
                ></div>

            </div>


            <!-- TIMER -->

            <div class="timer-row">

                <span>
                    QR expires in
                </span>

                <span
                    class="timer-pill"
                    id="timerPill"
                >

                    <i class="bi bi-clock"></i>

                    <span id="timerValue">
                        03:00
                    </span>

                </span>

            </div>


            <!-- INFO -->

            <div class="info-box">

                <i class="bi bi-info-circle-fill"></i>

                <span>
                    Please pay the exact amount shown above.
                    After payment, this page will automatically
                    detect your transaction.
                    <strong>You do not need to refresh the page.</strong>
                </span>

            </div>


            <!-- CONFIRM -->

            <button
                type="button"
                class="btn-confirm"
                id="btnPaid"
            >

                <i class="bi bi-check-circle me-1"></i>

                I've Paid — Check Payment

            </button>


            <!-- BACK -->

            <div>

                <a
                    href="{{ route('cart') }}"
                    class="back-link"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back to Cart

                </a>

            </div>


        </main>

    </div>

</div>


<!-- =========================================================
     EXPIRED MODAL
========================================================== -->

<div
    class="expired-overlay"
    id="expiredOverlay"
>

    <div class="expired-card">

        <div class="expired-icon">

            <i class="bi bi-clock-history"></i>

        </div>

        <h3 class="expired-title">
            Payment Expired
        </h3>

        <p class="expired-text">
            This payment QR code has expired.
            Please return to your cart and create
            a new payment request.
        </p>

        <a
            href="{{ route('cart') }}"
            class="btn btn-dark rounded-pill px-4 py-2"
        >
            <i class="bi bi-cart3 me-1"></i>
            Return to Cart
        </a>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>

/* =========================================================
   ROUTES
========================================================= */

const routes = {

    bakongGenerate:
        '{{ route("bakong.generate") }}',

    bakongCheck:
        '{{ route("bakong.check") }}',

    cart:
        '{{ route("cart") }}'

};


/* =========================================================
   CONFIG
========================================================= */

const TOTAL_SECONDS = 180;

const CIRCUMFERENCE = 238.76;

let secondsRemaining = TOTAL_SECONDS;

let timerInterval = null;

let pollingInterval = null;

let md5Hash = null;

const amount = {{ (float) $amount }};

const orderIds = @json($orderIds);


/* =========================================================
   ELEMENTS
========================================================= */

const qrImage =
    document.getElementById('qrCodeImage');

const timerValue =
    document.getElementById('timerValue');

const timerPill =
    document.getElementById('timerPill');

const btnPaid =
    document.getElementById('btnPaid');

const expiredOverlay =
    document.getElementById('expiredOverlay');

const statusTitle =
    document.getElementById('statusTitle');

const statusText =
    document.getElementById('statusText');

const statusIcon =
    document.getElementById('statusIcon');

const statusLoader =
    document.getElementById('statusLoader');


/* =========================================================
   LOADING QR
========================================================= */

function showQrLoading() {

    qrImage.src =
        'data:image/svg+xml;utf8,' +
        encodeURIComponent(`

            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="245"
                height="245"
            >

                <rect
                    width="100%"
                    height="100%"
                    fill="#f5faf6"
                />

                <circle
                    cx="122"
                    cy="108"
                    r="17"
                    fill="none"
                    stroke="#287346"
                    stroke-width="4"
                    stroke-dasharray="30 20"
                >
                    <animateTransform
                        attributeName="transform"
                        type="rotate"
                        from="0 122 108"
                        to="360 122 108"
                        dur="1s"
                        repeatCount="indefinite"
                    />
                </circle>

                <text
                    x="50%"
                    y="155"
                    text-anchor="middle"
                    fill="#68736c"
                    font-family="Arial"
                    font-size="12"
                >
                    Creating secure QR...
                </text>

            </svg>

        `);

}


/* =========================================================
   GENERATE QR
========================================================= */

async function generateQr() {

    const reference =
        'FF-' +
        Date.now()
            .toString()
            .slice(-8);

    showQrLoading();

    statusTitle.textContent =
        'Creating payment request';

    statusText.textContent =
        'Generating your secure Bakong QR code...';

    try {

        const res = await fetch(

            `${routes.bakongGenerate}` +
            `?amount=${encodeURIComponent(amount)}` +
            `&ref=${encodeURIComponent(reference)}`,

            {
                headers: {
                    'Accept': 'application/json'
                }
            }

        );


        if (!res.ok) {

            throw new Error(
                'Server returned HTTP ' +
                res.status
            );

        }


        const data =
            await res.json();


        if (!data.success) {

            throw new Error(
                data.message ||
                'Bakong QR generation failed'
            );

        }


        if (!data.qr_image) {

            throw new Error(
                'QR image was not returned by the server'
            );

        }


        qrImage.src =
            data.qr_image;


        md5Hash =
            data.md5;


        console.log(
            'Bakong KHQR:',
            data.khqr
        );


        console.log(
            'MD5:',
            data.md5
        );


        statusTitle.textContent =
            'Waiting for payment';

        statusText.textContent =
            'Your payment will be detected automatically.';

        startPolling(data.md5);


    } catch (err) {

        console.error(
            'Bakong QR error:',
            err
        );


        statusTitle.textContent =
            'Unable to create payment';

        statusText.textContent =
            'Please try again or return to your cart.';

        statusLoader.style.display =
            'none';


        Swal.fire({

            icon: 'error',

            title: 'QR Generation Failed',

            text:
                err.message ||
                'Could not create a Bakong QR.',

            confirmButtonText:
                'Try Again',

            confirmButtonColor:
                '#163722'

        }).then(() => {

            generateQr();

        });

    }

}


/* =========================================================
   POLLING
========================================================= */

function startPolling(md5) {

    clearInterval(
        pollingInterval
    );


    pollingInterval =
        setInterval(
            () => checkPayment(md5),
            5000
        );


    checkPayment(md5);

}


/* =========================================================
   CHECK PAYMENT
========================================================= */

async function checkPayment(md5) {

    if (!md5) return;


    try {

        const res =
            await fetch(

                `${routes.bakongCheck}` +
                `?md5=${encodeURIComponent(md5)}`,

                {
                    headers: {
                        'Accept':
                            'application/json'
                    }
                }

            );


        if (!res.ok) {

            throw new Error(
                'Payment check failed'
            );

        }


        const data =
            await res.json();


        console.log(
            'Payment status:',
            data
        );


        if (data.is_paid) {

            paymentSuccess();

        }

    } catch (err) {

        console.error(
            'Bakong polling error:',
            err
        );

    }

}


/* =========================================================
   PAYMENT SUCCESS
========================================================= */

async function paymentSuccess() {

    clearInterval(
        pollingInterval
    );

    clearInterval(
        timerInterval
    );


    statusLoader.style.display =
        'none';


    statusIcon.className =
        'bi bi-check-circle-fill';


    statusIcon.style.color =
        '#198754';


    statusTitle.textContent =
        'Payment confirmed';

    statusText.textContent =
        'Your Bakong payment has been successfully received.';


    await Swal.fire({

        icon: 'success',

        title: 'Payment Received!',

        html: `

            <div
                style="
                    font-size:13px;
                    color:#68736c;
                    line-height:1.8;
                "
            >

                Your payment has been confirmed.<br>

                <strong>
                    Thank you for shopping with Farm Fresh.
                </strong>

            </div>

        `,

        confirmButtonText:
            'Continue',

        confirmButtonColor:
            '#163722'

    });


    window.location.href =
        routes.cart;

}


/* =========================================================
   TIMER
========================================================= */

function updateTimer() {

    const minutes =
        Math.floor(
            secondsRemaining / 60
        );

    const seconds =
        secondsRemaining % 60;


    timerValue.textContent =

        String(minutes)
            .padStart(2, '0')

        +

        ':' +

        String(seconds)
            .padStart(2, '0');


    if (secondsRemaining <= 60) {

        timerPill.classList.add(
            'warning'
        );

    } else {

        timerPill.classList.remove(
            'warning'
        );

    }

}


/* =========================================================
   START TIMER
========================================================= */

function startTimer() {

    updateTimer();


    clearInterval(
        timerInterval
    );


    timerInterval =
        setInterval(() => {

            secondsRemaining--;

            updateTimer();


            if (
                secondsRemaining <= 0
            ) {

                clearInterval(
                    timerInterval
                );

                clearInterval(
                    pollingInterval
                );


                btnPaid.disabled =
                    true;


                expiredOverlay.classList.add(
                    'show'
                );

            }

        }, 1000);

}


/* =========================================================
   MANUAL PAYMENT CHECK
========================================================= */

btnPaid.addEventListener(
    'click',
    async () => {

        if (
            secondsRemaining <= 0
        ) return;


        if (!md5Hash) {

            Swal.fire({

                icon: 'warning',

                title: 'Please Wait',

                text:
                    'Your payment QR is still being generated.',

                confirmButtonColor:
                    '#163722'

            });

            return;

        }


        const result =
            await Swal.fire({

                title:
                    'Check Payment?',

                html: `

                    <div
                        style="
                            font-size:13px;
                            color:#68736c;
                            line-height:1.7;
                        "
                    >

                        Have you already paid

                        <strong>
                            $${amount.toFixed(2)}
                        </strong>

                        ?

                    </div>

                `,

                icon:
                    'question',

                showCancelButton:
                    true,

                confirmButtonText:
                    'Yes, Check Now',

                cancelButtonText:
                    'Not Yet',

                confirmButtonColor:
                    '#163722'

            });


        if (!result.isConfirmed)
            return;


        btnPaid.disabled =
            true;


        btnPaid.innerHTML = `

            <span
                class="spinner-border spinner-border-sm me-2"
            ></span>

            Checking Payment...

        `;


        try {

            const res =
                await fetch(

                    `${routes.bakongCheck}` +
                    `?md5=${encodeURIComponent(md5Hash)}`,

                    {
                        headers: {
                            'Accept':
                                'application/json'
                        }
                    }

                );


            const data =
                await res.json();


            if (data.is_paid) {

                await paymentSuccess();

                return;

            }


            await Swal.fire({

                icon:
                    'info',

                title:
                    'Payment Not Found Yet',

                text:
                    'Bakong has not confirmed your payment yet. Please wait a few seconds and try again.',

                confirmButtonText:
                    'Okay',

                confirmButtonColor:
                    '#163722'

            });


        } catch (err) {

            console.error(
                err
            );


            Swal.fire({

                icon:
                    'error',

                title:
                    'Check Failed',

                text:
                    'Unable to check the payment right now.',

                confirmButtonColor:
                    '#163722'

            });

        }


        btnPaid.disabled =
            false;


        btnPaid.innerHTML = `

            <i class="bi bi-check-circle me-1"></i>

            I've Paid — Check Payment

        `;

    }
);


/* =========================================================
   INITIALIZE
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    () => {

        generateQr();

        startTimer();

    }
);

</script>

</body>
</html> --}}