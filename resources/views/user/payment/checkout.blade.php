@extends('layouts/mainStructure')

@section('content')

    {{-- Modern Checkout Hero Section --}}
    <div class="modern-checkout-hero">
        <div class="hero-background-pattern"></div>
        <div class="container">
            <div class="hero-content-checkout">
                <div class="hero-badge-checkout">
                    <i class="fas fa-credit-card"></i>
                    <span>Pembayaran Aman</span>
                </div>
                <h1 class="hero-title-checkout">Selesaikan Pembayaran</h1>
                <p class="hero-subtitle-checkout">
                    Konfirmasi booking Anda dengan sistem pembayaran yang aman dan terpercaya
                </p>
                
                {{-- Checkout Progress --}}
                <div class="checkout-progress">
                    <div class="progress-step completed">
                        <div class="step-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="step-label">Booking</span>
                    </div>
                    <div class="progress-line completed"></div>
                    <div class="progress-step active">
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="step-label">Pembayaran</span>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step">
                        <div class="step-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="step-label">Konfirmasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modern Checkout Content --}}
    <div class="modern-checkout-container">
        <div class="container">
            <div class="row g-4">
                {{-- Booking Details Section --}}
                <div class="col-lg-8">
                    <div class="checkout-card">
                        <div class="card-header-modern">
                            <div class="header-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="header-content">
                                <h3 class="card-title">Detail Booking</h3>
                                <p class="card-subtitle">Informasi lengkap perjalanan Anda</p>
                            </div>
                        </div>

                        {{-- Package Information --}}
                        <div class="package-info-modern">
                            <div class="package-image">
                                @if($booking->package && $booking->package->image1)
                                    <img src="{{ asset('image/uploads/travelPackage/'.$booking->package->image1) }}" alt="Package" class="package-img">
                                @else
                                    <div class="package-placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                                <div class="package-overlay">
                                    <div class="package-badge">
                                        <i class="fas fa-star"></i>
                                        <span>Premium</span>
                                    </div>
                                </div>
                            </div>
                            <div class="package-details">
                                <h4 class="package-name">{{ $booking->package->package_name ?? 'N/A' }}</h4>
                                <p class="package-description">{{ $booking->package->description ?? 'Paket wisata premium dengan fasilitas terbaik' }}</p>
                                
                                <div class="package-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ $booking->package->duration ?? '1' }} Hari</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $booking->pick_up_location }}</span>
                                    </div>
                                </div>

                                <div class="package-participants">
                                    <div class="participant-item">
                                        <div class="participant-icon adult">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="participant-info">
                                            <span class="participant-count">{{ $booking->number_of_adult }}</span>
                                            <span class="participant-label">Dewasa</span>
                                        </div>
                                    </div>
                                    @if($booking->number_of_child > 0)
                                    <div class="participant-item">
                                        <div class="participant-icon child">
                                            <i class="fas fa-child"></i>
                                        </div>
                                        <div class="participant-info">
                                            <span class="participant-count">{{ $booking->number_of_child }}</span>
                                            <span class="participant-label">Anak</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Booking Information --}}
                        <div class="booking-info-modern">
                            <h5 class="info-title">
                                <i class="fas fa-clipboard-list"></i>
                                Informasi Booking
                            </h5>
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Order ID</div>
                                    <div class="info-value">
                                        <code class="order-id">{{ $payment->order_id }}</code>
                                        <button class="copy-btn" onclick="copyOrderId()">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Lokasi Penjemputan</div>
                                    <div class="info-value">
                                        <span class="location-badge">{{ $booking->pick_up_location }}</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Detail Lokasi</div>
                                    <div class="info-value">
                                        <p class="location-details">{{ $booking->pick_up_location_details ?? 'Tidak ada detail tambahan' }}</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Status Booking</div>
                                    <div class="info-value">
                                        <span class="status-badge pending">
                                            <i class="fas fa-clock"></i>
                                            Menunggu Pembayaran
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Methods --}}
                        <div class="payment-methods-modern">
                            <h5 class="methods-title">
                                <i class="fas fa-credit-card"></i>
                                Metode Pembayaran Tersedia
                            </h5>
                            <div class="methods-grid">
                                <div class="method-item">
                                    <div class="method-icon bank">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <span class="method-name">Transfer Bank</span>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon card">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <span class="method-name">Kartu Kredit</span>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon ewallet">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <span class="method-name">E-Wallet</span>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon qris">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <span class="method-name">QRIS</span>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon store">
                                        <i class="fas fa-store"></i>
                                    </div>
                                    <span class="method-name">Minimarket</span>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon va">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <span class="method-name">Virtual Account</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment Summary Section --}}
                <div class="col-lg-4">
                    <div class="payment-summary-modern">
                        <div class="summary-header">
                            <div class="header-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="header-content">
                                <h3 class="summary-title">Ringkasan Pembayaran</h3>
                                <p class="summary-subtitle">Detail biaya perjalanan</p>
                            </div>
                        </div>

                        <div class="summary-content">
                            <div class="price-breakdown">
                                <div class="price-item">
                                    <span class="price-label">Harga Paket</span>
                                    <span class="price-value">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                                <div class="price-item">
                                    <span class="price-label">Pajak & Biaya Layanan</span>
                                    <span class="price-value included">Sudah Termasuk</span>
                                </div>
                                <div class="price-item discount">
                                    <span class="price-label">
                                        <i class="fas fa-tag"></i>
                                        Diskon Early Bird
                                    </span>
                                    <span class="price-value">- Rp 0</span>
                                </div>
                            </div>

                            <div class="total-section">
                                <div class="total-item">
                                    <span class="total-label">Total Pembayaran</span>
                                    <span class="total-value">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            {{-- Payment Actions --}}
                            <div class="payment-actions">
                                <button id="pay-button" class="btn-pay-modern" onclick="showPaymentModal()">
                                    <i class="fas fa-lock"></i>
                                    <span>Bayar Sekarang</span>
                                    <div class="btn-glow"></div>
                                </button>

                                <div class="alternative-divider">
                                    <span>atau</span>
                                </div>

                                <button class="btn-alternative" onclick="showUploadModal()">
                                    <i class="fas fa-upload"></i>
                                    <span>Upload Bukti Transfer</span>
                                </button>
                            </div>

                            {{-- Security Info --}}
                            <div class="security-info-modern">
                                <div class="security-badge">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Pembayaran 100% Aman</span>
                                </div>
                                <div class="security-details">
                                    <div class="security-item">
                                        <i class="fas fa-lock"></i>
                                        <span>SSL 256-bit Encryption</span>
                                    </div>
                                    <div class="security-item">
                                        <i class="fas fa-certificate"></i>
                                        <span>Verified by Midtrans</span>
                                    </div>
                                </div>
                                <div class="security-logo">
                                    <img src="https://midtrans.com/assets/images/main/midtrans-logo.svg" alt="Midtrans" class="midtrans-logo">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Help Card --}}
                    <div class="help-card-modern">
                        <div class="help-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="help-content">
                            <h6 class="help-title">Butuh Bantuan?</h6>
                            <p class="help-text">Tim customer service kami siap membantu 24/7</p>
                            <div class="help-actions">
                                <a href="{{ route('contactUs') }}" class="help-btn">
                                    <i class="fas fa-phone"></i>
                                    <span>Hubungi CS</span>
                                </a>
                                <a href="https://wa.me/6281917166060" target="_blank" class="help-btn whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Payment Method Modal --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modern-modal">
                <div class="modal-header modern-modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">
                        <i class="fas fa-credit-card me-2"></i>
                        Pilih Metode Pembayaran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="payment-methods-container">
                        {{-- Bank Transfer Section --}}
                        <div class="payment-category">
                            <h6 class="category-title">
                                <i class="fas fa-university me-2"></i>
                                Transfer Bank
                            </h6>
                            <div class="payment-methods-grid">
                                <div class="payment-method-card" onclick="selectPaymentMethod('bca')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="bank-logo">
                                    <span class="method-name">BCA</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('bni')">
                                    <div class="bank-logo-placeholder bni-color">
                                        <span class="bank-text">BNI</span>
                                    </div>
                                    <span class="method-name">BNI</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('bri')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI" class="bank-logo">
                                    <span class="method-name">BRI</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('mandiri')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="bank-logo">
                                    <span class="method-name">Mandiri</span>
                                </div>
                            </div>
                        </div>

                        {{-- E-Wallet Section --}}
                        <div class="payment-category">
                            <h6 class="category-title">
                                <i class="fas fa-mobile-alt me-2"></i>
                                E-Wallet
                            </h6>
                            <div class="payment-methods-grid">
                                <div class="payment-method-card" onclick="selectPaymentMethod('gopay')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="GoPay" class="ewallet-logo">
                                    <span class="method-name">GoPay</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('dana')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA" class="ewallet-logo">
                                    <span class="method-name">DANA</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('ovo')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="OVO" class="ewallet-logo">
                                    <span class="method-name">OVO</span>
                                </div>
                                <div class="payment-method-card" onclick="selectPaymentMethod('jenius')">
                                    <div class="bank-logo-placeholder jenius-color">
                                        <span class="bank-text">Jenius</span>
                                    </div>
                                    <span class="method-name">Jenius</span>
                                </div>
                            </div>
                        </div>

                        {{-- QRIS Section --}}
                        <div class="payment-category">
                            <h6 class="category-title">
                                <i class="fas fa-qrcode me-2"></i>
                                QRIS
                            </h6>
                            <div class="payment-methods-grid">
                                <div class="payment-method-card qris-card" onclick="selectPaymentMethod('qris')">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/QRIS_logo.svg" alt="QRIS" class="qris-logo">
                                    <span class="method-name">QRIS</span>
                                    <small class="method-desc">Scan QR Code</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Payment Details Modal --}}
    <div class="modal fade" id="paymentDetailsModal" tabindex="-1" aria-labelledby="paymentDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modern-modal">
                <div class="modal-header modern-modal-header">
                    <h5 class="modal-title" id="paymentDetailsModalLabel">
                        <i class="fas fa-info-circle me-2"></i>
                        Detail Pembayaran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="paymentDetailsContent">
                    {{-- Content will be populated by JavaScript --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" onclick="confirmPayment()">Sudah Transfer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload Bukti Transfer Modal --}}
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modern-modal">
                <div class="modal-header modern-modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">
                        <i class="fas fa-upload me-2"></i>
                        Upload Bukti Transfer
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="paymentProof" class="form-label">Pilih File Bukti Transfer</label>
                            <input type="file" class="form-control" id="paymentProof" name="payment_proof" accept="image/*" required>
                            <div class="form-text">Format: JPG, PNG, PDF. Maksimal 5MB</div>
                        </div>
                        <div class="mb-3">
                            <label for="transferAmount" class="form-label">Jumlah Transfer</label>
                            <input type="text" class="form-control" id="transferAmount" value="Rp {{ number_format($booking->total_fee, 0, ',', '.') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="transferNote" class="form-label">Catatan (Opsional)</label>
                            <textarea class="form-control" id="transferNote" name="transfer_note" rows="3" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="uploadProof()">Upload Bukti</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Modal --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modern-modal success-modal">
                <div class="modal-body text-center p-5">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="success-title mb-3">Pembayaran Berhasil!</h3>
                    <p class="success-message mb-4">
                        Terima kasih! Pembayaran Anda telah kami terima dan sedang diproses. 
                        Kami akan mengirimkan konfirmasi melalui email dalam 1x24 jam.
                    </p>
                    <div class="success-actions">
                        <a href="{{ route('profile.Invoice') }}" class="btn btn-primary me-2">
                            <i class="fas fa-receipt me-2"></i>
                            Lihat Invoice
                        </a>
                        <a href="{{ route('user.home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-home me-2"></i>
                            Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<!-- Midtrans Snap JS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    // Payment Methods Data
    const paymentMethods = {
        bca: {
            name: 'BCA',
            account: '1234567890',
            accountName: 'PT Ryzuru Tour Travel',
            instructions: [
                'Login ke BCA Mobile atau Internet Banking',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 1234567890',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        bni: {
            name: 'BNI',
            account: '0987654321',
            accountName: 'PT Ryzuru Tour Travel',
            instructions: [
                'Login ke BNI Mobile Banking',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 0987654321',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        bri: {
            name: 'BRI',
            account: '5555666677',
            accountName: 'PT Ryzuru Tour Travel',
            instructions: [
                'Login ke BRI Mobile',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 5555666677',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        mandiri: {
            name: 'Mandiri',
            account: '1122334455',
            accountName: 'PT Ryzuru Tour Travel',
            instructions: [
                'Login ke Livin by Mandiri',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 1122334455',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        gopay: {
            name: 'GoPay',
            account: '081917166060',
            accountName: 'Ryzuru Tour Travel',
            instructions: [
                'Buka aplikasi Gojek',
                'Pilih GoPay',
                'Pilih Transfer',
                'Masukkan nomor: 081917166060',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        dana: {
            name: 'DANA',
            account: '081917166060',
            accountName: 'Ryzuru Tour Travel',
            instructions: [
                'Buka aplikasi DANA',
                'Pilih Kirim',
                'Masukkan nomor: 081917166060',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        ovo: {
            name: 'OVO',
            account: '081917166060',
            accountName: 'Ryzuru Tour Travel',
            instructions: [
                'Buka aplikasi OVO',
                'Pilih Transfer',
                'Masukkan nomor: 081917166060',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        jenius: {
            name: 'Jenius',
            account: '90001234567',
            accountName: 'PT Ryzuru Tour Travel',
            instructions: [
                'Buka aplikasi Jenius',
                'Pilih Send It',
                'Masukkan nomor rekening: 90001234567',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Ryzuru Tour Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        qris: {
            name: 'QRIS',
            qrCode: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==',
            instructions: [
                'Buka aplikasi e-wallet atau mobile banking',
                'Pilih menu Scan QR atau QRIS',
                'Scan QR Code di bawah ini',
                'Pastikan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Konfirmasi dan lakukan pembayaran'
            ]
        }
    };

    // Show Payment Modal
    function showPaymentModal() {
        console.log('showPaymentModal called'); // Debug log
        try {
            const modalElement = document.getElementById('paymentModal');
            if (!modalElement) {
                console.error('Payment modal element not found');
                return;
            }
            
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            console.log('Payment modal should be visible now'); // Debug log
        } catch (error) {
            console.error('Error showing payment modal:', error);
            alert('Terjadi kesalahan saat membuka modal pembayaran. Silakan refresh halaman.');
        }
    }

    // Show Upload Modal
    function showUploadModal() {
        console.log('showUploadModal called'); // Debug log
        try {
            const modalElement = document.getElementById('uploadModal');
            if (!modalElement) {
                console.error('Upload modal element not found');
                return;
            }
            
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            console.log('Upload modal should be visible now'); // Debug log
        } catch (error) {
            console.error('Error showing upload modal:', error);
            alert('Terjadi kesalahan saat membuka modal upload. Silakan refresh halaman.');
        }
    }

    // Select Payment Method
    function selectPaymentMethod(method) {
        const paymentData = paymentMethods[method];
        let content = '';

        if (method === 'qris') {
            content = `
                <div class="payment-details qris-details">
                    <div class="text-center mb-4">
                        <h5 class="text-primary">
                            <i class="fas fa-qrcode me-2"></i>
                            Pembayaran ${paymentData.name}
                        </h5>
                    </div>
                    <div class="qr-code-container text-center mb-4">
                        <div class="qr-placeholder">
                            <i class="fas fa-qrcode" style="font-size: 120px; color: #ddd;"></i>
                            <p class="mt-2 text-muted">QR Code akan ditampilkan di sini</p>
                        </div>
                    </div>
                    <div class="payment-amount text-center mb-4">
                        <h4 class="text-success">Rp {{ number_format($booking->total_fee, 0, ",", ".") }}</h4>
                    </div>
                    <div class="payment-instructions">
                        <h6 class="mb-3">Cara Pembayaran:</h6>
                        <ol class="instruction-list">
                            ${paymentData.instructions.map(instruction => `<li>${instruction}</li>`).join('')}
                        </ol>
                    </div>
                </div>
            `;
        } else {
            content = `
                <div class="payment-details">
                    <div class="text-center mb-4">
                        <h5 class="text-primary">
                            <i class="fas fa-university me-2"></i>
                            Transfer ke ${paymentData.name}
                        </h5>
                    </div>
                    <div class="account-details mb-4">
                        <div class="account-info">
                            <div class="row mb-3">
                                <div class="col-4"><strong>Bank:</strong></div>
                                <div class="col-8">${paymentData.name}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"><strong>No. Rekening:</strong></div>
                                <div class="col-8">
                                    <span class="account-number">${paymentData.account}</span>
                                    <button class="btn btn-sm btn-outline-primary ms-2" onclick="copyAccount('${paymentData.account}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"><strong>Atas Nama:</strong></div>
                                <div class="col-8">${paymentData.accountName}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"><strong>Jumlah:</strong></div>
                                <div class="col-8">
                                    <span class="amount-number text-success fw-bold">Rp {{ number_format($booking->total_fee, 0, ",", ".") }}</span>
                                    <button class="btn btn-sm btn-outline-success ms-2" onclick="copyAmount('{{ $booking->total_fee }}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-instructions">
                        <h6 class="mb-3">Cara Transfer:</h6>
                        <ol class="instruction-list">
                            ${paymentData.instructions.map(instruction => `<li>${instruction}</li>`).join('')}
                        </ol>
                    </div>
                </div>
            `;
        }

        document.getElementById('paymentDetailsContent').innerHTML = content;
        
        // Hide payment modal and show details modal
        bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();
        const detailsModal = new bootstrap.Modal(document.getElementById('paymentDetailsModal'));
        detailsModal.show();
    }

    // Copy Account Number
    function copyAccount(account) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(account).then(function() {
                showToast('Nomor rekening berhasil disalin!', 'success');
            }).catch(function(err) {
                // Fallback for older browsers
                fallbackCopyTextToClipboard(account);
                showToast('Nomor rekening berhasil disalin!', 'success');
            });
        } else {
            // Fallback for older browsers
            fallbackCopyTextToClipboard(account);
            showToast('Nomor rekening berhasil disalin!', 'success');
        }
    }

    // Copy Amount
    function copyAmount(amount) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(amount).then(function() {
                showToast('Jumlah transfer berhasil disalin!', 'success');
            }).catch(function(err) {
                // Fallback for older browsers
                fallbackCopyTextToClipboard(amount);
                showToast('Jumlah transfer berhasil disalin!', 'success');
            });
        } else {
            // Fallback for older browsers
            fallbackCopyTextToClipboard(amount);
            showToast('Jumlah transfer berhasil disalin!', 'success');
        }
    }

    // Copy Order ID function (existing)
    function copyOrderId() {
        const orderIdText = document.querySelector('.order-id').textContent;
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(orderIdText).then(function() {
                showToast('Order ID berhasil disalin!', 'success');
            }).catch(function(err) {
                // Fallback for older browsers
                fallbackCopyTextToClipboard(orderIdText);
                showToast('Order ID berhasil disalin!', 'success');
            });
        } else {
            // Fallback for older browsers
            fallbackCopyTextToClipboard(orderIdText);
            showToast('Order ID berhasil disalin!', 'success');
        }
    }

    // Fallback copy function for older browsers
    function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        
        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";
        
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            document.execCommand('copy');
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }
        
        document.body.removeChild(textArea);
    }

    // Confirm Payment
    function confirmPayment() {
        // Hide details modal
        bootstrap.Modal.getInstance(document.getElementById('paymentDetailsModal')).hide();
        
        // Show success modal
        setTimeout(() => {
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        }, 500);
    }

    // Upload Proof
    function uploadProof() {
        const form = document.getElementById('uploadForm');
        const formData = new FormData(form);
        
        // Add booking ID
        formData.append('booking_id', '{{ $booking->id }}');
        
        // Show loading
        const uploadBtn = event.target;
        const originalText = uploadBtn.innerHTML;
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
        uploadBtn.disabled = true;
        
        // Simulate upload (replace with actual upload logic)
        setTimeout(() => {
            // Hide upload modal
            bootstrap.Modal.getInstance(document.getElementById('uploadModal')).hide();
            
            // Show success modal
            setTimeout(() => {
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }, 500);
            
            // Reset button
            uploadBtn.innerHTML = originalText;
            uploadBtn.disabled = false;
        }, 2000);
    }

    // Show Toast Notification
    function showToast(message, type = 'info') {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        // Add to page
        let toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        // Show toast
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        // Remove after hide
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing payment system');
        
        // Check if Bootstrap is loaded
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap is not loaded!');
            return;
        }
        
        // Check if payment modal exists
        const paymentModal = document.getElementById('paymentModal');
        if (!paymentModal) {
            console.error('Payment modal not found in DOM');
        } else {
            console.log('Payment modal found');
        }
        
        // Check if upload modal exists
        const uploadModal = document.getElementById('uploadModal');
        if (!uploadModal) {
            console.error('Upload modal not found in DOM');
        } else {
            console.log('Upload modal found');
        }
        
        // Add click event to pay button as backup
        const payButton = document.getElementById('pay-button');
        if (payButton) {
            payButton.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Pay button clicked via event listener');
                showPaymentModal();
            });
        }
        
        // Test modal functionality
        console.log('Payment system initialized successfully');
    });
</script>

<style>
/* Modern Payment Modal Styles */
.modern-modal {
    border: none;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.modern-modal-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 20px 20px 0 0;
    padding: 1.5rem 2rem;
}

.modern-modal-header .btn-close {
    filter: invert(1);
}

.payment-methods-container {
    padding: 1rem 0;
}

.payment-category {
    margin-bottom: 2rem;
}

.category-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e9ecef;
}

.payment-methods-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
}

.payment-method-card {
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 1.5rem 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.payment-method-card:hover {
    border-color: #667eea;
    background: #f8f9ff;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
}

.bank-logo, .ewallet-logo, .qris-logo {
    height: 40px;
    width: auto;
    margin-bottom: 0.75rem;
    object-fit: contain;
}

.bank-logo-placeholder {
    height: 40px;
    width: 80px;
    margin: 0 auto 0.75rem;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: white;
    font-size: 0.9rem;
}

.bni-color {
    background: linear-gradient(135deg, #ff6b35, #f7931e);
}

.jenius-color {
    background: linear-gradient(135deg, #00d4ff, #0099cc);
}

.bank-text {
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

.method-name {
    display: block;
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.9rem;
}

.method-desc {
    display: block;
    color: #6c757d;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

.qris-card {
    grid-column: span 2;
    max-width: 200px;
    margin: 0 auto;
}

/* Payment Details Styles */
.payment-details {
    padding: 1rem 0;
}

.account-details {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 1.5rem;
    border: 2px solid #e9ecef;
}

.account-number, .amount-number {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    font-size: 1.1rem;
}

.instruction-list {
    padding-left: 1.2rem;
}

.instruction-list li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
}

.qr-code-container {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    border: 2px dashed #dee2e6;
}

.qr-placeholder {
    opacity: 0.5;
}

/* Success Modal Styles */
.success-modal .modal-body {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    border-radius: 20px;
}

.success-icon {
    font-size: 4rem;
    color: #28a745;
    animation: successPulse 1s ease-in-out;
}

.success-title {
    color: #155724;
    font-weight: 700;
}

.success-message {
    color: #155724;
    line-height: 1.6;
}

.success-actions .btn {
    border-radius: 25px;
    padding: 0.75rem 2rem;
    font-weight: 600;
}

@keyframes successPulse {
    0% { transform: scale(0); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* Button Styles */
.btn-pay-modern {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    border-radius: 15px;
    color: white;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    width: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-pay-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
}

.btn-alternative {
    background: transparent;
    border: 2px solid #667eea;
    border-radius: 15px;
    color: #667eea;
    padding: 1rem 2rem;
    font-weight: 600;
    width: 100%;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-alternative:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.alternative-divider {
    text-align: center;
    margin: 1rem 0;
    position: relative;
}

.alternative-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
}

.alternative-divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

/* Responsive */
@media (max-width: 768px) {
    .payment-methods-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .qris-card {
        grid-column: span 2;
    }
    
    .modern-modal-header {
        padding: 1rem 1.5rem;
    }
    
    .payment-method-card {
        padding: 1rem 0.5rem;
    }
    
    .bank-logo, .ewallet-logo, .qris-logo {
        height: 30px;
    }
}
</style>
@endpush