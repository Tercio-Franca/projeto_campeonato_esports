<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;


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

Route::get('/test', [ TimeController::class, 'test'])->name('time.test'); // 'name of function'

Route::get('/', [ TimeController::class, 'index'])->name('time.index'); // 'name of function'

Route::get('/create', [ TimeController::class, 'create'])->name('time.create'); // 'name of function'

Route::post('/create', [ TimeController::class, 'store'])->name('time.store'); // 'name of function'

Route::match(array('PUT','PATCH'),"/update/{id}", [ TimeController::class, 'update'])->name('time.update'); // 'name of function'

Route::get('/show/{id}', [ TimeController::class, 'show'])->name('time.show'); // 'name of function'

Route::get('/edit/{id}', [ TimeController::class, 'edit'])->name('time.edit'); // 'name of function'

Route::delete('/destroy/{id}', [ TimeController::class, 'destroy'])->name('time.destroy'); // 'name of function'
