<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function getArea()
    {
        return optional($this->area)->name;
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function getGenre()
    {
        return optional($this->genre)->name;
    }
}