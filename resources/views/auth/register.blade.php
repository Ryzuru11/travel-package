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
                        <h2 class="text-white mb-3">Bergabung dengan Dilaga Tour</h2>
                        <p class="text-white-50">Mulai petualangan Anda bersama kami</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-container">
                <div class="text-center mb-4">
                    <img src="{{ asset('image/dilagatourandtravellogo.png') }}" alt="Dilaga Tour Logo" class="auth-logo mb-3">
                    <h3 class="auth-title">Buat Akun Baru</h3>
                    <p class="text-muted">Daftar untuk memulai petualangan Anda</p>
                </div>

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

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf

                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-2"></i>Nama Lengkap
                        </label>
                        <input id="name" 
                               type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name"
                               placeholder="Masukkan nama lengkap Anda">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
                               autocomplete="username"
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Country -->
                    <div class="form-group mb-3">
                        <label for="user_country" class="form-label">
                            <i class="fas fa-globe me-2"></i>Negara
                        </label>
                        <select id="user_country" 
                                class="form-control @error('user_country') is-invalid @enderror" 
                                name="user_country" 
                                required>
                            <option value="">Pilih Negara</option>
                            <option value="Indonesia" {{ old('user_country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Malaysia" {{ old('user_country') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                            <option value="Singapore" {{ old('user_country') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                            <option value="Thailand" {{ old('user_country') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                            <option value="Philippines" {{ old('user_country') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                            <option value="Australia" {{ old('user_country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                            <option value="Japan" {{ old('user_country') == 'Japan' ? 'selected' : '' }}>Japan</option>
                            <option value="South Korea" {{ old('user_country') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                            <option value="China" {{ old('user_country') == 'China' ? 'selected' : '' }}>China</option>
                            <option value="India" {{ old('user_country') == 'India' ? 'selected' : '' }}>India</option>
                            <option value="United States" {{ old('user_country') == 'United States' ? 'selected' : '' }}>United States</option>
                            <option value="United Kingdom" {{ old('user_country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="Germany" {{ old('user_country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                            <option value="France" {{ old('user_country') == 'France' ? 'selected' : '' }}>France</option>
                            <option value="Netherlands" {{ old('user_country') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                            <option value="Other" {{ old('user_country') == 'Other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('user_country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group mb-3">
                        <label for="phone_number" class="form-label">
                            <i class="fas fa-phone me-2"></i>Nomor Telepon
                        </label>
                        <input id="phone_number" 
                               type="text" 
                               class="form-control @error('phone_number') is-invalid @enderror" 
                               name="phone_number" 
                               value="{{ old('phone_number') }}" 
                               required 
                               autocomplete="phone_number"
                               placeholder="Contoh: +62812345678">
                        @error('phone_number')
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
                                   autocomplete="new-password"
                                   placeholder="Minimal 8 karakter">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock me-2"></i>Konfirmasi Password
                        </label>
                        <div class="input-group">
                            <input id="password_confirmation" 
                                   type="password" 
                                   class="form-control @error('password_confirmation') is-invalid @enderror" 
                                   name="password_confirmation" 
                                   required 
                                   autocomplete="new-password"
                                   placeholder="Ulangi password Anda">
                            <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            Saya setuju dengan <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-user-plus me-2"></i>
                        Daftar Sekarang
                    </button>

                    <!-- Links -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            Sudah punya akun? Masuk di sini
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
    max-width: 450px;
    padding: 2rem;
    max-height: 100vh;
    overflow-y: auto;
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

.form-control, .form-select {
    border-radius: 10px;
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
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
    font-size: 0.9rem;
}

.form-check-label a {
    color: var(--primary-color);
}

@media (max-width: 991px) {
    .auth-form-container {
        padding: 1rem;
        max-height: none;
    }
    
    .auth-form {
        padding: 1.5rem;
    }
}
</style>

<script>
// Toggle password visibility
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

// Toggle password confirmation visibility
document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
    const password = document.getElementById('password_confirmation');
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

// Phone number formatting
document.getElementById('phone_number').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.startsWith('0')) {
        value = '62' + value.substring(1);
    }
    if (!value.startsWith('62') && value.length > 0) {
        value = '62' + value;
    }
    if (value.length > 0) {
        e.target.value = '+' + value;
    }
});
</script>
@endsection
