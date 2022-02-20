<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopmanagerController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;

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
Route::get('/find', [ShopController::class, 'find'])->middleware('auth');
Route::post('/find', [ShopController::class, 'search'])->middleware('auth');
//予約追加機能
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation')->middleware('auth');
Route::get('/add', [ReservationController::class, 'add'])->middleware('auth');
Route::post('/add', [ReservationController::class, 'create'])->middleware('auth');
//予約完了ページ
Route::get('/done', [ReservationController::class, 'done'])->middleware('auth')->middleware('auth');
//予約削除・変更機能　
Route::resource('reservations', ReservationController::class)->middleware('auth');
//いいね機能
Route::get('/shop/like/{id}', [ShopController::class, 'like'])->name('shop.like')->middleware('auth');
Route::get('/shop/unlike/{id}', [ShopController::class, 'unlike'])->name('shop.unlike')->middleware('auth');
//評価機能
Route::get('/review/{shop_id}', [ReviewController::class, 'review'])->name('review')->middleware('auth')->middleware('auth');
Route::get('/reviewadd', [ReviewController::class, 'add'])->name('review.add')->middleware('auth');
Route::post('/reviewadd', [ReviewController::class, 'create'])->middleware('auth');



//店舗追加、編集、予約確認機能　※店舗代表者権限
Route::resource('shops', ShopController::class);
Route::get('/shopmanage', [ShopController::class, 'shopmanage'])->name('shopmanage')->middleware('auth', 'can:admin-higher');
Route::get('/shopcreate', [ShopController::class, 'shopcreate_view'])->name('shopcreate_view')->middleware('auth', 'can:admin-higher');
Route::post('/create', [ShopController::class, 'create'])->name('create')->middleware('auth', 'can:admin-higher');
Route::get('/shopmanage/shop', [ShopmanagerController::class,'shopmanager_reservation'])->name('shopmanager_reservation')->middleware('auth', 'can:admin-higher');
Route::put('/shopmanage/shop/{shop_id}', [ShopmanagerController::class, 'shopmanager_shop_update'])->name('shopmanager_shop_update')->middleware('auth', 'can:admin-higher');


//店舗代表者追加　※システム管理者権限
Route::get('/shopmanagers', [ShopmanagerController::class, 'shopmanagers_index'])->name('shopmanagers_index')->middleware('auth', 'can:system-only');
Route::post('/shopmanager_create', [ShopmanagerController::class, 'shopmanager_create'])->name('shopmanager_create')->middleware('auth', 'can:system-only');
//※迷走中・・・・・。
Route::post('/shopmanager_create2', [ShopmanagerController::class, 'shopmanager_create2'])->name('shopmanager_create2')->middleware('auth', 'can:system-only');
Route::get('/shopmanager-register', [RegisterController::class, 'shopmanager_register'])->name('shopmanager_register');
Route::post('/shopmanager_create3', [RegisterController::class, 'shopmanager_create3'])->name('shopmanager_create3');

//メール送信機能
// Route::get('/mail', function () {
//     $mail_text = "メールテストで使いたい文章";
//     Mail::to('to_address@example.com')->send(new MailTest($mail_text));
// });
Route::get('/email',[ShopmanagerController::class,'email'])->name('email');
Route::post('/send_email', [ShopmanagerController::class,'send_email'])->name('send_email');