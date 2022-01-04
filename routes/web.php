<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GenreController;

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

//店舗一覧ページ
Route::get('/', [ShopController::class, 'index']);
//店舗詳細ページ
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('detail');
//検索機能　※できてない
//Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/find', [ShopController::class, 'find']);
Route::post('/find', [ShopController::class, 'search']);

//削除機能　※一時的
Route::get('/delete', [ShopController::class, 'delete']);
Route::post('/delete', [ShopController::class, 'remove']);

//エリア情報修正　※一時的
Route::get('/area', [AreaController::class, 'index'])->name('area');
Route::get('/areadelete', [AreaController::class, 'delete']);
Route::post('/areadelete', [AreaController::class, 'remove']);

//ジャンル情報修正　※一時的
Route::get('/genre', [GenreController::class, 'index'])->name('genre');
Route::get('/genredelete', [GenreController::class, 'delete']);
Route::post('/genredelete', [GenreController::class, 'remove']);