<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Detect locale with priority: URL parameter → session → default
            $locale = $this->detectLocale($request);
            
            // Validate and set locale
            $validatedLocale = $this->validateLocale($locale);
            
            // Set application locale
            App::setLocale($validatedLocale);
            
            // Update session if locale changed or not set
            $this->updateSession($request, $validatedLocale);
            
        } catch (\Exception $e) {
            // Error handling: log error and use default locale
            Log::error('SetLocale middleware error: ' . $e->getMessage());
            App::setLocale(config('app.locale', 'id'));
        }
        
        return $next($request);
    }
    
    /**
     * Detect locale from various sources with priority order
     */
    private function detectLocale(Request $request): string
    {
        // Priority 1: URL parameter (?lang=en or ?lang=id)
        if ($request->has('lang')) {
            return $request->get('lang');
        }
        
        // Priority 2: Session stored preference
        if ($request->hasSession() && $request->session()->has('locale')) {
            return $request->session()->get('locale');
        }
        
        // Priority 3: Default from configuration
        return config('app.locale', 'id');
    }
    
    /**
     * Validate locale code and return valid locale or default
     */
    private function validateLocale(string $locale): string
    {
        $availableLocales = ['id', 'en'];
        
        if (in_array($locale, $availableLocales)) {
            return $locale;
        }
        
        // Invalid locale: log warning and return default
        Log::warning("Invalid locale attempted: {$locale}. Using default.");
        return 'id'; // Default to Indonesian
    }
    
    /**
     * Update session with current locale preference
     */
    private function updateSession(Request $request, string $locale): void
    {
        if ($request->hasSession()) {
            $currentSessionLocale = $request->session()->get('locale');
            
            // Only update session if locale is different
            if ($currentSessionLocale !== $locale) {
                $request->session()->put('locale', $locale);
                Log::info("Language preference updated to: {$locale}");
            }
        }
    }
}