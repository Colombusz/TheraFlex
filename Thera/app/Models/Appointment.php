<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'targetdate',
        'time',
        'status',
        'service_id',
        'product_id',
        'combo_id',
        'customer_id',
        'subtotal'
    ];
}
