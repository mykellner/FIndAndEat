<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function county ()
    {
        return $this->belongsTo(County::class);
    }

    public function restaurants(){
        return $this->hasMany(Restaurant::class);
    }

    protected $fillable = ['name', 'county_id'];
}
