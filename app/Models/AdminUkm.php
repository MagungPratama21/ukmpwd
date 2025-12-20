<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUkm extends Model
{
    use HasFactory;

    protected $table = 'admin_ukm';

    public $timestamps = true;

    protected $fillable = [
        'id_ukm',
        'nama_admin',
        'email',
        'password',
    ];
}
