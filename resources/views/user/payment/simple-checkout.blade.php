@extends('layouts.guest')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            {{-- Header --}}
            <div class="text-center mb-4">
                <h2 class="text-primary fw-bold">
                    <i class="fas fa-credit-card me-2"></i>
                    Pilih Metode Pembayaran
                </h2>
                <p class="text-muted">Pilih metode pembayaran yang Anda inginkan untuk menyelesaikan booking</p>
            </div>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-0">
                    <div class="row g-0">
                        {{-- Booking Summary --}}
                        <div class="col-lg-5 bg-light p-4">
                            <h5 class="text-primary mb-4">
                                <i class="fas fa-info-circle me-2"></i>
                                Ringkasan Booking
                            </h5>
                            
                            {{-- Package Info --}}
                            <div class="package-summary-card mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="package-icon me-3">
                                        <i class="fas fa-suitcase"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold text-dark">{{ $booking->package->package_name ?? 'N/A' }}</h6>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                                        </p>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <span class="badge bg-primary">
                                                <i class="fas fa-user me-1"></i>
                                                {{ $booking->number_of_adult }} Dewasa
                                            </span>
                                            @if($booking->number_of_child > 0)
                                            <span class="badge bg-info">
                                                <i class="fas fa-child me-1"></i>
                                                {{ $booking->number_of_child }} Anak
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Booking Details --}}
                            <div class="booking-details mb-4">
                                <div class="detail-row">
                                    <span class="label">Order ID:</span>
                                    <code class="value">DLG-{{ $booking->id }}-{{ date('Ymd') }}</code>
                                </div>
                                <div class="detail-row">
                                    <span class="label">Lokasi Penjemputan:</span>
                                    <span class="badge bg-success">{{ $booking->pick_up_location }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="label">Detail Lokasi:</span>
                                    <span class="value">{{ Str::limit($booking->pick_up_location_details, 30) }}</span>
                                </div>
                            </div>

                            {{-- Total Amount --}}
                            <div class="total-card">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Subtotal:</span>
                                    <span class="fw-semibold">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Pajak & Biaya Admin:</span>
                                    <span class="fw-semibold text-success">Gratis</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span class="h5 fw-bold text-dark">Total:</span>
                                    <span class="h4 fw-bold text-success">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Methods --}}
                        <div class="col-lg-7 p-4">
                            <h5 class="text-primary mb-4">
                                <i class="fas fa-credit-card me-2"></i>
                                Pilih Metode Pembayaran
                            </h5>

                            <form id="paymentForm" action="{{ route('payment.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                
                                {{-- Bank Transfer --}}
                                <div class="payment-method-card mb-3" data-method="bank_transfer">
                                    <input type="radio" name="payment_method" value="bank_transfer" id="bank_transfer" class="payment-radio">
                                    <label for="bank_transfer" class="payment-label">
                                        <div class="d-flex align-items-center">
                                            <div class="method-icon me-3">
                                                <i class="fas fa-university"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="method-title">Transfer Bank</h6>
                                                <p class="method-description">Transfer langsung ke rekening bank kami</p>
                                                <div class="bank-options">
                                                    <span class="bank-badge">BCA</span>
                                                    <span class="bank-badge">Mandiri</span>
                                                    <span class="bank-badge">BNI</span>
                                                    <span class="bank-badge">BRI</span>
                                                </div>
                                            </div>
                                            <div class="method-check">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                {{-- QRIS --}}
                                <div class="payment-method-card mb-4" data-method="qris">
                                    <input type="radio" name="payment_method" value="qris" id="qris" class="payment-radio">
                                    <label for="qris" class="payment-label">
                                        <div class="d-flex align-items-center">
                                            <div class="method-icon me-3">
                                                <i class="fas fa-qrcode"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="method-title">QRIS</h6>
                                                <p class="method-description">Scan QR Code untuk pembayaran instan</p>
                                                <div class="qris-options">
                                                    <span class="qris-badge">GoPay</span>
                                                    <span class="qris-badge">OVO</span>
                                                    <span class="qris-badge">DANA</span>
                                                    <span class="qris-badge">ShopeePay</span>
                                                </div>
                                            </div>
                                            <div class="method-check">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                {{-- Submit Button --}}
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg py-3" id="submitBtn" disabled>
                                        <i class="fas fa-arrow-right me-2"></i>
                                        Lanjutkan Pembayaran
                                    </button>
                                </div>
                            </form>

                            {{-- Security Info --}}
                            <div class="security-info mt-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-shield-alt text-success me-2"></i>
                                    <small class="text-muted">Transaksi Anda aman dan terlindungi</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Help Section --}}
            <div class="text-center mt-4">
                <p class="text-muted mb-2">Butuh bantuan?</p>
                <a href="{{ route('contactUs') }}" class="btn btn-outline-primary">
                    <i class="fas fa-headset me-2"></i>
                    Hubungi Customer Service
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentRadios = document.querySelectorAll('.payment-radio');
    const paymentCards = document.querySelectorAll('.payment-method-card');
    const submitBtn = document.getElementById('submitBtn');
    
    // Handle payment method selection
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove active class from all cards
            paymentCards.forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to selected card
            if (this.checked) {
                this.closest('.payment-method-card').classList.add('active');
                submitBtn.disabled = false;
            }
        });
    });
    
    // Handle card click
    paymentCards.forEach(card => {
        card.addEventListener('click', function() {
            const radio = this.querySelector('.payment-radio');
            radio.checked = true;
            radio.dispatchEvent(new Event('change'));
        });
    });
});
</script>

<style>
.card {
    border-radius: 20px !important;
}

.package-summary-card {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 15px;
    padding: 1.5rem;
}

.package-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.booking-details {
    background: white;
    border-radius: 10px;
    padding: 1rem;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-row .label {
    font-weight: 500;
    color: #6c757d;
    font-size: 0.9rem;
}

.detail-row .value {
    color: #495057;
    font-size: 0.9rem;
}

.total-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    border: 2px solid #28a745;
}

.payment-method-card {
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 0;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
}

.payment-method-card:hover {
    border-color: #667eea;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1);
}

.payment-method-card.active {
    border-color: #28a745;
    background: #f8fff9;
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
}

.payment-radio {
    display: none;
}

.payment-label {
    display: block;
    padding: 1.5rem;
    margin: 0;
    cursor: pointer;
    width: 100%;
}

.method-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #667eea;
}

.payment-method-card.active .method-icon {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.method-title {
    margin-bottom: 0.25rem;
    color: #495057;
    font-weight: 600;
}

.method-description {
    margin-bottom: 0.75rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.bank-badge, .qris-badge {
    display: inline-block;
    background: #e9ecef;
    color: #495057;
    padding: 0.25rem 0.5rem;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-right: 0.25rem;
    margin-bottom: 0.25rem;
}

.payment-method-card.active .bank-badge,
.payment-method-card.active .qris-badge {
    background: #d4edda;
    color: #155724;
}

.method-check {
    width: 30px;
    height: 30px;
    border: 2px solid #e9ecef;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: transparent;
    transition: all 0.3s ease;
}

.payment-method-card.active .method-check {
    background: #28a745;
    border-color: #28a745;
    color: white;
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    border-radius: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-success:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
}

.btn-success:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.security-info {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
}

@media (max-width: 991px) {
    .col-lg-5.bg-light {
        background: white !important;
        border-bottom: 1px solid #e9ecef;
    }
}

@media (max-width: 576px) {
    .container {
        padding: 0 15px;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .col-lg-5, .col-lg-7 {
        padding: 1rem !important;
    }
    
    .method-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .payment-label {
        padding: 1rem;
    }
    
    .detail-row {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
    
    .detail-row .value {
        margin-top: 0.25rem;
    }
}
</style>
@endsection