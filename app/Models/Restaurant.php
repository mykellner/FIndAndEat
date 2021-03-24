<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }

    protected $fillable = ['name','description','address','city_id'];
}
