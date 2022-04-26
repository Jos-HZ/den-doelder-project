<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\QualityControlController;
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

Route::resource('/', AuthenticatedSessionController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/backlog', BacklogController::class);
Route::resource('/error', ErrorController::class);
Route::resource('/qualityControl', QualityControlController::class);


require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('authenticatedSession.destroy');
    Route::get('redirects', [HomeController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| Driver Routes +
| good
|--------------------------------------------------------------------------
*/

Route::middleware(['driver'])->group(function () {
    Route::get('/driver_dashboard', [DriverController::class, 'dashboard']);

});

/*
|--------------------------------------------------------------------------
| Admin, Production Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});

/*
|--------------------------------------------------------------------------
| Production Routes
|--------------------------------------------------------------------------
*/
