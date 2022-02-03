<?php

use Illuminate\Support\Facades\Route;
//↓追加するの忘れがち・・・。
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
//use Auth;

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

//ログアウト
// Route::get('/logout', [UserController::class, 'loggedOut']);

//マイページ
Route::get('mypage', [UserController::class, 'mypage'])->name('mypage')->middleware('auth');

//店舗一覧ページ
Route::get('/', [ShopController::class, 'index'])->middleware('auth');
//店舗詳細ページ
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('detail')->middleware('auth');
//検索機能　
Route::get('/find', [ShopController::class, 'find']);
Route::post('/find', [ShopController::class, 'search']);

//削除機能　※一時的
//Route::get('/shopdelete/{shop_id}', [ShopController::class, 'shopdelete'])->name('destroy');
//Route::post('/shopdelete', [ShopController::class, 'shopremove']);
Route::resource('shops', ShopController::class);

//エリア情報修正　※一時的
Route::get('/area', [AreaController::class, 'index'])->name('area');
Route::get('/areadelete', [AreaController::class, 'delete']);
Route::post('/areadelete', [AreaController::class, 'remove']);

//ジャンル情報修正　※一時的
Route::get('/genre', [GenreController::class, 'index'])->name('genre');
Route::get('/genredelete', [GenreController::class, 'delete']);
Route::post('/genredelete', [GenreController::class, 'remove']);

//予約機能
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/add', [ReservationController::class, 'add']);
Route::post('/add', [ReservationController::class, 'create']);
//予約完了ページ
Route::get('/done', [ReservationController::class, 'done'])->middleware('auth');
//予約削除機能　
Route::resource('reservations', ReservationController::class);

//予約情報編集　※一時的
// Route::get('/reservationedit', [ReservationController::class, 'edit']);
// Route::post('/reservationedit', [ReservationController::class, 'update']);

//いいね機能
Route::get('/shop/like/{id}', [ShopController::class,'like'])->name('shop.like');
Route::get('/shop/unlike/{id}', [ShopController::class,'unlike'])->name('shop.unlike');

