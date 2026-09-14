<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresh Vegetables</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .star-rating button:hover ~ button i { color: #d1d5db !important; }
        .star-rating button:hover i { color: #f59e0b !important; }
    </style>
</head>
<body class="bg-emerald-50/30 text-slate-800 antialiased min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Header & Back Navigation -->
        <div class="mb-8">
            <a href="{{ route('homeforclient') }}" class="inline-flex items-center text-sm font-medium text-emerald-700 hover:text-emerald-800 transition-colors mb-4">
                <i class="bi bi-arrow-left me-2"></i> Back to homepage
            </a>
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-emerald-100 pb-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight flex items-center gap-3">
                        <span class="p-2 bg-emerald-100 text-emerald-600 rounded-xl text-2xl"><i class="bi bi-egg-fried"></i></span>
                        Fresh Vegetables
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
                <h3 class="text-lg font-bold text-slate-800">No vegetables available right now</h3>
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
                            <a href="{{ route('product.show', ['id' => $product->id, 'type' => 'vegetable']) }}" 
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
                        <textarea id="comment" name="comment" rows="3" maxlength="1000" required placeholder="Tell us what you think about our fresh vegetables..."
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
    </script>
</body>
</html>