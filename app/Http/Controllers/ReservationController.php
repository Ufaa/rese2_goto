<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //予約一覧表示
    public function index(Request $request)
    {
        //ページネーション追加（Simpleをつけるかつけないか）
        $reservation = Reservation::all();
        //dd($items);
        return view('reservation')->with('reservations', $reservation);
    }

    //予約追加機能
    public function add()
    {
        return view('/detail');
    }
    public function create(Request $request)
    {
        $param = [
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
            'start_at' => $request->start_at,
            'num_of_users' => $request->num_of_users,
        ];
        //dd($param);
        DB::insert('insert into reservations (shop_id, user_id, start_at, num_of_users) values (:shop_id, :user_id, :start_at, :num_of_users)', $param);
        return redirect('/done');
    }

    //予約完了
    function done()
    {
        return view('done');
    }

    //予約情報確認機能


    //予約情報削除　※一時的
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/reservation');
    }

    // 予約情報編集　※一時的
    public function update(Request $request)
    {
    $request->num_of_users = $request->num_of_users;
    $request->save();
    dd($request);
    return redirect('/reservation')->with('reservation', $request);
    }
    // public function edit(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     $item = DB::select('select * from reservations where id = :id', $param);
    //     return view('/reservationedit', ['form' => $item[0]]);
    // }
    // public function update(Request $request)
    // {
    //     $param = [
    //         'id' => $request->id,
    //         'num_of_users' => $request->num_of_users,
    //         'start_at' => $request->start_at,
    //     ];
    //     DB::update('update reservations set num_of_users =:num_of_users, start_at =:start_at where id =:id', $param);
    //     return redirect('/reservation');
    // }
}
