<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Farm Fresh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .star-rating button:hover ~ button i { color: #d1d5db !important; }
        .star-rating button:hover i { color: #fbbf24 !important; }
    </style>
</head>
<body class="bg-[#f0f4f8] text-slate-800 antialiased min-h-screen font-sans">
    <main class="max-w-5xl mx-auto px-4 py-8">
        
        <!-- Back Link -->
        <a href="{{ route('showproduct.Vegetable') }}" class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors mb-6">
            <i class="bi bi-arrow-left me-2"></i> Back to Shop
        </a>

        <!-- Main Product Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2">
                
                <!-- Image Container with Heart Overlay -->
                <div class="relative h-[380px] sm:h-[450px] w-full bg-slate-100">
                    <img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=800&q=80' }}"
                         class="w-full h-full object-cover"
                         alt="{{ $product->name }}">
                    
                    <!-- Favorite Button Overlay -->
                    <button type="button" aria-label="Add to favorites" class="absolute top-5 right-5 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-slate-700 hover:text-rose-500 hover:bg-white transition-all shadow-sm">
                        <i class="bi bi-heart text-lg"></i>
                    </button>
                </div>

                <!-- Product Information -->
                <div class="p-8 sm:p-10 flex flex-col justify-between">
                    <div>
                        <!-- Organic / Stock Tag -->
                        <div class="mb-3">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100/80 text-emerald-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> 100% ORGANIC
                            </span>
                        </div>

                        <!-- Product Title -->
                        <h1 class="text-3xl font-extrabold text-slate-900 mb-2">
                            {{ $product->name }}
                        </h1>

                        <!-- Customer rating summary -->
                        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
                            <div id="rating-summary-stars" class="flex text-slate-300" aria-label="Customer rating"></div>
                            <span id="rating-summary-text" class="text-xs">No customer ratings yet</span>
                        </div>

                        <!-- Price Tag -->
                        <div class="flex items-baseline gap-1 mb-8">
                            <span class="text-3xl font-black text-emerald-600">${{ number_format($product->price, 2) }}</span>
                            <span class="text-sm text-slate-400 font-medium">/ item</span>
                        </div>

                        <!-- Navigation Tabs (Overview/Details) -->
                        <div class="border-b border-slate-200 mb-4 flex gap-6 text-sm font-semibold">
                            <button class="pb-2 border-b-2 border-slate-700 text-slate-800">Overview</button>
                            <button class="pb-2 border-b-2 border-transparent text-slate-400 hover:text-slate-600">Details</button>
                        </div>

                        <!-- Description -->
                        <p class="text-slate-500 text-sm leading-relaxed">
                            {{ $product->description ?: 'Fresh and high-quality organic produce.' }}
                        </p>
                    </div>

                    <!-- Feature Badges -->
                    <div class="grid grid-cols-2 gap-3 pt-6 mt-6 border-t border-slate-100">
                        <div class="bg-slate-50 p-3 rounded-2xl flex items-center gap-3 border border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-700 shadow-sm border border-slate-100">
                                <i class="bi bi-truck text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Fast Delivery</p>
                                <p class="text-[11px] text-slate-400">Next day available</p>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-3 rounded-2xl flex items-center gap-3 border border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-700 shadow-sm border border-slate-100">
                                <i class="bi bi-shield-check text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Fresh Guarantee</p>
                                <p class="text-[11px] text-slate-400">100% farm fresh</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Customer Reviews Wrapper Container -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-100 space-y-8">
            <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                <i class="bi bi-chat-left-text text-slate-700"></i> Customer Reviews
            </h2>

            <!-- Gray Write a Review Box -->
            <form id="review-form" class="bg-[#f8fafc] rounded-2xl p-6 border border-slate-200/60">
                @csrf
                <input type="hidden" name="product_type" value="{{ $type }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <h3 class="text-sm font-bold text-slate-800 mb-4">Write a Review</h3>

                <div class="space-y-4">
                    <!-- User Name Field -->
                    <div>
                        <label for="user_name" class="block text-xs font-semibold text-slate-600 mb-1">Your Name</label>
                        <input id="user_name" name="user_name" type="text" maxlength="100" placeholder="Enter your name (optional)"
                               class="w-full px-3.5 py-2 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm bg-white">
                    </div>

                    <!-- Star Rating Input -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Rating</label>
                        <div class="rating-input star-rating flex items-center gap-1" role="radiogroup" aria-label="Your rating">
                            @for($rating = 1; $rating <= 5; $rating++)
                                <button type="button" data-rating="{{ $rating }}" aria-label="{{ $rating }} star{{ $rating > 1 ? 's' : '' }}" aria-checked="false" role="radio"
                                        class="text-amber-400 hover:text-amber-400 transition-colors text-xl focus:outline-none">
                                    <i class="bi bi-star"></i>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" id="rating" name="rating" required>
                    </div>

                    <!-- Review Text Field -->
                    <div>
                        <label for="comment" class="block text-xs font-semibold text-slate-600 mb-1">Comment</label>
                        <textarea id="comment" name="comment" rows="3" maxlength="1000" required placeholder="Write your review here..."
                                  class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm bg-white resize-none"></textarea>
                    </div>

                    <!-- Form Status & Submit -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <p id="review-message" class="text-xs font-medium" aria-live="polite"></p>
                        <button type="submit" class="px-5 py-2 bg-[#0d8a56] hover:bg-[#0a7347] text-white font-semibold rounded-lg transition-colors shadow-sm text-xs">
                            Submit Review
                        </button>
                    </div>
                </div>
            </form>

            <!-- Customer Reviews Render Area -->
            <div id="reviews-list">
                <div class="text-center py-6 text-slate-400 text-sm">
                    <i class="bi bi-arrow-repeat animate-spin text-xl block mb-2"></i> Loading reviews...
                </div>
            </div>
        </div>
    </main>

    <script>
        const reviewForm = document.getElementById('review-form');
        const ratingInput = document.getElementById('rating');
        const ratingButtons = document.querySelectorAll('.rating-input button');
        const reviewsList = document.getElementById('reviews-list');
        const ratingSummaryStars = document.getElementById('rating-summary-stars');
        const ratingSummaryText = document.getElementById('rating-summary-text');

        function renderStars(rating) {
            return Array.from({ length: 5 }, (_, index) =>
                `<i class="bi ${index < rating ? 'bi-star-fill text-amber-400' : 'bi-star text-slate-300'}"></i>`
            ).join('');
        }

        function resetRatingSelection() {
            ratingInput.value = '';
            ratingButtons.forEach(star => {
                star.setAttribute('aria-checked', 'false');
                star.querySelector('i').className = 'bi bi-star text-slate-300';
            });
        }

        function updateRatingSummary(totalReviews, averageRating) {
            if (!totalReviews) {
                ratingSummaryStars.innerHTML = renderStars(0);
                ratingSummaryText.textContent = 'No customer ratings yet';
                return;
            }

            ratingSummaryStars.innerHTML = renderStars(Math.round(averageRating));
            ratingSummaryText.textContent = `${averageRating.toFixed(1)} from ${totalReviews} customer ${totalReviews === 1 ? 'review' : 'reviews'}`;
        }

        function loadReviews() {
            fetch('{{ route('reviews.index', ['type' => $type, 'id' => $product->id]) }}')
                .then(response => response.json())
                .then(data => {
                    reviewsList.innerHTML = '';
                    updateRatingSummary(data.total_reviews, Number(data.average_rating));
                    if (!data.total_reviews) {
                        reviewsList.innerHTML = '<div class="text-center py-6 text-slate-500 text-sm font-medium">Be the first to review this product!</div>';
                        return;
                    }
                    const row = document.createElement('div');
                    row.className = 'grid grid-cols-1 md:grid-cols-2 gap-4';
                    
                    data.reviews.forEach(review => {
                        const column = document.createElement('div');
                        column.className = 'bg-[#f8fafc] p-5 rounded-2xl border border-slate-100 flex flex-col justify-between';
                        column.innerHTML = `
                            <div>
                                <div class="flex items-center gap-1 mb-2 text-xs">${renderStars(review.rating)}</div>
                                <p class="review-comment text-slate-700 text-sm leading-relaxed mb-3"></p>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-200/60 text-xs text-slate-400">
                                <span class="review-author font-semibold text-slate-800"></span>
                                <span class="review-date"></span>
                            </div>
                        `;
                        column.querySelector('.review-comment').textContent = review.comment;
                        column.querySelector('.review-author').textContent = review.user_name || 'Anonymous';
                        column.querySelector('.review-date').textContent = new Date(review.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                        row.appendChild(column);
                    });
                    reviewsList.appendChild(row);
                })
                .catch(() => { 
                    reviewsList.innerHTML = '<div class="text-center py-6 text-rose-500 text-sm">Reviews could not be loaded right now.</div>'; 
                });
        }

        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedRating = Number(button.dataset.rating);
                ratingInput.value = selectedRating;
                ratingButtons.forEach(star => {
                    const selected = Number(star.dataset.rating) <= selectedRating;
                    star.setAttribute('aria-checked', Number(star.dataset.rating) === selectedRating ? 'true' : 'false');
                    const icon = star.querySelector('i');
                    if (selected) {
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
                message.className = 'text-xs font-medium text-rose-500';
                message.textContent = 'Please select a star rating.';
                return;
            }
            const submitButton = reviewForm.querySelector('[type="submit"]');
            submitButton.disabled = true;
            message.className = 'text-xs font-medium text-slate-500';
            message.textContent = 'Submitting...';

            try {
                const response = await fetch('{{ route('reviews.store') }}', {
                    method: 'POST',
                    headers: { 
                        'Accept': 'application/json', 
                        'X-CSRF-TOKEN': reviewForm.querySelector('input[name="_token"]').value 
                    },
                    body: new FormData(reviewForm)
                });
                if (!response.ok) throw new Error();
                reviewForm.reset();
                resetRatingSelection();
                message.className = 'text-xs font-medium text-emerald-600';
                message.textContent = 'Thank you! Your review was added.';
                loadReviews();
            } catch (error) {
                message.className = 'text-xs font-medium text-rose-500';
                message.textContent = 'Submission failed. Please try again.';
            } finally {
                submitButton.disabled = false;
            }
        });

        loadReviews();
    </script>
</body>
</html>
