<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResumeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Portfolio routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// Resume routes
Route::get('/resume', [ResumeController::class, 'show'])->name('resume.show');
Route::get('/resume/download/{format?}', [ResumeController::class, 'download'])->name('resume.download');
