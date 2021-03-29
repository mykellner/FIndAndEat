<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\City;

class County extends Model
{

    protected $fillable = ['name'];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function restaurants()
    {
        return $this->hasManyThrough(Restaurant::class, City::class, 'county_id', 'city_id');
    }

    // protected static function boot() {
    //     parent::boot();

    //     static::deleting(function($county) {
    //         foreach($county->cities as $city){
    //           $city->delete();
    //         }
    //     });
    // }

}
