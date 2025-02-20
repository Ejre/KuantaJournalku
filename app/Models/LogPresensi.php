<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPresensi extends Model
{
    use HasFactory;

    protected $table = 'log_presensi'; // Nama tabel yang benar

    protected $fillable = [
        'user_id',
        'check_in',
        'evidence',
        'is_active',
        'status',
        'tipe_kehadiran',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'presensi_id');
    }
}
