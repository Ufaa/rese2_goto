<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopmanagerController;

//ユーザー登録機能 laravel Breeze利用
Route::get('/home', [AuthorController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

//会員登録完了ページ
Route::get('thanks', [RegisteredUserController::class, 'thanks'])->name('thanks')->middleware('auth');

//マイページ
Route::get('mypage', [UserController::class, 'mypage'])->name('mypage')->middleware('auth');

//店舗一覧ページ
Route::get('/', [ShopController::class, 'index'])->middleware('auth');
//店舗詳細ページ
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('detail')->middleware('auth');
//検索機能　
Route::get('/find', [ShopController::class, 'find']);
Route::post('/find', [ShopController::class, 'search']);

//店舗追加機能　※店舗代表者権限
//店舗削除機能　※管理者権限
Route::resource('shops', ShopController::class);
Route::get('/shopmanage', [ShopController::class, 'shopmanage'])->name('shopmanage');
Route::post('/create', [ShopController::class, 'create'])->name('create');

Route::resource('shopmanagers', ShopmanagerController::class);
Route::get('/shopmanage/shops', [ShopmanagerController::class,'shopmanager_reservation'])->name('shopmanager_reservation');
Route::put('/shopmanage/shops/{shop_id}', [ShopmanagerController::class, 'shopmanager_shop_update'])->name('shopmanager_shop_update');


//エリア情報修正　※一時的　管理画面に必要？
Route::get('/area', [AreaController::class, 'index'])->name('area');
Route::get('/areadelete', [AreaController::class, 'delete']);
Route::post('/areadelete', [AreaController::class, 'remove']);

//ジャンル情報修正　※一時的　管理画面に必要？
Route::get('/genre', [GenreController::class, 'index'])->name('genre');
Route::get('/genredelete', [GenreController::class, 'delete']);
Route::post('/genredelete', [GenreController::class, 'remove']);

//予約追加機能
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/add', [ReservationController::class, 'add']);
Route::post('/add', [ReservationController::class, 'create']);
//予約完了ページ
Route::get('/done', [ReservationController::class, 'done'])->middleware('auth');
//予約削除・変更機能　
Route::resource('reservations', ReservationController::class);

//いいね機能
Route::get('/shop/like/{id}', [ShopController::class,'like'])->name('shop.like');
Route::get('/shop/unlike/{id}', [ShopController::class,'unlike'])->name('shop.unlike');

//評価機能
Route::get('/review/{shop_id}', [ReviewController::class, 'review'])->name('review')->middleware('auth');
Route::get('/reviewadd', [ReviewController::class, 'add'])->name('review.add');
Route::post('/reviewadd', [ReviewController::class, 'create']);

