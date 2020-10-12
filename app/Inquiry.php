<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['property_id', 'user_id', 'options', 'corp_id', 'contact_text'];

    public function post()
    {
        return $this->belongsTo('App\HouseProperty');
    }
}
