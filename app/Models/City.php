<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasManyThrough('App\Models\Post','App\Models\User','city_id','user_id');
    }
}
