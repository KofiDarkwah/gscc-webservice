<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    //mass assignable
    protected $fillable = ['name', 'email', 'phone', 'bio'];
}