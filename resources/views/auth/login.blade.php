@extends('layouts.guest')

@section('content')
<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Left Side - Image -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="auth-image-container">
                <img src="{{ asset('image/sigiriya1.jpg') }}" alt="Dilaga Tour" class="auth-image">
                <div class="auth-overlay">
                    <div class="auth-overlay-content">
                        <h2 class="text-white mb-3">Selamat Datang di Dilaga Tour</h2>
                        <p class="text-white-50">Jelajahi keindahan Lombok & Komodo bersama kami</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-container">
                <div class="text-center mb-4">
                    <img src="{{ asset('image/dilagatourandtravellogo.png') }}" alt="Dilaga Tour Logo" class="auth-logo mb-3">
                    <h3 class="auth-title">Masuk ke Akun Anda</h3>
                    <p class="text-muted">Silakan masuk untuk melanjutkan</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form" id="loginForm">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input id="email" 
                               type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <div class="input-group">
                            <input id="password" 
                                   type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="Masukkan password Anda">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Masuk
                    </button>

                    <!-- Links -->
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none me-3">
                                Lupa password?
                            </a>
                        @endif
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            Belum punya akun? Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.auth-image-container {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

.auth-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.auth-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.6));
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-overlay-content {
    text-align: center;
    padding: 2rem;
}

.auth-form-container {
    width: 100%;
    max-width: 400px;
    padding: 2rem;
}

.auth-logo {
    height: 80px;
    width: auto;
}

.auth-title {
    color: var(--dark-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.auth-form {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-control {
    border-radius: 10px;
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-outline-secondary {
    border-color: #e9ecef;
    color: #6c757d;
}

.form-label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.form-check-label {
    color: var(--muted-color);
}

@media (max-width: 991px) {
    .auth-form-container {
        padding: 1rem;
    }
    
    .auth-form {
        padding: 1.5rem;
    }
}
</style>

<script>
document.getElementById('togglePassword').addEventListener('click', function() {
    const password = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

// CSRF Token Refresh
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const csrfToken = document.getElementById('csrf-token');
    
    // Refresh CSRF token before form submission
    form.addEventListener('submit', function(e) {
        // Get fresh CSRF token from meta tag
        const metaToken = document.querySelector('meta[name="csrf-token"]');
        if (metaToken) {
            csrfToken.value = metaToken.getAttribute('content');
        }
    });
    
    // Handle 419 error by refreshing the page
    if (window.location.search.includes('419') || document.title.includes('419')) {
        setTimeout(function() {
            window.location.href = '{{ route("login") }}';
        }, 2000);
    }
});
</script>
@endsection
