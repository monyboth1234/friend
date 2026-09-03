<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your Cart - Farm Fresh</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --brand-green: #1c3e27;
            --brand-green-hover: #142f1d;
            --brand-accent: #e06d26;
            --brand-bg: #f8f9fa;
            --border-color: #eaeaea;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--brand-bg);
            color: #2b2b2b;
        }

        /* Header */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
        }
        .navbar-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }
        .brand-title { color: var(--brand-green); font-size: 18px; font-weight: 800; line-height: 1.1; }
        .brand-subtitle { font-size: 9px; letter-spacing: 1.5px; font-weight: 700; color: #888; }
        .nav-link { color: #555; font-weight: 600; font-size: 14px; padding: 0.5rem 1rem !important; transition: color 0.2s; }
        .nav-link:hover, .nav-link.active { color: var(--brand-accent); }
        
        .cart-icon-wrapper {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f0f4f1;
            color: var(--brand-green);
            transition: all 0.2s ease;
        }
        .cart-icon-wrapper:hover { background: var(--brand-green); color: #fff; }
        .cart-badge {
            position: absolute; 
            top: -2px; 
            right: -2px; 
            background: var(--brand-accent); 
            color: white;
            font-size: 10px; 
            font-weight: 800; 
            width: 18px; 
            height: 18px; 
            border-radius: 50%;
            display: flex; 
            align-items: center; 
            justify-content: center;
            border: 2px solid white;
        }

        /* Cart Layout */
        .cart-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .cart-item {
            padding: 1.25rem;
            border-bottom: 1px solid var(--border-color);
            transition: background 0.2s ease;
        }
        .cart-item:last-child { border-bottom: none; }
        .cart-item:hover { background-color: #fafafa; }
        
        .cart-item-img { 
            width: 90px; 
            height: 90px; 
            object-fit: cover; 
            border-radius: 12px;
            background: #f5f5f5; 
        }
        
        .cart-item-name { font-size: 16px; font-weight: 700; color: #111; margin-bottom: 2px; }
        .cart-item-price { font-size: 14px; color: #666; font-weight: 500; }
        .cart-item-subtotal { font-size: 17px; font-weight: 700; color: var(--brand-green); }

        /* Quantity Controls */
        .qty-control {
            display: inline-flex;
            align-items: center;
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            background: #fff;
            padding: 2px;
        }
        .qty-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            background: transparent;
            color: #444;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .qty-btn:hover { background: #f0f0f0; color: #000; }
        .qty-value {
            min-width: 36px;
            text-align: center;
            font-weight: 700;
            font-size: 14px;
        }

        .btn-remove {
            color: #aaa;
            background: none;
            border: none;
            font-size: 18px;
            padding: 4px;
            transition: color 0.2s;
        }
        .btn-remove:hover { color: #dc3545; }

        /* Order Summary Card */
        .summary-card {
            position: sticky;
            top: 90px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            color: #666;
        }
        .summary-row.total {
            border-top: 1px solid var(--border-color);
            padding-top: 16px;
            margin-top: 16px;
            color: #111;
            font-size: 18px;
            font-weight: 800;
        }
        
        /* Buttons */
        .btn-brand-primary {
            background: var(--brand-green);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 24px;
            font-weight: 700;
            width: 100%;
            transition: all 0.2s ease;
        }
        .btn-brand-primary:hover { background: var(--brand-green-hover); color: white; transform: translateY(-1px); }

        .btn-brand-outline {
            border: 1px solid #ddd;
            background: white;
            color: #555;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
        }
        .btn-brand-outline:hover { background: #f5f5f5; color: #111; }

        .btn-brand-danger {
            color: #dc3545;
            background: transparent;
            border: none;
            font-size: 13px;
            font-weight: 600;
        }
        .btn-brand-danger:hover { text-decoration: underline; }

        /* Modal & Form Styling */
        .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .modal-header {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.75rem;
        }

        .modal-body {
            padding: 1.75rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1.25rem 1.75rem;
            background: #fafafa;
        }

        .form-label {
            font-size: 0.85rem;
            color: #444;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--brand-green);
            box-shadow: 0 0 0 3px rgba(28, 62, 39, 0.12);
        }

        .input-group-text {
            border: 1.5px solid #e2e8f0;
            border-right: none;
            background: #f8fafc;
            border-radius: 10px 0 0 10px;
            color: #64748b;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .checkout-summary-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem;
        }

        .receipt-paper {
            background: #ffffff;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            padding: 1.75rem;
            position: relative;
        }

        .receipt-stamp {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            background: #dcfce7;
            color: #15803d;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .customer-info-grid {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1rem;
            font-size: 0.9rem;
        }

        @media print {
            body * { visibility: hidden; }
            #receipt-content, #receipt-content * { visibility: visible; }
            #receipt-content { position: absolute; left: 0; top: 0; width: 100%; padding: 20px; }
            .modal-footer, .btn-close, .modal-header, #checkoutModal { display: none !important; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg py-2">
            <div class="container">
                <a href="{{ route('shoppage') }}" class="navbar-brand d-flex align-items-center gap-2">
                    <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" alt="Farm Fresh Logo">
                    <div>
                        <div class="brand-title">Farm Fresh</div>
                        <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                    </div>
                </a>
                
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                        <li class="nav-item"><a href="{{ route('homeforclient') }}" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="{{ route('shoppage') }}" class="nav-link">Shop</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item ms-lg-2">
                            <a href="{{ route('cart') }}" class="cart-icon-wrapper text-decoration-none">
                                <i class="bi bi-bag"></i>
                                <span class="cart-badge" id="cart-count">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container py-4 py-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold m-0">Shopping Cart</h1>
            @php $cart = session()->get('cart', []); @endphp
            @if(!empty($cart))
                <button class="btn-brand-danger" id="clear-cart"><i class="bi bi-trash3 me-1"></i> Clear Cart</button>
            @endif
        </div>

        @if(empty($cart))
            <div class="cart-card text-center py-5 px-3">
                <div class="mb-3">
                    <i class="bi bi-cart-x text-muted opacity-50 display-1"></i>
                </div>
                <h3 class="h5 fw-bold text-dark">Your cart is feeling a bit light</h3>
                <p class="text-muted small mb-4">Explore our fresh organic products and add items to your cart.</p>
                <a href="{{ route('shoppage') }}" class="btn btn-brand-primary d-inline-block w-auto px-4">Browse Shop</a>
            </div>
        @else
            <div class="row g-4">
                <!-- Cart Items List -->
                <div class="col-lg-8">
                    <div class="cart-card">
                        @foreach($cart as $id => $item)
                            @php
                                $parts = explode('_', $id);
                                $type = $parts[0];
                                $itemId = $parts[1];
                            @endphp
                            <div class="cart-item d-flex align-items-center gap-3" id="cart-item-{{ $id }}">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="cart-item-img">
                                
                                <div class="flex-grow-1 min-w-0">
                                    <h2 class="cart-item-name text-truncate">{{ $item['name'] }}</h2>
                                    <div class="cart-item-price">${{ number_format($item['price'], 2) }} / unit</div>
                                </div>

                                <div class="qty-control">
                                    <button class="qty-btn minus cart-decrement" data-type="{{ $type }}" data-id="{{ $itemId }}" data-action="decrement" aria-label="Decrease quantity">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span class="qty-value" id="qty-{{ $id }}">{{ $item['quantity'] }}</span>
                                    <button class="qty-btn plus cart-increment" data-type="{{ $type }}" data-id="{{ $itemId }}" data-action="increment" aria-label="Increase quantity">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>

                                <div class="text-end ms-2 ms-sm-4" style="min-width: 80px;">
                                    <div class="cart-item-subtotal" id="subtotal-{{ $id }}">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('shoppage') }}" class="btn btn-brand-outline">
                            <i class="bi bi-arrow-left me-1"></i> Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="cart-card summary-card p-4">
                        <h2 class="h5 fw-bold mb-4">Order Summary</h2>
                        
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span id="summary-subtotal">${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Estimated Shipping</span>
                            <span class="text-success fw-semibold">Free</span>
                        </div>
                        
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="cart-total">${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</span>
                        </div>

                        <button class="btn btn-brand-primary mt-4" id="checkout-btn" type="button">Checkout</button>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <!-- Checkout Form Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">Complete Your Order</h5>
                        <small class="text-muted">Enter your shipping details below</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="checkout-form">
                        <div class="row g-4">
                            <!-- Left Column: Shipping Form -->
                            <div class="col-lg-7">
                                <h6 class="fw-bold mb-3 text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">1. Contact & Shipping Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control" name="customer_name" required placeholder="John Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="tel" class="form-control" name="customer_phone" required placeholder="+1 234 567 890">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" class="form-control" name="customer_email" placeholder="john@example.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Delivery Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="customer_address" rows="2" required placeholder="Street address, apartment, suite, etc."></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_city" required placeholder="City">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" placeholder="10001">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Delivery Date</label>
                                        <input type="date" class="form-control" name="delivery_date">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Order Notes</label>
                                        <textarea class="form-control" name="order_notes" rows="2" placeholder="Gate codes, delivery instructions..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Order Preview Card -->
                            <div class="col-lg-5">
                                <h6 class="fw-bold mb-3 text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">2. Order Summary</h6>
                                <div class="checkout-summary-box">
                                    <div class="d-flex justify-content-between align-items-center pb-3 border-bottom mb-3">
                                        <span class="fw-semibold text-secondary">Items Subtotal</span>
                                        <span class="fw-bold" id="checkout-subtotal-val">${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pb-3 border-bottom mb-3">
                                        <span class="fw-semibold text-secondary">Delivery Fee</span>
                                        <span class="badge bg-success-subtle text-success fw-bold">FREE</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <span class="fw-bold text-dark fs-5">Total Due</span>
                                        <span class="fw-extrabold text-success fs-4" id="checkout-total-val">${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</span>
                                    </div>
                                    <div class="alert alert-warning d-flex align-items-center gap-2 mt-4 mb-0 py-2 px-3 fs-7" role="alert">
                                        <i class="bi bi-shield-check fs-5"></i>
                                        <div>Payment cash-on-delivery or paid at doorstep.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-brand-primary rounded-pill px-4" id="proceed-to-receipt">
                        <i class="bi bi-check-circle me-1"></i> Place Order & View Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 px-md-5 pb-4" id="receipt-content">
                    <div class="receipt-paper">
                        <!-- Brand Header -->
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="brand-title fs-4">Farm Fresh</span>
                                    <span class="receipt-stamp">Paid / Confirmed</span>
                                </div>
                                <p class="text-muted small mb-0">Organic & Premium Products</p>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block">Order Reference</small>
                                <span class="fw-bold text-dark font-monospace" id="receipt-no">#FF-000000</span>
                            </div>
                        </div>

                        <div class="border-top border-bottom py-2 my-3 d-flex justify-content-between fs-7 text-muted">
                            <span>Date: <strong class="text-dark" id="receipt-date">--</strong></span>
                            <span>Payment: <strong class="text-dark">Cash on Delivery</strong></span>
                        </div>

                        <!-- Customer Info Grid -->
                        <div class="customer-info-grid my-4">
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <span class="text-muted d-block fs-7">Billed To:</span>
                                    <strong id="receipt-customer-name" class="text-dark">--</strong>
                                    <div id="receipt-customer-phone" class="text-secondary small">--</div>
                                    <div id="receipt-customer-email" class="text-secondary small">--</div>
                                </div>
                                <div class="col-sm-6">
                                    <span class="text-muted d-block fs-7">Shipping Address:</span>
                                    <div id="receipt-customer-address" class="fw-semibold text-dark">--</div>
                                    <span id="receipt-customer-city" class="text-secondary small">--</span>, 
                                    <span id="receipt-postal-code" class="text-secondary small">--</span>
                                </div>
                            </div>
                        </div>

                        <!-- Purchased Items Table -->
                        <table class="table table-borderless align-middle mb-4">
                            <thead>
                                <tr class="border-bottom text-muted fs-7 text-uppercase">
                                    <th class="ps-0">Item Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end pe-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="receipt-items" class="fs-6">
                                <!-- Populated dynamically -->
                            </tbody>
                            <tfoot>
                                <tr class="border-top">
                                    <td colspan="3" class="text-end fw-bold pt-3">Total Paid:</td>
                                    <td class="text-end fw-extrabold text-success fs-5 pt-3 pe-0" id="receipt-total">$0.00</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="text-center text-muted pt-3 border-top">
                            <p class="small mb-0">🌿 Thank you for supporting organic farming with <strong>Farm Fresh</strong>!</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-brand-primary rounded-pill px-4" onclick="window.print()">
                        <i class="bi bi-printer me-1"></i> Print Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartCount = document.getElementById('cart-count');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            function updateCartCount() {
                fetch('{{ route("cart.count") }}')
                    .then(response => response.json())
                    .then(data => {
                        cartCount.textContent = data.count;
                        cartCount.style.display = data.count > 0 ? 'flex' : 'none';
                    });
            }

            function updateTotal() {
                let total = 0;
                document.querySelectorAll('[id^="subtotal-"]').forEach(el => {
                    total += parseFloat(el.textContent.replace('$', ''));
                });
                const formattedTotal = '$' + total.toFixed(2);
                document.getElementById('cart-total').textContent = formattedTotal;
                
                const subtotalEl = document.getElementById('summary-subtotal');
                if (subtotalEl) subtotalEl.textContent = formattedTotal;

                const checkoutSub = document.getElementById('checkout-subtotal-val');
                const checkoutTot = document.getElementById('checkout-total-val');
                if (checkoutSub) checkoutSub.textContent = formattedTotal;
                if (checkoutTot) checkoutTot.textContent = formattedTotal;
            }

            function buildCartUrl(action, type, id) {
                const suffix = (type === 'product' || type === 'vegetable' || type === 'fresh-nut' || type === 'egg') ? '' : '-' + type;
                return `/cart/${action}${suffix}/${id}`;
            }

            document.querySelectorAll('.cart-increment, .cart-decrement').forEach(button => {
                button.addEventListener('click', function() {
                    const type   = this.dataset.type;
                    const id     = this.dataset.id;
                    const action = this.dataset.action;
                    const url    = buildCartUrl(action, type, id);

                    fetch(url, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) return;
                        const cartId = type + '_' + id;
                        if (data.removed) {
                            const row = document.getElementById('cart-item-' + cartId);
                            if (row) row.remove();
                            if (data.count === 0) location.reload();
                        } else {
                            document.getElementById('qty-' + cartId).textContent = data.quantity;
                            const price = parseFloat(document.querySelector('#cart-item-' + cartId + ' .cart-item-price').textContent.replace('$', ''));
                            document.getElementById('subtotal-' + cartId).textContent = '$' + (price * data.quantity).toFixed(2);
                        }
                        cartCount.textContent = data.count;
                        cartCount.style.display = data.count > 0 ? 'flex' : 'none';
                        updateTotal();
                    })
                    .catch(err => console.error('Cart update failed:', err));
                });
            });

            const clearBtn = document.getElementById('clear-cart');
            if (clearBtn) {
                clearBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to clear your cart?')) {
                        fetch('{{ route("cart.clear") }}', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) location.reload();
                        });
                    }
                });
            }

            // Open Checkout Modal
            const checkoutBtn = document.getElementById('checkout-btn');
            if (checkoutBtn) {
                checkoutBtn.addEventListener('click', function() {
                    const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
                    checkoutModal.show();
                });
            }

            // Form Submit, SweetAlert Countdown Timer & Receipt Trigger
            document.getElementById('proceed-to-receipt').addEventListener('click', function() {
                const form = document.getElementById('checkout-form');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                // Hide shipping details modal
                const checkoutModalEl = document.getElementById('checkoutModal');
                const checkoutModal = bootstrap.Modal.getInstance(checkoutModalEl);
                if (checkoutModal) {
                    checkoutModal.hide();
                }

                const formData = new FormData(form);
                const customerInfo = Object.fromEntries(formData.entries());

                const cart = @json($cart);
                const receiptNo = 'FF-' + Date.now().toString().slice(-8);
                const date = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric', 
                    hour: '2-digit', 
                    minute: '2-digit' 
                });

                document.getElementById('receipt-no').textContent = receiptNo;
                document.getElementById('receipt-date').textContent = date;
                document.getElementById('receipt-customer-name').textContent = customerInfo.customer_name;
                document.getElementById('receipt-customer-phone').textContent = customerInfo.customer_phone;
                document.getElementById('receipt-customer-email').textContent = customerInfo.customer_email || 'N/A';
                document.getElementById('receipt-customer-address').textContent = customerInfo.customer_address;
                document.getElementById('receipt-customer-city').textContent = customerInfo.customer_city;
                document.getElementById('receipt-postal-code').textContent = customerInfo.postal_code || 'N/A';

                let itemsHtml = '';
                let total = 0;
                for (const [id, item] of Object.entries(cart)) {
                    const subtotal = item.price * item.quantity;
                    total += subtotal;
                    itemsHtml += `
                        <tr>
                            <td class="ps-0 fw-semibold text-dark">${item.name}</td>
                            <td class="text-center">${item.quantity}</td>
                            <td class="text-end">$${item.price.toFixed(2)}</td>
                            <td class="text-end pe-0 fw-bold">$${subtotal.toFixed(2)}</td>
                        </tr>
                    `;
                }
                document.getElementById('receipt-items').innerHTML = itemsHtml;
                document.getElementById('receipt-total').textContent = '$' + total.toFixed(2);

                // SweetAlert Countdown
                let timerInterval;
                Swal.fire({
                    title: "Processing Order...",
                    html: "Generating receipt in <b></b> ms.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            if (timer) {
                                timer.textContent = Swal.getTimerLeft();
                            }
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        const receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
                        receiptModal.show();
                    }
                });
            });

            updateCartCount();
        });
    </script>
</body>
</html>