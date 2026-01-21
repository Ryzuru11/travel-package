{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts.guest')

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                {{-- <img src="{{ asset('image/logo.png') }}" alt="logo" width="70" height="64">
                <h1>SriLankaTours</h1> --}}
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @yield('content')
        </div>

        <!-- Tambahkan menu admin di sini -->
        @if(Auth::check())
            <div class="mt-4 text-center">
                <a href="{{ route('profile.Booking') }}" class="text-sm text-gray-700 underline">My Booking</a>
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.home') }}" class="ml-4 text-sm text-gray-700 underline">Admin Dashboard</a>
                @endif
            </div>
        @endif
    </div>
@endsection