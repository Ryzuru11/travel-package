@extends('layouts/mainStructure')

@section('content')

{{-- Modern Hero Section --}}
<div class="modern-invoice-hero">
    <div class="hero-background-pattern"></div>
    <div class="container">
        <div class="hero-content-invoice">
            <div class="hero-badge-invoice">
                <i class="fas fa-receipt"></i>
                <span>Invoice Digital</span>
            </div>
            <h1 class="hero-title-invoice">Detail Pembayaran</h1>
            <p class="hero-subtitle-invoice">
                Kelola pembayaran travel package Anda dengan mudah dan aman
            </p>
        </div>
    </div>
</div>

{{-- Modern Invoice Container --}}
<div class="modern-invoice-container">
    <div class="container-fluid">
        <div class="row g-4">
            {{-- Sidebar Profile --}}
            <div class="col-xl-3 col-lg-4 col-md-12 sidebar-column">
                <div class="modern-sidebar">
                    @include('profile.partials.sideMenu')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="col-xl-6 col-lg-5 col-md-8 main-content-column">
                {{-- Back Button --}}
                <div class="modern-back-section mb-4">
                    <a href="{{route('profile.Invoice')}}" class="modern-back-btn">
                        <i class="fas fa-arrow-left me-2"></i>
                        <span>Kembali ke Invoice</span>
                    </a>
                </div>

                {{-- Invoice Card --}}
                <div class="modern-invoice-card">
                    <div class="invoice-header-modern">
                        <div class="company-info">
                            <div class="company-logo">
                                <img src="{{ asset('image/Ryzurulogo.png') }}" alt="Ryzuru Tour Travel" class="logo-img">
                            </div>
                            <div class="company-details">
                                <h3 class="company-name">Ryzuru Tour Travel</h3>
                                <p class="company-address">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    Jl. Kirab Remaja, Kec. Narmada, Kabupaten Lombok Barat, Nusa Tenggara Bar. 83371
                                </p>
                            </div>
                        </div>
                        <div class="invoice-meta">
                            <div class="invoice-number">
                                <span class="label">Invoice ID</span>
                                <span class="value">#INV-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="invoice-date">
                                <span class="label">Tanggal</span>
                                <span class="value">{{ $booking->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-body-modern">
                        {{-- Traveller Info --}}
                        <div class="section-modern">
                            <h5 class="section-title-modern">
                                <i class="fas fa-users me-2"></i>
                                Informasi Traveller
                            </h5>
                            <div class="traveller-info-grid">
                                <div class="info-card-modern">
                                    <div class="info-icon adult-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-number">{{ $booking->number_of_adult }}</span>
                                        <span class="info-label">Dewasa</span>
                                    </div>
                                </div>
                                <div class="info-card-modern">
                                    <div class="info-icon child-icon">
                                        <i class="fas fa-child"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-number">{{ $booking->number_of_child }}</span>
                                        <span class="info-label">Anak</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Package Details --}}
                        <div class="section-modern">
                            <h5 class="section-title-modern">
                                <i class="fas fa-suitcase-rolling me-2"></i>
                                Detail Paket Wisata
                            </h5>
                            <div class="package-details-modern">
                                <div class="package-main-info">
                                    <h6 class="package-name-modern">{{ $booking->package->package_name }}</h6>
                                    <div class="package-meta-grid">
                                        <div class="meta-item-modern">
                                            <i class="fas fa-tag"></i>
                                            <span>{{ $booking->package->tour_type }}</span>
                                        </div>
                                        <div class="meta-item-modern">
                                            <i class="fas fa-calendar"></i>
                                            <span>{{ $booking->package->duration }} Hari</span>
                                        </div>
                                        <div class="meta-item-modern">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>{{ \carbon\carbon::parse($booking->date)->format('d M Y') }}</span>
                                        </div>
                                        <div class="meta-item-modern">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $booking->pick_up_location }}</span>
                                        </div>
                                    </div>
                                    @if($booking->pick_up_location_details)
                                    <div class="pickup-details">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <span>{{ $booking->pick_up_location_details }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="package-price-modern">
                                    <span class="price-label">Harga Paket</span>
                                    <span class="price-value">${{ number_format($booking->package->price_start_from, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Price Breakdown --}}
                        <div class="section-modern">
                            <h5 class="section-title-modern">
                                <i class="fas fa-calculator me-2"></i>
                                Rincian Biaya
                            </h5>
                            <div class="price-breakdown-modern">
                                <div class="price-item-modern">
                                    <span class="item-desc">Jumlah Traveller</span>
                                    <span class="item-detail">{{ $booking->number_of_adult + $booking->number_of_child }} orang</span>
                                    <span class="item-price">$52</span>
                                </div>
                                <div class="price-divider"></div>
                                <div class="price-total-modern">
                                    <span class="total-label">Total Pembayaran</span>
                                    <span class="total-amount">${{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Sidebar --}}
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="payment-sidebar-modern">
                    {{-- Status Cards --}}
                    <div class="status-cards-modern">
                        <div class="status-card-modern payment-status">
                            <div class="status-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="status-content">
                                <span class="status-label">Payment</span>
                                <span class="status-badge status-{{ strtolower($booking->payment_status) }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="status-card-modern booking-status">
                            <div class="status-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="status-content">
                                <span class="status-label">Booking</span>
                                <span class="status-badge status-{{ strtolower($booking->reservation_status) }}">
                                    {{ ucfirst($booking->reservation_status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if ($booking->payment_status == "Reject")
                        <div class="alert-modern alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <span>Cek email Anda untuk informasi lebih lanjut tentang pembayaran.</span>
                        </div>
                    @endif

                    {{-- Payment Section --}}
                    @if($booking->payment_status == 'pending')
                        <div class="payment-section-modern">
                            <div class="payment-header-modern">
                                <h6 class="payment-title">Pembayaran Online</h6>
                                <p class="payment-subtitle">Bayar dengan aman menggunakan berbagai metode</p>
                            </div>
                            
                            <button class="btn-pay-modern" onclick="showPaymentModal()">
                                <div class="btn-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="btn-content">
                                    <span class="btn-text">Bayar Sekarang</span>
                                    <span class="btn-amount">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                </div>
                                <div class="btn-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </button>

                            <div class="divider-modern">
                                <span>atau</span>
                            </div>
                        </div>
                    @endif

                    {{-- Upload Section --}}
                    <div class="upload-section-modern">
                        <div class="upload-header-modern">
                            <h6 class="upload-title">Upload Bukti Transfer</h6>
                            <p class="upload-subtitle">Jika Anda melakukan transfer manual</p>
                        </div>
                        
                        <button type="button" class="btn-upload-modern" onclick="showUploadModal()">
                            <div class="btn-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="btn-content">
                                <span class="btn-text">Upload Bukti</span>
                                <span class="btn-desc">JPG, PNG, PDF</span>
                            </div>
                        </button>

                        <div class="upload-alternative">
                            <small class="text-muted">atau upload langsung:</small>
                            <form action="{{route('user.payment.receipt.image', $booking->id )}}" method="post" enctype="multipart/form-data" class="upload-form-simple">
                                @csrf
                                <input type="file" class="form-control-modern" name="payment_receipt" accept="image/*"/>
                                <button type="submit" class="btn-submit-simple">
                                    <i class="fas fa-upload me-2"></i>
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Help Section --}}
                    <div class="help-section-modern">
                        <div class="help-icon-modern">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="help-content-modern">
                            <h6 class="help-title">Butuh Bantuan?</h6>
                            <p class="help-text">Tim support kami siap membantu Anda 24/7</p>
                            <div class="help-actions-modern">
                                <a href="https://wa.me/6281917166060" target="_blank" class="help-btn-modern whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                                <a href="tel:+6281917166060" class="help-btn-modern phone">
                                    <i class="fas fa-phone"></i>
                                    <span>Call</span>
                                </a>
                            </div>
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
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
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
        console.log('showPaymentModal called');
        try {
            const modalElement = document.getElementById('paymentModal');
            if (!modalElement) {
                console.error('Payment modal element not found');
                alert('Modal tidak ditemukan. Silakan refresh halaman.');
                return;
            }
            
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            console.log('Payment modal should be visible now');
        } catch (error) {
            console.error('Error showing payment modal:', error);
            alert('Terjadi kesalahan saat membuka modal pembayaran: ' + error.message);
        }
    }

    // Show Upload Modal
    function showUploadModal() {
        console.log('showUploadModal called');
        try {
            const modalElement = document.getElementById('uploadModal');
            if (!modalElement) {
                console.error('Upload modal element not found');
                alert('Modal upload tidak ditemukan. Silakan refresh halaman.');
                return;
            }
            
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            console.log('Upload modal should be visible now');
        } catch (error) {
            console.error('Error showing upload modal:', error);
            alert('Terjadi kesalahan saat membuka modal upload: ' + error.message);
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

    // Copy functions with fallback
    function copyAccount(account) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(account).then(function() {
                showToast('Nomor rekening berhasil disalin!', 'success');
            }).catch(function(err) {
                fallbackCopyTextToClipboard(account);
                showToast('Nomor rekening berhasil disalin!', 'success');
            });
        } else {
            fallbackCopyTextToClipboard(account);
            showToast('Nomor rekening berhasil disalin!', 'success');
        }
    }

    function copyAmount(amount) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(amount).then(function() {
                showToast('Jumlah transfer berhasil disalin!', 'success');
            }).catch(function(err) {
                fallbackCopyTextToClipboard(amount);
                showToast('Jumlah transfer berhasil disalin!', 'success');
            });
        } else {
            fallbackCopyTextToClipboard(amount);
            showToast('Jumlah transfer berhasil disalin!', 'success');
        }
    }

    function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
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
        bootstrap.Modal.getInstance(document.getElementById('paymentDetailsModal')).hide();
        
        setTimeout(() => {
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        }, 500);
    }

    // Upload Proof
    function uploadProof() {
        const form = document.getElementById('uploadForm');
        const formData = new FormData(form);
        
        formData.append('booking_id', '{{ $booking->id }}');
        
        const uploadBtn = event.target;
        const originalText = uploadBtn.innerHTML;
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
        uploadBtn.disabled = true;
        
        setTimeout(() => {
            bootstrap.Modal.getInstance(document.getElementById('uploadModal')).hide();
            
            setTimeout(() => {
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }, 500);
            
            uploadBtn.innerHTML = originalText;
            uploadBtn.disabled = false;
        }, 2000);
    }

    // Show Toast Notification
    function showToast(message, type = 'info') {
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
        
        let toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing payment system');
        
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap is not loaded!');
            return;
        }
        
        const paymentModal = document.getElementById('paymentModal');
        if (!paymentModal) {
            console.error('Payment modal not found in DOM');
        } else {
            console.log('Payment modal found');
        }
        
        const uploadModal = document.getElementById('uploadModal');
        if (!uploadModal) {
            console.error('Upload modal not found in DOM');
        } else {
            console.log('Upload modal found');
        }
        
        console.log('Payment system initialized successfully');
    });
</script>
@endpush

<style>
/* Modern Invoice 2026 Styles */

/* Hero Section */
.modern-invoice-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    padding: 3rem 0 2rem;
    overflow: hidden;
    color: white;
}

.hero-background-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.hero-content-invoice {
    text-align: center;
    position: relative;
    z-index: 2;
}

.hero-badge-invoice {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    font-weight: 500;
}

.hero-title-invoice {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.hero-subtitle-invoice {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 0;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Container */
.modern-invoice-container {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 2rem 0;
}

/* Sidebar */
.modern-sidebar {
    position: sticky;
    top: 2rem;
}

.modern-sidebar .sidebar-menu {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 1.5rem;
    border: 1px solid #e9ecef;
}

.modern-sidebar .sidebar-menu .nav-link {
    border-radius: 15px;
    margin-bottom: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    color: #495057;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.modern-sidebar .sidebar-menu .nav-link:hover,
.modern-sidebar .sidebar-menu .nav-link.active {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    transform: translateX(5px);
}

.modern-sidebar .sidebar-menu .nav-link i {
    width: 20px;
    text-align: center;
}

/* Ensure sidebar has minimum width and proper spacing */
.sidebar-column {
    min-width: 280px !important;
    flex: 0 0 auto;
}

@media (min-width: 1200px) {
    .sidebar-column {
        min-width: 300px !important;
        max-width: 320px;
        flex: 0 0 300px;
    }
    
    .main-content-column {
        flex: 1 1 auto;
        min-width: 0;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .sidebar-column {
        min-width: 280px !important;
        max-width: 300px;
        flex: 0 0 280px;
    }
    
    .main-content-column {
        flex: 1 1 auto;
        min-width: 0;
    }
}

@media (max-width: 991px) {
    .sidebar-column {
        min-width: 100%;
        margin-bottom: 2rem;
    }
}

/* Back Button */
.modern-back-section {
    margin-bottom: 2rem;
}

.modern-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: white;
    color: #495057;
    padding: 0.75rem 1.5rem;
    border-radius: 15px;
    text-decoration: none;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.modern-back-btn:hover {
    color: #667eea;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
    text-decoration: none;
}

/* Invoice Card */
.modern-invoice-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    border: none;
    overflow: hidden;
    margin-bottom: 2rem;
}

.invoice-header-modern {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 2rem;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.company-info {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.company-logo {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.logo-img {
    max-width: 60px;
    max-height: 60px;
    object-fit: contain;
}

.company-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.company-address {
    color: #6c757d;
    margin: 0;
    font-size: 0.9rem;
}

.invoice-meta {
    text-align: right;
}

.invoice-meta > div {
    margin-bottom: 1rem;
}

.invoice-meta .label {
    display: block;
    font-size: 0.8rem;
    color: #6c757d;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.invoice-meta .value {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-top: 0.25rem;
}

/* Invoice Body */
.invoice-body-modern {
    padding: 2rem;
}

.section-modern {
    margin-bottom: 2.5rem;
}

.section-title-modern {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #f0f0f0;
}

.section-title-modern i {
    color: #667eea;
}

/* Traveller Info */
.traveller-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
}

.info-card-modern {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.info-card-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.info-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.adult-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.child-icon {
    background: linear-gradient(135deg, #28a745, #20c997);
}

.info-content {
    display: flex;
    flex-direction: column;
}

.info-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
}

.info-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
}

/* Package Details */
.package-details-modern {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.package-name-modern {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.package-meta-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.meta-item-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #495057;
    font-size: 0.9rem;
}

.meta-item-modern i {
    color: #667eea;
    width: 16px;
}

.pickup-details {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    padding: 0.75rem 1rem;
    border-radius: 10px;
    font-size: 0.9rem;
    margin-top: 1rem;
}

.package-price-modern {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    text-align: right;
}

.price-label {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 0.5rem;
}

.price-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #28a745;
}

/* Price Breakdown */
.price-breakdown-modern {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid #e9ecef;
}

.price-item-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
}

.item-desc {
    font-weight: 500;
    color: #495057;
}

.item-detail {
    color: #6c757d;
    font-size: 0.9rem;
}

.item-price {
    font-weight: 600;
    color: #2c3e50;
}

.price-divider {
    height: 1px;
    background: #dee2e6;
    margin: 1rem 0;
}

.price-total-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 10px;
    margin: 1rem -2rem -2rem;
}

.total-label {
    font-size: 1.1rem;
    font-weight: 600;
}

.total-amount {
    font-size: 1.5rem;
    font-weight: 700;
}

/* Payment Sidebar */
.payment-sidebar-modern {
    position: sticky;
    top: 2rem;
}

/* Status Cards */
.status-cards-modern {
    margin-bottom: 2rem;
}

.status-card-modern {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    border: 1px solid #e9ecef;
}

.status-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.payment-status .status-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.booking-status .status-icon {
    background: linear-gradient(135deg, #28a745, #20c997);
}

.status-content {
    display: flex;
    flex-direction: column;
}

.status-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
    margin-bottom: 0.25rem;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
}

.status-pending {
    background: rgba(255, 193, 7, 0.2);
    color: #856404;
}

.status-success {
    background: rgba(40, 167, 69, 0.2);
    color: #155724;
}

.status-reject {
    background: rgba(220, 53, 69, 0.2);
    color: #721c24;
}

/* Alert */
.alert-modern {
    background: rgba(220, 53, 69, 0.1);
    color: #721c24;
    border: 1px solid rgba(220, 53, 69, 0.2);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    margin-bottom: 2rem;
    font-size: 0.9rem;
}

/* Payment Section */
.payment-section-modern {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.payment-header-modern {
    text-align: center;
    margin-bottom: 2rem;
}

.payment-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.payment-subtitle {
    color: #6c757d;
    font-size: 0.9rem;
    margin: 0;
}

.btn-pay-modern {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    border-radius: 15px;
    color: white;
    padding: 1.5rem;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
}

.btn-pay-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
}

.btn-pay-modern .btn-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.btn-pay-modern .btn-content {
    flex: 1;
    text-align: left;
}

.btn-pay-modern .btn-text {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.btn-pay-modern .btn-amount {
    display: block;
    font-size: 0.9rem;
    opacity: 0.9;
}

.btn-pay-modern .btn-arrow {
    font-size: 1.2rem;
    opacity: 0.8;
}

.divider-modern {
    text-align: center;
    margin: 2rem 0;
    position: relative;
}

.divider-modern::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
}

.divider-modern span {
    background: #f8f9fa;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

/* Upload Section */
.upload-section-modern {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.upload-header-modern {
    text-align: center;
    margin-bottom: 2rem;
}

.upload-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.upload-subtitle {
    color: #6c757d;
    font-size: 0.9rem;
    margin: 0;
}

.btn-upload-modern {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
    border-radius: 15px;
    color: white;
    padding: 1.5rem;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    margin-bottom: 1.5rem;
}

.btn-upload-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
}

.btn-upload-modern .btn-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.btn-upload-modern .btn-content {
    flex: 1;
    text-align: left;
}

.btn-upload-modern .btn-text {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.btn-upload-modern .btn-desc {
    display: block;
    font-size: 0.9rem;
    opacity: 0.9;
}

.upload-alternative {
    text-align: center;
    padding-top: 1rem;
    border-top: 1px solid #e9ecef;
}

.upload-form-simple {
    margin-top: 1rem;
}

.form-control-modern {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control-modern:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    outline: none;
}

.btn-submit-simple {
    background: #667eea;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-submit-simple:hover {
    background: #5a6fd8;
    transform: translateY(-2px);
}

/* Help Section */
.help-section-modern {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    text-align: center;
}

.help-icon-modern {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1.5rem;
}

.help-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.help-text {
    color: #6c757d;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.help-actions-modern {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.help-btn-modern {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem;
    border-radius: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
    background: white;
    color: #495057;
    min-width: 80px;
}

.help-btn-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    text-decoration: none;
}

.help-btn-modern.whatsapp {
    border-color: #25d366;
    color: #25d366;
}

.help-btn-modern.whatsapp:hover {
    background: #25d366;
    color: white;
}

.help-btn-modern.phone {
    border-color: #667eea;
    color: #667eea;
}

.help-btn-modern.phone:hover {
    background: #667eea;
    color: white;
}

.help-btn-modern i {
    font-size: 1.5rem;
}

.help-btn-modern span {
    font-size: 0.8rem;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .package-details-modern {
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .package-price-modern {
        align-items: flex-start;
        text-align: left;
    }
    
    .modern-invoice-container .row {
        --bs-gutter-x: 1rem;
    }
}

@media (max-width: 992px) {
    .invoice-header-modern {
        flex-direction: column;
        gap: 2rem;
        text-align: center;
    }
    
    .invoice-meta {
        text-align: center;
    }
    
    .company-info {
        justify-content: center;
    }
    
    .help-actions-modern {
        flex-direction: column;
    }
    
    .help-btn-modern {
        flex-direction: row;
        justify-content: center;
    }
    
    /* Stack sidebar on top for tablet */
    .modern-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
    
    .payment-sidebar-modern {
        position: static;
    }
}

@media (max-width: 768px) {
    .hero-title-invoice {
        font-size: 2rem;
    }
    
    .modern-invoice-container {
        padding: 1rem 0;
    }
    
    .invoice-body-modern {
        padding: 1.5rem;
    }
    
    .package-meta-grid {
        grid-template-columns: 1fr;
    }
    
    .traveller-info-grid {
        grid-template-columns: 1fr;
    }
    
    .btn-pay-modern,
    .btn-upload-modern {
        padding: 1.25rem;
    }
    
    .payment-section-modern,
    .upload-section-modern,
    .help-section-modern {
        padding: 1.5rem;
    }
    
    /* Full width on mobile */
    .modern-sidebar,
    .payment-sidebar-modern {
        margin-bottom: 2rem;
    }
}

@media (max-width: 576px) {
    .hero-title-invoice {
        font-size: 1.8rem;
    }
    
    .hero-subtitle-invoice {
        font-size: 1rem;
    }
    
    .company-info {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .btn-pay-modern .btn-content,
    .btn-upload-modern .btn-content {
        text-align: center;
    }
}

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