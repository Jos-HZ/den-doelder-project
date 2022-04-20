<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('redirects', [HomeController::class, 'index']);

Route::resource('/', AuthenticatedSessionController::class);



require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])
        ->name('logout.perform');
});

/*
|--------------------------------------------------------------------------
| Driver Routes +
| good
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'driver'])->group(function () {
    Route::get('/driver_dashboard', [DriverController::class, 'dashboard']);
    Route::resource('/orders', OrderController::class);
    Route::resource('/backlog', BacklogController::class);
    Route::resource('/error', ErrorController::class);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
| getting 302 by the orders/backlog/error route
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::resource('/orders', OrderController::class);
    Route::resource('/backlog', BacklogController::class);
    Route::resource('/error', ErrorController::class);

});

/*
|--------------------------------------------------------------------------
| Production Routes
| getting 403 'no permission' by the other pages
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'production'])->group(function () {
    Route::get('/dashboard', [ProductionController::class, 'dashboard']);
    Route::resource('/orders', OrderController::class);
    Route::resource('/backlog', BacklogController::class);
    Route::resource('/error', ErrorController::class);

});

