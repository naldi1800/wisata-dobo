<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::prefix('public')->name('public.')->group(function () {
    Route::get('/', \App\Livewire\Public\Home\Index::class)->name('home');
    Route::get('/destinations', \App\Livewire\Public\Destinations\Index::class)->name('destinations');
    Route::get('/destinations/{beach:slug}', \App\Livewire\Public\Destinations\Show::class)->name('destinations.show');
    Route::get('/recommendations', \App\Livewire\Public\Recommendations\Index::class)->name('recommendations');
    Route::get('/hotels', \App\Livewire\Public\Hotels\Index::class)->name('hotels');
    Route::get('/hotels/{hotel:slug}', \App\Livewire\Public\Hotels\Show::class)->name('hotels.show');
    Route::get('/cafes', \App\Livewire\Public\Cafes\Index::class)->name('cafes');
    Route::get('/cafes/{cafe:slug}', \App\Livewire\Public\Cafes\Show::class)->name('cafes.show');
    Route::get('/about', \App\Livewire\Public\About\Index::class)->name('about');
});

// Root route - redirect based on auth status
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('public.home');
});

// Admin route - redirect to login
Route::get('/admin', function () {
    return redirect()->route('login');
})->name('admin');

// Admin Routes (requires auth)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Beach CRUD Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('beaches')->name('beaches.')->group(function () {
            Route::get('/', \App\Livewire\Admin\Beach\Index::class)->name('index');
            Route::get('/create', \App\Livewire\Admin\Beach\Form::class)->name('create');
            Route::get('/{beach}/edit', \App\Livewire\Admin\Beach\Form::class)->name('edit');
        });

        // Hotel CRUD Routes
        Route::prefix('hotels')->name('hotels.')->group(function () {
            Route::get('/', \App\Livewire\Admin\Hotel\Index::class)->name('index');
            Route::get('/create', \App\Livewire\Admin\Hotel\Form::class)->name('create');
            Route::get('/{hotel}/edit', \App\Livewire\Admin\Hotel\Form::class)->name('edit');
        });

        // Cafe CRUD Routes
        Route::prefix('cafes')->name('cafes.')->group(function () {
            Route::get('/', \App\Livewire\Admin\Cafe\Index::class)->name('index');
            Route::get('/create', \App\Livewire\Admin\Cafe\Form::class)->name('create');
            Route::get('/{cafe}/edit', \App\Livewire\Admin\Cafe\Form::class)->name('edit');
        });

        // SAW Recommendation Route
        Route::prefix('recommendations')->name('recommendations.')->group(function () {
            Route::get('/', \App\Livewire\Admin\Recommendation\Index::class)->name('index');
        });
    });
});

require __DIR__.'/settings.php';
