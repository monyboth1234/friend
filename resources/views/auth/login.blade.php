<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ចូលប្រព័ន្ធកសិកម្ម - Smart Farm Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts (Kantumruy Pro for Khmer) -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-success-subtle min-vh-100 d-flex align-items-center justify-content-center" style="font-family: 'Kantumruy Pro', sans-serif;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
                
                <!-- Farming Header (Using Pure Bootstrap Utilities) -->
                <div class="bg-success bg-gradient text-white p-4 text-center">
                    <div class="display-5 text-warning-subtle mb-2">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h4 class="fw-bold mb-1">ប្រព័ន្ធគ្រប់គ្រងកសិកម្ម</h4>
                    <p class="small text-white-50 mb-0">ចូលប្រើប្រាស់គណនីកសិដ្ឋានរបស់អ្នក</p>
                </div>

                <div class="card-body p-4 p-sm-5">
                    
                    {{-- Success Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>
                            <div>{{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-body-secondary fw-semibold">អ៊ីមែល (Email)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-success"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="name@example.com" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label text-body-secondary fw-semibold">ពាក្យសម្ងាត់ (Password)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-success"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="••••••••" 
                                       required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success fw-bold py-2 rounded-3 shadow-sm">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>ចូលប្រព័ន្ធ
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-secondary mb-0 small">
                                មិនទាន់មានគណនី? 
                                <a href="{{ route('register') }}" class="text-success text-decoration-none fw-semibold">ចុះឈ្មោះទីនេះ</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="text-center mt-4 text-secondary small">
                &copy; {{ date('Y') }} Smart Farm System. រក្សាសិទ្ធិគ្រប់យ៉ាង។
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>