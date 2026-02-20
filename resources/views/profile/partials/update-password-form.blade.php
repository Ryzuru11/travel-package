<!-- Dashboard Header -->
<div class="dashboard-header">
    <div class="header-content">
        <div class="header-title">
            <h1>Change Password</h1>
            <p>Update your password to keep your account secure</p>
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

<!-- Password Form Card -->
<div class="password-form-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-shield-alt"></i>
            Security Settings
        </h2>
        <p>Ensure your account is using a long, random password to stay secure</p>
    </div>
    
    <div class="card-content">
        <!-- Security Tips -->
        <div class="security-tips">
            <h3>
                <i class="fas fa-lightbulb"></i>
                Password Security Tips
            </h3>
            <ul class="tips-list">
                <li>
                    <i class="fas fa-check"></i>
                    Use at least 8 characters
                </li>
                <li>
                    <i class="fas fa-check"></i>
                    Include uppercase and lowercase letters
                </li>
                <li>
                    <i class="fas fa-check"></i>
                    Add numbers and special characters
                </li>
                <li>
                    <i class="fas fa-check"></i>
                    Avoid common words or personal information
                </li>
            </ul>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="password-form">
            @csrf
            @method('put')

            <div class="form-grid">
                <!-- Current Password -->
                <div class="form-group">
                    <label for="current_password" class="form-label">
                        <i class="fas fa-key"></i>
                        Current Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="current_password" 
                            name="current_password" 
                            type="password" 
                            class="form-input @error('current_password', 'updatePassword') error @enderror" 
                            autocomplete="current-password"
                            placeholder="Enter your current password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('current_password')">
                            <i class="fas fa-eye" id="current_password_icon"></i>
                        </button>
                        @error('current_password', 'updatePassword')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="new_password" class="form-label">
                        <i class="fas fa-lock"></i>
                        New Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="new_password" 
                            name="password" 
                            type="password" 
                            class="form-input @error('password', 'updatePassword') error @enderror" 
                            autocomplete="new-password"
                            placeholder="Enter your new password"
                            onkeyup="checkPasswordStrength(this.value)"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('new_password')">
                            <i class="fas fa-eye" id="new_password_icon"></i>
                        </button>
                        <div class="password-strength" id="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strength-fill"></div>
                            </div>
                            <span class="strength-text" id="strength-text">Password strength</span>
                        </div>
                        @error('password', 'updatePassword')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock"></i>
                        Confirm New Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            class="form-input @error('password_confirmation', 'updatePassword') error @enderror" 
                            autocomplete="new-password"
                            placeholder="Confirm your new password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye" id="password_confirmation_icon"></i>
                        </button>
                        @error('password_confirmation', 'updatePassword')
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
                    <i class="fas fa-shield-alt"></i>
                    Update Password
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

/* Password Form Card */
.password-form-card {
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

/* Security Tips */
.security-tips {
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    border: 1px solid #7dd3fc;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.security-tips h3 {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #0c4a6e;
    font-size: 1.125rem;
    font-weight: 600;
    margin: 0 0 1rem 0;
}

.security-tips h3 i {
    color: #0284c7;
}

.tips-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 0.75rem;
}

.tips-list li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #0c4a6e;
    font-size: 0.875rem;
}

.tips-list li i {
    color: #059669;
    font-size: 0.75rem;
}

/* Form Styles */
.password-form {
    max-width: none;
}

.form-grid {
    display: grid;
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
    padding: 1rem 3rem 1rem 1.25rem;
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

.password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

/* Password Strength */
.password-strength {
    margin-top: 0.75rem;
}

.strength-bar {
    width: 100%;
    height: 4px;
    background: #e5e7eb;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.strength-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-text {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
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
    
    .tips-list {
        grid-template-columns: 1fr;
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

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId + '_icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    const strengthFill = document.getElementById('strength-fill');
    const strengthText = document.getElementById('strength-text');
    
    let strength = 0;
    let text = 'Very Weak';
    let color = '#ef4444';
    
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    switch (strength) {
        case 0:
        case 1:
            text = 'Very Weak';
            color = '#ef4444';
            break;
        case 2:
            text = 'Weak';
            color = '#f59e0b';
            break;
        case 3:
            text = 'Fair';
            color = '#eab308';
            break;
        case 4:
            text = 'Good';
            color = '#22c55e';
            break;
        case 5:
            text = 'Strong';
            color = '#059669';
            break;
    }
    
    strengthFill.style.width = (strength * 20) + '%';
    strengthFill.style.background = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
}
</script>
