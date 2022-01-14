<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    //一覧取得　※一時的
    public function index()
    {
        $likes = Like::all();
        return view('likeindex', ['likes' => $likes]);
    }
    //いいね、追加機能
    public function likeadd()
    {
        return view('/detail');
    }
    public function likecreate(Request $request)
    {
        $param = [
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
        ];
        //dd($param);
        DB::insert('insert into likes (shop_id, user_id) values (:shop_id, :user_id)', $param);
        return redirect('/likeindex');
    }
    //いいね、解除（削除）機能
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from reservations where id = :id', $param);
        return view('/reservationdelete', ['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from reservations where id =:id', $param);
        return redirect('/reservation');
    }

}
