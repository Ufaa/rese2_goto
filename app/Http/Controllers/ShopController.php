<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
//一覧表示
{
  public function index(Request $request)
  {
    $items = Shop::all();
    return view('index', ['items' => $items]);
  }

//詳細表示

  public function detail()
  {
    $items = Shop::all();
    return view('detail', ['items' => $items]);
  }

//削除機能（※一時的）
  public function delete(Request $request)
  {
      $param = ['id' => $request->id];
      $item = DB::select('select * from shops where id = :id', $param);
      return view('delete', ['form' => $item[0]]);
  }
  public function remove(Request $request)
  {
      $param = ['id' => $request->id];
      DB::delete('delete from shops where id =:id', $param);
      return redirect('/');
  }

  }