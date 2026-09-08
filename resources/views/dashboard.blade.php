<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ផ្ទាំងគ្រប់គ្រងកសិដ្ឋាន (Farm Dashboard)</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Khmer Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kantumruy Pro', sans-serif;
            background-color: #f4f6f9;
        }

        /* Fixed Sidebar */
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

        /* Main Content Adjustment */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 1.5rem;
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
        }

        /* Nav Link Hover and Active Effect */
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

        /* Custom Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        /* Metric Cards Styling */
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
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
                    <a href="#" class="nav-link active d-flex align-items-center">
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
                    <a href="{{ route('report') }}" class="nav-link sub-nav-link d-flex align-items-center">
                        <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                        <span>Report and rate
                        </span>
                    </a>
                </li>
                
                <hr class="border-light opacity-25">

                <li class="nav-item">
                    <a href="{{ route('homepage') }}" class="nav-link d-flex align-items-center">
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
                <button type="submit" class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i> ចាកចេញ (Logout)
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        
        <!-- Header Panel -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom bg-white p-3 rounded-3 shadow-sm">
            <div>
                <h3 class="fw-bold mb-1 text-success">ផ្ទាំងគ្រប់គ្រងកសិដ្ឋាន</h3>
                <span class="text-muted"><i class="bi bi-envelope me-1"></i> អ៊ីមែល៖ {{ Auth::user()->email }}</span>
            </div>
        </div>

        <!-- Metrics Stat Grid -->
        <div class="row g-3 mb-4">

            <!-- Stat Card 1: ផ្ទៃដីដាំដុះ -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-bounding-box-circles fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ផ្ទៃដីដាំដុះ</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalArea, 2) }} ហិកតា</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 2: ចំនួនពងសរុប -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning-subtle text-warning p-3 rounded-circle me-3">
                            <i class="bi bi-egg-fried fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនពងសរុប</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalEgg) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 3: ចំនួនសត្វសរុប -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                            <i class="bi bi-bug fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនសត្វសរុប</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalAnimal) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 4: គណនីអ្នកប្រើប្រាស់ -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                            <i class="fa-solid fa-users fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">គណនីអ្នកប្រើប្រាស់</h6>
                            <h4 class="card-title fw-bold mb-0">{{ $users->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 5: ចំនួនបន្លែសរុប -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="fa-solid fa-carrot fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនបន្លែសរុប</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalVegetable ?? 0) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 6: ចំនួនផ្លែឈើសរុប -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-danger-subtle text-danger p-3 rounded-circle me-3">
                            <i class="bi bi-apple fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនផ្លែឈើសរុប</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalFruit ?? 0) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 7: ចំនួនគ្រាប់ធញ្ញជាតិសរុប -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-secondary-subtle text-secondary p-3 rounded-circle me-3">
                            <i class="bi bi-nut fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនគ្រាប់ធញ្ញជាតិសរុប</h6>
                            <h4 class="card-title fw-bold mb-0">{{ number_format($totalFreshNut ?? 0) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Inventory Trend Chart -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex flex-wrap gap-3 justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold mb-0 text-secondary"><i class="bi bi-graph-up-arrow me-2 text-success"></i>Inventory quantity trend</h5>
                    <small class="text-muted">Quantities added to Egg, Farm Animals, Fresh Nut, Fruit, and Vegetable</small>
                </div>
                <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center gap-2">
                    <label for="chart_period" class="visually-hidden">Chart period</label>
                    <select id="chart_period" name="chart_period" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="day" @selected($chartPeriod === 'day')>Daily (last 7 days)</option>
                        <option value="month" @selected($chartPeriod === 'month')>Monthly (this year)</option>
                        <option value="year" @selected($chartPeriod === 'year')>Yearly (last 5 years)</option>
                    </select>
                </form>
            </div>
            <div class="card-body">
                <div style="height: 340px;">
                    <canvas id="inventoryTrendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Data Table Section -->
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-secondary"><i class="bi bi-people me-2"></i>តារាងអ្នកប្រើប្រាស់</h5>
                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">បច្ចុប្បន្នភាពចុងក្រោយ</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">ល.រ</th>
                            <th class="py-3">ឈ្មោះអ្នកប្រើប្រាស់</th>
                            <th class="py-3">អុីម៉ែល</th>
                            <th class="py-3">តួនាទី</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="fw-semibold text-dark">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                        {{ $user->role }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const inventoryChart = document.getElementById('inventoryTrendChart');

        new Chart(inventoryChart, {
            type: 'line',
            data: {
                labels: @json($chart['labels']),
                datasets: [
                    { label: 'Egg', data: @json($chart['series']['Egg']), borderColor: '#f59f00', backgroundColor: '#f59f00', tension: 0.3, fill: false },
                    { label: 'Farm Animals', data: @json($chart['series']['Farm Animals']), borderColor: '#0dcaf0', backgroundColor: '#0dcaf0', tension: 0.3, fill: false },
                    { label: 'Fresh Nut', data: @json($chart['series']['Fresh Nut']), borderColor: '#6f42c1', backgroundColor: '#6f42c1', tension: 0.3, fill: false },
                    { label: 'Fruit', data: @json($chart['series']['Fruit']), borderColor: '#dc3545', backgroundColor: '#dc3545', tension: 0.3, fill: false },
                    { label: 'Vegetable', data: @json($chart['series']['Vegetable']), borderColor: '#198754', backgroundColor: '#198754', tension: 0.3, fill: false },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: { legend: { position: 'bottom' } },
                scales: {
                    y: { beginAtZero: true, title: { display: true, text: 'Quantity added' }, ticks: { precision: 0 } },
                    x: { title: { display: true, text: @json($chartPeriod === 'day' ? 'Day' : ($chartPeriod === 'month' ? 'Month' : 'Year')) } },
                },
            },
        });
    </script>
</body>
</html>
