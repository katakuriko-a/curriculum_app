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
Route::get('/{student}/edit', [StudentController::class, 'edit'])
    ->name('students.edit')
    ->where('student', '[0-9]+');

Route::patch('/{student}/update', [StudentController::class, 'update'])
    ->name('students.update')
    ->where('student', '[0-9]+');

Route::delete('/{student}/destroy', [StudentController::class, 'destroy'])
    ->name('students.destroy')
    ->where('student', '[0-9]+');


Route::get('/{student}/create', [ProgressController::class, 'create'])
->name('posts.create');

Route::get('/{student}/store', [ProgressController::class, 'store'])
    ->name('posts.store');

Route::get('/{student}/progress', [ProgressController::class, 'index'])
->name('posts.index');

Route::get('/posts/{progress}/edit', [ProgressController::class, 'edit'])
    ->name('posts.edit');

Route::patch('posts/{progress}/update', [ProgressController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{progress}/destroy', [ProgressController::class, 'destroy'])
    ->name('posts.destroy');
