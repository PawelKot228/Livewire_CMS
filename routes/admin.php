<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConstantController;
use App\Http\Controllers\Admin\IndexController;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::match(['post', 'get'], '/login', 'login')->name('login');
    Route::match(['post', 'get'], '/register', 'register')->name('register');
    Route::match(['post', 'get'], '/forgot-password', 'forgot')->name('forgot-password');
    Route::match(['post', 'get'], '/log-out', 'logout')->name('log-out');
});


Route::group(['middleware' => 'auth.admin'], static function () {
    Route::match(['post', 'get'], '/index', [IndexController::class, 'index'])->name('index');
    Route::match(['post', 'get'], '/constant', [ConstantController::class, 'index'])->name('constant.index');
});

