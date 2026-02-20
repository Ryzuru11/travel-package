@extends('layouts.guest')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            {{-- Header --}}
            <div class="text-center mb-4">
                <h2 class="text-primary fw-bold">
                    <i class="fas fa-qrcode me-2"></i>
                    Pembayaran QRIS
                </h2>
                <p class="text-muted">Scan QR Code untuk melakukan pembayaran</p>
            </div>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-0">
                    <div class="row g-0">
                        {{-- QR Code Section --}}
                        <div class="col-lg-7 p-4">
                            <div class="qris-section">
                                <div class="qr-header text-center mb-4">
                                    <div class="qris-logo mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/512px-QRIS_logo.svg.png" 
                                             alt="QRIS" height="40" class="mb-2">
                                        <h5 class="text-dark mb-0">Quick Response Code Indonesian Standard</h5>
                                        <p class="text-muted small">Scan dengan aplikasi e-wallet atau mobile banking</p>
                                    </div>
                                </div>

                                {{-- QR Code Display --}}
                                <div class="qr-code-container">
                                    <div class="qr-code-wrapper">
                                        @if(isset($qrString))
                                            <div id="qrcode" class="qr-code"></div>
                                        @else
                                            <div class="qr-placeholder">
                                                <div class="qr-loading">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <p class="mt-3 text-muted">Generating QR Code...</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Instructions --}}
                                <div class="qr-instructions mt-4">
                                    <h6 class="text-dark mb-3">
                                        <i class="fas fa-mobile-alt me-2"></i>
                                        Cara Pembayaran:
                                    </h6>
                                    <div class="instruction-steps">
                                        <div class="step-item">
                                            <div class="step-number">1</div>
                                            <div class="step-content">
                                                <p class="mb-1 fw-semibold">Buka Aplikasi</p>
                                                <p class="text-muted small mb-0">Buka aplikasi e-wallet atau mobile banking Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-item">
                                            <div class="step-number">2</div>
                                            <div class="step-content">
                                                <p class="mb-1 fw-semibold">Scan QR Code</p>
                                                <p class="text-muted small mb-0">Pilih menu scan dan arahkan ke QR code di atas</p>
                                            </div>
                                        </div>
                                        <div class="step-item">
                                            <div class="step-number">3</div>
                                            <div class="step-content">
                                                <p class="mb-1 fw-semibold">Konfirmasi Pembayaran</p>
                                                <p class="text-muted small mb-0">Periksa detail dan konfirmasi pembayaran</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Supported Apps --}}
                                <div class="supported-apps mt-4">
                                    <h6 class="text-dark mb-3">Aplikasi yang Didukung:</h6>
                                    <div class="apps-grid">
                                        <div class="app-item">
                                            <div class="app-icon gopay"></div>
                                            <span>GoPay</span>
                                        </div>
                                        <div class="app-item">
                                            <div class="app-icon ovo"></div>
                                            <span>OVO</span>
                                        </div>
                                        <div class="app-item">
                                            <div class="app-icon dana"></div>
                                            <span>DANA</span>
                                        </div>
                                        <div class="app-item">
                                            <div class="app-icon shopeepay"></div>
                                            <span>ShopeePay</span>
                                        </div>
                                        <div class="app-item">
                                            <div class="app-icon linkaja"></div>
                                            <span>LinkAja</span>
                                        </div>
                                        <div class="app-item">
                                            <div class="app-icon jenius"></div>
                                            <span>Jenius</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Summary Section --}}
                        <div class="col-lg-5 bg-light p-4">
                            <div class="payment-summary-card">
                                <h5 class="text-primary mb-4">
                                    <i class="fas fa-receipt me-2"></i>
                                    Detail Pembayaran
                                </h5>
                                
                                {{-- Order Info --}}
                                @if(isset($booking))
                                <div class="order-info mb-4">
                                    <div class="order-header">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="package-icon me-3">
                                                <i class="fas fa-suitcase"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $booking->package->package_name ?? 'Travel Package' }}</h6>
                                                <p class="text-muted small mb-0">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="order-details">
                                        <div class="detail-row">
                                            <span class="label">Order ID:</span>
                                            <code class="value">{{ $payment->order_id ?? 'QRIS-'.time() }}</code>
                                        </div>
                                        <div class="detail-row">
                                            <span class="label">Dewasa:</span>
                                            <span class="value">{{ $booking->number_of_adult }} orang</span>
                                        </div>
                                        @if($booking->number_of_child > 0)
                                        <div class="detail-row">
                                            <span class="label">Anak:</span>
                                            <span class="value">{{ $booking->number_of_child }} orang</span>
                                        </div>
                                        @endif
                                        <div class="detail-row">
                                            <span class="label">Penjemputan:</span>
                                            <span class="value">{{ $booking->pick_up_location }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- Payment Amount --}}
                                <div class="payment-amount">
                                    <div class="amount-breakdown">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Subtotal:</span>
                                            <span class="fw-semibold">Rp {{ number_format($booking->total_fee ?? 0, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Biaya Admin:</span>
                                            <span class="fw-semibold text-success">Gratis</span>
                                        </div>
                                        <hr class="my-3">
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="h6 fw-bold text-dark">Total Pembayaran:</span>
                                            <span class="h5 fw-bold text-success">Rp {{ number_format($booking->total_fee ?? 0, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Payment Status --}}
                                <div class="payment-status">
                                    <div class="status-indicator pending" id="paymentStatus">
                                        <div class="status-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="status-text">
                                            <h6 class="mb-1">Menunggu Pembayaran</h6>
                                            <p class="small text-muted mb-0">Scan QR code untuk melanjutkan</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Timer --}}
                                <div class="payment-timer mt-4">
                                    <div class="timer-container">
                                        <div class="timer-icon">
                                            <i class="fas fa-hourglass-half"></i>
                                        </div>
                                        <div class="timer-content">
                                            <p class="mb-1 fw-semibold">Waktu Pembayaran:</p>
                                            <div class="countdown" id="countdown">
                                                <span class="time-unit">
                                                    <span class="number" id="minutes">15</span>
                                                    <span class="label">menit</span>
                                                </span>
                                                <span class="separator">:</span>
                                                <span class="time-unit">
                                                    <span class="number" id="seconds">00</span>
                                                    <span class="label">detik</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="action-buttons mt-4">
                                    <button class="btn btn-outline-primary w-100 mb-2" onclick="refreshQR()">
                                        <i class="fas fa-sync-alt me-2"></i>
                                        Refresh QR Code
                                    </button>
                                    <a href="{{ route('profile.Invoice') }}" class="btn btn-outline-secondary w-100">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        Kembali ke Invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Help Section --}}
            <div class="help-section mt-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div class="help-content">
                                <h6>Butuh Bantuan?</h6>
                                <p class="small text-muted mb-2">Tim customer service siap membantu Anda</p>
                                <a href="{{ route('contactUs') }}" class="btn btn-sm btn-outline-primary">
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="help-content">
                                <h6>Chat WhatsApp</h6>
                                <p class="small text-muted mb-2">Hubungi langsung via WhatsApp</p>
                                <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-sm btn-success">
                                    <i class="fab fa-whatsapp me-1"></i>
                                    Chat Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- QR Code Library --}}
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Generate QR Code
    @if(isset($qrString))
    const qrString = @json($qrString);
    QRCode.toCanvas(document.getElementById('qrcode'), qrString, {
        width: 280,
        height: 280,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.M
    }, function (error) {
        if (error) {
            console.error('QR Code generation failed:', error);
            document.getElementById('qrcode').innerHTML = '<div class="alert alert-danger">Failed to generate QR Code</div>';
        }
    });
    @endif

    // Countdown Timer
    let timeLeft = 15 * 60; // 15 minutes in seconds
    
    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            // Handle timeout
            document.getElementById('paymentStatus').innerHTML = `
                <div class="status-icon text-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="status-text">
                    <h6 class="mb-1 text-danger">Waktu Habis</h6>
                    <p class="small text-muted mb-0">Silakan refresh QR code</p>
                </div>
            `;
            document.querySelector('.countdown').innerHTML = '<span class="text-danger">Expired</span>';
        }
        
        timeLeft--;
    }
    
    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer(); // Initial call

    // Check payment status periodically
    const checkPaymentStatus = setInterval(function() {
        @if(isset($payment))
        fetch('{{ route("api.payment.check-status") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                order_id: '{{ $payment->order_id }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (data.payment_status === 'settlement' || data.payment_status === 'capture') {
                    clearInterval(checkPaymentStatus);
                    clearInterval(timerInterval);
                    
                    // Update status to success
                    document.getElementById('paymentStatus').innerHTML = `
                        <div class="status-icon text-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="status-text">
                            <h6 class="mb-1 text-success">Pembayaran Berhasil</h6>
                            <p class="small text-muted mb-0">Redirecting...</p>
                        </div>
                    `;
                    
                    // Redirect to success page
                    setTimeout(() => {
                        window.location.href = '{{ route("payment.success") }}?order_id={{ $payment->order_id }}';
                    }, 2000);
                } else if (data.payment_status === 'failed' || data.payment_status === 'deny' || data.payment_status === 'cancel') {
                    clearInterval(checkPaymentStatus);
                    clearInterval(timerInterval);
                    
                    // Update status to failed
                    document.getElementById('paymentStatus').innerHTML = `
                        <div class="status-icon text-danger">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="status-text">
                            <h6 class="mb-1 text-danger">Pembayaran Gagal</h6>
                            <p class="small text-muted mb-0">Silakan coba lagi</p>
                        </div>
                    `;
                }
            }
        })
        .catch(error => {
            console.error('Error checking payment status:', error);
        });
        @endif
    }, 5000); // Check every 5 seconds
});

// Refresh QR Code function
function refreshQR() {
    const button = event.target;
    const originalText = button.innerHTML;
    
    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Refreshing...';
    button.disabled = true;
    
    @if(isset($payment))
    // Make API call to refresh QR code
    fetch('{{ route("payment.qris", $booking->id) }}', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (response.ok) {
            // Reset timer
            timeLeft = 15 * 60;
            
            // Regenerate QR code with new timestamp
            const newQrString = @json($qrString) + '&refresh=' + Date.now();
            QRCode.toCanvas(document.getElementById('qrcode'), newQrString, {
                width: 280,
                height: 280,
                colorDark: '#000000',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.M
            });
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show mt-2';
            alert.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                QR Code berhasil di-refresh
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            button.parentNode.appendChild(alert);
            
            // Auto dismiss after 3 seconds
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();
                }
            }, 3000);
        }
    })
    .catch(error => {
        console.error('Error refreshing QR:', error);
        
        // Show error message
        const alert = document.createElement('div');
        alert.className = 'alert alert-danger alert-dismissible fade show mt-2';
        alert.innerHTML = `
            <i class="fas fa-exclamation-triangle me-2"></i>
            Gagal refresh QR Code. Silakan coba lagi.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        button.parentNode.appendChild(alert);
        
        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 3000);
    })
    .finally(() => {
        button.innerHTML = originalText;
        button.disabled = false;
    });
    @else
    // Fallback for demo
    setTimeout(() => {
        button.innerHTML = originalText;
        button.disabled = false;
        timeLeft = 15 * 60;
    }, 2000);
    @endif
}
</script>

<style>
.card {
    border-radius: 20px !important;
}

/* QR Code Section */
.qris-section {
    text-align: center;
}

.qris-logo img {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
}

.qr-code-container {
    display: flex;
    justify-content: center;
    margin: 2rem 0;
}

.qr-code-wrapper {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.qr-placeholder {
    width: 280px;
    height: 280px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 15px;
    border: 2px dashed #dee2e6;
}

.qr-loading {
    text-align: center;
}

/* Instructions */
.instruction-steps {
    text-align: left;
}

.step-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.step-number {
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.step-content {
    flex-grow: 1;
}

/* Supported Apps */
.apps-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.app-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.app-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.app-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    margin-bottom: 0.5rem;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

.app-icon.gopay { background: linear-gradient(135deg, #00AA13, #00D4AA); }
.app-icon.ovo { background: linear-gradient(135deg, #4C3494, #5B4FBF); }
.app-icon.dana { background: linear-gradient(135deg, #118EEA, #1BA0F2); }
.app-icon.shopeepay { background: linear-gradient(135deg, #EE4D2D, #FF6533); }
.app-icon.linkaja { background: linear-gradient(135deg, #E31E24, #FF4444); }
.app-icon.jenius { background: linear-gradient(135deg, #3366CC, #4477DD); }

.app-item span {
    font-size: 0.8rem;
    font-weight: 600;
    color: #495057;
}

/* Payment Summary */
.payment-summary-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
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

.order-details {
    background: #f8f9fa;
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
}

.detail-row .value {
    font-weight: 600;
    color: #495057;
}

.detail-row code {
    background: #e9ecef;
    padding: 0.25rem 0.5rem;
    border-radius: 5px;
    font-size: 0.8rem;
}

.amount-breakdown {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
}

/* Payment Status */
.payment-status {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    border-radius: 10px;
    padding: 1rem;
}

.status-indicator {
    display: flex;
    align-items: center;
}

.status-icon {
    width: 40px;
    height: 40px;
    background: #ffc107;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 1rem;
    font-size: 1.2rem;
}

.status-indicator.success .status-icon {
    background: #28a745;
}

.status-indicator.failed .status-icon {
    background: #dc3545;
}

/* Timer */
.payment-timer {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    padding: 1rem;
}

.timer-container {
    display: flex;
    align-items: center;
}

.timer-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 1rem;
    font-size: 1.2rem;
}

.countdown {
    display: flex;
    align-items: center;
    font-family: 'Courier New', monospace;
    font-size: 1.2rem;
    font-weight: bold;
    color: #495057;
}

.time-unit {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.time-unit .number {
    font-size: 1.5rem;
    color: #667eea;
}

.time-unit .label {
    font-size: 0.7rem;
    color: #6c757d;
    text-transform: uppercase;
}

.separator {
    margin: 0 0.5rem;
    font-size: 1.5rem;
    color: #667eea;
}

/* Help Section */
.help-section {
    margin-top: 2rem;
}

.help-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    height: 100%;
}

.help-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #28a745, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.help-content {
    flex-grow: 1;
}

.help-content h6 {
    margin-bottom: 0.5rem;
    color: #495057;
}

/* Buttons */
.btn {
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    transform: translateY(-2px);
}

.btn-success:hover {
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 991px) {
    .col-lg-5.bg-light {
        background: white !important;
        border-top: 1px solid #e9ecef;
    }
    
    .payment-summary-card {
        box-shadow: none;
        border: 1px solid #e9ecef;
    }
    
    .apps-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .container {
        padding: 0 15px;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .col-lg-7, .col-lg-5 {
        padding: 1rem !important;
    }
    
    .qr-code-wrapper {
        padding: 1rem;
    }
    
    .qr-placeholder,
    #qrcode canvas {
        width: 200px !important;
        height: 200px !important;
    }
    
    .apps-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
    }
    
    .app-item {
        padding: 0.75rem 0.5rem;
    }
    
    .app-icon {
        width: 30px;
        height: 30px;
    }
    
    .step-item {
        padding: 0.75rem;
    }
    
    .step-number {
        width: 25px;
        height: 25px;
        font-size: 0.8rem;
    }
    
    .countdown {
        font-size: 1rem;
    }
    
    .time-unit .number {
        font-size: 1.2rem;
    }
}
</style>
@endsection