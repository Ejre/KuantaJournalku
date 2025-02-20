<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity', 'date', 'waktu_mulai', 'waktu_selesai', 'description', 'day', 'status',
    ];
}

