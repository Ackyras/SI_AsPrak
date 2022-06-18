<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataMasterController;
use App\Http\Controllers\User\UserDashboardController;


Route::get('/', function(){
    return view('home');
})->name('home');

Route::middleware(['auth', 'user'])->as('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->as('admin.')->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('data-master')->as('data.master.')->group(function () {
        Route::resource('period',        PeriodController::class)->except('show');
        // Route::resource('subjects',        SubjectController::class)->except('show');
        // Route::resource('witels',       AssitantController::class)->except('show');
        // Route::resource('permissions',  ArchiveController::class)->only('index');
    });

    Route::get('users',     [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile',   [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile',   [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::view('about', 'about')->name('about');
});

Route::get('/404', function () {
    return Inertia::render('NotFound');
})->name('notfound');

require __DIR__ . '/auth.php';
