<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MealPayment extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}