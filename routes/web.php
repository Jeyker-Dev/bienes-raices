<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home.welcome');
})->name('home');

Route::get('/about-us', function () {
    return view('home.about-us');
})->name('about-us');

Route::get('/blog', function () {
    return view('home.blog');
})->name('blog');

Route::get('/announcements', function () {
    return view('home.announcements');
})->name('announcements');

Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'panel.dashboard')->name('dashboard');
    Route::view('houses', 'panel.houses')->name('houses');
    Route::view('sellers', 'panel.sellers')->name('sellers');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
