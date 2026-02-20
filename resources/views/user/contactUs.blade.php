{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

    {{-- Modern Contact Hero Section --}}
    <div class="modern-contact-hero">
        <div class="hero-background-pattern"></div>
        <div class="container">
            <div class="hero-content-contact">
                <div class="hero-badge-contact">
                    <i class="fas fa-envelope"></i>
                    <span>Hubungi Kami</span>
                </div>
                <h1 class="hero-title-contact">Mari Berbicara</h1>
                <p class="hero-subtitle-contact">
                    Kami siap membantu merencanakan petualangan impian Anda. 
                    Hubungi tim profesional kami untuk konsultasi gratis.
                </p>
                
                {{-- Contact Stats --}}
                <div class="contact-stats">
                    <div class="stat-item-contact">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Customer Support</div>
                        </div>
                    </div>
                    <div class="stat-item-contact">
                        <div class="stat-icon">
                            <i class="fas fa-reply"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">< 1 Jam</div>
                            <div class="stat-label">Response Time</div>
                        </div>
                    </div>
                    <div class="stat-item-contact">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modern Contact Content --}}
    <div class="modern-contact-container">
        <div class="container">
            <div class="row g-5">
                {{-- Contact Information --}}
                <div class="col-lg-4">
                    <div class="contact-info-modern">
                        <h2 class="contact-info-title">
                            <i class="fas fa-map-marker-alt"></i>
                            Informasi Kontak
                        </h2>
                        <p class="contact-info-subtitle">
                            Temukan kami di lokasi strategis Lombok atau hubungi melalui berbagai channel komunikasi.
                        </p>

                        {{-- Contact Cards --}}
                        <div class="contact-cards">
                            {{-- Address Card --}}
                            <div class="contact-card">
                                <div class="contact-card-icon address-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-card-content">
                                    <h4 class="contact-card-title">Alamat Kantor</h4>
                                    <p class="contact-card-text">
                                        Jl. Kirab Remaja<br>
                                        Kec. Narmada, Kabupaten Lombok Barat<br>
                                        Nusa Tenggara Bar. 83371
                                    </p>
                                </div>
                            </div>

                            {{-- Phone Card --}}
                            <div class="contact-card">
                                <div class="contact-card-icon phone-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-card-content">
                                    <h4 class="contact-card-title">Customer Care</h4>
                                    <p class="contact-card-text">
                                        <a href="tel:+62859553695998" class="contact-link">+62 859 5536 9598</a>
                                    </p>
                                    <span class="availability-badge">24/7 Available</span>
                                </div>
                            </div>

                            {{-- Email Card --}}
                            <div class="contact-card">
                                <div class="contact-card-icon email-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-card-content">
                                    <h4 class="contact-card-title">Email Support</h4>
                                    <p class="contact-card-text">
                                        <a href="mailto:hilmansatiapebrian9715@gmail.com" class="contact-link">hilmansatiapebrian9715@gmail.com</a>
                                    </p>
                                    <span class="response-badge">Response < 1 Hour</span>
                                </div>
                            </div>
                        </div>

                        {{-- Social Media --}}
                        <div class="social-media-modern">
                            <h4 class="social-title">Ikuti Kami</h4>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#" class="social-link youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="social-link tiktok">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-lg-8">
                    <div class="contact-form-modern">
                        <div class="form-header">
                            <h2 class="form-title">
                                <i class="fas fa-paper-plane"></i>
                                Kirim Pesan
                            </h2>
                            <p class="form-subtitle">
                                Ceritakan rencana perjalanan Anda dan kami akan membantu mewujudkannya
                            </p>
                        </div>

                        {{-- Messages --}}
                        <div class="message-container">
                            @if ($errors->any())
                            <div class="alert-modern alert-error">
                                <div class="alert-icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="alert-content">
                                    <h5>Terjadi Kesalahan</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                      
                            @if (session('success'))
                            <div class="alert-modern alert-success">
                                <div class="alert-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="alert-content">
                                    <h5>Pesan Terkirim!</h5>
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div>
                            @endif
                        </div>

                        <form action="{{route('user.contactUs.store')}}" method="post" class="modern-form">
                            @csrf
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Nama Lengkap
                                    </label>
                                    <input type="text" name="user_name" class="modern-input" placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        Email Address
                                    </label>
                                    <input type="email" name="email" class="modern-input" placeholder="nama@email.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-tag"></i>
                                    Subject
                                </label>
                                <input type="text" name="subject" class="modern-input" placeholder="Topik pesan Anda" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-comment"></i>
                                    Pesan Anda
                                </label>
                                <textarea name="discription" class="modern-textarea" rows="6" placeholder="Ceritakan rencana perjalanan atau pertanyaan Anda..." required></textarea>
                            </div>

                            <button type="submit" class="modern-submit-btn">
                                <i class="fas fa-paper-plane"></i>
                                <span>Kirim Pesan</span>
                                <div class="btn-glow"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modern Map Section --}}
    <div class="modern-map-section">
        <div class="container">
            <div class="map-header">
                <h2 class="map-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Lokasi Kami
                </h2>
                <p class="map-subtitle">
                    Kunjungi kantor kami di lokasi strategis Lombok untuk konsultasi langsung
                </p>
            </div>
            
            <div class="map-container-modern">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.056916829633!2d116.18498307477523!3d-8.59052649145434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdb88efad0cbaf%3A0x46615c9e78e3422f!2sJl.%20Kirab%20Remaja%2C%20Kec.%20Narmada%2C%20Kabupaten%20Lombok%20Barat%2C%20Nusa%20Tenggara%20Bar.%2083371!5e0!3m2!1sid!2sid!4v1771560688379!5m2!1sid!2sid" 
                    class="modern-map"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                {{-- Map Overlay Info --}}
                <div class="map-overlay-info">
                    <div class="map-info-card">
                        <div class="map-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="map-info-content">
                            <h4>Ryzuru Tour Travel</h4>
                            <p>Jl. Kirab Remaja, Kec. Narmada, Lombok Barat</p>
                            <a href="https://maps.google.com/?q=Jl.+Kirab+Remaja+Narmada+Lombok+Barat" target="_blank" class="directions-btn">
                                <i class="fas fa-directions"></i>
                                Petunjuk Arah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('styles')
<style>
/* Modern Contact 2026 Styles */
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

/* Modern Contact Hero */
.modern-contact-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('/image/package-image/komodo2.JPG');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 8rem 0 6rem;
    position: relative;
    overflow: hidden;
    margin-top: -80px;
    padding-top: 10rem;
    min-height: 100vh;
    width: 100%;
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

.hero-content-contact {
    text-align: center;
    color: white;
    position: relative;
    z-index: 2;
}

.hero-badge-contact {
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

.hero-title-contact {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-subtitle-contact {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 3rem;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    animation: slideInUp 1s ease-out 0.4s both;
}

/* Contact Stats */
.contact-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    animation: slideInUp 1s ease-out 0.6s both;
}

.stat-item-contact {
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

.stat-item-contact:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.15);
}

.stat-icon {
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

.stat-info {
    text-align: left;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 0.25rem;
}

/* Modern Contact Container */
.modern-contact-container {
    padding: 6rem 0;
    background: #f8f9fa;
}

/* Contact Info Modern */
.contact-info-modern {
    background: white;
    border-radius: 24px;
    padding: 3rem;
    box-shadow: var(--shadow-medium);
    height: fit-content;
    position: sticky;
    top: 2rem;
}

.contact-info-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.contact-info-title i {
    color: #667eea;
}

.contact-info-subtitle {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 3rem;
}

/* Contact Cards */
.contact-cards {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    margin-bottom: 3rem;
}

.contact-card {
    display: flex;
    gap: 1.5rem;
    padding: 2rem;
    background: #f8f9fa;
    border-radius: 16px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.contact-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-light);
    border-color: #667eea;
}

.contact-card-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.address-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.phone-icon {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
}

.email-icon {
    background: linear-gradient(135deg, #f093fb, #f5576c);
}

.contact-card-content {
    flex: 1;
}

.contact-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.contact-card-text {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.contact-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.contact-link:hover {
    color: #5a6fd8;
    text-decoration: none;
}

.availability-badge,
.response-badge {
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #166534;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
}

.response-badge {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
}

/* Social Media Modern */
.social-media-modern {
    border-top: 1px solid #e9ecef;
    padding-top: 2rem;
}

.social-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.social-link {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px) scale(1.1);
    color: white;
}

.facebook { background: #1877f2; }
.instagram { background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); }
.whatsapp { background: #25d366; }
.youtube { background: #ff0000; }
.tiktok { background: #000000; }

/* Contact Form Modern */
.contact-form-modern {
    background: white;
    border-radius: 24px;
    padding: 3rem;
    box-shadow: var(--shadow-medium);
}

.form-header {
    text-align: center;
    margin-bottom: 3rem;
}

.form-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.form-title i {
    color: #667eea;
}

.form-subtitle {
    color: #6c757d;
    line-height: 1.6;
    max-width: 500px;
    margin: 0 auto;
}

/* Modern Alerts */
.message-container {
    margin-bottom: 2rem;
}

.alert-modern {
    display: flex;
    gap: 1rem;
    padding: 1.5rem;
    border-radius: 16px;
    margin-bottom: 1rem;
    border: 1px solid transparent;
}

.alert-error {
    background: linear-gradient(135deg, #fef2f2, #fee2e2);
    border-color: #fecaca;
}

.alert-success {
    background: linear-gradient(135deg, #f0fdf4, #dcfce7);
    border-color: #bbf7d0;
}

.alert-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.alert-error .alert-icon {
    background: #ef4444;
    color: white;
}

.alert-success .alert-icon {
    background: #22c55e;
    color: white;
}

.alert-content h5 {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.alert-error .alert-content {
    color: #991b1b;
}

.alert-success .alert-content {
    color: #166534;
}

.alert-content ul {
    margin: 0;
    padding-left: 1rem;
}

/* Modern Form */
.modern-form {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.9rem;
}

.form-label i {
    color: #667eea;
}

.modern-input,
.modern-textarea {
    padding: 1rem 1.25rem;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
    resize: vertical;
}

.modern-input:focus,
.modern-textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.modern-textarea {
    min-height: 150px;
    font-family: inherit;
}

/* Modern Submit Button */
.modern-submit-btn {
    padding: 1.25rem 2rem;
    background: var(--primary-gradient);
    border: none;
    border-radius: 16px;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
}

.modern-submit-btn:hover {
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

.modern-submit-btn:hover .btn-glow {
    left: 100%;
}

/* Modern Map Section */
.modern-map-section {
    padding: 6rem 0;
    background: white;
}

.map-header {
    text-align: center;
    margin-bottom: 4rem;
}

.map-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.map-title i {
    color: #667eea;
}

.map-subtitle {
    color: #6c757d;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
    font-size: 1.1rem;
}

.map-container-modern {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
}

.modern-map {
    width: 100%;
    height: 500px;
    border: none;
    filter: grayscale(20%) contrast(1.1);
}

/* Map Overlay Info */
.map-overlay-info {
    position: absolute;
    top: 2rem;
    left: 2rem;
    z-index: 10;
}

.map-info-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 16px;
    padding: 2rem;
    box-shadow: var(--shadow-medium);
    display: flex;
    gap: 1rem;
    max-width: 350px;
}

.map-info-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.map-info-content h4 {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.map-info-content p {
    color: #6c757d;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.directions-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--primary-gradient);
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.directions-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    color: white;
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
    .contact-stats {
        gap: 2rem;
    }
    
    .stat-item-contact {
        padding: 1.25rem 1.5rem;
    }
}

@media (max-width: 992px) {
    .modern-contact-container {
        padding: 4rem 0;
    }
    
    .contact-info-modern {
        position: static;
        margin-bottom: 3rem;
    }
    
    .contact-stats {
        flex-direction: column;
        gap: 1.5rem;
        align-items: center;
    }
    
    .stat-item-contact {
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .modern-contact-hero {
        padding: 4rem 0 2rem;
        padding-top: 6rem;
    }
    
    .hero-title-contact {
        font-size: 2rem;
    }
    
    .hero-subtitle-contact {
        font-size: 1rem;
    }
    
    .contact-info-modern,
    .contact-form-modern {
        padding: 2rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .contact-card {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .social-links {
        flex-wrap: wrap;
    }
    
    .map-overlay-info {
        position: static;
        margin: 2rem;
    }
    
    .map-info-card {
        max-width: none;
    }
    
    .modern-map {
        height: 400px;
    }
}

@media (max-width: 480px) {
    .contact-info-modern,
    .contact-form-modern {
        padding: 1.5rem;
    }
    
    .form-title,
    .contact-info-title {
        font-size: 1.5rem;
    }
    
    .map-title {
        font-size: 2rem;
    }
}
</style>
@endpush