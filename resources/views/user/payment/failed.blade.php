@extends('layouts.guest')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <!-- Failed Animation -->
                    <div class="failed-animation mb-4">
                        <div class="failed-icon">
                            <div class="cross-icon">
                                <span class="cross-line cross-line1"></span>
                                <span class="cross-line cross-line2"></span>
                                <div class="cross-circle"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Message -->
                    <h2 class="text-danger mb-3 fw-bold">Pembayaran Gagal</h2>
                    <p class="text-muted mb-4 lead">
                        Maaf, pembayaran Anda tidak dapat diproses. Jangan khawatir, tidak ada biaya yang dikenakan.
                    </p>

                    <!-- Payment Details -->
                    @if($payment)
                    <div class="payment-details-card mb-4">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="detail-section">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Detail Transaksi
                                    </h6>
                                    <div class="detail-item">
                                        <span class="label">Order ID:</span>
                                        <code class="value">{{ $payment->order_id }}</code>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Paket Wisata:</span>
                                        <span class="value fw-semibold">{{ $payment->booking->package->package_name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Tanggal Booking:</span>
                                        <span class="value">{{ \Carbon\Carbon::parse($payment->booking->date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-section">
                                    <h6 class="text-danger mb-3">
                                        <i class="fas fa-times-circle me-2"></i>
                                        Status Pembayaran
                                    </h6>
                                    <div class="detail-item">
                                        <span class="label">Total:</span>
                                        <span class="value fw-bold">Rp {{ number_format($payment->gross_amount, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Status:</span>
                                        <span class="badge bg-danger">{{ ucfirst($payment->transaction_status) }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Booking Status:</span>
                                        <span class="badge bg-warning">Menunggu Pembayaran</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Possible Reasons -->
                    <div class="reasons-card mb-4">
                        <h6 class="text-warning mb-3">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Kemungkinan Penyebab
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="reason-item">
                                    <i class="fas fa-credit-card text-muted"></i>
                                    <span>Saldo atau limit kartu tidak mencukupi</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-item">
                                    <i class="fas fa-wifi text-muted"></i>
                                    <span>Koneksi internet terputus</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-item">
                                    <i class="fas fa-clock text-muted"></i>
                                    <span>Sesi pembayaran telah berakhir</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-item">
                                    <i class="fas fa-ban text-muted"></i>
                                    <span>Transaksi ditolak oleh bank</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Solutions -->
                    <div class="solutions-card mb-4">
                        <h6 class="text-info mb-3">
                            <i class="fas fa-lightbulb me-2"></i>
                            Solusi yang Dapat Dicoba
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="solution-item">
                                    <div class="solution-icon">
                                        <i class="fas fa-redo"></i>
                                    </div>
                                    <h6>Coba Lagi</h6>
                                    <p class="small text-muted">Ulangi proses pembayaran dengan metode yang sama</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="solution-item">
                                    <div class="solution-icon">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <h6>Ganti Metode</h6>
                                    <p class="small text-muted">Gunakan metode pembayaran yang berbeda</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="solution-item">
                                    <div class="solution-icon">
                                        <i class="fas fa-headset"></i>
                                    </div>
                                    <h6>Hubungi Kami</h6>
                                    <p class="small text-muted">Tim support siap membantu Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <div class="row g-3">
                            @if($payment)
                            <div class="col-md-3">
                                <a href="{{ route('payment.create', $payment->booking_id) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-redo me-2"></i>
                                    Coba Lagi
                                </a>
                            </div>
                            @endif
                            <div class="col-md-3">
                                <a href="{{ route('profile.Invoice') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-file-invoice me-2"></i>
                                    Lihat Invoice
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('contactUs') }}" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-phone me-2"></i>
                                    Hubungi Kami
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-home me-2"></i>
                                    Beranda
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="contact-support mt-4">
                        <p class="text-muted mb-2">Butuh bantuan segera?</p>
                        <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-success">
                            <i class="fab fa-whatsapp me-2"></i>
                            Chat WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 20px !important;
}

/* Failed Animation */
.failed-animation {
    position: relative;
    margin: 0 auto;
    width: 100px;
    height: 100px;
}

.failed-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #dc3545;
    stroke-miterlimit: 10;
    box-shadow: inset 0px 0px 0px #dc3545;
    animation: fill-red .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
    position: relative;
}

.failed-icon .cross-icon {
    width: 56px;
    height: 56px;
    position: absolute;
    left: 22px;
    top: 22px;
    z-index: 1;
    transform: scale(0);
    animation: scale .3s ease-in-out .9s both;
}

.failed-icon .cross-icon .cross-line {
    height: 4px;
    background-color: #dc3545;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 1;
    width: 47px;
    top: 26px;
    left: 4px;
}

.failed-icon .cross-icon .cross-line1 {
    transform: rotate(45deg);
    animation: cross-line1 .75s;
}

.failed-icon .cross-icon .cross-line2 {
    transform: rotate(-45deg);
    animation: cross-line2 .75s;
}

.failed-icon .cross-icon .cross-circle {
    top: -4px;
    left: -4px;
    z-index: 10;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: absolute;
    box-sizing: content-box;
    border: 4px solid rgba(220, 53, 69, .5);
}

@keyframes fill-red {
    100% {
        box-shadow: inset 0px 0px 0px 60px #dc3545;
    }
}

@keyframes cross-line1 {
    0% {
        transform: rotate(0deg) scale(0);
    }
    100% {
        transform: rotate(45deg) scale(1);
    }
}

@keyframes cross-line2 {
    0% {
        transform: rotate(0deg) scale(0);
    }
    100% {
        transform: rotate(-45deg) scale(1);
    }
}

/* Payment Details Card */
.payment-details-card {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid #e9ecef;
}

.detail-section {
    padding: 0 1rem;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item .label {
    font-weight: 500;
    color: #6c757d;
}

.detail-item .value {
    color: #495057;
}

.detail-item code {
    background: #e9ecef;
    padding: 0.25rem 0.5rem;
    border-radius: 5px;
    font-size: 0.9rem;
}

/* Reasons Card */
.reasons-card {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    border-radius: 15px;
    padding: 1.5rem;
}

.reason-item {
    display: flex;
    align-items: center;
    padding: 0.5rem;
    background: white;
    border-radius: 8px;
    margin-bottom: 0.5rem;
}

.reason-item i {
    margin-right: 0.75rem;
    width: 20px;
}

.reason-item span {
    font-size: 0.9rem;
    color: #495057;
}

/* Solutions Card */
.solutions-card {
    background: white;
    border: 1px solid #bee5eb;
    border-radius: 15px;
    padding: 2rem;
}

.solution-item {
    text-align: center;
}

.solution-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #17a2b8, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.5rem;
}

.solution-item h6 {
    color: #495057;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Buttons */
.btn {
    border-radius: 25px;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
}

.contact-support {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 1.5rem;
}

@media (max-width: 768px) {
    .payment-details-card {
        padding: 1rem;
    }
    
    .detail-section {
        padding: 0;
        margin-bottom: 1rem;
    }
    
    .reasons-card, .solutions-card {
        padding: 1rem;
    }
    
    .solution-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .action-buttons .col-md-3 {
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection