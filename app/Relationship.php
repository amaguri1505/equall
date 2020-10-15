<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = [
        'contact_options', 'corp_name', 'person_in_charge', 'email', 'tel', 'contact',
    ];
}
