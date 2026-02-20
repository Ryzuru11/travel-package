@extends('layouts.guest')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <!-- Success Animation -->
                    <div class="success-animation mb-4">
                        <div class="success-checkmark">
                            <div class="check-icon">
                                <span class="icon-line line-tip"></span>
                                <span class="icon-line line-long"></span>
                                <div class="icon-circle"></div>
                                <div class="icon-fix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <h2 class="text-success mb-3 fw-bold">Pembayaran Berhasil!</h2>
                    <p class="text-muted mb-4 lead">
                        Selamat! Pembayaran Anda telah berhasil diproses dan booking dikonfirmasi.
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
                                        <span class="label">Transaction ID:</span>
                                        <code class="value">{{ $payment->transaction_id }}</code>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Paket Wisata:</span>
                                        <span class="value fw-semibold">{{ $payment->booking->package->package_name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-section">
                                    <h6 class="text-success mb-3">
                                        <i class="fas fa-check-circle me-2"></i>
                                        Status Pembayaran
                                    </h6>
                                    <div class="detail-item">
                                        <span class="label">Total Dibayar:</span>
                                        <span class="value fw-bold text-success">Rp {{ number_format($payment->gross_amount, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Status:</span>
                                        <span class="badge bg-success">{{ ucfirst($payment->transaction_status) }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Waktu:</span>
                                        <span class="value">{{ $payment->transaction_time ? $payment->transaction_time->format('d M Y H:i') : 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Next Steps -->
                    <div class="next-steps-card mb-4">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h6>Konfirmasi</h6>
                                    <p class="small text-muted">Tim kami akan mengkonfirmasi booking dalam 1x24 jam</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h6>Koordinasi</h6>
                                    <p class="small text-muted">Kami akan menghubungi Anda untuk detail perjalanan</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h6>Perjalanan</h6>
                                    <p class="small text-muted">Nikmati perjalanan wisata yang tak terlupakan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('profile.Invoice') }}" class="btn btn-primary w-100">
                                    <i class="fas fa-file-invoice me-2"></i>
                                    Lihat Invoice
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('profile.Booking') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-calendar-check me-2"></i>
                                    Booking Saya
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-home me-2"></i>
                                    Beranda
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="contact-support mt-4">
                        <p class="text-muted mb-2">Butuh bantuan atau ada pertanyaan?</p>
                        <a href="{{ route('contactUs') }}" class="btn btn-success">
                            <i class="fab fa-whatsapp me-2"></i>
                            Hubungi Customer Service
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

/* Success Animation */
.success-animation {
    position: relative;
    margin: 0 auto;
    width: 100px;
    height: 100px;
}

.success-checkmark {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #4bb71b;
    stroke-miterlimit: 10;
    box-shadow: inset 0px 0px 0px #4bb71b;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
    position: relative;
}

.success-checkmark .check-icon {
    width: 56px;
    height: 56px;
    position: absolute;
    left: 22px;
    top: 22px;
    z-index: 1;
    transform: scale(0);
    animation: scale .3s ease-in-out .9s both;
}

.success-checkmark .check-icon .icon-line {
    height: 2px;
    background-color: #4bb71b;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 1;
}

.success-checkmark .check-icon .icon-line.line-tip {
    top: 46px;
    left: 14px;
    width: 25px;
    transform: rotate(45deg);
    animation: icon-line-tip .75s;
}

.success-checkmark .check-icon .icon-line.line-long {
    top: 38px;
    right: 8px;
    width: 47px;
    transform: rotate(-45deg);
    animation: icon-line-long .75s;
}

.success-checkmark .check-icon .icon-circle {
    top: -4px;
    left: -4px;
    z-index: 10;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: absolute;
    box-sizing: content-box;
    border: 4px solid rgba(75, 183, 27, .5);
}

.success-checkmark .check-icon .icon-fix {
    top: 8px;
    width: 5px;
    left: 26px;
    z-index: 1;
    height: 85px;
    position: absolute;
    transform: rotate(-45deg);
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes scale {
    0%, 100% {
        transform: none;
    }
    50% {
        transform: scale3d(1.1, 1.1, 1);
    }
}

@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 60px #4bb71b;
    }
}

@keyframes icon-line-tip {
    0% {
        width: 0;
        left: 1px;
        top: 19px;
    }
    54% {
        width: 0;
        left: 1px;
        top: 19px;
    }
    70% {
        width: 50px;
        left: -8px;
        top: 37px;
    }
    84% {
        width: 17px;
        left: 21px;
        top: 48px;
    }
    100% {
        width: 25px;
        left: 14px;
        top: 45px;
    }
}

@keyframes icon-line-long {
    0% {
        width: 0;
        right: 46px;
        top: 54px;
    }
    65% {
        width: 0;
        right: 46px;
        top: 54px;
    }
    84% {
        width: 55px;
        right: 0px;
        top: 35px;
    }
    100% {
        width: 47px;
        right: 8px;
        top: 38px;
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

/* Next Steps Card */
.next-steps-card {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 15px;
    padding: 2rem;
}

.step-item {
    text-align: center;
}

.step-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.5rem;
}

.step-item h6 {
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
    
    .next-steps-card {
        padding: 1rem;
    }
    
    .step-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}
</style>
@endsection