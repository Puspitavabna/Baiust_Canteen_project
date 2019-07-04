<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MealRate extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','meal_rate_name','breakfast_rate','breakfast_menu','lunch_rate','lunch_menu','dinner_rate','dinner_menu','active'
    ];
    public function meal_order(){
        return $this->belongsTo('App\Models\MealOrder');
    }

}