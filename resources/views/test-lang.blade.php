<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Test - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Language Test Page</h3>
                        <x-language-switcher />
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Current Language:</strong> {{ app()->getLocale() }} 
                            ({{ app()->getLocale() == 'id' ? 'Indonesian' : 'English' }})
                        </div>
                        
                        <h4>{{ __('messages.hero_title', ['destination' => 'Lombok & Komodo']) }}</h4>
                        <p>{{ __('messages.hero_subtitle') }}</p>
                        
                        <h5>{{ __('messages.our_services') }}</h5>
                        <ul>
                            <li>{{ __('messages.hotel_pickup') }}</li>
                            <li>{{ __('messages.airport_transfer') }}</li>
                            <li>{{ __('messages.komodo_tour') }}</li>
                            <li>{{ __('messages.lombok_destinations') }}</li>
                        </ul>
                        
                        <h5>Navigation Items:</h5>
                        <ul>
                            <li>{{ __('navigation.home') }}</li>
                            <li>{{ __('navigation.packages') }}</li>
                            <li>{{ __('navigation.about') }}</li>
                            <li>{{ __('navigation.blog') }}</li>
                            <li>{{ __('navigation.contact') }}</li>
                        </ul>
                        
                        <div class="mt-4">
                            <a href="{{ route('lang.switch', 'id') }}" class="btn btn-primary me-2">
                                <i class="fas fa-flag"></i> Switch to Indonesian
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" class="btn btn-success me-2">
                                <i class="fas fa-flag"></i> Switch to English
                            </a>
                            <a href="/debug-lang" class="btn btn-info" target="_blank">
                                <i class="fas fa-bug"></i> Debug Info
                            </a>
                        </div>
                        
                        <div class="mt-4">
                            <small class="text-muted">
                                Session ID: {{ session()->getId() }}<br>
                                Session Locale: {{ session('locale', 'not set') }}<br>
                                App Locale: {{ app()->getLocale() }}<br>
                                Config Locale: {{ config('app.locale') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>