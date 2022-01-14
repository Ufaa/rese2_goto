<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //Areaモデルとのリレーション　多対1　ショップが所属するエリアは一つ
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    //Genreモデルとのリレーション　多対1　ショップが所属するジャンルは一つ
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function getDetail()
    {
        $txt = $this->id . $this->name  . $this->area->name. $this->genre->name . $this->description . $this->image_url;
        return $txt;
    }
    //Reservationモデルとのリレーション　多対1　1つの店に対する予約は複数ある
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    //Likeモデルとのリレーション　多対1　1つの店に対する「いいね!」は複数ある
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
