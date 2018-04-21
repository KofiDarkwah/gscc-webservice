<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    //mass assignable
    protected $fillable = ['name', 'leader_id', 'info'];

    //ministry belongs to leader
    public function leader()
    {
        return $this->hasOne('App\Models\Leader');
    }

}