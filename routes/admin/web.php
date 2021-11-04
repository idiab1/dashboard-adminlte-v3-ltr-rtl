<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::prefix('admin')->middleware('is_admin')->group(function () {

        // -> Route for admin page home
        Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');

        // User Routes
        Route::resource('users', UserController::class)->except([
            'show'
        ])->parameters([
            'users' => 'id',
        ])->names([
            'index'     => 'users.index',
            'create'    => 'user.create',
            'store'     => 'user.store',
            'edit'      => 'user.edit',
            'update'    => 'user.update',
            'destroy'   => 'user.destroy',
        ]);
        Route::put('/users/{id}/makeAdmin', [UserController::class, 'makeAdmin'])->name('make.admin');
        Route::put('/users/{id}/removeAdmin', [UserController::class, 'removeAdmin'])->name('remove.admin');


        // -> Route for setting
        Route::resource('setting', SettingController::class)->only([
            'edit', 'update',
        ])->parameters([
            'setting' => 'id'
        ])->names([
            'edit'      => 'setting.edit',
            'update'    => 'setting.update',
        ]);
    });
});

