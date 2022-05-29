<?php

use App\Http\Controllers\Api\ArticleCategoryController;
use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api')->group(function (){
    Route::get('/article-category/get', [ArticleCategoryController::class, 'get']);
    Route::get('/article-category/get-articles/{id?}', [ArticleController::class, 'getArticles']);
    Route::get('/article/get/{id?}', [ArticleController::class, 'get']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
