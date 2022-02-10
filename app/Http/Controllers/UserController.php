<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\like;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //マイページ表示
    public function mypage()
    // ２つの要素を１つのメソッドで遂行する。
    {
        // Reservationテーブルの中でuser_idとログインidが一致するものを複数取得する
        $userreservation = Reservation::where('user_id', Auth::id())->where('start_at', '>' ,Carbon::now())->get();
        // Likeテーブルの中でuser_idとログインidが一致するものを複数取得する
        $userlikes = Like::where('user_id', Auth::id())->get();

        $reviews = Review::where('user_id', Auth::id())->get();

        // dd($userreservation, $userlike);

        return view('mypage',compact('userreservation','userlikes','reviews'));
    }

}
