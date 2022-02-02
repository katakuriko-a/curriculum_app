<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', [TestController::class, 'index'])
    ->name('tests.index');

Route::get('/create', [TestController::class, 'create'])
    ->name('tests.create');

Route::post('/store', [TestController::class, 'store'])
    ->name('tests.store');

Route::get('/{test}/edit', [TestController::class, 'edit'])
    ->name('tests.edit')
    ->where('test', '[0-9]+');

Route::patch('/{test}/update', [TestController::class, 'update'])
    ->name('tests.update')
    ->where('test', '[0-9]+');

Route::delete('/{test}/destroy', [TestController::class, 'destroy'])
    ->name('tests.destroy')
    ->where('test', '[0-9]+');
