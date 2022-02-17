<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\ProgressController;

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


Route::middleware(['cors'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])
        ->name('students.index');

    Route::post('/store', [StudentController::class, 'store'])
        ->name('students.store');

    Route::get('/edit/{id}', [StudentController::class, 'edit'])
        ->name('students.edit')
        ->where('student', '[0-9]+');

    Route::post('/update/{id}', [StudentController::class, 'update'])
        ->name('students.update')
        ->where('student', '[0-9]+');

    Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])
        ->name('students.destroy')
        ->where('student', '[0-9]+');


    Route::get('/progress/{id}', [ProgressController::class, 'index'])
        ->name('progress.index');

    Route::post('/progress/{id}/store', [ProgressController::class, 'store'])
        ->name('progress.store');

    Route::post('/progress/{id}/update', [ProgressController::class, 'update'])
        ->name('progress.update');

    Route::get('/progress/{id}/edit', [ProgressController::class, 'edit'])
        ->name('progress.edit');

    Route::delete('/progress/{id}/destroy', [ProgressController::class, 'destroy'])
        ->name('students.destroy')
        ->where('student', '[0-9]+');
});
