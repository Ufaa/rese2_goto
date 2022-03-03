<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Like;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //マイページ表示
    public function mypage()
    // ２つの要素を１つのメソッドで遂行する。
    {
        // Reservationテーブルの中でuser_idとログインidが一致し、今日より後のものを複数取得する
        $userreservation = Reservation::where('user_id', Auth::id())->where('start_at', '>' ,Carbon::now())->get();
        // Likeテーブルの中でuser_idとログインidが一致するものを複数取得する
        $userlikes = Like::where('user_id', Auth::id())->get();
        // Reviewテーブルの中でuser_idとログインidが一致し、今日より後のものを複数取得する
        $reviews = Reservation::where('user_id', Auth::id())->where('start_at', '<', Carbon::now())->get();


        return view('mypage',compact('userreservation','userlikes','reviews'));
    }
}
