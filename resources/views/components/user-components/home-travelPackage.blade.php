<div class="modern-packages-grid">
    @if ($travelPackages->isNotEmpty())
        @foreach ($travelPackages as $package)
            <div class="modern-package-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('user.packagePage', $package->id) }}" class="package-link-modern">
                    {{-- Package Image --}}
                    <div class="package-image-modern">
                        @if ($package->image_1 && $package->image_1 != "empty-image.png")
                            <img src="{{ asset('image/uploads/travelPackage/' . $package->image_1) }}" 
                                 alt="{{ $package->package_name }}" 
                                 class="package-img">
                        @else
                            <div class="package-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                        
                        {{-- Package Overlay --}}
                        <div class="package-overlay-modern">
                            <div class="package-badges">
                                <span class="service-badge">
                                    @switch($package->service_type)
                                        @case('hotel_pickup')
                                            <i class="fas fa-hotel"></i>
                                            Hotel Pickup
                                            @break
                                        @case('airport_transfer')
                                            <i class="fas fa-plane"></i>
                                            Airport Transfer
                                            @break
                                        @case('komodo_tour')
                                            <i class="fas fa-dragon"></i>
                                            Komodo Tour
                                            @break
                                        @case('lombok_destination')
                                            <i class="fas fa-mountain"></i>
                                            Lombok
                                            @break
                                        @case('sumbawa_destination')
                                            <i class="fas fa-water"></i>
                                            Sumbawa
                                            @break
                                        @default
                                            {{ ucfirst(str_replace('_', ' ', $package->service_type)) }}
                                    @endswitch
                                </span>
                                <span class="duration-badge">
                                    <i class="fas fa-clock"></i>
                                    {{ $package->duration }}
                                </span>
                            </div>
                            <div class="quick-view-btn">
                                <i class="fas fa-eye"></i>
                                <span>Lihat Detail</span>
                            </div>
                        </div>
                    </div>

                    {{-- Package Content --}}
                    <div class="package-content-modern">
                        {{-- Tour Type Badge --}}
                        <div class="tour-type-badge">
                            <i class="fas fa-tag"></i>
                            {{ $package->tour_type }}
                        </div>

                        {{-- Package Title --}}
                        <h3 class="package-title-modern">{{ $package->package_name }}</h3>

                        {{-- Package Description --}}
                        <p class="package-description-modern">
                            {{ Str::limit($package->overview, 120) }}
                        </p>

                        {{-- Package Features --}}
                        <div class="package-features">
                            <div class="feature-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Destinasi Eksotis</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-users"></i>
                                <span>Guide Profesional</span>
                            </div>
                        </div>

                        {{-- Package Price --}}
                        <div class="package-price-modern">
                            <div class="price-info">
                                <span class="price-label">{{ __('messages.starting_from') }}</span>
                                <div class="price-amount">
                                    <span class="currency">Rp</span>
                                    <span class="amount">{{ number_format($package->price_start_from, 0, ',', '.') }}</span>
                                </div>
                                <span class="price-per">{{ __('messages.per_person') }}</span>
                            </div>
                            <div class="book-now-btn">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="no-packages-modern">
            <div class="no-packages-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="no-packages-title">Tidak Ada Paket Ditemukan</h3>
            <p class="no-packages-text">
                Coba ubah filter pencarian Anda atau 
                <a href="{{ route('user.travelPackage.show') }}" class="reset-link">lihat semua paket</a>
            </p>
        </div>
    @endif
</div>

{{-- Modern Package Cards CSS sudah ada di package.blade.php --}}