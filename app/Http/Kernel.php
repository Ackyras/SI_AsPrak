<?php

namespace App\Http;

use App\Http\Middleware\AsprakMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AuthGatesMiddleware;
use App\Http\Middleware\Exam\IsExamInProgressMiddleware;
use App\Http\Middleware\News\ExamSelectionOver;
use App\Http\Middleware\News\FileSelectionOver;
use App\Http\Middleware\News\OpenForSelection;
use App\Http\Middleware\Period\ActivePeriodExistMiddleware;
use App\Http\Middleware\Period\ActivePeriodMiddleware;
use App\Http\Middleware\Recruitment\ExamMiddleware;
use App\Http\Middleware\Recruitment\PassFileSelectionMiddleware;
use App\Http\Middleware\Recruitment\RegistrationOpenMiddleware;
use App\Http\Middleware\Schedule\IsOpenForSubmissionMiddleware;
use App\Http\Middleware\UserIsActiveMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\HandleInertiaRequests::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        'admin' => AuthGatesMiddleware::class,
        'user' => UserMiddleware::class,
        'asprak' => AsprakMiddleware::class,
        'user_is_active'    =>  UserIsActiveMiddleware::class,
        'news_open_for_registration'    =>  OpenForSelection::class,
        'news_file_selection_is_over'   =>  FileSelectionOver::class,
        'news_exam_selection_is_over'   =>  ExamSelectionOver::class,
        'is_exam_in_progress'       =>  IsExamInProgressMiddleware::class,
        'is_selection_open'         =>  RegistrationOpenMiddleware::class,
        'is_eligible_for_exam'      =>  ExamMiddleware::class,
        'is_pass_file_selection'    =>  PassFileSelectionMiddleware::class,
        'is_period_active'          =>  ActivePeriodMiddleware::class,
        'is_active_period_exist'    =>  ActivePeriodExistMiddleware::class,
        'is_open_for_schedule_submission'   =>  IsOpenForSubmissionMiddleware::class,
    ];
}
