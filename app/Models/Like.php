<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    //Userモデルとのリレーション　1対多　1つのいいねに対するユーザー（いいね入力者）は1人
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //Shopモデルとのリレーション　1対多　1つのいいねに対しての店は1つ
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function getDetaillike()
    {
        $txt = $this->id . $this->shop_id . $this->user_id;
        return $txt;
    }

}
