<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fresh Nuts</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* =========================================================
           BASE
        ========================================================= */
        * {
            transition:
                background-color .4s ease,
                border-color .4s ease,
                color .4s ease,
                box-shadow .4s ease;
        }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            overflow-x: hidden;
            position: relative;
        }

        /* =========================================================
           DARK MODE — ambient backdrop effects
        ========================================================= */
        [data-theme="dark"] body {
            background:
                radial-gradient(ellipse 90% 55% at 50% -15%, rgba(125,212,154,.14), transparent 65%),
                radial-gradient(ellipse 70% 55% at 100% 100%, rgba(255,166,107,.10), transparent 60%),
                radial-gradient(ellipse 60% 50% at 0% 50%, rgba(125,212,154,.06), transparent 60%),
                #060d09 !important;
            background-attachment: fixed;
            color: #eaf5ee;
        }

        /* Star field */
        [data-theme="dark"] body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: .35;
            background-image:
                radial-gradient(circle, rgba(200,240,215,.9) 1px, transparent 1.5px),
                radial-gradient(circle, rgba(255,200,150,.7) 1px, transparent 1.5px),
                radial-gradient(circle, rgba(200,240,215,.5) 1px, transparent 1.5px);
            background-size: 120px 120px, 180px 180px, 240px 240px;
            background-position: 0 0, 40px 60px, 130px 80px;
            animation: starDrift 180s linear infinite;
            mask-image: radial-gradient(ellipse at 50% 0%, black 20%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at 50% 0%, black 20%, transparent 80%);
        }

        @keyframes starDrift {
            from { background-position: 0 0, 40px 60px, 130px 80px; }
            to   { background-position: 120px 120px, -140px 240px, 370px 320px; }
        }

        /* Grain texture */
        [data-theme="dark"] body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            opacity: .025;
            background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>");
            mix-blend-mode: overlay;
        }

        body > div {
            position: relative;
            z-index: 2;
        }

        /* =========================================================
           STAR RATING
        ========================================================= */
        .star-rating button:hover ~ button i { color: #d1d5db !important; }
        .star-rating button:hover i { color: #f59e0b !important; }

        [data-theme="dark"] .star-rating button i { color: #5b7466; }

        [data-theme="dark"] .star-rating button:hover i {
            color: #ffc964 !important;
            filter: drop-shadow(0 0 12px rgba(255,201,100,.6));
        }

        /* =========================================================
           DARK MODE COMPONENT OVERRIDES
        ========================================================= */

        /* Body text */
        [data-theme="dark"] .text-slate-800  { color: #c9ecd4 !important; }
        [data-theme="dark"] .text-slate-900  { color: #f0faf3 !important; }
        [data-theme="dark"] .text-slate-700  { color: #c9ecd4 !important; }
        [data-theme="dark"] .text-slate-600  { color: #b3c9b9 !important; }
        [data-theme="dark"] .text-slate-500  { color: #8ba394 !important; }
        [data-theme="dark"] .text-slate-400  { color: #5b7466 !important; }
        [data-theme="dark"] .text-slate-300  { color: #3a5544 !important; }

        /* Emerald accents */
        [data-theme="dark"] .text-emerald-600 { color: #7dd49a !important; text-shadow: 0 0 15px rgba(125,212,154,.4); }
        [data-theme="dark"] .text-emerald-700 { color: #7dd49a !important; text-shadow: 0 0 15px rgba(125,212,154,.4); }
        [data-theme="dark"] .text-emerald-800 { color: #a8dfb5 !important; text-shadow: 0 0 15px rgba(168,223,181,.4); }
        [data-theme="dark"] .text-emerald-500 { color: #7dd49a !important; }

        /* Card backgrounds */
        [data-theme="dark"] .bg-white {
            background-color: rgba(18,43,28,.65) !important;
            border-color: rgba(125,212,154,.12) !important;
            backdrop-filter: blur(15px);
        }

        [data-theme="dark"] .bg-emerald-50 { background-color: rgba(125,212,154,.08) !important; }
        [data-theme="dark"] .bg-emerald-100 { background-color: rgba(125,212,154,.15) !important; }
        [data-theme="dark"] .bg-emerald-600 { background-color: #4ea76b !important; }

        [data-theme="dark"] .bg-slate-50 { background-color: rgba(6,13,9,.5) !important; }
        [data-theme="dark"] .bg-slate-100 { background-color: #08150e !important; }

        /* Borders */
        [data-theme="dark"] .border-slate-100 { border-color: rgba(125,212,154,.1) !important; }
        [data-theme="dark"] .border-slate-200 { border-color: rgba(125,212,154,.12) !important; }
        [data-theme="dark"] .border-slate-50 { border-color: rgba(125,212,154,.06) !important; }
        [data-theme="dark"] .border-emerald-100 { border-color: rgba(125,212,154,.15) !important; }

        /* Shadows */
        [data-theme="dark"] .shadow-sm {
            box-shadow: 0 10px 30px rgba(0,0,0,.5),
                        inset 0 1px 0 rgba(125,212,154,.08) !important;
        }

        [data-theme="dark"] .hover\:shadow-xl:hover {
            box-shadow:
                0 30px 80px rgba(0,0,0,.75),
                0 0 50px rgba(255,166,107,.25),
                inset 0 1px 0 rgba(255,166,107,.15) !important;
            border-color: rgba(255,166,107,.4) !important;
        }

        /* Product cards — animated gradient border on hover */
        [data-theme="dark"] .group.bg-white {
            position: relative;
        }

        [data-theme="dark"] .group.bg-white::after {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 1rem;
            padding: 1px;
            background: conic-gradient(
                from 0deg,
                transparent 0deg,
                rgba(125,212,154,.8) 60deg,
                rgba(255,166,107,.8) 120deg,
                transparent 180deg,
                transparent 360deg
            );
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
                    mask-composite: exclude;
            opacity: 0;
            transition: opacity .5s ease;
            pointer-events: none;
            animation: spinGradient 4s linear infinite;
            z-index: 3;
        }

        [data-theme="dark"] .group.bg-white:hover::after {
            opacity: 1;
        }

        @keyframes spinGradient {
            to { transform: rotate(360deg); }
        }

        /* Images */
        [data-theme="dark"] .group img {
            filter: brightness(.85) contrast(1.1) saturate(1.15);
        }

        [data-theme="dark"] .group:hover img {
            filter: brightness(1.05) contrast(1.15) saturate(1.2);
        }

        /* Stock badges */
        [data-theme="dark"] .bg-emerald-500\/90 {
            background-color: rgba(77,171,107,.9) !important;
            box-shadow: 0 0 20px rgba(77,171,107,.5);
        }

        [data-theme="dark"] .bg-rose-500\/90 {
            background-color: rgba(220,53,85,.9) !important;
            box-shadow: 0 0 20px rgba(220,53,85,.5);
        }

        /* View button */
        [data-theme="dark"] .text-emerald-700.bg-emerald-50 {
            background-color: rgba(125,212,154,.1) !important;
            color: #7dd49a !important;
            border: 1px solid rgba(125,212,154,.2);
        }

        [data-theme="dark"] .text-emerald-700.bg-emerald-50:hover {
            background: linear-gradient(135deg, #2d6b42, #3f8155) !important;
            color: white !important;
            border-color: transparent;
            box-shadow:
                0 10px 30px rgba(63,129,85,.5),
                0 0 40px rgba(125,212,154,.3);
        }

        /* Submit button */
        [data-theme="dark"] .bg-emerald-600 {
            background: linear-gradient(135deg, #2d6b42, #3f8155) !important;
            box-shadow:
                0 8px 25px rgba(63,129,85,.5),
                0 0 30px rgba(125,212,154,.2),
                inset 0 1px 0 rgba(255,255,255,.15);
        }

        [data-theme="dark"] .bg-emerald-600:hover {
            background: linear-gradient(135deg, #3f8155, #4ea76b) !important;
            box-shadow:
                0 12px 35px rgba(63,129,85,.6),
                0 0 50px rgba(125,212,154,.4),
                inset 0 1px 0 rgba(255,255,255,.2);
            transform: translateY(-2px);
        }

        /* Back link */
        [data-theme="dark"] a.text-emerald-700:hover {
            color: #a8dfb5 !important;
            text-shadow: 0 0 20px rgba(168,223,181,.6);
        }

        /* Header badge */
        [data-theme="dark"] .bg-emerald-100.text-emerald-800 {
            background: rgba(125,212,154,.15) !important;
            color: #a8dfb5 !important;
            box-shadow:
                0 0 25px rgba(125,212,154,.25),
                inset 0 0 15px rgba(125,212,154,.08);
            border: 1px solid rgba(125,212,154,.25);
        }

        /* Big header icon */
        [data-theme="dark"] .bg-emerald-100.text-emerald-600 {
            background: rgba(125,212,154,.15) !important;
            color: #7dd49a !important;
            box-shadow:
                0 0 30px rgba(125,212,154,.3),
                inset 0 0 20px rgba(125,212,154,.1);
        }

        /* Empty state */
        [data-theme="dark"] .border-dashed { border-color: rgba(125,212,154,.2) !important; }

        [data-theme="dark"] .bg-emerald-50.text-emerald-500 {
            background: rgba(125,212,154,.12) !important;
            color: #7dd49a !important;
            box-shadow: 0 0 40px rgba(125,212,154,.25);
        }

        /* Form inputs */
        [data-theme="dark"] input,
        [data-theme="dark"] textarea {
            background-color: rgba(6,13,9,.7) !important;
            border-color: rgba(125,212,154,.15) !important;
            color: #eaf5ee !important;
        }

        [data-theme="dark"] input::placeholder,
        [data-theme="dark"] textarea::placeholder { color: #5b7466 !important; }

        [data-theme="dark"] input:focus,
        [data-theme="dark"] textarea:focus {
            background-color: rgba(6,13,9,.95) !important;
            border-color: #7dd49a !important;
            box-shadow:
                0 0 0 4px rgba(125,212,154,.14),
                0 0 25px rgba(125,212,154,.3) !important;
        }

        /* Review cards */
        [data-theme="dark"] .review-comment { color: #b3c9b9 !important; }
        [data-theme="dark"] .review-author  { color: #f0faf3 !important; }
        [data-theme="dark"] .review-date    { color: #5b7466 !important; }

        /* Review message */
        [data-theme="dark"] #review-message { color: #8ba394 !important; }
        [data-theme="dark"] #review-message.text-emerald-600 {
            color: #7dd49a !important;
            text-shadow: 0 0 15px rgba(125,212,154,.6);
        }
        [data-theme="dark"] #review-message.text-rose-500 {
            color: #ff8a9b !important;
            text-shadow: 0 0 15px rgba(255,138,155,.5);
        }

        /* Loading spinner */
        [data-theme="dark"] .text-slate-400 i.bi-arrow-repeat {
            color: #7dd49a !important;
        }

        /* =========================================================
           FLOATING THEME TOGGLE
        ========================================================= */
        .theme-toggle-float {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 9998;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid rgba(20,55,33,.1);
            background: white;
            color: #276a3d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            box-shadow:
                0 10px 30px rgba(20,55,33,.15),
                0 0 0 1px rgba(20,55,33,.04);
            transition: .35s cubic-bezier(.2,.7,.2,1);
        }

        .theme-toggle-float:hover {
            background: #ed762d;
            border-color: #ed762d;
            color: white;
            transform: rotate(15deg) scale(1.08);
            box-shadow:
                0 15px 40px rgba(237,118,45,.35),
                0 0 30px rgba(237,118,45,.4);
        }

        [data-theme="dark"] .theme-toggle-float {
            background: rgba(13,26,18,.85);
            border-color: rgba(255,166,107,.35);
            color: #ffa66b;
            backdrop-filter: blur(20px);
            box-shadow:
                0 15px 40px rgba(0,0,0,.6),
                0 0 30px rgba(255,166,107,.3),
                inset 0 0 15px rgba(255,166,107,.1);
        }

        [data-theme="dark"] .theme-toggle-float:hover {
            background: rgba(255,166,107,.2);
            border-color: rgba(255,166,107,.6);
            color: white;
            box-shadow:
                0 20px 50px rgba(0,0,0,.7),
                0 0 50px rgba(255,166,107,.6),
                inset 0 0 20px rgba(255,166,107,.15);
            transform: rotate(-15deg) scale(1.1);
        }

        /* =========================================================
           REDUCED MOTION
        ========================================================= */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .001ms !important;
                transition-duration: .001ms !important;
            }
            [data-theme="dark"] body::before,
            [data-theme="dark"] .group.bg-white::after {
                animation: none !important;
            }
        }
    </style>
</head>
<body class="bg-emerald-50/30 text-slate-800 antialiased min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Header & Back Navigation -->
        <div class="mb-8">
            <a href="{{ route('homepage') }}" class="inline-flex items-center text-sm font-medium text-emerald-700 hover:text-emerald-800 transition-colors mb-4">
                <i class="bi bi-arrow-left me-2"></i> Back to homepage
            </a>
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-emerald-100 pb-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight flex items-center gap-3">
                        <span class="p-2 bg-emerald-100 text-emerald-600 rounded-xl text-2xl"><i class="bi bi-nut"></i></span>
                        Fresh Nuts
                    </h1>
                    <p class="text-slate-500 text-sm mt-1">Locally sourced, organic farm produce delivered daily.</p>
                </div>
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-emerald-100 text-emerald-800">
                    {{ $products->count() }} Items Available
                </span>
            </div>
        </div>

        <!-- Product Grid -->
        @if($products->isEmpty())
            <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200 my-8">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    <i class="bi bi-basket"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800">No fresh nuts available right now</h3>
                <p class="text-slate-500 text-sm mt-1">Check back later for fresh stock updates.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 overflow-hidden flex flex-col justify-between">
                        <div>
                            <!-- Image Container -->
                            <div class="relative h-48 bg-slate-100 overflow-hidden">
                                <img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=600&q=80' }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                     alt="{{ $product->name }}">

                                <!-- Stock Tag Overlay -->
                                <div class="absolute top-3 left-3">
                                    @if($product->qty > 0)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/90 text-white backdrop-blur-sm">
                                            <i class="bi bi-check-circle-fill me-1"></i> In Stock ({{ $product->qty }})
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-500/90 text-white backdrop-blur-sm">
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-emerald-600 transition-colors">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 leading-relaxed">
                                    {{ \Illuminate\Support\Str::limit($product->description, 80, '...') }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="px-5 pb-5 pt-3 border-t border-slate-50 flex items-center justify-between mt-auto">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-slate-400 font-medium block">Price</span>
                                <span class="text-xl font-black text-emerald-600">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <a href="{{ route('product.show', ['id' => $product->id, 'type' => 'freshnut']) }}"
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-600 hover:text-white transition-all duration-200">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Customer Reviews Section -->
        <div class="mt-16 pt-10 border-t border-slate-200">
            <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                <i class="bi bi-chat-square-text text-emerald-600"></i> Customer Feedback
            </h2>

            <!-- Review Form -->
            <form id="review-form" class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-100 shadow-sm mb-10">
                @csrf
                <input type="hidden" name="product_type" value="product">
                <input type="hidden" name="product_id" value="0">

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="md:col-span-5">
                        <label for="user_name" class="block text-sm font-semibold text-slate-700 mb-2">
                            Your Name <span class="text-slate-400 font-normal">(optional)</span>
                        </label>
                        <input id="user_name" name="user_name" type="text" maxlength="100" placeholder="e.g. Jane Doe"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm">
                    </div>

                    <div class="md:col-span-7">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Rating</label>
                        <div class="rating-input star-rating flex items-center gap-1" role="radiogroup" aria-label="Your rating">
                            @for($rating = 1; $rating <= 5; $rating++)
                                <button type="button" data-rating="{{ $rating }}" aria-label="{{ $rating }} star{{ $rating > 1 ? 's' : '' }}" aria-checked="false" role="radio"
                                        class="p-1 text-slate-300 hover:text-amber-400 transition-colors text-2xl focus:outline-none">
                                    <i class="bi bi-star"></i>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" id="rating" name="rating" required>
                    </div>

                    <div class="md:col-span-12">
                        <label for="comment" class="block text-sm font-semibold text-slate-700 mb-2">Your Review</label>
                        <textarea id="comment" name="comment" rows="3" maxlength="1000" required placeholder="Tell us what you think about our fresh nuts..."
                                  class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm resize-none"></textarea>
                    </div>

                    <div class="md:col-span-12 flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                        <p id="review-message" class="text-sm font-medium" aria-live="polite"></p>
                        <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl transition-all shadow-sm flex items-center justify-center gap-2 text-sm">
                            <i class="bi bi-send"></i> Submit Review
                        </button>
                    </div>
                </div>
            </form>

            <!-- Dynamic Reviews List -->
            <div id="reviews-list">
                <div class="text-center py-8 text-slate-400 text-sm">
                    <i class="bi bi-arrow-repeat animate-spin text-xl block mb-2"></i> Loading customer reviews...
                </div>
            </div>
        </div>
    </div>


    <!-- =========================================================
         FLOATING THEME TOGGLE
    ========================================================= -->
    <button id="themeToggle"
            class="theme-toggle-float"
            type="button"
            aria-label="Toggle dark mode"
            title="Toggle dark mode">
        <i class="bi bi-moon-stars-fill"></i>
    </button>


    <script>
        function renderStars(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    stars += '<i class="bi bi-star-fill text-amber-400"></i>';
                } else if (i - 0.5 <= rating) {
                    stars += '<i class="bi bi-star-half text-amber-400"></i>';
                } else {
                    stars += '<i class="bi bi-star text-slate-300"></i>';
                }
            }
            return stars;
        }

        function loadCategoryReviews() {
            fetch('/reviews/product/0')
                .then(response => response.json())
                .then(data => {
                    const reviewsList = document.getElementById('reviews-list');
                    if (data.total_reviews > 0) {
                        reviewsList.innerHTML = '';
                        const grid = document.createElement('div');
                        grid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';

                        data.reviews.forEach(review => {
                            const column = document.createElement('div');
                            column.className = 'bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between';
                            column.innerHTML = `
                                <div>
                                    <div class="flex items-center gap-1 mb-3 text-sm">${renderStars(review.rating)}</div>
                                    <p class="review-comment text-slate-600 text-sm leading-relaxed italic mb-4"></p>
                                </div>
                                <div class="flex items-center justify-between pt-4 border-t border-slate-50 text-xs">
                                    <span class="review-author font-semibold text-slate-800"></span>
                                    <span class="review-date text-slate-400"></span>
                                </div>
                            `;
                            column.querySelector('.review-comment').textContent = `"${review.comment}"`;
                            column.querySelector('.review-author').textContent = review.user_name || 'Anonymous';
                            column.querySelector('.review-date').textContent = new Date(review.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                            grid.appendChild(column);
                        });
                        reviewsList.appendChild(grid);
                    } else {
                        reviewsList.innerHTML = '<div class="text-center py-8 bg-white rounded-2xl border border-slate-100 text-slate-500 text-sm">No reviews yet. Be the first to leave feedback!</div>';
                    }
                })
                .catch(() => {
                    document.getElementById('reviews-list').innerHTML = '<div class="text-center py-8 text-rose-500 text-sm">Reviews could not be loaded right now.</div>';
                });
        }

        const reviewForm = document.getElementById('review-form');
        const ratingInput = document.getElementById('rating');
        const ratingButtons = document.querySelectorAll('.rating-input button');

        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedRating = Number(button.dataset.rating);
                ratingInput.value = selectedRating;
                ratingButtons.forEach(star => {
                    const isSelected = Number(star.dataset.rating) <= selectedRating;
                    star.setAttribute('aria-checked', Number(star.dataset.rating) === selectedRating ? 'true' : 'false');
                    const icon = star.querySelector('i');
                    if (isSelected) {
                        icon.className = 'bi bi-star-fill text-amber-400';
                    } else {
                        icon.className = 'bi bi-star text-slate-300';
                    }
                });
            });
        });

        reviewForm.addEventListener('submit', async event => {
            event.preventDefault();
            const message = document.getElementById('review-message');
            if (!ratingInput.value) {
                message.className = 'text-sm font-medium text-rose-500';
                message.textContent = 'Please select a star rating.';
                return;
            }

            const submitButton = reviewForm.querySelector('[type="submit"]');
            submitButton.disabled = true;
            message.className = 'text-sm font-medium text-slate-500';
            message.textContent = 'Submitting your review...';

            try {
                const response = await fetch('{{ route('reviews.store') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: new FormData(reviewForm)
                });
                if (!response.ok) throw new Error();
                reviewForm.reset();
                ratingInput.value = '';
                ratingButtons.forEach(star => {
                    star.setAttribute('aria-checked', 'false');
                    star.querySelector('i').className = 'bi bi-star text-slate-300';
                });
                message.className = 'text-sm font-medium text-emerald-600';
                message.textContent = 'Thank you! Your review was added.';
                loadCategoryReviews();
            } catch (error) {
                message.className = 'text-sm font-medium text-rose-500';
                message.textContent = 'Your review could not be submitted. Please try again.';
            } finally {
                submitButton.disabled = false;
            }
        });

        loadCategoryReviews();


        /* =========================================================
           DARK MODE CONTROLLER
        ========================================================= */

        const themeToggle = document.getElementById('themeToggle');
        const htmlEl = document.documentElement;
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

        function applyTheme(theme) {
            if (theme === 'dark') {
                htmlEl.setAttribute('data-theme', 'dark');
                if (themeToggle) {
                    themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
                    themeToggle.setAttribute('aria-label', 'Switch to light mode');
                    themeToggle.setAttribute('title', 'Switch to light mode');
                }
            } else {
                htmlEl.removeAttribute('data-theme');
                if (themeToggle) {
                    themeToggle.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
                    themeToggle.setAttribute('aria-label', 'Switch to dark mode');
                    themeToggle.setAttribute('title', 'Switch to dark mode');
                }
            }
        }

        const savedTheme = localStorage.getItem('farmfresh-theme');
        let initialTheme = 'light';

        if (savedTheme === 'dark' || savedTheme === 'light') {
            initialTheme = savedTheme;
        } else if (mediaQuery.matches) {
            initialTheme = 'dark';
        }

        applyTheme(initialTheme);

        if (themeToggle) {
            themeToggle.addEventListener('click', function () {
                const isDark = htmlEl.getAttribute('data-theme') === 'dark';
                const newTheme = isDark ? 'light' : 'dark';
                applyTheme(newTheme);
                localStorage.setItem('farmfresh-theme', newTheme);
            });
        }

        mediaQuery.addEventListener('change', function (event) {
            const stored = localStorage.getItem('farmfresh-theme');
            if (stored !== 'dark' && stored !== 'light') {
                applyTheme(event.matches ? 'dark' : 'light');
            }
        });
    </script>
</body>
</html>