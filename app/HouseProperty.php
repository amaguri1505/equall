<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HousePropertyImage;

class HouseProperty extends Model
{
    protected $fillable = [
        'type',
        'is_pet',
        'property_type',
        'name',
        'hitokoto',
        'good',
        'bad',
        'pet_types',
        'pet_cnt',
        'nearest_station',
        'minutes_on',
        'address',
        'cost',
        'manage_cost',
        'deposit',
        'deposit_for_pet',
        'key_money',
        'deposit_ex',
        'update_cost',
        'insurance',
        'insurance_corp',
        'cost_memo',
        'deal_form',
        'area',
        'floor_plan',
        'floor',
        'age',
        'structure',
        'park',
        'other_condition',
        'start_date',
        'end_date',
        'move_in_date',
        'corp_id',
        'is_published',
    ];

    public function post_images() {
        return $this->hasMany('App\HousePropertyImage');
    }

    public function inquiries() {
        return $this->hasMany('App\Inquiry', 'property_id');
    }
}
