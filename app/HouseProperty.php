<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseProperty extends Model
{
    protected $fillable = [
        'id'
        ,'type'
        ,'name'
        ,'good'
        ,'bad'
        ,'pet_type'
        ,'pet_cnt'
        ,'nearest_station'
        ,'address'
        ,'is_pet'
        ,'cost'
        ,'manage_cost'
        ,'initial_cost'
        ,'area'
        ,'floor_plan'
        ,'floor'
        ,'age'
        ,'structure'
        ,'park'
        ,'facility'
        ,'start_date'
        ,'id'
        ,'corp'
    ];
}
