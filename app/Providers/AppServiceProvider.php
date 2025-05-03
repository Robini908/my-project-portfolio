<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Register the LegalModals livewire component
        \Livewire\Livewire::component('legal-modals', \App\Livewire\LegalModals::class);

        // Register components
        Blade::component('speech-controls', \App\View\Components\SpeechControls::class);
        Blade::component('ai-features', \App\View\Components\AIFeatures::class);
    }
}
