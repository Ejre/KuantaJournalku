<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'description',
        'day',
        'date',
        'waktu_mulai',
        'waktu_selesai',
        'status'
    ];
}


