<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'invoice_number',
        'account_id',
        'customer_id',
        'total',
        'paid',
        'change',
        'payment_method'
    ];

    // kasir
    public function admin()
    {
        return $this->belongsTo(accounts::class, 'account_id');
    }

    // pembeli
    public function customer()
    {
        return $this->belongsTo(accounts::class, 'customer_id');
    }

    public function details()
    {
        return $this->hasMany(Transactions_Details::class);
    }
}

