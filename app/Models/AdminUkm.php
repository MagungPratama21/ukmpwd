<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUkm extends Model
{
    use HasFactory;

    protected $table = 'admin_ukm';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_ukm',
        'username',
        'email',
        'password',
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'id_ukm');
    }
}
