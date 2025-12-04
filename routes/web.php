<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('phase')->name('phase.')->group(function () {
        Route::prefix('action')->name('action.')->group(function () {
            Volt::route('index', 'phase.action.index')->name('index');
        });
        Route::prefix('agenda')->name('agenda.')->group(function () {
            Volt::route('index', 'phase.agenda.index')->name('index');
        });
        Route::prefix('status')->name('status.')->group(function () {
            Volt::route('index', 'phase.status.index')->name('index');
        });
        Route::prefix('strategy')->name('strategy.')->group(function () {
            Volt::route('index', 'phase.strategy.index')->name('index');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
