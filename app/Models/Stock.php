<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'quantity',
        'price'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
