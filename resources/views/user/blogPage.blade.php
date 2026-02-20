{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

<div class="container mb-5"> 
      <div class="d-flex align-items-center mb-4">
        {{-- back to blog btn --}}
        <a href="{{ route('blog') }}" class="me-3">
          <img src="{{ asset('image/help-tools/back.png') }}" width="40px" alt="back" class="hover-effect">
        </a>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog->title, 50) }}</li>
          </ol>
        </nav>
      </div>
    
    {{-- blog header --}}
    <div class="blog-header text-center mb-5">
      <h1 class="blog-title">{{ $blog->title}}</h1>
      <div class="blog-meta">
        <span class="blog-date">
          <i class="fas fa-calendar-alt me-2"></i>
          {{ \carbon\carbon::parse($blog->created_at)->format('d M, Y') }}
        </span>
        <span class="blog-reading-time ms-3">
          <i class="fas fa-clock me-2"></i>
          {{ ceil(str_word_count(strip_tags($blog->discription)) / 200) }} min read
        </span>
      </div>
    </div>

    {{-- blog content --}}
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <article class="blog-article">
          {{-- featured image --}}
          <div class="blog-featured-image mb-4">
            @if ($blog->image != "")
              <img src="{{ asset('image/uploads/blog/'.$blog->image) }}" 
                   class="img-fluid rounded shadow" 
                   alt="{{ $blog->title }}" 
                   style="width: 100%; height: 400px; object-fit: cover;">
            @else
              <img src="{{ asset('image/uploads/blog/empty-image.png') }}" 
                   class="img-fluid rounded shadow" 
                   alt="{{ $blog->title }}"
                   style="width: 100%; height: 400px; object-fit: cover;">
            @endif
          </div>
          
          {{-- blog content --}}
          <div class="blog-content">
            {!! $blog->discription !!}
          </div>
          
          {{-- social share --}}
          <div class="blog-share mt-5 pt-4 border-top">
            <h5 class="mb-3">Bagikan Artikel Ini:</h5>
            <div class="share-buttons">
              <a href="https://wa.me/?text=Check out this article: {{ urlencode($blog->title) }} {{ url()->current() }}" 
                 target="_blank" class="btn btn-success btn-sm me-2">
                <i class="fab fa-whatsapp me-1"></i> WhatsApp
              </a>
              <a href="https://www.instagram.com/" 
                 target="_blank" class="btn btn-gradient btn-sm me-2">
                <i class="fab fa-instagram me-1"></i> Instagram
              </a>
              <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ url()->current() }}" 
                 target="_blank" class="btn btn-dark btn-sm me-2">
                <i class="fas fa-times me-1"></i> X
              </a>
            </div>
          </div>
          
          {{-- call to action --}}
          <div class="blog-cta mt-5 p-4 bg-light rounded">
            <div class="text-center">
              <h4 class="mb-3">Tertarik dengan Paket Tour Kami?</h4>
              <p class="mb-3">Hubungi Ryzuru Tour Travel sekarang dan wujudkan petualangan impian Anda!</p>
              <div class="cta-buttons">
                <a href="https://wa.me/6281917166060" target="_blank" class="btn btn-success me-2">
                  <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                </a>
                <a href="{{ route('user.travelPackage.show') }}" class="btn btn-primary">
                  <i class="fas fa-eye me-2"></i>Lihat Paket Tour
                </a>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Blog Page Styles */
.hover-effect {
    transition: transform 0.3s ease;
}

.hover-effect:hover {
    transform: scale(1.1);
}

.blog-header {
    padding: 2rem 0;
}

.blog-title {
    color: #2c3e50;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 1rem;
}

.blog-meta {
    color: #7f8c8d;
    font-size: 0.95rem;
}

.blog-meta i {
    color: #667eea;
}

.blog-featured-image {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
}

.blog-article {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #2c3e50;
}

/* Enhanced Blog Content Styles */
.blog-content {
    font-family: 'Georgia', serif;
}

.blog-content h3 {
    color: #2c3e50;
    font-weight: 600;
    margin: 2rem 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #667eea;
}

.blog-content h4 {
    color: #34495e;
    font-weight: 600;
    margin: 1.5rem 0 1rem 0;
}

.blog-content h5 {
    color: #34495e;
    font-weight: 600;
    margin: 1rem 0 0.5rem 0;
}

.blog-content p {
    margin-bottom: 1.2rem;
    text-align: justify;
}

.blog-content .lead {
    font-size: 1.3rem;
    font-weight: 400;
    color: #667eea;
    background: linear-gradient(135deg, #f8f9ff 0%, #e3f2fd 100%);
    padding: 1.5rem;
    border-radius: 10px;
    border-left: 4px solid #667eea;
    margin: 2rem 0;
}

.highlight-box {
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f5e8 100%);
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
    border: 1px solid #e9ecef;
}

.package-info {
    background: linear-gradient(135deg, #fff3e0 0%, #f3e5f5 100%);
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
    border-left: 4px solid #ff9800;
}

.tips-section {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
    margin: 2rem 0;
}

.tip-item {
    background: white;
    padding: 1rem;
    margin: 0.5rem 0;
    border-radius: 8px;
    border-left: 3px solid #28a745;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
    text-align: center;
}

.custom-list {
    list-style: none;
    padding-left: 0;
}

.custom-list li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #e9ecef;
}

.custom-list li:last-child {
    border-bottom: none;
}

/* Food & Beach Items */
.food-item, .beach-item {
    background: white;
    padding: 1.5rem;
    margin: 1rem 0;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-left: 4px solid #ff6b6b;
}

.beach-item {
    border-left-color: #4ecdc4;
}

.food-content, .beach-content {
    margin-top: 1rem;
}

.highlight {
    background: #fff3cd;
    color: #856404;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
    margin-top: 0.5rem;
}

.food-tip {
    background: #d1ecf1;
    color: #0c5460;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
    margin-top: 0.5rem;
}

/* Activity & Drink Grids */
.activity-grid, .drink-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.activity-item, .drink-item {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    text-align: center;
    border-top: 3px solid #667eea;
}

.level-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin: 1.5rem 0;
}

.level-item {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-top: 3px solid #28a745;
}

/* Share Buttons */
.blog-share {
    text-align: center;
}

.share-buttons .btn {
    margin: 0.25rem;
    border-radius: 25px;
    padding: 0.5rem 1rem;
}

.btn-gradient {
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    color: white;
    border: none;
}

.btn-gradient:hover {
    background: linear-gradient(45deg, #e6683c 0%,#dc2743 25%,#cc2366 50%,#bc1888 75%,#8b0000 100%);
    color: white;
    transform: translateY(-2px);
}

.btn-dark {
    background-color: #000000;
    border-color: #000000;
    color: white;
}

.btn-dark:hover {
    background-color: #333333;
    border-color: #333333;
    color: white;
    transform: translateY(-2px);
}

/* CTA Section */
.blog-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.blog-cta h4 {
    color: white;
}

.cta-buttons .btn {
    margin: 0.5rem;
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
    .blog-title {
        font-size: 1.8rem;
    }
    
    .blog-content {
        font-size: 1rem;
    }
    
    .activity-grid, .drink-grid {
        grid-template-columns: 1fr;
    }
    
    .level-info {
        grid-template-columns: 1fr;
    }
    
    .highlight-box, .package-info, .tips-section, .cta-section {
        padding: 1rem;
    }
}
</style>
@endpush