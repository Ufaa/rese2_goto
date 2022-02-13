<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $dates = ['start_at'];
    //Userモデルとのリレーション　1対多　1人の予約に対するユーザー（予約者）は1人
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //Shopモデルとのリレーション　1対多　1つの予約に対しての店は1つ
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    //Reviewモデルとのリレーション　1対1　1対1　1つの予約に対する評価は1つ
    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function getDetail2()
    {
        $txt = $this->id . $this->shop->id . $this->user->id . $this->num_of_users . $this->start_at;
        return $txt;
    }
    //Shopmanagerモデルとのリレーション　多対1　1つの予約に店舗代表者は1人
    public function shopmanager()
    {
        return $this->belongsTo('App\Models\Shopmanager');
    }

}
