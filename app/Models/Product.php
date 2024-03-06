<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productname',
        'description',
        'images'
    ];

    public function stocks()
    {
        return $this->hasOne(Stock::class);
    }

    public function combos()
    {
        return $this->belongsTo(Combo::class);
    }
}
