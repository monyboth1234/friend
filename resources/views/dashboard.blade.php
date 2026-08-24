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
    <!-- Khmer Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Kantumruy Pro', sans-serif; background-color: #f8f9fa; }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row min-vh-100">
            
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 bg-success text-white p-3 d-flex flex-column justify-content-between">
                <div>
                    <a href="#" class="d-flex align-items-center mb-4 text-white text-decoration-none fs-5 fw-bold">
                        <i class="bi bi-tree-fill me-2"></i> កសិដ្ឋានខ្ញុំ
                    </a>
                    <hr class="border-light">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active bg-light text-success fw-bold">
                                <i class="bi bi-speedometer2 me-2"></i> ផ្ទាំងដើម
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-flower1 me-2"></i> ដំណាំ (Crops)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-bug me-2"></i> សត្វពាហនៈ (Livestock)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-box-seam me-2"></i> ស្តុក & ឧបករណ៍
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-cash-coin me-2"></i> ហិរញ្ញវត្ថុ
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- User Profile & Logout -->
                <div class="border-top pt-3 border-light">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-person-circle fs-3 me-2"></i>
                        <div class="lh-sm">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-white-50">{{ Auth::user()->role }}</small>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> ចាកចេញ (Logout)
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <h2 class="fw-bold mb-0">ផ្ទាំងគ្រប់គ្រងកសិដ្ឋាន</h2>
                        <span class="text-muted">អ៊ីមែល៖ {{ Auth::user()->email }}</span>
                    </div>
                    <button class="btn btn-outline-success">
                        <i class="bi bi-plus-circle me-1"></i> បន្ថែមទិន្នន័យ
                    </button>
                </div>

                <!-- Metrics Grid -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                                    <i class="bi bi-bounding-box-circles fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle text-muted mb-1">ផ្ទៃដីដាំដុះ</h6>
                                    <h4 class="card-title fw-bold mb-0">12.5 ហិកតា</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-warning-subtle text-warning p-3 rounded-circle me-3">
                                    <i class="bi bi-egg-fried fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle text-muted mb-1"></h6>
                                    <h4 class="card-title fw-bold mb-0">145 ក្បាល</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                                    <i class="bi bi-basket fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle text-muted mb-1">ការប្រមូលផល</h6>
                                    <h4 class="card-title fw-bold mb-0">3.2 តោន</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                                    <i class="bi bi-currency-dollar fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle text-muted mb-1">ចំណូលប្រចាំខែ</h6>
                                    <h4 class="card-title fw-bold mb-0">$4,250</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">ស្ថានភាពដំណាំបច្ចុប្បន្ន</h5>
                        <span class="badge bg-success-subtle text-success">បច្ចុប្បន្នភាពចុងក្រោយ</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ឈ្មោះដំណាំ</th>
                                    <th>ទីតាំង/ឡូត៍</th>
                                    <th>ថ្ងៃដាំដុះ</th>
                                    <th>ស្ថានភាព</th>
                                    <th class="text-end">សកម្មភាព</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">ស្រូវសែនក្រអូប</td>
                                    <td>ឡូត៍ A1</td>
                                    <td>12 មករា 2026</td>
                                    <td><span class="badge bg-success-subtle text-success">🌱 កំពុងលូតលាស់</span></td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">ពោតក្រហម</td>
                                    <td>ឡូត៍ B2</td>
                                    <td>05 កុម្ភៈ 2026</td>
                                    <td><span class="badge bg-warning-subtle text-warning">💧 ត្រូវការស្រោចទឹក</span></td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

    <script>
        function toggleMenu(){
            const menu = document.getElementById();

            menu.classList.toggle('hidden')
        }
    </script>

</html>