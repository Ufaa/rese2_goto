<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
//エリア情報修正　※一時的
{
    public function index()
    {
        $items = Area::all();
        return view('/area', ['items' => $items]);
    }
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from areas where id = :id', $param);
        return view('areadelete', ['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from areas where id =:id', $param);
        return redirect('/area');
    }
}
