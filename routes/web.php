<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RequestController;


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
Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/users', UsersController::class);

    Route::prefix('/request')->controller(RequestController::class)->group(function () {
        // Datatables
        Route::post('/savecolumns', 'saveColumns')->name('request.saveColumns');
        Route::get('/pagination/{pagination}', 'paginationChange')->name('request.paginate');
    });
});
