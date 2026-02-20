<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dilaga Tour') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/navBar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/dilaga-tour.css') }}">

    @stack('styles')
</head>
<body>
    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Floating WhatsApp Button --}}
    <div class="floating-whatsapp">
        <a href="https://wa.me/6281917166060" target="_blank" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i>
            <span class="whatsapp-tooltip">{{ __('messages.chat_with_us') }}</span>
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/webShare.js') }}" defer></script>
    
    @stack('scripts')
</body>
</html>