<?php

use App\Http\Controllers\Web\ArticleCategoryController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\IndexController;
use App\Models\Seo;
use Illuminate\Support\Facades\Route;

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

Route::name('web.')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');


    try {
        foreach (Seo::all() as $seo) {
            switch ($seo->source_table) {
                case 'article_category' :
                {
                    Route::get($seo->slug, [ArticleCategoryController::class, 'index'])
                        ->defaults('id', $seo->source_id)
                        ->name("article-category.$seo->source_id");
                    break;
                }
                case 'article' :
                {
                    Route::get($seo->slug, [ArticleController::class, 'index'])
                        ->defaults('id', $seo->source_id)
                        ->name("article.$seo->source_id");
                    break;
                }
            }
        }
    } catch (Exception $e) {
        dump($e->getMessage());
    }


});


