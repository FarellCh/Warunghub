<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'barcode',
        'buy_price',
        'sell_price',
        'stock',
        'unit',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(Transactions_Details::class);
    }
}
