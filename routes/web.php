<?php

use App\Http\Controllers\BacklogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/', WelcomeController::class);
// orderS, MEERVOUD!!!
Route::put('/orders/{order}/edit', [OrderController::class, 'update'])->name('orders.update');
// Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::resource('/orders', OrderController::class);
Route::resource('/backlog', BacklogController::class);
Route::resource('/qualityControl', QualityControlController::class);

