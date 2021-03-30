<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['url', 'description', 'restaurant_id', 'link_type_id'];

    public function restaurant () {
        return $this->belongsTo(Restaurant::class);
    }

    public function link_type () {
        return $this->belongsTo(LinkType::class);
    }
}
