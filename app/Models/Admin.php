<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }


    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function event() {
        return $this->hasMany('App\Models\Event');
    }
}
