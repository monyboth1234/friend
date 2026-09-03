<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shop - Farm Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
         .main-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand img {
            width: 70px;
            height: 50px;
            object-fit: contain;
        }
        .brand-title {
             color: var(--brand-green, #198754);
            font-size: 20px;
            font-weight: 800;
            line-height: 1;
        }
        .brand-subtitle {
            font-size: 9px;
            letter-spacing: 2px;
            font-weight: 700;
            color: #777;
        }
        .navbar-nav .nav-link {
            color: #444;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--brand-orange, #fd7e14);
        }
        .cart-icon {
            font-size: 20px;
            color: var(--brand-green, #198754);
            position: relative;
        }
        .cart-icon:hover {
            color: var(--brand-orange, #fd7e14);
        }
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #e06d26;
            color: white;
            font-size: 11px;
            font-weight: 700;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<header class="main-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="#home" class="navbar-brand d-flex align-items-center gap-2">
                <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" alt="Farm Fresh">
                <div>
                    <div class="brand-title">Farm Fresh</div>
                    <div class="brand-subtitle">ORGANIC PRODUCTS</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a href="{{ route('homeforclient') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('shoppage') }}" class="nav-link active">Shop</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link me-lg-4">Contact</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" style="margin-left: 180px">Register</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                     <li class="nav-item">
                        <a href="{{ route('cart') }}" class="nav-link cart-icon">
                            <i class="bi bi-cart"></i>
                            <span class="cart-badge" id="cart-count">0</span>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <form class="d-flex" role="search" action="{{ route('shoppage') }}" method="GET">
                            <input class="form-control form-control-sm me-2" type="search" name="search" placeholder="Search products..." aria-label="Search" style="width: 180px;" value="{{ request('search') }}">
                            <button class="btn btn-outline-success btn-sm" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <div class="container py-5">
        @if($search !== '')
            <h1 class="mb-4">Search Results for "{{ $search }}"</h1>
            <p class="text-muted mb-4">
                Found
                {{ $vegetables->count() + $fruits->count() + $freshNuts->count() + $animalFarms->count() + $eggs->count() }}
                result(s)
            </p>
        @else
            <h1 class="mb-4">Shop</h1>
        @endif

        @php
            $allEmpty = $vegetables->isEmpty()
                && $fruits->isEmpty()
                && $freshNuts->isEmpty()
                && $animalFarms->isEmpty()
                && $eggs->isEmpty();
        @endphp

        @if($search !== '' && $allEmpty)
            <div class="text-center py-5">
                <i class="bi bi-search text-muted opacity-50 display-1"></i>
                <h3 class="h5 fw-bold text-dark mt-3">No products found</h3>
                <p class="text-muted small">Try a different keyword or browse our shop.</p>
                <a href="{{ route('shoppage') }}" class="btn btn-outline-success rounded-5 px-4">Clear Search</a>
            </div>
        @else
            @if($search === '')
                <!-- Vegetables Section -->
                <h2 class="text-center fw-bold mb-4">Vegetables</h2>
            @endif
            @if($vegetables->isEmpty())
                @if($search === '')
                    <p class="text-muted text-center mb-5">No vegetables available right now.</p>
                @endif
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                    @foreach ($vegetables as $vegetable)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $vegetable->image }}"
                                     class="card-img-top"
                                     alt="{{ $vegetable->name }}"
                                     style="height: 180px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $vegetable->name }}</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ \Illuminate\Support\Str::limit($vegetable->description, 60, '...') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <span class="fw-bold text-success">${{ number_format($vegetable->price, 2) }}</span>
                                        <button class="btn btn-outline-success btn-sm add-to-cart rounded-5" data-product-id="{{ $vegetable->id }}">add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($search === '')
                <!-- Farm_Animal Section -->
                <h2 class="text-center fw-bold mb-4">Farm Animal</h2>
            @endif
            @if($animalFarms->isEmpty())
                @if($search === '')
                    <p class="text-muted text-center mb-5">No farm animals available right now.</p>
                @endif
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                    @foreach ($animalFarms as $farmanimal)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $farmanimal->image }}"
                                     class="card-img-top"
                                     alt="{{ $farmanimal->name }}"
                                     style="height: 180px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $farmanimal->name }}</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ \Illuminate\Support\Str::limit($farmanimal->description, 60, '...') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <span class="fw-bold text-success">${{ number_format($farmanimal->price, 2) }}</span>
                                        <button class="btn btn-outline-success btn-sm add-to-cart rounded-5" data-product-id="{{ $farmanimal->id }}">add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($search === '')
                <!-- Fresh_Nut Section -->
                <h2 class="text-center fw-bold mb-4">Fresh Nuts</h2>
            @endif
            @if($freshNuts->isEmpty())
                @if($search === '')
                    <p class="text-muted text-center mb-5">No fresh nuts available right now.</p>
                @endif
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                    @foreach ($freshNuts as $freshnut)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $freshnut->image }}"
                                     class="card-img-top"
                                     alt="{{ $freshnut->name }}"
                                     style="height: 180px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $freshnut->name }}</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ \Illuminate\Support\Str::limit($freshnut->description, 60, '...') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <span class="fw-bold text-success">${{ number_format($freshnut->price, 2) }}</span>
                                        <button class="btn btn-outline-success btn-sm add-to-cart rounded-5" data-product-id="{{ $freshnut->id }}">add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($search === '')
                <!-- Egg Section -->
                <h2 class="text-center fw-bold mb-4">Eggs</h2>
            @endif
            @if($eggs->isEmpty())
                @if($search === '')
                    <p class="text-muted text-center mb-5">No eggs available right now.</p>
                @endif
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                    @foreach ($eggs as $egg)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $egg->image }}"
                                     class="card-img-top"
                                     alt="{{ $egg->name }}"
                                     style="height: 180px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $egg->name }}</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ \Illuminate\Support\Str::limit($egg->description, 60, '...') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <span class="fw-bold text-success">${{ number_format($egg->price, 2) }}</span>
                                        <button class="btn btn-outline-success btn-sm add-to-cart rounded-5" data-product-id="{{ $egg->id }}">add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($search === '')
                <!-- Fruits Section -->
                <h2 class="text-center fw-bold mb-4">Fruits</h2>
            @endif
            @if($fruits->isEmpty())
                @if($search === '')
                    <p class="text-muted text-center mb-5">No fruits available right now.</p>
                @endif
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                    @foreach ($fruits as $fruit)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $fruit->image }}"
                                     class="card-img-top"
                                     alt="{{ $fruit->name }}"
                                     style="height: 180px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $fruit->name }}</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ \Illuminate\Support\Str::limit($fruit->description, 60, '...') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <span class="fw-bold text-success">${{ number_format($fruit->price, 2) }}</span>
                                        <button class="btn btn-outline-success btn-sm add-to-fruit-cart rounded-5" data-fruit-id="{{ $fruit->id }}">add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>

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

            // Vegetable / Farm Animal / Fresh Nut / Egg Cart Button
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            cartCount.textContent = data.count;
                            cartCount.style.display = data.count > 0 ? 'flex' : 'none';
                        } else if (data.message) {
                            alert(data.message);
                        }
                    })
                    .catch(err => console.error('Add to cart failed:', err));
                });
            });

            // Fruit Cart Button
            document.querySelectorAll('.add-to-fruit-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const fruitId = this.dataset.fruitId;
                    fetch(`/cart/add-fruit/${fruitId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            cartCount.textContent = data.count;
                            cartCount.style.display = data.count > 0 ? 'flex' : 'none';
                        } else if (data.message) {
                            alert(data.message);
                        }
                    })
                    .catch(err => console.error('Add fruit to cart failed:', err));
                });
            });

            // Juice Cart Button (no Juice model exists yet)
            document.querySelectorAll('.add-to-juice-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const juiceId = this.dataset.juiceId;
                    fetch(`/cart/add-juice/${juiceId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            cartCount.textContent = data.count;
                            cartCount.style.display = data.count > 0 ? 'flex' : 'none';
                        } else if (data.message) {
                            alert(data.message);
                        }
                    })
                    .catch(err => console.error('Add juice to cart failed:', err));
                });
            });

            updateCartCount();
        });
    </script> 
</body>
</html>