<div class="header-for-navbar">
    {{-- Nav bar start --}}
     <nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <img src="{{ asset('image/Ryzurulogo.png') }}" alt="Ryzuru Tour Travel Logo" width="50" height="48" class="me-2">
                <a class="navbar-brand fs-3 fw-bold text-primary" href="{{ route('home') }}">{{config('app.name')}}</a>
            </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 ms-5">
              <li class="nav-item">
                <a class="nav-link fw-semibold {{ request()->is('/') ? 'active text-primary' : 'text-dark' }}" href="{{ route('home') }}">
                    <i class="fas fa-home me-1"></i>{{ __('navigation.home') }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold {{ request()->is('package*') ? 'active text-primary' : 'text-dark' }}" href="{{ route('user.travelPackage.show') }}">
                    <i class="fas fa-suitcase me-1"></i>{{ __('navigation.packages') }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold {{ request()->is('aboutUs') ? 'active text-primary' : 'text-dark' }}" href="{{ route('aboutUs') }}">
                    <i class="fas fa-info-circle me-1"></i>{{ __('navigation.about') }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold {{ request()->is('blog*') ? 'active text-primary' : 'text-dark' }}" href="{{ route('blog') }}">
                    <i class="fas fa-blog me-1"></i>{{ __('navigation.blog') }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold {{ request()->is('contactUs') ? 'active text-primary' : 'text-dark' }}" href="{{ route('contactUs') }}">
                    <i class="fas fa-phone me-1"></i>{{ __('navigation.contact') }}
                </a>
              </li>
            </ul>

            {{-- Language Switcher & Auth Links --}}
            <div class="d-flex align-items-center">
                {{-- Language Switcher --}}
                <x-language-switcher />
                
                @auth
                    {{-- User Dropdown --}}
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.Dashbord') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>{{ __('navigation.dashboard') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.Booking') }}">
                                    <i class="fas fa-calendar-check me-2"></i>{{ __('navigation.my_booking') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.Invoice') }}">
                                    <i class="fas fa-file-invoice me-2"></i>{{ __('navigation.invoices') }}
                                </a>
                            </li>
                            @if(Auth::user()->role === 'admin')
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-success" href="{{ route('admin.home') }}">
                                    <i class="fas fa-cog me-2"></i>{{ __('navigation.admin_panel') }}
                                </a>
                            </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>{{ __('navigation.logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- Guest Links --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                            <i class="fas fa-sign-in-alt me-1"></i>{{ __('navigation.login') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus me-1"></i>{{ __('navigation.register') }}
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
          </div>
        </div>
     </nav>
</div>

<style>
.navbar {
    padding: 1rem 0;
    transition: all 0.3s ease;
}

.navbar-brand {
    color: var(--primary-color) !important;
    text-decoration: none;
}

.nav-link {
    padding: 0.5rem 1rem !important;
    border-radius: 8px;
    transition: all 0.3s ease;
    margin: 0 0.2rem;
}

.nav-link:hover {
    background-color: rgba(102, 126, 234, 0.1);
    color: var(--primary-color) !important;
}

.nav-link.active {
    background-color: rgba(102, 126, 234, 0.1);
    color: var(--primary-color) !important;
}

.dropdown-toggle::after {
    margin-left: 0.5rem;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 10px;
    padding: 0.5rem 0;
}

.dropdown-item {
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background-color: rgba(102, 126, 234, 0.1);
    color: var(--primary-color);
}

.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    transform: translateY(-2px);
}

@media (max-width: 991px) {
    .navbar-nav {
        margin-top: 1rem;
    }
    
    .d-flex.gap-2 {
        margin-top: 1rem;
        justify-content: center;
    }
}
</style>
