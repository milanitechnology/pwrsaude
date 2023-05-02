<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

});

Route::group(['middleware' => ['auth']], function() {

    /**
     * Home Routes
     */
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /**
     * Profile Routes
     */
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});

