<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopmanager;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopmanagerController extends Controller
{
    public function shopmanager_reservation()
    //店舗代表者のidとShopテーブルにあるShopmanager_idが一致するデータを取得
    //※役割を割り当てられたら要変更、今はAuthが代表者役を負っているため
    //単数にしなければいけなかった・・・。
     {
        $shopmanager_shop = Shop::where('shopmanager_id', Auth::id())->first();
    //取得したshop_idとReservationテーブルにあるshop_idが一致するものを予約日時が直近なもの順に並べて取得する
        $shopmanager_reservations = Reservation::where('shop_id', $shopmanager_shop->id)->orderBy('start_at', 'asc')->get();

    return view('shopmanage',compact('shopmanager_reservations','shopmanager_shop'));
    }

    public function shopmanager_shop_update(Request $request)
    {
        $name = $request->name;
        $area_id = $request->area_id; $genre_id = $request->genre_id;
        $description = $request->description;
        $image_url = $request->image_url;

        Shop::where('shopmanager_id', Auth::id())
            ->update([
                'name' => $name,
                'area_id' => $area_id,
                'genre_id' => $genre_id,
                'description' => $description,
                'image_url' => $image_url
            ]);
        return redirect('shopmanage/shop');
    }

    public function shopmanager_index(Request $request)
    {
        $param = [
            'reservation_id' => $request->reservation_id,
            'user_id' => Auth::id(),
            'rate' => $request->rate,
            'comment' => $request->comment,
        ];
        //dd($param);

        DB::insert('insert into reviews (reservation_id, user_id, rate, comment) values (:reservation_id, :user_id, :rate, :comment)', $param);
        return redirect('/mypage');
    }

    //店舗代表者一覧表示
    public function shopmanagers_index(Request $request)
    {
    $shopmanagers = Shopmanager::all();
    return view('shopmanagers', ['shopmanagers' => $shopmanagers]);
    }

    //店舗代表者登録機能
    public function shopmanager_create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'shop_id' =>
            $request->shop_id,
        ];

        DB::insert('insert into shopmanagers (name, shop_id) values (:name, :shop_id)', $param);
        return redirect('/');
    }

}

