<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
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

//Route::resource('/', AuthenticatedSessionController::class);
Route::resource('/order', OrderController::class);
Route::resource('/backlog', BacklogController::class);
Route::resource('/error', ErrorController::class);


//user dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'production'])->name('dashboard');

// admin dashboard
Route::get('/admin_dashboard', function () {
   return view('admin_dashboard');
})->middleware(['auth', 'admin'])->name('admin_dashboard');

Route::get('/driver_dashboard', function () {
   return view('driver_dashboard');
})->middleware(['auth', 'driver'])->name('driver_dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])
        ->name('logout.perform');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Production Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Driver Routes
|--------------------------------------------------------------------------
*/


