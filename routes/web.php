<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Mail\Notification\FileSelection;
use App\Http\Controllers\User\ExamController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegistrarController;
use App\Http\Controllers\Admin\DataMasterController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\Period\PeriodController;
use App\Http\Controllers\Website\RegistrationController;
use App\Http\Controllers\Admin\DataMaster\RoomController;
use App\Http\Controllers\Admin\ActivePeriod\QuestionController;
use App\Http\Controllers\Admin\ActivePeriod\PeriodController as ActivePeriod;
use App\Http\Controllers\Admin\ActivePeriod\ExamSelectionController as PeriodExamSelection;
use App\Http\Controllers\Admin\ActivePeriod\FileSelectionController as PeriodFileSelection;
use App\Http\Controllers\Admin\ActivePeriod\PeriodSubjectController as ActivePeriodSubject;
use App\Http\Controllers\Admin\ActivePeriod\PeriodSubjectRegistrarController as ActivePeriodRegistrar;
use App\Http\Controllers\Admin\Practicum\LabAssistantController;
use App\Http\Controllers\Admin\Practicum\QRCodeController;
use App\Http\Controllers\Admin\Practicum\ScheduleController;
use App\Http\Controllers\User\PresenceController as UserPresenceController;
use App\Http\Controllers\User\SalaryController;
use App\Mail\ExamSelectionNotification;
use App\Mail\FileSelectionNotification;
use Illuminate\Http\Request;

// Route::post('/schedule', function (Request $request) {
//     dd($request);
// })->name('test-post');

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
        Route::as('registration.')->middleware(['is_period_active', 'is_selection_open'])->group(function () {
            Route::get('/registration', [RegistrationController::class, 'index'])->name('index');
            Route::post('/registration', [RegistrationController::class, 'store'])->name('store');
        });
    });
});

Route::middleware(['auth', 'user_is_active', 'user'])->prefix('user')->as('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('ujian-seleksi', [ExamController::class, 'index'])->name('exam.index');
    Route::middleware(['is_eligible_for_exam', 'is_exam_in_progress'])->group(function () {
        Route::get('ujian-seleksi/{period_subject}', [ExamController::class, 'exam'])->name('take.exam');
        Route::post('ujian-seleksi/{period_subject}/{question}', [ExamController::class, 'storeAnswer'])->name('take-exam.store');
        Route::post('ujian-seleksi/{period_subject}', [ExamController::class, 'storeAll'])->name('take-exam.store-all');
    });

    Route::middleware(['asprak'])->group(function () {
        Route::controller(UserDashboardController::class)
            // ->middleware(['is_open_for_schedule_submission'])
            ->group(function () {
                Route::get('schedule', 'scheduleIndex')->name('schedule');
                Route::post('/schedule', 'scheduleStore')->name('schedule.store');
                Route::post('/schedule-destroy', 'scheduleDestroy')->name('schedule.destroy');
            });

        Route::controller(SalaryController::class)->prefix('salary')->as('salary.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        Route::controller(UserPresenceController::class)->prefix('presence')->as('presence.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('presence', 'store')->name('store');
        });
    });
});

Route::middleware(['auth', 'user_is_active', 'admin'])->as('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::put('period/{period}/update-status', [PeriodController::class, 'updatePeriodStatus'])->name('period.update-status');

    Route::middleware(['is_active_period_exist'])->as('active-period.')->group(function () {
        Route::as('data.')->group(function () {
            // ACTIVE PERIOD
            Route::controller(ActivePeriod::class)->group(function () {
                Route::get('/period-detail', 'index')->name('period');
            });
            // ACTIVE PERIOD SUBJECT
            Route::controller(ActivePeriodSubject::class)->group(function () {
                Route::get('period-subject', 'index')
                    ->name('period-subject');
                Route::post('period-subject/{period}', 'addSubject')
                    ->name('add-period-subject');
                Route::put('period-subject/{period}/subject/{subject}', 'updateSubject')
                    ->name('update-period-subject');
                Route::delete('period-subject/{period_subject}', 'deleteSubject')
                    ->name('delete-period-subject');
            });
            // ACTIVE PERIOD SUBJECT REGISTRAR
            Route::controller(ActivePeriodRegistrar::class)->group(function () {
                Route::get('/period-subject-registrar', 'index')->name('period-subject-registrar');
            });
        });
        // ACTIVE PERIOD FILE SELECTION
        Route::controller(PeriodFileSelection::class)->prefix('file-selection')->as('file-selection.')->group(function () {
            Route::get('/registrar-file', 'index')->name('registrar-file');
            Route::put('/registrar-file/{psr}', 'updateFileSelection')->name('registrar-file.update');
            Route::get('/pass-selection-registrar', 'passSelection')->name('pass-selection-registrar');
            Route::post('/announce-passed-file-selection-registrar', 'announceFileSelectionResult')->name('pass-selection-registrar.announce');
        });

        // ACTIVE PERIOD EXAM SELECTION
        Route::prefix('exam-selection')->as('exam-selection.')->group(function () {
            Route::get('/question', [PeriodExamSelection::class, 'index'])->name('question');
            Route::prefix('subject/{period_subject}')->as('subject.')->group(function () {
                Route::resource('question', QuestionController::class);
            });
            Route::get('/exam-data', [PeriodExamSelection::class, 'examData'])->name('exam-data');
            Route::get('/exam-data/subject/{period_subject}', [PeriodExamSelection::class, 'examDataDetail'])->name('exam-data-detail');
            Route::get('/exam-data/subject/{period_subject}/registrar/{psr}', [PeriodExamSelection::class, 'registrarExamData'])->name('registrar-exam-data');
            Route::post('/exam-data/subject/{period_subject}/registrar/{psr}', [PeriodExamSelection::class, 'updateExamSelection'])->name('registrar.update-status');
            Route::post('/exam-data/subject/{period_subject}/registrar/{psr}/{answer}', [PeriodExamSelection::class, 'updateAnswerScore'])->name('registrar.update-score');
            Route::get('/pass-selection-registrar', [PeriodExamSelection::class, 'passSelection'])->name('pass-selection-registrar');
            Route::post('/pass-selection-registrar', [PeriodExamSelection::class, 'announceExamSelectionResult'])->name('pass-selection-registrar.announce');
        });
    });

    Route::prefix('data-master')->as('data-master.')->group(function () {
        Route::resource('registrar',        RegistrarController::class);
        Route::resource('period',           PeriodController::class);
        Route::get(
            'period/{period}/subject/{period_subject}/assistant',
            [PeriodController::class, 'showAssistant']
        )
            ->name('show-assistant');
        Route::resource('subject',          SubjectController::class);
        Route::resource('room',             RoomController::class);
    });
    Route::as('practicum.')->group(function () {
        Route::controller(ScheduleController::class)->prefix('schedule')->as('schedule.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/{classroom}', 'store')->name('store');
            Route::put('/{schedule}', 'update')->name('update');
        });
        Route::controller(QRCodeController::class)->as('qr.')->prefix('qr')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{qr}', 'changeStatus')->name('change-status');
            Route::get('/{classroom}', 'show')->name('show');
            // Route::resource('qr', QRCodeController::class)->except('show');
        });
    });
    Route::as('assistant.')->prefix('lab-assistant')->group(function () {
        Route::controller(LabAssistantController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('presence', 'presenceIndex')->name('presence-index');
            Route::get('presence/subject/{period_subject}', 'presenceShow')->name('presence-show');
            Route::get('presence/subject/{period_subject}/class/{classroom}', 'presenceShowAssistant')->name('presence-show-assistant');
            Route::post('presence/update-status', 'presenceUpdate')->name('presence-update-status');
            Route::get('salary', 'salaryIndex')->name('salary-index');
            Route::post('salary/{registrar}', 'salaryPost')->name('salary-post');
        });
        Route::controller(ScheduleController::class)->as('schedule.')->group(function () {
            Route::get('/schedule', 'assistantSchedule')->name('index');
            Route::post('/schedule', 'addSchedule')->name('store');
        });
    });

    Route::get('about', function(){
        return view('about');
    })->name('about');


    Route::get('users',     [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile',   [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile',   [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


Route::get('test-email', function () {
    $maildata['receiver']           = 'Erdy Gaya Manalu';
    $maildata['subject']            = 'Seleksi Asisten Praktikum';
    $maildata['title']              = 'Pengumuman Hasil Seleksi Berkas';
    $maildata['registrar_email']    = 'erdy.banyakgaya@manalu.com';
    $maildata['registrar_password'] = 'k8xeAou#svW$mu3x';

    // return new ExamSelectionNotification($maildata);

    // Mail::to('mancisp4@gmail.com')->send(new FileSelectionNotification($maildata));
});

Route::get('test-email-2', function () {
    $maildata['receiver']   = 'Erdy Gaya Manalu';
    $maildata['subject']    = 'Seleksi Asisten Praktikum';
    $maildata['title']      = 'Pengumuman Hasil Seleksi Berkas';
    $maildata['registrar_email']    = 'erdy.banyakgaya@manalu.com';
    $maildata['registrar_password'] = 'k8xeAou#svW$mu3x';

    return view('mail.PassExam', compact('maildata'));
});


Route::get('/404', function () {
    return Inertia::render('NotFound');
})->name('notfound');

require __DIR__ . '/auth.php';
