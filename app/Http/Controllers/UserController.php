<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //マイページ表示
// １、予約情報
// findでUserモデルからuser_idを取得し、showでReservationテーブルから取得したuser_idと合致するデータを取得し、予約情報（detailと同じ）を表示
// ２、いいね、情報
// findでUserモデルからuser idを取得し、showでLikeテーブルから取得したuser idに合致するデータを取得し、カード（indexと同じ）を表示

    // public function mypage(int $id)
    // {
    //     $user = User::find($id);
    //     return view('/mypage', ['user' => $user]);
    //      // $likes = User::all();
    //     // return view('likeindex', ['likes' => $likes]);
    // }

    public function index(Request $request)
    {
        $items = User::all();
        return view('mypage', ['items' => $items]);
    }
}
