<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/index', [ TimeController::class, 'index']); // 'name of function'

Route::get('/create', [ TimeController::class, 'create']); // 'name of function'

Route::get('/show/{id}', [ TimeController::class, 'show']); // 'name of function'

Route::get('/edit/{id}', [ TimeController::class, 'edit']); // 'name of function'

