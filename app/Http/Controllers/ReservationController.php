<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //予約一覧表示
    public function index(Request $request)
    {
        $reservation = Reservation::all();
        return view('reservation')->with('reservations', $reservation);
    }

    //予約追加機能
    public function add()
    {
        return view('/detail');
    }
    public function create(ClientRequest $request)
    {
        $start_at = $request->start_date.' '.$request->start_time;

        $param = [
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
            'start_at' => $start_at,
            'num_of_users' => $request->num_of_users,
        ];

        DB::insert('insert into reservations (shop_id, user_id, start_at, num_of_users) values (:shop_id, :user_id, :start_at, :num_of_users)', $param);
        return redirect('/done');
    }

    //予約完了
    function done()
    {
        return view('done');
    }

    //予約削除
    public function destroy(Reservation $reservation)
    {
        //dd($reservation);
        $review = Review::where('reservation_id', $reservation->id)->first();
        if(!is_null($review)){
            $review->delete();
        }
        $reservation->delete();
        return redirect('/mypage');
    }

    //予約変更
    public function update(ClientRequest $request, Reservation $reservation)
    {
        $start_at = $request->start_date . ' ' . $request->start_time;
        $num_of_users = $request->num_of_users;

        Reservation::where('id', $reservation->id)
            ->update([
                'start_at' => $start_at,
                'num_of_users' =>$num_of_users,
            ]);
        return redirect('/mypage');
    }

}
