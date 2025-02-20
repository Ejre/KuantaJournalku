<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'alamat',
        'nomor_wa',
        'email',
        'deskripsi',
        'gambar',
        'user_id'
    ];
}