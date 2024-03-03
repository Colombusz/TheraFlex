<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = [
        'sss',
        'pagIbig',
        'philHealth',
        'incomeTax',
        'total'
    ];

    public function payrolls()
    {
        return $this->belongsTo(Payroll::class);
    }
}
