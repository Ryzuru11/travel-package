<!-- Dashboard Header -->
<div class="dashboard-header">
    <div class="header-content">
        <div class="header-title">
            <h1>My Profile</h1>
            <p>Manage your account information and preferences</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('profile.edit') }}" class="btn-edit-profile">
                <i class="fas fa-edit"></i>
                Edit Profile
            </a>
        </div>
    </div>
</div>

<!-- Profile Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-content">
            <h3>{{ Auth::user()->bookings->count() ?? 0 }}</h3>
            <p>Total Bookings</p>
        </div>
        <div class="stat-trend">
            <i class="fas fa-arrow-up"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="stat-content">
            <h3>{{ Auth::user()->bookings->where('status', 'completed')->count() ?? 0 }}</h3>
            <p>Completed Tours</p>
        </div>
        <div class="stat-trend">
            <i class="fas fa-check"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="stat-content">
            <h3>4.8</h3>
            <p>Average Rating</p>
        </div>
        <div class="stat-trend">
            <i class="fas fa-heart"></i>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3>{{ Auth::user()->bookings->where('status', 'pending')->count() ?? 0 }}</h3>
            <p>Pending Bookings</p>
        </div>
        <div class="stat-trend">
            <i class="fas fa-hourglass-half"></i>
        </div>
    </div>
</div>

<!-- Profile Information Card -->
<div class="profile-info-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-user-circle"></i>
            Personal Information
        </h2>
        <div class="card-actions">
            <button class="btn-icon" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
    </div>
    
    <div class="card-content">
        <div class="profile-fields">
            <div class="field-group">
                <div class="field-item">
                    <div class="field-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="field-content">
                        <label>Full Name</label>
                        <div class="field-value">{{ $user->name }}</div>
                    </div>
                </div>
                
                <div class="field-item">
                    <div class="field-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="field-content">
                        <label>Email Address</label>
                        <div class="field-value">{{ $user->email }}</div>
                        <div class="field-badge verified">
                            <i class="fas fa-check-circle"></i>
                            Verified
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="field-group">
                <div class="field-item">
                    <div class="field-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="field-content">
                        <label>Phone Number</label>
                        <div class="field-value">{{ $user->phone_number }}</div>
                    </div>
                </div>
                
                <div class="field-item">
                    <div class="field-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="field-content">
                        <label>Country</label>
                        <div class="field-value">{{ $user->user_country }}</div>
                        <div class="country-flag">🇮🇩</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h3>Quick Actions</h3>
    <div class="actions-grid">
        <a href="{{ route('user.travelPackage.show') }}" class="action-card">
            <div class="action-icon">
                <i class="fas fa-search"></i>
            </div>
            <div class="action-content">
                <h4>Browse Tours</h4>
                <p>Discover amazing destinations</p>
            </div>
            <div class="action-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        
        <a href="{{ route('profile.Booking') }}" class="action-card">
            <div class="action-icon">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="action-content">
                <h4>My Bookings</h4>
                <p>View your travel history</p>
            </div>
            <div class="action-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        
        <a href="{{ route('profile.Invoice') }}" class="action-card">
            <div class="action-icon">
                <i class="fas fa-receipt"></i>
            </div>
            <div class="action-content">
                <h4>Invoices</h4>
                <p>Manage your payments</p>
            </div>
            <div class="action-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
    </div>
</div>

<style>
/* Dashboard Header */
.dashboard-header {
    margin-bottom: 2rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 2rem;
}

.header-title h1 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 0.5rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header-title p {
    color: #6b7280;
    font-size: 1.125rem;
    margin: 0;
}

.btn-edit-profile {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-edit-profile:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.stat-content h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

.stat-content p {
    color: #6b7280;
    margin: 0.25rem 0 0 0;
    font-weight: 500;
}

.stat-trend {
    margin-left: auto;
    color: #10b981;
    font-size: 1.25rem;
}

/* Profile Info Card */
.profile-info-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
    overflow: hidden;
}

.card-header {
    padding: 2rem 2rem 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f3f4f6;
}

.card-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-header h2 i {
    color: #667eea;
}

.btn-icon {
    width: 40px;
    height: 40px;
    border: none;
    background: #f3f4f6;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6b7280;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-icon:hover {
    background: #667eea;
    color: white;
    transform: rotate(180deg);
}

.card-content {
    padding: 2rem;
}

.profile-fields {
    display: grid;
    gap: 2rem;
}

.field-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.field-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: #f9fafb;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    transition: all 0.3s ease;
}

.field-item:hover {
    background: #f3f4f6;
    border-color: #667eea;
}

.field-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.field-content {
    flex: 1;
    position: relative;
}

.field-content label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
    display: block;
}

.field-value {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.field-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.field-badge.verified {
    background: #dcfce7;
    color: #166534;
}

.country-flag {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 1.5rem;
}

/* Quick Actions */
.quick-actions {
    margin-top: 2rem;
}

.quick-actions h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 1.5rem;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.action-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
    transition: left 0.5s;
}

.action-card:hover::before {
    left: 100%;
}

.action-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: inherit;
}

.action-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.action-content h4 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.25rem 0;
}

.action-content p {
    color: #6b7280;
    margin: 0;
    font-size: 0.875rem;
}

.action-arrow {
    margin-left: auto;
    color: #6b7280;
    transition: all 0.3s ease;
}

.action-card:hover .action-arrow {
    color: #667eea;
    transform: translateX(4px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .header-title h1 {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .stat-card {
        padding: 1rem;
    }
    
    .field-group {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .actions-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .card-header,
    .card-content {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    .header-title h1 {
        font-size: 1.75rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .field-item {
        padding: 1rem;
    }
    
    .action-card {
        padding: 1rem;
    }
}
</style>
