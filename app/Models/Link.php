<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function restaurant () {
        return $this->belongTo(Restaurant::class);
    }
}
