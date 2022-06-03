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
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

Route::resource('production-lines', \App\Http\Controllers\ProductionLineController::class)->only([
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

/*
|--------------------------------------------------------------------------
| Password forgotten
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);

})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);

})->middleware('guest')->name('password.update');
