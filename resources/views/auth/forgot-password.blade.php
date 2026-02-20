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
                        <h2 class="text-white mb-3">Lupa Password?</h2>
                        <p class="text-white-50">Jangan khawatir, kami akan membantu Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Forgot Password Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-container">
                <div class="text-center mb-4">
                    <img src="{{ asset('image/dilagatourandtravellogo.png') }}" alt="Dilaga Tour Logo" class="auth-logo mb-3">
                    <h3 class="auth-title">Reset Password</h3>
                    <p class="text-muted">Masukkan email Anda untuk mendapatkan link reset password</p>
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

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group mb-4">
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
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-paper-plane me-2"></i>
                        Kirim Link Reset Password
                    </button>

                    <!-- Back to Login -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali ke Login
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

.form-label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
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
@endsection
