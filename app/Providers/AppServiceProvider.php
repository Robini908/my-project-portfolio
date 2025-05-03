<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HandleMobileRequests;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (App::environment('production')) {
            URL::forceScheme('https');
        }

        // Register the mobile middleware globally
        Route::aliasMiddleware('mobile', HandleMobileRequests::class);
        // Apply the middleware to all web routes
        Route::pushMiddlewareToGroup('web', HandleMobileRequests::class);

        // Handle Vercel assets properly with absolute URLs
        if (App::environment('production') && isset($_SERVER['VERCEL_URL'])) {
            // Set the base URL for assets
            $this->app['config']->set('app.url', 'https://' . $_SERVER['VERCEL_URL']);
            $this->app['config']->set('app.asset_url', 'https://' . $_SERVER['VERCEL_URL']);
        }

        // Register the LegalModals livewire component
        \Livewire\Livewire::component('legal-modals', \App\Livewire\LegalModals::class);

        // Register components
        Blade::component('speech-controls', \App\View\Components\SpeechControls::class);
        Blade::component('ai-features', \App\View\Components\AIFeatures::class);
    }
}
