<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public function role_type()
    {
        return $this->belongsTo('App\Models\RoleType', 'role_type_id');
    }
}
