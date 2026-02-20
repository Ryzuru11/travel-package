@extends('layouts.guest')

@section('content')
<div class="container-fluid vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6 text-center">
            <div class="error-container">
                <div class="error-icon mb-4">
                    <i class="fas fa-clock" style="font-size: 4rem; color: #ffc107;"></i>
                </div>
                <h1 class="error-title mb-3">Session Expired</h1>
                <p class="error-message mb-4">
                    Sesi Anda telah berakhir untuk keamanan. Silakan login kembali untuk melanjutkan.
                </p>
                <div class="error-actions">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Login Kembali
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-home me-2"></i>
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.error-container {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}

.error-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
}

.error-message {
    font-size: 1.1rem;
    color: #6c757d;
    line-height: 1.6;
}

.error-actions {
    margin-top: 2rem;
}

.btn {
    border-radius: 10px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
</style>
@endsection