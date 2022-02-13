<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopmanager;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

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

    return view('shopmanage',['shopmanager_reservations' => $shopmanager_reservations]);
    }

}
