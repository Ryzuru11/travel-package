@extends('layouts.mainStructure')

@section('content')
<div class="container mt-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <i class="fas fa-home me-1"></i>Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('profile.Invoice') }}" class="text-decoration-none">Invoice</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Invoice #{{ $booking->id }}</li>
        </ol>
    </nav>

    <div class="row">
        {{-- Invoice Details --}}
        <div class="col-lg-8">
            <div class="invoice-card">
                <div class="invoice-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="invoice-title">Invoice #{{ $booking->id }}</h2>
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar me-2"></i>
                                Dibuat: {{ $booking->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                        <div class="invoice-status">
                            @if($booking->payment_status == 'pending')
                                <span class="badge bg-warning fs-6">
                                    <i class="fas fa-clock me-1"></i>Menunggu Pembayaran
                                </span>
                            @elseif($booking->payment_status == 'Success')
                                <span class="badge bg-success fs-6">
                                    <i class="fas fa-check-circle me-1"></i>Lunas
                                </span>
                            @else
                                <span class="badge bg-danger fs-6">
                                    <i class="fas fa-times-circle me-1"></i>{{ ucfirst($booking->payment_status) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="invoice-body">
                    {{-- Package Information --}}
                    <div class="package-info mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-suitcase me-2"></i>
                            Detail Paket Wisata
                        </h5>
                        <div class="info-card">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="package-name">{{ $booking->package->package_name }}</h6>
                                    <div class="package-details">
                                        <div class="detail-item">
                                            <span class="label">Tanggal Perjalanan:</span>
                                            <span class="value">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="label">Durasi:</span>
                                            <span class="value">{{ $booking->package->duration }}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="label">Tipe Tour:</span>
                                            <span class="value">{{ $booking->package->tour_type }}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="label">Penjemputan:</span>
                                            <span class="value">{{ $booking->pick_up_location }}</span>
                                        </div>
                                        @if($booking->pick_up_location_details)
                                        <div class="detail-item">
                                            <span class="label">Detail Lokasi:</span>
                                            <span class="value">{{ $booking->pick_up_location_details }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="participants">
                                        <div class="participant-item">
                                            <i class="fas fa-user me-2"></i>
                                            <span>{{ $booking->number_of_adult }} Dewasa</span>
                                        </div>
                                        @if($booking->number_of_child > 0)
                                        <div class="participant-item">
                                            <i class="fas fa-child me-2"></i>
                                            <span>{{ $booking->number_of_child }} Anak</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Price Breakdown --}}
                    <div class="price-breakdown mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-calculator me-2"></i>
                            Rincian Biaya
                        </h5>
                        <div class="price-card">
                            <div class="price-item">
                                <span class="description">Paket {{ $booking->package->package_name }}</span>
                                <span class="amount">Rp {{ number_format($booking->package->price_start_from, 0, ',', '.') }}</span>
                            </div>
                            @if($booking->number_of_adult > 1)
                            <div class="price-item">
                                <span class="description">Biaya Tambahan Dewasa ({{ $booking->number_of_adult - 1 }} orang)</span>
                                <span class="amount">Rp {{ number_format(($booking->number_of_adult - 1) * $booking->package->per_adult_fee, 0, ',', '.') }}</span>
                            </div>
                            @endif
                            @if($booking->number_of_child > 0)
                            <div class="price-item">
                                <span class="description">Biaya Anak ({{ $booking->number_of_child }} orang)</span>
                                <span class="amount">Rp {{ number_format($booking->number_of_child * $booking->package->per_child_fee, 0, ',', '.') }}</span>
                            </div>
                            @endif
                            <div class="price-item subtotal">
                                <span class="description">Subtotal</span>
                                <span class="amount">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                            </div>
                            <div class="price-item tax">
                                <span class="description">Pajak & Biaya Layanan</span>
                                <span class="amount text-success">Sudah Termasuk</span>
                            </div>
                            <div class="price-item total">
                                <span class="description">Total Pembayaran</span>
                                <span class="amount">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Receipt Section --}}
                    @if($booking->payment_receipt_image)
                    <div class="payment-receipt mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-receipt me-2"></i>
                            Bukti Pembayaran
                        </h5>
                        <div class="receipt-card">
                            <div class="receipt-image">
                                <img src="{{ asset('image/uploads/payment-recipt/' . $booking->payment_receipt_image) }}" 
                                     alt="Payment Receipt" 
                                     class="img-fluid rounded">
                            </div>
                            <div class="receipt-info">
                                <p class="text-muted mb-2">
                                    <i class="fas fa-upload me-2"></i>
                                    Diupload: {{ $booking->updated_at->format('d M Y H:i') }}
                                </p>
                                @if($booking->payment_status == 'pending')
                                <p class="text-warning mb-0">
                                    <i class="fas fa-clock me-2"></i>
                                    Menunggu verifikasi admin
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Payment Actions Sidebar --}}
        <div class="col-lg-4">
            <div class="payment-actions-card">
                <h5 class="card-title">
                    <i class="fas fa-credit-card me-2"></i>
                    Pembayaran
                </h5>

                @if($booking->payment_status == 'pending')
                    {{-- Online Payment Options --}}
                    <div class="payment-section mb-4">
                        <h6 class="payment-method-title">
                            <i class="fas fa-globe me-2"></i>
                            Pembayaran Online
                        </h6>
                        <p class="text-muted small mb-3">Bayar langsung dengan aman menggunakan gateway pembayaran</p>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" onclick="showPaymentModal()">
                                <i class="fas fa-credit-card me-2"></i>
                                Midtrans Payment Gateway
                            </button>
                            <a href="{{ route('payment.qris', $booking->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-qrcode me-2"></i>
                                QRIS Payment
                            </a>
                        </div>
                    </div>

                    <div class="divider">
                        <span>atau</span>
                    </div>

                    {{-- Manual Payment Upload --}}
                    <div class="payment-section">
                        <h6 class="payment-method-title">
                            <i class="fas fa-upload me-2"></i>
                            Upload Bukti Transfer
                        </h6>
                        <p class="text-muted small mb-3">Transfer manual ke rekening kami dan upload bukti pembayaran</p>
                        
                        {{-- Bank Account Info --}}
                        <div class="bank-info mb-3">
                            <div class="bank-item">
                                <strong>Bank BCA</strong><br>
                                <span class="account-number">1234567890</span><br>
                                <span class="account-name">PT Dilaga Tour & Travel</span>
                            </div>
                        </div>

                        @if(!$booking->payment_receipt_image)
                        <form action="{{ route('user.payment.receipt.image', $booking->id) }}" method="POST" enctype="multipart/form-data" class="upload-form">
                            @csrf
                            <div class="mb-3">
                                <label for="payment_receipt" class="form-label">Pilih File Bukti Pembayaran</label>
                                <input type="file" name="payment_receipt_image" id="payment_receipt" class="form-control" accept="image/*" required>
                                <div class="form-text">Format: JPG, PNG, PDF. Maksimal 5MB</div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-upload me-2"></i>
                                Upload Bukti Pembayaran
                            </button>
                        </form>
                        @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Bukti pembayaran sudah diupload. Menunggu verifikasi admin.
                        </div>
                        @endif
                    </div>

                @elseif($booking->payment_status == 'Success')
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Pembayaran Berhasil!</strong><br>
                        Booking Anda telah dikonfirmasi.
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.Booking') }}" class="btn btn-primary">
                            <i class="fas fa-calendar-check me-2"></i>
                            Lihat Detail Booking
                        </a>
                        <button class="btn btn-outline-secondary" onclick="window.print()">
                            <i class="fas fa-print me-2"></i>
                            Print Invoice
                        </button>
                    </div>

                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Pembayaran {{ ucfirst($booking->payment_status) }}</strong><br>
                        Silakan coba lagi atau hubungi customer service.
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('payment.create', $booking->id) }}" class="btn btn-primary">
                            <i class="fas fa-redo me-2"></i>
                            Coba Bayar Lagi
                        </a>
                        <a href="{{ route('contactUs') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-headset me-2"></i>
                            Hubungi Support
                        </a>
                    </div>
                @endif

                {{-- Help Section --}}
                <div class="help-section mt-4">
                    <h6 class="help-title">
                        <i class="fas fa-question-circle me-2"></i>
                        Butuh Bantuan?
                    </h6>
                    <div class="help-contacts">
                        <a href="https://wa.me/6281917166060" target="_blank" class="help-contact">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="tel:+6281917166060" class="help-contact">
                            <i class="fas fa-phone"></i>
                            <span>Telepon</span>
                        </a>
                        <a href="{{ route('contactUs') }}" class="help-contact">
                            <i class="fas fa-envelope"></i>
                            <span>Email</span>
                        </a>
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
            accountName: 'PT Dilaga Tour & Travel',
            instructions: [
                'Login ke BCA Mobile atau Internet Banking',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 1234567890',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Dilaga Tour & Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        bni: {
            name: 'BNI',
            account: '0987654321',
            accountName: 'PT Dilaga Tour & Travel',
            instructions: [
                'Login ke BNI Mobile Banking',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 0987654321',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Dilaga Tour & Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        bri: {
            name: 'BRI',
            account: '5555666677',
            accountName: 'PT Dilaga Tour & Travel',
            instructions: [
                'Login ke BRI Mobile',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 5555666677',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Dilaga Tour & Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        mandiri: {
            name: 'Mandiri',
            account: '1122334455',
            accountName: 'PT Dilaga Tour & Travel',
            instructions: [
                'Login ke Livin by Mandiri',
                'Pilih menu Transfer',
                'Masukkan nomor rekening: 1122334455',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Dilaga Tour & Travel',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        gopay: {
            name: 'GoPay',
            account: '081917166060',
            accountName: 'Dilaga Tour',
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
            accountName: 'Dilaga Tour',
            instructions: [
                'Buka aplikasi DANA',
                'Pilih Kirim',
                'Masukkan nomor: 081917166060',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: Dilaga Tour',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        ovo: {
            name: 'OVO',
            account: '081917166060',
            accountName: 'Dilaga Tour',
            instructions: [
                'Buka aplikasi OVO',
                'Pilih Transfer',
                'Masukkan nomor: 081917166060',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: Dilaga Tour',
                'Konfirmasi dan lakukan transfer'
            ]
        },
        jenius: {
            name: 'Jenius',
            account: '90001234567',
            accountName: 'PT Dilaga Tour & Travel',
            instructions: [
                'Buka aplikasi Jenius',
                'Pilih Send It',
                'Masukkan nomor rekening: 90001234567',
                'Masukkan nominal: Rp {{ number_format($booking->total_fee, 0, ",", ".") }}',
                'Pastikan nama penerima: PT Dilaga Tour & Travel',
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

    // Test functions for debugging
    function testPaymentModal() {
        console.log('Testing payment modal...');
        showPaymentModal();
    }

    function testUploadModal() {
        console.log('Testing upload modal...');
        showUploadModal();
    }

    function testBootstrap() {
        console.log('Bootstrap version:', bootstrap);
        alert('Bootstrap loaded: ' + (typeof bootstrap !== 'undefined' ? 'YES' : 'NO'));
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing payment system');
        
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap is not loaded!');
            alert('Bootstrap tidak dimuat! Silakan refresh halaman.');
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

/* Invoice Styles */
.invoice-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.invoice-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 2rem;
    border-bottom: 1px solid #e9ecef;
}

.invoice-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.invoice-body {
    padding: 2rem;
}

.section-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.info-card, .price-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1.5rem;
    border: 1px solid #e9ecef;
}

.package-name {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1rem;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.detail-item .label {
    font-weight: 500;
    color: #6c757d;
}

.detail-item .value {
    color: #495057;
    font-weight: 500;
}

.participants {
    text-align: right;
}

.participant-item {
    margin-bottom: 0.5rem;
    color: #495057;
}

.price-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #e9ecef;
}

.price-item:last-child {
    border-bottom: none;
}

.price-item.subtotal {
    border-top: 2px solid #dee2e6;
    margin-top: 0.5rem;
    padding-top: 1rem;
}

.price-item.total {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    margin: 0.5rem -1.5rem -1.5rem;
    padding: 1rem 1.5rem;
    font-weight: 600;
    font-size: 1.1rem;
}

.receipt-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
    border: 1px solid #e9ecef;
}

.receipt-image img {
    max-height: 300px;
    width: auto;
    border-radius: 8px;
}

/* Payment Actions Card */
.payment-actions-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 2rem;
    position: sticky;
    top: 2rem;
}

.card-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.payment-method-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.divider {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e9ecef;
}

.divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.bank-info {
    background: #e3f2fd;
    border-radius: 8px;
    padding: 1rem;
}

.bank-item {
    font-size: 0.9rem;
}

.account-number {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #1976d2;
}

.account-name {
    color: #495057;
}

.upload-form .form-control {
    border-radius: 8px;
}

.help-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
}

.help-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 1rem;
}

.help-contacts {
    display: flex;
    justify-content: space-around;
}

.help-contact {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: #495057;
    transition: all 0.3s ease;
}

.help-contact:hover {
    color: #667eea;
    transform: translateY(-2px);
}

.help-contact i {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.help-contact span {
    font-size: 0.8rem;
    font-weight: 500;
}

/* Buttons */
.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 991px) {
    .payment-actions-card {
        position: static;
        margin-top: 2rem;
    }
    
    .invoice-header {
        padding: 1.5rem;
    }
    
    .invoice-body {
        padding: 1.5rem;
    }
    
    .detail-item {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .participants {
        text-align: left;
        margin-top: 1rem;
    }
}

@media (max-width: 576px) {
    .help-contacts {
        flex-direction: column;
        gap: 1rem;
    }
    
    .help-contact {
        flex-direction: row;
        justify-content: flex-start;
    }
    
    .help-contact i {
        margin-right: 0.5rem;
        margin-bottom: 0;
    }
}
</style>
/* Invoice Styles */
.invoice-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.invoice-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 2rem;
    border-bottom: 1px solid #e9ecef;
}

.invoice-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.invoice-body {
    padding: 2rem;
}

.section-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.info-card, .price-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1.5rem;
    border: 1px solid #e9ecef;
}

.package-name {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1rem;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.detail-item .label {
    font-weight: 500;
    color: #6c757d;
}

.detail-item .value {
    color: #495057;
    font-weight: 500;
}

.participants {
    text-align: right;
}

.participant-item {
    margin-bottom: 0.5rem;
    color: #495057;
}

.price-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #e9ecef;
}

.price-item:last-child {
    border-bottom: none;
}

.price-item.subtotal {
    border-top: 2px solid #dee2e6;
    margin-top: 0.5rem;
    padding-top: 1rem;
}

.price-item.total {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    margin: 0.5rem -1.5rem -1.5rem;
    padding: 1rem 1.5rem;
    font-weight: 600;
    font-size: 1.1rem;
}

.receipt-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
    border: 1px solid #e9ecef;
}

.receipt-image img {
    max-height: 300px;
    width: auto;
    border-radius: 8px;
}

/* Payment Actions Card */
.payment-actions-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 2rem;
    position: sticky;
    top: 2rem;
}

.card-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.payment-method-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.divider {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e9ecef;
}

.divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.bank-info {
    background: #e3f2fd;
    border-radius: 8px;
    padding: 1rem;
}

.bank-item {
    font-size: 0.9rem;
}

.account-number {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #1976d2;
}

.account-name {
    color: #495057;
}

.upload-form .form-control {
    border-radius: 8px;
}

.help-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
}

.help-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 1rem;
}

.help-contacts {
    display: flex;
    justify-content: space-around;
}

.help-contact {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: #495057;
    transition: all 0.3s ease;
}

.help-contact:hover {
    color: #667eea;
    transform: translateY(-2px);
}

.help-contact i {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.help-contact span {
    font-size: 0.8rem;
    font-weight: 500;
}

/* Buttons */
.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 991px) {
    .payment-actions-card {
        position: static;
        margin-top: 2rem;
    }
    
    .invoice-header {
        padding: 1.5rem;
    }
    
    .invoice-body {
        padding: 1.5rem;
    }
    
    .detail-item {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .participants {
        text-align: left;
        margin-top: 1rem;
    }
}

@media (max-width: 576px) {
    .help-contacts {
        flex-direction: column;
        gap: 1rem;
    }
    
    .help-contact {
        flex-direction: row;
        justify-content: flex-start;
    }
    
    .help-contact i {
        margin-right: 0.5rem;
        margin-bottom: 0;
    }
}
</style>

@endsection