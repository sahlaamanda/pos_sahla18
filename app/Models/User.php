<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use App\Models\Produk;
use App\Models\Penjualan;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELASI ROLE
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // RELASI PRODUK
    public function produk()
    {
        return $this->hasMany(Produk::class, 'user_id');
    }

    // RELASI PENJUALAN
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'user_id');
    }
}