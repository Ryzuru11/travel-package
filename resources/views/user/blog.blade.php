{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

    {{-- Modern Blog Hero Section --}}
    <div class="modern-blog-hero">
        <div class="hero-background-pattern"></div>
        <div class="container">
            <div class="hero-content-blog">
                <div class="hero-badge-blog">
                    <i class="fas fa-feather-alt"></i>
                    <span>{{ __('messages.travel_stories') }}</span>
                </div>
                <h1 class="hero-title-blog">{{ __('messages.blog_title') }}</h1>
                <p class="hero-subtitle-blog">
                    {{ __('messages.blog_subtitle') }}
                </p>
                
                {{-- Blog Stats --}}
                <div class="blog-stats">
                    <div class="stat-item-blog">
                        <div class="stat-icon-blog">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="stat-info-blog">
                            <div class="stat-number-blog">{{ $blogs->count() }}+</div>
                            <div class="stat-label-blog">{{ __('messages.travel_stories') }}</div>
                        </div>
                    </div>
                    <div class="stat-item-blog">
                        <div class="stat-icon-blog">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="stat-info-blog">
                            <div class="stat-number-blog">10+</div>
                            <div class="stat-label-blog">{{ __('messages.destinations_count') }}</div>
                        </div>
                    </div>
                    <div class="stat-item-blog">
                        <div class="stat-icon-blog">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info-blog">
                            <div class="stat-number-blog">1000+</div>
                            <div class="stat-label-blog">{{ __('messages.readers_count') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modern Blog Content --}}
    <div class="modern-blog-container">
        <div class="container">
            {{-- Blog Header --}}
            <div class="blog-content-header">
                <div class="blog-header-info">
                    <h2 class="blog-section-title">
                        <i class="fas fa-book-open"></i>
                        {{ __('messages.latest_stories') }}
                    </h2>
                    <p class="blog-section-subtitle">
                        {{ __('messages.stories_subtitle') }}
                    </p>
                </div>
                
                {{-- Blog Categories --}}
                <div class="blog-categories">
                    <div class="category-item active">
                        <i class="fas fa-globe"></i>
                        <span>{{ __('messages.all_categories') }}</span>
                    </div>
                    <div class="category-item">
                        <i class="fas fa-mountain"></i>
                        <span>{{ __('messages.adventure') }}</span>
                    </div>
                    <div class="category-item">
                        <i class="fas fa-utensils"></i>
                        <span>{{ __('messages.culinary') }}</span>
                    </div>
                    <div class="category-item">
                        <i class="fas fa-camera"></i>
                        <span>{{ __('messages.photography') }}</span>
                    </div>
                    <div class="category-item">
                        <i class="fas fa-lightbulb"></i>
                        <span>{{ __('messages.tips') }}</span>
                    </div>
                </div>
            </div>

            {{-- Blog Posts Grid --}}
            @if ($blogs->isNotEmpty())  
                <div class="modern-blog-grid">
                    @foreach ($blogs as $index => $blogPost)  
                        <article class="modern-blog-card {{ $index === 0 ? 'featured-post' : '' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <a href="{{route('blog.page', $blogPost->id)}}" class="blog-link-modern">
                                {{-- Blog Image --}}
                                <div class="blog-image-modern">
                                    @if ($blogPost->image != "")
                                        <img src="{{ asset('image/uploads/blog/'.$blogPost->image) }}" alt="{{ $blogPost->title }}" class="blog-img">
                                    @else
                                        <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $blogPost->title }}" class="blog-img">
                                    @endif
                                    
                                    {{-- Blog Overlay --}}
                                    <div class="blog-overlay-modern">
                                        @if($index === 0)
                                            <div class="featured-badge">
                                                <i class="fas fa-star"></i>
                                                <span>{{ __('messages.featured') }}</span>
                                            </div>
                                        @endif
                                        <div class="read-time-badge">
                                            <i class="fas fa-clock"></i>
                                            <span>5 {{ __('messages.min_read') }}</span>
                                        </div>
                                        <div class="blog-quick-view">
                                            <i class="fas fa-eye"></i>
                                            <span>{{ __('messages.read_article') }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Blog Content --}}
                                <div class="blog-content-modern">
                                    {{-- Blog Meta --}}
                                    <div class="blog-meta-modern">
                                        <div class="blog-date-modern">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>{{ \carbon\carbon::parse($blogPost->created_at)->format('d M, Y') }}</span>
                                        </div>
                                        <div class="blog-category-badge">
                                            <i class="fas fa-tag"></i>
                                            <span>Travel</span>
                                        </div>
                                    </div>

                                    {{-- Blog Title --}}
                                    <h3 class="blog-title-modern">{{ $blogPost->title }}</h3>

                                    {{-- Blog Excerpt --}}
                                    <p class="blog-excerpt-modern">
                                        {{ Str::limit(strip_tags($blogPost->discription), $index === 0 ? 180 : 120) }}
                                    </p>

                                    {{-- Blog Footer --}}
                                    <div class="blog-footer-modern">
                                        <div class="author-info">
                                            <div class="author-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="author-details">
                                                <span class="author-name">Dilaga Team</span>
                                                <span class="author-role">{{ __('messages.travel_writer') }}</span>
                                            </div>
                                        </div>
                                        <div class="read-more-btn">
                                            <span>{{ __('messages.read_more') }}</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="no-blog-modern">
                    <div class="no-blog-icon">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <h3 class="no-blog-title">{{ __('messages.no_stories_title') }}</h3>
                    <p class="no-blog-text">
                        {{ __('messages.no_stories_text') }}
                    </p>
                    <div class="coming-soon-badge">
                        <i class="fas fa-clock"></i>
                        <span>{{ __('messages.coming_soon') }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Newsletter Section --}}
    <div class="newsletter-section-modern">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-info">
                    <h3 class="newsletter-title">
                        <i class="fas fa-envelope"></i>
                        {{ __('messages.get_updates') }}
                    </h3>
                    <p class="newsletter-subtitle">
                        {{ __('messages.newsletter_subtitle') }}
                    </p>
                </div>
                <div class="newsletter-form">
                    <div class="form-group-newsletter">
                        <input type="email" class="newsletter-input" placeholder="{{ __('messages.enter_email') }}">
                        <button class="newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                            <span>{{ __('messages.subscribe') }}</span>
                        </button>
                    </div>
                    <p class="newsletter-privacy">
                        <i class="fas fa-shield-alt"></i>
                        {{ __('messages.privacy_notice') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
<style>
/* Modern Blog 2026 Styles */
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

/* Modern Blog Hero */
.modern-blog-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('/image/package-image/blog.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 8rem 0 6rem;
    position: relative;
    overflow: hidden;
    margin-top: -80px;
    padding-top: 10rem;
    min-height: 650px;
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

.hero-content-blog {
    text-align: center;
    color: white;
    position: relative;
    z-index: 2;
}

.hero-badge-blog {
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

.hero-title-blog {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-subtitle-blog {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 3rem;
    opacity: 0.9;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    animation: slideInUp 1s ease-out 0.4s both;
}

/* Blog Stats */
.blog-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    animation: slideInUp 1s ease-out 0.6s both;
}

.stat-item-blog {
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

.stat-item-blog:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.15);
}

.stat-icon-blog {
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

.stat-info-blog {
    text-align: left;
}

.stat-number-blog {
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    line-height: 1;
}

.stat-label-blog {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 0.25rem;
}

/* Modern Blog Container */
.modern-blog-container {
    padding: 6rem 0;
    background: #f8f9fa;
}

/* Blog Content Header */
.blog-content-header {
    text-align: center;
    margin-bottom: 4rem;
}

.blog-section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.blog-section-title i {
    color: #667eea;
}

.blog-section-subtitle {
    color: #6c757d;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto 3rem;
    font-size: 1.1rem;
}

/* Blog Categories */
.blog-categories {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.category-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    color: #6c757d;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.category-item:hover,
.category-item.active {
    background: var(--primary-gradient);
    border-color: transparent;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

/* Modern Blog Grid */
.modern-blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.modern-blog-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-light);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.modern-blog-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-heavy);
}

.featured-post {
    grid-column: span 2;
}

.blog-link-modern {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* Blog Image */
.blog-image-modern {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.featured-post .blog-image-modern {
    height: 300px;
}

.blog-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s ease;
}

.modern-blog-card:hover .blog-img {
    transform: scale(1.1);
}

/* Blog Overlay */
.blog-overlay-modern {
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

.modern-blog-card:hover .blog-overlay-modern {
    opacity: 1;
}

.featured-badge {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    align-self: flex-start;
}

.read-time-badge {
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
    align-self: flex-end;
}

.blog-quick-view {
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

.blog-quick-view:hover {
    background: var(--primary-gradient);
    color: white;
    transform: scale(1.05);
}

/* Blog Content */
.blog-content-modern {
    padding: 2rem;
}

.featured-post .blog-content-modern {
    padding: 2.5rem;
}

.blog-meta-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.blog-date-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6c757d;
    font-size: 0.9rem;
    font-weight: 500;
}

.blog-category-badge {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.blog-title-modern {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.featured-post .blog-title-modern {
    font-size: 2rem;
}

.blog-excerpt-modern {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 2rem;
    font-size: 0.95rem;
}

.featured-post .blog-excerpt-modern {
    font-size: 1rem;
}

/* Blog Footer */
.blog-footer-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e9ecef;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.author-avatar {
    width: 40px;
    height: 40px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
}

.author-details {
    display: flex;
    flex-direction: column;
}

.author-name {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.9rem;
}

.author-role {
    color: #6c757d;
    font-size: 0.8rem;
}

.read-more-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    color: #5a6fd8;
    transform: translateX(3px);
}

/* No Blog State */
.no-blog-modern {
    text-align: center;
    padding: 6rem 2rem;
    background: white;
    border-radius: 24px;
    box-shadow: var(--shadow-light);
}

.no-blog-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 3rem;
    color: #adb5bd;
}

.no-blog-title {
    font-size: 2rem;
    font-weight: 600;
    color: #495057;
    margin-bottom: 1rem;
}

.no-blog-text {
    color: #6c757d;
    font-size: 1.1rem;
    line-height: 1.6;
    max-width: 500px;
    margin: 0 auto 2rem;
}

.coming-soon-badge {
    background: var(--warning-gradient);
    color: #92400e;
    padding: 0.75rem 2rem;
    border-radius: 25px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

/* Newsletter Section */
.newsletter-section-modern {
    background: var(--primary-gradient);
    padding: 6rem 0;
    position: relative;
    overflow: hidden;
}

.newsletter-section-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
}

.newsletter-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    position: relative;
    z-index: 2;
}

.newsletter-info {
    color: white;
}

.newsletter-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.newsletter-subtitle {
    font-size: 1.1rem;
    line-height: 1.6;
    opacity: 0.9;
}

.newsletter-form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2rem;
}

.form-group-newsletter {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.newsletter-input {
    flex: 1;
    padding: 1rem 1.5rem;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.newsletter-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.newsletter-input:focus {
    outline: none;
    border-color: rgba(255, 255, 255, 0.6);
    background: rgba(255, 255, 255, 0.15);
}

.newsletter-btn {
    padding: 1rem 2rem;
    background: white;
    border: none;
    border-radius: 12px;
    color: #667eea;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.newsletter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
}

.newsletter-privacy {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
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
    .modern-blog-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
    
    .featured-post {
        grid-column: span 1;
    }
    
    .newsletter-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
    }
}

@media (max-width: 992px) {
    .blog-stats {
        gap: 2rem;
    }
    
    .stat-item-blog {
        padding: 1.25rem 1.5rem;
    }
    
    .blog-categories {
        gap: 0.75rem;
    }
    
    .category-item {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .modern-blog-hero {
        padding: 4rem 0 2rem;
        padding-top: 6rem;
    }
    
    .hero-title-blog {
        font-size: 2rem;
    }
    
    .hero-subtitle-blog {
        font-size: 1rem;
    }
    
    .blog-stats {
        flex-direction: column;
        gap: 1.5rem;
        align-items: center;
    }
    
    .stat-item-blog {
        max-width: 300px;
    }
    
    .modern-blog-container {
        padding: 4rem 0;
    }
    
    .blog-section-title {
        font-size: 2rem;
    }
    
    .blog-categories {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 1rem;
    }
    
    .modern-blog-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .blog-content-modern {
        padding: 1.5rem;
    }
    
    .blog-footer-modern {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .newsletter-section-modern {
        padding: 4rem 0;
    }
    
    .newsletter-title {
        font-size: 2rem;
    }
    
    .form-group-newsletter {
        flex-direction: column;
    }
    
    .newsletter-btn {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .blog-content-modern {
        padding: 1rem;
    }
    
    .blog-image-modern {
        height: 200px;
    }
    
    .newsletter-form {
        padding: 1.5rem;
    }
}
</style>
@endpush