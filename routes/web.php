<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Portfolio routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
