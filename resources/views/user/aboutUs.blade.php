{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

    {{-- Modern About Hero Section --}}
    <div class="modern-about-hero">
        <div class="hero-background-pattern"></div>
        <div class="container">
            <div class="hero-content-about">
                <div class="hero-badge-about">
                    <i class="fas fa-users"></i>
                    <span>Tentang Kami</span>
                </div>
                <h1 class="hero-title-about">Ryzuru Tour Travel</h1>
                <p class="hero-subtitle-about">
                    Mitra terpercaya untuk petualangan tak terlupakan di Lombok & Komodo. 
                    Dengan pengalaman bertahun-tahun, kami siap mewujudkan impian perjalanan Anda.
                </p>
                
                {{-- About Stats --}}
                <div class="about-stats">
                    <div class="stat-item-about">
                        <div class="stat-icon-about">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info-about">
                            <div class="stat-number-about">5+</div>
                            <div class="stat-label-about">Tahun Pengalaman</div>
                        </div>
                    </div>
                    <div class="stat-item-about">
                        <div class="stat-icon-about">
                            <i class="fas fa-smile"></i>
                        </div>
                        <div class="stat-info-about">
                            <div class="stat-number-about">500+</div>
                            <div class="stat-label-about">Pelanggan Puas</div>
                        </div>
                    </div>
                    <div class="stat-item-about">
                        <div class="stat-icon-about">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="stat-info-about">
                            <div class="stat-number-about">50+</div>
                            <div class="stat-label-about">Destinasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Story Section --}}
    <div class="our-story-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="story-image-container">
                        <div class="story-main-image">
                            <img src="{{ asset('image/about-page-image/koboiryan.jpeg') }}" alt="Ryzuru Tour Travel Team" class="story-img">
                            <div class="image-overlay">
                            </div>
                        </div>
                        <div class="story-badge">
                            <i class="fas fa-award"></i>
                            <span>Trusted Partner</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-content">
                        <div class="section-badge">
                            <i class="fas fa-heart"></i>
                            <span>{{ __('messages.our_story') }}</span>
                        </div>
                        <h2 class="story-title">{{ __('messages.journey_starts_passion') }}</h2>
                        <p class="story-text">
                            {{ __('messages.about_description') }} 
                            Sebagai agen perjalanan terpercaya, kami mengkhususkan diri dalam merancang itinerary personal yang memberikan 
                            pengalaman liburan yang benar-benar berkesan.
                        </p>
                        <p class="story-text">
                            Dengan pengetahuan lokal yang mendalam dan pengalaman bertahun-tahun di industri perjalanan, kami bangga 
                            menawarkan perjalanan unik yang memungkinkan Anda menikmati warisan budaya yang kaya, lanskap alam yang 
                            menakjubkan, dan berbagai destinasi menawan yang penuh cerita.
                        </p>
                        
                        <div class="story-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Pengalaman 5+ tahun di industri travel</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Tim profesional berpengalaman</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Itinerary personal sesuai keinginan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
    {{-- Team Section --}}
    <div class="team-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge-center">
                    <i class="fas fa-users"></i>
                    <span>Tim Kami</span>
                </div>
                <h2 class="section-title">Bertemu dengan Tim Profesional</h2>
                <p class="section-subtitle">
                    Tim berpengalaman yang siap membantu mewujudkan perjalanan impian Anda dengan pelayanan terbaik
                </p>
            </div>

            <div class="team-grid">
                {{-- Team Member 1 --}}
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-image">
                        <img src="{{ asset('image/about-page-image/koboiryan.jpeg') }}" alt="Founder" class="team-img">
                        <div class="team-overlay">
                            <div class="social-links-team">
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Hilman Satia Pebrian</h4>
                        <p class="team-role">Founder & CEO</p>
                        <p class="team-description">
                            Pendiri Ryzuru Tour Travel dengan passion besar untuk industri pariwisata Lombok dan Komodo
                        </p>
                    </div>
                </div>

                {{-- Team Member 2 --}}
                <div class="team-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-image">
                        <img src="{{ asset('image/about-page-image/ranggakoboi.jpeg') }}" alt="Tour Guide" class="team-img">
                        <div class="team-overlay">
                            <div class="social-links-team">
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Rangga Arsena</h4>
                        <p class="team-role">Senior Tour Guide</p>
                        <p class="team-description">
                            Guide berpengalaman dengan pengetahuan mendalam tentang budaya dan sejarah Lombok
                        </p>
                    </div>
                </div>

                {{-- Team Member 3 --}}
                <div class="team-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-image">
                        <img src="{{ asset('image/about-page-image/raffa.jpeg') }}" alt="Trip Coordinator" class="team-img">
                        <div class="team-overlay">
                            <div class="social-links-team">
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Raffa Prasetya</h4>
                        <p class="team-role">Trip Coordinator</p>
                        <p class="team-description">
                            Koordinator perjalanan yang memastikan setiap detail trip berjalan dengan sempurna
                        </p>
                    </div>
                </div>

                {{-- Team Member 4 --}}
                <div class="team-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-image">
                        <img src="{{ asset('image/about-page-image/dayat.jpeg') }}" alt="Driver" class="team-img">
                        <div class="team-overlay">
                            <div class="social-links-team">
                                <a href="#" class="social-link-team">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Muh Hidayat</h4>
                        <p class="team-role">Professional Driver</p>
                        <p class="team-description">
                            Driver profesional dengan pengalaman mengemudi di berbagai medan Lombok dan sekitarnya
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Services Section --}}
    <div class="services-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge-center">
                    <i class="fas fa-star"></i>
                    <span>Layanan Kami</span>
                </div>
                <h2 class="section-title">Mengapa Memilih Ryzuru Tour Travel?</h2>
                <p class="section-subtitle">
                    Kami menyediakan layanan terbaik untuk memastikan perjalanan Anda menjadi pengalaman tak terlupakan
                </p>
            </div>

            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">
                        <img src="{{ asset('image/help-tools/img1About.svg') }}" alt="Experience">
                    </div>
                    <h4 class="service-title">5+ Tahun Pengalaman</h4>
                    <p class="service-description">
                        Temukan keajaiban Ryzuru Tour Travel dengan keahlian 5 tahun kami. 
                        Perjalanan berkesan yang disesuaikan dengan preferensi Anda menanti.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">
                        <img src="{{ asset('image/help-tools/img2About.svg') }}" alt="Accommodation">
                    </div>
                    <h4 class="service-title">Saran Akomodasi Terbaik</h4>
                    <p class="service-description">
                        Temukan tempat menginap sempurna di Lombok & Komodo. 
                        Saran ahli tentang akomodasi untuk membuat perjalanan Anda tak terlupakan.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon">
                        <img src="{{ asset('image/help-tools/img3About.svg') }}" alt="Map">
                    </div>
                    <h4 class="service-title">Peta Lengkap Destinasi</h4>
                    <p class="service-description">
                        Jelajahi dengan percaya diri menggunakan peta lengkap kami. 
                        Temukan permata tersembunyi dan rencanakan petualangan dengan mudah.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon">
                        <img src="{{ asset('image/help-tools/img4About.svg') }}" alt="Transport">
                    </div>
                    <h4 class="service-title">Transportasi Terpercaya</h4>
                    <p class="service-description">
                        Pilih dari berbagai opsi transportasi terpercaya kami 
                        dan nikmati perjalanan nyaman ke destinasi impian Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Values Section --}}
    <div class="values-section">
        <div class="values-background">
            <img src="{{ asset('image/help-tools/for-about-section-Img.svg') }}" alt="Background" class="values-bg-img">
            <div class="values-overlay"></div>
        </div>
        <div class="container">
            <div class="values-content">
                <div class="section-badge-white">
                    <i class="fas fa-heart"></i>
                    <span>Nilai-Nilai Kami</span>
                </div>
                <h2 class="values-title">Komitmen Terhadap Keunggulan</h2>
                <p class="values-description">
                    Di Ryzuru Tour Travel, kami adalah mitra perjalanan terpercaya untuk menjelajahi keajaiban Lombok & Komodo. 
                    Dengan pengalaman luas dan keahlian lokal, kami menawarkan itinerary personal dan pengalaman perjalanan 
                    yang mulus sesuai dengan preferensi Anda.
                </p>
                <p class="values-description">
                    {{ __('messages.values_description') }}
                </p>
                
                <div class="values-features">
                    <div class="values-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>Keamanan Terjamin</span>
                    </div>
                    <div class="values-feature">
                        <i class="fas fa-handshake"></i>
                        <span>Pelayanan Personal</span>
                    </div>
                    <div class="values-feature">
                        <i class="fas fa-clock"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('styles')
<style>
/* Modern About 2026 Styles */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.08);
    --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
    --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.15);
}

/* Modern About Hero */
.modern-about-hero {
    background: var(--primary-gradient);
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

.hero-content-about {
    text-align: center;
    color: white;
    position: relative;
    z-index: 2;
}

.hero-badge-about {
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

.hero-title-about {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-subtitle-about {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 3rem;
    opacity: 0.9;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    animation: slideInUp 1s ease-out 0.4s both;
}

/* About Stats */
.about-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    animation: slideInUp 1s ease-out 0.6s both;
}

.stat-item-about {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    padding: 1.5rem 2rem;
    transition: all 0.3s ease;
}

.stat-item-about:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.15);
}

.stat-icon-about {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.stat-info-about {
    text-align: left;
}

.stat-number-about {
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    line-height: 1;
}

.stat-label-about {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 0.25rem;
}

/* Our Story Section */
.our-story-section {
    padding: 6rem 0;
    background: #f8f9fa;
}

.story-image-container {
    position: relative;
}

.story-main-image {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
}

.story-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    transition: all 0.4s ease;
}

.image-overlay {
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
    transition: all 0.3s ease;
}

.story-main-image:hover .image-overlay {
    opacity: 1;
}

.story-main-image:hover .story-img {
    transform: scale(1.05);
}

.play-button {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #667eea;
    cursor: pointer;
    transition: all 0.3s ease;
}

.play-button:hover {
    transform: scale(1.1);
    background: white;
}

.story-badge {
    position: absolute;
    bottom: -20px;
    right: 20px;
    background: white;
    padding: 1rem 2rem;
    border-radius: 16px;
    box-shadow: var(--shadow-medium);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #2c3e50;
}

.story-badge i {
    color: #fbbf24;
    font-size: 1.25rem;
}

/* Story Content */
.story-content {
    padding-left: 2rem;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.story-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 2rem;
    line-height: 1.2;
}

.story-text {
    color: #6c757d;
    line-height: 1.8;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
}

.story-features {
    margin-top: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    color: #2c3e50;
    font-weight: 500;
}

.feature-item i {
    color: #22c55e;
    font-size: 1.25rem;
}

/* Team Section */
.team-section {
    padding: 6rem 0;
    background: white;
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge-center {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.section-subtitle {
    color: #6c757d;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
    font-size: 1.1rem;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.team-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-light);
    transition: all 0.4s ease;
    position: relative;
}

.team-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-heavy);
}

.team-image {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.team-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s ease;
}

.team-card:hover .team-img {
    transform: scale(1.1);
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(102, 126, 234, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.social-links-team {
    display: flex;
    gap: 1rem;
}

.social-link-team {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.social-link-team:hover {
    background: white;
    color: #667eea;
    transform: scale(1.1);
}

.team-info {
    padding: 2rem;
    text-align: center;
}

.team-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.team-role {
    color: #667eea;
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.team-description {
    color: #6c757d;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Services Section */
.services-section {
    padding: 6rem 0;
    background: #f8f9fa;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.service-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    text-align: center;
    box-shadow: var(--shadow-light);
    transition: all 0.4s ease;
    border: 2px solid transparent;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
    border-color: #667eea;
}

.service-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.service-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.service-description {
    color: #6c757d;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Values Section */
.values-section {
    position: relative;
    padding: 6rem 0;
    overflow: hidden;
}

.values-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.values-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.values-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
}

.values-content {
    position: relative;
    z-index: 2;
    color: white;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.section-badge-white {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 2rem;
}

.values-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 2rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.values-description {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.values-features {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-top: 3rem;
}

.values-feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 1rem 2rem;
    border-radius: 16px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.values-feature:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
}

.values-feature i {
    font-size: 1.25rem;
    color: #fbbf24;
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
    .about-stats {
        gap: 2rem;
    }
    
    .stat-item-about {
        padding: 1.25rem 1.5rem;
    }
    
    .values-features {
        gap: 2rem;
    }
}

@media (max-width: 992px) {
    .story-content {
        padding-left: 0;
        margin-top: 3rem;
    }
    
    .about-stats {
        flex-direction: column;
        gap: 1.5rem;
        align-items: center;
    }
    
    .stat-item-about {
        max-width: 300px;
    }
    
    .values-features {
        flex-direction: column;
        gap: 1.5rem;
        align-items: center;
    }
    
    .values-feature {
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .modern-about-hero {
        padding: 4rem 0 2rem;
        padding-top: 6rem;
    }
    
    .hero-title-about {
        font-size: 2rem;
    }
    
    .hero-subtitle-about {
        font-size: 1rem;
    }
    
    .our-story-section,
    .team-section,
    .services-section,
    .values-section {
        padding: 4rem 0;
    }
    
    .story-title,
    .section-title,
    .values-title {
        font-size: 2rem;
    }
    
    .team-grid,
    .services-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .story-img {
        height: 300px;
    }
}

@media (max-width: 480px) {
    .story-content,
    .team-info,
    .service-card {
        padding: 1.5rem;
    }
    
    .values-content {
        padding: 0 1rem;
    }
}
</style>
@endpush