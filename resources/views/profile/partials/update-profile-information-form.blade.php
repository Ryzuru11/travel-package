<!-- Dashboard Header -->
<div class="dashboard-header">
    <div class="header-content">
        <div class="header-title">
            <h1>Edit Profile</h1>
            <p>Update your account information and personal details</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('profile.Dashbord') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Back to Dashboard
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if (session('status'))
<div class="success-alert">
    <div class="alert-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <div class="alert-content">
        <h4>Success!</h4>
        <p>{{ session('status') }}</p>
    </div>
    <button class="alert-close" onclick="this.parentElement.style.display='none'">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

<!-- Profile Form Card -->
<div class="profile-form-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-user-edit"></i>
            Personal Information
        </h2>
        <p>Keep your profile information up to date</p>
    </div>
    
    <div class="card-content">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="profile-form">
            @csrf
            @method('patch')

            <div class="form-grid">
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i>
                        Full Name
                    </label>
                    <div class="input-wrapper">
                        <input 
                            name="name" 
                            type="text" 
                            value="{{ old('name', $user->name) }}" 
                            class="form-input @error('name') error @enderror" 
                            id="name" 
                            required
                            placeholder="Enter your full name"
                        >
                        @error('name')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <div class="input-wrapper">
                        <input 
                            name="email" 
                            type="email" 
                            value="{{ old('email', $user->email) }}" 
                            class="form-input @error('email') error @enderror" 
                            id="email"
                            placeholder="Enter your email address"
                        >
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="verification-notice">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>Your email address is unverified.</span>
                                <button form="send-verification" type="submit" class="verify-btn">
                                    Resend Verification
                                </button>
                            </div>
                            @if (session('status') === 'verification-link-sent')
                                <div class="verification-sent">
                                    <i class="fas fa-check"></i>
                                    A new verification link has been sent to your email.
                                </div>
                            @endif
                        @else
                            <div class="verified-badge">
                                <i class="fas fa-check-circle"></i>
                                Verified
                            </div>
                        @endif
                        @error('email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Phone Number Field -->
                <div class="form-group">
                    <label for="phone_number" class="form-label">
                        <i class="fas fa-phone"></i>
                        Phone Number
                    </label>
                    <div class="input-wrapper">
                        <input 
                            name="phone_number" 
                            type="text" 
                            value="{{ old('phone_number', $user->phone_number) }}" 
                            class="form-input @error('phone_number') error @enderror" 
                            id="phone_number"
                            placeholder="Enter your phone number"
                        >
                        @error('phone_number')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Country Field -->
                <div class="form-group">
                    <label for="user_country" class="form-label">
                        <i class="fas fa-globe"></i>
                        Country
                    </label>
                    <div class="input-wrapper">
                        <input 
                            name="user_country" 
                            type="text" 
                            value="{{ old('user_country', $user->user_country) }}" 
                            class="form-input @error('user_country') error @enderror" 
                            id="user_country"
                            placeholder="Enter your country"
                        >
                        @error('user_country')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>
                <a href="{{ route('profile.Dashbord') }}" class="btn-cancel">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
            </div>
        </form>
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

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: #f3f4f6;
    color: #374151;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.btn-back:hover {
    background: #e5e7eb;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    color: #374151;
    text-decoration: none;
}

/* Success Alert */
.success-alert {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    border: 1px solid #86efac;
    border-radius: 12px;
    margin-bottom: 2rem;
    position: relative;
}

.alert-icon {
    color: #166534;
    font-size: 1.5rem;
}

.alert-content h4 {
    color: #166534;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
}

.alert-content p {
    color: #15803d;
    margin: 0;
}

.alert-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: none;
    border: none;
    color: #166534;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.alert-close:hover {
    background: rgba(22, 101, 52, 0.1);
}

/* Profile Form Card */
.profile-form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.card-header {
    padding: 2rem 2rem 1rem 2rem;
    border-bottom: 1px solid #f3f4f6;
}

.card-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-header h2 i {
    color: #667eea;
}

.card-header p {
    color: #6b7280;
    margin: 0;
}

.card-content {
    padding: 2rem;
}

/* Form Styles */
.profile-form {
    max-width: none;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.75rem;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-label i {
    color: #667eea;
    width: 16px;
}

.input-wrapper {
    position: relative;
}

.form-input {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.form-input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-input.error {
    border-color: #ef4444;
    background: #fef2f2;
}

.form-input.error:focus {
    border-color: #ef4444;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.verified-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #059669;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    font-weight: 500;
}

.verification-notice {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #d97706;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    padding: 0.75rem;
    background: #fef3c7;
    border-radius: 8px;
    border: 1px solid #fbbf24;
}

.verify-btn {
    background: #d97706;
    color: white;
    border: none;
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-left: auto;
}

.verify-btn:hover {
    background: #b45309;
}

.verification-sent {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #059669;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    padding: 0.75rem;
    background: #d1fae5;
    border-radius: 8px;
    border: 1px solid #34d399;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 2rem;
    border-top: 1px solid #f3f4f6;
}

.btn-save {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.btn-cancel {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 2rem;
    background: #f3f4f6;
    color: #374151;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.btn-cancel:hover {
    background: #e5e7eb;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    color: #374151;
    text-decoration: none;
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
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .form-actions {
        flex-direction: column-reverse;
    }
    
    .btn-save,
    .btn-cancel {
        justify-content: center;
    }
    
    .card-header,
    .card-content {
        padding: 1.5rem;
    }
}
</style>


