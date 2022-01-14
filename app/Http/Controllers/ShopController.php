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

  //検索機能
  public function find()
  {
    return view('find', ['input' => '']);
  }

  public function search(Request $request)
  {
    $name = $request->name;
    $area = $request->area;
    $genre = $request->genre;
    //dd($request->all());
    //店舗名のみでの検索の場合
    if (
      !is_null($name) && is_null($area) && is_null($genre)
    ) {
      $items = Shop::where('name', 'LIKE', "%{$request->name}%")->get();
      return view('index')->with('items', $items);
    //エリアのみでの検索の場合
    } else if (
      is_null($name) && !is_null($area) && is_null($genre)
    ) {
      $items = Shop::where('area_id', 'LIKE', "%{$request->area}%")->get();
      return view('index')->with('items', $items);
    //ジャンルのみでの検索の場合
    } else if (
      is_null($name) && is_null($area) && !is_null($genre)
    ) {
      $items = Shop::where('genre_id', 'LIKE', "%{$request->genre}%")->get();
      return view('index')->with('items', $items);
    }
    //全て入力されていない場合＝一覧表示＝全表示
      else if (
      is_null($name) && is_null($area) && is_null($genre)
    ) {
      $items = Shop::all();
      return view('index', ['items' => $items]);
    }
    //エリア+ジャンルでの検索の場合
    else if (
      is_null($name) && !is_null($area) && !is_null($genre)
    ) {
      $items = Shop::where('area_id', 'LIKE', "%{$request->area}%")->where('genre_id', 'LIKE', "%{$request->genre}%")->get();
      return view('index')->with('items', $items);
    }
    //名前+ジャンルでの検索の場合
    else if (
      !is_null($name) && is_null($area) && !is_null($genre)
    ) {
      $items = Shop::where('name', 'LIKE', "%{$request->name}%")->where('genre_id', 'LIKE', "%{$request->genre}%")->get();
      return view('index')->with('items', $items);
    }
    //名前+エリアでの検索の場合
    else if (
      !is_null($name) && !is_null($area) && is_null($genre)
    ) {
      $items = Shop::where('name', 'LIKE', "%{$request->name}%")->where('area_id', 'LIKE', "%{$request->area}%")->get();
      return view('index')->with('items', $items);
    }
  }


//店舗情報削除機能（※一時的）
  public function shopdelete(Request $request)
  {
      $param = ['id' => $request->id];
      $item = DB::select('select * from shops where id = :id', $param);
      return view('delete', ['form' => $item[0]]);
  }
  public function shopremove(Request $request)
  {
      $param = ['id' => $request->id];
      DB::delete('delete from shops where id =:id', $param);
      return redirect('/');
  }

  }