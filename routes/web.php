<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::group(['prefix' => 'employees', 'as' => 'employees.'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        // Route::get('/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('create');
        // Route::post('/', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('store');
        // Route::get('/{employee}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('edit');
        // Route::put('/{employee}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('update');
        // Route::delete('/{employee}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
