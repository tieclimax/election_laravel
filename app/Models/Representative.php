<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;
    public function group()
    {
        return $this->hasOne('App\Models\Group', 'id', 'group_id');
    }
    public function ownselected()
    {
        return $this->hasOne('App\Models\User', 'selected_id', 'id');
    }
}
