<?php

use Inertia\Inertia;
use App\Models\Period;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ExamController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegistrarController;
use App\Http\Controllers\Admin\DataMasterController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\Period\PeriodController;
use App\Http\Controllers\Website\RegistrationController;
use App\Http\Controllers\Admin\FileSelection\RegistrarFileController;
use App\Http\Controllers\Admin\Period\QuestionController as PeriodQuestionController;
use App\Mail\Notification\FileSelection;
use Illuminate\Support\Facades\Mail;

Route::get('/question/create', function(){
    return view('admin.pages.periodsubject.question.create');
})->name('test.123');

Route::as('website.')->group(function () {
    // Route::get('/', function () {
    //     return view('website.pages.home.index');
    // })->name('home');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
    Route::prefix('period/{period}')->group(function () {

        Route::controller(NewsController::class)->prefix('news')->as('news.')->group(function () {

            Route::get('registration', 'open_for_selection')->middleware('news_open_for_registration')->name('open_for_selection');
            Route::get('file_selection', 'file_selection_over')->middleware('news_file_selection_is_over')->name('file_selection_over');
            Route::get('final_result', 'exam_selection_over')->middleware('news_exam_selection_is_over')->name('exam_selection_over');
        });
        Route::as('registration.')->middleware('is_period_active')->group(function () {
            Route::get('/registration', [RegistrationController::class, 'index'])->name('index');
            Route::post('/registration', [RegistrationController::class, 'store'])->name('store');
        });
    });

    // Route::as('register.')->prefix('register')->group(function () {
    //     // Route::get()
    // });

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
    Route::get('ujian-seleksi', [ExamController::class, 'index'])->name('exam.index');
    Route::get('ujian-seleksi/{subject}', [ExamController::class, 'exam'])->name('take.exam');
    Route::post('ujian-seleksi/{subject}/{question}', [ExamController::class, 'storeAnswer'])->name('take-exam.store');
});

Route::middleware(['auth', 'admin'])->as('admin.')->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('data-master')->as('data.master.')->group(function () {
        Route::controller(PeriodController::class)->as('period.')->group(function () {
            Route::post('period/{period}/subject', 'addSubject')->name('addSubject');
            Route::put('period/{period}/subject/{subject}', 'updateSubject')->name('updateSubject');

            Route::prefix('period/{period}/subject/{subject}')->as('subject.')->group(function () {
                Route::resource('question', PeriodQuestionController::class);
            });
        });
        Route::resource('registrar',        RegistrarController::class);
        Route::resource('period',           PeriodController::class);
        Route::resource('subject',          SubjectController::class)->only('index');
        // Route::resource('assistant',       AssitantController::class)->except('show');
        // Route::resource('archive',  ArchiveController::class)->only('index');
    });

    Route::prefix('schedule')->as('schedule.')->group(function () {
        // Ini cuma dipake sementara
        Route::get('recruitment',           [DataMasterController::class, 'index'])->name('recruitment');
    });

    Route::prefix('file-selection')->as('file.selection.')->group(function () {
        Route::resource('registrar-file',           RegistrarFileController::class)->parameters([
            'registrar-file' => 'psr'
        ]);
    });

    Route::get('users',     [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile',   [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile',   [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::view('about', 'about')->name('about');
});

Route::get('test-email', function () {
    $maildata['subject'] = 'Anda lulus ges';
    $maildata['body']   =  'Anda ganteng ges';
    $maildata['title']   =   'SI paluing ganteng';
    Mail::to('ackyrasibarani@gmail.com')->send(new FileSelection($maildata));
});


Route::get('/404', function () {
    return Inertia::render('NotFound');
})->name('notfound');

require __DIR__ . '/auth.php';
