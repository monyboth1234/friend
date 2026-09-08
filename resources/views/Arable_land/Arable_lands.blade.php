<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>គ្រប់គ្រងផ្ទៃដីដាំដុះ (Arable Farm Management)</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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

        /* Land Card Modern Style */
        .land-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #ffffff;
            transition: all 0.25s ease-in-out;
        }
        .land-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
            border-color: #198754;
        }
        .icon-circle {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
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
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
                        <i class="bi bi-speedometer2 me-2 fs-5"></i> ផ្ទាំងដើម
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('Arable_lands') }}" class="nav-link active d-flex align-items-center">
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
                            <a href="{{ route('vegetable') }}"
                            class="nav-link sub-nav-link d-flex align-items-center">

                                <i class="fa-solid fa-carrot me-2"></i>
                                Vegetable

                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sub-nav-link d-flex align-items-center">
                                <i class="bi bi-nut me-2"></i> Fresh Nut
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Egg') }}" class="nav-link sub-nav-link d-flex align-items-center">
                                <i class="bi bi-egg-fried me-2"></i> Egg
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sub-nav-link d-flex align-items-center">
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
                <h3 class="fw-bold mb-1 text-success">គ្រប់គ្រងផ្ទៃដីដាំដុះ (Arable Farm)</h3>
                <span class="text-muted"><i class="bi bi-envelope me-1"></i> អ៊ីមែល៖ {{ Auth::user()->email }}</span>
            </div>
            <button class="btn btn-success d-flex align-items-center gap-2 shadow-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#addLandModal">
                <i class="bi bi-plus-circle-fill fs-5"></i> បន្ថែមផ្ទៃដីថ្មី
            </button>
        </div>

        <!-- Metrics Stat Grid -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-bounding-box-circles fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ផ្ទៃដីសរុប</h6>
                            <h4 class="card-title fw-bold mb-0 text-success">{{ number_format($totalArea, 2) }} ហិកតា</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                            <i class="bi bi-grid-3x3-gap fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនឡូរសរុប</h6>
                            <h4 class="card-title fw-bold mb-0 text-dark">{{ $totalLand }} ឡូរ</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning-subtle text-warning p-3 rounded-circle me-3">
                            <i class="bi bi-sprout fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ឡូរកំពុងប្រើប្រាស់</h6>
                            <h4 class="card-title fw-bold mb-0 text-dark">Active Land Plots</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Action Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <h5 class="fw-bold mb-0 text-secondary">
                <i class="bi bi-journals me-2 text-success"></i>បញ្ជីដីដាំដុះទាំងអស់
            </h5>
            <div class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 shadow-none" placeholder="ស្វែងរកឈ្មោះ ឬទីតាំង...">
                </div>
            </div>
        </div>

        <!-- Arable Land Cards Grid -->
        <div class="row g-3">
            @forelse($arableLand as $land)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="land-card h-100 d-flex flex-column justify-content-between p-3 shadow-sm">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="icon-circle bg-success-subtle text-success">
                                        <i class="bi bi-bounding-box fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0 fs-6">{{ $land->name }}</h6>
                                        <small class="text-muted"><i class="bi bi-geo-alt me-1 text-danger"></i>{{ $land->location ?? 'មិនមានទីតាំង' }}</small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">សកម្ម</span>
                            </div>

                            <div class="bg-light p-3 rounded-3 mb-3 border border-light-subtle">
                                <span class="text-muted small d-block mb-1">ទំហំផ្ទៃដី</span>
                                <div class="h3 fw-bold text-success mb-0">
                                    {{ number_format($land->area, 2) }}
                                    <span class="fs-6 text-muted fw-normal">{{ $land->unit }}</span>
                                </div>
                            </div>

                            @if($land->description)
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-info-circle me-1"></i>{{ $land->description }}
                                </p>
                            @endif
                        </div>

                        <!-- Card Actions -->
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <button class="btn btn-sm btn-link text-decoration-none text-muted p-0">
                                <i class="bi bi-eye me-1"></i>មើលលម្អិត
                            </button>
                            
                            <form action="{{ route('Arable_land.destroy', $land->id) }}" method="POST" onsubmit="return confirm('តើអ្នកប្រាកដជាចង់លុបទិន្នន័យនេះមែនទេ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger-subtle text-danger border border-danger-subtle px-3">
                                    <i class="bi bi-trash me-1"></i> លុប
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center p-5">
                        <div class="text-muted mb-2">
                            <i class="bi bi-inbox fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-secondary">មិនទាន់មានទិន្នន័យផ្ទៃដីទេ</h5>
                        <p class="text-muted small mb-0">សូមចុចប៊ូតុង "បន្ថែមផ្ទៃដីថ្មី" ខាងលើដើម្បីបញ្ចូលទិន្នន័យ។</p>
                    </div>
                </div>
            @endforelse
        </div>

    </main>

    <!-- Modal Form for Adding New Land -->
    <div class="modal fade" id="addLandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-plus-circle me-2"></i>បន្ថែមផ្ទៃដីដាំដុះថ្មី
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('Arable_land.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ឈ្មោះដី / ឡូរ <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control shadow-none" placeholder="ឧ. ដីចំការ A1" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">ទំហំផ្ទៃដី <span class="text-danger">*</span></label>
                                <input type="number" name="area" class="form-control shadow-none" step="0.01" min="0" placeholder="ឧ. 10.5" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">ឯកតា <span class="text-danger">*</span></label>
                                <select name="unit" class="form-select shadow-none" required>
                                    <option value="hectare">Hectare (ហិកតា)</option>
                                    <option value="acre">Acre</option>
                                    <option value="m²">m²</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ទីតាំង</label>
                            <input type="text" name="location" class="form-control shadow-none" placeholder="ឧ. ភូមិ A, ឃុំ B">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">ការពិពណ៌នាបន្ថែម</label>
                            <textarea name="description" class="form-control shadow-none" rows="3" placeholder="បញ្ជាក់ព័ត៌មានបន្ថែម..."></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">បោះបង់</button>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save me-1"></i> រក្សាទុក
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>