<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ProgressController;
use App\Http\Controllers\api\LevelController;
use App\Http\Controllers\api\TeacherController;

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
    Route::get('/', [UserController::class, 'index'])
        ->name('students.index');

    Route::post('/store', [UserController::class, 'store']);

    Route::get('/edit/{id}', [UserController::class, 'edit']);

    Route::post('/update/{id}', [UserController::class, 'update'])
        ->name('students.update')
        ->where('student', '[0-9]+');

    Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])
        ->name('students.destroy')
        ->where('student', '[0-9]+');

    Route::get('/csv', [StudentController::class, 'csv'])
        ->name('students.csv');


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



    Route::get('/teachers', [TeacherController::class, 'index']);

    Route::post('/teacher/store', [UserController::class, 'teacher_store']);

    Route::post('/reserve', [UserController::class, 'reserve']);

    Route::post('/reserve/update', [UserController::class, 'update_reserve']);

    Route::get('/get_reserve/{id}', [UserController::class, 'get_reserve']);

    Route::post('/get/student/with_email', [UserController::class, 'get_student']);

    Route::get('/get_reserve_students/{id}', [UserController::class, 'get_reserve_students']);

    Route::get('/reserve/{id}', [TeacherController::class, 'get_teacher']);

    Route::post('/reserve/{id}/destroy', [UserController::class, 'destroy_reserve']);

    Route::post('/reserve/{id}/edit', [UserController::class, 'edit_reserve']);

    Route::get('/current_student', [UserController::class, 'current_student']);

    Route::get('/current_student_name', [StudentController::class, 'current_student_name']);
});
