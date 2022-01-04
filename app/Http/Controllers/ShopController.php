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
  public function show(int $id)
  {
    $item = Shop::find($id);
    return view('detail', ['item' => $item]);
  }

  //検索機能 ※できてない（1ページでできてない）
  public function find()
  {
    return view('find', ['input' => '']);
  }
  //一旦保存
  public function search(Request $request)
  {
    $item = Shop::where('name', 'LIKE', "%{$request->input}%")->first();
    $param = [
      'input' => $request->input,
      'item' => $item
    ];
    return view('find', $param);
  }

  //一旦保存（条件分岐）
  // }

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