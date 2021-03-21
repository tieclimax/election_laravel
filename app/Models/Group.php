<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['amount'];
    public function representativeoffer()
    {
        return $this->hasMany('App\Models\Representative', 'group_id', 'id');
    }
}
