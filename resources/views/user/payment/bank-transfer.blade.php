@extends('layouts.guest')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">
                        <i class="fas fa-university me-2"></i>
                        Transfer Bank
                    </h4>
                    <p class="mb-0 mt-2">Silakan transfer ke salah satu rekening di bawah ini</p>
                </div>
                
                <div class="card-body p-4">
                    {{-- Order Info --}}
                    <div class="order-info mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Detail Pesanan</h6>
                                <div class="info-item">
                                    <span class="label">Order ID:</span>
                                    <code class="value">DLG-{{ $booking->id }}-{{ date('Ymd') }}</code>
                                </div>
                                <div class="info-item">
                                    <span class="label">Paket:</span>
                                    <span class="value">{{ $booking->package->package_name }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Tanggal:</span>
                                    <span class="value">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="total-amount-card">
                                    <h6 class="text-center mb-2">Total Pembayaran</h6>
                                    <h2 class="text-center text-success mb-0">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</h2>
                                    <p class="text-center text-muted small mb-0">Sudah termasuk pajak</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bank Accounts --}}
                    <div class="bank-accounts mb-4">
                        <h6 class="text-primary mb-3">Pilih Bank untuk Transfer</h6>
                        
                        <div class="row g-3">
                            {{-- BCA --}}
                            <div class="col-md-6">
                                <div class="bank-card" data-bank="BCA">
                                    <div class="bank-header">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="bank-logo">
                                        <span class="bank-name">Bank BCA</span>
                                    </div>
                                    <div class="bank-details">
                                        <div class="account-number">1234567890</div>
                                        <div class="account-name">PT. Ryzuru Tour Travel</div>
                                        <button class="btn btn-sm btn-outline-primary copy-btn" data-copy="1234567890">
                                            <i class="fas fa-copy me-1"></i>Salin
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Mandiri --}}
                            <div class="col-md-6">
                                <div class="bank-card" data-bank="Mandiri">
                                    <div class="bank-header">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="bank-logo">
                                        <span class="bank-name">Bank Mandiri</span>
                                    </div>
                                    <div class="bank-details">
                                        <div class="account-number">0987654321</div>
                                        <div class="account-name">PT. Ryzuru Tour Travel</div>
                                        <button class="btn btn-sm btn-outline-primary copy-btn" data-copy="0987654321">
                                            <i class="fas fa-copy me-1"></i>Salin
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- BNI --}}
                            <div class="col-md-6">
                                <div class="bank-card" data-bank="BNI">
                                    <div class="bank-header">
                                        <img src="https://upload.wikimedia.org/wikipedia/en/2/27/BNI_logo.svg" alt="BNI" class="bank-logo">
                                        <span class="bank-name">Bank BNI</span>
                                    </div>
                                    <div class="bank-details">
                                        <div class="account-number">5555666677</div>
                                        <div class="account-name">PT. Ryzuru Tour Travel</div>
                                        <button class="btn btn-sm btn-outline-primary copy-btn" data-copy="5555666677">
                                            <i class="fas fa-copy me-1"></i>Salin
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- BRI --}}
                            <div class="col-md-6">
                                <div class="bank-card" data-bank="BRI">
                                    <div class="bank-header">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI" class="bank-logo">
                                        <span class="bank-name">Bank BRI</span>
                                    </div>
                                    <div class="bank-details">
                                        <div class="account-number">1111222233</div>
                                        <div class="account-name">PT. Ryzuru Tour Travel</div>
                                        <button class="btn btn-sm btn-outline-primary copy-btn" data-copy="1111222233">
                                            <i class="fas fa-copy me-1"></i>Salin
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Instructions --}}
                    <div class="instructions mb-4">
                        <h6 class="text-primary mb-3">Cara Transfer</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="instruction-card">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h6>Pilih Bank</h6>
                                        <p>Pilih salah satu rekening bank di atas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="instruction-card">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h6>Transfer Sesuai Nominal</h6>
                                        <p>Transfer tepat <strong>Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="instruction-card">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h6>Simpan Bukti Transfer</h6>
                                        <p>Screenshot atau foto bukti transfer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="instruction-card">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <h6>Upload Bukti</h6>
                                        <p>Upload bukti transfer di halaman invoice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Important Notes --}}
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle me-2"></i>Penting!</h6>
                        <ul class="mb-0">
                            <li>Transfer harus sesuai dengan nominal yang tertera</li>
                            <li>Simpan bukti transfer untuk verifikasi</li>
                            <li>Pembayaran akan diverifikasi dalam 1x24 jam</li>
                            <li>Hubungi customer service jika ada kendala</li>
                        </ul>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="action-buttons text-center">
                        <a href="{{ route('profile.Invoice') }}" class="btn btn-success me-2">
                            <i class="fas fa-file-invoice me-2"></i>
                            Lihat Invoice
                        </a>
                        <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-outline-success">
                            <i class="fab fa-whatsapp me-2"></i>
                            Hubungi CS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Copy to clipboard functionality
    const copyButtons = document.querySelectorAll('.copy-btn');
    
    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const textToCopy = this.getAttribute('data-copy');
            
            // Create temporary textarea
            const textarea = document.createElement('textarea');
            textarea.value = textToCopy;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            
            // Show feedback
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-1"></i>Tersalin!';
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-success');
            
            setTimeout(() => {
                this.innerHTML = originalText;
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-primary');
            }, 2000);
        });
    });
    
    // Bank card selection
    const bankCards = document.querySelectorAll('.bank-card');
    
    bankCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove active class from all cards
            bankCards.forEach(c => c.classList.remove('active'));
            // Add active class to clicked card
            this.classList.add('active');
        });
    });
});
</script>

<style>
.card {
    border-radius: 20px !important;
}

.order-info {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 1.5rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid #e9ecef;
}

.info-item:last-child {
    border-bottom: none;
}

.info-item .label {
    font-weight: 500;
    color: #6c757d;
}

.info-item .value {
    color: #495057;
    font-weight: 600;
}

.total-amount-card {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 1.5rem;
    border-radius: 15px;
    text-align: center;
}

.bank-card {
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    background: white;
}

.bank-card:hover {
    border-color: #667eea;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1);
}

.bank-card.active {
    border-color: #28a745;
    background: #f8fff9;
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
}

.bank-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.bank-logo {
    width: 40px;
    height: 40px;
    object-fit: contain;
    margin-right: 0.75rem;
}

.bank-name {
    font-weight: 600;
    color: #495057;
}

.bank-details {
    text-align: center;
}

.account-number {
    font-size: 1.2rem;
    font-weight: 700;
    color: #495057;
    font-family: 'Courier New', monospace;
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.account-name {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 0.75rem;
}

.copy-btn {
    border-radius: 20px;
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
}

.instruction-card {
    display: flex;
    align-items: flex-start;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    border: 1px solid #e9ecef;
    margin-bottom: 1rem;
    height: 100%;
}

.step-number {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 1rem;
    flex-shrink: 0;
}

.step-content h6 {
    margin-bottom: 0.5rem;
    color: #495057;
    font-weight: 600;
}

.step-content p {
    margin: 0;
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
}

.action-buttons {
    margin-top: 2rem;
}

.btn {
    border-radius: 25px;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
}

@media (max-width: 768px) {
    .order-info {
        padding: 1rem;
    }
    
    .bank-card {
        margin-bottom: 1rem;
    }
    
    .instruction-card {
        padding: 0.75rem;
    }
    
    .step-number {
        width: 30px;
        height: 30px;
        font-size: 0.9rem;
    }
    
    .action-buttons .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
    
    .info-item .value {
        margin-top: 0.25rem;
    }
}
</style>
@endsection