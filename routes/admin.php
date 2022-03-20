<?php


use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConstantController;
use App\Http\Controllers\Admin\IndexController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->prefix('auth')->name('auth.')
        ->group(function () {
            Route::match(['post', 'get'], '/login', 'login')->name('login');
            Route::match(['post', 'get'], '/register', 'register')->name('register');
            Route::match(['post', 'get'], '/forgot-password', 'forgot')->name('forgot-password');
            Route::match(['post', 'get'], '/log-out', 'logout')->name('log-out');
        });


    Route::group(['middleware' => 'auth.admin'], static function () {
        Route::match(['post', 'get'], '/index', [IndexController::class, 'index'])->name('index');
        Route::match(['post', 'get'], '/constant', [ConstantController::class, 'index'])->name('constant.index');

        Route::controller(ArticleCategoryController::class)
            ->prefix('article-category')->name('article-category.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::match(['post', 'get'], '/edit/{id?}', 'edit')->name('edit');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });

        Route::controller(ArticleController::class)
            ->prefix('article')->name('article.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::match(['post', 'get'], '/edit/{id?}', 'edit')->name('edit');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });

    });


    Route::prefix('api')->name('api.')->group(function () {
        Route::post('/dark-mode', [IndexController::class, 'darkMode'])->name('dark-mode');

    });


    //Redirect to index if url does not exist
    Route::any('/{query}', [IndexController::class, 'redirect']);
});
