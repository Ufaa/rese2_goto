<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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
    
    //リプライにLIKEを付いているかの判定
    //@return bool true:Likeがついてる false:Likeがついてない
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
