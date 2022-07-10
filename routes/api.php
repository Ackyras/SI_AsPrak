<?php

use App\Http\Controllers\API\User\ExamController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('test-connection', function () {
        return response()->json(
            [
                'status'        =>  'OK',
                'msg'           =>  'connection established'
            ]
        );
    });
    Route::get('test-user', function () {
        $user = auth()->user();
        return response()->json(
            [
                'user'          =>  $user,
                'status'        =>  'OK',
                'msg'           =>  'connection established'
            ]
        );
    });
    Route::prefix('user')->as('user.')->group(function () {
        Route::prefix('exam')->as('exam.')->group(function () {
            Route::post('store-choice', [ExamController::class, 'storeChoiceAnswer'])->name('store.choice-answer');
            Route::post('store-essay', [ExamController::class, 'storeEssayAnswer'])->name('store.essay-answer');
        });
    });

    Route::post('test-presence', [UserDashboardController::class, 'presence']);
});
