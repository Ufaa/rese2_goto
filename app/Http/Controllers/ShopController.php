<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ShopcreateRequest;
//use Illuminate\Support\Facades\DB; DBクラスは安全性が低い

class ShopController extends Controller

{
  //一覧表示
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

  //店舗作成機能　※店舗代表者権限
  public function shopcreate_view()
  {
    return view('/shopcreate');
  }
  public function shopmanage()
  {
    return view('/shopmanage');
  }

  public function create(ShopcreateRequest $request)
  {
    //Modelで$fillableの指定を忘れずに！
    Shop::create([
      'shopmanager_id' => $request->shopmanager_id,
      'name' => $request->name,
      'area_id' => $request->area_id,
      'genre_id' => $request->genre_id,
      'description' => $request->description,
      'image_url' => $request->image_url,
    ]);
    // $param = [
    //   'shopmanager_id' => $request->shopmanager_id,
    //   'name' => $request->name,
    //   'area_id' => $request->area_id,
    //   'genre_id' => $request->genre_id,
    //   'description' => $request->description,
    //   'image_url' => $request->image_url,
    // ]; DBクラスは安全性が低い

    // DB::insert('insert into shops (shopmanager_id, name, area_id, genre_id, description, image_url) values (:shopmanager_id, :name, :area_id, :genre_id, :description, :image_url)', $param);DBクラスは安全性が低い
    
    return redirect('/shopmanage/shop');
  }

  //いいね機能
  //  引数のIDに紐づく店舗にLIKEする
  //  @param $id 店舗ID
  //  @return \Illuminate\Http\RedirectResponse
  public function like($id)
  {
    Like::create([
      'shop_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Reply.');

    return redirect()->back();
  }

  //いいね解除機能
  // 引数のIDに紐づくリプライにUNLIKEする
  // @param $id リプライID
  // @return \Illuminate\Http\RedirectResponse
  public function unlike($id)
  {
    $like = Like::where('shop_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Reply.');

    return redirect()->back();
  }

}