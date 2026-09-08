<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Nut Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Kantumruy Pro',sans-serif;background:#f4f6f9}
        .sidebar{position:fixed;top:0;bottom:0;left:0;width:260px;height:100vh;background:#198754;z-index:1000;overflow-y:auto;box-shadow:4px 0 10px rgba(0,0,0,.05)}
        .main-content{margin-left:260px;min-height:100vh;padding:1.5rem}
        .sidebar .nav-link{color:rgba(255,255,255,.85);padding:.75rem 1rem;border-radius:.5rem;margin-bottom:.25rem;font-weight:500}
        .sidebar .nav-link:hover{color:#fff;background:rgba(255,255,255,.15)}
        .sidebar .nav-link.active{color:#198754!important;background:#fff!important}
        .stat-card{transition:.2s}
        .stat-card:hover{transform:translateY(-4px);box-shadow:0 10px 20px rgba(0,0,0,.08)!important}
        @media(max-width:767.98px){.sidebar{position:relative;width:100%;height:auto}.main-content{margin-left:0}}
    </style>
</head>
<body>

<aside class="sidebar p-3 d-flex flex-column justify-content-between">
    <div>
        <div class="text-center py-2 mb-2">
            <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" class="img-fluid rounded-circle" style="max-width:120px;background:white;padding:5px">
        </div>
        <hr class="border-light opacity-25">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="bi bi-speedometer2 me-2"></i>ផ្ទាំងដើម</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Arable_lands') }}" class="nav-link"><i class="bi bi-bounding-box-circles me-2"></i>ផ្ទៃដីដាំដុះ</a>
            </li>
            <li class="nav-item my-1">
                <div class="px-3 py-2 text-white-50 fw-bold" style="font-size:.75rem">ប្រភេទទំនិញ</div>
                <ul class="list-unstyled ps-2">
                    <li>
                        <a href="{{ route('vegetable') }}" class="nav-link">
                            <i class="fa-solid fa-carrot me-2"></i>Vegetable
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Fresh_Nut') }}" class="nav-link active">
                            <i class="bi bi-nut me-2"></i>Fresh Nut
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Egg') }}" class="nav-link">
                            <i class="bi bi-egg-fried me-2 text-warning"></i>Egg
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('Fruit') }} " class="nav-link">
                            <i class="bi bi-apple me-2"></i>Fruit
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Farm_Animals') }}" class="nav-link">
                            <i class="bi bi-bug me-2"></i>Farm Animals
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
                <a href="{{ route('homepage') }}" class="nav-link">
                    <i class="fa-solid fa-cart-shopping me-2"></i>Shop
                </a>
            </li>
        </ul>
    </div>

    <div class="border-top border-light border-opacity-25 pt-3 mt-3">
        <div class="d-flex align-items-center mb-3 px-2">
            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>
            <div>
                <div class="fw-bold text-white">{{ Auth::user()->name }}</div>
                <small class="text-white-50">{{ Auth::user()->role }}</small>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-light w-100 btn-sm">
                <i class="bi bi-box-arrow-right me-2"></i>ចាកចេញ
            </button>
        </form>
    </div>
</aside>

<main class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded-3 shadow-sm">
        <div>
            <h3 class="fw-bold text-success mb-1">Fresh Nut</h3>
            <span class="text-muted">
                <i class="bi bi-envelope me-1"></i>{{ Auth::user()->email }}
            </span>
        </div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFreshNutModal">
            <i class="bi bi-plus-circle-fill me-1"></i>បន្ថែម Fresh Nut
        </button>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-info-subtle text-info p-3 rounded-circle me-3">
                        <i class="bi bi-boxes fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted">ចំនួន Fresh Nut សរុប</h6>
                        <h4 class="fw-bold text-success">{{ number_format($totalFreshNut) }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                        <i class="bi bi-tags fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted">ប្រភេទ Fresh Nut</h6>
                        <h4 class="fw-bold text-success">{{ $freshNuts->count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th class="text-center">#</th>
                            <th>រូបភាព</th>
                            <th>ឈ្មោះ Fresh Nut</th>
                            <th class="text-center">តម្លៃ</th>
                            <th class="text-center">ចំនួន</th>
                            <th>ការពិពណ៌នា</th>
                            <th class="text-center">កាលបរិច្ឆេទ</th>
                            <th class="text-center">សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($freshNuts as $index => $freshNut)
                            <tr>
                                <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                <td>
                                    @if($freshNut->image)
                                        <img src="{{ $freshNut->image }}" width="60" height="60" class="rounded-3 shadow-sm" style="object-fit:cover">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px">
                                            <i class="bi bi-nut text-secondary fs-3"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><span class="fw-semibold text-success">{{ $freshNut->name }}</span></td>
                                <td class="text-center">
                                    <span class="badge bg-success-subtle text-success fs-6">
                                        ${{ number_format($freshNut->price,2) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($freshNut->qty > 0)
                                        <span class="badge bg-primary-subtle text-primary">
                                            {{ number_format($freshNut->qty) }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">អស់ពីស្តុក</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $freshNut->description ? Str::limit($freshNut->description,50) : 'មិនមាន' }}
                                </td>
                                <td class="text-center">
                                    {{ $freshNut->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editFreshNutModal{{ $freshNut->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('fresh_nuts.destroy',$freshNut->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុប Fresh Nut នេះមែនទេ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- EDIT MODAL --}}
                            <div class="modal fade" id="editFreshNutModal{{ $freshNut->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title">
                                                <i class="bi bi-pencil-square me-2"></i>កែប្រែ Fresh Nut
                                            </h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('fresh_nuts.update',$freshNut->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">ឈ្មោះ Fresh Nut</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $freshNut->name }}" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold">តម្លៃ</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">$</span>
                                                            <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ $freshNut->price }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold">ចំនួន</label>
                                                        <input type="number" name="qty" class="form-control" min="0" value="{{ $freshNut->qty }}" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">រូបភាព</label>

                                                    @if($freshNut->image)
                                                        <div class="mb-2">
                                                            <img src="{{ $freshNut->image }}" width="80" height="80" class="rounded-3" style="object-fit:cover">
                                                        </div>
                                                    @endif

                                                    <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                                                    <small class="text-muted">ទុកទំនេរ ប្រសិនបើមិនចង់ប្តូររូបភាព</small>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label fw-semibold">ការពិពណ៌នា</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $freshNut->description }}</textarea>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">បោះបង់</button>
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="bi bi-check-circle me-1"></i>រក្សាទុក
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
                                    <i class="bi bi-nut text-muted" style="font-size:50px"></i>
                                    <h6 class="text-muted mt-3">មិនទាន់មាន Fresh Nut ទេ</h6>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

{{-- ADD MODAL --}}
<div class="modal fade" id="addFreshNutModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="bi bi-nut me-2"></i>បន្ថែម Fresh Nut ថ្មី
                </h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fresh_nuts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ឈ្មោះ Fresh Nut</label>
                        <input type="text" name="name" class="form-control" placeholder="ឧ. Cashew" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">តម្លៃ</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="price" class="form-control" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ចំនួន</label>
                            <input type="number" name="qty" class="form-control" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">រូបភាព Fresh Nut</label>
                        <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                        <small class="text-muted">JPG, JPEG, PNG, WEBP — អតិបរមា 5MB</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">ការពិពណ៌នា</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">បោះបង់</button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-cloud-arrow-up me-1"></i>រក្សាទុក
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>