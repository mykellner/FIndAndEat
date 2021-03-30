<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['url', 'description', 'restaurant_id', 'type_id'];

    public function restaurant () {
        return $this->belongsTo(Restaurant::class);
    }

    public function linktype () {
        return $this->belongsTo(LinkType::class);
    }
}
