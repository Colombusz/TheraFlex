<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'servicetype',
        'description',
        'images'
    ];
    public function rates()
    {
        return $this->hasOne(Rate::class);
    }
    public function combos()
    {
        return $this->belongsTo(Combo::class);
    }
}
