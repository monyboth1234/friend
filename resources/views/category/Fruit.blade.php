```blade
<!DOCTYPE html>
<html lang="km">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>គ្រប់គ្រងផ្លែឈើ (Fruit Management)</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
          rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Khmer Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap"
          rel="stylesheet">
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

        /* Main Content */
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

        /* Nav Link */

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


        /* Scrollbar */

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }


        /* Metric Cards */

        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }


        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }


        /* Fruit Image */

        .fruit-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
        }

    </style>

</head>


<body>


<!-- ===================================================== -->
<!-- SIDEBAR -->
<!-- ===================================================== -->

<aside class="sidebar p-3 d-flex flex-column justify-content-between">

    <div>

        <!-- Farm Logo -->

        <div class="text-center py-2 mb-2">

            <img src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9"
                 alt="Farm Logo"
                 class="img-fluid rounded-circle shadow-sm"
                 style="max-width: 120px; background: white; padding: 5px;">

        </div>


        <hr class="border-light opacity-25">


        <!-- Navigation -->

        <ul class="nav nav-pills flex-column mb-auto">


            <!-- Dashboard -->

            <li class="nav-item">

                <a href="{{ route('dashboard') }}"
                   class="nav-link d-flex align-items-center">

                    <i class="bi bi-speedometer2 me-2 fs-5"></i>

                    ផ្ទាំងដើម

                </a>

            </li>


            <!-- Arable Land -->

            <li class="nav-item">

                <a href="{{ route('Arable_lands') }}"
                   class="nav-link d-flex align-items-center">

                    <i class="bi bi-bounding-box-circles me-2 fs-5"></i>

                    ផ្ទៃដីដាំដុះ

                </a>

            </li>


            <!-- Categories -->

            <li class="nav-item my-1">

                <div class="px-3 py-2 text-uppercase text-white-50 fw-bold"
                     style="font-size: 0.75rem; letter-spacing: 1px;">

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
                        <a href="{{ route('Fresh_Nut') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-nut me-2"></i>
                            Fresh Nut
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Egg') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-egg-fried me-2 text-warning"></i>
                            Egg
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Fruit') }}"
                           class="nav-link sub-nav-link d-flex align-items-center active">
                            <i class="bi bi-apple me-2"></i>
                            Fruit
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Farm_Animals') }}"
                           class="nav-link sub-nav-link d-flex align-items-center">
                            <i class="bi bi-bug me-2"></i>
                            Farm Animals
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


            <!-- Shop -->

            <li class="nav-item">

                <a href="{{ route('homepage') }}"
                   class="nav-link d-flex align-items-center">

                    <i class="fa-solid fa-cart-shopping me-2 fs-5"></i>

                    Shop

                </a>

            </li>

        </ul>

    </div>


    <!-- User Profile -->

    <div class="border-top border-light border-opacity-25 pt-3 mt-3">

        <div class="d-flex align-items-center mb-3 px-2">

            <i class="bi bi-person-circle fs-2 me-2 text-white"></i>

            <div class="lh-sm text-truncate">

                <div class="fw-bold text-white text-truncate">

                    {{ Auth::user()->name }}

                </div>

                <small class="text-white-50">

                    {{ Auth::user()->role }}

                </small>

            </div>

        </div>


        <!-- Logout -->

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit"
                    class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2">

                <i class="bi bi-box-arrow-right"></i>

                ចាកចេញ (Logout)

            </button>

        </form>

    </div>

</aside>



<!-- ===================================================== -->
<!-- MAIN CONTENT -->
<!-- ===================================================== -->

<main class="main-content">


    <!-- Header -->

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom bg-white p-3 rounded-3 shadow-sm">

        <div>

            <h3 class="fw-bold mb-1 text-success">

                <i class="bi bi-apple me-2"></i>

                ផ្លែឈើ (Fruit)

            </h3>

            <span class="text-muted">

                <i class="bi bi-envelope me-1"></i>

                អ៊ីមែល៖ {{ Auth::user()->email }}

            </span>

        </div>


        <!-- Add Button -->

        <button class="btn btn-success d-flex align-items-center gap-2 shadow-sm px-3 py-2"
                data-bs-toggle="modal"
                data-bs-target="#addFruitModal">

            <i class="bi bi-plus-circle-fill fs-5"></i>

            បន្ថែម Fruit

        </button>

    </div>



    <!-- ================================================= -->
    <!-- METRIC CARDS -->
    <!-- ================================================= -->

    <div class="row g-3 mb-4">


        <!-- Total Fruit -->

        <div class="col-sm-6 col-xl-4">

            <div class="card border-0 shadow-sm rounded-3 stat-card h-100">

                <div class="card-body d-flex align-items-center">

                    <div class="bg-info-subtle text-info p-3 rounded-circle me-3">

                        <i class="bi bi-boxes fs-3"></i>

                    </div>

                    <div>

                        <h6 class="card-subtitle text-muted mb-1">

                            ចំនួនផ្លែឈើសរុប

                        </h6>

                        <h4 class="card-title fw-bold mb-0 text-success">

                            {{ number_format($totalFruit) }}

                        </h4>

                    </div>

                </div>

            </div>

        </div>


        <!-- Fruit Types -->

        <div class="col-sm-6 col-xl-4">

            <div class="card border-0 shadow-sm rounded-3 stat-card h-100">

                <div class="card-body d-flex align-items-center">

                    <div class="bg-success-subtle text-success p-3 rounded-circle me-3">

                        <i class="bi bi-tags fs-3"></i>

                    </div>

                    <div>

                        <h6 class="card-subtitle text-muted mb-1">

                            ចំនួនប្រភេទ Fruit

                        </h6>

                        <h4 class="card-title fw-bold mb-0 text-success">

                            {{ $fruits->count() }}

                        </h4>

                    </div>

                </div>

            </div>

        </div>


        <!-- Status -->

        <div class="col-sm-6 col-xl-4">

            <div class="card border-0 shadow-sm rounded-3 stat-card h-100">

                <div class="card-body d-flex align-items-center">

                    <div class="bg-warning-subtle text-warning p-3 rounded-circle me-3">

                        <i class="bi bi-heart-pulse fs-3"></i>

                    </div>

                    <div>

                        <h6 class="card-subtitle text-muted mb-1">

                            ស្ថានភាព

                        </h6>

                        <h4 class="card-title fw-bold mb-0 text-dark">

                            Active Fruits

                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- NOTIFICATIONS -->
    <!-- ================================================= -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3"
             role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            <strong>ជោគជ័យ!</strong>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3"
             role="alert">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            <strong>មានបញ្ហា!</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif



    <!-- ================================================= -->
    <!-- FRUIT LIST -->
    <!-- ================================================= -->

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">

        <h5 class="fw-bold mb-0 text-secondary">

            <i class="bi bi-table me-2 text-success"></i>

            បញ្ជី Fruit ទាំងអស់

        </h5>

    </div>


    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">


                    <!-- TABLE HEADER -->

                    <thead class="table-success">

                        <tr>

                            <th class="text-center">
                                #
                            </th>

                            <th>
                                រូបភាព
                            </th>

                            <th>
                                ឈ្មោះ Fruit
                            </th>

                            <th class="text-center">
                                តម្លៃ
                            </th>

                            <th class="text-center">
                                ចំនួន
                            </th>

                            <th>
                                ការពិពណ៌នា
                            </th>

                            <th class="text-center">
                                កាលបរិច្ឆេទ
                            </th>

                            <th class="text-center">
                                សកម្មភាព
                            </th>

                        </tr>

                    </thead>


                    <!-- TABLE BODY -->

                    <tbody>

                        @forelse($fruits as $index => $fruit)

                            <tr>


                                <!-- Number -->

                                <td class="text-center fw-bold">

                                    {{ $index + 1 }}

                                </td>


                                <!-- Image -->

                                <td>

                                    @if($fruit->image)

                                        <img src="{{ $fruit->image }}"
                                             alt="{{ $fruit->name }}"
                                             class="fruit-image shadow-sm">

                                    @else

                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                             style="width:60px;height:60px;">

                                            <i class="bi bi-apple text-secondary fs-3"></i>

                                        </div>

                                    @endif

                                </td>


                                <!-- Name -->

                                <td>

                                    <span class="fw-semibold text-success">

                                        {{ $fruit->name }}

                                    </span>

                                </td>


                                <!-- Price -->

                                <td class="text-center">

                                    <span class="badge bg-success-subtle text-success fs-6">

                                        ${{ number_format($fruit->price, 2) }}

                                    </span>

                                </td>


                                <!-- Quantity -->

                                <td class="text-center">

                                    @if($fruit->qty > 0)

                                        <span class="badge bg-primary-subtle text-primary">

                                            {{ number_format($fruit->qty) }}

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            អស់ពីស្តុក

                                        </span>

                                    @endif

                                </td>


                                <!-- Description -->

                                <td>

                                    @if($fruit->description)

                                        <span class="text-muted">

                                            {{ Str::limit($fruit->description, 50) }}

                                        </span>

                                    @else

                                        <span class="text-muted fst-italic">

                                            មិនមាន

                                        </span>

                                    @endif

                                </td>
                                <!-- Date -->
                                <td class="text-center">

                                    <small class="text-muted">

                                        {{ $fruit->created_at->format('d/m/Y') }}

                                    </small>
                                </td>
                                <!-- Actions -->
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- EDIT BUTTON -->
                                        <button type="button" 
                                                class="btn btn-sm btn-warning d-inline-flex align-items-center justify-content-center" 
                                                style="width: 31px; height: 31px; padding: 0;"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editFruitModal{{ $fruit->id }}" 
                                                title="កែប្រែ">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <!-- DELETE BUTTON -->
                                        <form action="{{ route('fruit.destroy', $fruit->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុប Fruit នេះមែនទេ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center" 
                                                    style="width: 31px; height: 31px; padding: 0;"
                                                    title="លុប">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- ================================================= -->
                            <!-- EDIT FRUIT MODAL -->
                            <!-- ================================================= -->

                            <div class="modal fade"
                                 id="editFruitModal{{ $fruit->id }}"
                                 tabindex="-1"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-lg modal-dialog-centered">

                                    <div class="modal-content border-0 shadow-lg"
                                         style="border-radius: 12px;">


                                        <!-- Modal Header -->

                                        <div class="modal-header bg-warning text-dark">

                                            <h5 class="modal-title fw-bold">

                                                <i class="bi bi-pencil-square me-2"></i>

                                                កែប្រែព័ត៌មាន Fruit

                                            </h5>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal">
                                            </button>

                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body p-4">
                                            <form action="{{ route('fruit.update', $fruit->id) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data">

                                                @csrf

                                                @method('PUT')
                                                <!-- Name -->
                                                <div class="mb-3">

                                                    <label class="form-label fw-semibold">

                                                        ឈ្មោះ Fruit

                                                        <span class="text-danger">*</span>

                                                    </label>

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           value="{{ old('name', $fruit->name) }}"
                                                           required>

                                                </div>


                                                <!-- Price + Quantity -->

                                                <div class="row">


                                                    <!-- Price -->

                                                    <div class="col-md-6 mb-3">

                                                        <label class="form-label fw-semibold">

                                                            តម្លៃ

                                                            <span class="text-danger">*</span>

                                                        </label>

                                                        <div class="input-group">

                                                            <span class="input-group-text">
                                                                $
                                                            </span>

                                                            <input type="number"
                                                                   name="price"
                                                                   class="form-control"
                                                                   step="0.01"
                                                                   min="0"
                                                                   value="{{ old('price', $fruit->price) }}"
                                                                   required>

                                                        </div>

                                                    </div>


                                                    <!-- Quantity -->

                                                    <div class="col-md-6 mb-3">

                                                        <label class="form-label fw-semibold">

                                                            ចំនួន

                                                            <span class="text-danger">*</span>

                                                        </label>

                                                        <input type="number"
                                                               name="qty"
                                                               class="form-control"
                                                               min="0"
                                                               value="{{ old('qty', $fruit->qty) }}"
                                                               required>

                                                    </div>

                                                </div>


                                                <!-- Current Image -->

                                                <div class="mb-3">

                                                    <label class="form-label fw-semibold">

                                                        រូបភាពបច្ចុប្បន្ន

                                                    </label>


                                                    @if($fruit->image)

                                                        <div class="mb-2">

                                                            <img src="{{ $fruit->image }}"
                                                                 alt="{{ $fruit->name }}"
                                                                 width="100"
                                                                 height="100"
                                                                 class="rounded-3 border shadow-sm"
                                                                 style="object-fit: cover;">

                                                        </div>

                                                    @else

                                                        <div class="text-muted mb-2">

                                                            មិនមានរូបភាព

                                                        </div>

                                                    @endif

                                                </div>


                                                <!-- New Image -->

                                                <div class="mb-3">

                                                    <label class="form-label fw-semibold">

                                                        រូបភាពថ្មី

                                                    </label>

                                                    <input type="file"
                                                           name="image"
                                                           class="form-control"
                                                           accept="image/png,image/jpeg,image/jpg,image/webp">

                                                    <small class="text-muted">

                                                        ទុកទំនេរ ប្រសិនបើមិនចង់ផ្លាស់ប្តូររូបភាព

                                                    </small>

                                                </div>


                                                <!-- Description -->

                                                <div class="mb-4">

                                                    <label class="form-label fw-semibold">

                                                        ការពិពណ៌នា

                                                    </label>

                                                    <textarea name="description"
                                                              class="form-control"
                                                              rows="3"
                                                              placeholder="បញ្ចូលព័ត៌មានអំពី Fruit...">{{ old('description', $fruit->description) }}</textarea>

                                                </div>


                                                <!-- Buttons -->

                                                <div class="d-flex justify-content-end gap-2">

                                                    <button type="button"
                                                            class="btn btn-light border px-4"
                                                            data-bs-dismiss="modal">

                                                        <i class="bi bi-x-circle me-1"></i>

                                                        បោះបង់

                                                    </button>


                                                    <button type="submit"
                                                            class="btn btn-warning px-4">

                                                        <i class="bi bi-check-circle me-1"></i>

                                                        រក្សាទុកការកែប្រែ

                                                    </button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        @empty


                            <!-- EMPTY -->

                            <tr>

                                <td colspan="8"
                                    class="text-center py-5">

                                    <i class="bi bi-apple text-muted"
                                       style="font-size: 50px;">
                                    </i>

                                    <h6 class="text-muted mt-3">

                                        មិនទាន់មាន Fruit ទេ

                                    </h6>


                                    <button class="btn btn-success btn-sm mt-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addFruitModal">

                                        <i class="bi bi-plus-circle me-1"></i>

                                        បន្ថែម Fruit

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



<!-- ===================================================== -->
<!-- ADD FRUIT MODAL -->
<!-- ===================================================== -->

<div class="modal fade"
     id="addFruitModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg"
                     style="border-radius: 12px;">


            <!-- Header -->

            <div class="modal-header bg-success text-white">

                <h5 class="modal-title fw-bold">

                    <i class="bi bi-apple me-2"></i>

                    បន្ថែម Fruit ថ្មី

                </h5>


                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <!-- Body -->

            <div class="modal-body p-4">

                <form action="{{ route('fruit.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    <!-- Name -->

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            ឈ្មោះ Fruit

                            <span class="text-danger">*</span>

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="ឧ. Apple"
                               value="{{ old('name') }}"
                               required>

                    </div>


                    <!-- Price + Quantity -->

                    <div class="row">


                        <!-- Price -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                តម្លៃ

                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    $
                                </span>

                                <input type="number"
                                       name="price"
                                       class="form-control"
                                       step="0.01"
                                       min="0"
                                       placeholder="ឧ. 5.50"
                                       value="{{ old('price') }}"
                                       required>

                            </div>

                        </div>


                        <!-- Quantity -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                ចំនួន

                                <span class="text-danger">*</span>

                            </label>

                            <input type="number"
                                   name="qty"
                                   class="form-control"
                                   min="0"
                                   placeholder="ឧ. 100"
                                   value="{{ old('qty') }}"
                                   required>

                        </div>

                    </div>


                    <!-- Image -->

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            រូបភាព Fruit

                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/png,image/jpeg,image/jpg,image/webp">

                        <small class="text-muted">

                            JPG, JPEG, PNG, WEBP — អតិបរមា 5MB

                        </small>

                    </div>


                    <!-- Description -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            ការពិពណ៌នា

                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="បញ្ចូលព័ត៌មានអំពី Fruit...">{{ old('description') }}</textarea>

                    </div>


                    <!-- Buttons -->

                    <div class="d-flex justify-content-end gap-2">

                        <button type="button"
                                class="btn btn-light border px-4"
                                data-bs-dismiss="modal">

                            <i class="bi bi-x-circle me-1"></i>

                            បោះបង់

                        </button>


                        <button type="submit"
                                class="btn btn-success px-4">

                            <i class="bi bi-cloud-arrow-up me-1"></i>

                            រក្សាទុក Fruit

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>



<!-- Bootstrap 5 JS Bundle -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
```
