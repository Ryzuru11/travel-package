@extends('layouts/mainStructure')

@section('content')
<div class="modern-dashboard-container">
    <div class="dashboard-sidebar">
        @include('profile.partials.sideMenu')
    </div>  
    <div class="dashboard-main-content">
        @include('profile.partials.update-password-form')
    </div>
</div>

@push('styles')
<style>
.modern-dashboard-container {
    display: flex;
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 0;
    margin: 0;
    gap: 2rem;
    padding: 2rem;
}

.dashboard-sidebar {
    flex: 0 0 320px;
    position: sticky;
    top: 2rem;
    height: fit-content;
}

.dashboard-main-content {
    flex: 1;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 24px;
    padding: 2rem;
    backdrop-filter: blur(20px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

@media (max-width: 1024px) {
    .modern-dashboard-container {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
    }
    
    .dashboard-sidebar {
        flex: none;
        position: static;
    }
    
    .dashboard-main-content {
        padding: 1.5rem;
    }
}
</style>
@endpush
    
@endsection