<?php

use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/store', [StudentController::class, 'store'])
->name('students.store');

Route::get('/csv', [StudentController::class, 'csv'])
->name('students.csv');

Route::get('/{student}/edit', [StudentController::class, 'edit'])
    ->name('students.edit')
    ->where('student', '[0-9]+');

Route::patch('/{student}/update', [StudentController::class, 'update'])
    ->name('students.update')
    ->where('student', '[0-9]+');

Route::delete('/{student}/destroy', [StudentController::class, 'destroy'])
    ->name('students.destroy')
    ->where('student', '[0-9]+');


// 進捗報告に関するルーティング
Route::get('/progress/{student}/create', [ProgressController::class, 'create'])
->name('progress.create');

Route::get('/progress/{student}/store', [ProgressController::class, 'store'])
    ->name('progress.store');

Route::get('/progress/{student}/progress', [ProgressController::class, 'index'])
->name('progress.index');

Route::get('/progress/{progress}/edit', [ProgressController::class, 'edit'])
    ->name('progress.edit');

Route::patch('/progress/{progress}/update', [ProgressController::class, 'update'])
    ->name('progress.update');

Route::delete('/progress/{progress}/destroy', [ProgressController::class, 'destroy'])
    ->name('progress.destroy');
