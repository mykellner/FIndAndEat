<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class County extends Model
{

    protected $fillable = ['name'];

    public function cities(){
        return $this->hasMany(City::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($county) {
            foreach($county->cities as $city){
              $city->delete();
            }
        });
    }

}
