<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ShopcreateRequest;
use App\Mail\MailTest;
use Illuminate\Support\Facades\Mail;

class ShopmanagerController extends Controller
{
    public function shopmanager_reservation()
    {
        $shopmanager_shop = Shop::where('shopmanager_id', Auth::id())->first();
        if (!is_null($shopmanager_shop)){
            $shopmanager_reservations = Reservation::where('shop_id', $shopmanager_shop->id)->where('start_at', '>', Carbon::now())->orderBy('start_at', 'asc')->get();
            return view('shopmanage', compact('shopmanager_reservations', 'shopmanager_shop'));
        } else {
            return view('/shopcreate_request');
        }
    }

    //店舗を未作成の場合に飛ぶページ表示
    public function shopcreate_request()
    {
        return view('/shopcreate_request');
    }

    //店舗情報変更機能
    public function shopmanager_shop_update(ShopcreateRequest $request)
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
        return redirect ('shopmanage/shop');
    }

    public function shopmanager_index(Request $request)
    {
        $param = [
            'reservation_id' => $request->reservation_id,
            'user_id' => Auth::id(),
            'rate' => $request->rate,
            'comment' => $request->comment,
        ];

        DB::insert('insert into reviews (reservation_id, user_id, rate, comment) values (:reservation_id, :user_id, :rate, :comment)', $param);
        return redirect('/mypage');
    }

    //店舗代表者一覧表示
    public function shopmanagers_index()
    {
        $shopmanagers = User::where('role','5')->get();
        return view('shopmanagers', ['shopmanagers' => $shopmanagers]);
    }

    //店舗代表者登録機能
    public function shopmanager_create(RegisterRequest $request)
    {
        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
        ];

        DB::insert('insert into users (name, email, password, role) values (:name, :email, :password, :role)', $param);
        return redirect('/shopmanagers');
    }

    //メール送信機能
    public function email(int $id)
    {
        $user_data = Reservation::find($id);
        return view('/emails/email')->with('user_data', $user_data);
    }

    public function send_email(Request $request)
    {
        $mail_text = new MailTest();
        $mail_text->to($request->reservation_email);
        $mail_text->subject('メールテストタイトル');
        $mail_text->text('emails.body', ['body' => $request->mailbody]);

        Mail::to('to_address@example.com')->send($mail_text);
        return redirect('/');
    }

}

