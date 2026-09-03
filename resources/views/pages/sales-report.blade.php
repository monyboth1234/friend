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
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Kantumruy Pro', sans-serif;
            background-color: #f4f6f9;
        }

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
            <div class="text-center py-2 mb-2">
                <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" 
                     alt="Farm Logo" class="img-fluid rounded-circle shadow-sm" style="max-width: 120px; background: white; padding: 5px;">
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
                        របាយការណ៍
                    </div>
                    <a href="{{ route('sales.report') }}" class="nav-link d-flex align-items-center active">
                        <i class="bi bi-graph-up-arrow me-2 fs-5"></i>
                        <span>របាយការណ៍ការលក់</span>
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
                <h3 class="fw-bold mb-1 text-success">របាយការណ៍ការលក់ (Sales Report)</h3>
                <span class="text-muted"><i class="bi bi-envelope me-1"></i> អ៊ីមែល៖ {{ Auth::user()->email }}</span>
            </div>
            <span class="badge bg-success-subtle text-success fs-6 p-2 fw-semibold">
                <i class="bi bi-calendar-event me-1"></i> ឆ្នាំ {{ date('Y') }}
            </span>
        </div>

        <!-- Dynamic Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-currency-dollar fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំណូលសរុប (Total Revenue)</h6>
                            <h4 class="card-title fw-bold mb-0 text-success">${{ number_format($orders->sum('total_price'), 2) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                            <i class="bi bi-receipt fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនការកុម្ម៉ង់សរុប (Total Orders)</h6>
                            <h4 class="card-title fw-bold mb-0 text-info">{{ number_format($orders->count()) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning-subtle text-warning p-3 rounded-circle me-3">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">បរិមាណលក់ប្រចាំថ្ងៃ (Today's Items)</h6>
                            <h4 class="card-title fw-bold mb-0 text-dark">{{ number_format(array_sum($dailySalesChartData)) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visual Charts Section -->
        <div class="row g-4 mb-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-0 fw-bold text-secondary pt-3">
                        <i class="bi bi-pie-chart-fill me-2 text-success"></i>ការលក់ប្រចាំថ្ងៃតាមប្រភេទ (Daily Sales)
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <canvas id="dailySalesChart" style="max-height: 280px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-0 fw-bold text-secondary pt-3">
                        <i class="bi bi-graph-up me-2 text-success"></i>ការលក់ប្រចាំខែ (Monthly Sales Trend - {{ date('Y') }})
                    </div>
                    <div class="card-body">
                        <canvas id="monthlySalesChart" style="max-height: 280px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
            <h5 class="fw-bold mb-0 text-secondary">
                <i class="bi bi-table me-2 text-success"></i>
                បញ្ជីការកុម្ម៉ង់ទាំងអស់ (Orders List)
            </h5>
        </div>
        
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">#</th>
                                <th>ឈ្មោះអតិថិជន</th>
                                <th>អ៊ីមែល</th>
                                <th class="text-center">ប្រភេទទំនិញ</th>
                                <th>ឈ្មោះទំនិញ</th>
                                <th class="text-center">ចំនួន</th>
                                <th class="text-center">តម្លៃសរុប</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $index => $order)
                                <tr>
                                    <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                    <td class="fw-semibold text-dark">{{ $order->customer_name }}</td>
                                    <td class="text-muted">{{ $order->customer_email }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary-subtle text-secondary">{{ $order->category }}</span>
                                    </td>
                                    <td class="fw-semibold text-success">{{ $order->item_name }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-primary-subtle text-primary fs-6">{{ number_format($order->quantity) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success-subtle text-success fs-6">${{ number_format($order->total_price, 2) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-receipt text-muted" style="font-size: 50px;"></i>
                                        <h6 class="text-muted mt-3">មិនទាន់មានទិន្នន័យការកុម្ម៉ង់ទេ</h6>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Charts Script Integration -->
    <script>
        // 1. Daily Sales Doughnut Chart
        const dailyCtx = document.getElementById('dailySalesChart').getContext('2d');
        new Chart(dailyCtx, {
            type: 'doughnut',
            data: {
                labels: ['Vegetable', 'Fresh Nut', 'Fruit', 'Egg', 'Farm Animal'],
                datasets: [{
                    data: @json($dailySalesChartData),
                    backgroundColor: ['#198754', '#ffc107', '#0dcaf0', '#fd7e14', '#20c997']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // 2. Monthly Sales Line Chart
        const monthlyCtx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlyData = @json($monthlySales);

        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    { label: 'Vegetable', data: monthlyData.vegetable, borderColor: '#198754', tension: 0.3, fill: false },
                    { label: 'Fresh Nut', data: monthlyData.fresh_nut, borderColor: '#ffc107', tension: 0.3, fill: false },
                    { label: 'Fruit', data: monthlyData.fruit, borderColor: '#0dcaf0', tension: 0.3, fill: false },
                    { label: 'Egg', data: monthlyData.egg, borderColor: '#fd7e14', tension: 0.3, fill: false },
                    { label: 'Farm Animal', data: monthlyData.farmanimal, borderColor: '#20c997', tension: 0.3, fill: false }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
</body>
</html>