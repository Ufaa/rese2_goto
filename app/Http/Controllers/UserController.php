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
        $userlikes = Like::where('user_id', Auth::id())->get();

        // dd($userreservation, $userlike);

        return view('mypage',compact('userreservation','userlikes'));
    }

}
