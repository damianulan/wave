<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\LoyaltiesController;
use App\Http\Controllers\CalendarController;


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
    Route::prefix('users')->group(function (){
        Route::get('{user}/block', [UsersController::class, 'block'])->name('users.block');
        Route::get('{user}/unblock', [UsersController::class, 'unblock'])->name('users.unblock');
        Route::get('{user}/watch', [UsersController::class, 'watch'])->name('users.watch');
        Route::get('{user}/unwatch', [UsersController::class, 'unwatch'])->name('users.unwatch');
        Route::get('{user}/delete', [UsersController::class, 'delete'])->name('users.delete');
        Route::post('{user}/permissions', [UsersController::class, 'permissionsUpdate'])->name('users.permissions');
        Route::post('{user}/note', [UsersController::class, 'note'])->name('users.note');
        Route::get('note/{note}/delete', [UsersController::class, 'noteDelete'])->name('users.note.delete');
    });


    // PROFILE
    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('/avatar/{id}', [ProfileController::class, 'uploadAvatar'])->name('profile.avatar');
        Route::get('/avatar/default/{id}', [ProfileController::class, 'defaultAvatar'])->name('profile.avatar.default');
    });

    // CLIENTS
    Route::resource('/clients', ClientsController::class);
    Route::prefix('clients')->group(function (){

    });

    // TASKS
    Route::resource('/tasks', TasksController::class);
    Route::prefix('tasks')->group(function (){
    });

    // PRODUCTS
    Route::resource('/products', ProductsController::class);
    Route::prefix('products')->group(function (){

    });

    // SERIVCES
    Route::resource('/services', ServicesController::class);
    Route::prefix('services')->group(function (){

    });

    // TAGS
    Route::resource('/tags', TagsController::class);
    Route::prefix('tags')->group(function (){

    });

    // LOYALTIES
    Route::resource('/loyalties', LoyaltiesController::class);
    Route::prefix('loyalties')->group(function (){

    });

    // CALENDAR & VISITS
    Route::resource('/calendar', CalendarController::class);
    Route::prefix('calendar')->group(function (){

    });

    // SETTINGS & CONFIG
    Route::prefix('settings')->group(function(){
        Route::get('/index', [ConfigController::class, 'index'])->name('settings.index');
        Route::post('/modules/save', [ConfigController::class, 'modulesSave'])->name('settings.modulesSave');
    });

    // ADDITIONAL REQUESTS
    Route::prefix('/request')->controller(RequestController::class)->group(function () {
        // Datatables
        Route::post('/savecolumns', 'saveColumns')->name('request.saveColumns');
        Route::get('/pagination/{pagination}', 'paginationChange')->name('request.paginate');
        Route::get('/notauthorized', 'NotAuthorized')->name('request.notAuthorized');
        Route::get('/suspended', 'Suspended')->name('request.suspended');
    });
});
