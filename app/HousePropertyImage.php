<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HousePropertyImage extends Model
{
    protected $fillable = ['property_id', 'image_path', 'image_caption'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
