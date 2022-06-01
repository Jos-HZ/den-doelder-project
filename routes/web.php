<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Authorization\AdminController;
use App\Http\Controllers\Authorization\DriverController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\UserController;
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

Route::resource('/backlog', BacklogController::class);
Route::resource('/qualityControl', QualityControlController::class);

Route::get('/checklist', function () {
    return view('checklist');
})->name('checklist');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('authenticatedSession.destroy');
    Route::get('redirects', [HomeController::class, 'index']);
});

Route::resource('photos', Produc::class)->only([
    'show'
]);

/*
|--------------------------------------------------------------------------
| Driver Routes
|--------------------------------------------------------------------------
|
| Here is where you can driver web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "driver" middleware group. Now create something great!
|
*/

Route::middleware(['driver'])->group(function () {
    Route::get('/driver_dashboard', [DriverController::class, 'dashboard']);
    Route::put('/orders/{id}/driver_done', [OrderController::class, 'driverDone'])->name('orders.driverDone');

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('users', UserController::class);

});

/*
|--------------------------------------------------------------------------
| Production Routes
|--------------------------------------------------------------------------
|
| Here is where you can register production routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "production" middleware group. Now create something great!
|
*/
Route::middleware(['production'])->group(function () {

});

require __DIR__ . '/auth.php';
