<div class="language-switcher">
    <div class="dropdown">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" 
                type="button" 
                id="languageDropdown" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
                aria-label="Select Language">
            @if(app()->getLocale() == 'id')
                <i class="fas fa-flag me-1"></i> ID
            @else
                <i class="fas fa-flag me-1"></i> EN
            @endif
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
            <li>
                <a class="dropdown-item {{ app()->getLocale() == 'id' ? 'active' : '' }}" 
                   href="{{ route('lang.switch', 'id') }}"
                   aria-label="Switch to Indonesian">
                    <i class="fas fa-flag me-2"></i> Bahasa Indonesia
                    @if(app()->getLocale() == 'id')
                        <i class="fas fa-check ms-auto text-success"></i>
                    @endif
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" 
                   href="{{ route('lang.switch', 'en') }}"
                   aria-label="Switch to English">
                    <i class="fas fa-flag me-2"></i> English
                    @if(app()->getLocale() == 'en')
                        <i class="fas fa-check ms-auto text-success"></i>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
.language-switcher {
    margin-right: 1rem;
}

.language-switcher .btn {
    border-color: #6c757d;
    color: #6c757d;
    font-size: 0.875rem;
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.language-switcher .btn:hover {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
    transform: translateY(-1px);
}

.language-switcher .dropdown-menu {
    min-width: 180px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 0.5rem 0;
}

.language-switcher .dropdown-item {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.language-switcher .dropdown-item:hover {
    background-color: rgba(102, 126, 234, 0.1);
    color: var(--primary-color);
}

.language-switcher .dropdown-item.active {
    background-color: var(--primary-color);
    color: white;
}

.language-switcher .dropdown-item.active:hover {
    background-color: var(--secondary-color);
}
</style>