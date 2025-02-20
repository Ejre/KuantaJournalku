<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCircle extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'circle_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }
}
