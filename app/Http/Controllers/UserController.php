<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //マイページ表示
    // １、予約情報
    // findでUserモデルからuser_idを取得し、showでReservationテーブルから取得したuser_idと合致するデータを取得し、予約情報（detailと同じ）を表示
    // ２、いいね、情報
    // findでUserモデルからuser idを取得し、showでLikeテーブルから取得したuser idに合致するデータを取得し、カード（indexと同じ）を表示
    // $reservationを定義　useridが一致するもの？
    // $likeを定義　useridが一致するもの？

    public function userreservation($id)
    {
        $userreservation = Reservation::where('shop_id', $id)->where('user_id', Auth::id())->get();

        return view('mypage')->with('userreservatiom',$userreservation);
    }
    public function userlike($id)
    {
        $userlike = Like::where('shop_id', $id)->where('user_id', Auth::id())->get();
        dd($userlike);
        return view('mypage')->with('userlike',$userlike);
    }
}
