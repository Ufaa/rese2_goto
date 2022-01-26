<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\like;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //マイページ表示
    public function mypage()
    // ２つの要素を１つのメソッドで遂行する。
    {
        // Reservationテーブルの中でuser_idとログインidが一致するものを複数取得する
        $userreservation = Reservation::where('user_id', Auth::id())->get();
        // Likeテーブルの中でuser_idとログインidが一致するものを複数取得する
        $userlike = Like::where('user_id', Auth::id())->get();

        //　Shopテーブルの中でidとuserlikeのshop_idが一致する情報を複数取得する
        $userlikeshop = Shop::where('id', $userlike)->get();

        $likeshop = Shop::where('id',Like::where('shop_id'));

        //dd($userreservation, $userlike,$userlikeshop, $likeshop);

        return view('mypage')->with('userreservation', $userreservation,'userlikeshop',  $userlikeshop, );
    }

}
