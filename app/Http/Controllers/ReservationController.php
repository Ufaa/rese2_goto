<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Review;
//use Illuminate\Support\Facades\DB; DBクラスは安全性が低い

class ReservationController extends Controller
{
    //予約追加機能
    public function add()
    {
        return view('/detail');
    }
    public function create(ReservationRequest $request)
    {
        $start_at = $request->start_date.' '.$request->start_time;

        //Modelで$fillableの指定を忘れずに！
        Reservation::create([
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
            'start_at' => $start_at,
            'num_of_users' => $request->num_of_users,
        ]);
        // $param = [
        //     'shop_id' => $request->shop_id,
        //     'user_id' => $request->user_id,
        //     'start_at' => $start_at,
        //     'num_of_users' => $request->num_of_users,
        // ]; DBクラスは安全性が低い

        // DB::insert('insert into reservations (shop_id, user_id, start_at, num_of_users) values (:shop_id, :user_id, :start_at, :num_of_users)', $param); DBクラスは安全性が低い
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
        $review = Review::where('reservation_id', $reservation->id)->first();
        if(!is_null($review)){
            $review->delete();
        }
        $reservation->delete();
        return redirect('/mypage');
    }

    //予約変更
    public function update(ReservationRequest $request, Reservation $reservation)
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
