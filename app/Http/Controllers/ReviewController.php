<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //評価、追加機能
    public function review(int $id)
    {
        $item = Shop::find($id);

        $review = Reservation::where('user_id', Auth::id())->first();
        // if (!is_null($review)) {
        //     return view('/mypage');}
        
        //dd($item, $review);

        return view('review',compact('item','review'));
    }

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
    //評価、解除（削除）機能　※不要？
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/mypage');
    }
}
