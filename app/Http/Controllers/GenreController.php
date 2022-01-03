<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller

{
//ジャンル情報修正　※一時的
    public function index()
    {
        $items = Genre::all();
        return view('/genre', ['items' => $items]);
    }
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from genres where id = :id', $param);
        return view('genredelete', ['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from genres where id =:id', $param);
        return redirect('/genre');
    }
}

