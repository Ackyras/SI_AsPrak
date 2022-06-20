<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataMasterController;
use App\Http\Controllers\User\UserDashboardController;
use App\Models\Period;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::as('website')->group(function () {
    // Tampilan jika seleksi belum dibuka
    // Route::group(function () {
    // });

    // // Tampilan jika seleksi dibuka
    // Route::middleware(['is_selection_open'])->group(function () {
    // });

    // // Tampilan jika lulus seleksi berkas
    // Route::middleware(['is_pass_file_selection'])->group(function () {
    // });

    // // Tampilan ketika tes
    // Route::middleware(['is_eligible_for_exam'])->group(function () {
    // });
});

Route::middleware(['auth', 'user'])->as('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->as('admin.')->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('data-master')->as('data.master.')->group(function () {
        Route::controller(Period::class)->as('period.')->group(function () {
            Route::post('period/{period}/subject', 'addSubject')->name('addSubjcet');
            Route::put('period/{period}/subject/{subject}', 'updateSubject')->name('updateSubject');
        });
        Route::resource('period',        PeriodController::class);
        Route::resource('subject',        SubjectController::class)->only('index');
        // Route::resource('assistant',       AssitantController::class)->except('show');
        // Route::resource('archive',  ArchiveController::class)->only('index');
    });

    Route::prefix('schedule')->as('schedule.')->group(function () {
        // Ini cuma dipake sementara
        Route::get('recruitment',           [DataMasterController::class, 'index'])->name('recruitment');
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
