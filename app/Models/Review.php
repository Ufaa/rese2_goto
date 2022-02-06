<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //Userモデルとのリレーション　1対多　1人のユーザーができる評価は複数
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Reservationモデルとのリレーション　1対1　1つの予約に対する評価は1つ
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }

}
