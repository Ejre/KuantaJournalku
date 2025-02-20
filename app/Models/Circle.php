<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    use HasFactory;

    protected $table = 'circles';


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_circle', 'circle_id', 'user_id');
    } 
}
