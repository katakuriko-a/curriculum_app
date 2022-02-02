<?php
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

Route::get('/', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/store', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/search', [StudentController::class, 'search'])
    ->name('students.search');

Route::get('/{student}/edit', [StudentController::class, 'edit'])
    ->name('students.edit')
    ->where('student', '[0-9]+');

Route::patch('/{student}/update', [StudentController::class, 'update'])
    ->name('students.update')
    ->where('student', '[0-9]+');

Route::delete('/{student}/destroy', [StudentController::class, 'destroy'])
    ->name('students.destroy')
    ->where('student', '[0-9]+');
