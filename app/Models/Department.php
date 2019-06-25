<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','dept_name'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
