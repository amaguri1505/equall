<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    protected $table = 'bookmarks';
    protected $guard = 'sanctum';


    protected $fillable = [
        'user_id', 'house_id',
    ];

}
