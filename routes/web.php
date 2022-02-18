<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\FacilityController;
use App\Http\Controllers\Backend\RoomController;

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
    return view('welcome');
});

Route::prefix('auth')->group(function() {
    Route::get('/login', function() {
        return view('auth.login');
    });

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/register', function() {
        return view('auth.register');
    });
    Route::post('/register', [AuthController::class, 'register']);
});

Route::prefix('backend')->group(function() {
    Route::middleware(['auth'])->group(function() {

        Route::view('/', 'backend.dashboard', [
            'menu'      => 'dashboard',
            'menuList'  => ''
        ]);

        Route::middleware(['role:Administrator'])->group(function() {
            Route::resource('admin', AdminController::class);
            Route::resource('type', TypeController::class)->except('show');
            Route::resource('facility', FacilityController::class)->except('show');
            Route::resource('room', RoomController::class);
        });

    });
});
