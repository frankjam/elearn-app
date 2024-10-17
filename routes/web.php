<?php

use App\Http\Controllers\contentController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::name('register.perform')->post('/register', [RegisterController::class, 'register']);
    Route::name('login.perform')->post('/login', [LoginController::class, 'login']);
    });

    Route::middleware(['jwt.verify', 'jwt.token.refresh'])->group(function () {

        Route::get('/', [HomeController::class, 'index']);
        Route::post('/role/asign/{user}', [HomeController::class, 'roleupdate'])->name('role.asign');
        Route::name('login.logout')->get('/logout', [LoginController::class, 'logout']);

        Route::get('/profile', function () {
            return view('auth.profile');
        });

        Route::resource('courses', coursesController::class);
        Route::resource('content', contentController::class);

        /**
         * Staff permissions groups category Routes
         */
        Route::resource('permissions', PermissionsController::class);

        /**
         * Staff roles Routes
         */
        Route::resource('roles', RoleController::class);
        Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
        Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);
    });
});
