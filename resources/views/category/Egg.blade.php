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
                    <a href="{{ route('Arable_lands') }}" 
                    class="nav-link d-flex align-items-center {{ request()->routeIs('Arable_lands*') ? 'active' : '' }}">
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
                            <a href="{{ route('Fresh_Nut') }}" class="nav-link sub-nav-link d-flex align-items-center">
                                <i class="bi bi-nut me-2"></i> Fresh Nut
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Egg') }}" 
                            class="nav-link sub-nav-link d-flex align-items-center bg-white shadow-sm {{ request()->routeIs('Egg*') ? 'active' : '' }}" 
                            style="background-color: #ffffff; color: #198754; font-weight: 600;">
                                <i class="bi bi-egg-fried me-2 text-warning"></i> Egg
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('Fruit') }} " class="nav-link sub-nav-link d-flex align-items-center">
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
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="bi bi-bag-check-fill me-2 fs-5"></i>
                        <span>ទទួលការបញ្ជាទិញ</span>
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
                <h3 class="fw-bold mb-1 text-success">ស៊ុត(Egg)</h3>
                <span class="text-muted"><i class="bi bi-envelope me-1"></i> អ៊ីមែល៖ {{ Auth::user()->email }}</span>
            </div>
            <button class="btn btn-success d-flex align-items-center gap-2 shadow-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#addEggModal">
                <i class="bi bi-plus-circle-fill fs-5"></i> បន្ថែមចំនួន
            </button>
        </div>

        <!-- Metric Cards -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                            <i class="bi bi-grid-3x3-gap fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនeggសរុប</h6>
                            <h4 class="card-title fw-bold mb-0 text-success">{{ number_format($totalEgg) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-bounding-box-circles fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted mb-1">ចំនួនប្រភេទegg</h6>
                            <h4 class="card-title fw-bold mb-0 text-success">{{ $eggs->count() }}</h4>
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

        {{-- Notifications --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>ជោគជ័យ!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>មានបញ្ហា!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Egg List Table --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
            <h5 class="fw-bold mb-0 text-secondary">
                <i class="bi bi-table me-2 text-success"></i>
                បញ្ជី Egg ទាំងអស់
            </h5>
        </div>
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">#</th>
                                <th>រូបភាព</th>
                                <th>ឈ្មោះ Egg</th>
                                <th class="text-center">តម្លៃ</th>
                                <th class="text-center">ចំនួន</th>
                                <th>ការពិពណ៌នា</th>
                                <th class="text-center">កាលបរិច្ឆេទ</th>
                                <th class="text-center">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($eggs as $index => $egg)
                                <tr>
                                    <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                    <td>
                                        @if($egg->image)
                                            <img src="{{ $egg->image }}" alt="{{ $egg->name }}" width="60" height="60" class="rounded-3 shadow-sm" style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                                <i class="bi bi-egg-fried text-secondary fs-3"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-success">{{ $egg->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success-subtle text-success fs-6">${{ number_format($egg->price, 2) }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($egg->qty > 0)
                                            <span class="badge bg-primary-subtle text-primary">{{ number_format($egg->qty) }}</span>
                                        @else
                                            <span class="badge bg-danger">អស់ពីស្តុក</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($egg->description)
                                            <span class="text-muted">{{ Str::limit($egg->description, 50) }}</span>
                                        @else
                                            <span class="text-muted fst-italic">មិនមាន</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $egg->created_at->format('d/m/Y') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Edit Trigger Button --}}
                                            <button type="button" 
                                                    class="btn btn-sm btn-warning" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editEggModal{{ $egg->id }}" 
                                                    title="កែប្រែ">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            {{-- Delete Form --}}
                                            <form action="{{ route('eggs.destroy', $egg->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុប Egg នេះមែនទេ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="លុប">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Edit Egg Modal (បំបែកសម្រាប់ item នីមួយៗ) --}}
                                <div class="modal fade" id="editEggModal{{ $egg->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title fw-bold">
                                                    <i class="bi bi-pencil-square me-2"></i> កែប្រែព័ត៌មាន Egg
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <form action="{{ route('eggs.update', $egg->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-3 text-start">
                                                        <label class="form-label fw-semibold">ឈ្មោះ Egg <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" value="{{ old('name', $egg->name) }}" required>
                                                    </div>

                                                    <div class="row text-start">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-semibold">តម្លៃ <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">$</span>
                                                                <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ old('price', $egg->price) }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-semibold">ចំនួន <span class="text-danger">*</span></label>
                                                            <input type="number" name="qty" class="form-control" min="0" value="{{ old('qty', $egg->qty) }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 text-start">
                                                        <label class="form-label fw-semibold">រូបភាព Egg</label>
                                                        @if($egg->image)
                                                            <div class="mb-2">
                                                                <img src="{{ $egg->image }}" alt="{{ $egg->name }}" width="70" class="rounded border shadow-sm">
                                                            </div>
                                                        @endif
                                                        <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                                                        <small class="text-muted">ទុកទំនេរ ប្រសិនបើមិនចង់ផ្លាស់ប្តូររូបភាព</small>
                                                    </div>

                                                    <div class="mb-4 text-start">
                                                        <label class="form-label fw-semibold">ការពិពណ៌នា</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ old('description', $egg->description) }}</textarea>
                                                    </div>

                                                    <div class="d-flex justify-content-end gap-2">
                                                        <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">
                                                            <i class="bi bi-x-circle me-1"></i> បោះបង់
                                                        </button>
                                                        <button type="submit" class="btn btn-warning px-4">
                                                            <i class="bi bi-check-circle me-1"></i> រក្សាទុកការកែប្រែ
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <i class="bi bi-egg text-muted" style="font-size: 50px;"></i>
                                        <h6 class="text-muted mt-3">មិនទាន់មាន Egg ទេ</h6>
                                        <button class="btn btn-success btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addEggModal">
                                            <i class="bi bi-plus-circle me-1"></i> បន្ថែម Egg
                                        </button>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    {{-- Add Egg Modal --}}
    <div class="modal fade" id="addEggModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-egg-fried me-2"></i> បន្ថែម Egg ថ្មី
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('eggs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ឈ្មោះ Egg <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="ឧ. Egg A" value="{{ old('name') }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">តម្លៃ <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" class="form-control" step="0.01" min="0" placeholder="ឧ. 5.50" value="{{ old('price') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">ចំនួន <span class="text-danger">*</span></label>
                                <input type="number" name="qty" class="form-control" min="0" placeholder="ឧ. 100" value="{{ old('qty') }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">រូបភាព Egg</label>
                            <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted">JPG, JPEG, PNG, WEBP — អតិបរមា 5MB</small>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">ការពិពណ៌នា</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="បញ្ចូលព័ត៌មានអំពី Egg...">{{ old('description') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> បោះបង់
                            </button>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-cloud-arrow-up me-1"></i> រក្សាទុក Egg
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