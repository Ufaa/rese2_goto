<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopmanager extends Model
{
    protected $fillable = ['name','email','password','role']; //保存したいカラム名が複数の場合

    //Reservationモデルとのリレーション　多対1　1つの店舗代表者に対する予約は複数ある
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    //Shopモデルとのリレーション　1対多　1つの店舗代表者に対しての店は複数
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
