<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
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
    // HOME
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // USERS
    Route::resource('/users', UsersController::class);
    Route::get('users/{user}/block', [UsersController::class, 'block'])->name('users.block');
    Route::get('users/{user}/unblock', [UsersController::class, 'unblock'])->name('users.unblock');
    Route::get('users/{user}/delete', [UsersController::class, 'delete'])->name('users.delete');


    // CLIENTS
    Route::resource('/clients', ClientsController::class);

    Route::prefix('/request')->controller(RequestController::class)->group(function () {
        // Datatables
        Route::post('/savecolumns', 'saveColumns')->name('request.saveColumns');
        Route::get('/pagination/{pagination}', 'paginationChange')->name('request.paginate');
        Route::get('/notauthorized', 'NotAuthorized')->name('request.notAuthorized');
        Route::get('/suspended', 'Suspended')->name('request.suspended');
    });
});
