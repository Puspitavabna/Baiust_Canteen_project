<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','breakfast','lunch','dinner',
    ];
    public function meal_rate(){
        return $this->belongsTo('App\Models\MealRate');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}