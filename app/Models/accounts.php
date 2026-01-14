<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class accounts extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];

    // Admin / kasir → transaksi yang dia proses
    public function transactionsHandled()
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    // Customer → transaksi yang dia beli
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'customer_id');
    }
}

