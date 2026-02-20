@extends('layouts/mainStructure')

@section('content')

    {{-- Loading Overlay --}}
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    {{-- Modern Hero Header --}}
    <div class="modern-packages-hero">
        <div class="hero-background-pattern"></div>
        <div class="container">
            <div class="hero-content-packages">
                <div class="hero-badge-packages">
                    <i class="fas fa-compass"></i>
                    <span>Jelajahi Destinasi</span>
                </div>
                <h1 class="hero-title-packages">Paket Wisata Terbaik</h1>
                <p class="hero-subtitle-packages">
                    Temukan petualangan tak terlupakan dengan koleksi paket wisata premium kami
                </p>
                
                {{-- Breadcrumb Modern --}}
                <nav class="breadcrumb-modern">
                    <a href="{{ route('home') }}" class="breadcrumb-item-modern">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-separator"></i>
                    <span class="breadcrumb-item-modern active">
                        <i class="fas fa-suitcase"></i>
                        <span>Paket Wisata</span>
                    </span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid modern-packages-container">
        <div class="row g-4">
            {{-- Modern Sidebar Filter --}}
            <div class="col-lg-3">
                <div class="modern-filter-sidebar">
                    <div class="filter-header">
                        <h4 class="filter-title">
                            <i class="fas fa-filter"></i>
                            {{ __('messages.search_filter') }}
                        </h4>
                        <div class="filter-decoration"></div>
                    </div>
                    
                    <form action="{{ route('user.travelPackage.show') }}" method="get" class="modern-filter-form">
                        
                        {{-- Price Sort Filter --}}
                        <div class="filter-section">
                            <label class="filter-label">
                                <i class="fas fa-sort-amount-down"></i>
                                {{ __('messages.sort_price') }}
                            </label>
                            <select name="sort" id="sort" class="modern-select">
                                <option value="low_to_high" {{ request('sort') == 'low_to_high' ? 'selected' : '' }}>{{ __('messages.price_low_to_high') }}</option>
                                <option value="high_to_low" {{ request('sort') == 'high_to_low' ? 'selected' : '' }}>{{ __('messages.price_high_to_low') }}</option>
                            </select>
                        </div>
                        
                        {{-- Date Filter --}}
                        <div class="filter-section">
                            <label class="filter-label">
                                <i class="fas fa-calendar-alt"></i>
                                {{ __('messages.travel_date') }}
                            </label>
                            <input type="date" name="date" id="date" class="modern-input" value="{{ request('date') }}">
                        </div>

                        {{-- Service Type Filter --}}
                        <div class="filter-section">
                            <label class="filter-label">
                                <i class="fas fa-concierge-bell"></i>
                                {{ __('messages.service_type') }}
                            </label>
                            <div class="filter-options">
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="" {{ !request('service_type') ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">{{ __('messages.all_services') }}</span>
                                </label>
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="hotel_pickup" {{ request('service_type') == 'hotel_pickup' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">
                                        <i class="fas fa-hotel"></i>
                                        {{ __('messages.hotel_pickup_service') }}
                                    </span>
                                </label>
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="airport_transfer" {{ request('service_type') == 'airport_transfer' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">
                                        <i class="fas fa-plane"></i>
                                        {{ __('messages.airport_transfer_service') }}
                                    </span>
                                </label>
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="komodo_tour" {{ request('service_type') == 'komodo_tour' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">
                                        <i class="fas fa-dragon"></i>
                                        {{ __('messages.komodo_tour_service') }}
                                    </span>
                                </label>
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="lombok_destination" {{ request('service_type') == 'lombok_destination' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">
                                        <i class="fas fa-mountain"></i>
                                        {{ __('messages.lombok_destination_service') }}
                                    </span>
                                </label>
                                <label class="modern-radio">
                                    <input type="radio" name="service_type" value="sumbawa_destination" {{ request('service_type') == 'sumbawa_destination' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="radio-text">
                                        <i class="fas fa-water"></i>
                                        {{ __('messages.sumbawa_destination_service') }}
                                    </span>
                                </label>
                            </div>
                        </div>

                        {{-- Tour Type Filter --}}
                        <div class="filter-section">
                            <label class="filter-label">
                                <i class="fas fa-tags"></i>
                                {{ __('messages.tour_category') }}
                            </label>
                            <div class="filter-options">
                                <label class="modern-checkbox">
                                    <input type="checkbox" name="tour_type[]" value="Adventure Tour" {{ in_array('Adventure Tour', request('tour_type', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-custom"></span>
                                    <span class="checkbox-text">Adventure Tour</span>
                                </label>
                                <label class="modern-checkbox">
                                    <input type="checkbox" name="tour_type[]" value="Beach Holiday Tour" {{ in_array('Beach Holiday Tour', request('tour_type', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-custom"></span>
                                    <span class="checkbox-text">Beach Holiday Tour</span>
                                </label>
                                <label class="modern-checkbox">
                                    <input type="checkbox" name="tour_type[]" value="Cultural Tour" {{ in_array('Cultural Tour', request('tour_type', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-custom"></span>
                                    <span class="checkbox-text">Cultural Tour</span>
                                </label>
                                <label class="modern-checkbox">
                                    <input type="checkbox" name="tour_type[]" value="Business Trip Tour" {{ in_array('Business Trip Tour', request('tour_type', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-custom"></span>
                                    <span class="checkbox-text">Business Trip Tour</span>
                                </label>
                                <label class="modern-checkbox">
                                    <input type="checkbox" name="tour_type[]" value="Wildlife Safaris" {{ in_array('Wildlife Safaris', request('tour_type', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-custom"></span>
                                    <span class="checkbox-text">Wildlife Safaris</span>
                                </label>
                            </div>
                        </div>
                        
                        {{-- Search Button --}}
                        <button type="submit" class="modern-search-btn" id="searchButton">
                            <i class="fas fa-search"></i>
                            <span>{{ __('messages.search_packages') }}</span>
                            <div class="btn-glow"></div>
                        </button>
                    </form>
                    
                    {{-- Quick Filters --}}
                    <div class="quick-filters">
                        <h6 class="quick-filter-title">{{ __('messages.quick_filters') }}</h6>
                        <div class="quick-filter-grid">
                            <a href="{{ route('user.travelPackage.show') }}" class="quick-filter-btn {{ !request('service_type') ? 'active' : '' }}">
                                <i class="fas fa-globe"></i>
                                <span>{{ __('messages.all') }}</span>
                            </a>
                            <a href="{{ route('user.travelPackage.show') }}?service_type=hotel_pickup" class="quick-filter-btn {{ request('service_type') == 'hotel_pickup' ? 'active' : '' }}">
                                <i class="fas fa-hotel"></i>
                                <span>{{ __('messages.hotel') }}</span>
                            </a>
                            <a href="{{ route('user.travelPackage.show') }}?service_type=airport_transfer" class="quick-filter-btn {{ request('service_type') == 'airport_transfer' ? 'active' : '' }}">
                                <i class="fas fa-plane"></i>
                                <span>{{ __('messages.airport') }}</span>
                            </a>
                            <a href="{{ route('user.travelPackage.show') }}?service_type=komodo_tour" class="quick-filter-btn {{ request('service_type') == 'komodo_tour' ? 'active' : '' }}">
                                <i class="fas fa-dragon"></i>
                                <span>{{ __('messages.komodo') }}</span>
                            </a>
                            <a href="{{ route('user.travelPackage.show') }}?service_type=lombok_destination" class="quick-filter-btn {{ request('service_type') == 'lombok_destination' ? 'active' : '' }}">
                                <i class="fas fa-mountain"></i>
                                <span>{{ __('messages.lombok') }}</span>
                            </a>
                            <a href="{{ route('user.travelPackage.show') }}?service_type=sumbawa_destination" class="quick-filter-btn {{ request('service_type') == 'sumbawa_destination' ? 'active' : '' }}">
                                <i class="fas fa-water"></i>
                                <span>{{ __('messages.sumbawa') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- Modern Package Grid --}}
            <div class="col-lg-9">
                <div class="modern-packages-content">
                    {{-- Header with Results --}}
                    <div class="packages-header">
                        <div class="packages-info">
                            <h2 class="packages-title">Paket Wisata Terbaik</h2>
                            <p class="packages-count">
                                <i class="fas fa-map-marked-alt"></i>
                                {{ $travelPackages->count() }} paket ditemukan
                            </p>
                        </div>
                        <button type="button" id="shareBtn" class="modern-share-btn">
                            <i class="fas fa-share-alt"></i>
                            <span>Bagikan</span>
                        </button>
                    </div>

                    {{-- Active Filters --}}
                    @if(request()->hasAny(['service_type', 'tour_type', 'sort']))
                    <div class="active-filters-modern">
                        <div class="filters-label">
                            <i class="fas fa-filter"></i>
                            <span>{{ __('messages.active_filters') }}:</span>
                        </div>
                        <div class="filters-list">
                            @if(request('service_type'))
                                <span class="filter-tag">
                                    {{ ucfirst(str_replace('_', ' ', request('service_type'))) }}
                                    <a href="{{ route('user.travelPackage.show', array_diff_key(request()->all(), ['service_type' => ''])) }}" class="remove-filter">×</a>
                                </span>
                            @endif
                            @if(request('tour_type'))
                                @foreach(request('tour_type') as $type)
                                <span class="filter-tag">
                                    {{ $type }}
                                    <a href="{{ route('user.travelPackage.show', array_merge(request()->all(), ['tour_type' => array_diff(request('tour_type'), [$type])])) }}" class="remove-filter">×</a>
                                </span>
                                @endforeach
                            @endif
                            @if(request('sort'))
                                <span class="filter-tag">
                                    {{ request('sort') == 'high_to_low' ? __('messages.price_high_to_low') : __('messages.price_low_to_high') }}
                                </span>
                            @endif
                            <a href="{{ route('user.travelPackage.show') }}" class="clear-filters">
                                <i class="fas fa-times"></i>
                                {{ __('messages.clear_all') }}
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Packages Grid --}}
                    @if($travelPackages->count() > 0)
                        @include('components.user-components.home-travelPackage')
                    @else
                        <div class="no-results-modern">
                            <div class="no-results-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3 class="no-results-title">{{ __('messages.no_packages_found') }}</h3>
                            <p class="no-results-text">
                                {{ __('messages.try_change_filter') }} 
                                <a href="{{ route('user.travelPackage.show') }}" class="reset-link">{{ __('messages.view_all_packages') }}</a>
                            </p>
                        </div>
                    @endif
                </div> 
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="travelPackage"]');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const submitButton = document.getElementById('searchButton');
    
    let isSubmitting = false;
    
    function showLoading() {
        if (loadingOverlay && !isSubmitting) {
            isSubmitting = true;
            loadingOverlay.classList.add('show');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mencari...';
            }
        }
    }
    
    function hideLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.remove('show');
            isSubmitting = false;
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.innerHTML = 'Cari Paket';
            }
        }
    }
    
    // Manual form submission only
    if (form && submitButton) {
        form.addEventListener('submit', function(e) {
            if (!isSubmitting) {
                showLoading();
            }
        });
    }
    
    // Show loading for quick filter buttons
    const quickFilterButtons = document.querySelectorAll('.btn-outline-primary.btn-sm, .btn-outline-secondary.btn-sm');
    quickFilterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!isSubmitting) {
                showLoading();
            }
        });
    });
    
    // Highlight active filter buttons
    const urlParams = new URLSearchParams(window.location.search);
    const serviceType = urlParams.get('service_type');
    
    quickFilterButtons.forEach(button => {
        const buttonUrl = new URL(button.href);
        const buttonServiceType = buttonUrl.searchParams.get('service_type');
        
        if (serviceType === buttonServiceType || (!serviceType && button.textContent.trim() === 'Semua Paket')) {
            button.classList.remove('btn-outline-primary', 'btn-outline-secondary');
            button.classList.add('btn-primary');
        }
    });
    
    // Hide loading on page load
    setTimeout(hideLoading, 500);
});

// Hide loading when page is fully loaded
window.addEventListener('load', function() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    if (loadingOverlay) {
        loadingOverlay.classList.remove('show');
    }
});
</script>
@endpush

@push('styles')
<style>
/* Modern Packages 2026 Styles */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.08);
    --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
    --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.15);
}

/* Modern Hero Header */
.modern-packages-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/image/package-image/MountRinjani.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 6rem 0 4rem;
    position: relative;
    overflow: hidden;
    margin-top: -80px;
    padding-top: 8rem;
}

.hero-background-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
}

.hero-content-packages {
    text-align: center;
    color: white;
    position: relative;
    z-index: 2;
}

.hero-badge-packages {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    margin-bottom: 2rem;
    font-size: 0.9rem;
    font-weight: 600;
    animation: slideInDown 1s ease-out;
}

.hero-title-packages {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-subtitle-packages {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 3rem;
    opacity: 0.9;
    animation: slideInUp 1s ease-out 0.4s both;
}

/* Modern Breadcrumb */
.breadcrumb-modern {
    display: flex;
    align-items: center;
    gap: 1rem;
    justify-content: center;
    animation: slideInUp 1s ease-out 0.6s both;
}

.breadcrumb-item-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.breadcrumb-item-modern:hover {
    color: white;
    transform: translateY(-2px);
}

.breadcrumb-item-modern.active {
    color: white;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.8rem;
}

/* Modern Container */
.modern-packages-container {
    padding: 4rem 2rem;
    background: #f8f9fa;
    min-height: 100vh;
}

/* Modern Filter Sidebar */
.modern-filter-sidebar {
    background: white;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: var(--shadow-medium);
    position: sticky;
    top: 2rem;
    max-height: calc(100vh - 4rem);
    overflow-y: auto;
}

.filter-header {
    text-align: center;
    margin-bottom: 2rem;
}

.filter-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.filter-decoration {
    width: 60px;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 2px;
    margin: 0 auto;
}

.filter-section {
    margin-bottom: 2rem;
}

.filter-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.modern-select,
.modern-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: white;
}

.modern-select:focus,
.modern-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

/* Modern Radio Buttons */
.modern-radio {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    cursor: pointer;
    padding: 0.75rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
}

.modern-radio:hover {
    background: #f8f9fa;
}

.modern-radio input[type="radio"] {
    display: none;
}

.radio-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #dee2e6;
    border-radius: 50%;
    position: relative;
    transition: all 0.3s ease;
}

.modern-radio input[type="radio"]:checked + .radio-custom {
    border-color: #667eea;
    background: #667eea;
}

.modern-radio input[type="radio"]:checked + .radio-custom::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    background: white;
    border-radius: 50%;
}

.radio-text {
    font-weight: 500;
    color: #495057;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Modern Checkboxes */
.modern-checkbox {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    cursor: pointer;
    padding: 0.75rem;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.modern-checkbox:hover {
    background: #f8f9fa;
}

.modern-checkbox input[type="checkbox"] {
    display: none;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #dee2e6;
    border-radius: 6px;
    position: relative;
    transition: all 0.3s ease;
}

.modern-checkbox input[type="checkbox"]:checked + .checkbox-custom {
    border-color: #667eea;
    background: #667eea;
}

.modern-checkbox input[type="checkbox"]:checked + .checkbox-custom::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.checkbox-text {
    font-weight: 500;
    color: #495057;
}

/* Modern Search Button */
.modern-search-btn {
    width: 100%;
    padding: 1rem;
    background: var(--primary-gradient);
    border: none;
    border-radius: 16px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.modern-search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.modern-search-btn:hover .btn-glow {
    left: 100%;
}

/* Quick Filters */
.quick-filters {
    border-top: 1px solid #e9ecef;
    padding-top: 2rem;
}

.quick-filter-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
    text-align: center;
}

.quick-filter-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
}

.quick-filter-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 0.5rem;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    text-decoration: none;
    color: #6c757d;
    font-weight: 500;
    font-size: 0.8rem;
    transition: all 0.3s ease;
}

.quick-filter-btn:hover {
    border-color: #667eea;
    color: #667eea;
    transform: translateY(-2px);
}

.quick-filter-btn.active {
    background: var(--primary-gradient);
    border-color: transparent;
    color: white;
}

.quick-filter-btn i {
    font-size: 1.2rem;
}

/* Modern Packages Content */
.modern-packages-content {
    background: white;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: var(--shadow-medium);
}

.packages-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e9ecef;
}

.packages-info h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.packages-count {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6c757d;
    font-weight: 500;
}

.modern-share-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--secondary-gradient);
    border: none;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
}

.modern-share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(240, 147, 251, 0.3);
}

/* Active Filters */
.active-filters-modern {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 12px;
    flex-wrap: wrap;
}

.filters-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #495057;
    white-space: nowrap;
}

.filters-list {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.filter-tag {
    background: var(--primary-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.remove-filter {
    color: white;
    text-decoration: none;
    font-weight: bold;
    margin-left: 0.25rem;
}

.remove-filter:hover {
    color: rgba(255, 255, 255, 0.8);
}

.clear-filters {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: #dc3545;
    color: white;
    text-decoration: none;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.clear-filters:hover {
    background: #c82333;
    color: white;
}

/* Modern Packages Grid */
.modern-packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
}

.modern-package-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-light);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.modern-package-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-heavy);
}

.package-link-modern {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* Package Image */
.package-image-modern {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.package-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s ease;
}

.modern-package-card:hover .package-img {
    transform: scale(1.1);
}

.package-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #adb5bd;
    font-size: 3rem;
}

/* Package Overlay */
.package-overlay-modern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, transparent 50%, rgba(0,0,0,0.7) 100%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 1.5rem;
    opacity: 0;
    transition: all 0.3s ease;
}

.modern-package-card:hover .package-overlay-modern {
    opacity: 1;
}

.package-badges {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.service-badge,
.duration-badge {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    color: #2c3e50;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.duration-badge {
    background: rgba(102, 126, 234, 0.9);
    color: white;
}

.quick-view-btn {
    background: white;
    color: #2c3e50;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    align-self: center;
}

.quick-view-btn:hover {
    background: var(--primary-gradient);
    color: white;
    transform: scale(1.05);
}

/* Package Content */
.package-content-modern {
    padding: 2rem;
}

.tour-type-badge {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    margin-bottom: 1rem;
}

.package-title-modern {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.package-description-modern {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

.package-features {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.feature-item i {
    color: #28a745;
}

/* Package Price */
.package-price-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e9ecef;
}

.price-info {
    display: flex;
    flex-direction: column;
}

.price-label {
    font-size: 0.8rem;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.price-amount {
    display: flex;
    align-items: baseline;
    gap: 0.25rem;
}

.currency {
    font-size: 1rem;
    font-weight: 600;
    color: #28a745;
}

.amount {
    font-size: 1.75rem;
    font-weight: 800;
    color: #28a745;
}

.price-per {
    font-size: 0.8rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

.book-now-btn {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.book-now-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

/* No Results */
.no-results-modern,
.no-packages-modern {
    text-align: center;
    padding: 4rem 2rem;
    grid-column: 1 / -1;
}

.no-results-icon,
.no-packages-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2.5rem;
    color: #adb5bd;
}

.no-results-title,
.no-packages-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #495057;
    margin-bottom: 1rem;
}

.no-results-text,
.no-packages-text {
    color: #6c757d;
    font-size: 1rem;
}

.reset-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
}

.reset-link:hover {
    color: #5a6fd8;
    text-decoration: underline;
}

/* Animations */
@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-20px) rotate(1deg); }
    66% { transform: translateY(-10px) rotate(-1deg); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .modern-packages-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 992px) {
    .modern-packages-container {
        padding: 2rem 1rem;
    }
    
    .packages-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .modern-filter-sidebar {
        position: static;
        margin-bottom: 2rem;
        max-height: none;
    }
    
    .quick-filter-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .modern-packages-hero {
        padding: 4rem 0 2rem;
        padding-top: 6rem;
    }
    
    .hero-title-packages {
        font-size: 2rem;
    }
    
    .hero-subtitle-packages {
        font-size: 1rem;
    }
    
    .breadcrumb-modern {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .modern-packages-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .package-content-modern {
        padding: 1.5rem;
    }
    
    .package-features {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .active-filters-modern {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .quick-filter-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Loading state */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.loading-overlay.show {
    opacity: 1;
    visibility: visible;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush