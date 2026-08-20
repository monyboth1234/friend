<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ចុះឈ្មោះ - ប្រព័ន្ធគ្រប់គ្រងកសិដ្ឋាន</title>
    
    <!-- Google Fonts for Khmer Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Modern Khmer Typography Setup */
        body {
            font-family: 'Kantumruy Pro', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.95rem;
            line-height: 1.6;
            color: #2c3e50;
        }

        h1, h2, h3, h4, h5, h6, .card-title {
            font-family: 'Battambang', 'Kantumruy Pro', sans-serif;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .form-label {
            font-size: 0.9rem;
            letter-spacing: 0.2px;
        }

        .form-control, .btn {
            font-family: 'Kantumruy Pro', sans-serif;
        }

        .form-control::placeholder {
            font-size: 0.85rem;
            color: #adb5bd;
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white text-center py-3 rounded-top">
                    <h3 class="mb-0 fs-5">
                        <i class="fa-solid fa-wheat-awn me-2"></i>ចុះឈ្មោះប្រើប្រាស់ប្រព័ន្ធគ្រប់គ្រងកសិដ្ឋាន
                    </h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <!-- Name Column -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">ឈ្មោះ (Name)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="បញ្ចូលឈ្មោះពេញ" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Column -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">អ៊ីមែល (Email)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="example@farm.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Column -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">ពាក្យសម្ងាត់ (Password)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="បញ្ចូលពាក្យសម្ងាត់" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">បញ្ជាក់ពាក្យសម្ងាត់ (Confirm Password)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-shield-halved"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="បញ្ចូលពាក្យសម្ងាត់ម្ដងទៀត" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm fs-6">
                                <i class="fa-solid fa-user-plus me-1"></i> ចុះឈ្មោះ
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center fs-6">
                            <p class="mb-0">មានគណនីរួចហើយ? <a href="{{ route('login') }}" class="text-decoration-none text-success fw-bold">ចូលប្រព័ន្ធ</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>