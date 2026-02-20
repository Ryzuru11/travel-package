@extends('layouts.guest')

@section('content')

      {{-- Modern Hero Section --}}
      <div class="modern-hero-section">
        <div class="hero-background">
            <img src="{{ asset('image/sigiriya1.jpg') }}" class="hero-bg-image" alt="Ryzuru Tour Travel">
            <div class="hero-gradient-overlay"></div>
            <div class="hero-particles"></div>
        </div>
        <div class="hero-content-wrapper">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i>
                        <span>{{ __('messages.trusted_partner') }}</span>
                    </div>
                    <h1 class="hero-title">
                        {{ __('messages.hero_title', ['destination' => 'Lombok & Komodo']) }}
                    </h1>
                    <p class="hero-subtitle">
                        {{ __('messages.hero_subtitle') }}
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('user.travelPackage.show') }}" class="btn-modern btn-primary-modern">
                            <i class="fas fa-compass"></i>
                            {{ __('messages.start_adventure') }}
                        </a>
                        <a href="#video-section" class="btn-modern btn-secondary-modern">
                            <i class="fas fa-play"></i>
                            {{ __('messages.watch_video') }}
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">{{ __('messages.happy_travelers') }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">{{ __('messages.destinations') }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">4.9</div>
                            <div class="stat-label">{{ __('messages.rating') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
      </div>

      {{-- Discover Lombok & Komodo Section --}}
      <section class="discover-lombok-section">
          <div class="container">
              <div class="section-header-discover">
                  <div class="section-badge-lombok">
                      <i class="fas fa-compass"></i>
                      <span>{{ __('messages.discover_paradise') }}</span>
                  </div>
                  <h2 class="section-title-lombok">
                      {{ __('messages.explore_wonders', ['destination' => 'Lombok & Komodo']) }}
                  </h2>
                  <p class="section-subtitle-lombok">
                      {{ __('messages.explore_subtitle') }}
                  </p>
              </div>

              <div class="discover-grid">
                  {{-- Lombok Destinations --}}
                  <div class="discover-card lombok-card" data-aos="fade-up" data-aos-delay="100">
                      <div class="discover-image-container">
                          <img src="{{ asset('image/package-image/Gili-Trawangan-Lombok-1-1.jpg') }}" alt="Lombok Paradise" class="discover-image">
                          <div class="discover-overlay">
                              <div class="discover-badge">LOMBOK</div>
                              <div class="discover-pattern"></div>
                          </div>
                      </div>
                      <div class="discover-content">
                          <h3 class="discover-title">{{ __('messages.lombok_island') }}</h3>
                          <p class="discover-description">
                              {{ __('messages.lombok_description') }}
                          </p>
                          <div class="discover-highlights">
                              <div class="highlight-item">
                                  <i class="fas fa-water"></i>
                                  <span>Air Terjun Sekumpul</span>
                              </div>
                              <div class="highlight-item">
                                  <i class="fas fa-umbrella-beach"></i>
                                  <span>{{ __('messages.pink_beach') }}</span>
                              </div>
                              <div class="highlight-item">
                                  <i class="fas fa-mountain"></i>
                                  <span>{{ __('messages.rinjani_mountain') }}</span>
                              </div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=lombok_destination" class="discover-btn lombok-btn">
                              <span>{{ __('messages.explore_lombok') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>

                  {{-- Komodo Destinations --}}
                  <div class="discover-card komodo-card" data-aos="fade-up" data-aos-delay="200">
                      <div class="discover-image-container">
                          <img src="{{ asset('image/package-image/sigiriya-rock.svg') }}" alt="Komodo Island" class="discover-image">
                          <div class="discover-overlay">
                              <div class="discover-badge komodo-badge">KOMODO</div>
                              <div class="discover-pattern komodo-pattern"></div>
                          </div>
                      </div>
                      <div class="discover-content">
                          <h3 class="discover-title">{{ __('messages.komodo_island') }}</h3>
                          <p class="discover-description">
                              {{ __('messages.komodo_description') }}
                          </p>
                          <div class="discover-highlights">
                              <div class="highlight-item">
                                  <i class="fas fa-dragon"></i>
                                  <span>{{ __('messages.komodo_dragon') }}</span>
                              </div>
                              <div class="highlight-item">
                                  <i class="fas fa-award"></i>
                                  <span>{{ __('messages.unesco_site') }}</span>
                              </div>
                              <div class="highlight-item">
                                  <i class="fas fa-ship"></i>
                                  <span>{{ __('messages.island_hopping') }}</span>
                              </div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=komodo_tour" class="discover-btn komodo-btn">
                              <span>{{ __('messages.explore_komodo') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>

                  {{-- Cultural Experience --}}
                  <div class="discover-card culture-card full-width" data-aos="fade-up" data-aos-delay="300">
                      <div class="culture-content-wrapper">
                          <div class="culture-image-side">
                              <img src="{{ asset('image/package-image/temple.svg') }}" alt="Budaya Lombok" class="culture-image">
                              <div class="culture-ornament">
                                  <div class="ornament-pattern"></div>
                              </div>
                          </div>
                          <div class="culture-content-side">
                              <div class="culture-badge">
                                  <i class="fas fa-heart"></i>
                                  <span>{{ __('messages.culture_tradition') }}</span>
                              </div>
                              <h3 class="culture-title">{{ __('messages.local_wisdom') }}</h3>
                              <p class="culture-description">
                                  {{ __('messages.culture_description') }}
                              </p>
                              <div class="culture-features">
                                  <div class="culture-feature">
                                      <div class="feature-icon">
                                          <i class="fas fa-palette"></i>
                                      </div>
                                      <div class="feature-content">
                                          <h5>{{ __('messages.arts_crafts') }}</h5>
                                          <p>Tenun songket dan keramik tradisional</p>
                                      </div>
                                  </div>
                                  <div class="culture-feature">
                                      <div class="feature-icon">
                                          <i class="fas fa-utensils"></i>
                                      </div>
                                      <div class="feature-content">
                                          <h5>{{ __('messages.authentic_cuisine') }}</h5>
                                          <p>Ayam Taliwang dan Plecing Kangkung</p>
                                      </div>
                                  </div>
                                  <div class="culture-feature">
                                      <div class="feature-icon">
                                          <i class="fas fa-home"></i>
                                      </div>
                                      <div class="feature-content">
                                          <h5>{{ __('messages.traditional_village') }}</h5>
                                          <p>Rumah adat Sade dan Ende</p>
                                      </div>
                                  </div>
                              </div>
                              <a href="{{ route('aboutUs') }}" class="culture-btn">
                                  <span>Pelajari Budaya</span>
                                  <i class="fas fa-arrow-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- Modern Services Section --}}
      <section id="services" class="modern-services-section">
          <div class="container">
              <div class="section-header">
                  <div class="section-badge">
                      <i class="fas fa-concierge-bell"></i>
                      <span>{{ __('messages.our_services') }}</span>
                  </div>
                  <h2 class="section-title">{{ __('messages.our_services') }}</h2>
                  <p class="section-subtitle">
                      {{ __('messages.services_subtitle') }}
                  </p>
              </div>
              
              <div class="services-grid">
                  {{-- Hotel Pickup Service --}}
                  <div class="service-card-modern" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-card-inner">
                          <div class="service-icon-modern">
                              <i class="fas fa-hotel"></i>
                              <div class="icon-glow"></div>
                          </div>
                          <h5 class="service-title-modern">{{ __('messages.hotel_pickup') }}</h5>
                          <p class="service-description-modern">
                              Layanan antar jemput premium dari hotel Anda ke destinasi wisata 
                              dengan kendaraan berkualitas dan driver berpengalaman.
                          </p>
                          <div class="service-features">
                              <div class="feature-tag">{{ __('messages.available_24_7') }}</div>
                              <div class="feature-tag">{{ __('messages.professional_driver') }}</div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=hotel_pickup" class="service-btn">
                              <span>{{ __('messages.view_packages') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>

                  {{-- Airport Transfer Service --}}
                  <div class="service-card-modern" data-aos="fade-up" data-aos-delay="200">
                      <div class="service-card-inner">
                          <div class="service-icon-modern">
                              <i class="fas fa-plane"></i>
                              <div class="icon-glow"></div>
                          </div>
                          <h5 class="service-title-modern">{{ __('messages.airport_transfer') }}</h5>
                          <p class="service-description-modern">
                              Transfer nyaman dan aman dari/ke bandara dengan layanan meet & greet 
                              dan tracking penerbangan real-time.
                          </p>
                          <div class="service-features">
                              <div class="feature-tag">{{ __('messages.flight_tracking') }}</div>
                              <div class="feature-tag">{{ __('messages.meet_greet') }}</div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=airport_transfer" class="service-btn">
                              <span>{{ __('messages.view_packages') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>

                  {{-- Komodo Tour Service --}}
                  <div class="service-card-modern" data-aos="fade-up" data-aos-delay="300">
                      <div class="service-card-inner">
                          <div class="service-icon-modern">
                              <i class="fas fa-dragon"></i>
                              <div class="icon-glow"></div>
                          </div>
                          <h5 class="service-title-modern">{{ __('messages.komodo_tour') }}</h5>
                          <p class="service-description-modern">
                              Petualangan menakjubkan ke habitat asli komodo dragon dengan 
                              kapal modern dan guide bersertifikat internasional.
                          </p>
                          <div class="service-features">
                              <div class="feature-tag">{{ __('messages.unesco_site') }}</div>
                              <div class="feature-tag">{{ __('messages.expert_guide') }}</div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=komodo_tour" class="service-btn">
                              <span>{{ __('messages.view_packages') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>

                  {{-- Lombok & Sumbawa Destinations --}}
                  <div class="service-card-modern" data-aos="fade-up" data-aos-delay="400">
                      <div class="service-card-inner">
                          <div class="service-icon-modern">
                              <i class="fas fa-mountain"></i>
                              <div class="icon-glow"></div>
                          </div>
                          <h5 class="service-title-modern">{{ __('messages.lombok_destinations') }}</h5>
                          <p class="service-description-modern">
                              {{ __('messages.lombok_service_desc') }}
                          </p>
                          <div class="service-features">
                              <div class="feature-tag">{{ __('messages.hidden_gems') }}</div>
                              <div class="feature-tag">{{ __('messages.local_culture') }}</div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}?service_type=lombok_destination" class="service-btn">
                              <span>{{ __('messages.view_packages') }}</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- Modern Featured Packages Section --}}
      <section class="modern-packages-section">
          <div class="container">
              <div class="section-header">
                  <div class="section-badge">
                      <i class="fas fa-gem"></i>
                      <span>{{ __('messages.featured_packages') }}</span>
                  </div>
                  <div class="section-header-content">
                      <div>
                          <h2 class="section-title">{{ __('messages.featured_packages') }}</h2>
                          <p class="section-subtitle">
                              {{ __('messages.packages_subtitle') }}
                          </p>
                      </div>
                      <a href="{{ route('user.travelPackage.show') }}" class="btn-modern btn-outline-modern">
                          <span>{{ __('messages.view_all') }}</span>
                          <i class="fas fa-arrow-right"></i>
                      </a>
                  </div>
              </div>

              <div class="packages-grid">
                  <div class="package-card-modern featured-highlight" data-aos="fade-up" data-aos-delay="100">
                      <a href="{{ route('user.packagePage', 6) }}" class="package-link">
                          <div class="package-image-container">
                              <img src="{{ asset('image/package-image/Gili-Trawangan-Lombok-1-1.jpg') }}" class="package-image-modern" alt="Gili Trawangan">
                              <div class="package-overlay">
                                  <div class="package-badge">{{ __('messages.featured') }}</div>
                                  <div class="package-quick-view">
                                      <i class="fas fa-eye"></i>
                                      <span>{{ __('messages.quick_view') }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="package-content-modern">
                              <div class="package-meta-modern">
                                  <span class="package-duration-modern">
                                      <i class="fas fa-clock"></i>
                                      2 {{ __('messages.days') }}
                                  </span>
                                  <span class="package-category-modern">
                                      <i class="fas fa-water"></i>
                                      {{ __('messages.beach') }}
                                  </span>
                              </div>
                              <h5 class="package-title-modern">Gili Trawangan Paradise</h5>
                              <p class="package-description-modern">
                                  {{ __('messages.gili_trawangan_desc') }}
                              </p>
                              <div class="package-highlights">
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.snorkeling_equipment') }}</span>
                                  </div>
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.island_hopping') }}</span>
                                  </div>
                              </div>
                              <div class="package-price-modern">
                                  <span class="price-from-modern">{{ __('messages.starting_from') }}</span>
                                  <span class="price-amount-modern">Rp 850.000</span>
                                  <span class="price-per-modern">{{ __('messages.per_person') }}</span>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="package-card-modern" data-aos="fade-up" data-aos-delay="200">
                      <a href="{{ route('user.packagePage', 4) }}" class="package-link">
                          <div class="package-image-container">
                              <img src="{{ asset('image/package-image/Air-Terjun-Senaru.jpg') }}" class="package-image-modern" alt="Senaru Waterfall">
                              <div class="package-overlay">
                                  <div class="package-quick-view">
                                      <i class="fas fa-eye"></i>
                                      <span>{{ __('messages.quick_view') }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="package-content-modern">
                              <div class="package-meta-modern">
                                  <span class="package-duration-modern">
                                      <i class="fas fa-clock"></i>
                                      2 {{ __('messages.days') }}
                                  </span>
                                  <span class="package-category-modern">
                                      <i class="fas fa-mountain"></i>
                                      {{ __('messages.adventure') }}
                                  </span>
                              </div>
                              <h5 class="package-title-modern">Air Terjun Senaru</h5>
                              <p class="package-description-modern">
                                  {{ __('messages.senaru_waterfall_desc') }}
                              </p>
                              <div class="package-highlights">
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.trekking_guide') }}</span>
                                  </div>
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.equipment') }}</span>
                                  </div>
                              </div>
                              <div class="package-price-modern">
                                  <span class="price-from-modern">{{ __('messages.starting_from') }}</span>
                                  <span class="price-amount-modern">Rp 750.000</span>
                                  <span class="price-per-modern">{{ __('messages.per_person') }}</span>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="package-card-modern" data-aos="fade-up" data-aos-delay="300">
                      <a href="{{ route('user.packagePage', 3) }}" class="package-link">
                          <div class="package-image-container">
                              <img src="{{ asset('image/package-image/pulau-komodo.jpeg') }}" class="package-image-modern" alt="Komodo Island">
                              <div class="package-overlay">
                                  <div class="package-quick-view">
                                      <i class="fas fa-eye"></i>
                                      <span>{{ __('messages.quick_view') }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="package-content-modern">
                              <div class="package-meta-modern">
                                  <span class="package-duration-modern">
                                      <i class="fas fa-clock"></i>
                                      3 {{ __('messages.days') }}
                                  </span>
                                  <span class="package-category-modern">
                                      <i class="fas fa-dragon"></i>
                                      {{ __('messages.wildlife') }}
                                  </span>
                              </div>
                              <h5 class="package-title-modern">Tour Pulau Komodo</h5>
                              <p class="package-description-modern">
                                  {{ __('messages.komodo_tour_desc') }}
                              </p>
                              <div class="package-highlights">
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.boat_charter') }}</span>
                                  </div>
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.expert_guide') }}</span>
                                  </div>
                              </div>
                              <div class="package-price-modern">
                                  <span class="price-from-modern">{{ __('messages.starting_from') }}</span>
                                  <span class="price-amount-modern">Rp 2.500.000</span>
                                  <span class="price-per-modern">{{ __('messages.per_person') }}</span>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="package-card-modern" data-aos="fade-up" data-aos-delay="400">
                      <a href="{{ route('user.packagePage', 5) }}" class="package-link">
                          <div class="package-image-container">
                              <img src="{{ asset('image/package-image/pantai-pink-lombok.jpg') }}" class="package-image-modern" alt="Pink Beach">
                              <div class="package-overlay">
                                  <div class="package-quick-view">
                                      <i class="fas fa-eye"></i>
                                      <span>{{ __('messages.quick_view') }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="package-content-modern">
                              <div class="package-meta-modern">
                                  <span class="package-duration-modern">
                                      <i class="fas fa-clock"></i>
                                      1 {{ __('messages.days') }}
                                  </span>
                                  <span class="package-category-modern">
                                      <i class="fas fa-water"></i>
                                      {{ __('messages.beach') }}
                                  </span>
                              </div>
                              <h5 class="package-title-modern">{{ __('messages.pink_beach') }} Lombok</h5>
                              <p class="package-description-modern">
                                  {{ __('messages.pink_beach_desc') }}
                              </p>
                              <div class="package-highlights">
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.snorkeling') }}</span>
                                  </div>
                                  <div class="highlight-item">
                                      <i class="fas fa-check"></i>
                                      <span>{{ __('messages.lunch_included') }}</span>
                                  </div>
                              </div>
                              <div class="package-price-modern">
                                  <span class="price-from-modern">{{ __('messages.starting_from') }}</span>
                                  <span class="price-amount-modern">Rp 450.000</span>
                                  <span class="price-per-modern">{{ __('messages.per_person') }}</span>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </section>

      {{-- Modern Why Choose Us Section --}}
      <section class="modern-why-choose-section">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6" data-aos="fade-right">
                      <div class="section-header">
                          <div class="section-badge">
                              <i class="fas fa-award"></i>
                              <span>Why Choose Us</span>
                          </div>
                          <h2 class="section-title">Mengapa Memilih Ryzuru Tour?</h2>
                          <p class="section-subtitle">
                              Kami lebih dari sekedar agen travel; kami adalah partner petualangan Anda 
                              yang berkomitmen memberikan pengalaman tak terlupakan.
                          </p>
                      </div>

                      <div class="features-list-modern">
                          <div class="feature-item-modern" data-aos="fade-up" data-aos-delay="100">
                              <div class="feature-icon-modern">
                                  <i class="fas fa-map-marked-alt"></i>
                              </div>
                              <div class="feature-content-modern">
                                  <h5>Lombok & Komodo: Gerbang Petualangan Pulau</h5>
                                  <p>Jelajahi keindahan alam yang menakjubkan dengan panduan lokal berpengalaman dan berlisensi resmi.</p>
                              </div>
                          </div>

                          <div class="feature-item-modern" data-aos="fade-up" data-aos-delay="200">
                              <div class="feature-icon-modern">
                                  <i class="fas fa-car"></i>
                              </div>
                              <div class="feature-content-modern">
                                  <h5>Eksplorasi Tanpa Batas</h5>
                                  <p>Nikmati kebebasan menjelajah dengan armada kendaraan berkualitas dan driver profesional bersertifikat.</p>
                              </div>
                          </div>

                          <div class="feature-item-modern" data-aos="fade-up" data-aos-delay="300">
                              <div class="feature-icon-modern">
                                  <i class="fas fa-users"></i>
                              </div>
                              <div class="feature-content-modern">
                                  <h5>Koneksi Autentik</h5>
                                  <p>Rasakan budaya lokal, nikmati kuliner khas, dan saksikan tradisi yang otentik bersama masyarakat setempat.</p>
                              </div>
                          </div>

                          <div class="feature-item-modern" data-aos="fade-up" data-aos-delay="400">
                              <div class="feature-icon-modern">
                                  <i class="fas fa-shield-alt"></i>
                              </div>
                              <div class="feature-content-modern">
                                  <h5>Keamanan & Kenyamanan</h5>
                                  <p>Keselamatan Anda adalah prioritas dengan asuransi perjalanan, kendaraan terawat, dan protokol keselamatan ketat.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6" data-aos="fade-left">
                      <div class="image-container-modern">
                          <img src="{{ asset('image/people.png') }}" alt="Happy Travelers" class="main-image-modern">
                          
                          {{-- Compact Rating Card --}}
                          <div class="floating-card-compact card-rating">
                              <div class="card-icon-compact">
                                  <i class="fas fa-star"></i>
                              </div>
                              <div class="card-content-compact">
                                  <div class="metric-compact">4.9</div>
                                  <div class="label-compact">Rating</div>
                              </div>
                          </div>

                          {{-- Compact Travelers Card --}}
                          <div class="floating-card-compact card-travelers">
                              <div class="card-icon-compact">
                                  <i class="fas fa-users"></i>
                              </div>
                              <div class="card-content-compact">
                                  <div class="metric-compact">500+</div>
                                  <div class="label-compact">Travelers</div>
                              </div>
                          </div>

                          {{-- Compact Experience Card --}}
                          <div class="floating-card-compact card-experience">
                              <div class="card-icon-compact">
                                  <i class="fas fa-award"></i>
                              </div>
                              <div class="card-content-compact">
                                  <div class="metric-compact">5+</div>
                                  <div class="label-compact">Years</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- Modern Video Section --}}
      <section id="video-section" class="modern-video-section">
          <div class="container">
              <div class="section-header text-center">
                  <div class="section-badge">
                      <i class="fas fa-play"></i>
                      <span>Experience</span>
                  </div>
                  <h2 class="section-title">Saksikan Keindahan Pulau Lombok Bersama Kami</h2>
                  <p class="section-subtitle">
                      Video dokumentasi perjalanan menakjubkan yang akan membawa Anda merasakan 
                      pengalaman wisata yang tak terlupakan
                  </p>
              </div>
              
              <div class="video-container-modern" data-aos="zoom-in">
                  <video 
                      controls 
                      class="video-player-modern"
                      poster="{{ asset('image/sigiriya1.jpg') }}"
                      preload="metadata">
                      <source src="{{ asset('videos/traveldokumentasi.mp4') }}" type="video/mp4">
                      <p>Browser Anda tidak mendukung pemutaran video HTML5. 
                         <a href="{{ asset('videos/traveldokumentasi.mp4') }}">Download video</a> untuk menontonnya.
                      </p>
                  </video>
                  <div class="video-overlay-modern">
                      <div class="play-button-modern">
                          <i class="fas fa-play"></i>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- Travel Gallery Section --}}
      <section class="travel-gallery-section">
          <div class="container">
              <div class="section-header text-center">
                  <div class="section-badge">
                      <i class="fas fa-camera"></i>
                      <span>Gallery</span>
                  </div>
                  <h2 class="section-title">Dokumentasi Perjalanan Wisata</h2>
                  <p class="section-subtitle">
                      Koleksi foto-foto menakjubkan dari berbagai destinasi eksotis yang telah kami jelajahi bersama para traveler
                  </p>
              </div>

              <div class="gallery-container" data-aos="fade-up">
                  {{-- Gallery Grid --}}
                  <div class="gallery-grid">
                      {{-- Large Featured Image --}}
                      <div class="gallery-item featured" data-aos="zoom-in" data-aos-delay="100">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/Gili-Trawangan-Lombok-1-1.jpg') }}" alt="Gili Trawangan Paradise" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">Gili Trawangan</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Lombok, Indonesia
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(0)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                              <div class="gallery-badge">FEATURED</div>
                          </div>
                      </div>

                      {{-- Regular Gallery Items --}}
                      <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/sigiriya-rock.svg') }}" alt="Komodo Dragon" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">Komodo Dragon</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Pulau Komodo
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(1)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="gallery-item" data-aos="fade-up" data-aos-delay="300">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/temple.svg') }}" alt="Traditional Temple" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">Pura Tradisional</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Lombok
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(2)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="gallery-item tall" data-aos="fade-up" data-aos-delay="400">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/elephent.svg') }}" alt="{{ __('messages.wildlife_safari') }}" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">{{ __('messages.wildlife_safari') }}</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Sumbawa
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(3)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="gallery-item" data-aos="fade-up" data-aos-delay="500">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/pulau-komodo.jpeg') }}" alt="Adventure Safari" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">Adventure Safari</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Komodo Island
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(4)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="gallery-item" data-aos="fade-up" data-aos-delay="600">
                          <div class="gallery-image-container">
                              <img src="{{ asset('image/package-image/sigiri-girls.svg') }}" alt="Cultural Experience" class="gallery-image">
                              <div class="gallery-overlay">
                                  <div class="gallery-info">
                                      <h4 class="gallery-title">Cultural Experience</h4>
                                      <p class="gallery-location">
                                          <i class="fas fa-map-marker-alt"></i>
                                          Desa Sade
                                      </p>
                                  </div>
                                  <div class="gallery-actions">
                                      <button class="gallery-btn view-btn" onclick="openLightbox(5)">
                                          <i class="fas fa-search-plus"></i>
                                      </button>
                                      <button class="gallery-btn share-btn">
                                          <i class="fas fa-share-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  {{-- View More Button --}}
                  <div class="gallery-cta" data-aos="fade-up" data-aos-delay="800">
                      <a href="{{ route('user.travelPackage.show') }}" class="btn-gallery-more">
                          <span>Lihat Semua Foto</span>
                          <i class="fas fa-images"></i>
                      </a>
                  </div>
              </div>
          </div>

          {{-- Lightbox Modal --}}
          <div class="lightbox-modal" id="lightboxModal">
              <div class="lightbox-content">
                  <button class="lightbox-close" onclick="closeLightbox()">
                      <i class="fas fa-times"></i>
                  </button>
                  <div class="lightbox-image-container">
                      <img src="" alt="" id="lightboxImage" class="lightbox-image">
                  </div>
                  <div class="lightbox-info">
                      <h3 id="lightboxTitle"></h3>
                      <p id="lightboxLocation"></p>
                  </div>
                  <div class="lightbox-navigation">
                      <button class="lightbox-nav prev" onclick="prevImage()">
                          <i class="fas fa-chevron-left"></i>
                      </button>
                      <button class="lightbox-nav next" onclick="nextImage()">
                          <i class="fas fa-chevron-right"></i>
                      </button>
                  </div>
              </div>
          </div>
      </section>

      {{-- Beach Paradise Gallery Section --}}
      <section class="beach-paradise-section">
          <div class="container">
              <div class="section-header text-center">
                  <div class="section-badge">
                      <i class="fas fa-umbrella-beach"></i>
                      <span>{{ __('messages.beach_paradise') }}</span>
                  </div>
                  <h2 class="section-title">Pantai-Pantai Eksotis <span class="lombok-highlight">Lombok & Komodo</span></h2>
                  <p class="section-subtitle">
                      Jelajahi keindahan pantai-pantai menakjubkan dengan pasir putih, air jernih, dan pemandangan yang memukau
                  </p>
              </div>

              <div class="beach-container" data-aos="fade-up">
                  {{-- Featured Beach --}}
                  <div class="featured-beach" data-aos="zoom-in" data-aos-delay="100">
                      <div class="beach-image-wrapper">
                          <img src="{{ asset('image/package-image/Gili-Trawangan-Lombok-1-1.jpg') }}" alt="Pink Beach Komodo" class="beach-image">
                          <div class="beach-badge">MOST POPULAR</div>
                          <div class="beach-overlay">
                              <div class="beach-rating">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <span>4.9</span>
                              </div>
                          </div>
                      </div>
                      <div class="beach-content">
                          <h3 class="beach-title">Pink Beach Komodo</h3>
                          <p class="beach-description">
                              Pantai unik dengan pasir berwarna pink yang langka di dunia. Terletak di Pulau Komodo, 
                              pantai ini menawarkan pengalaman snorkeling yang luar biasa dengan terumbu karang yang masih alami.
                          </p>
                          <div class="beach-features">
                              <div class="feature-tag unique">
                                  <i class="fas fa-gem"></i>
                                  <span>Pasir Pink Langka</span>
                              </div>
                              <div class="feature-tag activity">
                                  <i class="fas fa-swimming-pool"></i>
                                  <span>Snorkeling Paradise</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  {{-- Beach Grid --}}
                  <div class="beach-grid">
                      <div class="beach-card" data-aos="fade-up" data-aos-delay="200">
                          <div class="beach-card-image">
                              <img src="{{ asset('image/package-image/temple.svg') }}" alt="Gili Trawangan" class="card-image">
                              <div class="card-overlay">
                                  <div class="activity-icons">
                                      <i class="fas fa-swimmer" title="Swimming"></i>
                                      <i class="fas fa-ship" title="Boat Trip"></i>
                                      <i class="fas fa-cocktail" title="Beach Bar"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="beach-card-content">
                              <h4 class="card-title">Gili Trawangan</h4>
                              <p class="card-description">Pulau tropis dengan pantai berpasir putih dan kehidupan malam yang meriah</p>
                              <div class="card-location">
                                  <i class="fas fa-map-marker-alt"></i>
                                  <span>Lombok Utara</span>
                              </div>
                          </div>
                      </div>

                      <div class="beach-card" data-aos="fade-up" data-aos-delay="300">
                          <div class="beach-card-image">
                              <img src="{{ asset('image/package-image/safari.svg') }}" alt="Pantai Kuta Lombok" class="card-image">
                              <div class="card-overlay">
                                  <div class="activity-icons">
                                      <i class="fas fa-surfing" title="Surfing"></i>
                                      <i class="fas fa-camera" title="Photography"></i>
                                      <i class="fas fa-sun" title="Sunbathing"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="beach-card-content">
                              <h4 class="card-title">Pantai Kuta Lombok</h4>
                              <p class="card-description">Pantai dengan ombak yang sempurna untuk surfing dan sunset yang memukau</p>
                              <div class="card-location">
                                  <i class="fas fa-map-marker-alt"></i>
                                  <span>Lombok Selatan</span>
                              </div>
                          </div>
                      </div>

                      <div class="beach-card" data-aos="fade-up" data-aos-delay="400">
                          <div class="beach-card-image">
                              <img src="{{ asset('image/package-image/elephent.svg') }}" alt="Pantai Senggigi" class="card-image">
                              <div class="card-overlay">
                                  <div class="activity-icons">
                                      <i class="fas fa-umbrella-beach" title="Beach Resort"></i>
                                      <i class="fas fa-utensils" title="Seafood"></i>
                                      <i class="fas fa-spa" title="Spa"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="beach-card-content">
                              <h4 class="card-title">Pantai Senggigi</h4>
                              <p class="card-description">Pantai resort dengan fasilitas lengkap dan pemandangan Gunung Agung Bali</p>
                              <div class="card-location">
                                  <i class="fas fa-map-marker-alt"></i>
                                  <span>Lombok Barat</span>
                              </div>
                          </div>
                      </div>

                      <div class="beach-card" data-aos="fade-up" data-aos-delay="500">
                          <div class="beach-card-image">
                              <img src="{{ asset('image/package-image/sigiri-girls.svg') }}" alt="Pantai Tanjung Aan" class="card-image">
                              <div class="card-overlay">
                                  <div class="activity-icons">
                                      <i class="fas fa-water" title="Crystal Clear"></i>
                                      <i class="fas fa-fish" title="Snorkeling"></i>
                                      <i class="fas fa-mountain" title="Hill View"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="beach-card-content">
                              <h4 class="card-title">Pantai Tanjung Aan</h4>
                              <p class="card-description">Pantai tersembunyi dengan air jernih dan bukit-bukit hijau di sekitarnya</p>
                              <div class="card-location">
                                  <i class="fas fa-map-marker-alt"></i>
                                  <span>Lombok Tengah</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  {{-- Beach Experience --}}
                  <div class="beach-experience" data-aos="fade-up" data-aos-delay="600">
                      <div class="experience-content">
                          <div class="experience-badge">
                              <i class="fas fa-ship"></i>
                              <span>Island Hopping Experience</span>
                          </div>
                          <h3 class="experience-title">Jelajahi 3 Gili dalam Satu Hari</h3>
                          <p class="experience-description">
                              Nikmati petualangan island hopping ke Gili Trawangan, Gili Meno, dan Gili Air. 
                              Rasakan keindahan pantai yang berbeda di setiap pulau dengan aktivitas snorkeling, 
                              bersantai di pantai, dan menikmati sunset yang spektakuler.
                          </p>
                          <div class="experience-features">
                              <div class="exp-feature">
                                  <i class="fas fa-clock"></i>
                                  <span>Full Day Trip</span>
                              </div>
                              <div class="exp-feature">
                                  <i class="fas fa-ship"></i>
                                  <span>Fast Boat</span>
                              </div>
                              <div class="exp-feature">
                                  <i class="fas fa-mask"></i>
                                  <span>Snorkeling Gear</span>
                              </div>
                              <div class="exp-feature">
                                  <i class="fas fa-utensils"></i>
                                  <span>Lunch Included</span>
                              </div>
                          </div>
                          <a href="{{ route('user.travelPackage.show') }}" class="btn-beach-experience">
                              <span>Book Island Hopping</span>
                              <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                      <div class="experience-image">
                          <img src="{{ asset('image/package-image/sigiriya-rock.svg') }}" alt="Island Hopping" class="exp-image">
                          <div class="floating-elements">
                              <div class="floating-icon icon-1">🏝️</div>
                              <div class="floating-icon icon-2">🐠</div>
                              <div class="floating-icon icon-3">⛵</div>
                              <div class="floating-icon icon-4">🌅</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- Modern Testimonials Section --}}
      <section class="modern-testimonials-section">
          <div class="container">
              <div class="section-header text-center">
                  <div class="section-badge">
                      <i class="fas fa-quote-left"></i>
                      <span>Testimonials</span>
                  </div>
                  <h2 class="section-title">Apa Kata Mereka Tentang Kami</h2>
                  <p class="section-subtitle">
                      Dengarkan cerita dari para traveler yang telah merasakan pengalaman luar biasa bersama kami
                  </p>
              </div>

              <div class="testimonials-slider" data-aos="fade-up">
                  <div class="testimonial-card-modern active">
                      <div class="testimonial-content-modern">
                          <div class="stars-modern">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                          </div>
                          <blockquote class="testimonial-quote-modern">
                              "Pengalaman luar biasa! Tour ke Pulau Komodo dengan Ryzuru Tour sangat terorganisir. 
                              Guide lokal sangat ramah dan berpengetahuan luas. Pasti akan kembali lagi!"
                          </blockquote>
                          <div class="testimonial-author-modern">
                              <div class="author-avatar">
                                  <img src="{{ asset('image/Tourists-people/t1.jpeg') }}" alt="Sarah Johnson">
                              </div>
                              <div class="author-info">
                                  <strong>Sarah Johnson</strong>
                                  <span>Australia</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="testimonial-card-modern">
                      <div class="testimonial-content-modern">
                          <div class="stars-modern">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                          </div>
                          <blockquote class="testimonial-quote-modern">
                              "Pelayanan terbaik! Dari penjemputan di bandara hingga tour ke Gili Trawangan, 
                              semuanya sempurna. Harga juga sangat reasonable untuk kualitas yang diberikan."
                          </blockquote>
                          <div class="testimonial-author-modern">
                              <div class="author-avatar">
                                  <img src="{{ asset('image/about-page-image/ranggakoboi.jpeg') }}" alt="Rangga Arsena">
                              </div>
                              <div class="author-info">
                                  <strong>Rangga Arsena</strong>
                                  <span>Jakarta, Indonesia</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="testimonial-card-modern">
                      <div class="testimonial-content-modern">
                          <div class="stars-modern">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                          </div>
                          <blockquote class="testimonial-quote-modern">
                              "Air terjun Senaru benar-benar menakjubkan! Tim Ryzuru Tour sangat profesional 
                              dan memastikan keselamatan kami selama trekking. Highly recommended!"
                          </blockquote>
                          <div class="testimonial-author-modern">
                              <div class="author-avatar">
                                  <img src="{{ asset('image/Tourists-people/t3.jpeg') }}" alt="Maria Santos">
                              </div>
                              <div class="author-info">
                                  <strong>Maria Santos</strong>
                                  <span>Philippines</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="testimonial-navigation">
                      <button class="nav-btn prev-btn">
                          <i class="fas fa-chevron-left"></i>
                      </button>
                      <div class="testimonial-dots">
                          <span class="dot active" data-slide="0"></span>
                          <span class="dot" data-slide="1"></span>
                          <span class="dot" data-slide="2"></span>
                      </div>
                      <button class="nav-btn next-btn">
                          <i class="fas fa-chevron-right"></i>
                      </button>
                  </div>
              </div>
          </div>
      </section>

@endsection

@push('styles')
<style>
/* Discover Lombok & Komodo Section */
.discover-lombok-section {
    padding: 5rem 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    overflow: hidden;
}

.discover-lombok-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(255, 193, 7, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(40, 167, 69, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.section-header-discover {
    text-align: center;
    margin-bottom: 4rem;
    position: relative;
    z-index: 2;
}

.section-badge-lombok {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
    animation: float 3s ease-in-out infinite;
}

.section-title-lombok {
    font-size: 3rem;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.lombok-text {
    background: linear-gradient(135deg, #ffc107, #28a745);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-subtitle-lombok {
    font-size: 1.2rem;
    color: #6c757d;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Discover Grid */
.discover-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 2rem;
    position: relative;
    z-index: 2;
}

.discover-card {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.discover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
}

.full-width {
    grid-column: 1 / -1;
}

/* Discover Image Container */
.discover-image-container {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.discover-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.discover-card:hover .discover-image {
    transform: scale(1.1);
}

.discover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.3), transparent);
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    padding: 1.5rem;
}

.discover-badge {
    background: rgba(255, 255, 255, 0.9);
    color: #2c3e50;
    padding: 0.5rem 1.5rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.komodo-badge {
    background: rgba(220, 53, 69, 0.9);
    color: white;
}

.discover-pattern {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: linear-gradient(45deg, #ffc107, #28a745);
    opacity: 0.1;
    clip-path: polygon(0 100%, 100% 100%, 100% 0, 0 80%);
}

.komodo-pattern {
    background: linear-gradient(45deg, #dc3545, #fd7e14);
}

/* Discover Content */
.discover-content {
    padding: 2rem;
}

.discover-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.discover-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.discover-highlights {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 2rem;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 193, 7, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    color: #856404;
    border: 1px solid rgba(255, 193, 7, 0.2);
}

.highlight-item i {
    color: #ffc107;
}

.discover-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 1rem 2rem;
    border-radius: 15px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
}

.discover-btn:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
    text-decoration: none;
}

.lombok-btn {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
}

.lombok-btn:hover {
    box-shadow: 0 12px 35px rgba(255, 193, 7, 0.4);
}

.komodo-btn {
    background: linear-gradient(135deg, #dc3545, #c82333);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
}

.komodo-btn:hover {
    box-shadow: 0 12px 35px rgba(220, 53, 69, 0.4);
}

/* Culture Card */
.culture-card {
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
    color: #2d3748;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(226, 232, 240, 0.8);
}

.culture-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    align-items: center;
    min-height: 400px;
}

.culture-image-side {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.culture-image {
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.culture-ornament {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.ornament-pattern {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, rgba(237, 137, 54, 0.1) 0%, rgba(221, 107, 32, 0.1) 100%);
    border-radius: 50%;
    border: 2px solid rgba(237, 137, 54, 0.2);
}

.ornament-pattern::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, rgba(237, 137, 54, 0.2) 0%, rgba(221, 107, 32, 0.2) 100%);
    border-radius: 50%;
}

.culture-content-side {
    padding: 3rem;
}

.culture-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 15px rgba(237, 137, 54, 0.3);
}

.culture-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    color: #2d3748;
}

.culture-description {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    color: #718096;
}

.culture-features {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.culture-feature {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
    color: white;
    box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
}

.feature-content h5 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #2d3748;
}

.feature-content p {
    font-size: 0.9rem;
    color: #718096;
    margin: 0;
}

.culture-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 15px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
}

.culture-btn:hover {
    color: white;
    background: linear-gradient(135deg, #dd6b20 0%, #c05621 100%);
    transform: translateY(-2px);
    text-decoration: none;
    box-shadow: 0 12px 35px rgba(237, 137, 54, 0.4);
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .section-title-lombok {
        font-size: 2.5rem;
    }
    
    .culture-content-wrapper {
        grid-template-columns: 1fr 1.2fr;
    }
    
    .culture-content-side {
        padding: 2rem;
    }
}

@media (max-width: 992px) {
    .discover-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .culture-content-wrapper {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .culture-image-side {
        order: 2;
        padding: 1rem;
    }
    
    .culture-content-side {
        order: 1;
        padding: 2rem;
    }
    
    .culture-features {
        align-items: center;
    }
    
    .section-title-lombok {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .discover-lombok-section {
        padding: 3rem 0;
    }
    
    .section-header-discover {
        margin-bottom: 2rem;
    }
    
    .section-title-lombok {
        font-size: 1.8rem;
    }
    
    .section-subtitle-lombok {
        font-size: 1rem;
    }
    
    .discover-image-container {
        height: 250px;
    }
    
    .discover-content {
        padding: 1.5rem;
    }
    
    .discover-highlights {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .culture-title {
        font-size: 1.8rem;
    }
    
    .culture-description {
        font-size: 1rem;
    }
    
    .culture-features {
        gap: 1rem;
    }
}

/* Modern 2026 Home Page Styles */

/* Travel Gallery Section */
.travel-gallery-section {
    padding: 5rem 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.travel-gallery-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 90% 80%, rgba(40, 167, 69, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.gallery-container {
    position: relative;
    z-index: 2;
}

/* Gallery Grid */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-auto-rows: 250px;
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.gallery-item {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.gallery-item.featured {
    grid-column: span 2;
    grid-row: span 2;
}

.gallery-item.tall {
    grid-row: span 2;
}

.gallery-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.gallery-item:hover .gallery-image {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.1) 0%,
        rgba(0, 0, 0, 0.3) 50%,
        rgba(0, 0, 0, 0.8) 100%
    );
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 1.5rem;
    opacity: 0;
    transition: all 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-info {
    margin-top: auto;
}

.gallery-title {
    color: white;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.gallery-location {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
}

.gallery-actions {
    display: flex;
    gap: 0.75rem;
    align-self: flex-end;
}

.gallery-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.gallery-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.view-btn:hover {
    background: rgba(102, 126, 234, 0.8);
}

.share-btn:hover {
    background: rgba(40, 167, 69, 0.8);
}

.gallery-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
}

/* Gallery CTA */
.gallery-cta {
    text-align: center;
}

.btn-gallery-more {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
    border: none;
    cursor: pointer;
}

.btn-gallery-more:hover {
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
    text-decoration: none;
}

/* Beach Paradise Section */
.beach-paradise-section {
    padding: 5rem 0;
    background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.beach-paradise-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 15% 25%, rgba(33, 150, 243, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 85% 75%, rgba(0, 188, 212, 0.08) 0%, transparent 50%);
    pointer-events: none;
}

.lombok-highlight {
    background: linear-gradient(135deg, #2196f3, #00bcd4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.beach-container {
    position: relative;
    z-index: 2;
}

/* Featured Beach */
.featured-beach {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: center;
    margin-bottom: 4rem;
    background: white;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.beach-image-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    height: 400px;
}

.beach-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.featured-beach:hover .beach-image {
    transform: scale(1.05);
}

.beach-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: linear-gradient(135deg, #2196f3, #21cbf3);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
}

.beach-overlay {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    padding: 0.75rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.beach-rating {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.beach-rating i {
    color: #ffc107;
    font-size: 0.9rem;
}

.beach-rating span {
    color: white;
    font-weight: 600;
    margin-left: 0.5rem;
}

.beach-content {
    padding: 1rem;
}

.beach-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.beach-description {
    font-size: 1.1rem;
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.beach-features {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.feature-tag {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

.feature-tag.unique {
    background: rgba(233, 30, 99, 0.1);
    color: #e91e63;
    border: 1px solid rgba(233, 30, 99, 0.2);
}

.feature-tag.activity {
    background: rgba(33, 150, 243, 0.1);
    color: #2196f3;
    border: 1px solid rgba(33, 150, 243, 0.2);
}

/* Beach Grid */
.beach-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.beach-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.beach-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.beach-card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.beach-card:hover .card-image {
    transform: scale(1.1);
}

.card-overlay {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    padding: 0.5rem;
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

.activity-icons {
    display: flex;
    gap: 0.5rem;
}

.activity-icons i {
    color: #2196f3;
    font-size: 0.9rem;
    width: 20px;
    text-align: center;
}

.beach-card-content {
    padding: 1.5rem;
}

.card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.card-description {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.card-location {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #2196f3;
    font-size: 0.9rem;
    font-weight: 600;
}

/* Beach Experience */
.beach-experience {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 3rem;
    align-items: center;
    background: linear-gradient(135deg, #2196f3, #21cbf3);
    color: white;
    border-radius: 24px;
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.experience-content {
    position: relative;
    z-index: 2;
}

.experience-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.experience-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.experience-description {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.experience-features {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 2rem;
}

.exp-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    font-weight: 500;
}

.exp-feature i {
    width: 20px;
    text-align: center;
}

.btn-beach-experience {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 1rem 2rem;
    border-radius: 15px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-beach-experience:hover {
    color: white;
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    text-decoration: none;
}

.experience-image {
    position: relative;
    z-index: 2;
}

.exp-image {
    width: 100%;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.floating-icon {
    position: absolute;
    font-size: 2rem;
    animation: float-icon 3s ease-in-out infinite;
}

.icon-1 {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.icon-2 {
    top: 20%;
    right: 15%;
    animation-delay: 0.5s;
}

.icon-3 {
    bottom: 30%;
    left: 20%;
    animation-delay: 1s;
}

.icon-4 {
    bottom: 15%;
    right: 10%;
    animation-delay: 1.5s;
}

@keyframes float-icon {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(5deg); }
}

/* Responsive Design for Beach */
@media (max-width: 1200px) {
    .featured-beach {
        gap: 2rem;
        padding: 1.5rem;
    }
    
    .beach-title {
        font-size: 1.8rem;
    }
    
    .experience-title {
        font-size: 1.6rem;
    }
}

@media (max-width: 992px) {
    .beach-paradise-section {
        padding: 3rem 0;
    }
    
    .featured-beach {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .beach-image-wrapper {
        height: 300px;
    }
    
    .beach-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .beach-experience {
        grid-template-columns: 1fr;
        text-align: center;
        padding: 2rem;
    }
    
    .experience-features {
        grid-template-columns: 1fr;
        justify-items: center;
    }
}

@media (max-width: 768px) {
    .beach-features {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .beach-grid {
        grid-template-columns: 1fr;
    }
    
    .beach-card-image {
        height: 180px;
    }
    
    .beach-card-content {
        padding: 1rem;
    }
    
    .beach-experience {
        padding: 1.5rem;
    }
    
    .floating-icon {
        font-size: 1.5rem;
    }
}

/* Lightbox Modal */
.lightbox-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(10px);
}

.lightbox-modal.active {
    display: flex;
}

.lightbox-content {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.lightbox-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.lightbox-close:hover {
    background: rgba(0, 0, 0, 0.7);
    transform: scale(1.1);
}

.lightbox-image-container {
    position: relative;
    max-height: 70vh;
    overflow: hidden;
}

.lightbox-image {
    width: 100%;
    height: auto;
    display: block;
}

.lightbox-info {
    padding: 1.5rem;
    text-align: center;
}

.lightbox-info h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.lightbox-info p {
    color: #6c757d;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.lightbox-navigation {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 1rem;
    pointer-events: none;
}

.lightbox-nav {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    pointer-events: all;
    backdrop-filter: blur(10px);
}

.lightbox-nav:hover {
    background: rgba(0, 0, 0, 0.7);
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .gallery-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        grid-auto-rows: 220px;
    }
    
    .gallery-item.featured {
        grid-column: span 2;
        grid-row: span 1;
    }
}

@media (max-width: 992px) {
    .travel-gallery-section {
        padding: 3rem 0;
    }
    
    .gallery-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-auto-rows: 200px;
        gap: 1rem;
    }
    
    .gallery-item.featured,
    .gallery-item.tall {
        grid-column: span 1;
        grid-row: span 1;
    }
    
    .gallery-stats {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        padding: 1.5rem;
    }
    
    .stat-item-gallery {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}

@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: 1fr;
        grid-auto-rows: 250px;
    }
    
    .gallery-title {
        font-size: 1rem;
    }
    
    .gallery-actions {
        gap: 0.5rem;
    }
    
    .gallery-btn {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .lightbox-content {
        max-width: 95vw;
        max-height: 95vh;
    }
    
    .lightbox-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .btn-gallery-more {
        padding: 0.875rem 2rem;
        font-size: 1rem;
    }
}

/* Modern 2026 Home Page Styles */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --text-primary: #2c3e50;
    --text-secondary: #7f8c8d;
    --shadow-light: 0 8px 32px rgba(0, 0, 0, 0.1);
    --shadow-medium: 0 12px 40px rgba(0, 0, 0, 0.15);
    --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.2);
}

/* Modern Hero Section */
.modern-hero-section {
    position: relative;
    height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    margin-top: -80px;
    padding-top: 80px;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.7) saturate(1.1);
}

.hero-gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.2) 100%);
}

.hero-particles {
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

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-20px) rotate(1deg); }
    66% { transform: translateY(-10px) rotate(-1deg); }
}

.hero-content-wrapper {
    position: relative;
    z-index: 2;
    width: 100%;
}

.hero-content {
    text-align: center;
    color: white;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 2rem;
    margin-bottom: 2rem;
    transform: translateY(-2rem);
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    margin-bottom: 2rem;
    font-size: 0.9rem;
    font-weight: 600;
    color: #2c3e50;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    animation: slideInDown 1s ease-out;
}

.hero-badge i {
    color: #fbbf24;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    color: white;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    animation: slideInUp 1s ease-out 0.2s both;
}

.gradient-text {
    color: white;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 3rem;
    color: rgba(255, 255, 255, 0.9);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    animation: slideInUp 1s ease-out 0.4s both;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 4rem;
    animation: slideInUp 1s ease-out 0.6s both;
}

.btn-modern {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}

.btn-primary-modern {
    background: var(--primary-gradient);
    color: white;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-primary-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-secondary-modern {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    color: white;
}

.btn-secondary-modern:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    animation: slideInUp 1s ease-out 0.8s both;
    margin-top: 1.5rem;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    padding: 1rem 1.5rem;
    transition: all 0.3s ease;
    min-width: 100px;
}

.stat-item:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.2);
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: white;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    line-height: 1;
}

.stat-label {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.9);
    margin-top: 0.25rem;
    font-weight: 500;
}

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
}

.scroll-arrow {
    width: 40px;
    height: 40px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.7);
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

/* Modern Services Section */
.modern-services-section {
    padding: 8rem 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    position: relative;
}

.modern-services-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
}

.section-header {
    text-align: center;
    margin-bottom: 5rem;
    position: relative;
    z-index: 1;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-primary);
    box-shadow: var(--shadow-light);
}

.section-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 1rem;
    line-height: 1.2;
}

.section-subtitle {
    font-size: 1.125rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    position: relative;
    z-index: 1;
}

.service-card-modern {
    background: white;
    border-radius: 24px;
    padding: 0;
    box-shadow: var(--shadow-light);
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
    position: relative;
}

.service-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--primary-gradient);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.service-card-modern:hover::before {
    transform: scaleX(1);
}

.service-card-modern:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-heavy);
}

.service-card-inner {
    padding: 2.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.service-icon-modern {
    position: relative;
    width: 80px;
    height: 80px;
    background: var(--primary-gradient);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    transition: all 0.4s ease;
}

.service-icon-modern i {
    font-size: 2rem;
    color: white;
    z-index: 2;
    position: relative;
}

.icon-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    border-radius: 20px;
    transform: translate(-50%, -50%) scale(0);
    opacity: 0.3;
    transition: transform 0.4s ease;
}

.service-card-modern:hover .icon-glow {
    transform: translate(-50%, -50%) scale(1.2);
}

.service-title-modern {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.service-description-modern {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.service-features {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.feature-tag {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.service-btn {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 1rem 1.5rem;
    background: var(--primary-gradient);
    color: white;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: auto;
}

.service-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

/* Modern Packages Section */
.modern-packages-section {
    padding: 8rem 0;
    background: white;
    position: relative;
}

.section-header-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 2rem;
}

.btn-outline-modern {
    background: transparent;
    border: 2px solid var(--primary-gradient);
    color: #667eea;
    position: relative;
    overflow: hidden;
}

.btn-outline-modern::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    transition: left 0.3s ease;
    z-index: -1;
}

.btn-outline-modern:hover::after {
    left: 0;
}

.btn-outline-modern:hover {
    color: white;
    border-color: transparent;
}

.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
}

.package-card-modern {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-light);
    transition: all 0.4s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
}

.package-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-heavy);
}

.featured-highlight::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    z-index: 1;
    pointer-events: none;
}

.package-link {
    text-decoration: none;
    color: inherit;
    display: block;
    height: 100%;
}

.package-image-container {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.package-image-modern {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.package-card-modern:hover .package-image-modern {
    transform: scale(1.1);
}

.package-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1));
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 1.5rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.package-card-modern:hover .package-overlay {
    opacity: 1;
}

.package-badge {
    background: var(--secondary-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.package-quick-view {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
}

.package-content-modern {
    padding: 2rem;
    position: relative;
    z-index: 2;
}

.package-meta-modern {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.package-duration-modern,
.package-category-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    color: #0284c7;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.package-title-modern {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.package-description-modern {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

.package-highlights {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.highlight-item i {
    color: #22c55e;
    font-size: 0.75rem;
}

.package-price-modern {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
}

.price-from-modern {
    font-size: 0.8rem;
    color: var(--text-secondary);
}

.price-amount-modern {
    font-size: 1.5rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-per-modern {
    font-size: 0.8rem;
    color: var(--text-secondary);
}

/* Modern Why Choose Section */
.modern-why-choose-section {
    padding: 8rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.modern-why-choose-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
}

.modern-why-choose-section .section-badge {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    color: white;
}

.modern-why-choose-section .section-title,
.modern-why-choose-section .section-subtitle {
    color: white;
}

.features-list-modern {
    margin-top: 3rem;
}

.feature-item-modern {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
    padding: 1.5rem;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 16px;
    transition: all 0.3s ease;
}

.feature-item-modern:hover {
    transform: translateX(10px);
    background: rgba(255, 255, 255, 0.15);
}

.feature-icon-modern {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.feature-icon-modern i {
    font-size: 1.5rem;
    color: white;
}

.feature-content-modern h5 {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: white;
}

.feature-content-modern p {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin: 0;
}

.image-container-modern {
    position: relative;
}

.main-image-modern {
    width: 100%;
    border-radius: 24px;
    box-shadow: var(--shadow-heavy);
}

/* Compact Floating Cards - Fixed */
.floating-card-compact {
    position: absolute;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: floatCompact 6s ease-in-out infinite;
    transition: all 0.3s ease;
    min-width: 110px;
    max-width: 130px;
    z-index: 10;
}

.floating-card-compact:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
    background: rgba(255, 255, 255, 0.95);
}

@keyframes floatCompact {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-6px); }
}

.card-icon-compact {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.card-content-compact {
    flex: 1;
    text-align: left;
}

.metric-compact {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
    margin-bottom: 0.1rem;
}

.label-compact {
    font-size: 0.65rem;
    color: #6b7280;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Card Specific Styling */
.card-rating .card-icon-compact {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    box-shadow: 0 2px 8px rgba(251, 191, 36, 0.3);
}

.card-travelers .card-icon-compact {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
}

.card-experience .card-icon-compact {
    background: linear-gradient(135deg, #10b981, #059669);
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
}

/* Positioning - Closer to edges */
.card-rating {
    top: 15%;
    right: -6%;
    animation-delay: 0s;
}

.card-travelers {
    bottom: 25%;
    left: -6%;
    animation-delay: -2s;
}

.card-experience {
    top: 60%;
    right: -4%;
    animation-delay: -4s;
}

/* Modern Video Section */
.modern-video-section {
    padding: 8rem 0;
    background: #f8f9fa;
}

.video-container-modern {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
}

.video-player-modern {
    width: 100%;
    height: auto;
    display: block;
}

.video-overlay-modern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.video-container-modern:hover .video-overlay-modern {
    opacity: 1;
}

.play-button-modern {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    transition: all 0.4s ease;
    cursor: pointer;
    animation: pulse-glass 3s infinite;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.play-button-modern:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

@keyframes pulse-glass {
    0% { 
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 0 0 0 rgba(255, 255, 255, 0.2);
        transform: scale(1);
    }
    70% { 
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 0 0 20px rgba(255, 255, 255, 0);
        transform: scale(1.05);
    }
    100% { 
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 0 0 0 rgba(255, 255, 255, 0);
        transform: scale(1);
    }
}

/* Modern Testimonials Section */
.modern-testimonials-section {
    padding: 8rem 0;
    background: white;
    position: relative;
}

.testimonials-slider {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.testimonial-card-modern {
    background: white;
    border-radius: 24px;
    padding: 3rem;
    box-shadow: var(--shadow-medium);
    border: 1px solid rgba(0, 0, 0, 0.05);
    display: none;
    animation: slideInUp 0.5s ease-out;
}

.testimonial-card-modern.active {
    display: block;
}

.testimonial-content-modern {
    text-align: center;
}

.stars-modern {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 2rem;
}

.stars-modern i {
    color: #fbbf24;
    font-size: 1.25rem;
}

.testimonial-quote-modern {
    font-size: 1.25rem;
    line-height: 1.8;
    color: var(--text-primary);
    font-style: italic;
    margin-bottom: 2rem;
    position: relative;
}

.testimonial-quote-modern::before,
.testimonial-quote-modern::after {
    content: '"';
    font-size: 3rem;
    color: #667eea;
    font-family: serif;
    position: absolute;
    opacity: 0.3;
}

.testimonial-quote-modern::before {
    top: -1rem;
    left: -1rem;
}

.testimonial-quote-modern::after {
    bottom: -2rem;
    right: -1rem;
}

.testimonial-author-modern {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #667eea;
}

.author-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-info strong {
    display: block;
    color: var(--text-primary);
    font-size: 1.125rem;
    font-weight: 700;
}

.author-info span {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.testimonial-navigation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
}

.nav-btn {
    width: 50px;
    height: 50px;
    border: none;
    background: var(--primary-gradient);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.testimonial-dots {
    display: flex;
    gap: 0.75rem;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #e5e7eb;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dot.active {
    background: #667eea;
    transform: scale(1.2);
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

/* Responsive Design */
@media (max-width: 1200px) {
    .floating-card-compact {
        min-width: 100px;
        max-width: 120px;
        padding: 0.6rem 0.8rem;
    }
    
    .card-rating {
        right: -4%;
    }
    
    .card-travelers {
        left: -4%;
    }
    
    .card-experience {
        right: -2%;
    }
}

@media (max-width: 1024px) {
    .section-header-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 2rem;
    }
    
    .hero-stats {
        gap: 2rem;
        margin-top: 1.5rem;
    }
    
    .stat-item {
        padding: 1.25rem 1.5rem;
    }
    
    .floating-card-compact {
        position: static;
        margin: 0.5rem auto;
        max-width: 140px;
        animation: floatCompact 6s ease-in-out infinite;
    }
    
    .image-container-modern {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .main-image-modern {
        max-width: 400px;
        margin: 0 auto;
    }
    
    .modern-why-choose-section .row {
        flex-direction: column-reverse;
    }
    
    .modern-why-choose-section .col-lg-6:last-child {
        margin-bottom: 3rem;
    }
}

@media (max-width: 768px) {
    .modern-hero-section {
        height: 80vh;
        margin-top: -60px;
        padding-top: 60px;
    }
    
    .hero-content {
        transform: translateY(-1rem);
        margin-bottom: 1rem;
    }
    
    .hero-badge {
        font-size: 0.8rem;
        padding: 0.6rem 1.2rem;
        margin-bottom: 1.5rem;
    }
    
    .hero-title {
        font-size: clamp(2rem, 4vw, 3rem);
        margin-bottom: 1rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
        margin-bottom: 2rem;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-stats {
        flex-direction: row;
        gap: 1rem;
        margin-top: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .stat-item {
        padding: 0.75rem 1rem;
        min-width: 80px;
        flex: 1;
        max-width: 100px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .stat-label {
        font-size: 0.7rem;
    }
    
    .services-grid,
    .packages-grid {
        grid-template-columns: 1fr;
    }
    
    .feature-item-modern {
        flex-direction: column;
        text-align: center;
    }
    
    .feature-item-modern:hover {
        transform: translateY(-5px);
    }
    
    .floating-card-compact {
        position: static;
        margin: 0.4rem auto;
        max-width: 120px;
        animation: none;
        min-width: auto;
        padding: 0.5rem 0.7rem;
    }
    
    .floating-card-compact:hover {
        transform: translateY(-1px) scale(1.02);
    }
    
    .metric-compact {
        font-size: 1rem;
    }
    
    .card-icon-compact {
        width: 28px;
        height: 28px;
        font-size: 0.8rem;
    }
    
    .label-compact {
        font-size: 0.6rem;
    }
    
    .testimonial-card-modern {
        padding: 2rem;
    }
    
    .testimonial-navigation {
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .hero-content {
        padding: 0 1rem;
    }
    
    .service-card-inner,
    .package-content-modern {
        padding: 1.5rem;
    }
    
    .section-header {
        margin-bottom: 3rem;
    }
    
    .modern-services-section,
    .modern-packages-section,
    .modern-why-choose-section,
    .modern-video-section,
    .modern-testimonials-section {
        padding: 4rem 0;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Modern Testimonials Slider

// Gallery Lightbox Functionality
const galleryImages = [
    {
        src: "{{ asset('image/package-image/Gili-Trawangan-Lombok-1-1.jpg') }}",
        title: "Gili Trawangan",
        location: "Lombok, Indonesia"
    },
    {
        src: "{{ asset('image/package-image/sigiriya-rock.svg') }}",
        title: "Komodo Dragon",
        location: "Pulau Komodo"
    },
    {
        src: "{{ asset('image/package-image/temple.svg') }}",
        title: "Pura Tradisional",
        location: "Lombok"
    },
    {
        src: "{{ asset('image/package-image/elephent.svg') }}",
        title: "Wildlife Safari",
        location: "Sumbawa"
    },
    {
        src: "{{ asset('image/package-image/pulau-komodo.jpeg') }}",
        title: "Adventure Safari",
        location: "Komodo Island"
    },
    {
        src: "{{ asset('image/package-image/sigiri-girls.svg') }}",
        title: "Cultural Experience",
        location: "Desa Sade"
    }
];

let currentImageIndex = 0;

function openLightbox(index) {
    currentImageIndex = index;
    const modal = document.getElementById('lightboxModal');
    const image = document.getElementById('lightboxImage');
    const title = document.getElementById('lightboxTitle');
    const location = document.getElementById('lightboxLocation');
    
    const imageData = galleryImages[index];
    
    image.src = imageData.src;
    image.alt = imageData.title;
    title.textContent = imageData.title;
    location.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${imageData.location}`;
    
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const modal = document.getElementById('lightboxModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
    updateLightboxImage();
}

function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
    updateLightboxImage();
}

function updateLightboxImage() {
    const image = document.getElementById('lightboxImage');
    const title = document.getElementById('lightboxTitle');
    const location = document.getElementById('lightboxLocation');
    
    const imageData = galleryImages[currentImageIndex];
    
    image.src = imageData.src;
    image.alt = imageData.title;
    title.textContent = imageData.title;
    location.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${imageData.location}`;
}

// Close lightbox on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    } else if (e.key === 'ArrowRight') {
        nextImage();
    } else if (e.key === 'ArrowLeft') {
        prevImage();
    }
});

// Close lightbox on background click
document.getElementById('lightboxModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});

// Modern Testimonials Slider
document.addEventListener('DOMContentLoaded', function() {
    const testimonials = document.querySelectorAll('.testimonial-card-modern');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentSlide = 0;

    function showSlide(index) {
        testimonials.forEach((testimonial, i) => {
            testimonial.classList.toggle('active', i === index);
        });
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % testimonials.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + testimonials.length) % testimonials.length;
        showSlide(currentSlide);
    }

    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-play
    setInterval(nextSlide, 5000);

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush