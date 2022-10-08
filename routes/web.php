<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Auth::routes();

Route::prefix('auth')->group(function (){
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/logging', [AuthController::class, 'login'])->name('auth.logging');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/verifyemail/{id}', [AuthController::class, 'verifyEmail'])->name('auth.verifyEmail');
    Route::get('/emailverified/{id}', [AuthController::class, 'emailVerified'])->name('auth.emailVerified');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
