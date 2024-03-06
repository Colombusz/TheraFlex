<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'workedHours',
        'payRate',
        'overTimeWorkedHours',
        'grossIncome',
        'netIncome',
        'employee_id'
    ];

    public function benefits()
    {
        return $this->hasOne(Benefit::class);
    }
    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }
}
