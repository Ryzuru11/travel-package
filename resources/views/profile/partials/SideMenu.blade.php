<div class="modern-sidebar">
    <!-- User Avatar Section -->
    <div class="user-avatar-section">
        <div class="avatar-container">
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-status-indicator"></div>
        </div>
        <div class="user-info">
            <h3 class="user-name">{{ Auth::user()->name }}</h3>
            <p class="user-role">Traveler</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav">
        <div class="nav-section">
            <h4 class="nav-section-title">
                <i class="fas fa-user-circle"></i>
                My Account
            </h4>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('profile.Dashbord') }}" class="nav-link {{ request()->is('profile/Dashbord') ? 'active' : '' }}">
                        <div class="nav-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <span>Dashboard</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->is('profile/Edit') ? 'active' : '' }}">
                        <div class="nav-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <span>Edit Profile</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.profileChangePassword') }}" class="nav-link {{ request()->is('profile/Edit/password') ? 'active' : '' }}">
                        <div class="nav-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <span>Change Password</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <h4 class="nav-section-title">
                <i class="fas fa-suitcase"></i>
                Tour Booking
            </h4>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('profile.Booking') }}" class="nav-link {{ request()->is('profile/Booking') ? 'active' : '' }}">
                        <div class="nav-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <span>My Booking</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.Invoice') }}" class="nav-link {{ request()->is('profile/invoice') ? 'active' : '' }}">
                        <div class="nav-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <span>Invoices</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Help Section -->
    <div class="help-section">
        <div class="help-card">
            <div class="help-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h5>Need Help?</h5>
            <p>Contact our support team</p>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+6281917166060</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>hilmansatiapebrian9715@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modern-sidebar {
    background: linear-gradient(145deg, #1e3c72 0%, #2a5298 100%);
    border-radius: 24px;
    padding: 2rem;
    color: white;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    position: relative;
    overflow: hidden;
    width: 100%;
    min-width: 260px;
}

.modern-sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

/* User Avatar Section */
.user-avatar-section {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}

.avatar-container {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.user-avatar {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    border: 3px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.user-avatar:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.user-status-indicator {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 16px;
    height: 16px;
    background: #4ade80;
    border-radius: 50%;
    border: 3px solid white;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(74, 222, 128, 0); }
    100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0); }
}

.user-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0;
    color: white;
}

.user-role {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
    margin: 0.25rem 0 0 0;
}

/* Navigation */
.sidebar-nav {
    margin-bottom: 2rem;
}

.nav-section {
    margin-bottom: 2rem;
}

.nav-section-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin-bottom: 0.5rem;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    white-space: nowrap;
    min-height: 48px;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.nav-link:hover::before {
    left: 100%;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(4px);
}

.nav-link.active {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
    color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.nav-icon {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    font-size: 1rem;
    flex-shrink: 0;
}

.nav-link span {
    flex: 1;
    font-size: 0.95rem;
    font-weight: 500;
}

.nav-indicator {
    width: 4px;
    height: 4px;
    background: #4ade80;
    border-radius: 50%;
    margin-left: auto;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.nav-link.active .nav-indicator {
    opacity: 1;
}

/* Help Section */
.help-section {
    margin-top: auto;
}

.help-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.help-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #4ade80, #22c55e);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.25rem;
    color: white;
}

.help-card h5 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: white;
}

.help-card p {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 1rem;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.8);
}

.contact-item i {
    width: 16px;
    text-align: center;
}

/* Responsive */
@media (max-width: 768px) {
    .modern-sidebar {
        padding: 1.5rem;
        min-width: auto;
    }
    
    .user-avatar {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .nav-link {
        padding: 0.75rem;
    }
    
    .help-card {
        padding: 1rem;
    }
}

@media (min-width: 769px) and (max-width: 991px) {
    .modern-sidebar {
        padding: 1.75rem;
        min-width: 250px;
    }
}

@media (min-width: 992px) {
    .modern-sidebar {
        min-width: 260px;
    }
    
    .nav-section-title {
        font-size: 0.8rem;
    }
    
    .nav-link span {
        font-size: 0.9rem;
    }
}
</style>