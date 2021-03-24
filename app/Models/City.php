<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function county () 
    {
        return $this->belongsTo(County::class);
    }

    protected $fillable = ['name'];
}
