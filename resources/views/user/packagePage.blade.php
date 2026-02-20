{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')
<div class="container mt-4"> 

    {{-- To display validation errors or success messages --}}
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops! Ada beberapa masalah:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Breadcrumb Navigation --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <i class="fas fa-home me-1"></i>Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.travelPackage.show') }}" class="text-decoration-none">Paket Wisata</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $travelPackage->package_name}}</li>
        </ol>
    </nav>

    {{-- Package Header --}}
    <div class="package-header mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="package-badge mb-2">
                    <span class="badge bg-primary me-2">{{ $travelPackage->tour_type }}</span>
                    <span class="badge bg-success">
                        @switch($travelPackage->service_type)
                            @case('hotel_pickup')
                                <i class="fas fa-hotel me-1"></i>Hotel Pickup
                                @break
                            @case('airport_transfer')
                                <i class="fas fa-plane me-1"></i>Airport Transfer
                                @break
                            @case('komodo_tour')
                                <i class="fas fa-dragon me-1"></i>Komodo Tour
                                @break
                            @case('lombok_destination')
                                <i class="fas fa-mountain me-1"></i>Lombok
                                @break
                            @case('sumbawa_destination')
                                <i class="fas fa-water me-1"></i>Sumbawa
                                @break
                        @endswitch
                    </span>
                </div>
                <h1 class="package-title">{{ $travelPackage->package_name}}</h1>
                <p class="package-subtitle text-muted">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ $travelPackage->destination_details ?? 'Jelajahi keindahan Lombok & Komodo' }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="package-actions">
                    <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-success me-2">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                    </a>
                    <button type="button" id="shareBtn" class="btn btn-outline-primary">
                        <i class="fas fa-share-alt me-2"></i>Bagikan
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Package Images Gallery --}}
    <div class="package-gallery mb-5">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="main-image">
                    @if ($travelPackage->image_1 && $travelPackage->image_1 != "empty-image.png")
                        <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_1 ) }}" 
                             class="img-fluid rounded-3 shadow" 
                             alt="{{ $travelPackage->package_name }}"
                             style="height: 400px; width: 100%; object-fit: cover;">
                    @else
                        <div class="placeholder-image d-flex align-items-center justify-content-center rounded-3 shadow"
                             style="height: 400px; width: 100%; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                            <div class="text-center">
                                <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                <p class="text-muted mb-0">{{ $travelPackage->package_name }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-3">
                    <div class="col-12">
                        @if ($travelPackage->image_2 && $travelPackage->image_2 != "empty-image.png")
                            <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_2 ) }}" 
                                 class="img-fluid rounded-3 shadow" 
                                 alt="{{ $travelPackage->package_name }}"
                                 style="height: 190px; width: 100%; object-fit: cover;">
                        @else
                            <div class="placeholder-image-small d-flex align-items-center justify-content-center rounded-3 shadow"
                                 style="height: 190px; width: 100%; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                                <i class="fas fa-image fa-2x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        @if ($travelPackage->image_3 && $travelPackage->image_3 != "empty-image.png")
                            <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_3 ) }}" 
                                 class="img-fluid rounded-3 shadow" 
                                 alt="{{ $travelPackage->package_name }}"
                                 style="height: 190px; width: 100%; object-fit: cover;">
                        @else
                            <div class="placeholder-image-small d-flex align-items-center justify-content-center rounded-3 shadow"
                                 style="height: 190px; width: 100%; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                                <i class="fas fa-image fa-2x text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Package Quick Info --}}
    <div class="package-quick-info mb-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="info-title">Durasi</h5>
                    <p class="info-value">{{ $travelPackage->duration}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="info-title">Tipe Tour</h5>
                    <p class="info-value">{{ $travelPackage->tour_type}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h5 class="info-title">Harga Mulai Dari</h5>
                    <p class="info-value text-success">Rp {{ number_format($travelPackage->price_start_from, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Package Content --}}
    <div class="row">
        <div class="col-lg-8">
            {{-- Overview Section --}}
            <div class="content-section mb-5">
                <h3 class="section-title">
                    <i class="fas fa-info-circle me-2"></i>Overview
                </h3>
                <div class="section-content">
                    <p class="lead">{{ $travelPackage->overview }}</p>
                </div>
            </div>

            {{-- What's Included Section --}}
            <div class="content-section mb-5">
                <h3 class="section-title">
                    <i class="fas fa-check-circle me-2"></i>Yang Termasuk
                </h3>
                <div class="section-content">
                    <div class="included-items">
                        {!! $travelPackage->included_things !!}
                    </div>
                </div>
            </div>

            {{-- Tour Plan Section --}}
            <div class="content-section mb-5">
                <h3 class="section-title">
                    <i class="fas fa-route me-2"></i>Rencana Perjalanan
                </h3>
                <div class="section-content">
                    <div class="tour-plan">
                        {!! $travelPackage->tour_plane_description !!}
                    </div>
                </div>
            </div>

            {{-- Important Info --}}
            <div class="alert alert-info d-flex" role="alert">
                <i class="fas fa-info-circle me-3 mt-1"></i>
                <div>
                    <h6 class="alert-heading">Informasi Penting:</h6>
                    <ul class="mb-0">
                        <li>Jika Anda memiliki permintaan tambahan, perubahan akomodasi, atau moda transportasi, Anda dapat menentukan selama proses booking.</li>
                        <li>Setelah booking selesai, invoice akan dikirim termasuk semua harga.</li>
                        <li>Setelah itu, Anda dapat melakukan pembayaran untuk reservasi Anda.</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Booking Sidebar --}}
        <div class="col-lg-4">
            <div class="booking-sidebar sticky-top">
                @guest
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Silakan login terlebih dahulu untuk melakukan booking</strong>
                    </div>
                @endguest

                <div class="booking-card">
                    <div class="booking-header">
                        <h4 class="mb-0">
                            <i class="fas fa-calendar-check me-2"></i>Book Sekarang
                        </h4>
                    </div>
                    
                    <form action="{{route('user.booking.store')}}" method="post" class="booking-form">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $travelPackage->id}}">
                        
                        {{-- Date Selection --}}
                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-calendar me-2"></i>Tanggal Keberangkatan
                            </label>
                            <input type="date" class="form-control" name="date" required min="{{ date('Y-m-d') }}">
                        </div>

                        {{-- Adults --}}
                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-user me-2"></i>Dewasa (18+)
                            </label>
                            <div class="input-group">
                                <input type="number" id="adults" name="number_of_adult" value="1" min="1" 
                                       oninput="updateTotalPrice()" class="form-control" required>
                                <span class="input-group-text">
                                    Rp {{ number_format($travelPackage->per_adult_fee, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        {{-- Children --}}
                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-child me-2"></i>Anak (6-12 tahun)
                            </label>
                            <div class="input-group">
                                <input type="number" id="children" name="number_of_child" value="0" min="0" 
                                       oninput="updateTotalPrice()" class="form-control" required>
                                <span class="input-group-text">
                                    Rp {{ number_format($travelPackage->per_child_fee, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        {{-- Pickup Location --}}
                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-map-marker-alt me-2"></i>Lokasi Penjemputan
                            </label>
                            <select class="form-select" name="pick_up_location" required>
                                <option value="From Hotel">Dari Hotel</option>
                                <option value="From Airport">Dari Bandara</option>
                            </select>
                        </div>

                        {{-- Pickup Details --}}
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Detail Lokasi</label>
                            <textarea class="form-control" name="pick_up_location_details" 
                                      placeholder="Nama hotel atau detail lokasi penjemputan..." 
                                      rows="3" required></textarea>
                        </div>

                        {{-- Price Summary --}}
                        <div class="price-summary mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Harga Dasar:</span>
                                <span>Rp {{ number_format($travelPackage->price_start_from, 0, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Total:</span>
                                <span class="text-success">
                                    Rp <span id="totalPriceDisplay">{{ number_format($travelPackage->price_start_from, 0, ',', '.') }}</span>
                                </span>
                            </div>
                            <input type="hidden" id="totalPrice" name="total_fee" value="{{ $travelPackage->price_start_from }}">
                        </div>

                        @auth
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-credit-card me-2"></i>Book Sekarang
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login untuk Book
                            </a>
                        @endauth

                        <p class="text-center text-muted mt-3 small">
                            <i class="fas fa-shield-alt me-1"></i>
                            Pembayaran aman & dapat dibatalkan hingga 24 jam sebelum keberangkatan
                        </p>
                    </form>
                </div>

                {{-- WhatsApp Contact --}}
                <div class="contact-card mt-4">
                    <div class="text-center">
                        <h6 class="mb-3">Butuh Bantuan?</h6>
                        <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-success w-100">
                            <i class="fab fa-whatsapp me-2"></i>
                            Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Pricing Calculator Script --}}
<script>
    const startFee = {{ $travelPackage->price_start_from}};
    const perAdultFee = {{$travelPackage->per_adult_fee}};
    const perChildFee = {{$travelPackage->per_child_fee}};

    function updateTotalPrice() {
        const children = parseInt(document.getElementById('children').value) || 0;
        const adults = parseInt(document.getElementById('adults').value) || 0;
        const totalPrice = startFee + (children * perChildFee) + (adults * perAdultFee);
        
        document.getElementById('totalPrice').value = totalPrice;
        document.getElementById('totalPriceDisplay').textContent = totalPrice.toLocaleString('id-ID');
    }

    // Initialize price calculation
    document.addEventListener('DOMContentLoaded', function() {
        updateTotalPrice();
    });
</script>

<style>
/* Package Detail Styles */
.package-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
    border: 1px solid #e9ecef;
}

.package-title {
    color: var(--dark-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.package-subtitle {
    font-size: 1.1rem;
}

.package-actions .btn {
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.package-actions .btn:hover {
    transform: translateY(-2px);
}

.package-gallery {
    margin-bottom: 3rem;
}

.package-gallery .placeholder-image,
.package-gallery .placeholder-image-small {
    border: 2px dashed #dee2e6;
    transition: all 0.3s ease;
}

.package-gallery .placeholder-image:hover,
.package-gallery .placeholder-image-small:hover {
    border-color: var(--primary-color, #667eea);
    background: linear-gradient(135deg, #f0f4ff, #e8f2ff) !important;
}

.package-gallery img {
    transition: all 0.3s ease;
}

.package-gallery img:hover {
    transform: scale(1.02);
}

.package-quick-info {
    margin-bottom: 3rem;
}

.package-quick-info .info-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    height: 100%;
}

.package-quick-info .info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.info-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color, #667eea), var(--secondary-color, #764ba2));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.info-icon i {
    font-size: 1.5rem;
    color: white;
}

.info-title {
    color: var(--dark-color, #2c3e50);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.info-value {
    color: var(--muted-color, #7f8c8d);
    font-size: 1.1rem;
    margin: 0;
    font-weight: 500;
}

.content-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
    margin-bottom: 2rem;
}

.section-title {
    color: var(--dark-color, #2c3e50);
    font-weight: 600;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.section-content {
    line-height: 1.7;
}

.section-content ul {
    padding-left: 1.5rem;
}

.section-content ul li {
    margin-bottom: 0.5rem;
}

.booking-sidebar {
    top: 2rem;
}

.booking-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    border: 1px solid #f0f0f0;
}

.booking-header {
    background: linear-gradient(135deg, var(--primary-color, #667eea), var(--secondary-color, #764ba2));
    color: white;
    padding: 1.5rem;
}

.booking-form {
    padding: 2rem;
}

.form-label {
    color: var(--dark-color, #2c3e50);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 0.75rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color, #667eea);
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.input-group-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-left: none;
    font-size: 0.9rem;
    font-weight: 500;
}

.price-summary {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 10px;
    border: 1px solid #e9ecef;
}

.contact-card {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 1rem;
}

.breadcrumb-item a {
    color: var(--primary-color, #667eea);
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: var(--secondary-color, #764ba2);
}

.breadcrumb-item.active {
    color: var(--muted-color, #7f8c8d);
}

.alert {
    border-radius: 10px;
    border: none;
}

.alert-info {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
}

.btn {
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color, #667eea), var(--secondary-color, #764ba2));
    color: white;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
}

.btn-success {
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    color: white;
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(39, 174, 96, 0.4);
}

.btn-outline-primary {
    border: 2px solid var(--primary-color, #667eea);
    color: var(--primary-color, #667eea);
    background: transparent;
}

.btn-outline-primary:hover {
    background: var(--primary-color, #667eea);
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 991px) {
    .booking-sidebar {
        position: static !important;
        top: auto !important;
        margin-top: 2rem;
    }
    
    .package-header {
        padding: 1.5rem;
    }
    
    .content-section {
        padding: 1.5rem;
    }
    
    .booking-form {
        padding: 1.5rem;
    }
    
    .package-actions {
        margin-top: 1rem;
        text-align: center !important;
    }
    
    .package-actions .btn {
        margin-bottom: 0.5rem;
    }
}

@media (max-width: 576px) {
    .package-header {
        padding: 1rem;
    }
    
    .package-title {
        font-size: 1.5rem;
    }
    
    .info-card {
        padding: 1.5rem !important;
    }
    
    .content-section {
        padding: 1rem;
    }
    
    .package-gallery .row {
        margin: 0;
    }
    
    .package-gallery .col-lg-8,
    .package-gallery .col-lg-4 {
        padding: 0.5rem;
    }
    
    .booking-form {
        padding: 1rem;
    }
    
    .booking-header {
        padding: 1rem;
    }
    
    .form-control, .form-select {
        padding: 0.6rem;
        font-size: 0.9rem;
    }
    
    .btn {
        padding: 0.6rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .package-actions .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .breadcrumb {
        font-size: 0.9rem;
    }
    
    .package-badge .badge {
        font-size: 0.7rem;
        padding: 0.3rem 0.6rem;
    }
}
</style>

@endsection
