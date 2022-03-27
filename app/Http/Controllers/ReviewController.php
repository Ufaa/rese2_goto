<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //評価、追加機能
    public function add()
    {
        return view('/mypage');
    }

    public function create(Request $request)
    {
        $param = [
            'reservation_id' => $request->reservation_id,
            'user_id' => Auth::id(),
            'rate' => $request->rate,
            'comment' => $request->comment,
        ];

        DB::insert('insert into reviews (reservation_id, user_id, rate, comment) values (:reservation_id, :user_id, :rate, :comment)', $param);
        return redirect('/mypage');
    }

    // public function review()
    // {
    //     $shopreviews = Review::where('reservation_id', '24')->get();
    //     //dd($shopreviews);
    //     return view('detail', ['shopreviews' => $shopreviews]);
    // }
}
